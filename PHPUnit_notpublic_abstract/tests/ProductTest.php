<?php

use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testIDIsAnInteger()
    {
        $product = new Product;
        
        $reflector = new ReflectionClass(Product::class);
        
        //protected「プロパティ」を指定
		$property = $reflector->getProperty('product_id');        
		
        $property->setAccessible(true);
        
        //protected「プロパティ」の取得
        $value = $property->getValue($product);        
                
        $this->assertIsInt($value);
    }
}
