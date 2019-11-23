<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

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

$factory->define(App\Clients::class, function (Faker $faker) {
    return [
        'client_name' => $faker->sentence,
        'client_details' => $faker->paragraph,
        'client_company_logo' => $faker->imageUrl,
        'client_status' => 1,
    ];
});

$factory->define(App\Gallery::class, function (Faker $faker) {
    return [
        'gallery_image_title' => $faker->sentence,
        'gallery_image' => $faker->image('public/uploads/galleryImage',640,480, null, false),
        'gallery_status' => 1,
    ];
});
