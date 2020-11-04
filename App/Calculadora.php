<?php
    namespace App;

    class Calculadora{
        public function soma($valorA, $valorB){
            return $valorA + $valorB;
        }

        public function subtracao($valorA, $valorB){
            return $valorA - $valorB;
        }

        public function multiplicacao($valorA, $valorB){
            return $valorA * $valorB;
        }

        public function divisao($valorA, $valorB){
            if($valorB == 0){
                return "Impossível dividir um valor por 0";
            }
            return $valorA / $valorB;
        }

        public function formula($formula){      
            include_once 'Calculadora.php';
            
            $jm[] = "";
            $arr[] = "";
            $tam_op = strlen($formula);
            $arr = str_split($formula); 
            
            $j = 0;
            $x = 0;
            
            for ($i = 0; $i < $tam_op; $i++){
                
                if ($arr[$i] == '+'){
                    $j ++;
                    $jm[$j] = $arr[$i];
                    $j ++;
                    $x = 0;
                }
                elseif ($arr[$i] == '-'){
                    $j ++;
                    $jm[$j] = $arr[$i];
                    $j ++;
                    $x = 0;

                }
                elseif ($arr[$i] == '*'){
                    $j ++;
                    $jm[$j] = $arr[$i];
                    $j ++;
                    $x = 0;

                }
                elseif ($arr[$i] == '/'){
                    $j ++;
                    $jm[$j] = $arr[$i];
                    $j ++;
                    $x = 0;

                }
                else{
                    $tamArr = count($jm)+1;
                    if ($x == 0){
                        $jm = array_pad($jm, $tamArr , '');
                        $jm[$j] = $arr[$i];
                        $x = 1;
                    }else
                    $jm[$j] = $jm[$j].$arr[$i];
                }  
            }

            $jm2[] = 0;
            $fim = 0;
            $j = 0;   
            $x = 0;
            $i = 0;
            $a = 0;
            $formula = new Calculadora();
            $iStop = count($jm);
            $stop = 0;
            $controlSinal = '/';
            $control = 0;
            while($fim == 0){
                if(($jm[$i] == "/")&&($a == 0)&&($controlSinal == "/")){    
                    $Mcalc = $formula->divisao($jm[$i-1],$jm[$i+1]);
                    $j --;
                    $jm2[$j] = $Mcalc;
                    $x = 0;
                    $i++;
                    $a = 1;
                    $control ++;
                }elseif(($jm[$i] == "*")&&($a == 0)&&($controlSinal == "*")){
                    $Mcalc = $formula->multiplica($jm[$i-1],$jm[$i+1]);
                    $j --;
                    $jm2[$j] = $Mcalc;
                    $x = 0;
                    $i++;
                    $a = 1;
                    $control ++;
                }elseif(($jm[$i] == "+")&&($a == 0)&&($controlSinal == "+")){
                    $Mcalc = $formula->soma($jm[$i-1],$jm[$i+1]);
                    $j --;
                    $jm2[$j] = $Mcalc;
                    $x = 0;
                    $i++;
                    $a = 1;
                    $control ++;
                }elseif(($jm[$i] == "-")&&($a == 0)&&($controlSinal == "-")){
                    $Mcalc = $formula->subtracao($jm[$i-1],$jm[$i+1]);
                    $j --;
                    $jm2[$j] = $Mcalc;
                    $x = 0;
                    $i++;
                    $a = 1;
                    $control ++;
                }else{
                    
                    $tamArr = count($jm2)+1;
                    if ($x == 0){
                        $jm2[$j] = $jm[$i];
                        $x = 1;
                    }else{
                        $jm2 = array_pad($jm2, $tamArr , '');
                        $jm2[$j] = $jm2[$j].$jm[$i];
                    }
                }
                $j++;
                $i++;

                if ($i >= $iStop){
                    $jm = $jm2;
                    $jm2 = array();
                    $iStop = count($jm);
                    $i = 0;
                    $j = 0;
                    $a = 0;
                    $stop++;

                    if(($control == 0)&&($controlSinal == "/")){
                    $controlSinal = "*";
                    }elseif(($control == 0)&&($controlSinal == "*"))
                    $controlSinal = "-";
                    elseif(($control == 0)&&($controlSinal == "-"))
                    $controlSinal = "+";
                    
                    $control = 0;
                    if($iStop <= 1)
                    break;
                }
            }
            return $jm[0];
        }
    }