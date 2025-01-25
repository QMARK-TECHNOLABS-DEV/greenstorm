<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        // return (new EloquentDataTable($query))
        //     ->addColumn('action', 'users.action')
        //     ->setRowId('id');
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function(User $user){
                return '<div class="d-flex justify-content-between">
                                <div data-user-id="'.$user->id.'" class="br-toggle br-toggle-rounded br-toggle-primary '.($user->status == true ? 'on': '').'">
                                <div class="br-toggle-switch"></div>
                            </div>
                            <div>
                                <a data-user-id="'.$user->id.'" class="expand-detail cursor-pointer">
                                    <i class="fa fa-expand"></i> View
                                </a>
                            </div>
                        </div>';
            })
            ->addColumn('role', function(User $user) { 
                return  '<i class="badge text-white bg-role-'.$user->role.'">'.$user->role.'</i>' ;
            })
            ->addColumn('status', function(User $user) {
                return  (($user->status == true)? '<i class="badge text-white bg-success user_'.$user->id.'__status">Active</i>': '<i class="badge text-white bg-danger user_'.$user->id.'__status">Inactive</i>') ;
            })
            ->rawColumns(['status','action','role'])
            ->addIndexColumn();

    }

    /**
     * Get the query source of dataTable.
     */
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        // return $this->builder()
        //             ->setTableId('users-table')
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
            ->setTableId('users-table')
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
            Column::make('name'),
            Column::make('email'),
            Column::make('role'), 
            Column::make('status'),
            Column::make('action'),
            
            // Column::make('created_at'),
            // Column::make('updated_at'),
            // Column::computed('action')
            // ->exportable(false)
            // ->printable(false)
            // ->width(60)
            // ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Users_' . date('YmdHis');
    }
}
