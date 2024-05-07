<?php

namespace App\Http\Web\Controllers;

//use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TestController extends Controller
{
    public function get(): string
    {
        return "Hello, World!";
    }
}
