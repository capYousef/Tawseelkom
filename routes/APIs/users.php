<?php

use App\Http\Controllers\Api\Users\AuthController;
use App\Http\Controllers\Api\Users\RouteController;
use App\Http\Controllers\Api\Users\UserOrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('register', [AuthController::class, "register"]);
Route::post('login', [AuthController::class, "login"]);

Route::middleware(['jwt.verify'])->group(function () {
  Route::post('logout', [AuthController::class, "logout"]);

  Route::get('routes', [RouteController::class, "get_routes"]);

  Route::post("make-order", [UserOrderController::class, "create"]);
  Route::get("user-orders", [UserOrderController::class, "index"]);
});
