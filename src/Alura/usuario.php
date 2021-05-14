<?php 

namespace App\Alura;


class Usuario
{

    private $nome;
    private $sobrenome;
    private $senha;

    public function __construct(string $nome, string $senha)
    {
        $nomeSobrenome = explode(" ", $nome, 2);  //Dentro desse construtor, precisamos quebrar a string ao meio, separando o nome do sobrenome. 

     // condicional para ver se foi digitado algum valor dentro do campo
     // se o usuario deixar vazio retorna nome invalido
        if ($nomeSobrenome[0] === "") {
            $this->nome = "Nome inválido"; // nome vazio 
        } else {
            $this->nome = $nomeSobrenome[0]; // se viver aceita e atribui
        }

        if ($nomeSobrenome[1] === null) { // se sobrenome for vazio 
            $this->sobrenome = "Sobrenome Inválido";
        } else {
            $this->sobrenome = $nomeSobrenome[1]; // se tiver caracteres ai aceita
        }

        $this->validacaoSenha($senha);
        $this->nome = $nome;
      
    }
      public function getNome(): string // get para a atribuição e chamadas da função
    {
        return $this->nome;
    }

    public function getSobrenome(): string
    {
        return $this->sobrenome;
    }
    public function getSenha(): string
    {
        return $this->senha;
    }
 /* validando senha */
    private function validacaoSenha(string $senha) {  // função de validação de senha
        $tamanhoSenha = strlen(trim($senha));  //função trim remove os espaços do começo e final de uma linha.

        if($tamanhoSenha >= 6) { // senha tem que ser maior que 6 digitos inteiros.
            $this->senha = $senha; 
        }else {
            $this->senha = "Senha invalida";
        }
    }
    private function setSenha(string $senha): void
    {
        $this->senha = $senha;
    }
}