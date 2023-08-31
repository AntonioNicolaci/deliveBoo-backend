@extends('layouts.app')

@section('content')

    <div class="container">
        <form method="post" action="{{ route('plates.update', ['plate' => $plate->id]) }}" id="formEditLogin">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $plate->name) }}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="ingredients" class="form-label">Ingredienti</label>
            <textarea class="form-control @error('ingredients') is-invalid @enderror" id="ingredients" rows="3" name="ingredients">{{ old('ingredients', $plate->ingredients) }}</textarea>
            @error('ingredients')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" min="1" step="0.01" value="{{ old('price', $plate->price/100) }}">
            @error('price')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="visibility_true" class="form-label">Si</label>
            <input type="radio" id="visibility_true" name="visibility" value="1">
            <label for="visibility_false" class="form-label">No</label>
            <input type="radio" id="visibility_false" name="visibility" value="0">
        </div>
        <button type="submit">Salva</button>
    </form>
    </div>


@endsection