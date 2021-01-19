<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Level;
use App\Student;
use App\Course;
use App\Http\Controllers\Controller;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\JWT;
use Tymon\JWTAuth\Facades\JWTAuth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Exception;
class AuthController extends Controller
{
    public function login(Request $request)
    {
        $creds = $request->only(['email', 'password']);
        if (!$token = \JWTAuth::attempt($creds)) {
            return response()->json([
                'success' => false,
                'message' => 'invalid credentials'
            ], 401);
        }
        $user =  Auth::user();
        //LIMPIAR DATA DE USER
        unset($user["email_verified_at"]);
        unset($user["created_at"]);
        unset($user["updated_at"]);

        //ADJUNTAR LA DATA DEL ESTUDAINTE A LA DATA DE USER
        $student = Student::where('user_id',$user->id)->first(['id','name','last_name','dni','url_image']);
        $user["url_image"] = $student->url_image;
        $user["name"] = $student->name;
        $user["last_name"] = $student->last_name;
        $user["dni"] = $student->dni;
        $user["student_id"] = $student->id;
        return response()->json([
            'success' => true,
            'token' => $token,
            'user' => $user
        ], 200);
    }

    public function register(Request $request)
    {
        $encriptedPass = Hash::make($request->password);
        try {
            $user = new User();
            $user->ci = $request->ci;
            $user->type_document = $request->type_document;
            $user->name = $request->name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->password = $encriptedPass;
            $user->address = $request->address;
            $user->phone = $request->phone;
            $user->url_image = $request->url_image;
            $user->status = 'activo';
            $user->save();
            return $this->login($request);
        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => $exception
            ]);

        }


    }

    public function logout(Request $request)
    {
        try {
            JWTAuth::invalidate(JWTAuth::parseToken($request->token));
            return response()->json([
                'success' => true,
                'message' => 'logout success'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'logout fail' . $e
            ]);
        }
    }

    public function profileUser(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
      //  $user->last_name = $request->last_name;

        if ($request->url_image) {
            if ($user->url_image != $request->url_image) {
                $this->destroyFile($user->url_image);
                $user->url_image = $this->UploadImage($request);
            }
        }
        $user->update();
        return response()->json([
            'success' => true,
            'url_image' => $user->url_image,
            'name' => $user->name,
            'last_name' => $user->last_name
        ], 200);
    }
    public function getProfile(Request $request)
    {
        try{
            $user = User::find(Auth::user()->id);
            $student = Student::where('user_id', $user->id)->first();
            if(is_null($student)){
                return response()->json([
                    'success' => false,
                    'code' => 'PROFILE_NOT_FOUND',
                    'status' => 404,
                ],404);
            }else{
                $levels = Level::where('status',1)->count();
                $courses = Course::where('status',1)->count();
                return response()->json([
                    'profile' => $student,
                    'user' => $user,
                    'success' => true,
                    'code' => 'PROFILE_FOUND',
                    'status' => 200,
                    'level'=>$levels,
                    'courses'=>$courses
                ],200);
            }
        }catch(Exception $e){
            return response()->json([

                'success' => false,
                'code' => 'ERROR_PROFILE',
                'status' => 500,
            ],500);
        }
    }

    public function ChangePassword(Request $request)
    {
        try{
            $user = User::find(Auth::user()->id);
            if(is_null($user)){
                return response()->json([
                    'success' => false,
                    'code' => 'USER_NOT_FOUND',
                    'status' => 404,
                ],404);
            }else{
                $user->password = $this->generatePassword($request->password);
                $user->update();
                return response()->json([
                    'success' => true,
                    'code' => 'PASSWORD_CHANGED',
                    'status' => 200,
                    'user'=>$user,
                ],200);
            }
        }catch(Exception $e){
            return response()->json([
                'success' => false,
                'code' => 'ERROR_CHANGE_PASSWORD',
                'status' => 500,
            ],500);
        }

    }

    public function generatePassword($password)
    {
        $user_password = Hash::make($password);
        return $user_password;
    }


    public function UploadImage(Request $request)
    {
        $url_file = "img/users/";
        if ($request->url_image && $request->url_image != '#') {
            $foto = time() . '.jpg';
            file_put_contents('img/users/' . $foto, base64_decode($request->url_image));
            return $url_file . $foto;

        } else {
            return "#";
        }
        /*if ($request->url_image && $request->url_image != '#') {
            $image = $request->get('url_image');
            $name = time() . '.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
            Image::make($request->get('url_image'))->save(public_path($url_file) . $name);
            return $url_file . $name;
        } else {
            return "#";
        }
        */
    }
     public function destroyFile($path_file)
    {
        if (File::exists(public_path($path_file))) {

            File::delete(public_path($path_file));

        }
    }
}
