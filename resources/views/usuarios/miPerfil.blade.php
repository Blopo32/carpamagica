@extends('layouts/layout_principal')

@section('content')


    <div class="ultimos_container">



       @php $count = 1 @endphp
        @while ($count <= 898)

            <a href="perfil/setPerfil/{{ $count }}" style="text-decoration: none">
                <div class="avatarOption redondo">
                    <!-- <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/{{ $count }}.png" alt="#"> linea para los diseñor originales -->
                    <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/dream-world/{{ $count }}.svg" alt="#">
                </div>
            </a>

            @php $count = $count + 1 @endphp

        @endwhile






    </div>

@endsection()





