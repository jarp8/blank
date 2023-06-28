<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use App\DataTables\BlankDataTable;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class UsersDataTable extends BlankDataTable
{

    public function __construct()
    {   
        parent::__construct('users');
    }

    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->addColumn('action', function ($row) {
            return $this->getActions($row);
        })
        ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model): QueryBuilder
    {
        return $model->with('role');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        $html = parent::html();

        $html->stateSave(true)
        ->stateSaveParams('function(settings, data){ delete data.search; }')
        ->buttons([
            Button::make('excel'),
            Button::make('reload'),
            // Button::make('reset'),
            // Button::make('colvis')
        ]);

        return $html;
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('name'),
            Column::make('email'),
            Column::make('role.name'),
            Column::make('created_at')->visible(false),
            Column::make('updated_at')->visible(false),
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(60)
            ->addClass('text-center'),
        ];
    }

    public function getActions($row)
    {
        $buttons = parent::getButtons($row);
        
        if(Gate::allows("users.permissions")) {
            $buttons[] = ['route' => route("users.permissions", $row->id), 'icon' => '<i class="fas fa-project-diagram"></i>'];
        }

        $actions = view('datatables.action', compact('buttons'))->render();

        return $actions;
    }
}
