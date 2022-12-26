<?php
function estadosURL($ufStrg){
    $uf["AC"] = "Acre";
    $uf["AL"] = "Alagoas";
    $uf["AM"] = "Amazonas";
    $uf["AP"] = "Amapá";
    $uf["BA"] = "Bahia";
    $uf["CE"] = "Ceará";
    $uf["DF"] = "Distrito Federal";
    $uf["ES"] = "Espírito Santo";
    $uf["GO"] = "Goiás";
    $uf["MA"] = "Maranhão";
    $uf["MG"] = "Minas Gerais";
    $uf["MS"] = "Mato Grosso do Sul";
    $uf["MT"] = "Mato Grosso";
    $uf["PA"] = "Pará";
    $uf["PB"] = "Paraíba";
    $uf["PE"] = "Pernambuco";
    $uf["PI"] = "Piauí";
    $uf["PR"] = "Paraná";
    $uf["RJ"] = "Rio de Janeiro";
    $uf["RN"] = "Rio Grande do Norte";
    $uf["RO"] = "Rondônia";
    $uf["RR"] = "Roraima ";
    $uf["RS"] = "Rio Grande do Sul";
    $uf["SC"] = "Santa Catarina";
    $uf["SE"] = "Sergipe";
    $uf["SP"] = "São Paulo";
    $uf["TO"] = "Tocantins";
    return $uf[$ufStrg];
}

function tirarAcentos($string){
    return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
}
?>