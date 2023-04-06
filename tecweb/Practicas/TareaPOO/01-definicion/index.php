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
        require_once __DIR__ . '/Persona.php';

        $per1 = new Persona;
        $per1->setNombre('Fulano');
        $per1->setEdad(20);
        $per1->mostrar();

        $per2 = new Persona;
        $per2->setNombre('Mengano');
        $per2->setEdad(16);
        $per2->mostrar();
    ?>

</body>
</html>