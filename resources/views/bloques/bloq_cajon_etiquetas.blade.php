
<div class="cajon-etik">

    {{-- obtendo una lista separando el string obtenido de la base de datos en etiquetas individuales --}}
    @php $listaEtiquetas = Util::getListFromString($etiquetas) @endphp


    {{-- loop for etiquetas --}}
    @foreach ($listaEtiquetas as $etiqueta)

        {{-- se muestra la etiqueta con su enlace --}}
        <div class="overEtiqueta">
        <a href="URL('/buscar/etiqueta/{{ $etiqueta }}')" class="">
            <div class="etiqueta">
                <p>{{ $etiqueta }}</p>
            </div>
        </a>
        </div>

    @endforeach

</div>
