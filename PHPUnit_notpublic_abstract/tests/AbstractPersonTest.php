<?php

use PHPUnit\Framework\TestCase;

class AbstractPersonTest extends TestCase
{
    //抽象クラスのテストをしたい場合、以下の2つの方法
    //子クラスを作成しテストする方法
    public function testNameAndTitleIsReturned()
    {
        $doctor = new Doctor('Green');
        
        $this->assertEquals('Dr. Green', $doctor->getNameAndTitle());                
    }
    //getMockForAbstractClass()メソッド(抽象クラスのモックオブジェクトを返す)を使用する方法
    public function testNameAndTitleIncludesValueFromGetTitle()
    {
        //$mock = $this->getMockForAbstractClass(AbstractPerson::class)
        //とすると7つの引数を渡す必要があり面倒。
        //代わりに、getMockBuilderメソッドを使用してからgetMockForAbstractCassメソッドを呼び出す
        $mock = $this->getMockBuilder(AbstractPerson::class)
                     ->setConstructorArgs(['Green'])  //配列でコンストラクターに値を渡す     
                     ->getMockForAbstractClass();  
                     
        $mock->method('getTitle')
             ->willReturn('Dr.');
            
        $this->assertEquals('Dr. Green', $mock->getNameAndTitle());
    }    
}