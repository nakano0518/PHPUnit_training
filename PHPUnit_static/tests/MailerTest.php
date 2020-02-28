<?php

use PHPUnit\Framework\TestCase;

class MailerTest extends TestCase
{
    public function testSendMessageReturnsTrue()
    {
        $this->assertTrue(Mailer::send('dave@example.com', 'Hello!'));
    }
    
    public function testInvalidArgumentExceptionIfEmailIsEmpty()
    {
        //例外がスローされたかをexpectException()メソッドで調べる
        //メソッドを実行する前(事前に)実行しておく必要がある
        $this->expectException(InvalidArgumentException::class);
            
        Mailer::send('', '');
    }      
}