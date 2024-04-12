<?php

namespace App\View\Components\Templa;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardRated extends Component
{
    public function render(): View
    {
        return view('components.templa.card-rated');
    }
}
