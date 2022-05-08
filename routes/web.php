<?php

use App\Models\NationalRegistry;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    $users = NationalRegistry::select('identityId', 'firstName', 'middleName', 'lastName')
            ->paginate(15);

    return view('welcome', [
            'users' => $users
    ]);
});

Route::get('new', function () {


    $range = range(1, 1000000);

    collect($range)->chunk(1000, function ($chunk) {



    });


});
