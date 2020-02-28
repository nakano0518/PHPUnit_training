<?php

use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{   
    //Mockeryした場合の後処理記述
    public function tearDown():void
    {
        Mockery::close();
    }
    
    //Mockeryを使用せず
    public function testOrderIsProcessed()
    {
        //getMockBuilder()メソッドでモックオブジェクトを作成できる
        //もとのクラスがなかったとしても
        //しかし呼び出すchargeメソッドは未定義
        $gateway = $this->getMockBuilder('PaymentGateway')
                        ->setMethods(['charge'])
                        ->getMock();
        
        $gateway->expects($this->once())
                ->method('charge')
                ->with($this->equalTo(200))
                ->willReturn(true);
        
        $order = new Order($gateway);

        $order->amount = 200;
        
        $this->assertTrue($order->process());
    }
    
    //Mockeryを使用した場合
    public function testOrderIsProcessedUsingMockery()
    {   
        //Mockeryクラスの静的メソッド(だからtearDownメソッドが必要)
        $gateway = Mockery::mock('PaymentGateway');
        //Mockeryを使用しない上の場合と比較するとシンプルに記述できている
        $gateway->shouldReceive('charge')
                ->once()
                ->with(200)
                ->andReturn(true);
        
        $order = new Order($gateway);

        $order->amount = 200;
        
        $this->assertTrue($order->process());
    }
}