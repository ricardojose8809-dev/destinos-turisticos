@extends('layouts.app')

@section('titulo', $lugar['nombre'])

@section('contenido')

    <a href="{{ route('lugares.index') }}" class="btn btn-outline-secondary btn-sm mb-3">
        <i class="bi bi-arrow-left"></i> Volver al catálogo
    </a>

    <div class="card card-lugar shadow-sm">
        <div class="card-body p-4">

            {{-- Carrusel de 3 imágenes --}}
            <div id="carrusel-{{ $lugar['id'] }}" class="carousel slide carousel-detalle mb-4" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    @for ($i = 1; $i <= 3; $i++)
                        <button type="button"
                                data-bs-target="#carrusel-{{ $lugar['id'] }}"
                                data-bs-slide-to="{{ $i - 1 }}"
                                class="{{ $i === 1 ? 'active' : '' }}"></button>
                    @endfor
                </div>

                <div class="carousel-inner">
                    @for ($i = 1; $i <= 3; $i++)
                        <div class="carousel-item {{ $i === 1 ? 'active' : '' }}">
                            <img    src="{{ asset('images/lugares/' . $lugar['id'] . '/' . $i . '.jpg') }}"
                                 class="d-block w-100"
                                 alt="{{ $lugar['nombre'] }} - foto {{ $i }}">
                        </div>
                    @endfor
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carrusel-{{ $lugar['id'] }}" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carrusel-{{ $lugar['id'] }}" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>

            <span class="badge badge-categoria mb-2">{{ $lugar['categoria'] }}</span>

            <h1 class="fw-bold">{{ $lugar['nombre'] }}</h1>
            <p class="text-muted mb-3">
                <i class="bi bi-pin-map"></i> {{ $lugar['departamento'] }}
            </p>

            <p>
                <span class="badge badge-precio fs-6">
                    <i class="bi bi-tag"></i> {{ $lugar['precio'] }}
                </span>
            </p>

            <hr>

            <h5 class="mt-4"><i class="bi bi-info-circle"></i> Datos relevantes</h5>
            <ul class="list-group list-group-flush mb-4">
                @foreach ($lugar['datos_relevantes'] as $dato)
                    <li class="list-group-item">
                        <i class="bi bi-check2-circle text-success"></i> {{ $dato }}
                    </li>
                @endforeach
            </ul>

            <a href="{{ route('contacto.create', $lugar['id']) }}" class="btn btn-sv btn-lg">
                <i class="bi bi-envelope"></i> Solicitar más información
            </a>
        </div>
    </div>

@endsection