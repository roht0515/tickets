<?php

namespace App\View\Components;

use Illuminate\View\Component;

class dataTableComponent extends Component
{
    public $id;
    public $route;
    public $columns;
    public $headers;
    public $headerOffset;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $route, $columns, $headers, $headerOffset = 0)
    {
        $this->id = $id;
        $this->route = $route;
        $this->columns = $columns;
        $this->headers =$headers;
        $this->headerOffset = $headerOffset;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.datatable');
    }
}
