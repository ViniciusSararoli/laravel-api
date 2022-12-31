<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Cliente;
use Comum_function;

class ControllerCalcularCarrinho extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function CalcularCarrinho()
    {
        $lista_pedido = json_decode($_POST['carrinho'], true);
        foreach($lista_pedido as $iteration => $pedido) {
            $certidao = null;
            $paramPedido = [];
            // $msg = "Compra cadastrada";
            $result = getListaPrecosPrazos($pedido);
            if ($result['resposta'] != 'ok') {
                $listaSaida['resposta'] = 'error';
                $listaSaida['msg']      = $result['msg'];
                echo json_encode($listaSaida);
                die;
            }
            $compras        = $result['servicos'];
            $resp           = $result['resposta'];
            $total          = (float)$result['total'];
            $tipoDeEnvio    = $result['tipoEnvio'];
            $listaCartorio  = $result['listaCartorio'];
            $prazoEntrega   = $result['prazo'];
            // $listaClass[] = get_class($certidao);
            $listaSaida['carrinho'][] = array("pedido" => $compras, "total" => round($total, 2), "previsao_entrega" => $prazoEntrega);
            $valorTotal += $total;
        }
        $listaSaida['resposta'] = 'ok';
        $listaSaida['debitado'] = round($valorTotal, 2);
        $listaSaida['msg']      = '';
        $descontoEmpresa = SaidaJson::cliente_premium();
        if ($descontoEmpresa != null) {
            $lista_precos_pos = TabelaPrecosPosPagos::estimativa_composta($lista_pedido);
            $preco_pos_total = 0;
            foreach ($listaSaida['carrinho'] as $key => $item_pedido) {
                $listaSaida['carrinho'][$key]['total_pos_pago'] = 0;
                foreach ($listaSaida['carrinho'][$key]['pedido'] as $key_menor => $item_menor_pedido) {
                    $listaSaida['carrinho'][$key]['pedido'][$key_menor]['valor_pos_pago'] = $listaSaida['carrinho'][$key]['pedido'][$key_menor]['total_pos_pago'] = $lista_precos_pos['lista'][$key];
                    $listaSaida['carrinho'][$key]['total_pos_pago'] += $listaSaida['carrinho'][$key]['pedido'][$key_menor]['total_pos_pago'];
                }
                $preco_pos_total += $listaSaida['carrinho'][$key]['total_pos_pago'];
            }
            $listaSaida['debitado_pos_pago'] = round($preco_pos_total, 2);
        }
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
