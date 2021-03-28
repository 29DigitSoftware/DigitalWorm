<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request) {
        $response = [];
        $user = (object)DB::select("select * from users where email=".$request->email." LIMIT 1");
    
        if (! $user || ! Hash::check($request->password, $user->password)) {
            $response['message'] = 'Invalid credentials';
            return response(json_encode($response, JSON_UNESCAPED_UNICODE), 422);
        }
        $user->tokens()->delete();
        $response['token'] = $user->createToken('reader')->plainTextToken;
        return response(json_encode($response, JSON_UNESCAPED_UNICODE), 200);
    }

    public function logout(Request $request) {
        $user = (object)DB::select("select * from users where email=".$request->email." LIMIT 1");
    
        if (! $user || ! Hash::check($request->password, $user->password)) {
            $response['message'] = 'Invalid credentials';
            return response(json_encode($response, JSON_UNESCAPED_UNICODE), 422);
        }
        $user->tokens()->delete();
        return response(json_encode(['message' => 'Success'], JSON_UNESCAPED_UNICODE), 200);
    }

    public function get_token(Request $request) {
        $response = [];
        $user = (object)DB::select("select * from users where email=".$request->email." LIMIT 1");
    
        if (! $user || ! Hash::check($request->password, $user->password)) {
            $response['message'] = 'Invalid credentials';
            return response(json_encode($response, JSON_UNESCAPED_UNICODE), 422);
        }
        
        $response['token'] = $user->tokens()->where('id', 7)->get();
        return response(json_encode($response, JSON_UNESCAPED_UNICODE), 200);
    }

    public function register(Request $request) {
        $request->validate([
            'email' => 'email:rfc'
        ]);
        if (((object)DB::select("select * from users where email=".$request->email." LIMIT 1")) != null) {
            $response = ['message' => 'User already exist'];
        } else {
            $user = new User;
            $user -> name = $request -> name;
            $user -> email = $request -> email;
            $user -> password = Hash::make($request -> password);
            $user -> save();
            $response = ['token' => $user->createToken('reader')->plainTextToken];
        }
        return response(json_encode($response, JSON_UNESCAPED_UNICODE), 200);
    }
}
