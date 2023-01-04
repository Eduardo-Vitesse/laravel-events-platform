@extends('layouts.main')

@section('title', $event->title)

@section('content')
    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="image-container" class="col-md-6">
                <img class="img-fluid" src="/img/events/{{$event->image}}" alt="{{$event->title}}">
            </div>
            <div id="info-container" class="col-md-6">
                <h1>{{$event->title}}</h1>
                <p class="event-city"><ion-icon name="pin"></ion-icon> {{$event->city}}</p>
                <p class="event-participants"><ion-icon name="person"></ion-icon> 10 Participantes</p>
                <p class="event-owner"><ion-icon name="star"></ion-icon> {{ $eventOwner['name'] }}</p>
                <h3>O evento conta com</h3>
                <ul id="items-list">
                    @foreach ($event->items as $item)
                        <li><ion-icon name="play"></ion-icon> <span>{{$item}}</span></li>
                    @endforeach
                </ul>
                <a href="#" class="btn btn-primary" id="event-submit">Confirmar presença</a>
            </div>
            <div class="col-md-12" id="description-container">
                <h3>Sobre o evento</h3>
                <p class="event-description">{{$event->description}}</p>
            </div>
        </div>
    </div>
@endsection
