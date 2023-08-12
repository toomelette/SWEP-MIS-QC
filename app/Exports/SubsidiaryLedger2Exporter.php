<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class SubsidiaryLedger2Exporter implements FromView
{


    public function __construct(
        protected $accountEntries,
    )
    {

    }

    public function view() : View
    {
        return  view('printables.ors.tables.table_subsidiary_ledger_2')->with([
            'accountEntries' => $this->accountEntries,
        ]);
    }
}
