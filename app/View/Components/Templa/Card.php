<?php

namespace App\View\Components\Templa;

use Illuminate\View\Component;

class Card extends Component
{
    public $name, $img, $altImg, $article, $price, $url;

    public function __construct($name, $img, $altImg, $article,$price, $url)
    {
        $this->name = $name;
        $this->img = $img;
        $this->altImg = $altImg;
        $this->article = $article;
        $this->price = $price;
        $this->url = $url;
    }

    public function render()
    {
        return view('components.templa.card');
    }
}
