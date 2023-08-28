@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center">
            
        @foreach ($restaurants as $restaurant)
             {{ $restaurant->rest_name }}
        <!-- Altri dettagli del ristorante possono essere visualizzati qui -->
        @endforeach
            
    </div>
</div>
@endsection
