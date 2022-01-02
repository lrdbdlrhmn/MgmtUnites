<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Grade;
use App\Fonctionp;
use App\Personne;
use App\Qualification;
use App\PersonneUnite;

use Carbon\Carbon as time;
class PersonnelsImport implements ToModel,WithHeadingRow
{
    private $personnels;
    private $fonctionps;
    private $qualifications;
    private $grades;

    private $unite_id;
    public function __construct($unite_id)
    {
        $this->personnels = Personne::select(['id','nom','prenom','matricule'])->get();
        $this->fonctionps = Fonctionp::select(['id','libelle'])->get();
        $this->qualifications = Qualification::select(['id','libelle'])->get();
        $this->grades = Grade::select(['id','libelle'])->get();

        $this->unite_id = $unite_id;
        # code...
    }
    
    public function model(array $row)
    {
        $personnel = $this->personnels->where('matricule',$row['matricule'])->first();
        $fonctionp = $this->fonctionps->where('libelle',$row['fonction'])->first();
        $qualification = $this->qualifications->where('libelle',$row['qualification'])->first();
        $grade = $this->grades->where('libelle',$row['grade'])->first();
        $etat = 1;
        if ($row['etat'] == 'En Service') {
            # code...
            $etat = 1;
        }
        if ($row['etat'] == 'Hors Service') {
            # code...
            $etat = 2;
        }
        print_r($grade);
        return new PersonneUnite([
            'unite_id' => $this->unite_id,
            'personne_id' => $personnel->id,
            'fonctionp_id' => $fonctionp->id,
            'qualification_id' => $qualification->id,
            'grade_id' => $grade->id ?? NULL,
            'etat' => $etat,
            'date' => time::now(),
        ]);
    }
    public function headingRow(): int
    {
        return 1;
    }
}