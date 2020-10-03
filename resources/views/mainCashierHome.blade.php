@extends('layouts.app')

@section('content')
    <div class="container">
        <header class="row mt-3">
            <div class="col-8 text-center">
                <h1 class="text-capitalize">{{$rol}}</h1>
            </div>
            <div class="col-4 d-flex align-items-center">
                <a href="/logout" class="custom-close-btn p-2">Cerrar sesión</a>
            </div>
        </header>
        <section class="row mt-5">
            <div class="col-2">
                <p class="font-weight-bold">Nombre</p>
            </div>
            <div class="col-4">
                <p>{{ $currentUser->name}}</p>
            </div>
        </section>
        <section class="row two-btn-container">
            <div class="col-12 d-flex justify-content-center">
                <a href="outputTransaction" class="custom-main-btn p-3">Ingresar transaccion de salida</a>
            </div>
        </section>
    </div>
@endsection