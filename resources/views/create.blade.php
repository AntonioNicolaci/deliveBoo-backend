@extends('layout.app')

@section('content')

    <form method="post" action="{{ route('plates.store') }}">
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name">
        </div>
        <div class="mb-3">
            <label for="ingredients" class="form-label">Ingredienti</label>
            <textarea class="form-control" id="ingredients" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input type="number" class="form-control" id="price">
        </div>
        <div class="mb-3">
            <label for="visibility" class="form-label">Visibilità</label>
            <input type="radio" class="form-control" id="visibility">
        </div>

        <button>Salva</button>
    </form>

@endsection