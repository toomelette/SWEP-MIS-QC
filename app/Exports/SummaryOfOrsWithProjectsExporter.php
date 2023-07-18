<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class SummaryOfOrsWithProjectsExporter implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected  $burs, $cols, $departmentListAbbv;

    public function __construct($burs,$cols,$departmentListAbbv)
    {
        $this->burs = $burs;
        $this->cols = $cols;
        $this->departmentListAbbv = $departmentListAbbv;
    }

    public function view() : View
    {
        return view('printables.ors.tables.table_summary_of_ors_with_projects')->with([
            'burs' => $this->burs,
            'cols' => $this->cols,
            'departmentListAbbv' => $this->departmentListAbbv,
        ]);
    }
}
