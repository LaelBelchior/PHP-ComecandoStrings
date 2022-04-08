<?php

class Contato{

    private string $email;

    public function __construct(string $email)
    {
        $this -> email = $email;
    }

    public function getUsuario(): string
    {
        $posicaoArroba = strpos($this -> email, "@");

        if($posicaoArroba === false){
            return 'Usuário inválido!';
        }

        return substr($this -> email, 0, $posicaoArroba);
    }

}