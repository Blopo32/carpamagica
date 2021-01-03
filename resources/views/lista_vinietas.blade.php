@extends('layouts/layout_principal')

@section('content')


    <div class="ultimos_container">
        <div class="main_contenido">

            @foreach($listaVinietas as $vinieta)

                @include('bloques.bloq_vinieta', $vinieta)

            @endforeach

        </div>
    </div>


@endsection()
