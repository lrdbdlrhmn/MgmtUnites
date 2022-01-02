<?php
namespace App\Imports;
use App\Qualification;
use App\PersonneQualification;
use App\Personne;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
//use Maatwebsite\Excel\Concerns\HeadingRowFormatter;

class QualificationsImport implements ToModel,WithHeadingRow
{
    private $quas;
    private $persos;
    public function __construct()
    {
        $this->quas = Qualification::select(['id','libelle'])->get();
        $this->persos = Personne::select(['id','matricule'])->get();
        # code...
    }
    public function model(array $row)
    {
        $personne = $this->persos->where('matricule',$row['matricule'])->first();
        //print_r($personne->id);
        $qua = $this->quas->where('libelle',$row['qualification'])->first();
        return new PersonneQualification([
            
            'personne_id' => $personne->id,
            'qualification_id' => $qua->id,
        ]);
    }
    public function headingRow(): int
    {
        return 1;
    }
    //HeadingRowFormatter::default('none');
}