<?php

namespace App\Http\Controllers\Admin;

use App\StudentTask;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\File;
use Illuminate\Support\Str;
class FileController extends Controller
{
    ///URL PARA ENTREGA DE TAREAS
    public function fileStore(Request $request)
    {
        $task = StudentTask::find($request->task_id);

        $file = $request->file('file');
        $size = $request->file('file')->getSize();
        $fileName = $file->getClientOriginalName();
        $file->move(public_path('files/deliveries/'), $fileName);

          $fileUpload = new File([
            'name'=> $request->name,
             'filename'=> $fileName,
             'size_file' => $size,
              'url_file' => 'files/deliveries/'.$fileName
          ]);
          $task->files()->save($fileUpload);

        return response()->json(['name' => $request->name, 'filename' => $fileName, 'filesize' => $size]);
    }

    public function fileDestroy(Request $request)
    {
        $filename =  $request->get('filename');
        File::where('filename',$filename)->delete();
        $path=public_path('files/deliveries/'.$filename);
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;
    }

    public function fileLoad(Request $request){
        if($request->ajax()){
            $task = StudentTask::find($request->task_id);
            return response()->json($task->files);
        }

    }

    public function downloadFile( $id){
        $file = File::find($id);
        if(file_exists($file->url_file)){
            return response()->download($file->url_file, $file->name);
        }
    }
}
