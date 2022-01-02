<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Unite;
use App\Classep;
use App\Materiel;
use App\ClassepUnite;
use App\Qualification;
use App\MaterielUnite;
use App\QualificationUnite;

class ParametragesController extends Controller
{
    public function parametrage()
    {
        $unites = Unite::select(['id','libelle'])->get();
        $matriels = Materiel::select(['id','libelle'])->get();
        $qualifications = Qualification::select(['id','libelle'])->get();
        return view('pages.agents.parametrage',['unites' => $unites,'materiels' => $matriels,'qualifications' => $qualifications]);
    
    }
    public function storePerso(Request $request)
    {
        $idOff = Classep::where('libelle','Officiers')->get();
        $idSoff = Classep::where('libelle','Sous-Officiers')->get();
        $idHdt = Classep::where('libelle','HDT')->get();

        foreach ($idOff as $off) {

            $idoff = $off->id;
            # code...
        }

        foreach ($idSoff as $soff) {

            $idsoff = $off->id;
            # code...
        }
        foreach ($idHdt as $hdt) {

            $idhdt = $hdt->id;
            # code...
        }
       
        //Validation

        $validation = Validator::make($request->all(),
        [
            'off' => 'numeric|min:0',
            'soff' => 'numeric|min:0',
            'hdt' => 'numeric|min:0',
            
        ]
        );
        
       
        if ($validation->fails())
        {
            return redirect()->back()->with('error',"Les données ne sont pas valide");
        }else
        {
        //Save
        $classepunite = new ClassepUnite;
        $classepunite->unite_id = $request->unite;
        $classepunite->classep_id = $idoff;
        $classepunite->theorique = $request->off;
        $classepunite->save();

        $classepunite = new ClassepUnite;
        $classepunite->unite_id = $request->unite;
        $classepunite->classep_id = $idsoff;
        $classepunite->theorique = $request->soff;
        $classepunite->save();

        $classepunite = new ClassepUnite;
        $classepunite->unite_id = $request->unite;
        $classepunite->classep_id = $idhdt;
        $classepunite->theorique = $request->hdt;
        $classepunite->save();

        
        return redirect()->back()->with('status','Ajouter avec succés');
        }
    }
    public function storeMat(Request $request)
    {
        //Validation

        $validation = Validator::make($request->all(),
        [
            'theorique' => 'numeric|min:0',
            
        ]
        );
        if ($validation->fails())
        {
            return redirect()->back()->with('error',"Les données ne sont pas valide");
        }else
        {
        //Save
        $materielunite = new MaterielUnite;
        $materielunite->unite_id = $request->unite;
        $materielunite->materiel_id = $request->materiel;
        $materielunite->theorique = $request->theorique;
        $materielunite->save();
        return redirect()->back()->with('status','Ajouter avec succés');
        }
    }

    public function storeQua(Request $request)
    {
        //Validation

        $validation = Validator::make($request->all(),
        [
            'theorique' => 'numeric|min:0',
        ]
        );
        
       
        if ($validation->fails())
        {
            return redirect()->back()->with('error',"Les données ne sont pas valide");
        }else
        {
        //Save

        $qunite = new QualificationUnite;
        $qunite->unite_id = $request->unite;
        $qunite->qualification_id = $request->qua;
        $qunite->theorique = $request->theorique;
        $qunite->save();

        
        return redirect()->back()->with('status','Ajouter avec succés');
        }
    }

    //
}
