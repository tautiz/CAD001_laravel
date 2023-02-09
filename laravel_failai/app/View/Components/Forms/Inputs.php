<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class Inputs extends Component
{
    public array $fields;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public Model $model, string $fields)
    {
        $this->fields = explode(',', $fields);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render(): View|string|Closure
    {
        return view('components.forms.inputs');
    }
}
