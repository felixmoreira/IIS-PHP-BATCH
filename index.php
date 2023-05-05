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
    <?php
    if(isset($_GET["data"]) && $_GET["data"]!=""){
        echo '<a href="index.php"><button class="bt01">Inicio</button></a>';
    }
    ?>
<a href="tudo.php"><button class="bt01">Ver Tudo</button></a>
<br><br>
<?php
if(isset($_GET["data"]) && $_GET["data"]!=""){
    $data = $_GET["data"];
}else{
    $data = date("d-m-Y");
}
$dv_data = explode("-", $data);
if(strlen($dv_data[0])>2){
    $data = $dv_data[2]."-".$dv_data[1]."-".$dv_data[0];
}
echo "<h1>".$data."</h1><br>";
echo dia_da_semana($data)."<br>";
?>
<form action="" method="get">
<input type="date" id="campo-data" name="data">
<input type="submit" value="Carregar"><br>
</form>
<table>
    <thead>
        <tr>
            <th>USUARIO</th>
            <th>NOME PC</th>
            <th>SISTEMA OP.</th>
            <th>USUARIO ADM</th>
            <th>FABRICANTE</th>
            <th>MODELO</th>
            <th>MEMORIA</th>
            <th>IP</th>
        </tr>
    </thead>
    <tbody>
<?php
$pasta = "historico/".$data."/";
if(is_dir($pasta)){
$diretorio = dir($pasta);
while(($arquivo = $diretorio->read()) !== false) {
 if($arquivo!="." && $arquivo!=".."){
    if (strpos($arquivo, '_rede') == false) {
        echo "<tr style='font-weight: bold;'>".entradaDadosTXT($pasta.$arquivo)."</tr>";
    }
 }
}
$diretorio->close();
}
?>
    </tbody>
    
</table>
<br><br>
<a href="json.php?data=<?php echo $data; ?>" target='_blank'><button class="bt01">Gerar JSON</button></a>
</body>
</html>