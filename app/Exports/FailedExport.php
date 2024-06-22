<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class FailedExport implements FromCollection
{
    private $nonValidRows;

    public function __construct(array $nonValidRows)
    {
        $this->nonValidRows = $nonValidRows;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return collect($this->nonValidRows);
    }
}
