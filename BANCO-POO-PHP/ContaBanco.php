<?php

class ContaBanco
{
    //atributos
    public $numConta;
    protected $tipo;
    private $dono;
    private $saldo;
    private $status;

    //Metodos
    function abrirConta($t) {
        $this->setTipo($t);
        $this->setStatus(true);
        if ($t == "CC") {
            $this->setSaldo(50);
        } else if ($t == "CP") {
            $this->setSaldo(150);
        }

    }

    function fecharConta() {
        if ($this->getSaldo() > 0) {
            echo "<p>Conta ainda tem dinheiro, não posso fechá-la!</p>";
        } elseif ($this->getSaldo() < 0) {
            echo "<p>Conta está em débito. Impossível encerrar!</p>";
        } else {
            $this->setStatus(false);
            echo  "<p> Conta de " . $this->getDono() . " fechada com sucesso!</p>";
        }

    }
    function depositar($v) {
        if ($this->getStatus()) {
            $this->setSaldo($this->getSaldo() + $v);
            //$this->saldo = $this-<saldo + $v;
            echo "<p> Depósito de R$ $v na conta de " . $this->getDono() . "</p>";
            } else {
                echo "<p>Conta fechada. Não consigo depositar.</p>";
            }
    }
    function sacar($v) {
        if ($this->getStatus()) {
            if ($this->getSaldo() >= $v) {
                $this->setSaldo($this->getSaldo() - $v);
                echo "<p> Saque de $v autorizado na conta de ".$this->getDono(). "</p>";
            } else {
                echo "<p>Saldo insuficiente para saque.</p>";
            }
        } else {
            echo "<p>Não posso sacar de uma conta fechada!</p>";
        }

    }
    
    function pagarMensal() {
        if ($this->getTipo() == "CC") {
            $v = 12;
        } else if ($this->getTipo() == "CP") {
            $v = 20;
        }
        if ($this->getStatus()) {
            $this->setSaldo($this->getSaldo() - $v);
            echo "<p> Mensalidade de R$ $v debitada na conta de " . $this->getDono() . "</p>";
        } else {
            echo "<p>Problemas com a conta. Não posso cobrar.</p>";
        }
    }


    //Metodos Especiais

    function __contruct() {
        $this->setSaldo(0);
        $this->setStatus(false);
        echo "<p>Conta criada com sucesso!</p>";
    }


    public function getnumConta()
    {
        return $this->numConta;
    }
    public function getTipo() {
        return $this->tipo;
    }

    public function getDono() {
        return $this->dono;

    }

    public function getSaldo() {
        return $this->saldo;
    }
    public function getStatus() {
        return $this->status;
    }

    function setNumConta($numConta) {
        $this->numConta = $numConta;
    }
    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setDono($dono) {
        $this->dono = $dono;
    }
    function setSaldo($saldo) {
        $this->saldo = $saldo;
    }
    function setStatus($status) {
        $this->status = $status;
    }

  
}
