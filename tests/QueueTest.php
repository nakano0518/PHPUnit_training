<?php

use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{
    protected $queue;//各メソッドから参照できるよう保持
    
    //各テストメソッドの前に呼ばれるメソッド。publicでも可能。
    protected function setUp():void
    {
        $this->queue = new Queue;
    }
    //各テストメソッドの最後に呼ばれるメソッド。publicでも可能。
    protected function tearDown():void
    {
        unset($this->queue);
        //インスタンスはメソッド実行後破棄されるので本当は不要
        //外部リソースなどを使用するときに状態を戻すために使う
    }
    
    public function testNewQueueIsEmpty()
    {
        $this->assertEquals(0, $this->queue->getCount());

    }
    
    public function testAnItemISAddedToTheQueue()
    {
        $this->queue->push("green");
        
        $this->assertEquals(1, $this->queue->getCount());
        
    }
    
    public function testAnItemISRemovedFromTheQueue()
    {
        $this->queue->push("green");
        $item = $this->queue->pop();
        
        $this->assertEquals(0, $this->queue->getCount());
        $this->assertEquals("green", $item);
    }
    
    //キューからアイテム削除は既にテストしたが、順序はテストしていない
    public function testAnItemIsRemovedFromTheFrontOfTheQueue()
    {
        $this->queue->push('first');
        $this->queue->push('second');
        
        $this->assertEquals('first', $this->queue->pop());
    }
}