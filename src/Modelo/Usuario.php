<?php

class Usuario{
    private string $nome;
    private string $sobrenome;
    private string $senha;

    public function __construct(string $nome, string $senha)
    {
        $nomeSobrenome = explode(" ", $nome, 2);
        
        if($nomeSobrenome[0] === ""){
            $this -> nome = "Nome inválido!";
        } else {
            $this -> nome = $nomeSobrenome[0];
        }

        if($nomeSobrenome[1] === null){
            $this -> sobrenome = "Sobrenome inválido!";
        } else {
            $this -> sobrenome = $nomeSobrenome[1];
        }

        $this -> validaSenha($senha);
    }

    public function validaSenha(string $senha): void
    {
        $tamanhoSenha = strlen(trim($senha));
        if($tamanhoSenha >= 6){
            $this -> senha = $senha;
        } else {
            $this -> senha = "Senha inválida!";
        }
    }

    public function getNome(): string
    {
        return $this -> nome;
    }

    public function getSobrenome(): string
    {
        return $this -> sobrenome;
    }

    public function getSenha(): string
    {
        return $this -> senha;
    }

}