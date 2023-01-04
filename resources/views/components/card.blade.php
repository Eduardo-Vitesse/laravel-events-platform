<div class="card col-md-3">
    <img src="/img/events/{{ $event->image }}" alt="{{ $event->title }}"/>
    <div class="card-body">
        <p class="card-date">{{ date('d/m/Y', strtotime($event->date)) }}</p>
        <h5 class="card-title">{{ $event->title }}</h5>
        <p class="card-participants">10 Participantes</p>
        <a href="{{ route('detail', ['id' => $event->id]) }}" class="btn btn-primary">Saber mais</a>
    </div>
</div>
