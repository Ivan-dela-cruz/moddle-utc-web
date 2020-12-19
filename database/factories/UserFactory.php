<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Level;
use App\Period;
use App\Subject;
use App\User;
use Faker\Generator as Faker;
use Carbon\Carbon;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(App\Level::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'status' => true
    ];
});

$factory->define(App\Period::class, function (Faker $faker) {
    $now = Carbon::now();
    $date = $now->format('Y-m-d');

    return [
        'name' => $faker->name,
        'start_date' =>$date,
        'end_date' => $date,
        'status' => true
    ];
});

$factory->define(App\Subject::class, function (Faker $faker) {
   
    $level_id = Level::pluck('id')->random();
    $description = $faker->sentence(mt_rand(2, 5));
    $name = $faker->name;
    return [

        'level_id' => $level_id,
        'name' => $name,
        'slug' => Str::slug($name,'-'),
        'description' => $description,
        'status' => true
    ];
});
