<?php

namespace App\View\Components;

use Illuminate\View\Component;

class GymSessionCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */


    public $title;
    public $content;

    public function __construct( $title, $content)
    {
        $this->title = $title;
        $this->content = $content;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.gym-session-card');
    }
}
