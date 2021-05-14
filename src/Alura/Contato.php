<?php

namespace App\Alura;

// função para separar o email
class Contato
{
   private $email;  // variaves de recebimento 
   private $endereco;
   private $cep;
   private $telefone;

   public  function __construct(string $email, string $endereco, string $cep, string $telefone)  // metodo contrutor 
   {
        // chamando os metodos dentro do contrutor
        $this->endereco = $endereco; 
        $this->cep = $cep;
        $this->email = $email; 
        
        if ($this->validaEmail($email) !== false){  // validação de email
             $this->setEmail($email); 
        } else {
            $this->setEmail("Email inválido.");
        }
         // condição de validação de telefone 
        if($this->validaTelefone($telefone)) {
            $this->setTelefone($telefone);
        } else {
            $this->setTelefone("Telefone invalido");
        }
        
   }
// FUNÇÃO DE VALIDAÇÃO DE TELEFONE
   private function validaTelefone(string $telefone): int
   {
   return preg_match('/^[0-9]{4}\-[0-9]{4}$/', $telefone, $encontrados); // validação com a formato de telefone com a funçao preg_match 
   }


  // função para atribuir quando há mais que uma chamada
   private function setEmail(string $email): void  
   {
       $this->email = $email;
      
   }
   private function setTelefone(string $telefone): void 
   {
       $this->telefone = $telefone;
   }



 //    CRIANDO NOME DO USUARIO DO SISTEMA APARTIR DO SEU EMAIL
   public function getUsuario(): string  // função de atribuir nome de usuario atraves do email, até o @.
    {
        $posicaoArroba = strpos($this->email, "@");  // strpos vai contar os caracteres até o arroba

        return substr($this->email, 0, $posicaoArroba);  // substr vai retornar as caracteres da posicao 0 até o arroba
    }

//  VALIDAÇÃO DE EMAIL 
    public function validaEmail(string $email)  // recebe o parametro email
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL); // retorna o email com o seu filtro de validação 
    }

    public function getEmail(): string 
    {
        return $this->email;
    }
    // VALIDAÇÃO DE ENDEREÇO E CEP 
    public function getEnderecoCep(): string
    {
        $enderecoCep = [$this->endereco, $this->cep]; // O $enderecoCep recebe um array com os parametro endereço e cep 
        return implode(" - ", $enderecoCep); // com IMPLODE tem a capacidade de juntar os dos parametros 
    }
    // VALIDAÇÃO DE TELEFONE 
    public function getTelefone(): string 
    {
        return $this->telefone;
    }
    
    
}