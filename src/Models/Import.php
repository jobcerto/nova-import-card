<?php

namespace Jobcerto\NovaImportCard\Models;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class Import implements ToCollection, WithHeadingRow
{
    protected $model;

    protected $columns;

    public function __construct($model, array $columns)
    {
        $this->model = $model;

        $this->columns = $columns;
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {
        $rows
            ->filter(function ($row) {
                return $row[$this->columns[0]] !== null;
            })->each(function ($row) {
            $this->model->create($row->all());
        });
    }

}
