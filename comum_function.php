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

function getListaPrecosPrazos($param){
    
    if($param['formato'] == 'fisico'){
        $formato = 'correios';
        $tipoDeEnvio = 0;
    }elseif($param['formato'] == 'eletronico'){ 
        $formato = 'email';
        $isEletronica = true;
        $tipoDeEnvio = 1;
    }else{
        return ['resposta'=>'erro','msg'=>'Erro de formato',"formatos"=>"fisico/eletronico"];
    }
    
    $url_servico_certidao = $param['url_produto'].'_'.$formato;
    $x=0;
    
        $idProduto = 0;
        switch(strtolower($param['url_tipo_certidao'])){
            case 'jogo-playstation':
                $valor = Statics::jogo_playstation($tipoDeEnvio);
                $idProduto = 1;
                break;
                
                default:
                    return ['resposta'=>'erro','msg'=>'Produto não existe'];
                    break;
        }
        
        $valor = Statics::desconto_valor_fixo($dadosUsuario[0]['idlogin'],$tipoCertidaoId,'',$tipoDeEnvio,$valor);
        $prazoEntrega = Statics::calcularPrazo(strtolower($param['url_tipo_certidao']),$param['url_estado'],str_replace("_", " ", $param['url_cidade']),$param['lista_url_cartorio'][0],$isEletronica,$isInternacional,$listaServicos['inteiroTeor'],$listaServicos['juramentado']);
        $compras[0]['url']        = $url_servico_certidao; 
        if($param['url_tipo_certidao'] <> "diligencia") {
            $compras[0]['servico']    = 'Documento';
        }  
        $compras[0]['valor']      = $valor;
        $compras[0]['quantidade'] = 1;
        $listaServicos['total'] = $total = $valor;
        if($adicionais['pasta_protecao']>0){
            $compras[1]['url']        = 'pasta_protecao';
            $compras[1]['servico']    = 'Pasta de Proteção';
            $compras[1]['valor']      = 5;
            $compras[1]['quantidade'] = 1;
            $total += $compras[1]['valor'];
        }
        $listaServicos['total'] = $total;
        $compras = json_decode(SaidaJson::imprimir($compras),true);
    }
    if($total>0 || cliente_premium()){
        if(cliente_premium()){
            $listaServicos = json_decode(SaidaJson::imprimir($listaServicos),true);
        }
        $saida = ['resposta'=>'ok','servicos'=>$compras,'total'=>round($listaServicos['total'],2),'prazo'=>$prazoEntrega,'tipoEnvio'=>$tipoDeEnvio,'formato'=>$formato,'listaCartorio'=>$listaCartorios];
    }else{
        $saida = ['resposta'=>'erro','msg'=>'Erro em '.$param['url_tipo_certidao'].' - Valor zerado'];
    }
    
    return $saida;
}
?>