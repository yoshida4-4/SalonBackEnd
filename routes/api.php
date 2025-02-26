<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ReserveController;
use App\Http\Controllers\ReservationController;
use App\Models\Reservation;
use App\Http\Controllers\AuthenticatedSessionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::get('/books',[ReserveController::class,'index']);
Route::get('/aaaa',[ReservationController::class,'index']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['web'])
    ->group(function(){
        Route::post('/login', [AuthenticatedSessionController::class, 'login']);
    });

// Route::group(['middleware' => 'api'], function(){
//     Route::post('reserve', 'App\Http\Controllers\Api\PostController');
// });

Route::post('/reservations', [PostController::class, 'store']);

// Route::post('/login', [AuthenticatedSessionController::class, 'login']);

// Route::post('/login', function (Request $request) {
//     // バリデーション
//     $credentials = $request->validate([
//         'email' => 'required|email',
//         'password' => 'required|string'
//     ]);

//     // 認証試行
//     if (!Auth::attempt($credentials)) {
//         throw ValidationException::withMessages([
//             'email' => ['The provided credentials are incorrect.'],
//         ]);
//     }

//     // ユーザー取得
//     $user = Auth::user();

//     // Sanctumトークンの発行 (API認証用)
//     $token = $request->user()->createToken('auth-token')->plainTextToken;

//     // レスポンスとしてトークンとユーザー情報を返す
//     return response()->json([
//         'user' => $user,
//         'token' => $token,
//     ]);
// });