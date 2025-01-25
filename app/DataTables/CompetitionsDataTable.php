<?php

namespace App\DataTables;

use App\Models\Competition;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Carbon\Carbon;
use Auth;
class CompetitionsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->addColumn('action', function(Competition $competition){
                // <a class="btn btn-success mr-2" href="'.route('competitions.manage.stages',['competition'=>$competition->id]).'" ><i class="fa fa-sitemap"></i> Stage Settings</a>
                if( Auth::user()->role =='admin' ){
                    $routeURL = route('competition.manage.settings',['competition'=>$competition->id]);
                }else{
                    $routeURL = route('evaluator.competition.manage.settings',['competition'=>$competition->id]);
                }
                $html =  '<div class="d-flex">
                <div class="mr-2">
                        <a href="" class="" data-toggle="dropdown">
                        <div class="ht-30 pd-x-20 bd d-flex align-items-center justify-content-center">
                            <i class="icon ion-android-more-horizontal"></i>
                        </div>
                        </a>
                        <div class="dropdown-menu pd-10 wd-200">
                            <nav class="nav nav-style-2 flex-column">
                                <a href="'. route('competition.manage.settings',['competition'=>$competition]) .'" class="nav-link"><i class="fa fa-desktop"></i> All Entries</a>
                                <a href="'. route('competition.manage.settings',['competition'=>$competition]) .'" class="nav-link"><i class="fa fa-filter"></i> Elimination</a>
                                <a href="'. route('competition.manage.settings',['competition'=>$competition]) .'" class="nav-link"><i class="fa fa-chart-bar"></i> Validation</a>
                                <a href="' .route('competition.published_for_vote',['competition'=>$competition]). '" class="nav-link"><i class="fas fa-vote-yea"></i> Votes</a>
                                <a href="" class="nav-link"><i class="fa fa-globe"></i> Public Page</a>
                                <a href="'. route('competition.stages',['competition'=>$competition]) .'" class="nav-link"><i class="fa fa-sitemap"></i> Stage Management</a>
                            </nav>
                        </div><!-- dropdown-menu -->
                    </div>

                        <a href="'.$routeURL.'" class="btn btn-sm btn-warning text-white  mr-2" data-competition-id="'.$competition->id.'" data-competition-title="'.$competition->title.'"><i class="fa fa-server"></i> Manage Settings</a>';
                if( Auth::user()->role =='admin' ){
                    $html .='<a class="btn btn-sm btn-primary text-white competitionCategorySetupBtn" data-competition-id="'.$competition->id.'" data-competition-title="'.$competition->title.'"><i class="fa fa-cogs"></i> Manage Category</a>
                    </div>';
                }
                return $html;
            })
            // ->editColumn('created_at', function($data){ $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('d-m-Y'); return $formatedDate; })
            // ->editColumn('updated_at', function($data){ $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->updated_at)->format('d-m-Y'); return $formatedDate; })
            // ->addColumn('levels', function(Competition $competition) {
            //     return  '<a class="btn btn-warning " href="'.route('competitions.manage.levels',['competition'=>$competition->id]).'" data-competition-id="'.$competition->id.'"><i class="fa fa-cogs"></i> Manage</a>';
            // })
            // ->addColumn('stage_settings', function(Competition $competition) {
            //     return '';
            // })
            ->addColumn('title', function(Competition $competition) {
                if( Auth::user()->role =='admin' ){
                    return  '<input class="form-control form-control-sm" data-competition-id="'.$competition->id.'" value="'.$competition->title.'" />';
                }else{
                    return $competition->title;
                }
            })
            ->addColumn('year', function(Competition $competition) {
                if( Auth::user()->role =='admin' ){
                    return  '<input class="form-control form-control-sm" data-competition-id="'.$competition->id.'" value="'.$competition->year.'" />';
                }else{
                    return $competition->year;
                }
            })
            ->addColumn('period', function(Competition $competition) {
                if( Auth::user()->role =='admin' ){
                    return  '<input class="form-control form-control-sm" data-competition-id="'.$competition->id.'" value="'.$competition->period.'" />';
                }else{
                    return $competition->period;
                }
            })
            ->addColumn('status', function(Competition $competition) {
                    return  (($competition->status == 'active') ?
                                    '<div  class="align-items-center"><button data-competition-id="'.$competition->id.'" data-competition-title="'.$competition->title.'" class="'.((Auth::user()->role =='admin') ? 'competitionActionButton': 'disabled').' btn btn-sm btn-danger  mg-b-10  stop"><i class="fa fa-stop mg-r-10"></i> STOP</button></div>' :
                                    '<div class="align-items-center"><button data-competition-id="'.$competition->id.'" data-competition-title="'.$competition->title.'" class="'.((Auth::user()->role =='admin') ? 'competitionActionButton': 'disabled').' btn btn-sm btn-success  mg-b-10  start"><i class="fa fa-play mg-r-10"></i> START</button>');

            })
            ->rawColumns(['title','year','period','stage_settings','status', 'action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Competition $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('competitions-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [

            Column::make('id'),
            Column::make('title')->style('width: 350px;'),
            Column::make('year')->style('width: 150px;'),
            Column::make('period')->style('width: 200px;'),
            Column::make('status'),
            // Column::make('stage_settings'),
            // Column::make('created_at'),
            // Column::make('updated_at'),
            Column::computed('action')
                  ->exportable(true)
                  ->printable(true)
                  ->width(100)
                  ->addClass('text-center')
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Competitions_' . date('YmdHis');
    }
}
