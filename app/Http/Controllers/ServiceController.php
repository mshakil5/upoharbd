<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\BlogCategory;
Use Image;
use Illuminate\support\Facades\Auth;

class ServiceController extends Controller
{
    
    public function index()
    {
        $data = Service::orderby('id','DESC')->get();
        return view('admin.service.index',compact('data'));
    }
    
    public function store(Request $request)
    {
        $data = new Service();
        $data->title = $request->title;
        $data->category_id = $request->category_id;
        $data->description = $request->description;

        // intervention
        if ($request->image != 'null') {
            $originalImage= $request->file('image');
            $thumbnailImage = Image::make($originalImage);
            $thumbnailPath = public_path().'/images/thumbnail/';
            $originalPath = public_path().'/images/';
            $time = time();
            $thumbnailImage->save($originalPath.$time.$originalImage->getClientOriginalName());
            $thumbnailImage->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumbnailImage->save($thumbnailPath.$time.$originalImage->getClientOriginalName());
            $data->image= $time.$originalImage->getClientOriginalName();
        }
        if ($request->banner_image != 'null') {
            $originalImage= $request->file('banner_image');
            $thumbnailImage = Image::make($originalImage);
            $thumbnailPath = public_path().'/images/thumbnail/';
            $originalPath = public_path().'/images/';
            $time = time();
            $thumbnailImage->save($originalPath.$time.$originalImage->getClientOriginalName());
            $thumbnailImage->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumbnailImage->save($thumbnailPath.$time.$originalImage->getClientOriginalName());
            $data->banner_image = $time.$originalImage->getClientOriginalName();
        }
        // end

        $data->slug = $request->slug;
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
        $info = Service::where($where)->get()->first();
        return response()->json($info);
    }

    public function update(Request $request, $id)
    {
        
        $updatedata = Service::find($id);

        if($request->image != 'null'){
            $oldimg = Service::where('id','=', $id)->first();
            if ($oldimg->image == '') {
            }else{
                $imgdata = Service::find($id);
                $image_path = public_path('images').'/'.$imgdata->image;
                unlink($image_path);
                $thumbnail_path = public_path('images/thumbnail').'/'.$imgdata->image;
                unlink($thumbnail_path);
            }

                $originalImage= $request->file('image');
                $thumbnailImage = Image::make($request->file('image')->getRealPath());
                $thumbnailPath = public_path().'/images/thumbnail/';
                $originalPath = public_path().'/images/';
                $time = time();
                $thumbnailImage->save($originalPath.$time.$originalImage->getClientOriginalName());
                $thumbnailImage->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $thumbnailImage->save($thumbnailPath.$time.$originalImage->getClientOriginalName());
                $updatedata->image = $time.$originalImage->getClientOriginalName();
          
        }
       
        if($request->banner_image != 'null'){
            
            $oldimg = Service::where('id','=', $id)->first();
            if ($oldimg->banner_image == '') {
                
            }else{
                $bannerimgdata = Service::find($id);
                $image_path = public_path('images').'/'.$bannerimgdata->banner_image;
                unlink($image_path);
                $thumbnail_path = public_path('images/thumbnail').'/'.$bannerimgdata->banner_image;
                unlink($thumbnail_path);
            }

                $originalBannerImage = $request->file('banner_image');
                $thumbnailBannerImage = Image::make($request->file('banner_image')->getRealPath());
                $thumbnailBannerPath = public_path().'/images/thumbnail/';
                $originalBannerPath = public_path().'/images/';
                $btime = time();
                $thumbnailBannerImage->save($originalBannerPath.$btime.$originalBannerImage->getClientOriginalName());
                $thumbnailBannerImage->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $thumbnailBannerImage->save($thumbnailBannerPath.$btime.$originalBannerImage->getClientOriginalName());
                $updatedata->banner_image= $btime.$originalBannerImage->getClientOriginalName();
        
        }

            $updatedata->title = $request->title;
            $updatedata->category_id = $request->category_id;
            $updatedata->description = $request->description;
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

        $dltdata = Service::where('id','=', $id)->first();
        if ($dltdata->image != '') {
            $image_path = public_path('images').'/'.$dltdata->image;
            unlink($image_path);
            $thumbnail_path = public_path('images/thumbnail').'/'.$dltdata->image;
            unlink($thumbnail_path);
        }

        if(Service::destroy($id)){
            return response()->json(['success'=>true,'message'=>'Listing Deleted']);
        }
        else{
            return response()->json(['success'=>false,'message'=>'Update Failed']);
        }
    }

}
