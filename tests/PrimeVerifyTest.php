<?php

include_once '../PrimeVerify.php';

/**
 * PrimeVerify
 *
 * @author Jeferson Amorim <amorimjj@gmail.com>
 */
class PrimeVerifyTest extends PHPUnit_Framework_TestCase {
    
    
    public function isEvenDataProvider()
    {
        $numbers = array();
        
        for($i=0;$i<=10;$i++)
            $numbers[] = array($i, (bool)($i%2==0));
        
        return $numbers;
    }
    
    public function evenNumbersDataProvider()
    {
        $evenNumbers = array();
        
        for($i=4;$i<=50;$i+=2)
            $evenNumbers[] = array($i);
        
        return $evenNumbers;
    }
    
    protected function helperSimpleArrayToProvider(array $simpleArray)
    {
        $provider = array();
        
        foreach ($simpleArray as $number)
            $provider[] = array($number);
        
        return $provider;
    }

    public function notPrimeNumbersDataProvider()
    {
        $notPrimes = array(4,6,8,9,10,12,14,15,16,18,20,21,22,24,25,26,27,28,30,32,33,34,35,36,114,115,116,117,118,119,120,121,122,123,124,125,126);
        return $this->helperSimpleArrayToProvider($notPrimes);
    }


    public function primeNumbersDataProvider()
    {
        $primeNumbers = array(2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97, 101, 103, 107, 109, 113, 127, 131, 137, 139, 149, 151, 157, 163, 167, 173, 179, 181, 191, 193, 197, 199, 211, 223, 227, 229, 233, 239, 241, 251, 257, 263, 269, 271, 277, 281, 283, 293, 307, 311, 313, 317, 331, 337, 347, 349, 353, 359, 367, 373, 379, 383, 389, 397, 401, 409, 419, 421, 431, 433, 439, 443, 449, 457, 461, 463, 467, 479, 487, 491, 499, 503, 509, 521, 523, 541, 547, 557, 563, 569, 571, 577, 587, 593, 599, 601, 607, 613, 617, 619, 631, 641, 643, 647, 653, 659, 661, 673, 677, 683, 691, 701, 709, 719, 727, 733, 739, 743, 751, 757, 761, 769, 773, 787, 797, 809, 811, 821, 823, 827, 829, 839, 853, 857, 859, 863, 877, 881, 883, 887, 907, 911, 919, 929, 937, 941, 947, 953, 967, 971, 977, 983, 991, 997);
        return $this->helperSimpleArrayToProvider($primeNumbers);
    }
    
    public function testIsPrime_WhenReceiveNumber1_ShouldReturnFalse()
    {
        $verify = new PrimeVerify();
        $verify->setNumber(1);
        $this->assertFalse($verify->isPrime());
    }
    
    public function testIsPrime_WhenReceiveNumber2_ShouldReturnTrue()
    {
        $verify = new PrimeVerify();
        $verify->setNumber(2);
        $this->assertTrue($verify->isPrime());
    }
    
    public function testIsPrime_WhenReceiveNumber3_ShouldReturnTrue()
    {
        $verify = new PrimeVerify();
        $verify->setNumber(3);
        $this->assertTrue($verify->isPrime());
    }
    
    public function testIsEven_WhenReceiveNumber3_ShouldReturnTrue()
    {
        $verify = new PrimeVerify();
        $verify->setNumber(3);
        $this->assertFalse($verify->isEven());
    }
    
    public function testIsEven_WhenReceiveNumber4_ShouldReturnTrue()
    {
        $verify = new PrimeVerify();
        $verify->setNumber(4);
        $this->assertTrue($verify->isEven());
    }
    
    public function testHasAnothersDivisorsGreaterThanOne_WhenReceiveNumber4_ShouldReturnTrue()
    {
        $verify = new PrimeVerify();
        $verify->setNumber(4);
        $this->assertTrue($verify->hasAnothersDivisorsGreaterThanOne());
    }
    
    public function testHasAnothersDivisorsGreaterThanOne_WhenReceiveNumber9_ShouldReturnTrue()
    {
        $verify = new PrimeVerify();
        $verify->setNumber(9);
        $this->assertTrue($verify->hasAnothersDivisorsGreaterThanOne());
    }
    
    public function testHasAnothersDivisorsGreaterThanOne_WhenReceiveNumber5_ShouldReturnFalse()
    {
        $verify = new PrimeVerify();
        $verify->setNumber(5);
        $this->assertFalse($verify->hasAnothersDivisorsGreaterThanOne());
    }
    
    /**
     * @dataProvider isEvenDataProvider
     * @param int $number
     * @param boolean $isEven
     */
    public function testIsEven_WhenRequested_ShouldReturnCorrectValue($number, $isEven)
    {
        $verify = new PrimeVerify();
        $verify->setNumber($number);
        $this->assertEquals($verify->isEven(), $isEven);
    }
    
    /**
     * @dataProvider evenNumbersDataProvider
     * @param int $evenNumber
     */
    public function testIsPrime_WhenReceiveAnEvenNumberGreaterThan2_ShouldReturnFalse($evenNumber)
    {
        $verify = new PrimeVerify();
        $verify->setNumber($evenNumber);
        $this->assertFalse($verify->isPrime());
    }
    
    /**
     * @dataProvider primeNumbersDataProvider
     * @param int $primerNumber
     */
    public function testIsPrime_WhenReceiveAPrimeNumber_ShouldReturnTrue($primerNumber)
    {
        $verify = new PrimeVerify();
        $verify->setNumber($primerNumber);
        $this->assertTrue($verify->isPrime());
    }
    
    /**
     * @dataProvider notPrimeNumbersDataProvider
     * @param int $primerNumber
     */
    public function testIsPrime_WhenReceiveANotPrimeNumber_ShouldReturnFalse($notPrimerNumber)
    {
        $verify = new PrimeVerify();
        $verify->setNumber($notPrimerNumber);
        $this->assertFalse($verify->isPrime());
    }
}

?>
