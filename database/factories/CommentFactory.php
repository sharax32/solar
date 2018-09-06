<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    $item=0;
    $comments=App\Comment::all()->isEmpty();
    if(!$comments)
    {
        $commentsids=App\Comment::get(['id'])->pluck('id')->toArray();
        $item=$faker->randomElement($commentsids);
        /*dd($inm);*/
    }
    return [
        //
        'name' => $faker->name,
        'email' => $faker->email,
        'text' => $faker->text(),
        'parent_id'=>$item,
    ];
});
