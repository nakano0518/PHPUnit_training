<?php

use PHPUnit\Framework\TestCase;

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
        $user = new User;//テストケースごとにインスタンスは削除(ブロックスコープ)、インスタンス生成が必要。
        $this->assertEquals('', $user->getFullName());
    }
}