@extends('layouts/layout_principal')

@section('content')


    <div class = "container">
        <h1>Envia una imagen o gif</h1>
        <p>
            Envia un aporte realizado por tí para que los usuarios puedan votarlo a traves de la moderación y, si
            se trata de una viñeta original o divertida, pueda ser publicada en la pagina para que todos podamos disfrutarla
            y comentar que nos ha parecido. <b>¡Suerte!</b>
        </p>
        <div id="enviando">
            <form action="{{ URL('control/subirImg') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="entrada">
                    <label for="title">Titulo</label>
                    <input type="text" name="title" id="title" />
                </div>
                <div class="entrada">
                    <label for="archivo">Archivo</label>
                    <input type="file" name="archivo" id="archivo" />
                <br />
                <output id="list"><div id="preV"></div></output>
                </div>
                <div class="entrada">
                    <label for="etiquetas">Etiquetas separadas por ; <i>(Ej: pokemon;3ª gen;pikachu)</i></label>
                    <input type="text" name="etiquetas" id="etiquetas" />
                </div>
                <input type="hidden" name="tipo" value="img" />
                <input type="submit" value="enviar" />
            </form>
            <div id="objecion">
                <p>
                    Actualmente permitimos enviar aportes sin necesidad de estar registrado pero, si quieres que todos sepan
                    que la viñeta es tuya, envia la viñeta mientras te encuentras registrado. Además, los usuarios podran acceder
                    a tu perfil para ver que otras viñetas has publicado. <b>¡Animate!</b>
                </p><div id="objecion-anadido">
                <p>
                    En un futuro solo se permitirá el envio de viñetas por usuarios anónimos.
                </p></div>
            </div>
        </div>
    </div>

@endsection()

{{-- Se añade por script la funcion de previsualizacion de la vinieta --}}
@section('aditionalScript')
    <script> document.getElementById('archivo').addEventListener('change', previsualizar, false); </script>
@endsection()

