<?php

namespace App\View\Components\Tables;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class Table extends Component
{
    public array $fields;
    public string $mainRoute;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public Iterable $iterable)
    {
        $model = $iterable->first();

        $connection = $model->getConnection();
        $schema = $connection->getSchemaBuilder();
        $tableName = $model->getTable();
        $this->fields = $schema->getColumnListing($tableName);
        $routeName = Route::currentRouteName();
        $routeName = explode('.', $routeName);
        $this->mainRoute = $mainRoute ?? $routeName[0];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render(): View|Closure|string
    {
        return view('components.tables.table');
    }
}
