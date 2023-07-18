<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class StatementOfBudgeAndActualExpendituresExporter implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $depts;
    protected $groupedCoasArray;
    public function __construct($depts,$groupedCoasArray)
    {
        $this->depts = $depts;
        $this->groupedCoasArray = $groupedCoasArray;
    }

    public function view(): View
    {
        return view('printables.ors.tables.table_statement_of_budget_and_actual_expenditures')->with([
            'depts' => $this->depts,
            'groupedCoasArray' => $this->groupedCoasArray,
        ]);
    }
}
