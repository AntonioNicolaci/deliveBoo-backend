<?php

namespace App\View\Components;

use Illuminate\View\Component;

class button extends Component
{/**
     * The alert type.
     *
     * @var string
     */
    public $text;
 
    /**
     * Create the component instance.
     *
     * @param  string  $text
     * @return void
     */
    public function __construct($text)
    {
        $this->text = $text;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.button');
    }
}