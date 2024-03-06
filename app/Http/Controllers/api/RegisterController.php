<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\password;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
        if(!$request){
            return response()->json(['message'=>'please input all data'], 404);
        }

        $request->validate([
            'name' => 'required|unique:users',
            'email' => 'required|email:rfc, dns',
            'password' => 'required'
        ]);
        
        $NewUser = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->pasword)
        ]);
        return response()->json(['message'=>$NewUser], 201);
    }
}
