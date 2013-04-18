<?php

/**
 * PrimeVerify
 *
 * @author Jeferson Amorim <amorimjj@gmail.com>
 */
class PrimeVerify {
    
    private $_number;
    
    public function __construct($number)
    {
        $this->_number = $number;
    }
    
    protected function hasOddDivisors()
    {
        for($divisor=3;$divisor < $this->_number/2; $divisor += 2)
        {
            if ( $this->_number % $divisor == 0 )
                return true;
        }
        
        return false;
    }
    
    public function isEven()
    {
        return $this->_number % 2 == 0;
    }
    
    public function hasAnothersDivisorsGreaterThanOne()
    {
        return ( $this->isEven() || $this->hasOddDivisors() );
    }


    public function isPrime()
    {
        return ( $this->_number > 1 && ($this->_number == 2 || ! $this->hasAnothersDivisorsGreaterThanOne()));
    }
}

?>
