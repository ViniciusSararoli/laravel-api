<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Comum_function extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function getListaPrecosPrazos($param){
        $isEletronica = false;
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
            switch(strtolower($param['url_produto'])){
                case 'jogo-playstation':
                    $valor = Statics::jogo_playstation($tipoDeEnvio);
                    $idProduto = 1;
                    break;
                    
                    default:
                        return ['resposta'=>'erro','msg'=>'Produto não existe'];
                        break;
            }            
            $prazoEntrega = Statics::calcularPrazo(strtolower($param['url_produto']),$isEletronica);
            $compras[0]['url']        = $url_servico_certidao;  
            $compras[0]['valor']      = $valor;
            $compras[0]['quantidade'] = 1;
            $listaServicos['total'] = $total = $valor;
            
            $listaServicos['total'] = $total;        
        if($total>0){
            $saida = ['resposta'=>'ok','servicos'=>$compras,'total'=>round($listaServicos['total'],2),'prazo'=>$prazoEntrega,'tipoEnvio'=>$tipoDeEnvio,'formato'=>$formato];
        }else{
            $saida = ['resposta'=>'erro','msg'=>'Erro em '.$param['url_produto'].' - Valor zerado'];
        }
        
        return $saida;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    static function estadosURL($ufStrg){
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
    
    static function tirarAcentos($string){
        return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
