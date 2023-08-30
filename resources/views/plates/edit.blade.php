@extends('layouts.app')

@section('content')

    <div class="container">
        <form method="get" action="{{ route('plates.edit', ['plate' => $plate->id]) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $plate->name) }}">
        </div>
        <div class="mb-3">
            <label for="ingredients" class="form-label">Ingredienti</label>
            <textarea class="form-control" id="ingredients" rows="3" name="ingredients">{{ old('ingredients', $plate->ingredients) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $plate->price) }}">
        </div>
        <div class="mb-3">
            <label for="visibility" class="form-label">Visibile</label>
            <input type="radio" id="visibility" name="visibility" value="{{ old('visibility', $plate->visibility)  }}">Sì 
            <input type="radio" id="visibility" name="visibility" value="{{ old('visibility', $plate->visibility) }}">No 
        </div>
        <button>Salva</button>
    </form>
    </div>


@endsection