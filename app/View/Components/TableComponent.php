<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TableComponent extends Component
{
    public array $tableheads;
    public String $createroute;
    public String $add;
    public String $buttonsroute;
    public array $buttons;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(array $tableheads, String $createroute, String $add, String $buttonsroute, array $buttons)
    {
        $this->tableheads = $tableheads;
        $this->createroute = $createroute;
        $this->add = $add;
        $this->buttonsroute = $buttonsroute;
        $this->buttons = $buttons;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table-component');
    }
}
