<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HumanitarianAid;
Use Image;
use Illuminate\support\Facades\Auth;

class HumanitarianAidController extends Controller
{
    public function index()
    {
        $data = HumanitarianAid::orderby('id','DESC')->get();
        return view('admin.humanaid.index',compact('data'));
    }
    
    public function store(Request $request)
    {
        $data = new HumanitarianAid();
        $data->title = $request->title;
        $data->date = $request->date;
        $data->category = $request->category;

        // intervention
        if($request->image != 'null'){
            $rand = mt_rand(100000, 999999);
            $imageName = time(). $rand .'.'.$request->image->extension();
            $request->image->move(public_path('help'), $imageName);
            $data->document = $imageName;
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
        $info = HumanitarianAid::where($where)->get()->first();
        return response()->json($info);
    }

    public function update(Request $request, $id)
    {
        
        $updatedata = HumanitarianAid::find($id);

        // intervention
        if($request->image != 'null'){
            $rand = mt_rand(100000, 999999);
            $imageName = time(). $rand .'.'.$request->image->extension();
            $request->image->move(public_path('help'), $imageName);
            $updatedata->document = $imageName;
        }
        // end

            $updatedata->date = $request->date;
            $updatedata->title = $request->title;
            $updatedata->category = $request->category;
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

        if(HumanitarianAid::destroy($id)){
            return response()->json(['success'=>true,'message'=>'Listing Deleted']);
        }
        else{
            return response()->json(['success'=>false,'message'=>'Update Failed']);
        }
    }
}
