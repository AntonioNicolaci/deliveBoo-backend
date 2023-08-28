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
    <div>
        @foreach ($plates as $plate)
        {{$plate->name}}
        @endforeach
    </div>
</div>
@endsection
