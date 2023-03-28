<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        ol,
        ul {
            list-style-type: none;
        }
      
        #form {
            width: 30%;
        }
        #boton {
            background-color: black;
            color: white;
            border-radius: 1em;
        }
    </style>  <body style="background-color:white;">
</body>
    <script type="text/javascript">
        function verificarEntrada(control) {
            if (control.value == '')
                alert('Digite los datos');
        }
        function verificar(control) {
            if (control.value.length > 100) {
                control.focus();
                alert('Maximo 100 carateres');
                control.value = "";
            }
        }
        function verificarM(control) {
            if (control.value == "") {
                alert('Seleccionar  marca');
            }
        }
        function verificarMod(control) {
            if (control.value.length > 25) {
                control.focus();
                alert('Maximo 25 carateres');
                control.value = "";
            }
        }
        function verificarP(control) {
            precio = parseFloat(control.value);
            if (precio < 99.99) {
                control.focus();
                alert('El precio debe ser mayor a $99.99');
                control.value = "";
            }
        }
        function verificarD(control) {
            if (control.value.length > 250) {
                control.focus();
                alert('Maximo 250 carateres!!');
                control.value = "";
            }
        }
        function verificarU(control) {
            uni = parseInt(control);
            if (uni <= 0) {
                control.focus();
                alert('Ingreso un dato erroneo!!');
                control.value = "";
            }
        }
        function verificarImg(control) {
            if (control.value == "") {
                control.value = "img/imagen.png";
            }
        }
    </script>
    <title>Practica 7</title>
</head>
<body>
    <div id="form">
        <form method="POST" action="http://localhost/tecweb/Practicas/P06/set_producto_v2.php"
            style="font-family: Arial, Helvetica, sans-serif;">
            <h1><strong>Registro de  Ingreso de Productos</strong></h1>
            <h3>Ingresa los datos correctamente.</h3>
            <p><br></p>
            <ul>
                <li>Nombre: <input id="nombre" name="nombre" type="text" onBlur="verificar(this)" required /></li>
                <br>
                <li>Marca: <select name="marca" id="marca" onchange="verificarM(this)">
                        <option value="">...</option>
                        <option value="ROG">ROG</option>
                        <option value="Hyperx">Hyperx</option>
                        <option value="Steren">Steren</option>
                        <option value="Samsung">Samsung</option>
                        <option value="Asus">Asus</option>
                        <option value="HP">HP</option>
                        <option value="ADATA">ADATA</option>
                        <option value="Ocolus">Ocolus</option>
                    </select>
                    <br><br>
                <li>Modelo: <input id="modelo" name="modelo" type="text" onBlur="verificarMod(this)" required /></li>
                <br>
                <li>Precio: <input id="precio" name="precio" type="text" placeholder="$000.00"
                        onchange="verificarP(this)" required /></li>
                <br>
                <li>Detalles: <br>
                    <textarea name="detalles" rows="3" cols="50" id="detalles"
                        placeholder="Maximo 250 caracteres." onBlur="verificarD(this)"></textarea>
                    <br><br>
                <li>Unidades: <input id="unidades" name="unidades" type="text" onBlur="verificarU(this)" required />
                </li>
                <br>
                <li>Imagen: <input id="imagen" name="imagen" type="text" placeholder="img/ejemplo.png" /></li>
                <br>
            </ul>
            <p style="text-align: center;"><input id="boton" type="submit" value="INSERTAR"
                    onclick="verificarImg(imagen)" /></p>
        </form>
    </div>
</body>
</html>