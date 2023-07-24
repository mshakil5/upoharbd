<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Complain;
use App\Models\Job;
use Illuminate\Http\Request;
use Mail;

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


}
