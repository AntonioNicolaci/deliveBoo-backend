@extends('layouts.app')

@section('content')

    <div class="container">
       <form method="POST" action="{{ route('plates.store') }}" id="formCreateEdit">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" require>
            <ul class="text-danger" id="nameAlert"></ul>
        </div>
        <div class="mb-3">
            <label for="ingredients" class="form-label">Ingredienti</label>
            <textarea class="form-control" id="ingredients" rows="3" name="ingredients" require>{{ old('ingredients') }}</textarea>
            <ul class="text-danger" id="nameAlert"></ul>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input type="number" class="form-control" id="prev-price" name="prev-price" value="{{old('prev-price')}}" min="0" step="0.01" require>
            <ul class="text-danger" id="nameAlert"></ul>

            <input type="hidden" id="price" name="price" value="{{'price'}}">
        </div>
        
        <div class="mb-3">
            <label for="visibility_true" class="form-label">Si</label>
            <input type="radio" id="visibility_true" name="visibility" value="1" require_once>
            <label for="visibility_false" class="form-label">No</label>
            <input type="radio" id="visibility_false" name="visibility" value="0" require_once>
            <ul class="text-danger" id="nameAlert"></ul>
        </div>

        <script>
            function multiplyPrice() {
                let prevprice = document.getElementById("prev-price")
                let price = document.getElementById("price")
                price.value = prevprice.value * 100
            }
        </script>
        <button onclick="multiplyPrice()" type="submit">Salva</button>
    </form>
    </div>


@endsection