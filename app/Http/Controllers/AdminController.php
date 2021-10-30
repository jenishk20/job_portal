<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail1;
use App\Models\Company;
use App\Models\Student;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    //

    public function index()
    {
        $users = User::all();

        return view('admin.index');
    }

    public function addCompany()
    {
        return view('admin.addCompany');
    }


    public function confirmCompany(Request $request)
    {
        $cname = $request->get('cname');
        $crole = $request->get('jr');
        $ctc = $request->get('ctc');
        $gpa = $request->get('mcgpa');

        $file = $request->file('file');

        $arr = $request->get('eb');
        $arr = implode(',', $arr);


        $filename = time() . '.' . $file->getClientOriginalExtension();

        $sql = Company::query()->select()->where('company_name', '=', $cname)->get();


        $request->file->move('assets', $filename);
        if ($sql->isEmpty()) {
            $company = new Company();
            $company->company_name = $cname;
            $company->job_role = $crole;
            $company->eligibility = $arr;
            $company->CTC = $ctc;
            $company->minimum_CGPA = $gpa;
            $company->job_description = $filename;

            $company->save();
            return back()->with('success', 'Company Data Inserted Successfully');
        } else {
            return back()->with('info', 'Company Data Already Exists');
        }

    }

    public function review()
    {
        $sql=Student::query()->select()->where('status','=','Pending')->get();

        //dd($sql);
        if($sql->isEmpty())
        {
            return view('admin.reviews',compact('sql'));
        }
        else
        {
            return view('admin.reviews',compact('sql'));
        }

    }
    public function confirm(Request $request)
    {


        $sql=Student::query()->select()->where('id','=',$request->submit)->get();


        $sql[0]->status='Done';
        $sql[0]->save();

        Mail::send(new ContactMail1($request));
        return back()->with('success','Verification Done');
    }


}
