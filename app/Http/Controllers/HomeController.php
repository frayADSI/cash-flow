<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $currentRol = $user->rol->name;
        if(strtoupper($currentRol) == "DIRECTOR DE FINANZAS" || strtoupper($currentRol) == "TESORERO") {
            return view('directorHome', [
                'currentUser' => $user,
                'rol' => $currentRol
            ]);
        } else if(strtoupper($currentRol) == "CAJERO PRINCIPAL") {
            return view('mainCashierHome', [
                'currentUser' => $user,
                'rol' => $currentRol
            ]);
        } else if(strtoupper($currentRol) == "SUPERVISOR DE TIENDA") {
            return view('supervisorHome', [
                'currentUser' => $user,
                'rol' => $currentRol
            ]);
        }
    }

    public function logout() {
        Auth::logout();
        return redirect('/login');
    }
}
