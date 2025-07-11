<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\SickLeave;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class SickLeaveController extends Controller
{
  

public function index(Request $request)
{
    $header_title = 'Sick Sheets List';
       $query = SickLeave::with('user');

    if ($request->filled('name')) {
        $query->whereHas('user', function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->name . '%');
        });
    }

    if ($request->filled('from')) {
        $query->where('date', '>=', $request->from);
    }

    if ($request->filled('to')) {
        $query->where('date', '<=', $request->to);
    }

    $sickLeaves = $query->latest()->paginate(10); // with pagination
    return view('backend.sick_leaves.index', compact('sickLeaves','header_title'));
}

public function create()
{
    $users = User::all();
    $header_title = 'Add Sick Sheets';
    return view('backend.sick_leaves.create', compact('users','header_title'));
}
 public function delete($id)
    {
      $getRecord = SickLeave::getSingle($id);
      if(!empty($getRecord))
      {
       
        $getRecord->delete();
        return redirect()->back()->with('success','Sick Sheet Successfully Deleted');
      }else
      {
        abort(404);
      }

    }
public function store(Request $request)
{
      $request->validate([
        'user_id' => 'required|exists:users,id',
        'start_date' => 'required|date',
        'end_date' => 'required|date',
        'doctor_note' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
    ]);
  

    $sickLeave = new SickLeave();
    $sickLeave->user_id = $request->user_id;
    $sickLeave->start_date = $request->start_date;
    $sickLeave->end_date = $request->end_date;
    $sickLeave->reason = $request->reason;


    if(!empty($request->file('doctor_note_path')))
      {
        
        $ext =$request->file('doctor_note_path')->getClientoriginalExtension();
        $file =$request->file('doctor_note_path');
        $randomStr = date('Ymdhis');
        $filename =strtolower($randomStr).'.'.$ext;
        $file->move('upload/sick_notes/',$filename);
        $sickLeave->doctor_note_path  =$filename;
      }

    $sickLeave->save();

   
    return redirect('sick-leaves')->with('success','Sick Sheet saved successfully.');
}


}
