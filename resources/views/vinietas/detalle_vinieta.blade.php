@extends('layouts/layout_principal')

@section('content')


    <div class="ultimos_container">
        <div class="main_contenido">

            <div class="container_aporte">
                @include('bloques.bloq_vinieta', $vinieta)
            </div>


            @include('bloques.bloq_comentarios', $comentList)



        </div>
    </div>

@endsection()



@section('aditionalScript')


@endsection()



