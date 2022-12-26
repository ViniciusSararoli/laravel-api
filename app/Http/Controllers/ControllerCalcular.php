<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Cliente;
use Comum_function;

class ControllerCalcular extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function ControllerCalcular()
    {
        $param = explode("/",trim($_SERVER['REQUEST_URI']));
        //var_dump($param); die;
        switch (strtolower($param[3])) {
            case 'jogo-playstation':
                $idProduto = 1;
                $valor_fisico = Statics::jogo_playstation(1);
                $valor_digital = Statics::jogo_playstation(0);
                echo json_encode(array(
                    "produto" => $param[3],
                    "tipos" => array(
                        array(
                            "formato" => "fisico",
                            "prazo" => Statics::calcularPrazo($idProduto, $param[3]),
                            "valor" => $valor_fisico
                        ),
                        array(
                            "formato" => "digital",
                            "prazo" => Statics::calcularPrazo($idProduto, $param[3], true),
                            "valor" => $valor_digital
                        )
                    )
                )); 
                break;
            default:
                # code...
                break;
        }       
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
