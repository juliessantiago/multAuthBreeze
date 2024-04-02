<?php

namespace App\Http\Controllers;

use App\Models\HorariosLivres;
use Illuminate\Http\Request;

class HorariosLivresController extends Controller
{
    public function index($id){
        $horarioLivres = HorariosLivres::where('id', $id)->get(); 
        return response()->json($horarioLivres); 
    }
}
