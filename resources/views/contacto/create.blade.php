@extends('layouts.app')

@section('titulo', 'Contacto')

@section('contenido')
    <h1 class="mb-4">Solicita más información</h1>

    @if ($lugar)
        <p class="text-muted">Sobre: <strong>{{ $lugar['nombre'] }}</strong></p>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('contacto.store') }}" class="col-md-6">
        @csrf
        <input type="hidden" name="lugar_id" value="{{ $lugar['id'] ?? '' }}">

        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Correo electrónico</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Mensaje</label>
            <textarea name="mensaje" class="form-control" rows="4" required>{{ old('mensaje') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Enviar solicitud</button>
    </form>
@endsection