<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Complain;
use App\Models\HumanitarianAid;
use App\Models\Job;
use App\Models\Service;
use App\Models\DisasterReport;
use App\Models\Donation;
use App\Models\UpoharForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Mail;
use PDF;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function blog()
    {
        return view('frontend.blog');
    }

    public function blogDetails($id)
    {
        $data = Blog::where('id',$id)->first();
        return view('frontend.blogdtl', compact('data'));
    }

    public function getAllComplain()
    {
        $data = Complain::orderby('id','DESC')->get();
        return view('admin.complain.index',compact('data'));
    }
    

    public function complainStore(Request $request)
    {
        $name = $request->name;
        $phone = $request->phone;
        $visitor_message = $request->message;


        if(empty($name)){
            $message ="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            Please fill name field, thank you!
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }
        
        if(empty($phone)){
            $message ="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            Please fill phone field, thank you!
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

        
        

        if(empty($visitor_message)){
            $message ="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            Please write your query in message field, thank you!
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

      


        $contact = new Complain();
        $contact->name = $request->name;
        $contact->number = $request->phone; 
        $contact->description = $request->message; 
        if ($contact->save()) {


            $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>আপনার অভিযোগ/পরামর্শটি সম্পন্ন হয়েছে। এই অভিযোগ/পরামর্শ এর জন্য আন্তরিক ধন্যবাদ।</b></div>";
            return response()->json(['status'=> 300,'message'=>$message]);
        } else {
            return response()->json(['status'=> 303,'message'=>'Server Error']);
        }

        

        
        
        


    }


    public function serviceDetails($name)
    {
        $service = Service::where('category', $name)->orderby('id','desc')->get();
        // dd( $service );
        return view('frontend.serviceDetails', compact('service'));
    }

    public function serviceDownload($id)
    {
        $service = Service::where('id', $id)->first()->document;
        //PDF file is stored under project/public/download/info.pdf
        $file = public_path(). "/service/".$service;
        $headers = array(
                'Content-Type: application/pdf',
                );

        return Response::download($file, $service, $headers);
    }

    public function helpDetails($name)
    {
        $help = HumanitarianAid::where('category', $name)->orderby('id','desc')->get();
        // dd( $service );
        return view('frontend.helpDetails', compact('help'));
    }

    public function helpDownload($id)
    {
        $help = HumanitarianAid::where('id', $id)->first()->document;
        //PDF file is stored under project/public/download/info.pdf
        $file = public_path(). "/images/help/".$help;
        $headers = array(
                'Content-Type: application/pdf',
                );

        return Response::download($file, $help, $headers);
    }

    public function disasterDownload($id)
    {
        $help = DisasterReport::where('id', $id)->first()->document;
        //PDF file is stored under project/public/download/info.pdf
        $file = public_path(). "/images/disaster/".$help;
        $headers = array(
                'Content-Type: application/pdf',
                );

        return Response::download($file, $help, $headers);
    }

    public function formDownload($id)
    {
        $help = UpoharForm::where('id', $id)->first()->document;
        //PDF file is stored under project/public/download/info.pdf
        $file = public_path(). "/images/form/".$help;
        $headers = array(
                'Content-Type: application/pdf',
                );

        return Response::download($file, $help, $headers);
    }

    public function master_role_download(Request $request)
    {
        
        $data = Donation::orderby('id','DESC')->where('approve', '1')
                ->when($request->input('fromDate'), function ($query) use ($request) {
                    $query->whereBetween('date', [$request->input('fromDate'), $request->input('toDate')]);
                })
                ->when($request->input('helptype'), function ($query) use ($request) {
                    $query->where("help_type_id",$request->input('helptype'));
                })
                ->when($request->input('union_admin'), function ($query) use ($request) {
                    $query->where("created_by",$request->input('union_admin'));
                })
                ->when($request->input('union'), function ($query) use ($request) {
                    $query->where("union_name",$request->input('union'));
                })
            ->get();
        $time = time();

        $pdf = PDF::loadView('admin.donation.masterRole', compact('data'));

        // return view('admin.donation.masterRole', compact('data'));
        return $pdf->download('MasterRole-'.$time.'.pdf');
        
    }


}
