@extends('layouts.principal_layout')

@section('page_content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">App Favoritos</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="{{ route('user.home') }}">Inicio</a>
                    <a class="nav-link" href="{{ route('favorite.dashboard') }}">Mis favoritos</a>
                    <a class="nav-link" href="{{ route('category.dashboard') }}">Categorías</a>
                </div>
            </div>
            <div class="collapse navbar-collapse flex-grow-1 text-right">
                <ul class="navbar-nav ms-auto flex-nowrap">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.logout') }}" >Cerrar sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>
@endsection

