<?php

class Contato{

    private string $email;
    private string $endereco;
    private string $cep;
    private string $telefone;

    public function __construct(string $email, string $endereco, string $cep, string $telefone)
    {
        if($this -> validaEmail($email) !== false){
            $this -> email = $email;
        } else {
            $this -> email = "Email inválido!";
        }

        if($this -> validaTelefone($telefone)){
            $this -> telefone = $telefone;
        } else {
            $this -> telefone = 'Telefone inválido!';
        }

        $this -> endereco = $endereco;
        $this -> cep = $cep; 
    }

    private function validaTelefone(string $telefone): int
    {
        return preg_match('/^[0-9]{5}-[0-9]{4}$/', $telefone);
    }

    private function validaEmail(string $email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public function getTelefone(): string
    {
        return $this -> telefone;
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