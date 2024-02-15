<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud-prueba</title>
</head>
<body>

<!-- Navbar -->
<div class="navbar">
    <img src="https://pinotepa.tecnm.mx/wp-content/uploads/2020/03/LOGO_TECNM_BLANCO.png"  alt="Logo" class="logo">
    <h1></h1>
</div>

<!-- Contenedor principal -->
<div class="container">
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
</div>
    
</body>
</html>

<style>
    body {
        background-color: #ffffff; 
        color: #000000; 
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
    }


    .navbar {
        background-color: #130145;
        padding: 10px;
        display: flex;
        align-items: center;
    }

    .logo {
        max-width: 200px;
        height: auto;
        margin-right: auto;
    }

    .container {
        max-width: 800px;
        margin: 50px auto;
        background: #ffffff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

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