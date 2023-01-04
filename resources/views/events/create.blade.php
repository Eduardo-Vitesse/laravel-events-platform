@extends('layouts.main')

@section('title', 'Create')

@section('content')
    <div id="events-create-container" class="col-md-6 offset-md-3">
        <h1>Crie seu evento</h1>
        <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="image">Imagem do evento</label>
                <input id="image" name="image" type="file" class="form-control-file">
            </div>
            <div class="form-group">
                <label for="title">Evento</label>
                <input id="title" name="title" type="text" class="form-control" placeholder="Nome do evento">
            </div>
            <div class="form-group">
                <label for="date">Data do evento</label>
                <input id="date" name="date" type="date" class="form-control">
            </div>
            <div class="form-group">
                <label for="city">Cidade</label>
                <input id="city" name="city" type="text" class="form-control" placeholder="Local do evento">
            </div>
            <div class="form-group">
                <label for="private">O evento é privado?</label>
                <select name="private" id="private" class="form-control">
                    <option value="0">Não</option>
                    <option value="1">Sim</option>
                </select>
            </div>
            <div class="form-group">
                <label for="description">Descrição do evento</label>
                <textarea name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="infra">Adicione itens de infra estrutura</label>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Cadeiras"> Cadeiras
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Palco"> Palco
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Cerveja gratis"> Cerveja gratis
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Open food"> Open food
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Brinds"> Brinds
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Premiações"> Premiações
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Estacionamento gratis"> Estacionamento gratis
                </div>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Criar evento">
            </div>
        </form>
    </div>
@endsection
