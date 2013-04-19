<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PrimeGenerator
 *
 * @author jamorim
 */
class PrimeGenerator {

    /**
     * @var PrimeVerify 
     */
    private $_verify;

    public function __construct(PrimeVerify $verify) {
        $this->_verify = $verify;
    }
    
    protected function printNumber($number)
    {
        echo $number . ', ';
    }
    
    public function generateUntil($number)
    {
        for ($i = 1; $i <= $number; $i++)
        {
            $this->_verify->setNumber($i);        
            if ( $this->_verify->isPrime())
                $this->printNumber($i);
        }
    }
    
}

?>
