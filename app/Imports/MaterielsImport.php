<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Materiel;
use App\Piece;

class MaterielsImport implements ToModel, WithHeadingRow
{
    private $materiels;
    private $unite_id;
    public function __construct($unite_id)
    {
        $this->materiels = Materiel::select(['id','libelle'])->get();
        $this->unite_id = $unite_id;
        # code...
    }

        public function model(array $row)
    {
        $materiel = $this->materiels->where('libelle',$row['type'])->first();

        return new Piece([
            'unite_id' => $this->unite_id,
            'materiel_id' => $materiel->id,
            'etat' => $row['etat'],
            'num_serie' => $row['numero'],
        
        ]);
    }
    public function headingRow(): int
    {
        return 1;
    }
        //
}
