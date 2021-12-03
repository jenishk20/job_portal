<?php

namespace App\Http\Controllers;

use App\Models\applications;
use App\Models\Company;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //

    public function index(Request $request)
    {


        $roll = $request->get('rollno');
        $fname = $request->get('fname');
        $lname = $request->get('lname');
        $gender = $request->get('gender');
        $pmail = auth()->user()->email;
        $smail = $request->get('Semail');
        $number = $request->get('Wnumber');


        $percent_10 = $request->get('per10');
        $percent_12 = $request->get('per12');
        $degree = $request->get('degree');
        $branch = $request->get('branch');
        $yog = $request->get('yearofpass');
        $yopg = $request->get('yearofpg');
        $cum_gpa = $request->get('cgpaug');
        $cum_percentage = $request->get('perug');
        $sem_1_spi = $request->get('sem1spi');
        $sem_2_spi = $request->get('sem2spi');
        $sem_3_spi = $request->get('sem3spi');
        $sem_4_spi = $request->get('sem4spi');
        $sem_5_spi = $request->get('sem5spi');
        $sem_6_spi = $request->get('sem6spi');

        $backlog = $request->get('backlog');
        $active_backlog = $request->get('actbacklog');

        $if = $request->get('ifsolved');
        $if_active = $request->get('ifactive');


        $linkedin = $request->get('linkedin');
        $facebook = $request->get('facebook');
        $skype = $request->get('skype');
        $github = $request->get('github');
        $resume = $request->file('file');

        $terms = $request->get('Declaration');

        $sql = Student::query()->select()->where('roll_no', '=', $roll)->get();
        $filename = time() . '.' . $resume->getClientOriginalExtension();
        $request->file->move('assets', $filename);
        // dd($request->all());
        if ($sql->isEmpty()) {


            $stu = new Student();
            $stu->roll_no = $roll;
            $stu->first_name = $fname;
            $stu->last_name = $lname;
            $stu->gender = $gender;
            $stu->primary_mail_id = $pmail;
            $stu->secondary_mail_id = $smail;
            $stu->mobile_number = $number;
            $stu->per_10 = $percent_10;
            $stu->per_12 = $percent_12;
            $stu->degree = $degree;
            $stu->branch = $branch;
            $stu->year_of_graduation = $yog;
            $stu->year_of_pg = $yopg;


            $stu->cumulative_gpa = $cum_gpa;
            $stu->cumulative_percentage = $cum_percentage;
            $stu->sem_1_spi = $sem_1_spi;
            $stu->sem_2_spi = $sem_2_spi;
            $stu->sem_3_spi = $sem_3_spi;
            $stu->sem_4_spi = $sem_4_spi;
            $stu->sem_5_spi = $sem_5_spi;
            $stu->sem_6_spi = $sem_6_spi;
            $stu->backlog = $backlog;
            $stu->active_backlog = $active_backlog;
            $stu->if_solved = $if;
            $stu->if_active = $if_active;


            $stu->linkedin = $linkedin;
            $stu->facebook = $facebook;
            $stu->skype = $skype;
            $stu->github = $github;
            $stu->resume = $filename;
            $stu->terms = $terms;

            $stu->status = 'Pending';
            $stu->attempts = '3';
            $stu->save();
            return back()->with('success', 'Data Inserted Successfully');


        } else {

            return back()->with('info', 'Data Already Exists');
        }
    }
    private  function calc($x)
    {
        $maxic='';
        if($x==0)
            return  $maxic;
        if($x<7)
            $maxic='B';
        else if($x>=7 && $x<=12)
            $maxic='A';
        else
            $maxic='A+';

        return  $maxic;
    }
    public function show()
    {
        $companies = Company::query()->select()->get();
        $user = auth()->user();
        $students = Student::query()->select()->where('primary_mail_id', '=', $user->email)->get();
        if($students->isEmpty())
        {
            return view('student.profile');
        }

        $applied = [];
        $selected=[];

        $maxi=0;
        for ($i = 0; $i < count($companies); $i++) {
            $app = applications::query()->select()->where('rollno', '=',$students[0]->roll_no)->
            where('company_name', '=', $companies[$i]->company_name)->get();
            $applications=applications::query()->select()->where('rollno','=',$students[0]->roll_no)->
            where('status','=','Selected')->where('company_name', '=', $companies[$i]->company_name)->get();
            if (!$app->isEmpty())
                $applied[$i] = true;
            else
                $applied[$i] = false;

            if(!$applications->isEmpty()) {
                $selected[$i] = true;
                $maxi=max($maxi,$companies[$i]->CTC);
            }
            else
                $selected[$i]=false;

            $companies[$i]->cat=$this->calc($companies[$i]->CTC);


        }




        $maxic=$this->calc($maxi);
        return view('student.show', compact('companies', 'applied', 'students','selected','maxic'));
    }

    public function show1()
    {
        $email = auth()->user()->email;

        $sql = Student::query()->select()->where('primary_mail_id', '=', $email)->get();

        if ($sql->isEmpty())
            return view('student.profile');
        else
            return view('student.status', compact('sql'));
    }

    public function preview($id)
    {

        return view('student.preview', compact('id'));
    }

    public function apply($id)
    {
        //dd($id);

        $auth_user = auth()->user();

        $mail = $auth_user->email;

        $user = Student::query()->select()->where('primary_mail_id', '=', $mail)->get();
//        dd($user);
        $company = Company::query()->select()->where('id', '=', $id)->get();

        $sql = applications::query()->select()->where('rollno', '=', $user[0]->roll_no)->
        where('company_name', '=', $company[0]->company_name)->
        where('job_role', '=', $company[0]->job_role)->get();

        if ($sql->isEmpty()) {
            $app = new applications();
            $app->rollno = $user[0]->roll_no;
            $app->company_name = $company[0]->company_name;
            $app->job_role = $company[0]->job_role;
            $app->status = 'pending';
            $app->save();

            return back()->with('success', 'Applied Successfully');
        }

    }

    public function viewProfile()
    {
        return view('student.viewProfile');
    }
}
