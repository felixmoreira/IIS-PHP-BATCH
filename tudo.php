<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PC</title>
    <link rel="icon" href="favicon.png" type="image/png">
    <link rel="stylesheet" href="style.css">
</head>
<?php
include_once "script.php";
?>
<body>
<a href="index.php"><button class="bt01">Voltar</button></a>
<br><br>
<?php
$pasta = "historico/";
$diretorio = dir($pasta);
while(($arquivo = $diretorio->read()) !== false) {
    if($arquivo!="." && $arquivo!=".."){
        echo "<a href='index.php?data=".$arquivo."'><button>".$arquivo."</button></a>";
    }
}
?>
</body>
</html>