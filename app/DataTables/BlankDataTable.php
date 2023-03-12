<?php

namespace App\DataTables;

use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BlankDataTable extends DataTable
{

    public $source;

    public function __construct($source)
    {
        $this->source = $source;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId("{$this->source}-table")
                    ->columns($this->getColumns())
                    ->orderBy(0, 'asc')
                    ->processing(true)
                    ->serverSide(true)
                    ->minifiedAjax()
                    ->dom('Bfrltip')
                    ->selectStyleSingle()
        			->responsive(true)
                    ->initComplete('function(){ deleteDataTableItem(); }')
                    ->buttons([
                        Button::make('excel'),
                        // Button::make('csv'),
                        // Button::make('pdf'),
                        // Button::make('print'),
                        // Button::make('reset'),
                        // Button::make('reload')
                    ]);
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return ucwords($this->source) . '_' . date('YmdHis');
    }

    public function getButtons($row)
    {
        $buttons = [];

        if(Gate::allows("{$this->source}.edit")) {
            $buttons[] = ['route' => route("{$this->source}.edit", $row->id), 'icon' => '<i class="far fa-edit"></i>'];
        }

        if(Gate::allows("{$this->source}.destroy")) {
            $buttons[] = ['route' => route("{$this->source}.destroy", $row->id), 'icon' => '<i class="far fa-trash-alt"></i>', 'modal' => 'deleteModal'];
        }

        return $buttons;
    }

    public function getActions($row)
    {
        $buttons = $this->getButtons($row);

        $actions = view('datatables.action', compact('buttons'))->render();

        return $actions;
    }
}
