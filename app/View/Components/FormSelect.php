<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormSelect extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id;
    public $name;
    public $label;

    public function __construct($id, $name, $label="Select Label")
    {
        $this->$id = $id;
        $this->$name = $name;
        $this->$label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form-select');
    }
}
