<?php

use PHPUnit\Framework\TestCase;

class FunctionTest extends TestCase
{
    public function testAddReturnsTheCorrectSum()
    {
        require 'functions.php';
        $this->assertEquals(4, add(2, 2));
        $this->assertEquals(8, add(3, 5));//一つ以上のテストケースを記述できる
    }
    
    public function testAddDoesNotReturnTheIncorrectSum()
    {
        $this->assertNotEquals(5, add(2, 2));
    }
}

//メソッド名は、テストの内容を正確に記述。
//そうしておくと、それ自体がドキュメントになる。

//テスト実行すると下記画面
//..                                                                  2 / 2 (100%)
//
//Time: 21 ms, Memory: 4.00 MB
//
//OK (2 tests, 3 assertions)
//⇒2つのドット(..) はpassしたテストケースを示す。Fはfailという意味
//(2 tests, 3 assertions)⇒2つのテストケースを実行し、3assertionsがpass