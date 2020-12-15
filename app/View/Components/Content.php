<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Content extends Component
{
    public $position;
    public $title;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title,$position)
    {
        $this->title = $title;
        $this->position = $position;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.content');
    }
}
