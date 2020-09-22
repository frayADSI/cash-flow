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
        <header class="row mt-3 ">
            <div class="col">
                <h1 class="text-center">Agregar tasa</h1>
            </div>
        </header>
        <form action="/rate" class="mt-5" method="POST">
            @csrf
            <div class="row">
                <div class="col-2 d-flex align-items-center">
                    <label for="rateAmount" class="mb-0">Tasa</label>
                </div>
                <div class="col-4">
                     <input type="text" id="rateAmount" class="form-control" name="value"/>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-2 d-flex align-items-center">
                    <label for="rateDate" class="mb-0">Fecha</label>
                </div>
                <div class="col-4">
                     <input type="date" id="rateDate" class="form-control" name="date"/>
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