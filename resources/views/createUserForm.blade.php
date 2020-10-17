@extends('layouts.app')

@section('content')

    <div class="container">
        @if (session('status'))
             <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ session('status') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <header class="row mt-3 ">
            <div class="col">
                <h1 class="text-center">Crear usuario</h1>
            </div>
        </header>
        <form action="" class="mt-5" method="POST">
            @csrf
            <div class="row">
                <div class="col-12 d-flex">
                    <label for=name" class="mb-0">Nombre</label>
                </div>
                <div class="col-6">
                     <input type="text" id="name" class="form-control" name="name" value="{{old('name')}}"/>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-12 d-flex align-items-center">
                    <label for="lastName" class="mb-0">Apellido</label>
                </div>
                <div class="col-6">
                     <input type="text" id="lastName" class="form-control" name="last_name" value="{{old('last_name')}}"/>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-12 d-flex align-items-center">
                    <label for="id" class="mb-0">Cédula</label>
                </div>
                <div class="col-4">
                     <input type="text" id="id" class="form-control" name="id" value="{{old('id')}}"/>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-12 d-flex align-items-center">
                    <label for="id" class="mb-0">Email</label>
                </div>
                <div class="col-4">
                     <input type="email" id="id" class="form-control" name="email" value="{{old('email')}}"/>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-12 d-flex align-items-center">
                    <label for="password" class="mb-0">Contraseña</label>
                </div>
                <div class="col-4">
                     <input type="password" id="id" class="form-control" name="password"/>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12 d-flex align-items-center">
                    <label for="rol" class="mb-0">Selecciona un rol</label>
                </div>
                <div class="col-4">
                     <select  id="rol" class="form-control" name="rol">
                        @foreach($rols as $rol)
                            <option value=" {{$rol->name}}">{{$rol->name}}</option>
                        @endforeach
                     </select>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-5 d-flex justify-content-center">
                    <a href="/" class="custom-short-btn p-3">Volver</a>
                </div>
                <div class="col-6 d-flex justify-content-center">
                    <button type="submit" class="custom-short-btn p-3">Guardar</button>
                </div>
            </div>
            
        </form>
    </div>

@endsection