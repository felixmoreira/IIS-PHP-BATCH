<?php
header('Content-Type: application/json; charset=utf-8');

include_once "script.php";

if(isset($_GET["data"]) && $_GET["data"]!=""){
    $data = $_GET["data"];
}else{
    $data = date("d-m-Y");
}
$dv_data = explode("-", $data);
if(strlen($dv_data[0])>2){
    $data = $dv_data[2]."-".$dv_data[1]."-".$dv_data[0];
}

$pasta = "historico/".$data."/";
$json = "";
if(is_dir($pasta)){
$diretorio = dir($pasta);
while(($arquivo = $diretorio->read()) !== false) {
 if($arquivo!="." && $arquivo!=".."){
    if (strpos($arquivo, '_rede') == false) {

        if($json==""){
            $json = json_encode(json($pasta.$arquivo));
        }else{
            $json .=",".json_encode(json($pasta.$arquivo));
        }
    }
 }
}
$diretorio->close();
}
echo "[".$json."]";
?>