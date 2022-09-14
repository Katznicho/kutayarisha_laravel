<?php

namespace App\View\Components;

use Illuminate\View\Component;

class WrapperComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $page_name;
    public $crumbs;

    public function __construct(string $pageName, array $crumbs)
    {
        //
        $this->page_name = $pageName;
        $this->crumbs = $crumbs;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.wrapper-component');
    }
}
