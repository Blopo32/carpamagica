@extends('layouts/layout_principal')

@section('content')


    <div class = "container">
        <div id="prof">
            <img src="{{ url('images/recursos/carpa_prof.png') }}" alt="#" width="300" height="600">
        </div>
        <div id="registro">
            <form method="POST" action="{{ url('/signUp/createUser') }}">
                @csrf
                <div class="introRegistro">
                    <p id="introHistoria">&#161;Hola! &#161;Este es el mundo de carpamagica!</p>
                    <p id="introHistoria">Me llamo CarpaMagiK</p>
                    <p id="introHistoria">&#161;Pero la gente me llama PROFESOR MEME!</p>
                    <p id="introHistoria">&#161;Este mundo esta habitado por unas criaturas llamadas MEMES!</p>
                    <p id="introHistoria">Para algunos, los MEMES son aburridos.</p>
                    <p id="introHistoria">Pero para otros son una gran diviersion.</p>
                    <p id="introHistoria">En cuanto a mi... Estudio a los MEMES como profesion.</p>
                    <p id="introHistoria">Ayudame con mi estudio puntuando y comentando los memes de la pagina.</p>
                    <p id="introHistoria">&#161;O incluso puedes enviarnos uno creado por ti!</p>
                </div>
                
                <p id="introHistoria"> Bueno, cuentame algo de ti.</p>
                <p>
                    <select name="genero" id="combogen">
                        <option value=0>&#191;Eres chico o chica?</option>
                        <option value='chico'>chico</option>
                        <option value='chica'>chica</option>
                        <option value='pokemon'>pokemon</option>
                        <option value='carpa'>carpa</option>
                    </select>
                </p>
                <p id="introHistoria">Dime como te llamas.</p>
                <div class="registroDatos">  
                    <p>Nombre de usuario: <input type="text" name="nick"></p>
                    <p>Contrase&ntilde;a: <input type="password" name="pass"></p>
                    <p>Repite contrase&ntilde;a: <input type="password" name="repass"></p>
                </div>
                <p id="introHistoria">&#161;Tu propia leyenda MEME esta a punto de comenzar!</p>
                <p id="introHistoria">&#161;Te espera un mundo de risas y diversion con los MEMES!</p>
                <p id="error_registro">
                    <input id="confirmar_registro" class="boton_disenio_estilozo_blue" type="submit" value="¡Adelante!" name='registro'> 
                    
                    {{-- Check if it is necesary show an error message --}}
                    @if($errors->any())
                        {{ $msgError }}
                    @endif

                </p>
            </form>
        </div>
    </div>
    <p id="final_container"></p>


@endsection()
