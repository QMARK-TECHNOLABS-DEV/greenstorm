<?php

namespace App\DataTables;

use App\Models\Stage;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class StagesDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    { 
        return datatables()
            ->eloquent($query) 
            ->addColumn('title', function(Stage $stage) { 
                return  '<i class="badge bg-role-'. $stage->id.'"> '.$stage->name.'</i>' ;
            }) 
            ->addColumn('description', function(Stage $stage) { 
                return  $stage->description;
            })   
            ->addColumn('action', function(Stage $stage) { 
                return  '<button class="btn btn-primary btn-sm editStageBtn" data-stage-id="'.$stage->id.'" ><i class="fa fa-edit"></i> Edit</button>';
            })   
            ->rawColumns(['title','action'])
            ->addIndexColumn();

    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Stage $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    { 
        return $this->builder()
            ->setTableId('stages-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1);

    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('title'),
            Column::make('description'),
            Column::make('action'),
            
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Stages_' . date('YmdHis');
    }
}
