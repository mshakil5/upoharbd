<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\HelpType;
Use Image;
use Illuminate\support\Facades\Auth;

class HelpController extends Controller
{
    
    public function helptype()
    {
        $data = HelpType::orderby('id','DESC')->get();
        return view('admin.help.type',compact('data'));
    }
    
    public function helptypestore(Request $request)
    {
        if(empty($request->name)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Name \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }
        $data = new HelpType();
        $data->name= $request->name;
        $data->slug= $request->slug;
        $data->amount= $request->amount;
        $data->product= $request->product;
        $data->status= "0";
        $data->created_by= Auth::user()->id;
        if ($data->save()) {
            $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Data Created Successfully.</b></div>";
            return response()->json(['status'=> 300,'message'=>$message]);
        } else {
            return response()->json(['status'=> 303,'message'=>'Server Error!!']);
        }
    }

    public function helptypeedit($id)
    {
        $where = [
            'id'=>$id
        ];
        $info = HelpType::where($where)->get()->first();
        return response()->json($info);
    }

    public function helptypeupdate(Request $request, $id)
    {

        if(empty($request->name)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Name \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        } 
        
        $data = HelpType::find($id);

            $data->name = $request->name;
            $data->slug = $request->slug;
            $data->amount = $request->amount;
            $data->product = $request->product;
            $data->status = "1";

        if ($data->save()) {
            $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Data Updated Successfully.</b></div>";
            return response()->json(['status'=> 300,'message'=>$message]);
        }else{
            return response()->json(['status'=> 303,'message'=>'Server Error!!']);
        }
    }

    public function helptypedelete($id)
    {

        if(HelpType::destroy($id)){
            return response()->json(['success'=>true,'message'=>'Listing Deleted']);
        }
        else{
            return response()->json(['success'=>false,'message'=>'Update Failed']);
        }
    }
}
