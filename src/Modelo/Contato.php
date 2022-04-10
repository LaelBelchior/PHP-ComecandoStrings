<?php

class Contato{

    private string $email;
    private string $endereco;
    private string $cep;

    public function __construct(string $email, string $endereco, string $cep)
    {
        if($this -> validaEmail($email) !== false){
            $this -> email = $email;
        } else {
            $this -> email = "Email inválido!";
        }
    }

    private function validaEmail(string $email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public function getEmail(): string
    {
        return $this -> email;
    }

    public function getUsuario(): string
    {
        $posicaoArroba = strpos($this -> email, "@");

        if($posicaoArroba === false){
            return 'Usuário inválido!';
        }

        return substr($this -> email, 0, $posicaoArroba);
    }

    public function getEnderecoCep(): string
    {
        $enderecoCep = [$this -> endereco, $this -> cep];
        return implode(" - ", $enderecoCep);
    }

}