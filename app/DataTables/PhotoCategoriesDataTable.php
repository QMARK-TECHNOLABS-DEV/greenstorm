<?php

namespace App\DataTables;

use App\Models\PhotoCategory;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PhotoCategoriesDataTable extends DataTable
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
            ->addColumn('title', function(PhotoCategory $category) { 
                return  '<i class="badge bg-role-'. $category->id.'"> '.$category->title.'</i>' ;
            }) 
            ->addColumn('description', function(PhotoCategory $category) { 
                return  $category->description;
            })   
            ->addColumn('action', function(PhotoCategory $category) { 
                return  '<button class="btn btn-primary btn-sm editCategoryBtn" data-category-id="'.$category->id.'" ><i class="fa fa-edit"></i> Edit</button>';
            })   
            ->rawColumns(['title','action'])
            ->addIndexColumn();

    }

    /**
     * Get the query source of dataTable.
     */
    public function query(PhotoCategory $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    { 
        return $this->builder()
            ->setTableId('photo_cateogries-table')
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
        return 'PhotoCategories_' . date('YmdHis');
    }
}
