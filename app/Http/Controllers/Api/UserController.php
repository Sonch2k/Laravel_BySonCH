<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\userServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $userService;

    public function __construct(userServices $userService)
    {
        $this->userService = $userService;
    }
    /** * @OA\Post(
     * path="/api/auth",
     * summary="Sign in",
     * description="Login by email, password",
     * operationId="authLogin",
     * tags={"auth"},
     * @OA\RequestBody( * required=true,
     * description="Pass user credentials",
     * @OA\JsonContent( * required={"email","password"},
     * @OA\Property(property="email", type="string", format="email", example="user1@mail.com"),
     * @OA\Property(property="password", type="string", format="password", example="PassWord12345")
     * ),
     * ),
     * @OA\Response( * response=403,
     * description="Forbidden",
     * @OA\JsonContent(
     * @OA\Property(property="data", type="string", example={}),
     * @OA\Property(property="message", type="string", example="Forbidden,Try again!"),
     * @OA\Property(property="status", type="int", example="403 ")
     * )
     * )
     * )
     */
    public function auth(Request $request)
    {
        return $this->userService->authenJWT($request);
    }
    /** * @OA\Post(
     * path="/api/register",
     * summary="Register",
     * description="Register by email, password",
     * operationId="register",
     * tags={"register"},
     * @OA\RequestBody( * required=true,
     * description="Pass user credentials",
     * @OA\JsonContent( * required={"name","email","password"},
     * @OA\Property(property="email", type="string", format="email", example="A@mail.com"),
     * @OA\Property(property="password", type="string", format="password", example="123abc"),
     * @OA\Property(property="name", type="string", format="password", example="Nguyen Van A")
     * ),
     * ),
     * @OA\Response( * response=201,
     * description="Duplicate",
     * @OA\JsonContent(
     * @OA\Property(property="data", type="string", example={}),
     * @OA\Property(property="message", type="string", example="User1 is duplicate.Try Agian!"),
     * @OA\Property(property="status", type="int", example="201")
     * )
     * )
     * )
     */
    public function register(Request $request)
    {
        return $this->userService->registerUser($request);
    }
    /** * @OA\Get(
     * path="/api/list",
     * summary="List user",
     * security={{"bearer_token":{}}},
     * description="Get list User",
     * operationId="list",
     * tags={"list"},
     * @OA\Response( * response=404,
     * description="Fail to filter token",
     * @OA\JsonContent(
     * @OA\Property(property="data", type="string", example="null"),
     * @OA\Property(property="message", type="string", example="filter token fail"),
     * @OA\Property(property="status", type="int", example="404")
     * )
     * )
     * )
     */
    public function list(Request $request)
    {
        return $this->userService->getAllUsers();
    }
    /** * @OA\Post(
     * path="/api/changePassword",
     * summary="Change",
     * description="Register by email, password",
     * operationId="changePassword",
     * tags={"changePassword"},
     * @OA\RequestBody( * required=true,
     * description="Pass user credentials",
     * @OA\JsonContent( * required={"name","email","password"},
     * @OA\Property(property="email", type="string", format="email", example="A@mail.com"),
     * @OA\Property(property="old_pass", type="string", format="password", example="123abc"),
     * @OA\Property(property="new_pass", type="string", format="password", example="aokok123")
     * ),
     * ),
     * @OA\Response( * response=201,
     * description="wrong infomations",
     * @OA\JsonContent(
     * @OA\Property(property="data", type="string", example={}),
     * @OA\Property(property="message", type="string", example="eamil or password is not correctly.Try Agian!"),
     * @OA\Property(property="status", type="int", example="201")
     * )
     * )
     * )
     */
    public function changePassword(Request $request)
    {
        return $this->userService->changePassword($request);
    }
    public function loginForm(Request $request)
    {
        $credentials = [
            'email' => $request['username'],
            'password' => $request['password']
        ];
        if (Auth::attempt($credentials)) {
            return view('results')->with('message', 'Thanh Cong');
        } else {
            return view('results')->with('message', 'That Bai');
        }
    }
}
