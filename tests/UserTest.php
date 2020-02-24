<?php

use PHPUnit\Framework\TestCase;

//クラス名.phpに対するテストコードは、クラス名Test.php
class UserTest extends TestCase 
{
    public function testReturnsFullName()
    {
        require 'User.php';
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
    public function UserHasFirstName()//testつけなくても、testアノテーションを付ければ実行される
    {
        $user = new User;
        $user->first_name = "Teresa";
        $this->assertEquals('Teresa', $user->first_name);
    }
}