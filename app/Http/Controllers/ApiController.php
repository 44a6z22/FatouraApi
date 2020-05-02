<?php

namespace App\Http\Controllers;

use JWTAuth;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Requests\RegistrationFormRequest;
use App\lib\NumerotationConverter;
use App\Mail\VerificationEmail;
use App\NumerotationParameter;
use App\Parameter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Tests\Feature\NumerotationTest;

class ApiController extends Controller
{
    /**
     * @var bool
     */
    public $loginAfterSignUp = true;

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $input = $request->only('email', 'password');
        $token = null;



        // if cordinate are wrong
        if (!$token = JWTAuth::attempt($input)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Email or Password',
            ], 401);
        }


        // if account email isn't verified
        if (!Auth::user()->email_verified) {
            return response()->json([
                'success' => false,
                // 'token' => $token,
                'reason' => 'your email is not verified yet'
            ]);
        }


        return response()->json([
            'success' => true,
            'token' => $token,
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function logout(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);

        try {
            JWTAuth::invalidate($request->token);

            return response()->json([
                'success' => true,
                'message' => 'User logged out successfully'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, the user cannot be logged out'
            ], 500);
        }
    }

    /**
     * @param RegistrationFormRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegistrationFormRequest $request)
    {
        $user = new User();
        $user->role_id = 1;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->email_verification_token = Str::random(32);
        $user->save();

        if ($this->loginAfterSignUp) {
            Mail::to(request('email'))->send(new VerificationEmail($user));
            return $this->login($request);
        }



        return response()->json([
            'success'   =>  true,
            'data'      =>  $user
        ], 200);
    }
}
