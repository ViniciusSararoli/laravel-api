<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Statics extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public static function calcularPrazo($tipoProdutoUrl, $formato=false) {
        $prazoFinal = 0;
        switch (strtolower($tipoProdutoUrl)) {
            case 'jogo-playstation':
                $tipoProduto = 1;
                break;
            
            default:
                # code...
                break;  
        }
        if($tipoProduto == 1){
            if($formato){
                $prazoFinal += 1;
            }else{
                $prazoFinal += 5;
            }
        }
        return $prazoFinal;
    }
    public static function jogo_playstation($tipo) {
        if($tipo == 0) {
            return 299.90;
        }else{
            return 249.90;
        }
    }

    public static function produtos_servicos() {
        $vetor['1'] = ['jogo-playstation','jogo']; 
        return $vetor;
    }
}
