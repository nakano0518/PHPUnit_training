<?php

use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{
    public function testDescriptionIsNotEmpty()
    {
        $item = new Item;
        
        $this->assertNotEmpty($item->getDescription());                    
    }
    
    public function testIDisAnInteger()
    {
        $item = new ItemChild;
        
        $this->assertIsInt($item->getID());
    }  
    
    public function testTokenIsAString()
    {
        $item = new Item;
        //privateメソッドをテストするにはリフレクションを使用する
        $reflector = new ReflectionClass(Item::class);
        $method = $reflector->getMethod('getToken');//メソッドを指定
        $method->setAccessible(true);//アクセス権有効にする
        
        $result = $method->invoke($item);//メソッド実行
        
        $this->assertIsString($result);
    }
    
    public function testPrefixedTokenStartsWithPrefix()
    {
        $item = new Item;
        //privateメソッドをテストするにはリフレクションを使用する
        $reflector = new ReflectionClass(Item::class);
        $method = $reflector->getMethod('getPrefixedToken');//メソッドを指定
        $method->setAccessible(true);//アクセス権有効にする
        
        $result = $method->invokeArgs($item, ['example']);
        
        $this->assertStringStartsWith('example', $result);    
    }
}
