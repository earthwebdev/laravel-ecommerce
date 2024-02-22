<?php

namespace App\View\Components\Base\Back\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class tinymceEditor extends Component
{
    public $tinymce_data;
    /**
     * Create a new component instance.
     */
    public function __construct($name, $id, $value = null)
    {

        $this->tinymce_data = [
            "name"=> $name,
            "id"=> $id,
            "value"=> $value
        ];
        //dd($this->tinymce_data['name']);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.base.back.forms.tinymce-editor');
    }
}
