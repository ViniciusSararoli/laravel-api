<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Cliente;
use App\Http\Controllers\Comum_function;


class ControllerCalcularCarrinho extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function CalcularCarrinho()
    {
        $valorTotal = 0;
        $lista_pedido = json_decode($_POST['carrinho'], true);
        foreach($lista_pedido as $iteration => $pedido) {
            $certidao = null;
            $paramPedido = [];
            // $msg = "Compra cadastrada";
            $result = Comum_function::getListaPrecosPrazos($pedido);
            if ($result['resposta'] != 'ok') {
                $listaSaida['resposta'] = 'error';
                $listaSaida['msg']      = $result['msg'];
                echo json_encode($listaSaida);
                die;
            }
            $resp           = $result['resposta'];
            $compras           = $result['servicos'];
            $total          = (float)$result['total'];
            $tipoDeEnvio    = $result['formato'];
            $prazoEntrega   = $result['prazo'];
            // $listaClass[] = get_class($certidao);
            $listaSaida['carrinho'][] = array("pedido" => $compras, "total" => round($total, 2), "previsao_entrega" => $prazoEntrega);
            
            $valorTotal += $total;
        }
        $listaSaida['resposta'] = 'ok';
        $listaSaida['debitado'] = round($valorTotal, 2);
        $listaSaida['msg']      = '';
        echo json_encode($listaSaida);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
