<?php

namespace App\Http\Controllers\api;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;

class APIController extends Controller
{
    function login(Request $request) {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $rol = $user->rol;
            if(strtoupper($rol->name) == "DIRECTOR DE FINANZAS" || strtoupper($rol->name) == "TESORERO") {
                return response([
                     'data' => [
                         'user' => $user,
                    'rol' => $rol],
                     'code' => 200,
                     'msg' => 'OK'
                ],200)->header('Content-Type', 'application/json');
            } else {
                return response([
                    'msg' => 'invalid user',
                    'code' => 401], 401)
                  ->header('Content-Type', 'application/json');
            }
            
        }
    }

    function getTransactions(Request $request) {
        $transactions = Transaction::all();
        $balance = $this->getBalance();
        return response(
            [   'msg'=> 'ok',
                'code'=> 200,
                'data' => [
                'balance' => $balance,
                'transactions' => $transactions]
            ], 200);

    }

    function getBalance() {
        $lastTransaction = Transaction::orderBy('created_at', 'desc')->first();
        if($lastTransaction != null) {
            $lastBalance = $lastTransaction->balance;
            return $lastBalance;
        } else {
            return (0);
        }
    }
}
