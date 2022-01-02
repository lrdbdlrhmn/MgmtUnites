<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Region;
use App\Bataillon;
use App\Unite;
use App\ClassepUnite;
use App\MaterielUnite;
use App\QualificationUnite;
use App\Grade;
use App\Materiel;
use App\Piece;
use App\PersonneUnite;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class ReportingsController extends Controller
{
    //
    public function index()
    {
        $regions = Region::select(['id','libelle'])->get();
        $bataillons = Bataillon::select(['id','libelle'])->get();
        $unites = Unite::select(['id','libelle'])->get();

        return view('pages.rapports.index',['regions' => $regions,'bataillons' => $bataillons,'unites' => $unites]);
        # code...
    }
    public function rapport(Request $request)
    {
        $validation = Validator::make($request->all(),
            [
                'regions' => 'required',
                'bataillons' => 'required',
                'unites' => 'required'

            ]
        );
        if ($validation->fails()) {
            return redirect()->back()->with('error',"Le fichier n'est pas import, réessayer");

        }
        $tpersos = ClassepUnite::join('classeps','classeps.id','classep_unites.classep_id')->select('classeps.libelle','theorique')->where('classep_unites.unite_id',$request->unites)->get();

        $tpersonnels = [];
       
        foreach ($tpersos as $tperso) {
            # code...
            $tpersonnels[$tperso->libelle] = $tperso->theorique;
            

        }
        $rpersos = $rpersos = Grade::join('classeps','classeps.id','grades.classep_id')->join('personne_unites','personne_unites.grade_id','grades.id')->select(DB::raw('COUNT(classeps.id) as classes'),'classeps.libelle')->where('personne_unites.unite_id',$request->unites)->groupBy('classeps.id','classeps.libelle')->get();
        $rpersonnels = [];
       
        foreach ($rpersos as $rperso) {
            # code...
            $rpersonnels[$rperso->libelle] = $rperso->classes;
        }
        $tmats = MaterielUnite::join('materiels','materiels.id','materiel_unites.materiel_id')->select('materiels.libelle as libelle','theorique')->where('materiel_unites.unite_id',$request->unites)->get();
        $tmateriels = [];
        foreach ($tmats as  $tmat) {
            $tmateriels[$tmat->libelle] = $tmat->theorique;
        }

        $rmats = Piece::join('materiels','materiels.id','pieces.materiel_id')->select(DB::raw('COUNT(materiels.id) as mat'),'materiels.libelle')->where('pieces.unite_id',$request->unites)->whereIn('materiels.libelle',array('VHF','HF','UHF'))->groupBy('materiels.id','materiels.libelle')->get();
        $rmateriels = [];
        foreach ($rmats as  $rmat) {
            $rmateriels[$rmat->libelle] = $rmat->mat;
        }
        $unite = ClassepUnite::join('unites','unites.id','classep_unites.unite_id')->select('libelle')->where('unite_id',$request->unites)->first();
        return view('pages.rapports.rapport',['tpersonnels' => $tpersonnels,'rpersonnels' => $rpersonnels,'tmateriels'=>$tmateriels,'rmateriels' => $rmateriels,'unite' => $unite]);

    }
}
