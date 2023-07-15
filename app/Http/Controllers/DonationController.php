<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beneficiary;
use App\Models\Donation;
use App\Models\HelpType;
Use Image;
use Illuminate\support\Facades\Auth;

class DonationController extends Controller
{
    public function donation(Request $request)
    {
        if(empty($request->help_type_id)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Type of help \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

        if(empty($request->amount)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Amount \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

        if(empty($request->comment)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Comment \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

        $data = new Donation();
        $data->date =  date('Y-m-d');
        $data->help_type_id = $request->help_type_id;
        $data->beneficiary_id = $request->beneficiary_id;
        $data->amount = $request->amount;
        $data->comment = $request->comment;
        $data->status= "0";
        $data->created_by= Auth::user()->id;
        if ($data->save()) {
            $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Data Created Successfully.</b></div>";
            return response()->json(['status'=> 300,'message'=>$message]);
        } else {
            return response()->json(['status'=> 303,'message'=>'Server Error!!']);
        }
    }

    public function getNotApproveDonation()
    {
        $data = Donation::orderby('id','DESC')->where('approve', '0')->get();
        return view('admin.donation.needapprove',compact('data'));
    }

    public function approveDonation(Request $request)
    {
        $user = Donation::find($request->id);
        $user->approve = $request->approve;
        $user->save();

        if($request->approve==1){
            $user = Donation::find($request->id);
            $user->approve = $request->approve;
            $user->save();
            $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Approved Successfully.</b></div>";
            return response()->json(['status'=> 300,'message'=>$message]);
        }else{
            $user = Donation::find($request->id);
            $user->approve = $request->approve;
            $user->save();
            $message ="<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Inactive Successfully.</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
        }

    }

    public function humanitarianAssistance2()
    {
        $types = HelpType::orderby('id','DESC')->get();
        $data = Donation::orderby('id','DESC')->where('approve', '1')->get();
        return view('admin.donation.approveddonation',compact('data','types'));
    }

    public function humanitarianAssistance(Request $request)
    {
        
// dd('controller');

        $types = HelpType::orderby('id','DESC')->get();
        $data = Donation::orderby('id','DESC')->where('approve', '1')
                ->when($request->input('fromDate'), function ($query) use ($request) {
                    $query->whereBetween('date', [$request->input('fromDate'), $request->input('toDate')]);
                })
                ->when($request->input('helptype'), function ($query) use ($request) {
                    $query->where("help_type_id",$request->input('helptype'));
                })
        ->get();

        return view('admin.donation.approveddonation',compact('data','types'));
    }
}
