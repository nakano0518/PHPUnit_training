<?php
//テスト駆動開発(TDD)
//先にテストを書く⇒テストエラー出る、
//⇒エラーメッセージなどを参考にテストが通るコードを最短で書く


use PHPUnit\Framework\TestCase;

class ArticleTest extends TestCase
{
    protected $article;
    
    protected function setUp():void
    {
        $this->article = new App\Article;
    }
    
    public function testTitleIsEmptyByDefault()
    {
        $this->assertEmpty($this->article->title);
    }
    
    public function testSlugIsEmptyWithNoTitle()
    {
        //assertEqualsメソッドはPHPで同じであれば同じ。PHPではnullと""は等しいので、パスする
        //assertSameメソッドは型まで同じでなければならないので、テストはパスしない
        $this->assertSame($this->article->getSlug(),"");
    }
    
    //以下の4つのテストケースは似通っている
    //ひとつにまとめたい⇒データプロバイダー
    /*public function testSlugHasSpacesReplacedByUnderscores()
    {
        $this->article->title = "An example article";
        
        $this->assertEquals($this->article->getSlug(), "An_example_article");
    }
    
    public function testSlugHasWhitespaceReplacedBySingleUnderscore()
    {
        $this->article->title = "An     example  \n  article";
    
        $this->assertEquals($this->article->getSlug(), "An_example_article");
    }
    
    public function testSlugDoesNotStartOrEndWithAnUnderscore()
    {
        $this->article->title = "An example article ";
    
        $this->assertEquals($this->article->getSlug(), "An_example_article");
    }
    public function testSlugDoesNotHaveAnyNonWordCharacters()
    {
        $this->article->title = "Read! This! Now!";
         $this->assertEquals($this->article->getSlug(), "Read_This_Now");
    }*/
    
    //データプロバイダーの定義
    //テストメソッドではないので、メソッド名をtest~から始めない
    //publicとして宣言する必要がある
    //配列を返す
    public function titleProvider()
    {
       return [
           //[$title, $slug]の配列をいくつも記述する
           //連想配列で以下のようにラベルをつけることもできる。テストケースのメソッド名のようにドキュメントとしてつけておくとよい
            'Slug Has Spaces Replaced By Underscores'         
                                    => ["An example article", "An_example_article"],
            'Slug Has Whitespace Replaced By Single Underscore'
                                    => ["An    example    \n    article", "An_example_article"],
            'Slug Does Not Start Or End With An Underscore'
                                    => [" An example article ", "An_example_article"],
            'Slug Does Not Have Any Non Word Characters'        
                                    => ["Read! This! Now!", "Read_This_Now"]
       ]; 
    }
    
    //上記の4つのメソッドをまとめる
    //プロバイダーを使用するために、下記のアノテーション+データプロバイダ名を記述
    /**
     * @dataProvider titleProvider
     */
    public function testSlug($title, $slug)
    {
        /*$this->article->title = "Read! This! Now!";
         $this->assertEquals($this->article->getSlug(), "Read_This_Now");*/
         //変数に置き変える。データプロバイダーから仮引数に渡される。
         $this->article->title = $title;
         $this->assertEquals($this->article->getSlug(), $slug);
    }
}