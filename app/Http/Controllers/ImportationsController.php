<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unite;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AppImport;
use Illuminate\Support\Facades\Validator;
class ImportationsController extends Controller
{
    public function import()
    {
        $unites = Unite::select(['id','libelle'])->get();
        return view('pages.agents.import',['unites' => $unites]);
    }

    public function store(Request $request) 
    {
        $validation = Validator::make($request->all(),
        [
            'excel' => 'required|file|max:4096|mimes:xls,xlsx',
        ]);
        if ($validation->fails()) {
            # code...
            return redirect()->back()->with('error',"Le fichier n'est pas valide");

        }
        try {
            Excel::import(new AppImport($request->unite), $request->file('excel')->store('temp'));
            //code...
            return redirect()->back()->with('status','Importé avec succés');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error',"Le fichier n'est pas import, réessayer");
        }
        
            
    }
    //
}
