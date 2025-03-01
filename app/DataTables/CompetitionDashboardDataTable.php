<?php

namespace App\DataTables;

use App\Models\CompetitionDashboard;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;

class CompetitionDashboardDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'competitiondashboard.action')
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(CompetitionDashboard $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        // return $this->builder()
        //             ->setTableId('competitiondashboard-table')
        //             ->columns($this->getColumns())
        //             ->minifiedAjax()
        //             //->dom('Bfrtip')
        //             ->orderBy(1)
        //             ->selectStyleSingle()
        //             ->buttons([
        //                 Button::make('excel'),
        //                 Button::make('csv'),
        //                 Button::make('pdf'),
        //                 Button::make('print'),
        //                 Button::make('reset'),
        //                 Button::make('reload')
        //             ]);
        return $this->builder()
        ->columns([
            'id',
            'title',
            // Add more columns as needed
        ])
        ->addColumn('action', function ($data) {
            // Define custom card-like layout here
            return view('admin.dashboard-competition', compact('data'))->render();
        })
        ->ajax(['data' => 'function(data) { return data; }']);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('id'),
            Column::make('add your columns'),
            Column::make('created_at'),
            Column::make('updated_at'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'CompetitionDashboard_' . date('YmdHis');
    }
}
