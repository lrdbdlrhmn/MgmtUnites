<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\SkipsUnknownSheets;
class AppImport implements WithMultipleSheets , SkipsUnknownSheets
{
    private $unite_id;
    public function __construct($unite_id)
    {
        
        $this->unite_id = $unite_id;
        # code...
    }
    public function sheets(): array
    {
        return [
            'Personnels' => new PersonnelsImport($this->unite_id),
            'Materiel' => new MaterielsImport($this->unite_id),
            'Qualification' => new QualificationsImport(),
        ];
    }
    public function onUnknownSheet($sheetName)
    {
        // E.g. you can log that a sheet was not found.
        info("Feuille {$sheetName} a été décharger");
    }
    
}
