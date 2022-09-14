<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DashboardCards extends Component
{
    public $total;
    public $iconClass;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($total, $iconClass)
    {
        //
        $this->total = $total;
        $this->iconClass = $iconClass;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard-cards');
    }
}
