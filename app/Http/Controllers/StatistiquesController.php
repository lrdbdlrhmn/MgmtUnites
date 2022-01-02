<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PersonneUnite;
use Illuminate\Support\Facades\DB;
use App\Region;
use App\Bataillon;
use App\Unite;
use App\ClassepUnite;
use App\MaterielUnite;
use App\QualificationUnite;
use App\Grade;
use App\Materiel;
use App\Piece;
class StatistiquesController extends Controller
{
    //
    public function index()
    {
        $regions = Region::select(['id','libelle'])->get();
        return view('pages.statistiques.index',['regions' => $regions]);
        # code...
    }

    public function getBataillons(Request $request)
    {
        $bataillons = Bataillon::where('region_id', $request->region_id)->get();
        
        if (count($bataillons) > 0) {
            return response()->json($bataillons);
        }
    }
    public function getUnites(Request $request)
        {
            $unites = Unite::where('bataillon_id', $request->bataillon_id)->get();
            
            if (count($unites) > 0) {
                return response()->json($unites);
            }
        }
    public function anyData(Request $request)
    {

    $tpersos = ClassepUnite::join('classeps','classeps.id','classep_unites.classep_id')->select('classeps.libelle','theorique')->where('classep_unites.unite_id',$request->unites)->get();
    $rpersos = Grade::join('classeps','classeps.id','grades.classep_id')->join('personne_unites','personne_unites.grade_id','grades.id')->select(DB::raw('COUNT(classeps.id) as classes'),'classeps.libelle')->where('personne_unites.unite_id',$request->unites)->groupBy('classeps.id','classeps.libelle')->get();
    
    $tmats = MaterielUnite::join('materiels','materiels.id','materiel_unites.materiel_id')->select('materiels.libelle','theorique')->where('materiel_unites.unite_id',$request->unites)->get();
    $rmats = Piece::join('materiels','materiels.id','pieces.materiel_id')->select(DB::raw('COUNT(materiels.id) as mat'),'materiels.libelle')->where('pieces.unite_id',$request->unites)->whereIn('materiels.libelle',array('VHF','HF','UHF'))->groupBy('materiels.id','materiels.libelle')->get();
    
    $materiels = [];

    foreach ($tmats as $tmat) {
        $materiels['theorique'][$tmat->libelle] = $tmat->theorique;   
    }
    foreach ($rmats as $rmat) {
        $materiels['realise'][$rmat->libelle] = $rmat->mat;   
    }
    

    $personnels = [];

    foreach ($tpersos as $tperso) {
        $personnels['theorique'][$tperso->libelle] = $tperso->theorique;   
    }
    foreach ($rpersos as $rperso) {
        $personnels['realise'][$rperso->libelle] = $rperso->classes;   
    }
    $data['personnels'] = $personnels;
    $data['materiels'] = $materiels; 
    return response()->json($data);
    ///return view('pages.statistiques.page',['tpersos' =>json_encode($tpersos,JSON_NUMERIC_CHECK)]);
    }
    
    

}
