<?php

namespace App\Http\Controllers;

use App\Mail\testMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class mailController extends Controller
{
    public function email() {
        $name = 'hendra';
        Mail::to('test@example.com')->send(new testMail($name));
        return 'email sent';
    }

    public function forget(){
        return view('forgetPassword');
    }
}
