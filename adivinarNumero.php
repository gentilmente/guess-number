

<?php
session_start();

$count = 0;
if (isset ($_SESSION['counter']))
    $count = $_SESSION['counter'];
$count++;

$random = rand(1,100);

//if (isset ($_SESSION['random']))
//    $random = $_SESSION['random'];

if (isset ($_POST['number'])){
    $respuesta = $_POST['number'];
} else {
    $respuesta = -1;
}

if ($random == $respuesta) {
    echo " ","Bien !! lo intentaste ", $count, " veces.";
    session_unset();
    $count = 0;
} else {
    echo " Intento: ", $count, "<br>";
    if ($count < 4) {
        if (isset ($_POST['number'])) {
            if ($random < $respuesta)
                echo " Tu respuesta es mayor que el número.";
            else 
                echo " Tu respuesta es menor que el número";
        }
    } else {
        echo "<h4>Game Over !!</h4> La respuesta correcta es: ", $random;
        session_unset();
        $count = 0;
    }
}

$_SESSION["counter"]=$count;
//$_SESSION["random"]=$random;

?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Function</title>
</head>
<body>

    <form method="post">
    <label> Adiviná un número entre (1 to 100) </label> <br />
    
    <input type="text" name="number" value="<?php if (isset ($_POST['number'])) echo $respuesta, "puto"; ?>" />
    <br /><br />
    
    <input type="submit" value="enviar" name="submit" /> <br />
    </form>
</body>
</html>

