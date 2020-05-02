<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Members\Members;

use App\Models\Members\Notes as MembersNotes;

class NotesController extends Controller
{
    public function Index()
    {

        $notes=MembersNotes::where('members_id',auth()->user()->id)->get();
   
    
        return response()->json($notes,200);
    }

    public function save(Request $request)
    {

        $note=new MembersNotes;
        $note->members_id=auth()->user()->id;
        $note->text=$request->note;
        $note->save();
        
        $li = ' <li>'.$note->text.'
        <a data-id="'.$note->id.'" href="#" class="float-left text-danger trash-note mr-2 pt-1"><i class="fa fa-trash"></i></a>
            <span class="float-left fs-0-8 pt-1">'.\Morilog\Jalali\Jalalian::forge($note->created_at)->format('%d %B %Y').'
       
            </span>
    </li>';
        return response()->json(
            $li,200
        );
    }

    public function delete(Request $request)
    {
       
        $note = MembersNotes::findOrFail($request->id);
        if($note->delete()){
            return response()->json(
                'success',200
            );
        }
    }
}
