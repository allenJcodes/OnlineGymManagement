<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormInput extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

     public $id;
     public $name;
     public $type;
     public $label;
 
     public function __construct($id, $name, $type="text", $label="Input Label")
     {
        $this->$id = $id;
        $this->$name = $name;
        $this->$type = $type;
        $this->$label = $label;
     }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form-input');
    }
}
