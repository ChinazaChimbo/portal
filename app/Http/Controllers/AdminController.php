<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use FlashAlert;
use App\Models\Student;
use App\Models\Guardian;
use App\Models\Classes;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function addStudent(){
        $classes = Classes::orderBy('name', 'ASC')->get();
        return view('pages.admin.addstudent')->withClasses($classes);
    }

    public function storeStudent(Request $request){
        $this->validate($request, array(
            'pro_pic' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'fname' => 'required|alpha|max:60',
            'mname' => 'required|alpha|max:60',
            'sname' => 'required|alpha|max:60',
            'username' => 'required|max:60',
            'password' => 'required|confirmed|max:60',
            'dob' => 'required',
            'email' => 'email',
            'pnumber' => 'digits:11|max:11',
            'guardian' => 'required|max:60',
            'gnumber' => 'required|digits:11|max:60',
            'address' => 'required',
            'state' => 'required',
            'lga' => 'required',
        ));

        if(Student::where('username', '=', $request->username)->exists()){
            FlashAlert::warning('Warning', 'This Student already exists.');
            return redirect('student/add');
        }else{
            $imageName = time().'.'.$request->pro_pic->extension();  
            $student = new Student;
            $student->fname = $request->fname;
            $student->mname = $request->mname;
            $student->sname = $request->sname;
            $student->gender = $request->gender;
            $student->dob = $request->dob;
            $student->email = $request->email;
            $student->phone = $request->phone;
            $student->address = $request->address;
            $student->state = $request->state;
            $student->lga = $request->lga;
            $student->username = $request->username;
            $student->password = $request->password;
            $student->sclass = $request->class;
            $request->pro_pic->move(public_path('images/profile_pictures'), $imageName);
            $student->profile_pic = $imageName;

            $student->save();

            $guard = new Guardian;
            $guard->student_id = $student->id;
            $guard->name = $request->guardian;
            $guard->phone = $request->gnumber;
            $guard->save();
            FlashAlert::success('Success', 'Student has been added.');
            return redirect('student/add');
        }
    }

    public function showClassAdd(){
        return view('pages.admin.addclass');
    }

    public function storeClass(Request $request){
        $this->validate($request, array(
            'name' => 'required|max:60',
        ));

        if(Classes::where('name', '=', $request->name)->exists()){
            FlashAlert::warning('Warning', 'This class has already been created.');
            return redirect('class/add');
        }else{
            $class = new Classes;
            $class->name = $request->name;
            $class->save();

            FlashAlert::success('Success', 'Class has been added.');
            return redirect('class/add');
        }

    }

    public function showClass(){
        $classes = Classes::orderBy('name', 'ASC')->get();
        return view('pages.admin.viewclass')->withClasses($classes);
    }

    public function changeclass(Request $request){
        $this->validate($request, array(
            'name' => 'required',
        ));
        if(Classes::where('name', '=', $request->name)->exists()){
            FlashAlert::warning('Warning', 'This class name already exists');
            return redirect('class/show');
        }else{
            Classes::where('id', '=', $request->id)->update(['name' => $request->name]);
            FlashAlert::success('Success', 'Class name has been changed successfully');
            return redirect('class/show');
        }
    }

    public function deleteclass($id){
        if (Classes::where('id', '=', $id)->exists()) {
            Classes::where('id', '=', $id)->delete();
            FlashAlert::success('Success', 'Class has deleted');
            return redirect('class/show');
        }else{
            FlashAlert::warning('Warning', 'This class does not exist');
            return redirect('class/show');
        }
    }
    public function showStudents(){
        $classes = Classes::orderBy('name', 'ASC')->get();
        $students = Student::orderBy('fname', 'ASC')->get();
        return view('pages.admin.showstudents')->withClasses($classes)->withStudents($students);
    }

    public function editStudent($id){
        if(Student::where('id', '=', $id)->exists()){
            $student = Student::find($id);
            $classes = Classes::orderBy('name', 'ASC')->get();
            return view('pages.admin.showeditstudent')->withClasses($classes)->withStudent($student);
        }else{
            FlashAlert::warning('Warning', 'This student does not exist');
            return redirect('student/show');
        }
    }

    public function storeEdit(Request $request){
        $this->validate($request, array(
            'pro_pic' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'fname' => 'required|alpha|max:60',
            'mname' => 'required|alpha|max:60',
            'sname' => 'required|alpha|max:60',
            'username' => 'required|max:60',
            'password' => 'required|confirmed|max:60',
            'dob' => 'required',
            'email' => 'email',
            'pnumber' => 'nullable|digits:11|max:11',
            'guardian' => 'required|max:60',
            'gnumber' => 'required|digits:11|max:60',
            'address' => 'required',
            'state' => 'required',
            'lga' => 'required',
        ));

        if($request->hasFile('pro_pic')){
            $imageName = time().'.'.$request->pro_pic->extension();  
            $student = Student::where('id', $request->id)
                                ->update(['fname' => $request->fname,
                                         'mname' => $request->mname,
                                         'sname' => $request->sname,
                                         'gender' => $request->gender,
                                         'dob' => $request->dob,
                                         'email' => $request->email,
                                         'phone' => $request->phone,
                                         'address' => $request->address,
                                         'state' => $request->state,
                                         'lga' => $request->lga,
                                         'username' => $request->username,
                                         'password' => $request->password,
                                         'sclass' => $request->class,
                                         'profile_pic' => $imageName],
                                    );
            $request->pro_pic->move(public_path('images/profile_pictures'), $imageName);

            $guard = Guardian::where('student_id', $request->id)
                               ->update(
                                   ['name' => $request->id,
                                   'phone' => $request->gnumber],
                               );
            FlashAlert::success('Success', 'Student has been edited.');
            return redirect('student/show');
        }else{
            $student = Student::where('id', $request->id)
                                ->update(['fname' => $request->fname,
                                         'mname' => $request->mname,
                                         'sname' => $request->sname,
                                         'gender' => $request->gender,
                                         'dob' => $request->dob,
                                         'email' => $request->email,
                                         'phone' => $request->phone,
                                         'address' => $request->address,
                                         'state' => $request->state,
                                         'lga' => $request->lga,
                                         'username' => $request->username,
                                         'password' => $request->password,
                                         'sclass' => $request->class],
                                    );

                                    $guard = Guardian::where('student_id', $request->id)
                                    ->update(
                                        ['name' => $request->id,
                                        'phone' => $request->gnumber],
                                    );
            FlashAlert::success('Success', 'Student has been edited.');
            return redirect('student/show');
        }
    }

    public function confEdit($id){
        if (Student::where('id', '=', $id)->exists()) {
            $student = Student::find($id);
            return view('pages.admin.confdelstu')->withStudent($student);
        }else{
            FlashAlert::warning('Warning', 'Student does not exist');
            return redirect('student/show');
        }
    }

    public function delStudent(Request $request){
        Student::where('id', '=', $request->id)->delete();
        Guardian::where('student_id', '=', $request->id)->delete();
        FlashAlert::success('success', 'Student has been removed successfully');
        return redirect('student/show');
    }
}
