<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class SubsidiaryLedgerExporter implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $ors,$account,$request;

    public function __construct($ors,$account,$request)
    {
        $this->ors = $ors;
        $this->account = $account;
        $this->request = $request;
    }

    public function view() : View
    {
        return  view('printables.ors.tables.table_subsidiary_ledger')->with([
            'ors' => $this->ors,
            'account' => $this->account,
            'request' => $this->request,
        ]);
    }
}
