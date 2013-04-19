<?php

include_once '../PrimeVerify.php';
include_once '../PrimeGenerator.php';

/**
 * PrimeVerify
 *
 * @author Jeferson Amorim <amorimjj@gmail.com>
 */
class PrimeGeneratorTest extends PHPUnit_Framework_TestCase {
    
    /**
     * @var PHPUnit_Framework_MockObject_MockObject 
     */   
    protected $verify;

    public function setUp() {
        $this->verify = $this->getMock('PrimeVerify');
    }
    
    public function dataProviderGenerateUntil()
    {
        return array(
            array(1),
            array(2),
            array(20),
            array(23),
            array(25),
            array(26),
            array(30),
            array(42),
            array(56),
            array(120),
            array(232),
            array(400)
        );
    }

    public function testGenerateUntil_WhenReceive1_ShouldCallSetNumberFromPrimeVerifyPassing1AsParameter()
    {
        $verifyMock = $this->verify;
        
        $verifyMock->expects($this->once())
                ->method('setNumber')
                ->with($this->equalTo(1));
        
        $generator = new PrimeGenerator($verifyMock);
        $generator->generateUntil(1);
    }
    
    public function testGenerateUntil_WhenReceive2_ShouldCallSetNumberFromPrimeVerifyPassing1FirstAnd2LeftAsParameter()
    {
        $verifyMock = $this->verify;
        
        $verifyMock->expects($this->at(0))
                ->method('setNumber')
                ->with($this->equalTo(1));
        
        $verifyMock->expects($this->at(2))
                ->method('setNumber')
                ->with($this->equalTo(2));
        
        $generator = new PrimeGenerator($verifyMock);
        $generator->generateUntil(2);
    }
    
    /**
     * @dataProvider dataProviderGenerateUntil
     * @param type $x
     */
    public function testGenerateUntil_WhenReceiveX_ShouldCallSetNumberFromPrimeVerifyXTimesPassing1UntilXAsParameter($x)
    {
        $verifyMock = $this->verify;
        
        $n = 1;
        
        for($i=0;$n<=$x;$i+=2)
        {
            $verifyMock->expects($this->at($i))
                ->method('setNumber')
                ->with($this->equalTo($n++));
        }
        
        $generator = new PrimeGenerator($verifyMock);
        $generator->generateUntil($x);
    }
    
    public function testGenerateUntil_WhenReceive1_ShouldCallIsPrimeFromPrimeVerifyPassing1AsParameter()
    {
        $verifyMock = $this->verify;
        
        $verifyMock->expects($this->any())
                ->method('setNumber')
                ->withAnyParameters();
        
        $verifyMock->expects($this->once())
                ->method('isPrime');
        
        $generator = new PrimeGenerator($verifyMock);
        $generator->generateUntil(1);
    }
    
    /**
     * @dataProvider dataProviderGenerateUntil
     * @param type $x
     */
    public function testGenerateUntil_WhenReceiveX_ShouldCallIsPrimeFromPrimeVerifyXTimesPassing1UntilXAsParameter($x)
    {
        $verifyMock = $this->verify;
        
        $verifyMock->expects($this->exactly($x))
                ->method('isPrime');
        
        $generator = new PrimeGenerator($verifyMock);
        $generator->generateUntil($x);
    }
    
    public function testGenerateUntil_WhenisPrimeFromVerifyReturnTrue_ShouldCallPrintNumber()
    {
        $verifyStub = $this->verify;
        
        $verifyStub->expects($this->any())
                ->method('isPrime')
                ->will($this->returnValue(true));
        
        $generatorMock = $this->getMockBuilder('PrimeGenerator')
                ->setMethods(array('printNumber'))
                ->setConstructorArgs(array($verifyStub))
                ->getMock();
        
        $generatorMock->expects($this->once())
                ->method('printNumber')
                ->with($this->equalTo(1));
        
        $generatorMock->generateUntil(1);
    }
    
    public function testGenerateUntil_WhenisPrimeFromVerifyReturnFalse_CantCallPrintNumber()
    {
        $verifyStub = $this->verify;
        
        $verifyStub->expects($this->any())
                ->method('isPrime')
                ->will($this->returnValue(false));
        
        $generatorMock = $this->getMockBuilder('PrimeGenerator')
                ->setMethods(array('printNumber'))
                ->setConstructorArgs(array($verifyStub))
                ->getMock();
        
        $generatorMock->expects($this->never())
                ->method('printNumber');
        
        $generatorMock->generateUntil(1);
    }
    
}

?>
