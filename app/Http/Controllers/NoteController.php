<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Notes;

class NoteController extends Controller
{
    public function index() {
        $user = Auth::user();
    
        if ($user) {
            $usertype = $user->usertype;
            if ($usertype == 'admin') {
                $data = Notes::where('user_id', $user->id)->get();
                return view('admin.index', compact('data'));
            } else {
                return redirect()->back();
            }
        }
    
        return redirect()->route('login');
    }
    

    public function home() {
        $data = Notes::all();
        return view('auth.login', compact('data'));
    }

    public function note(){
        return view('admin.createnote');
    }



    

    public function deletenote($id) {
        $data = Notes::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function updatenote($id) {
        $data = Notes::find($id);
        return view('admin.updatenote', compact ('data'));
    }

    public function editnote(Request $request, $id) {
        $data = Notes::find($id);
        $data->title= $request->title;
        $data->note = $request->note;
       
        $data->save();
        return redirect()->back();
    }

    public function createnote(Request $request) {
        $data = new Notes();
        $data->title= $request->title;
        $data->note = $request->note;
        $data->user_id = auth()->id(); 
        
        $data->save();
        return redirect()->back();
    }
}
