<?php

namespace App\View\Components\Forms\Buttons;

use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Route;
use \Closure;


class Action extends Component
{
    public string $mainRoute;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public Model $model, ?string $mainRoute = null, public bool $displayShowLink = false)
    {
        $routeName = Route::currentRouteName();
        $routeName = explode('.', $routeName);
        $this->mainRoute = $mainRoute ?? $routeName[0];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render(): View|string|Closure
    {
        return view('components.forms.buttons.action');
    }
}
