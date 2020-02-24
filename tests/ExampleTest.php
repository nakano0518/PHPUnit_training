<?php

use \PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase 
{
    public function testAddingTwoPlusTwoResultsInFour()
    {
        $this->assertEquals(4, 2 + 2);
    }    
}

//テストクラスに関して、
//ファイル名とクラス名は同じにする→紐づけるため
//テストクラスは\PHPUnit\Framework\TestCaseを継承したクラスとして作成
//use PHPUnit\Framework\TestCase;と記述すると、TestCaseだけで使える

//テストメソッド(テストケース)に関して
//publicメソッドであること
//testで始まるメソッド名であること
//その中でassertionする
//$this->assertEquals(期待値, 実測値);//期待値と実測値が一致するか(true/false)