<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
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
            'email' => 'required|email:rfc, dns',
            'password' => 'required'
        ]);

        $cekUser = User::where('email', $request->email)->first();
        dd($cekUser);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $token = $cekUser->createToken('api_token')->plainTextToken;
            return response()->json(['token' => $token], 200);
        }
    }
}
