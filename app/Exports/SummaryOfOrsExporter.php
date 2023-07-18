<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class SummaryOfOrsExporter implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $ors, $groupedProjects, $groupedProjectsNull, $orsArray;
    public function __construct($ors, $groupedProjects, $groupedProjectsNull, $orsArray)
    {
        $this->ors = $ors;
        $this->groupedProjects = $groupedProjects;
        $this->groupedProjectsNull = $groupedProjectsNull;
        $this->orsArray = $orsArray;

    }

    public function view(): View
    {
        return  view('printables.ors.tables.table_summary_of_ors')->with([
            'ors' => $this->ors,
            'groupedProjects' => $this->groupedProjects,
            'groupedProjectsNull' => $this->groupedProjectsNull,
            'orsArray' => $this->orsArray,
        ]);
    }
}
