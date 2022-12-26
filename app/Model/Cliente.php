<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public function Cliente() {
        //$this->bd = BD::getInstance();
   }
   public function __set($propriedade,$valor) {
    if(strlen($valor)>0){
        if($propriedade=='idcliente'){
            $this->idcliente=$valor;
        }
        if($propriedade=='nome'){
            $this->nome=$valor;
        }
        if($propriedade=='telefone'){
            $this->telefone=$valor;
        }
        if($propriedade=='celular'){
            $this->celular=$valor;
        }
        if($propriedade=='email'){
            $this->email=$valor;
        }
        if($propriedade=='receber'){
            $this->receber=$valor;
        }
        if($propriedade=='idtipocertidao'){
            $this->idtipocertidao=$valor;
        }
        if($propriedade=='idlista_ends'){
            $this->idlista_ends=$valor;
        }
        if($propriedade=='idcartorio'){
            $this->idcartorio=$valor;
        }
        if($propriedade=='dia'){
            $this->dia=$valor;
        }
        if($propriedade=='cpf'){
            $this->cpf=$valor;
        }
        if($propriedade=='rg'){
            $this->rg=$valor;
        }
        if($propriedade=='senha'){
            $this->senha=$valor;
        }
    }else{
    }
}
public function __get($propriedade) {
    if($propriedade=='idcliente'){
        return $this->idcliente;
    }
    if($propriedade=='nome'){
        return $this->nome;
    }
    if($propriedade=='telefone'){
        return $this->telefone;
    }
    if($propriedade=='celular'){
        return $this->celular;
    }
    if($propriedade=='email'){
        return $this->email;
    }
    if($propriedade=='receber'){
        return $this->receber;
    }
    if($propriedade=='idtipocertidao'){
        return $this->idtipocertidao;
    }
    if($propriedade=='idlista_ends'){
        return $this->idlista_ends;
    }
    if($propriedade=='idcartorio'){
        return $this->idcartorio;
    }
    if($propriedade=='dia'){
        return $this->dia;
    }
    if($propriedade=='cpf'){
        return $this->cpf;
    }
    if($propriedade=='rg'){
        return $this->rg;
    }
    if($propriedade=='senha'){
        return $this->senha;
    }
}

public function insert() {
    $teste = ["codigo"=>200,"message"=>"ok"];
    return $teste;
    /* $sql ='insert into cliente set '.
    'nome=\''.$this->bd->mysql_escape_string($this->nome).'\', '.
    'telefone=\''.$this->bd->mysql_escape_string($this->telefone).'\', '.
    'celular=\''.$this->bd->mysql_escape_string($this->celular).'\', '.
    'email=\''.$this->bd->mysql_escape_string($this->email).'\', '.
     'receber=\''.$this->bd->mysql_escape_string($this->receber).'\', '.
     'idlista_ends=\''.$this->bd->mysql_escape_string($this->idlista_ends).'\', '.
     'idcartorio=\''.$this->bd->mysql_escape_string($this->idcartorio).'\', '.
     'cpf=\''.$this->bd->mysql_escape_string($this->cpf).'\', '.
     'rg=\''.$this->bd->mysql_escape_string($this->rg).'\', '.
     'dia=now(), '.
    'idtipocertidao=\''.$this->bd->mysql_escape_string($this->idtipocertidao).'\'';
    $this->bd->query($sql);
    $this->idcliente=$this->bd->getLastId();
    */
} 

}
