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
    
    public function testNotificationIsSent()
    {
        $user = new User;
        $mock_mailer = $this->createMock(Mailer::class);
        $mock_mailer->expects($this->once())//メソッドが一度だけ呼び出されることを期待値を設定(ほかにneverなど)⇒期待される値でなければテストは失敗
                    ->method('sendMessage')
                    ->with($this->equalTo('dave@example.com'), $this->equalTo('Hello'))//スタブメソッドに引数として渡される値に期待値を設定することもできる。スタブ化されたメソッドの引数に対応。この場合、sendMessage()。
                    ->willReturn(true);
        $user->setMailer($mock_mailer);
        $user->email = 'dave@example.com';
        $this->assertTrue($user->notify("Hello"));
    }
    
    public function testCannotNotifyUserWithNotEmail()
    {
        $user = new User;
        //例外のテストなど元のメソッドをスタブ化(null返却)したくない場合がある
        //方法1)createMockして、スタブの期待値にthrowException値を設定する
    /*  $mock_mailer = $this->createMock(Mailer::class);
        
        $mock_mailer->method('sendMessage')
                   ->will($this->throwException(new Exception));*/
        
        //方法2)モックオブジェクトのカスタマイズ            
        $mock_mailer = $this->getMockBuilder(Mailer::class)//カスタマイズのためのメソッドを有するモックオブジェクトを取得(この時点ではcreateMockメソッド使用時と同じ、以下でカスタマイズ)
                            ->setMethods(null)//メソッドを何もカスタマイズしない、つまりスタブ化(null返却)しない
                            //->setMethods(['setMessage'])//setMessageをスタブ化し、そのほかのメソッドはオリジナルコード
                            ->getMock();//カスタマイズ後のオブジェクトを返却
        
        $user->setMailer($mock_mailer);
        
        $this->expectException(Exception::class);
        
        $user->notify('Hello');
            
    }
}