<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MembershipPricingCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $type;
    public $price;
    public $description;
    public $inclusions;
    public $bestOffer;

    public function __construct($type = 'Type', $price = '0.00', $description='', $inclusions = '', $bestOffer = false)
    {
        $this->type = $type;
        $this->price = $price;
        $this->description = $description;
        $this->inclusions = $inclusions;
        $this->bestOffer = $bestOffer;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.membership-pricing-card');
    }
}
