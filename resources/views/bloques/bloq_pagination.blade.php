
{{-- paginación de lista de vinietas --}}
@if($totalPages > 1)
    <div class="paginacion">
        <ul>
            {{-- primera pagina --}}
            @if($page > 3) <a class="pagina-enlace" href="{{ URL($routeUrl .'/1') }}"><li><<</li></a> @endif
            {{-- pagina anterior --}}
            @if($page > 1) <a class="pagina-enlace" href="{{ URL($routeUrl .'/'. ($page - 1)) }}"><li><</li></a> @endif

            {{-- calculo que botones de navegacion entre paginas intermedias son encesarios --}}
            @php
                if($page <= 2) 
                    $pagEnlace = 1;
                else
                    $pagEnlace = $page - 2;
            @endphp
            {{-- paginas intermedias --}}
            @while($pagEnlace <= $totalPages && $pagEnlace <= $page + 2)
            
                {{-- si es la actual el enlace esta disabled --}}
                @if($pagEnlace == $page)
                    <a class="pagina-actual" href="{{ URL($routeUrl .'/'. $pagEnlace) }}" onclick="return false;"><li>{{ $pagEnlace }}</li></a>
                @else
                    <a class="pagina-enlace" href="{{ URL($routeUrl .'/'. $pagEnlace) }}"><li>{{ $pagEnlace }}</li></a>
                @endif
                
                {{-- update loop var --}}
                @php $pagEnlace = $pagEnlace + 1 @endphp

            @endwhile
            
            {{-- primera siguiente --}}
            @if($page <= $totalPages - 1) <a class="pagina-enlace" href="{{ URL($routeUrl .'/'. ($page + 1)) }}"><li>></li></a> @endif
            {{-- pagina anterior --}}
            @if($page < $totalPages - 2) <a class="pagina-enlace" href="{{ URL($totalPages) }}"><li>>></li></a> @endif
        </ul>
    </div>
@endif
