<?php

namespace financeiro\Http\Controllers\Api;

use financeiro\Http\Controllers\Controller;
use financeiro\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    use AuthenticatesUsers;

    public function accessToken(Request $request)
    {
        $this->validateLogin($request);

        $credentials = $this->credentials($request);

        if ($token = Auth::guard('api')->attempt($credentials)) {
            return $this->sendLoginResponse($request, $token);
        }
    }

    protected function sendLoginResponse(Request $request, $token)
    {
    }


    /**
     * Log the user out of the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect(env('URL_ADMIN_LOGIN'));
    }

}
