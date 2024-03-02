<?php

namespace App\DataTables;

use App\Models\ProductVariant;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProductVariantDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
             ->addColumn('action', function($query){
                $manageOption = "<a href='".route('admin.products-variant-item.index', ['productId' => request()->product, 'variantId' => $query->id])."' class='btn btn-info'><i class='fa-solid fa-pen-to-square'></i>Variant Items</a>";
                $editBtn = "<a href='".route('admin.products-variant.edit', $query->id)."' class='btn btn-primary ml-2'><i class='fa-solid fa-pen-to-square'></i></a>";
                $deleteBtn = "<a href='".route('admin.products-variant.destroy', $query->id)."' class='btn btn-danger ml-2 delete-item'><i class='fa-solid fa-trash'></i></a>";
                return $manageOption.$editBtn.$deleteBtn;
             })
             ->addColumn('status', function($query){
                 if($query->status == 1){
                      $button = '<label class="custom-switch mt-2">
                      <input type="checkbox" checked name="custom-switch-checkbox" data-id="'.$query->id.'" class="custom-switch-input change-status">
                      <span class="custom-switch-indicator"></span>
                      </label>';
                 } else {
                      $button = '<label class="custom-switch mt-2">
                      <input type="checkbox" name="custom-switch-checkbox" data-id="'.$query->id.'" class="custom-switch-input change-status">
                      <span class="custom-switch-indicator"></span>
                      </label>';
                 }
                 return $button;
             })
             ->rawColumns(['action', 'status'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ProductVariant $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('productvariant-table')
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
           Column::make('id')->width(100),
           Column::make('name'),
           Column::make('status')->width(200),
           Column::computed('action')
              ->exportable(false)
              ->printable(false)
              ->width(300)
              ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'ProductVariant_' . date('YmdHis');
    }
}
