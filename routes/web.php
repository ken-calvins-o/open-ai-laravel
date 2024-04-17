<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;


//This code is used to get the response from the openai api and display it on the screen

Route::get('/', function () {
    $messages = [
        [
            "role" => "user",
            "content" => "Provide me with three memory verses from the Bible that illustrate hope."
        ]
    ];

        $verse = Http::withHeaders([
            'Authorization' => 'Bearer ' . config('services.openai.key'),
        ])->post('https://api.openai.com/v1/chat/completions', [
            "model" => "gpt-3.5-turbo",
            "messages" => $messages
        ])->json(
            'choices.0.message.content'
        );

    $messages [] = [
        [
            "role" => "assistant",
            "content" => $verse
        ]
    ];

    $messages = [
        [
            "role" => "user",
            "content" => "Good. Now go ahead and deeply expound the meaning of each of those verses"
        ]
    ];

    $verseExplained = Http::withHeaders([
        'Authorization' => 'Bearer ' . config('services.openai.key'),
    ])->post('https://api.openai.com/v1/chat/completions', [
        "model" => "gpt-3.5-turbo",
        "messages" => $messages
    ])->json(
        'choices.0.message.content'
    );

    $messages [] = [
        [
            "role" => "assistant",
            "content" => $verseExplained
        ]
    ];

    return view('welcome', [
        'verse' => $verseExplained
    ]);

});
