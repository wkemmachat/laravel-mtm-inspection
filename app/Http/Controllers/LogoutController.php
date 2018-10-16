<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\AskQuestionRequest;
use Carbon\Carbon;

class LogoutController extends Controller
{

    public function __construct() {
        // $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        return redirect('login')->with(\Auth::logout());
    }




}
