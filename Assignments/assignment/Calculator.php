<?php
class Calculator {
    public function calc($operator, $num1 = null, $num2 = null) {
        if (!is_numeric($num1)|| !is_numeric($num2)){
            return "<p>Cannot perform operation. You must have three arguments. A string for the operator
        (+,-,*,/) and two integers or floats for the numbers.</p>";
        }
        switch ($operator) {
            case '+':
                return $this->getSum($num1, $num2);
            case '-':
                return $this->getDiff($num1, $num2);
            case '*':
                return $this->getProduct($num1, $num2);
            case '/':
                return $this->getQuotient($num1, $num2);
            default:
                return "<p>Cannot perform operation. Invalid operator please input valid operator of +, -, *, /</p>";
        }
    }
    private function getSum($num1, $num2) {
        if(is_numeric($num1) && is_numeric($num2)) {
            return "<p>The calculation is $num1 + $num2. The answer is " . ($num1 + $num2) . ".</p>";
         } 
        // else {
        //     return "Cannot perform operation. You must have three arguments. A string for the operator
        // (+,-,*,/) and two integers or floats for the numbers.";
        // }
    }
    private function getDiff($num1, $num2){
        if(is_int($num1) && is_int($num2)) {
            return "<p>The calculation is $num1 - $num2. The answer is " . ($num1 - $num2) . ".</p>";
        } 
    //     else {
    //         return "Cannot perform operation. You must have three arguments. A string for the operator
    //     (+,-,*,/) and two integers or floats for the numbers.";
    //     }
     }
    private function getProduct($num1, $num2){
        if(is_int($num1) && is_int($num2)) {
            return "<p>The calculation is $num1 * $num2. The answer is " . ($num1 * $num2) . ".</p>";
        } 
        // else {
        //     return "Cannot perform operation. You must have three arguments. A string for the operator
        // (+,-,*,/) and two integers or floats for the numbers.";
        // }
    }
    private function getQuotient($num1, $num2) {
        if (is_int($num1) && is_int($num2)) {
            if ($num2 != 0) {
            return "<p>The calculation is $num1 / $num2. The answer is " . ($num1 / $num2) . ".</p>";
            } else {
                return "<p>The calculation is $num1 / $num2. The answer is cannot divide a number by zero</p>";
                }  
            }
        }
    }