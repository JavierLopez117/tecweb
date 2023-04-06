<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once __DIR__ . '/Mascotas.php';

        $Mas1 = new Mascota;
        $Mas1->setNombre('Indiana');
        $Mas1->setEdad(5);
        $Mas1->setRaza('ROTWAILER');
        $Mas1->setPeso('5kg');
        $Mas1->mostrar();

        $Mas2 = new Mascota;
        $Mas2->setNombre('Milo');
        $Mas2->setEdad(3);
        $Mas1->setRaza('Puedle');
        $Mas1->setPeso('800g');
        $Mas2->mostrar();
    ?>

</body>
</html>