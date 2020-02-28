<?php

use PHPUnit\Framework\TestCase;

//ほかのクラスに依存するコードをテストするときは、
//依存するクラスのモックオブジェクトを作成し、依存関係を削除したうえでテストを行う
class MockTest extends TestCase
{
    public function testMock()
    {
        //モックオブジェクトを生成する
        //モックオブジェクトはオリジナルクラスのすべてのプロパティとメソッドを持つ
        $mock = $this->createMock(Mailer::class);
        
        //デフォルトでnullを返却するメソッドを、本メソッドで処理することでほかの返り値に変更できる(この場合true)
        //スタブメソッドを実行する前に実行しておく
        $mock->method('sendMessage')->willReturn(true);
        
        //以下のようなメソッドはスタブと呼ばれ、モックされたクラスの元のメソッドを置き換える
        //デフォルトではnullを返却
        $result = $mock->sendMessage('dave@example', 'Hello');
        
        $this->assertTrue($result);
    }
}