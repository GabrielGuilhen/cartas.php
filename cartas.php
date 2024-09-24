<?php

class Carta
{

    private string $nome;
    private int $numero;


    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }
    public function getNumero()
    {
        return $this->numero;
    }

    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }
}
function criarBaralho()
{
    $modelos = ['Fusca', 'Civic', 'Ferrari', 'Porsche', 'Chevet', 'Lambo', 'Mustang'];
    $baralho = [];

    foreach ($modelos as $m) {
        $carta = new Carta();
        $carta->setNome($m);
        $carta->setNumero(rand(1, 4));
        $baralho[] = $carta;
    }
    return $baralho;
}
function exibirCarta($carta)
{
    $velocidades = ['1' => 'Lento', '2' => 'Médio', '3' => 'Rápido', '4' => 'Super Rapido'];
    echo $carta->getNome() . " - " . $velocidades[$carta->getNumero()] . "\n";
}
function exibirBaralho($baralho)
{
    echo "Carros disponíveis no baralho:\n";
    foreach ($baralho as $indice => $carta) {
        echo "$indice: ";
        exibirCarta($carta);
    }
}
function jogar()
{
    $baralho = criarBaralho();

    $indiceSorteado = array_rand($baralho);
    $carroSorteado = $baralho[$indiceSorteado];

    echo "Bem-Vindo a adivinhação del gabule\n";

    $palpites = [0, 2, 3, $indiceSorteado];
    $tentativa = 0;
    $totalPalpites = 4;

    do {
        exibirBaralho($baralho);
        $palpite = readline("\nEscolha um carro pelo número correspondente ou Digite 0 para desistir: ");

        if($palpite == '0'){
            echo "Você desistiu do jogo. A carta sorteada era: ";
            exibirCarta($carroSorteado);
            break;
        }

        if($palpite==$indiceSorteado){
            echo"Acertou!!!";
            exibirCarta($carroSorteado);
            break;
        }else {
            echo"Errou Burrooo, tenta denovo\n";
        }
    }while(true);
}       

  
jogar();
