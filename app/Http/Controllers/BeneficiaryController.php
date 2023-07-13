<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beneficiary;
use App\Models\BlogCategory;
Use Image;
use Illuminate\support\Facades\Auth;

class BeneficiaryController extends Controller
{
    public function index()
    {
        $data = Beneficiary::orderby('id','DESC')->get();
        return view('admin.beneficiary.index',compact('data'));
    }
    
    public function store(Request $request)
    {
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
