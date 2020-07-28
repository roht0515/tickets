<?php

namespace App\View\Components;

use Illuminate\View\Component;

class form extends Component
{
    public $title , $idModal,$idForm,$action,$method, $size,$headerBg, $type, $btnCloseClass, $btnCloseName,$idBtnSubmit,$btnSubmitClass, $btnSubmitName;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title,$idForm,$action,$method, $idModal, $size,$headerBg, $btnCloseClass, $btnCloseName,$idBtnSubmit,$btnSubmitClass,$btnSubmitName)
    {
        $this->title = $title;
        $this->idModal = $idModal;
        $this->idForm = $idForm;
        $this->action = $action;
        $this->method = $method;
        $this->size = $size;
        $this->headerBg = $headerBg;
        $this->btnCloseName = $btnCloseName;
        $this->btnCloseClass = $btnCloseClass;
        $this->idBtnSubmit = $idBtnSubmit;
        $this->btnSubmitName = $btnSubmitName;
        $this->btnSubmitClass = $btnSubmitClass;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form');
    }
}
