

<?php
session_start();

$count = 0;
if (isset ($_SESSION['counter']))
    $count = $_SESSION['counter'];
$count++;
if($count == 1){
    echo "Bienvenido";
    $_SESSION['counter'] = $count;
    $_SESSION["random"] = rand(1, 100);
} else {
    $respuesta = $_POST['number'];

    $random = $_SESSION["random"];
    if ( $random == $respuesta) {
        echo " ","Bien !! lo intentaste ", $count-1, " veces.";
        session_unset();
        $count = 0;
    } else {
        echo " Intento: ", $count-1, "<br>";
        echo " Tu respuesta: ", $respuesta, "<br>";
        //echo " Random: ", $random, "<br>";
        if ($count <= 3) {
            if ($random < $respuesta)
                echo " es mayor que mi número.";
            else 
                echo " es menor que mi número.";
                
            $_SESSION["counter"]=$count;
        } else {
            echo "<h4>Game Over !!</h4> La respuesta correcta es: ", $random;
            session_unset();
            $count = 0;
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Function</title>
</head>
<body>

    <form method="post">
    <?php
    if ($_SESSION['counter'] == 0){
        echo "";
    } else {
        echo "<label> Adiviná un número entre (1 to 100) </label> <br />";
        echo '<input type="text" name="number" />';
        echo "<br /><br />";
    }
    ?>
    <input type="submit" value="<?php if($_SESSION['counter'] == 0) echo "Probar otra vez"; else echo "enviar"; ?> " name="submit" /> <br />
    </form>
</body>
</html>

