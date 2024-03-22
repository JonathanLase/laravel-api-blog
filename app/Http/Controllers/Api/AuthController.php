<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\LoginResource;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\RegisterResource;
use App\Http\Repositories\UserRepository;

class AuthController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function signUp(RegisterRequest $request)
    {
        $input = $request->validated();

        $newUser = DB::transaction(function () use ($input) {
            $newUser = $this->userRepository->store($input);

            return $newUser;
        });

        $resource = new RegisterResource($newUser);

        return response()->json([
            'status_code' => 201,
            'message' => 'User registered successfully',
            'data' => $resource
        ]);
    }

    public function signIn(LoginRequest $request)
    {
        if (!auth()->attempt($request->validated())) {
            return response()->json([
                'status_code' => 401, // 'Unauthorized
                'message' => 'Username or password is incorrect',
                'data' => []
            ], 401);
        }

        $user = User::where('email', $request->email)->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        $expirationMinutes = config('sanctum.expiration');
        $now = Carbon::now('Asia/Jakarta');
        $expiresAt = $now->copy()->addMinutes($expirationMinutes);
        $expiresAtFormatted = $expiresAt->format('Y-m-d H:i:s');

        return response()->json([
            'status_code' => 200,
            'message' => 'User logged in successfully',
            'data' => [
                'access_token' => $token,
                'token_type' => 'Bearer',
                'expires_in' => $expiresAtFormatted . ' WIB'
            ]
        ]);
    }

    public function signOut(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status_code' => 200,
            'message' => 'User logged out successfully',
            'data' => []
        ]);
    }

    public function me(Request $request)
    {
        $user = $request->user();

        return response()->json([
            'status_code' => 200,
            'message' => 'User data retrieved successfully',
            'data' => $user
        ]);
    }

    public function refreshToken(Request $request)
    {
        $user = $request->user();
        $token = $user->createToken('auth_token')->plainTextToken;

        $expirationMinutes = config('sanctum.expiration');
        $now = Carbon::now('Asia/Jakarta');
        $expiresAt = $now->copy()->addMinutes($expirationMinutes);
        $expiresAtFormatted = $expiresAt->format('Y-m-d H:i:s');

        return response()->json([
            'status_code' => 200,
            'message' => 'Token refreshed successfully',
            'data' => [
                'access_token' => $token,
                'token_type' => 'Bearer',
                'expires_in' => $expiresAtFormatted . ' WIB'
            ]
        ]);
    }
}
