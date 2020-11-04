<?php
    namespace Tests;

    include 'App/Calculadora.php';
    use PHPUnit\Framework\TestCase;
    use App\Calculadora;

    class CalculadoraTest extends TestCase{
        public function testeSoma(){
            $calc = new Calculadora();
            $this->assertEquals(280, $calc->soma(150,130));
        }

        public function testeSubtracao(){
            $calc = new Calculadora();
            $this->assertEquals(20, $calc->subtracao(150,130));
        }

        public function testeMultiplicacao(){
            $calc = new Calculadora();
            $this->assertEquals(100, $calc->multiplicacao(10,10));
        }

        public function testeDivisao(){
            $calc = new Calculadora();
            $this->assertEquals(15, $calc->divisao(150,10));
        }

        public function testeFormula(){
            $calc = new Calculadora();
            $this->assertEquals(9, $calc->formula('3+10/2+1'));
        }

        public function testeFormulaNegado(){
            $calc = new Calculadora();
            $this->assertTrue($calc->formula('3+10/2+1') == 9);
        }
    }