<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LearnContent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $title;
    public $subtitle;
    public $content;
    public $flipped;
    public $image;

    public function __construct($title, $subtitle, $content, $flipped, $image)
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->content = $content;
        $this->image = $image;
        $this->flipped = $flipped;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.learn-content');
    }
}
