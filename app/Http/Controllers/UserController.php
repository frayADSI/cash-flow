<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rols = Rol::all();
        return view('createUserForm', [
            'rols' => $rols
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        
        $user = new User;

        if (User::find($request->id)) {
            return back()->withErrors(['Ya existe un usuario con esa cedula']);
        }

        if (User::where('email',$request->email)->first()) {
            return back()->withErrors(['Ya existe un usuario con ese email']);
        }

        $user->id = $request->id;

        $user->name = $request->name;

        $user->last_name = $request->last_name;

        $user->email = $request->email;

        $user->password = bcrypt($request->password);

        $rol = Rol::where('name',$request->rol)->first();
        
        $user->rol_id = $rol->id;

        $authUser = Auth::user();

        $user->company_rif = $authUser->company_rif;

        $user->save();

        return back()->with('status','creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
