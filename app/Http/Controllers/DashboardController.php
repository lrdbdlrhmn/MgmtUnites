<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Qualification;
use App\Personne;
use App\Piece;
use App\Unite;
use App\Bataillon;
use App\Region;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() {
        
        $qualifications = Qualification::select()->count();
        $pieces = Piece::select()->count();
        $personnes = Personne::select()->count();
        $unites = Unite::select()->count();
        //$charts = [];
        //$i = 0;
        /*$bat = Bataillon::select(['id','libelle'])->get();
        foreach ($bat as $item) {
            $charts[$i] = $item->libelle;
            $unites = Unite::where('bataillon_id',$item->id)->get(['libelle']);
            $j = 0;
            foreach ($unites as $item) {
                $charts[$i][$j] = $item->libelle;

                $j++;
                # code...
            }
            $i++;
        }
        
        
        $reg = Region::select(['id','libelle'])->get();

        
        foreach ($reg as $value) {
            $bataillon[$value->id] = Bataillon::where('region_id',$value->id)->count();
        }
        */
        $reg = Region::select(['id','libelle'])->get();
        $bata = [];
        $region = [];
        foreach ($reg as $value) {
            $bata[] = Bataillon::where('region_id',$value->id)->count();
            $region[] = $value->libelle;
        }

        $bat = Bataillon::select(['id','libelle'])->get();
        $unite = [];
        $bataillon = [];
        foreach ($bat as $value) {
            $unite[] = Unite::where('bataillon_id',$value->id)->count();
            $bataillon[] = $value->libelle;
        }

        $_bataillons = DB::table('bataillons')
            ->join('unites','unites.bataillon_id','=','bataillons.id')
            ->join('regions', 'regions.id', '=', 'bataillons.region_id')                        
            ->select('regions.libelle', DB::raw('COUNT(unites.id) as unites_par_region'));
        $_bataillons->groupBy('regions.libelle');
        $bataillons = $_bataillons->get();

        



        //$bat = Unite::join('bataillons', 'unites.bataillon_id', '=', 'bataillons.id')->select(['bataillons.libelle', 'unites.libellear'])->orderby('bataillons.libelle')->get();
        //print_r($bat);
        return view('dashboard',['qua' => $qualifications,'piece' => $pieces,'personne' => $personnes,'unites' => $unites,'unite' => json_encode($unite,JSON_NUMERIC_CHECK),'bata' => json_encode($bata,JSON_NUMERIC_CHECK),'bat' =>json_encode($bataillon),'reg' =>json_encode($region),'bataillons' => json_encode($bataillons)]);
    }
}
