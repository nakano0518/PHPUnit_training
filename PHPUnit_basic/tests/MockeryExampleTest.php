<?php
//Mockeryというモックオブジェクト用フレームワーク
//コマンドラインでcomposer require mockery/mockery --dev
//MockeryをPHPUnitで使うための準備2つのうちどちらか1つ
//tearDownメソッドを追加しMockeryを閉じること
//PHPUnitでMokeryを拡張するためのクラスを読み込む名前空間を指定

/*use PHPUnit\Framework\TestCase;
use Mockery\Adapter\PHPUnit\MockeryTestCase;

class MockeryExampleTest extends MockeryTestCase(1)
{
    (2)
    public function tearDown():void
    {
        Mockery::close();
    }
}*/
//(1)or(2)を記述