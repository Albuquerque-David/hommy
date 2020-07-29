<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RenterRequest;
use App\Renter;
use Auth;
use DB;


class PassportController extends Controller
{
    //
    public function register(RenterRequest $request)
    {
        $newuser = new Renter;
        $newuser->createRenter($request);
        $success['token']=$newuser->createToken('MyApp')->accessToken;
        return response()->json(['Success' => $success, 'user'=>$newuser],200);
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $out = new \Symfony\Component\Console\Output\ConsoleOutput();
        $out->writeln("Hello from Terminal");
        $out->writeln($email);
        $out->writeln($password);

        if(Auth::attempt(['email'=>$email, 'password'=>$password]))
        {
            $user = Auth::user();
            $success['token']=$user->createToken('MyApp')->accessToken;
            return response()->json(['Success'=>$success, 'user' => $user],200);
        }
        else
        {
            return response()->json(['error'=>'Unauthorized', 'status' => 401]);
        }
    }

    public function getDetails()
    {
        $user = Auth::user();
        return response()->json(['Success'=>$user],200);
    }

    public function logout()
    {
        $acessToken = Auth::user()->token();
        DB::table('oauth_refresh_tokens')->where('access_token_id', $acessToken->id)->update(['revoked'=>true]);
        $acessToken->revoke();
        return response()->json(['Usuário logged out.'], 200);
    }
}