@extends('layout')

@section('contenido')
    <h2>DATOS DEL ALUMNO</h2>

    <!-- Formulario -->
    <form method="post" action="/formulario">
        @csrf

        <label for="matricula">Matrícula:</label>
        <input type="text" name="matricula" required>
        <br>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>
        <br>
        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" required>
        <br>
        <label for="semestre">Semestre:</label>
        <input type="text" name="semestre" required>
        <br>
        <label for="grupo">Grupo:</label>
        <input type="text" name="grupo" required>
        <br>
        <label for="extra-escolar">Extra-Escolar:</label>
        <input type="text" name="extra-escolar" required>

        <button type="submit">Enviar</button>
    </form>
@endsection

<style>
    /* Estilos del formulario */
    form {
        margin-top: 20px;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input {
        width: 100%;
        padding: 8px;
        margin-bottom: 15px;
    }

    button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 15px;
        border: none;
        cursor: pointer;
    }

    button:hover {
        background-color: #09b353; 
    }
    
    @media (max-width: 768px) {
        .container {
            width: 90%;
        }
    }
</style>