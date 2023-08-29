@extends('layouts.app')

@section('content')

    <div class="container">
       <form method="POST" action="{{ route('plates.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" require>
        </div>
        <div class="mb-3">
            <label for="ingredients" class="form-label">Ingredienti</label>
            <textarea class="form-control" id="ingredients" rows="3" name="ingredients" value="{{ old('ingredients') }}" require></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}" require>
        </div>
        <div class="mb-3">
            <label for="visibility_true" class="form-label">Si</label>
            <input type="radio" id="visibility_true" name="visibility" value="1" require_once>
            <label for="visibility_false" class="form-label">No</label>
            <input type="radio" id="visibility_false" name="visibility" value="0" require_once>
        </div>
        <button type="submit">Salva</button>
    </form>
    </div>


@endsection