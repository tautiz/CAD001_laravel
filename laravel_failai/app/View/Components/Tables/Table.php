<?php

namespace App\View\Components\Tables;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class Table extends Component
{
    public array $fields = [];
    public string $mainRoute;

    /**
     * Create a new component instance.
     */
    public function __construct(public Iterable $iterable, array|string $columns = [], ?string $routeName = null)
    {
        $model = $iterable->first();
        if($model instanceof Model && empty($columns)) {
            $connection   = $model->getConnection();
            $schema       = $connection->getSchemaBuilder();
            $tableName    = $model->getTable();
            $this->fields = $schema->getColumnListing($tableName);
        } else {
            $this->fields = is_array($columns) ? $columns : explode(',', $columns);
        }


        if(is_null($routeName)) {
            $routeName       = Route::currentRouteName();
            $routeName       = explode('.', $routeName);
            $this->mainRoute = $routeName[0];
        }
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
