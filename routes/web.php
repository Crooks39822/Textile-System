<?php


use App\Models\ClassSubjectTimetable;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Backend\QCsController;
use App\Http\Controllers\Backend\ChatController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\UsersContoller;
use App\Http\Controllers\Backend\LeaveController;
use App\Http\Controllers\Backend\StaffController;
use App\Http\Controllers\Backend\ExitedController;
use App\Http\Controllers\Backend\ActionController; 
use App\Http\Controllers\Backend\PassOutController;
use App\Http\Controllers\Backend\SubjectController;
use App\Http\Controllers\Backend\TeacherController;
use App\Http\Controllers\Backend\CalendarController;
use App\Http\Controllers\Backend\EmployeeController;
use App\Http\Controllers\Backend\ClassroomController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PositionsController;
use App\Http\Controllers\Backend\AssignmentController;
use App\Http\Controllers\Backend\AttendanceController;
use App\Http\Controllers\Backend\LeaveTypeController; 
use App\Http\Controllers\Backend\CommunicateController;
use App\Http\Controllers\Backend\ClassSubjectController;
use App\Http\Controllers\Backend\AdminPositionController;
use App\Http\Controllers\Backend\DisciplinaryController; 
use App\Http\Controllers\Backend\ClassTimetableController;
use App\Http\Controllers\Backend\EmployeeStatusController;
use App\Http\Controllers\Backend\FeesCollectionController;
use App\Http\Controllers\Backend\AssignClassTeacherController; 


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[AuthController::class, 'index'])->name('index');
Route::get('forgot-password',[AuthController::class, 'forgot_password'])->name('forgot_password');
Route::get('reset/{token}',[AuthController::class, 'reset']);
Route::post('reset/{token}',[AuthController::class, 'pass_reset']);
Route::post('forgot-password',[AuthController::class, 'reset_password']);
Route::get('new-account',[AuthController::class, 'register_users'])->name('register_new');
Route::post('new-user',[AuthController::class, 'register_user'])->name('register_user');
Route::post('checkEmail',[AuthController::class, 'CheckEmail'])->name('checkEmail');
Route::post('login_user',[AuthController::class, 'login_user'])->name('login_user');

Route::group(['middleware' => 'common'], function(){
    Route::get('chat',[ChatController::class, 'chat']);
    Route::post('submit_message',[ChatController::class, 'submit_message']);
    Route::post('get_chat_windows',[ChatController::class, 'get_chat_windows']);
    Route::post('get_chat_search_user',[ChatController::class, 'get_chat_search_user']);
    
});

//admin middleware
Route::group(['middleware' => 'admin'], function(){
    Route::get('admin/dashboard',[DashboardController::class, 'dashboard']);

    Route::get('admin/users',[UsersContoller::class, 'index'])->name('index');
    Route::get('admin/user/add',[UsersContoller::class, 'user_add'])->name('user_add');
    Route::get('logout',[AuthController::class, 'logout'])->name('logout');
    Route::post('admin/user/add',[UsersContoller::class, 'register_users'])->name('register_users');
    Route::get('admin/edit/{id}',[UsersContoller::class, 'user_edit'])->name('user_edit');
    Route::post('admin/edit/{id}',[UsersContoller::class, 'user_update'])->name('user_update');
    Route::get('admin/delete/{id}',[UsersContoller::class, 'user_delete'])->name('user_delete');
    Route::get('admin/account',[UserController::class, 'MyAccount'])->name('MyAccount');
    Route::post('admin/account',[UserController::class, 'UpdateMyAccountAdmin'])->name('UpdateMyAccountAdmin');

//settings

        Route::get('admin/settings',[UsersContoller::class, 'settings']);
        Route::post('admin/settings',[UsersContoller::class, 'Updatesettings']);
    //teacher

    Route::get('admin/supervisor/{id}',[TeacherController::class, 'list'])->name('list');
    Route::get('admin/supervisor/0/add',[TeacherController::class, 'add'])->name('add');
    Route::post('admin/supervisor/0/add',[TeacherController::class, 'insert'])->name('insert');
    Route::get('admin/supervisor/view/{id}',[TeacherController::class, 'view']);
    Route::get('admin/supervisor/edit/{id}',[TeacherController::class, 'edit'])->name('edit');
    Route::post('admin/supervisor/edit/{id}',[TeacherController::class, 'update'])->name('update');
    Route::get('admin/supervisor/delete/{id}',[TeacherController::class, 'delete'])->name('delete');

    


    //employee
    Route::get('admin/employee/{id}',[EmployeeController::class, 'list'])->name('list');
    Route::get('admin/employee/0/add',[EmployeeController::class, 'add'])->name('add');
    Route::post('admin/employee/0/add',[EmployeeController::class, 'insert'])->name('insert');
    Route::get('admin/employee/edit/{id}',[EmployeeController::class, 'edit'])->name('edit');
    Route::get('admin/employee/view/{id}',[EmployeeController::class, 'view']);
    Route::post('admin/employee/edit/{id}',[EmployeeController::class, 'update'])->name('update');
    Route::get('admin/employee/delete/{id}',[EmployeeController::class, 'delete'])->name('delete');
    Route::post('admin/employee_export',[EmployeeController::class, 'employee_export']);
    Route::get('admin/enpf_export',[EmployeeController::class, 'enpf_export']);
    Route::post('check_employee_number',[EmployeeController::class, 'checkClockNumber']);
    Route::post('check_id_number',[EmployeeController::class, 'checkIDNumber']);
    Route::get('admin/employee_update/{id}',[EmployeeController::class, 'employee_update']);
    //Exited Employees
    Route::get('admin/exited_employees',[ExitedController::class, 'list'])->name('list');
    

    //staff
    Route::get('admin/staff',[StaffController::class, 'list'])->name('list');
    Route::get('admin/staff/add',[StaffController::class, 'add'])->name('add');
    Route::post('admin/staff/add',[StaffController::class, 'insert'])->name('insert');
    Route::get('admin/staff/view/{id}',[StaffController::class, 'view']);
    Route::get('admin/staff/edit/{id}',[StaffController::class, 'edit'])->name('edit');
    Route::post('admin/staff/edit/{id}',[StaffController::class, 'update'])->name('update');
    Route::get('admin/staff/delete/{id}',[StaffController::class, 'delete'])->name('delete');
    


    //Deapartment url
    Route::get('admin/department',[ClassroomController::class, 'list']);
    Route::get('admin/department/add',[ClassroomController::class, 'add']);
    Route::post('admin/department/add',[ClassroomController::class, 'register']);
    Route::get('admin/department/edit/{id}',[ClassroomController::class, 'edit']);
    Route::post('admin/department/edit/{id}',[ClassroomController::class, 'update']);
    Route::get('admin/department/delete/{id}',[ClassroomController::class, 'delete']);

 //Leave url
    Route::get('admin/leave/list',[LeaveController::class, 'list']);
    Route::get('admin/leave/add',[LeaveController::class, 'add']);
    Route::post('admin/leave/add',[LeaveController::class, 'register']);
    Route::get('admin/leave/edit/{id}',[LeaveController::class, 'edit']);
    Route::post('admin/leave/edit/{id}',[LeaveController::class, 'update']);
    Route::get('admin/leave/delete/{id}',[LeaveController::class, 'delete']);
    Route::get('admin/leave/search_user',[LeaveController::class, 'SearchUser']);

  //academic_year
    Route::get('admin/admin_positions',[AdminPositionController::class, 'list']);
    Route::get('admin/admin_positions/add',[AdminPositionController::class, 'add']);
    Route::post('admin/admin_positions/add',[AdminPositionController::class, 'insert']);
    Route::get('admin_positions/edit/{id}',[AdminPositionController::class, 'edit']);
    Route::post('admin_positions/edit/{id}',[AdminPositionController::class, 'update']);
    Route::get('admin_positions/delete/{id}',[AdminPositionController::class, 'delete']); 

    //employee_status
    Route::get('admin/employee_status',[EmployeeStatusController::class, 'list']);
    Route::get('admin/employee_status/add',[EmployeeStatusController::class, 'add']);
    Route::post('admin/employee_status/add',[EmployeeStatusController::class, 'insert']);
    Route::get('employee_status/edit/{id}',[EmployeeStatusController::class, 'edit']);
    Route::post('employee_status/edit/{id}',[EmployeeStatusController::class, 'update']);
    Route::get('employee_status/delete/{id}',[EmployeeStatusController::class, 'delete']); 

     //Leave Type
    Route::get('admin/leave/types',[LeaveTypeController::class, 'list']);
    Route::get('admin/leave/type/add',[LeaveTypeController::class, 'add']);
    Route::post('admin/leave/type/add',[LeaveTypeController::class, 'insert']);
    Route::get('admin/leave/type/edit/{id}',[LeaveTypeController::class, 'edit']);
    Route::post('admin/leave/type/edit/{id}',[LeaveTypeController::class, 'update']);
    Route::get('admin/leave/type/delete/{id}',[LeaveTypeController::class, 'delete']); 

    //action Type
    Route::get('admin/employees/disciplinary/action',[ActionController::class, 'list']);
    Route::get('admin/employees/disciplinary/action/add',[ActionController::class, 'add']);
    Route::post('admin/employees/disciplinary/action/add',[ActionController::class, 'insert']);
    Route::get('admin/employees/disciplinary/action/edit/{id}',[ActionController::class, 'edit']);
    Route::post('admin/employees/disciplinary/action/edit/{id}',[ActionController::class, 'update']);
    Route::get('admin/employees/disciplinary/action/delete/{id}',[ActionController::class, 'delete']); 

    //passout
    Route::get('passout/list',[PassOutController::class, 'list']);
     Route::get('passout/add',[PassOutController::class, 'add']);
    Route::post('passout/add',[PassOutController::class, 'register']);
    Route::get('passout/report', [PassOutController::class, 'monthlyReport']);
    Route::get('passout/today', [PassOutController::class, 'todayPassOuts']);
    Route::put('passout/return/{id}', [PassOutController::class, 'update']);

     //disciplinary action
    Route::get('admin/employees/disciplinary/list',[DisciplinaryController::class, 'list']);
    Route::get('admin/employees/disciplinary/add',[DisciplinaryController::class, 'add']);
    Route::post('admin/employees/disciplinary/add',[DisciplinaryController::class, 'insert']);
    Route::get('admin/employees/disciplinary/edit/{id}',[DisciplinaryController::class, 'edit']);
    Route::post('admin/employees/disciplinary/edit/{id}',[DisciplinaryController::class, 'update']);
    Route::get('admin/employees/disciplinary/delete/{id}',[DisciplinaryController::class, 'delete']); 

//admin/assignment/assignment
Route::get('admin/assignment/assignment',[AssignmentController::class, 'list']);
Route::get('admin/assignment/add',[AssignmentController::class, 'add']);
Route::post('admin/assignment/add',[AssignmentController::class, 'insert']);
Route::post('admin/assignment/get_subject',[AssignmentController::class, 'get_subject']);
Route::get('admin/assignment/edit/{id}',[AssignmentController::class, 'edit']);
Route::post('admin/assignment/edit/{id}',[AssignmentController::class, 'update']);
Route::get('admin/assignment/delete/{id}',[AssignmentController::class, 'delete']);
Route::get('admin/assignment/submitted/{id}',[AssignmentController::class, 'submitted']);
Route::get('admin/assignment/assignment_reports',[AssignmentController::class, 'assignment_reports']);

//fees collection
Route::get('admin/fees_collection/collect_fees',[FeesCollectionController::class, 'FeesCollection']);
Route::get('admin/fees_collection/collect_fees/add_fees/{student_id}',[FeesCollectionController::class, 'FeesCollectionAdd']);
Route::post('admin/fees_collection/collect_fees/add_fees/{student_id}',[FeesCollectionController::class, 'FeesCollectionInsert']);
Route::get('admin/fees_collection/collect_fees_repot',[FeesCollectionController::class, 'FeesCollectionReport']);


    //subject url
    Route::get('admin/machine',[SubjectController::class, 'list'])->name('list');
    Route::get('admin/machine/add',[SubjectController::class, 'subject_add']);
    Route::post('admin/machine/add',[SubjectController::class, 'register_subject']);
    Route::get('machine/edit/{id}',[SubjectController::class, 'subject_edit']);
    Route::post('machine/edit/{id}',[SubjectController::class, 'subject_update']);
    Route::get('machine/delete/{id}',[SubjectController::class, 'subject_delete']);

    //assign_subject

    Route::get('admin/assign_machine',[ClassSubjectController::class, 'list'])->name('list');
    Route::get('admin/assign_machine/add',[ClassSubjectController::class, 'assign_subject_add']);
    Route::post('admin/assign_machine/add',[ClassSubjectController::class, 'register_assign_subject']);
    Route::get('assign_machine/edit/{id}',[ClassSubjectController::class, 'assign_subject_edit']);
    Route::post('assign_machine/edit/{id}',[ClassSubjectController::class, 'assign_subject_update']);
    Route::get('assign_machine/delete/{id}',[ClassSubjectController::class, 'assign_subject_delete']);
    Route::get('assign_machine/edit_single/{id}',[ClassSubjectController::class, 'update_single_edit']);
    Route::post('assign_machine/edit_single/{id}',[ClassSubjectController::class, 'update_single']);
   //class timetable
    Route::get('admin/class_timetable',[ClassTimetableController::class, 'list']);
    Route::post('admin/class_timetable/get_subject',[ClassTimetableController::class, 'get_subject']);
    Route::post('admin/class_timetable/add',[ClassTimetableController::class, 'insert_update']);

    //admin/assign_class_to_teacher
    Route::get('admin/assign_line_to_supervisor',[AssignClassTeacherController::class, 'list'])->name('list');
    Route::get('admin/assign_line_to_supervisor/add',[AssignClassTeacherController::class, 'add']);
    Route::post('admin/assign_line_to_supervisor/add',[AssignClassTeacherController::class, 'insert']);
    Route::get('assign_line_to_supervisor/edit/{id}',[AssignClassTeacherController::class, 'edit']);
    Route::post('assign_line_to_supervisor/edit/{id}',[AssignClassTeacherController::class, 'update']);
    Route::get('assign_line_to_supervisor/delete/{id}',[AssignClassTeacherController::class, 'delete']);
    Route::get('assign_line_to_supervisor/edit_single/{id}',[AssignClassTeacherController::class, 'single_edit']);
    Route::post('assign_line_to_supervisor/edit_single/{id}',[AssignClassTeacherController::class, 'update_single']);
    Route::post('admin/assign_line_to_supervisor/get_subject',[AssignClassTeacherController::class, 'get_subject']);
    //examination

  Route::get('admin/positions',[PositionsController::class, 'list']);
  Route::get('admin/positions/add',[PositionsController::class, 'add']);
  Route::post('admin/positions/add',[PositionsController::class, 'insert']);
  Route::get('admin/positions/edit/{id}',[PositionsController::class, 'edit']);
  Route::post('admin/positions/edit/{id}',[PositionsController::class, 'update']);
  Route::get('admin/positions/delete/{id}',[PositionsController::class, 'delete']);
  
//marks register
  

    //attendance
    Route::get('admin/attendance/employee',[AttendanceController::class, 'AttendanceStudent']);
    Route::post('admin/attendance/employee/save',[AttendanceController::class, 'AttendanceStudentSubmit']);
    Route::get('admin/attendance/attendance_report',[AttendanceController::class, 'AttendanceReport']);
    // Route::get('/attendance/export/excel', [AttendanceController::class, 'exportExcel']);
    Route::get('/admin/attendance/export', [AttendanceController::class, 'exportExcel'])->name('attendance.export');
    Route::get('/admin/attendance/export/pdf', [AttendanceController::class, 'exportPdf'])->name('attendance.export.pdf');
    Route::get('admin/attendance/manual-attendance', [AttendanceController::class, 'createManual'])->name('manual.attendance.create');
    Route::post('admin/attendance/manual-attendance', [AttendanceController::class, 'storeManual'])->name('manual.attendance.store');



    Route::get('/attendance/export/pdf', [AttendanceController::class, 'exportPdf']);
    Route::get('/attendance-report', [AttendanceController::class, 'report']);
    Route::get('/zk-sync', [AttendanceController::class, 'sync'])->name('zk.sync');
    Route::get('/sync-local-to-cpanel', [SyncController::class, 'synclocal'])->name('sync.local');




//Notice Board

Route::get('admin/communicate/notice_board',[CommunicateController::class, 'NoticeBoard']);
Route::get('admin/communicate/notice_board_add',[CommunicateController::class, 'AddNoticeBoard']);
Route::post('admin/communicate/notice_board_add',[CommunicateController::class, 'NoticeBoardInsert']);
Route::get('admin/communicate/notice_board_edit/{id}',[CommunicateController::class, 'NoticeBoardEdit']);
Route::post('admin/communicate/notice_board_edit/{id}',[CommunicateController::class, 'NoticeBoardUpdate']);
Route::get('admin/communicate/notice_board_delete/{id}',[CommunicateController::class, 'NoticeBoardDelete']);
Route::get('admin/communicate/send_email',[CommunicateController::class, 'SendEmail']);
Route::get('admin/communicate/search_user',[CommunicateController::class, 'SearchUser']);
Route::post('admin/communicate/send_email',[CommunicateController::class, 'SendEmailUser']);

Route::get('admin/my_exam_result/print',[ExaminationsController::class, 'MyExamResultPrint']);
    //admin/change_password

    Route::get('admin/change_password',[UserController::class, 'change_password'])->name('change_password');
    Route::post('admin/change_password',[UserController::class, 'update_change_password'])->name('update_change_password');
});

Route::group(['middleware' => 'teacher'], function(){
    Route::get('teacher/dashboard',[DashboardController::class, 'dashboard']);

    //teacher/change_password

    Route::get('teacher/change_password',[UserController::class, 'change_password'])->name('change_password');
    Route::get('teacher/my_class_subjects',[AssignClassTeacherController::class, 'MyClassSubjects']);
    Route::get('teacher/account',[UserController::class, 'MyAccount'])->name('MyAccount');
    Route::get('teacher/my_exam_result/print',[ExaminationsController::class, 'MyExamResultPrint']);
    Route::post('teacher/account',[UserController::class, 'UpdateMyAccount'])->name('UpdateMyAccount');
    Route::post('teacher/change_password',[UserController::class, 'update_change_password'])->name('update_change_password');
    Route::get('teacher/my_student',[StudentController::class, 'My_Student']);
    Route::get('teacher/my_class_timetable/class_timetable/{class_id}/{subject_id}',[ClassTimetableController::class, 'My_TimetableTeacher']);
    Route::get('teacher/my_exam_timetable',[ExaminationsController::class, 'MyExamTimetableTeacher']);
    Route::get('teacher/my_calendar',[CalendarController::class, 'MyCalendarTeacher']);


//teacher/assignment/assignment
Route::get('teacher/assignment',[AssignmentController::class, 'AssignmentList']);
Route::get('teacher/assignment/add',[AssignmentController::class, 'AssignmentAdd']);
Route::post('teacher/assignment/add',[AssignmentController::class, 'AssignmentInsert']);
Route::post('teacher/assignment/get_subject',[AssignmentController::class, 'get_subject']);
Route::get('teacher/assignment/edit/{id}',[AssignmentController::class, 'AssignmentEdit']);
Route::post('teacher/assignment/edit/{id}',[AssignmentController::class, 'AssignmentUpdate']);
Route::get('teacher/assignment/delete/{id}',[AssignmentController::class, 'delete']);

    //mark register teacher
    Route::get('teacher/marks_register',[ExaminationsController::class, 'marks_register_teacher']);
    Route::post('teacher/submit_marks_register',[ExaminationsController::class, 'submit_marks_register']);
    Route::post('teacher/single_submit_marks_register',[ExaminationsController::class, 'single_submit_marks_register']);

    Route::get('teacher/attendance/student',[AttendanceController::class, 'AttendanceStudentTeacher']);
    Route::post('teacher/attendance/student/save',[AttendanceController::class, 'AttendanceStudentSubmit']);
    Route::get('teacher/attendance/attendance_report',[AttendanceController::class, 'AttendanceReportTeacher']);
    Route::get('teacher/my_notice_board',[CommunicateController::class, 'MyNoticeBoardTeacher']);
    Route::get('teacher/assignment/submitted/{id}',[AssignmentController::class, 'Teachersubmitted']);
    Route::get('attendance_report/search_user',[AttendanceController::class, 'SearchUser']);
});

Route::group(['middleware' => 'student'], function(){
    Route::get('student/dashboard',[DashboardController::class, 'dashboard']);
    //student/change_password
    Route::get('student/my_subjects',[SubjectController::class, 'mySubjects'])->name('mySubjects');
    Route::get('student/account',[UserController::class, 'MyAccount'])->name('MyAccount');
    Route::post('student/account',[UserController::class, 'UpdateMyAccountStudent'])->name('UpdateMyAccountStudent');
    Route::get('student/change_password',[UserController::class, 'change_password'])->name('change_password');
    Route::post('student/change_password',[UserController::class, 'update_change_password'])->name('update_change_password');
    Route::get('student/my_timetable',[ClassTimetableController::class, 'MyTimetable']);
    Route::get('student/my_exam_timetable',[ExaminationsController::class, 'MyExamTimetable']);
    Route::get('student/my_calendar',[CalendarController::class, 'MyCalendar']);
    Route::get('student/my_exam_result',[ExaminationsController::class, 'MyExamResult']);
    Route::get('student/my_exam_result/print',[ExaminationsController::class, 'MyExamResultPrint']);
    Route::get('student/my_attendance',[AttendanceController::class, 'MyAttendance']);
    Route::get('student/my_notice_board',[CommunicateController::class, 'MyNoticeBoard']);
    Route::get('student/my_assignments',[AssignmentController::class, 'MyAssignment']);

    Route::get('student/assignment/submit/{id}',[AssignmentController::class, 'MyAssignmentSubmit']);
    Route::post('student/assignment/submit/{id}',[AssignmentController::class, 'MyAssignmentSubmitInsert']);
    Route::get('student/my_submitted_assignment',[AssignmentController::class, 'MySubmittedAssignment']);

    Route::get('student/fees_collection',[FeesCollectionController::class, 'FeesCollectionStudent']);


});

Route::group(['middleware' => 'parent'], function(){
    Route::get('parent/dashboard',[DashboardController::class, 'dashboard']);
    //admin/change_password
    Route::get('parent/my_student/collect_fees/{student_id}',[FeesCollectionController::class, 'FeesCollectionParent']);
    Route::get('parent/change_password',[UserController::class, 'change_password'])->name('change_password');
    Route::get('parent/account',[UserController::class, 'MyAccount'])->name('MyAccount');
    Route::get('parent/my_exam_result/print',[ExaminationsController::class, 'MyExamResultPrint']);
    Route::get('parent/myStudents',[ParentController::class, 'myStudentParent'])->name('myStudentParent');
    Route::post('parent/account',[UserController::class, 'UpdateMyAccountParent'])->name('UpdateMyAccountParent');
    Route::post('parent/change_password',[UserController::class, 'update_change_password'])->name('update_change_password');
    Route::get('parent/my_student/subject/{student_id}',[SubjectController::class,'ParentStudentSubject'])->name('ParentStudentSubject');
    Route::get('parent/my_student/exam_timetable/{student_id}',[ExaminationsController::class,'MyExamTimetableParent']);
    Route::get('parent/my_student/exam_result/{student_id}',[ExaminationsController::class,'MyExamResultParent']);
    Route::get('parent/my_student/subject/class_timetable/{class_id}/{subject_id}/{student_id}',[ClassTimetableController::class, 'MyTimetableParent']);
    Route::get('parent/my_student/calendar/{student_id}',[CalendarController::class, 'MyCalendarParent']);
    Route::get('parent/my_student/attendence/{student_id}',[AttendanceController::class, 'MyAttendanceParent']);
    Route::get('parent/my_notice_board',[CommunicateController::class, 'MyNoticeBoardParent']);
    Route::get('parent/my_student_notice_board',[CommunicateController::class, 'MyStudentNoticeBoardParent']);
    Route::get('parent/my_student/assignment/{id}',[AssignmentController::class, 'MyAssignmentParent']);
    Route::get('parent/my_student/submitted_assignment/{id}',[AssignmentController::class, 'SubmittedAssignmentParent']);


});

