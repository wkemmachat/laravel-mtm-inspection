<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function __construct() {
        // $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $a = "abc";
        $b = "Acc ";

        if(trim($a)===trim($b)){
            // dd(trim($a)===trim($b));
        }else{
            // dd(trim($a)===trim($b));
        }

        $a = trim($a);
        $b = trim($b);
        // check equal ignoer case
        if (strcasecmp($a, $b) == 0) {
            echo '$var1 is equal to $var2 in a case-insensitive string comparison';
        }else{
            echo 'Not equal';
        }

        return view('test.index');
    }
}
