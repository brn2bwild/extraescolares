@extends('layout')

@section('contenido')
    <!-- Formulario -->
    <form method="post" action="/formulario">
        @csrf

        <label for="matricula">Matrícula:</label>
        <input type="text" name="matricula" required>

        <button type="submit">Obtener constancia</button>
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
        background-color: #45a049; 
    }
    
    @media (max-width: 768px) {
        .container {
            width: 90%;
        }
    }
</style>