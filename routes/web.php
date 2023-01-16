<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

Route::get('/', function () {
    return Redirect::to('http://127.0.0.1:8000/docs');
});
