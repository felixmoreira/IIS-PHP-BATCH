<?php
function entradaDadosTXT($link){
    
    $texto = file_get_contents($link);
    $usuario = explode("/", $link);
    $usuario = $usuario[count($usuario)-1];
    $usuario = str_replace(".txt", "", $usuario);
    $id = md5($usuario);
    //separa linhas
    $linhas = explode("\n", $texto);
    $nome_host = "";
    $sistema_op = "";
    $user_registro = "";
    $identificacao = "";
    $fabricante = "";
    $modelo = "";
    $arquitetura = "";
    $bios = "";
    $ram = "";
    $dominio = "";
    $servidor = "";
    $totalrede = "";
    $ip = "";
    //verificar linha
    foreach ($linhas as $n_linha => $texto_linha) {
        if (strpos($texto_linha, 'Nome do host') !== false) {
            $nome_host = explode(": ",$texto_linha);
            $nome_host = ltrim($nome_host[1]);
            //return $nome_host;
        }
        if (strpos($texto_linha, 'Nome do sistema operacional') !== false) {
            $sistema_op = explode(": ",$texto_linha);
            $sistema_op = ltrim($sistema_op[1]);
            //return $sistema_op;
        }
        if (strpos($texto_linha, 'Propriet') !== false) {
            if (strpos($texto_linha, 'rio registrado') !== false) {
                $user_registro = explode(": ",$texto_linha);
                $user_registro = ltrim($user_registro[1]);
                //return $user_registro;
            }
        }
        if (strpos($texto_linha, 'Identifica') !== false) {
            if (strpos($texto_linha, 'o do produto') !== false) {
                $identificacao = explode(": ",$texto_linha);
                $identificacao = ltrim($identificacao[1]);
                //return $identificacao;
            }
        }
        if (strpos($texto_linha, 'Fabricante do sistema') !== false) {
            $fabricante = explode(": ",$texto_linha);
            $fabricante = ltrim($fabricante[1]);
            //return $fabricante;
        }
        if (strpos($texto_linha, 'Modelo do sistema') !== false) {
            $modelo = explode(": ",$texto_linha);
            $modelo = ltrim($modelo[1]);
            //return $modelo;
        }
        if (strpos($texto_linha, 'Tipo de sistema') !== false) {
            $arquitetura = explode(": ",$texto_linha);
            $arquitetura = ltrim($arquitetura[1]);
            //return $arquitetura;
        }
        if (strpos($texto_linha, 'Vers') !== false) {
            if (strpos($texto_linha, 'o do BIOS') !== false) {
                $bios = explode(": ",$texto_linha);
                $bios = ltrim($bios[1]);
                //return $bios;
            }
        }
        if (strpos($texto_linha, 'Mem') !== false) {
            if (strpos($texto_linha, 'ria f') !== false) {
                if (strpos($texto_linha, 'sica total') !== false) {
                    $ram = explode(": ",$texto_linha);
                    $ram = ltrim($ram[1]);
                    //return $ram;
                }
            }
        }
        if (strpos($texto_linha, 'Dom') !== false) {
            if (strpos($texto_linha, 'nio') !== false) {
                $dominio = explode(": ",$texto_linha);
                $dominio = ltrim($dominio[1]);
                //return $dominio;
            }
        }
        if (strpos($texto_linha, 'Servidor de Logon') !== false) {
            $servidor = explode(": ",$texto_linha);
            $servidor = ltrim($servidor[1]);
            //return $servidor;
        }
        if (strpos($texto_linha, 'Placa(s) de Rede') !== false) {
            $totalrede = explode(": ",$texto_linha);
            $totalrede = ltrim($totalrede[1]);
            //return $totalrede;
        }
        if (strpos($texto_linha, 'Endere') !== false) {
            if (strpos($texto_linha, 'o(es) IP') !== false) {
                $ip = ltrim($linhas[$n_linha + 1]);
                $ip = explode(": ", $ip);
                $ip = $ip[1];
                //return $ip;
            }
        }
    }
    return "<td>".$usuario."</td><td>".$nome_host."</td><td>".$sistema_op."</td><td>".$user_registro."</td><td>".$fabricante."</td><td>".$modelo."</td><td>".$ram."</td><td>".$ip."</td></tr>
    <tr style=''><td colspan='8'> ⇱ Data e Hora: ".date('d/m/Y H:i:s', filemtime($link))." | dominio: ".$dominio." | servidor: ".$servidor." | identificacao: <a href='".$link."' target='_blank'>".$identificacao."</a> | Arquitetura: ".$arquitetura." | Bios: ".$bios." | Rede: <a href='".str_replace(".txt","_rede.txt", $link)."' target='_blank'>".$totalrede."</a></td>";
}

function dia_da_semana($data){

// Converte a string em um objeto de data
$timestamp = strtotime($data);

// Obtém o dia da semana
$dia_da_semana = date('l', $timestamp);

// Imprime o dia da semana
switch ($dia_da_semana) {
    case 'Monday':
        return '<h2>(segunda-feira)</h2>';
        break;
    case 'Tuesday':
        return '<h2>(terça-feira)</h2>';
        break;
    case 'Wednesday':
        return '<h2>(quarta-feira)</h2>';
        break;
    case 'Thursday':
        return '<h2>(quinta-feira)</h2>';
        break;
    case 'Friday':
        return '<h2>(sexta-feira)</h2>';
        break;
    case 'Saturday':
        return '<h2>(sábado)</h2>';
        break;
    case 'Sunday':
        return '<h2>(domingo)</h2>';
        break;

    default:
        # code...
        break;
}
}

function json($link){
    
    $texto = file_get_contents($link);
    $usuario = explode("/", $link);
    $usuario = $usuario[count($usuario)-1];
    $usuario = str_replace(".txt", "", $usuario);
    $id = md5($usuario);
    //separa linhas
    $linhas = explode("\n", $texto);
    $nome_host = "";
    $sistema_op = "";
    $user_registro = "";
    $identificacao = "";
    $fabricante = "";
    $modelo = "";
    $arquitetura = "";
    $bios = "";
    $ram = "";
    $dominio = "";
    $servidor = "";
    $totalrede = "";
    $ip = "";
    //verificar linha
    foreach ($linhas as $n_linha => $texto_linha) {
        if (strpos($texto_linha, 'Nome do host') !== false) {
            $nome_host = explode(": ",$texto_linha);
            $nome_host = ltrim($nome_host[1]);
            //return $nome_host;
        }
        if (strpos($texto_linha, 'Nome do sistema operacional') !== false) {
            $sistema_op = explode(": ",$texto_linha);
            $sistema_op = ltrim($sistema_op[1]);
            //return $sistema_op;
        }
        if (strpos($texto_linha, 'Propriet') !== false) {
            if (strpos($texto_linha, 'rio registrado') !== false) {
                $user_registro = explode(": ",$texto_linha);
                $user_registro = ltrim($user_registro[1]);
                //return $user_registro;
            }
        }
        if (strpos($texto_linha, 'Identifica') !== false) {
            if (strpos($texto_linha, 'o do produto') !== false) {
                $identificacao = explode(": ",$texto_linha);
                $identificacao = ltrim($identificacao[1]);
                //return $identificacao;
            }
        }
        if (strpos($texto_linha, 'Fabricante do sistema') !== false) {
            $fabricante = explode(": ",$texto_linha);
            $fabricante = ltrim($fabricante[1]);
            //return $fabricante;
        }
        if (strpos($texto_linha, 'Modelo do sistema') !== false) {
            $modelo = explode(": ",$texto_linha);
            $modelo = ltrim($modelo[1]);
            //return $modelo;
        }
        if (strpos($texto_linha, 'Tipo de sistema') !== false) {
            $arquitetura = explode(": ",$texto_linha);
            $arquitetura = ltrim($arquitetura[1]);
            //return $arquitetura;
        }
        if (strpos($texto_linha, 'Vers') !== false) {
            if (strpos($texto_linha, 'o do BIOS') !== false) {
                $bios = explode(": ",$texto_linha);
                $bios = ltrim($bios[1]);
                //return $bios;
            }
        }
        if (strpos($texto_linha, 'Mem') !== false) {
            if (strpos($texto_linha, 'ria f') !== false) {
                if (strpos($texto_linha, 'sica total') !== false) {
                    $ram = explode(": ",$texto_linha);
                    $ram = ltrim($ram[1]);
                    //return $ram;
                }
            }
        }
        if (strpos($texto_linha, 'Dom') !== false) {
            if (strpos($texto_linha, 'nio') !== false) {
                $dominio = explode(": ",$texto_linha);
                $dominio = ltrim($dominio[1]);
                //return $dominio;
            }
        }
        if (strpos($texto_linha, 'Servidor de Logon') !== false) {
            $servidor = explode(": ",$texto_linha);
            $servidor = ltrim($servidor[1]);
            //return $servidor;
        }
        if (strpos($texto_linha, 'Placa(s) de Rede') !== false) {
            $totalrede = explode(": ",$texto_linha);
            $totalrede = ltrim($totalrede[1]);
            //return $totalrede;
        }
        if (strpos($texto_linha, 'Endere') !== false) {
            if (strpos($texto_linha, 'o(es) IP') !== false) {
                $ip = ltrim($linhas[$n_linha + 1]);
                $ip = explode(": ", $ip);
                $ip = $ip[1];
                //return $ip;
            }
        }
    }

    $json = [
        "data" => date('d/m/Y', filemtime($link)),
        "hora" => date('H:i:s', filemtime($link)),
        "usuario" => str_replace("\r","",$usuario),
        "nome_host" => str_replace("\r","",$nome_host),
        "sistema_op" => str_replace("\r","",$sistema_op),
        "user_registro" => str_replace("\r","",$user_registro),
        "fabricante" => str_replace("\r","",$fabricante),
        "modelo" => str_replace("\r","",$modelo),
        "ram" => str_replace("\r","",$ram),
        "dominio" => str_replace("\r","",$dominio),
        "servidor" => str_replace("\r","",$servidor),
        "link" => $link,
        "identificacao" => str_replace("\r","",$identificacao),
        "arquitetura" => str_replace("\r","",$arquitetura),
        "bios" => str_replace("\r","",$bios),
    ];


    if($nome_host != "" &&
    $sistema_op != "" &&
    $user_registro != "" &&
    $identificacao != "" &&
    $fabricante != "" &&
    $modelo != "" &&
    $arquitetura != "" &&
    $bios != "" &&
    $ram != "" &&
    $dominio != "" &&
    $servidor != "" &&
    $totalrede != "" &&
    $ip != ""){
        return $json;
    }
}
?>
