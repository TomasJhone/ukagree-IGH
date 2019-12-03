<?php

namespace Modules\PolizzaCar\Datatables\Settings;

use Modules\PolizzaCar\Entities\PolizzaCarProcurement;
use Modules\Platform\Core\Datatable\PlatformDataTable;
use Modules\Platform\Core\Helper\DataTableHelper;
use Yajra\DataTables\EloquentDataTable;

class PolizzaCarProcurementDatatable extends PlatformDataTable
{
    const SHOW_URL_ROUTE = 'polizzacar.procurement.show';

    protected $editRoute = 'polizzacar.procurement.edit';

    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        $this->applyLinks($dataTable, self::SHOW_URL_ROUTE);

        $dataTable->filterColumn('created_at', function ($query, $keyword) {
            $dates = DataTableHelper::getDatesForFilter($keyword);

            if ($dates != null) {
                $query->whereBetween('created_at', array($dates[0], $dates[1]));
            }
        });
        $dataTable->filterColumn('updated_at', function ($query, $keyword) {
            $dates = DataTableHelper::getDatesForFilter($keyword);

            if ($dates != null) {
                $query->whereBetween('updated_at', array($dates[0], $dates[1]));
            }
        });

        return $dataTable;
    }

    /**
     * Get query source of dataTable.
     *
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(PolizzaCarProcurement $model)
    {
        return $model->disableModelCaching()->newQuery()->select();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())

            ->setTableAttribute('class', 'table table-hover')
            ->parameters([
                'dom' => 'lBfrtip',
                'responsive' => false,
                'stateSave' => true,
                'headerFilters' => true,
                'buttons' => DataTableHelper::buttons(),
                'regexp' => true
            ]);
    }

    /**
     * @return array
     */
    protected function getColumns()
    {
        return
            $this->btnQuick_edit +
            [
                'company_name' => [
                    'data' => 'company_name',
                    'title' => trans('PolizzaCar::PolizzaCar.form.company_name'),
                    'data_type' => 'text',
                    'filter_type' => 'text'
                ],
                'company_email' => [
                    'data' => 'company_email',
                    'title' => trans('PolizzaCar::PolizzaCar.form.company_email'),
                    'data_type' => 'text',
                    'filter_type' => 'text'
                ],
                'works_type_details' => [
                    'data' => 'works_type_details',
                    'title' => trans('PolizzaCar::PolizzaCar.form.works_type_details'),
                    'data_type' => 'text',
                    'filter_type' => 'text'
                ],
                'works_place' => [
                    'data' => 'works_place',
                    'title' => trans('PolizzaCar::PolizzaCar.form.works_place'),
                    'data_type' => 'text',
                    'filter_type' => 'text'
                ],
                'insurance_policy' => [
                    'data' => 'insurance_policy',
                    'title' => trans('PolizzaCar::PolizzaCar.form.insurance_policy'),
                    'data_type' => 'text',
                    'filter_type' => 'text'
                ],
                'created_at' => [
                    'data' => 'created_at',
                    'title' => trans('core::core.table.created_at'),
                    'data_type' => 'datetime',
                    'filter_type' => 'vaance_date_range_picker',
                ],
                'updated_at' => [
                    'data' => 'updated_at',
                    'title' => trans('core::core.table.updated_at'),
                    'data_type' => 'datetime',
                    'filter_type' => 'vaance_date_range_picker',
                ]
            ];
    }
}
