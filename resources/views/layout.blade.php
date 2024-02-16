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
    <img src="https://pinotepa.tecnm.mx/wp-content/uploads/2020/03/LOGO_TECNM_BLANCO.png" alt="Logo" class="logo">
    <h1></h1>
</div>


<div class="container">
    
    @yield('contenido')
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
</style>