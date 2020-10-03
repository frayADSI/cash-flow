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
        <div class="row d-flex justify-content-center mt-2">
            <h1>Ingresar transacción de salida</h1>
        </div>
        <form action="outputTransaction" class="mt-5" method="POST">
            @csrf
            <div class="row">
                <div class="col-12 d-flex align-items-center">
                    <label for="date" class="mb-0">Fecha</label>
                </div>
                <div class="col-4">
                    <select  id="rate" class="form-control" name="date">
                            <option value="{{ $date }}">{{ $date }}</option>
                     </select>
                </div>
            </div>
            <div class="row">
                <div class="col-12 d-flex align-items-center">
                    <label for="rol" class="mb-0">Tipo</label>
                </div>
                <div class="col-4">
                     <select  id="rol" class="form-control" name="transaction_type">
                            <option value="salida">salida</option>
                     </select>
                </div>
            </div>
            <div class="row">
                <div class="col-12 d-flex align-items-center">
                    <label for="description" class="mb-0">Descripción</label>
                </div>
                <div class="col-12">
                     <textarea id="description" class="form-control" name="description"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-6 d-flex align-items-center">
                    <label for="rate" class="mb-0">Monto</label>
                </div>
                <div class="col-6 d-flex align-items-center">
                    <label for="date" class="mb-0">Tasa</label>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <input type="text" id="rate" class="form-control" name="amount" value="{{old('amount')}}"/>
                </div>
                <div class="col-6">
                     <select  id="rate" class="form-control" name="rate_id">
                            <option value="{{ $rate->id }}">{{ $rate->value }}</option>
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