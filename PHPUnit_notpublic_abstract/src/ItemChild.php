<?php

//protectedのメソッドはどのようにテストするか
//⇒サブクラスを作成し、protectedのメソッドをpublicのメソッドとしてオーバーライドする

class ItemChild extends Item
{
    public function getID()
    {
        return parent::getID();    
    }
}