<?php

use PHPUnit\Framework\TestCase;

//require "../vendor/autoload.php";
//psr-4によるautoloadのために上記のように読み込み可能。
//bootstrap処理で読み込むことで上のようにいちいち記述不要となるので
//bootstrap処理を設定して読み込んでおくのが一番良い。
//(ちなみにコマンド側で、phpunit --bootstrap='vendor/autoload.php'としても実行できる)

//クラス名.phpに対するテストコードは、クラス名Test.php
class UserTest extends TestCase 
{
    public function testReturnsFullName()
    {
        //require 'User.php';//psr-4によるautoloaderの設定をしているため読み込み不要
        $user = new User;
        $user->first_name = "Teresa";
        $user->surname = "Green";
        
        $this->assertEquals("Teresa Green", $user->getFullName());
    }
    
    public function testFullNameIsEmptyByDefault()
    {
        $user = new User;//テストケースごとにインスタンスは削除(ブロックスコープ)//インスタンス生成が必要。
        $this->assertEquals('', $user->getFullName());
    }
    
    /**
     * @test
     * 
     */
    public function UserHasFirstName()//testつけなくても、testアノテーションを付ければ��行される
    {
        $user = new User;
        $user->first_name = "Teresa";
        $this->assertEquals('Teresa', $user->first_name);
    }
}