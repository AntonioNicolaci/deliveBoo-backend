@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2>

    <div class="row justify-content-center">

     
        @foreach ($restaurants as $restaurant)
             <div>
                Nome attività: {{ $restaurant->rest_name }}
             </div>
             <div>
                P.IVA: {{ $restaurant->vat }}
             </div>
             <div>
                Indirizzo: {{ $restaurant->address}}
             </div>
             <img src={{Vite::asset("resources/img/$restaurant->img")}} alt="">

        
        @endforeach
        
    </div>

    <h1>I Tuoi Piatti</h1>

    <div class="d-flex">
        <h5>Crea un nuovo piatto</h5>
        <a class="btn btn primary" href="{{ route('plates.create') }}">Crea</a>
    </div>


    <table class="table">
        <thead>
          <tr>
            <th scope="col">Nome</th>
            <th scope="col">Ingredienti</th>
            <th scope="col">Prezzo</th>
            <th scope="col">Visibilità</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($plates as $plate)
            <tr>
                <td>{{$plate->name}}</td>
                <td>{{$plate->ingredients}}</td>
                <td>{{$plate->price}}</td>
                <td>{{$plate->visibility ? 'Sì' : 'No'}}</td>
              </tr>
            @endforeach

        </tbody>
      </table>

</div>
@endsection
