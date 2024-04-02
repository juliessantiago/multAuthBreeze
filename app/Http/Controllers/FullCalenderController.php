<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\HorariosLivres;
use Illuminate\Http\JsonResponse;

class FullCalenderController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()) {
             $data = Event::whereDate('start', '>=', $request->start)
                       ->whereDate('end',   '<=', $request->end)
                       ->get(['id', 'title', 'start', 'end']);
             return response()->json($data);
        }
        return view('fullcalender',[   'teste'=>[
            'a'=>'dgsdfg',
            'b'=>'qwerty',
            'c'=>1 ]
        ]);
    }

    public function batata(){
        $inicio = HorariosLivres::find(2)->inicioExpediente; 
        $final = HorariosLivres::find(2)->fimExpediente; 
        // return response()->json($data);
        return view('fullcalender', ['batata'=>[
            'inicio'=>$inicio,
            'final'=>$final]
        ]);
    }
    public function ajax(Request $request): JsonResponse
    {
        switch ($request->type) {
           case 'add':
              $event = Event::create([
                  'title' => $request->title,
                  'start' => $request->start,
                  'end' => $request->end,
              ]);
            //   dd($request); 

              return response()->json($event);
             break;

           case 'update':
              $event = Event::find($request->id)->update([
                  'title' => $request->title,
                  'start' => $request->start,
                  'end' => $request->end,
              ]);

              return response()->json($event);
             break;

            case 'delete':
              $event = Event::find($request->id)->delete();
              return response()->json($event);
            break;
        }
    }
}