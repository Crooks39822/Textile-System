<?php

namespace App\Http\Controllers\Backend;

use App\Models\Exam;
use App\Models\User;
use App\Models\Setting;
use App\Models\Classroom;
use App\Models\MarksGrade;
use App\Models\ClassSubject;
use App\Models\ExamSchedule;
use App\Models\MarkRegister;
use Illuminate\Http\Request;
use App\Models\StudentAddFee;
use App\Models\AssignClassTeacher;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class PositionsController extends Controller
{
    public function list()
    {
      $data['header_title'] = 'Positions List';
        $data['getRecord'] = Exam::getRecord();
        return view('backend/positions/list',$data);
    }

    public function add()
    {
      $data['header_title'] = 'Positions Add';
        return view('backend/positions/add',$data);
    }
    public function insert(Request $request)
    {
        // dd($request->all());
        $positions                 = new Exam;
        $positions->name           = trim($request->name);
        $positions->note      = trim($request->notes); 
        $positions->gazett_rate      = trim($request->gazett_rate); 
        $positions->created_by =Auth::user()->id;
        $positions->save();
        return redirect('admin/positions')->with('success','Position Successfully Created');
    }
    public function edit($id)
    {

            $data['getRecord'] = Exam::getSingle($id);
            if(!empty($data['getRecord']))
            {

                $data['header_title'] = 'Edit  Position';
                return view('backend/positions/edit',$data);

            }
            else
            {
            abort(404);
            }
    }
    
    public function update($id,Request $request)
    {
      // dd($request->all());

      $positions                 = Exam::getSingle($id);
      $positions->name           = trim($request->name);
      $positions->note           = trim($request->notes);
      $positions->gazett_rate      = trim($request->gazett_rate); 
    $positions->save();
      return redirect('admin/positions')->with('success','Position Updated Successfully');
    }
    public function delete($id)
    {
      $positions                 = Exam::getSingle($id);
      
      $positions->delete();
      return redirect('admin/positions')->with('success','Position Deleted Successfully');
    }


    

}
