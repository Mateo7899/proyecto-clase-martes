<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Producto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: white;
            padding: 30px;
            border-radius: 12px;
            width: 400px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #2a5298;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 6px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        textarea {
            resize: none;
            height: 80px;
        }

        button {
            width: 100%;
            margin-top: 20px;
            padding: 10px;
            background-color: #2a5298;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background-color: #1e3c72;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Registro de Producto</h2>
        <form>
            <label for="nombre">Nombre del Producto</label>
            <input type="text" id="nombre" name="nombre" placeholder="Ingrese el nombre">

            <label for="precio">Precio</label>
            <input type="number" id="precio" name="precio" placeholder="Ingrese el precio">

            <label for="marca">Marca</label>
            <input type="text" id="marca" name="marca" placeholder="Ingrese la marca">

            <label for="descripcion">Descripción</label>
            <textarea id="descripcion" name="descripcion" placeholder="Ingrese la descripción"></textarea>

            <button type="submit">Registrar</button>
        </form>
    </div>

</body>
</html>
