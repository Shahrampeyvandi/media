<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Members\Members;
use App\Models\Contens\Notes;

class NotesController extends Controller
{
    public function Index()
    {

        $notes=Notes::where('members_id',auth()->user()->id)->get();
   
    
        return response()->json($notes,200);
    }

    public function save(Request $request)
    {

        $note=new Notes;
        $note->members_id=auth()->user()->id;
        $note->text=$request->text;

        $note->save();

    
        return back();
    }
}
