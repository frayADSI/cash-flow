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
            <div class="col-5 d-flex justify-content-center">
                <a href="" class="custom-short-btn p-3">Crear usuario</a>
            </div>
            <div class="col-6 d-flex justify-content-center">
                <a href="rate" class="custom-short-btn p-3">Cargar tasa</a>
            </div>

        </section>
    </div>
@endsection