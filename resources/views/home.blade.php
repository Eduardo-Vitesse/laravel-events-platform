@extends('layouts.main')

@section('title', 'Home')

@section('content')
    <div id="search-container" class="col-md-12">
        <h2>Busque por um evento</h2>
        <form id="form-search" action="/" method="GET">
            <input type="text" name="search" id="search" class="form-control" placeholder="Procurar">
            <input class="btn btn-primary" type="submit" value="Pesquisar">
        </form>
    </div>
    <div id="events-container" class="col-md-12">
        @if ($search)
            <h2>Buscando por: {{ $search }}</h2>
        @else
            <h2>Próximos Eventos</h2>
            <p class="subtitle">Veja os eventos dos próximos dias</p>
        @endif
        <div id="cards-container" class="row">
            @foreach ($events as $event)
                <x-card :event=$event />
            @endforeach
            @if (count($events) == 0 && $search)
                <div class="alert alert-warning" role="alert">Não foi possível encontrar nenhum evento com {{ $search }}! <a href="{{ route('home') }}">Ver todos</a></div>
            @elseif (count($events) == 0)
                <div class="alert alert-warning" role="alert">Não há eventos disponíveis</div>
            @endif
        </div>
    </div>
@endsection
