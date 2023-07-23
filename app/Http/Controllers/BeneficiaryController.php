<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beneficiary;
use App\Models\Donation;
use App\Models\HelpType;
Use Image;
use Illuminate\support\Facades\Auth;

class BeneficiaryController extends Controller
{
    public function makeDonation($id)
    {
        $types = HelpType::orderby('id','DESC')->get();
        $beneficiary = Beneficiary::where('id',$id)->first();
        // dd($beneficiary);
        return view('admin.beneficiary.makedonation',compact('types','beneficiary'));
    }

    public function beneficiaryDetails($id)
    {
        $types = HelpType::orderby('id','DESC')->get();
        $beneficiary = Beneficiary::where('id',$id)->first();
        $donations = Donation::where('beneficiary_id', $id)->where('approve','1')->get();
        // dd($beneficiary);
        return view('admin.beneficiary.bendetails',compact('types','beneficiary','donations'));
    }


    public function index()
    {
        if (Auth::user()->is_type == "0") {
            $data = Beneficiary::orderby('id','DESC')->where('created_by', Auth::user()->id)->get();
        } else {
            $data = Beneficiary::orderby('id','DESC')->get();
        }
        
        return view('admin.beneficiary.index',compact('data'));
    }
    
    public function store(Request $request)
    {

        if(empty($request->spouse_name)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Spouse Name \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

        if(empty($request->nid) && empty($request->bid)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"NID or Birth Registration \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

        $chknid = Beneficiary::where('nid', $request->nid)->whereNotNull('nid')->first();
        if($chknid){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>This nid already exits..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

        $chkbid = Beneficiary::where('bid', $request->bid)->whereNotNull('bid')->first();
        if($chkbid){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>This birth registration number already exits..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

        if(!empty($request->bid) && ($request->image == 'null')){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>If you add birth registration number then image field is mandatory!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

        if(empty($request->wordno)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Wordno \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

        if(empty($request->union)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Union \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

        if(empty($request->upazila)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Upazila \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

        if(empty($request->district)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"District \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

        $data = new Beneficiary();
        $data->name = $request->name;
        $data->nid = $request->nid;
        $data->bid = $request->bid;
        $data->dob = $request->dob;
        $data->age = $request->age;
        $data->mobile = $request->mobile;
        $data->family_member = $request->family_member;
        $data->spouse_name = $request->spouse_name;
        $data->gender = $request->gender;
        $data->marital_status = $request->marital_status;
        $data->wordno = $request->wordno;
        $data->upazila = $request->upazila;
        $data->union = $request->union;
        $data->district = $request->district;
        $data->address = $request->address;

        // intervention
        if ($request->image != 'null') {
            $originalImage= $request->file('image');
            $thumbnailImage = Image::make($originalImage);
            $originalPath = public_path().'/images/';
            $time = time();
            $thumbnailImage->save($originalPath.$time.$originalImage->getClientOriginalName());
            $data->image = $time.$originalImage->getClientOriginalName();
        }
        // end

        $data->status= "0";
        $data->created_by= Auth::user()->id;
        if ($data->save()) {
            $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Data Created Successfully.</b></div>";
            return response()->json(['status'=> 300,'message'=>$message]);
        } else {
            return response()->json(['status'=> 303,'message'=>'Server Error!!']);
        }
    }

    public function edit($id)
    {
        $where = [
            'id'=>$id
        ];
        $info = Beneficiary::where($where)->get()->first();
        return response()->json($info);
    }

    public function update(Request $request, $id)
    {

        
        if(empty($request->spouse_name)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Spouse Name \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

        if(empty($request->nid) && empty($request->bid)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"NID or Birth Registration \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

        $chknid = Beneficiary::where('nid', $request->nid)->where('id','!=', $id)->whereNotNull('nid')->first();
        if($chknid){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>This nid already exits..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

        $chkbid = Beneficiary::where('bid', $request->bid)->where('id','!=', $id)->whereNotNull('bid')->first();
        if($chkbid){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>This birth registration number already exits..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

        // if(empty($request->bid) || ($request->image == 'null')){
        //     $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>If you add birth registration number then image field is mandatory!</b></div>";
        //     return response()->json(['status'=> 303,'message'=>$message]);
        //     exit();
        // }

        if(empty($request->wordno)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Wordno \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

        if(empty($request->union)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Union \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

        if(empty($request->upazila)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Upazila \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

        if(empty($request->district)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"District \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }



        
        $updatedata = Beneficiary::find($id);

        if($request->image != 'null'){

            $originalImage= $request->file('image');
            $thumbnailImage = Image::make($request->file('image')->getRealPath());
            $originalPath = public_path().'/images/';
            $time = time();
            $thumbnailImage->save($originalPath.$time.$originalImage->getClientOriginalName());
          
        }
            $updatedata->name = $request->name;
            $updatedata->nid = $request->nid;
            $updatedata->bid = $request->bid;
            $updatedata->dob = $request->dob;
            $updatedata->age = $request->age;
            $updatedata->mobile = $request->mobile;
            $updatedata->family_member = $request->family_member;
            $updatedata->spouse_name = $request->spouse_name;
            $updatedata->gender = $request->gender;
            $updatedata->marital_status = $request->marital_status;
            $updatedata->wordno = $request->wordno;
            $updatedata->upazila = $request->upazila;
            $updatedata->union = $request->union;
            $updatedata->district = $request->district;
            $updatedata->address = $request->address;
            $updatedata->status = "1";
            $updatedata->updated_by= Auth::user()->id;

        if ($updatedata->save()) {
            $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Data Updated Successfully.</b></div>";
            return response()->json(['status'=> 300,'message'=>$message]);
        }else{
            return response()->json(['status'=> 303,'message'=>'Server Error!!']);
        }
    }

    public function delete($id)
    {

        if(Beneficiary::destroy($id)){
            return response()->json(['success'=>true,'message'=>'Listing Deleted']);
        }
        else{
            return response()->json(['success'=>false,'message'=>'Update Failed']);
        }
    }
}
