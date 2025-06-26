<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{

    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'last_name',
        'phone',
        'is_role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    static public function getTotalUser($user_type)
        {
            return self::select('users.id')
                    ->where('is_role','=',$user_type)
                    ->where('is_delete','=',0)
                    ->count();
        }

        static public function getExiteds()
        {
            return self::select('users.id')
                    
                    ->where('is_delete','=',2)
                    ->count();
        }
           static public function getSingleMember($id)
        {
            return self::select('users.*','academic_years.name as admin_position')
             ->join('academic_years','academic_years.id', '=', 'users.occupation') 
            ->where('users.id','=',$id)
            ->first();
        }
        static public function getSingleSuper($id)
        {
            return self::select('users.*','classrooms.name as class_name')
            ->join('assign_class_teachers','assign_class_teachers.teacher_id', '=', 'users.id')
            ->join('classrooms','classrooms.id', '=', 'assign_class_teachers.class_id')
            ->where('users.id','=',$id)
            ->first();
        }
       


    static public function getSingleClass($id)
{
	return self::select('users.*','classrooms.name as class_name','exams.name as position')
	->join('classrooms','classrooms.id','=','users.class_id')
    ->join('exams','exams.id', '=', 'users.designation','left')
	->where('users.id','=',$id)
	->first();
}




public function getDocument()
{
    if(!empty($this->document_file) && file_exists('upload/documents/'.$this->document_file))
    {
        return url('upload/documents/'.$this->document_file);
    }
    else
    {
        return "";
    }
}

 public function OnlineUser()
{
    return Cache::has('OnlineUser'.$this->id);
}
    static public function getRecord(){
        //$return =self::select('users.*')
                     //->orderBy('id','desc')
                     //->paginate(10);
                     //return  $return;
                     $return =self::select('users.*')
                                    ->where('users.is_role','=',1)
                                    ->where('users.is_delete','=',0);

                                    if(!empty(Request::get('name')))
                                    {
                                        $return = $return->where('name','like', '%' .Request::get('name').'%');
                                    }

                                    if(!empty(Request::get('email')))
                                    {
                                        $return = $return->where('email','like', '%' .Request::get('email').'%');
                                    }
                                    if(!empty(Request::get('date')))
                                    {
                                        $return = $return->whereDate('created_at','=', (Request::get('date')));
                                    }

                                      //search box end

                   $return = $return->orderBy('users.id','desc')
                                ->paginate(20);
                                        return  $return;
    }
    static public function SearchUser($search)
    {
        $return = self::select('users.*')
                    ->where(function($query) use ($search){
                    $query->where('users.name','like','%'.$search.'%')
                          ->orWhere('users.last_name','like','%'.$search.'%')
                          ->orWhere('users.admission_number','like','%'.$search.'%');
                    })
        ->limit(10)
        ->get();

        return $return;

    }
        static public function getUser($user_type)
        {
            return  self::select('users.*')
                        ->where('is_role','=',$user_type)
                        ->where('users.is_delete','=',0)
                        ->get();
        }
    static public function getTeacher($id){
        //$return =self::select('users.*')
                     //->orderBy('id','desc')
                     //->paginate(10);
                     //return  $return;
                     $return =self::select('users.*','classrooms.name as class_name','employee_status.name as employeestatus') 
                                   ->join('assign_class_teachers','assign_class_teachers.teacher_id', '=', 'users.id')
                                   ->join('classrooms','classrooms.id', '=', 'assign_class_teachers.class_id')
                                   ->join('employee_status','employee_status.id', '=', 'users.status','left')
                                    ->where('users.is_role','=',2)
                                    ->where('users.is_delete','=',$id);

                                    if(!empty(Request::get('name')))
                                    {
                                        $return = $return->where('users.name','like', '%' .Request::get('name').'%');
                                    }
                                    if(!empty(Request::get('last_name')))
                                    {
                                        $return = $return->where('users.last_name','like', '%' .Request::get('last_name').'%');
                                    }
                                    if(!empty(Request::get('gender')))
                                    {
                                        $return = $return->where('users.gender','=', Request::get('gender'));
                                    }
                                    if(!empty(Request::get('email')))
                                    {
                                        $return = $return->where('users.phone','like', '%' .Request::get('phone').'%');
                                    }
                                    if(!empty(Request::get('marital_status')))
                                    {
                                        $return = $return->where('users.marital_status','like', '%' .Request::get('marital_status').'%');
                                    }

                                    
                                    if(!empty(Request::get('status')))
                                    {
                                         $status = (Request::get('status') == 100) ? 0 : 1;
                                        $return = $return->where('users.status','=', $status);
                                    }
                                    if(!empty(Request::get('admission_date')))
                                    {
                                        $return = $return->whereDate('users.admission_date','=', (Request::get('admission_date')));
                                    }

                                      //search box end

                   $return = $return->orderBy('users.id','desc')
                                ->paginate(10);
                                        return  $return;
    }

    static public function getENPF(){
        //$return =self::select('users.*')
                     //->orderBy('id','desc')
                     //->paginate(10);
                     //return  $return;
                     $return =self::select('users.*')
                                    ->where('users.parent_id','=',0)
                                    ->where('users.is_delete','=',0)
                                     ->where('users.admission_number','!=','')
                                    ->orderBy('users.id','desc')
                                    ->get();
                                        return  $return;
    }


    static public function getTeacherClass(){
        //$return =self::select('users.*')
                     //->orderBy('id','desc')
                     //->paginate(10);
                     //return  $return;
                     $return =self::select('users.*')
                                    ->where('users.is_role','=',2)
                                    ->where('users.is_delete','=',0)
                                    ->orderBy('users.id','desc')
                                    ->get();
                                        return  $return;
    }
    static public function getPaidFees($student_id,$class_id)
    {

        return  StudentAddFee::getPaidAmount($student_id,$class_id);
    }


 static public function getTotalGenderF()
        {
        return self::select('id')
                ->where('is_delete','=',0)
                 ->where('users.is_role','=',3)
              ->where('users.gender','=','Female')
                ->count();
        }
        static public function getTotalGenderO()
        {
        return self::select('id')
                ->where('is_delete','=',0)
                 ->where('users.is_role','=',3)
              ->where('users.gender','=','Other')
                ->count();
        }

        static public function getTotalGenderM()
        {
        return self::select('id')
                ->where('is_delete','=',0)
                 ->where('users.is_role','=',3)
              ->where('users.gender','=','Male')
                ->count();
        }

    
     static public function getTotalCustomerMonth($start_date, $end_date)
        {
        return self::select('id')
                ->where('is_delete','=',0)
                 ->where('users.is_role','=',3)
                ->whereDate('admission_date','>=', $start_date)
                ->whereDate('admission_date','<=', $end_date)
                ->count();
        }

    static public function getCllectFeeStudent(){

                     $return =self::select('users.*','classrooms.name as class_name','classrooms.amount as total_amount')
                                     ->join('classrooms','classrooms.id', '=', 'users.class_id')
                                    ->where('users.is_role','=',3)
                                    ->where('users.is_delete','=',0);


                     //search box start

                   if(!empty(Request::get('student_id')))
                   {
                       $return = $return->where('users.id_number','like', '%' .Request::get('student_id').'%');
                   }
                   if(!empty(Request::get('class_id')))
                   {
                       $return = $return->where('users.class_id','=',Request::get('class_id'));
                   }
                   if(!empty(Request::get('first_name')))
                   {
                       $return = $return->where('users.name','like', '%' .Request::get('first_name').'%');
                   }
                   if(!empty(Request::get('last_name')))
                   {
                       $return = $return->where('users.last_name','like', '%' .Request::get('last_name').'%');
                   }


                     //search box end
                   $return = $return->orderBy('users.name','asc')
                                ->paginate(50);
                                        return  $return;
    }

    static public function getExited(){
        //$return =self::select('users.*')
                     //->orderBy('id','desc')
                     //->paginate(10);
                     //return  $return;
                     $return =self::select('users.*','classrooms.name as class_name')
                                     ->join('classrooms','classrooms.id', '=', 'users.class_id','left')
                                     
                                     ->where('users.is_delete','=',1);


                     //search box start

                   if(!empty(Request::get('name')))
                   {
                       $return = $return->where('users.name','like', '%' .Request::get('name').'%');
                   }
                   if(!empty(Request::get('academic_year_id')))
                   {
                       $return = $return->where('users.academic_year_id','=',Request::get('academic_year_id'));
                   }
                   if(!empty(Request::get('admission_number')))
                   {
                       $return = $return->where('users.admission_number','=',Request::get('admission_number'));
                   }
                   if(!empty(Request::get('id_number')))
                   {
                       $return = $return->where('users.id_number','like', '%' .Request::get('id_number').'%');
                   }
                   if(!empty(Request::get('gender')))
                   {
                       $return = $return->where('users.gender','=', Request::get('gender'));
                   }
                   if(!empty(Request::get('class_id')))
                   {
                       $return = $return->where('users.class_id','=',Request::get('class_id'));
                   }

                   if(!empty(Request::get('email')))
                   {
                       $return = $return->where('users.email','like', '%' .Request::get('email').'%');
                   }
                   if(!empty(Request::get('status')))
                   {
                        $status = (Request::get('status') == 100) ? 0 : 1;
                       $return = $return->where('users.status','=', $status);
                   }
                   if(!empty(Request::get('admission_date')))
                   {
                       $return = $return->whereDate('users.admission_date','=', (Request::get('admission_date')));
                   }

                     //search box end
                   $return = $return->orderBy('users.id','desc')
                                ->paginate(10);
                                        return  $return;
    }


    
    static public function getStudent12(){
        //$return =self::select('users.*')
                     //->orderBy('id','desc')
                     //->paginate(10);
                     //return  $return;
                     $return =self::select('users.*','classrooms.name as class_name')
                                     ->join('classrooms','classrooms.id', '=', 'users.class_id','left')
                                    ->where('users.is_role','=',3)
                                    ->where('users.is_delete','=',0);


                     //search box start

                   if(!empty(Request::get('name')))
                   {
                       $return = $return->where('users.name','like', '%' .Request::get('name').'%');
                   }
                   if(!empty(Request::get('academic_year_id')))
                   {
                       $return = $return->where('users.academic_year_id','=',Request::get('academic_year_id'));
                   }
                   if(!empty(Request::get('admission_number')))
                   {
                       $return = $return->where('users.admission_number','=',Request::get('admission_number'));
                   }
                   if(!empty(Request::get('id_number')))
                   {
                       $return = $return->where('users.id_number','like', '%' .Request::get('id_number').'%');
                   }
                   if(!empty(Request::get('gender')))
                   {
                       $return = $return->where('users.gender','=', Request::get('gender'));
                   }
                   if(!empty(Request::get('qualification')))
                   {
                       $return = $return->where('users.qualification','=', Request::get('qualification'));
                   }
                   if(!empty(Request::get('class_id')))
                   {
                       $return = $return->where('users.class_id','=',Request::get('class_id'));
                   }

                   if(!empty(Request::get('email')))
                   {
                       $return = $return->where('users.email','like', '%' .Request::get('email').'%');
                   }
                   if(!empty(Request::get('status')))
                   {
                        $status = (Request::get('status') == 100) ? 0 : 1;
                       $return = $return->where('users.status','=', $status);
                   }
                   if(!empty(Request::get('probation_status')))
                   {
                        $probation_status = (Request::get('probation_status') == 100) ? 0 : 1;
                       $return = $return->where('users.probation_status','=', $probation_status);
                   }
                  

                   if(!empty(Request::get('from_admission_date')))
                   {
                       $return = $return->where('users.admission_date','>=', (Request::get('from_admission_date')));
                   }
                   if(!empty(Request::get('to_admission_date')))
                   {
                       $return = $return->where('users.admission_date','<=', (Request::get('to_admission_date')));
                   }

                     //search box end
                   $return = $return->orderBy('users.id','desc')
                                ->paginate(500);
                                        return  $return;
    }
    static public function getStudent($remove_pagination = 0){
        //$return =self::select('users.*')
                     //->orderBy('id','desc')
                     //->paginate(10);
                     //return  $return;
                     $return =self::select('users.*','classrooms.name as class_name','exams.name as position','employee_status.name as employeestatus')
                                     ->join('classrooms','classrooms.id', '=', 'users.class_id','left')
                                     ->join('employee_status','employee_status.id', '=', 'users.status','left')
                                     ->join('exams','exams.id', '=', 'users.designation','left')
                                    ->where('users.is_role','=',3)
                                    ->where('users.is_delete','=',0);


                     //search box start

                   if(!empty(Request::get('name')))
                   {
                       $return = $return->where('users.name','like', '%' .Request::get('name').'%');
                   }
                   if(!empty(Request::get('academic_year_id')))
                   {
                       $return = $return->where('users.academic_year_id','=',Request::get('academic_year_id'));
                   }
                   if(!empty(Request::get('admission_number')))
                   {
                       $return = $return->where('users.admission_number','=',Request::get('admission_number'));
                   }
                   if(!empty(Request::get('id_number')))
                   {
                       $return = $return->where('users.id_number','=',Request::get('id_number'));
                   }
                   
                 
                   if(!empty(Request::get('gender')))
                   {
                       $return = $return->where('users.gender','=', Request::get('gender'));
                   }
                   if(!empty(Request::get('designation')))
                   {
                       $return = $return->where('users.designation','=', Request::get('designation'));
                   }
                   if(!empty(Request::get('class_id')))
                   {
                       $return = $return->where('users.class_id','=',Request::get('class_id'));
                   }

                   if(!empty(Request::get('email')))
                   {
                       $return = $return->where('users.email','like', '%' .Request::get('email').'%');
                   }
                   if(!empty(Request::get('roll_number')))
                   {
                       $return = $return->where('users.roll_number','like', '%' .Request::get('roll_number').'%');
                   }
                   if(!empty(Request::get('qualification')))
                   {
                       $return = $return->where('users.qualification','like', '%' .Request::get('qualification').'%');
                   }
                  
                   if(!empty(Request::get('probation_status')))
                   {
                        $probation_status = (Request::get('probation_status') == 100) ? 0 : 1;
                       $return = $return->where('users.probation_status','=', $probation_status);
                   }
                   if(!empty(Request::get('from_admission_date')))
                   {
                       $return = $return->where('users.admission_date','>=', (Request::get('from_admission_date')));
                   }
                   if(!empty(Request::get('to_admission_date')))
                   {
                       $return = $return->where('users.admission_date','<=', (Request::get('to_admission_date')));
                   }

                     //search box end
                   $return = $return->orderBy('users.id','desc');
                   if(!empty($remove_pagination))
                   {
                    $return = $return->get();
                   }else{
                    $return = $return->paginate(30);
                   }
                  
                 
                                        return  $return;
    }
    static public function getEmployee($id){
        //$return =self::select('users.*')
                     //->orderBy('id','desc')
                     //->paginate(10);
                     //return  $return;
                     $return =self::select('users.*','classrooms.name as class_name','exams.name as position','employee_status.name as employeestatus')
                                     ->join('classrooms','classrooms.id', '=', 'users.class_id','left')
                                     ->join('employee_status','employee_status.id', '=', 'users.status','left')
                                     ->join('exams','exams.id', '=', 'users.designation','left')
                                    ->where('users.is_role','=',3)
                                    ->where('users.is_delete','=',$id);


                     //search box start

                   if(!empty(Request::get('name')))
                   {
                       $return = $return->where('users.name','like', '%' .Request::get('name').'%');
                   }
                   if(!empty(Request::get('academic_year_id')))
                   {
                       $return = $return->where('users.academic_year_id','=',Request::get('academic_year_id'));
                   }
                   if(!empty(Request::get('admission_number')))
                   {
                       $return = $return->where('users.admission_number','=',Request::get('admission_number'));
                   }
                   if(!empty(Request::get('id_number')))
                   {
                       $return = $return->where('users.id_number','=',Request::get('id_number'));
                   }
                   
                 
                   if(!empty(Request::get('gender')))
                   {
                       $return = $return->where('users.gender','=', Request::get('gender'));
                   }
                   if(!empty(Request::get('designation')))
                   {
                       $return = $return->where('users.designation','=', Request::get('designation'));
                   }
                   if(!empty(Request::get('class_id')))
                   {
                       $return = $return->where('users.class_id','=',Request::get('class_id'));
                   }

                   if(!empty(Request::get('email')))
                   {
                       $return = $return->where('users.email','like', '%' .Request::get('email').'%');
                   }
                   if(!empty(Request::get('roll_number')))
                   {
                       $return = $return->where('users.roll_number','like', '%' .Request::get('roll_number').'%');
                   }
                   if(!empty(Request::get('qualification')))
                   {
                       $return = $return->where('users.qualification','like', '%' .Request::get('qualification').'%');
                   }
                  
                   if(!empty(Request::get('probation_status')))
                   {
                        $probation_status = (Request::get('probation_status') == 100) ? 0 : 1;
                       $return = $return->where('users.probation_status','=', $probation_status);
                   }
                   if(!empty(Request::get('from_admission_date')))
                   {
                       $return = $return->where('users.admission_date','>=', (Request::get('from_admission_date')));
                   }
                   if(!empty(Request::get('to_admission_date')))
                   {
                       $return = $return->where('users.admission_date','<=', (Request::get('to_admission_date')));
                   }

                     //search box end
                     $return = $return->orderBy('users.id','desc')
                     ->paginate(30);
                             return  $return;
    }

    static public function getParent(){
        //$return =self::select('users.*')
                     //->orderBy('id','desc')
                     //->paginate(10);
                     //return  $return;
                     $return =self::select('users.*','academic_years.name as admin_position')
                     ->join('academic_years','academic_years.id', '=', 'users.occupation','left')
                                    ->where('users.is_role','=',5)
                                    ->where('users.is_delete','=',0);

                                    if(!empty(Request::get('name')))
                                    {
                                        $return = $return->where('users.name','like', '%' .Request::get('name').'%');
                                    }
                                    if(!empty(Request::get('status')))
                                    {
                                         $status = (Request::get('status') == 100) ? 0 : 1;
                                        $return = $return->where('users.status','=', $status);
                                    }
                                    if(!empty(Request::get('occupation')))
                                    {
                                        $return = $return->where('users.occupation','=',Request::get('occupation'));
                                    }
                                    if(!empty(Request::get('gender')))
                                    {
                                        $return = $return->where('users.gender','like', '%' .Request::get('gender').'%');
                                    }

                                    if(!empty(Request::get('email')))
                                    {
                                        $return = $return->where('users.email','like', '%' .Request::get('email').'%');
                                    }
                                    if(!empty(Request::get('date')))
                                    {
                                        $return = $return->whereDate('users.created_at','=', (Request::get('date')));
                                    }

                                      //search box end

                   $return = $return->orderBy('users.id','desc')
                                ->paginate(20);
                                        return  $return;
    }


    static public function getEmailSingle($email)
    {

    return self::where('email', '=', $email)->first();
    }

    static public function getTokenSingle($remember_token)
    {

    return self::where('remember_token', '=', $remember_token)->first();
    }
    static public function getSingle($id)
    {
        return self::find($id);
    }
    public function getProfile()
    {
        if(!empty($this->avatar) && file_exists('upload/profile/'.$this->avatar))
        {
            return url('upload/profile/'.$this->avatar);
        }
        else
        {
            return "";
        }
    }
    public function getProfileDirectory()
    {
        if(!empty($this->avatar) && file_exists('upload/profile/'.$this->avatar))
        {
            return url('upload/profile/'.$this->avatar);
        }
        else
        {
            return url('upload/profile/download.jpg');
        }
    }



                    static public function getSearchStudent()
                {
                if(!empty(Request::get('id_number')) || !empty(Request::get('name')) ||!empty(Request::get('last_name')) || !empty(Request::get('phone')))
                {
                $return =self::select('users.*','classrooms.name as class_name','parent.name as parent_name')
                                                ->join('users as parent','parent.id','=','users.parent_id','left')
                                                    ->join('classrooms','classrooms.id', '=', 'users.class_id','left')
                                                    ->where('users.is_role','=',3)
                                                    ->where('users.is_delete','=',0);


                                    //search box start

                                if(!empty(Request::get('name')))
                                {
                                    $return = $return->where('users.name','like', '%' .Request::get('name').'%');
                                }
                                if(!empty(Request::get('last_name')))
                                {
                                    $return = $return->where('users.last_name','like', '%' .Request::get('last_name').'%');
                                }
                                if(!empty(Request::get('id_number')))
                                {
                                    $return = $return->where('users.id_number','=',Request::get('id_number'));
                                }
                                if(!empty(Request::get('phone')))
                                {
                                    $return = $return->where('users.phone','=',Request::get('phone'));
                                }


                                    //search box end
                                $return = $return->orderBy('users.id','desc')
                                                ->limit(50)
                                                ->get();
                                                        return  $return;
                }

                }

            static public function getMyStudent($parent_id)
            {

                $return =self::select('users.*','classrooms.name as class_name','parent.name as parent_name')
                                                ->join('users as parent','parent.id','=','users.parent_id','left')
                                                    ->join('classrooms','classrooms.id', '=', 'users.class_id','left')
                                                    ->where('users.is_role','=',3)
                                                    ->where('users.parent_id','=',$parent_id)
                                                    ->where('users.is_delete','=',0)
                                                    ->orderBy('users.id','desc')
                                                    ->get();
                                                return  $return;
            }
            static public function getMystudentCount($parent_id)
            {

                $return =self::select('users.id')
                                                ->join('users as parent','parent.id','=','users.parent_id','left')
                                                    ->join('classrooms','classrooms.id', '=', 'users.class_id','left')
                                                    ->where('users.is_role','=',3)
                                                    ->where('users.parent_id','=',$parent_id)
                                                    ->where('users.is_delete','=',0)
                                                    ->orderBy('users.id','desc')
                                                    ->count();
                                                return  $return;
            }
            static public function getMystudentID($parent_id)
            {

                $return =self::select('users.id')
                                                ->join('users as parent','parent.id','=','users.parent_id','left')
                                                    ->join('classrooms','classrooms.id', '=', 'users.class_id','left')
                                                    ->where('users.is_role','=',3)
                                                    ->where('users.parent_id','=',$parent_id)
                                                    ->where('users.is_delete','=',0)
                                                    ->orderBy('users.id','desc')
                                                    ->get();
                                                    $student_ids = array();
                                                    foreach($return as $value)
                                                    {
                                                    
                                                    $student_ids[] =$value->id;
                                                    }
                                                    return $student_ids;
            }
            static public function getMystudentClassID($parent_id)
            {

                $return =self::select('users.class_id')
                                                ->join('users as parent','parent.id','=','users.parent_id')
                                                ->join('classrooms','classrooms.id', '=', 'users.class_id')
                                                ->where('users.is_role','=',3)
                                                ->where('users.parent_id','=',$parent_id)
                                                ->where('users.is_delete','=',0)
                                                ->orderBy('users.id','desc')
                                                ->get();
                                                    $class_ids = array();
                                                    foreach($return as $value)
                                                    {
                                                    
                                                    $class_ids[] =$value->id;
                                                    }
                                                    return $class_ids;
            }

            static public function getTeacherStudent($teacher_id)
            {

                             $return =self::select('users.*','classrooms.name as class_name')
                                            ->join('classrooms','classrooms.id', '=', 'users.class_id')
                                            ->join('assign_class_teachers','assign_class_teachers.class_id', '=', 'classrooms.id')
                                            ->where('assign_class_teachers.teacher_id','=',$teacher_id)
                                            ->where('users.is_role','=',3)
                                            ->where('users.is_delete','=',0)
                                            ->where('assign_class_teachers.is_delete','=',0)
                                            ->where('assign_class_teachers.status','=',0);

                           $return = $return->orderBy('users.id','desc')
                                        ->groupBy('users.id')
                                        ->paginate(10);
                                                return  $return;
            }
            static public function getTeacherStudentCount($teacher_id)
            {

                $return =self::select('users.id')
                ->join('classrooms','classrooms.id', '=', 'users.class_id')
                ->join('assign_class_teachers','assign_class_teachers.class_id', '=', 'classrooms.id')
                ->where('assign_class_teachers.teacher_id','=',$teacher_id)
                ->where('users.is_role','=',3)
                ->where('users.is_delete','=',0)
                ->where('assign_class_teachers.is_delete','=',0)
                ->where('assign_class_teachers.status','=',0)
                ->orderBy('users.id','desc')
                ->count();
                        return  $return;
            }

 static public function getStudentClass($class_id)
 {

                     return self::select('users.id','users.name','users.last_name','users.admission_number')
                                    ->where('users.is_role','=',3)
                                    ->where('users.is_delete','=',0)
                                    ->where('users.class_id','=',$class_id)
                                    ->orderBy('users.id','desc')
                                    ->get();

    }

    static public function getAttendance($student_id,$attendance_date,$class_id)
    {

        return StudentAttendance::CheckAlreadyAttendance($student_id,$attendance_date,$class_id);


    }

        public function user_line()
            {

            return $this->belongsTo(Classroom::class,'class_id');
            }
public function leaves()
    {
        return $this->hasMany(Leave::class,'user_id');
    }

    
public function actions()
    {
        return $this->hasMany(Disciplinary::class,'user_id');
    }
    public function passOuts()
{
    return $this->hasMany(PassOut::class, 'user_id');
}

}
