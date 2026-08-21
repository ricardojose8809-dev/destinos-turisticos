@extends('layouts.app')

@section('titulo', 'Explora El Salvador')

@section('contenido')

    <div class="hero-index text-center">
        <h1 class="fw-bold"><i class="bi bi-map"></i> Explora El Salvador</h1>
        <p class="lead mb-0">Volcanes, playas, sitios arqueológicos y pueblos coloniales en un solo lugar</p>
    </div>

    <div class="row g-4">
        @foreach ($lugares as $lugar)
            <div class="col-sm-6 col-lg-4">
                <div class="card card-lugar h-100">
                    <img src="{{ asset('images/lugares/' . $lugar['id'] . '.jpg') }}"
     class="card-img-top"
     alt="{{ $lugar['nombre'] }}">

                    <div class="card-body d-flex flex-column">
                        <span class="badge badge-categoria mb-2 align-self-start">
                            {{ $lugar['categoria'] }}
                        </span>

                        <h5 class="card-title fw-bold">{{ $lugar['nombre'] }}</h5>
                        <p class="text-muted small mb-2">
                            <i class="bi bi-pin-map"></i> {{ $lugar['departamento'] }}
                        </p>

                        <span class="badge badge-precio mb-3 align-self-start">
                            <i class="bi bi-tag"></i> {{ $lugar['precio'] }}
                        </span>

                        <a href="{{ route('lugares.show', $lugar['id']) }}"
                           class="btn btn-sv mt-auto">
                            Ver detalle <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection