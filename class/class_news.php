<?php
class news
{
    public $id_news;
    public $name_news;
    public $date_news;
    public $describe_news_sample;
    public function __construct($id_news, $name_news, $date_news, $describe_news_sample)
    {
        $this->id_news = $id_news;
        $this->name_news = $name_news;
        $this->date_news = $date_news;
        $this->describe_news_sample = $describe_news_sample;
    }
    public function dl_new() {}
}
