@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Meus eventos</h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-events-container">
    @if (count($events) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Participantes</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                    <tr>
                        <td scope="row">{{ $loop->index + 1 }}</td>
                        <td scope="row"><a href="{{ route('detail', ['id' => $event->id]) }}">{{ $event->title }}</a></td>
                        <td scope="row">10</td>
                        <td scope="row">
                            <a class="btn btn-warning" href="{{ route('edit', ['id' => $event->id]) }}"><ion-icon name="create"></ion-icon> Editar</a>
                            <form action="{{ route('destroy', ['id' => $event->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit"><ion-icon name="trash"></ion-icon> Deletar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-warning" role="alert">Você ainda não tem eventos <a href="{{ route('events.create') }}">Criar evento</a></div>
    @endif
    </div>
@endsection
