<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index() {
        $name = 'Hendra';
        $gender = 'male';
        $date_of_birth = '27 April 1989';
        $address = 'Sai Residence, TajurHalang, Bogor';
        return view('about', [
            'name' => $name,
            'gender' => $gender,
            'date_of_birth' => $date_of_birth,
            'address' => $address
        ]);
    }
}
