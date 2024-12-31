<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beneficiary;
use App\Models\Donation;
use App\Models\HelpType;
use App\Models\User;
Use Image;
use Illuminate\support\Facades\Auth;
use \PDF;
use Yajra\DataTables\DataTables;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class DonationController extends Controller
{
    public function donation(Request $request)
    {
        if(empty($request->help_type_id)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Type of help \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

        if(empty($request->amount) && empty($request->product)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Amount or Product\" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

        $bendtls = Beneficiary::where('id',$request->beneficiary_id)->first();

        $chkdonation = Donation::where('help_type_id',$request->help_type_id)->where('beneficiary_id',$request->beneficiary_id)->first();

        if (isset($chkdonation)) {
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>You have already donate this humanitarian in this type of help..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        } else {
            $data = new Donation();
            $data->date =  date('Y-m-d');
            $data->help_type_id = $request->help_type_id;
            $data->beneficiary_id = $request->beneficiary_id;
            $data->amount = $request->amount;
            $data->product = $request->product;
            $data->comment = $request->comment;
            $data->union_name = $bendtls->union;
            $data->status= "0";
            $data->created_by= Auth::user()->id;
            if ($data->save()) {

                $updatedata = Beneficiary::find($request->beneficiary_id);        
                $updatedata->help_type_id = $request->help_type_id;
                $updatedata->updated_by= Auth::user()->id;
                $updatedata->save();


                $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Data Created Successfully.</b></div>";
                return response()->json(['status'=> 300,'message'=>$message,'updatedata'=>$updatedata,'data'=>$data]);
            } else {
                return response()->json(['status'=> 303,'message'=>'Server Error!!']);
            }
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

        if (isset($request->master)) {

            $fdate = $request->input('fromDate');
            $tdate = $request->input('toDate');
            $htype = $request->input('helptype');
            $u_admin = $request->input('union_admin');
            $uname = $request->input('union');

            if ($htype) {
                $htypename = HelpType::where('id', $htype)->first()->name;
            } else {
                $htypename = '';
            }
            
            
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

            $pdf = PDF::loadView('admin.donation.masterRole', compact('data','fdate','tdate','htype','u_admin','uname','htypename'));
            // return $pdf->download('MasterRole-'.$time.'.pdf');
            return view('admin.donation.masterRole', compact('data','fdate','tdate','htype','u_admin','uname','htypename'));

        } elseif (isset($request->talika)) {

            $fdate = $request->input('fromDate');
            $tdate = $request->input('toDate');
            $htype = $request->input('helptype');
            $u_admin = $request->input('union_admin');
            $uname = $request->input('union');


            if ($htype) {
                $htypename = HelpType::where('id', $htype)->first()->name;
            } else {
                $htypename = '';
            }
            
            $data = Donation::orderby('id','DESC')
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

            $pdf = PDF::loadView('admin.donation.masterRole', compact('data','fdate','tdate','htype','u_admin','uname','htypename'));
            // return $pdf->download('MasterRole-'.$time.'.pdf');
            return view('admin.donation.talika', compact('data','fdate','tdate','htype','u_admin','uname','htypename'));

        } else {
        
            $types = HelpType::orderby('id','DESC')->get();
            $users = User::where('is_type', '0')->where('status','1')->orderby('id','DESC')->get();

            $fdate = $request->input('fromDate');
            $tdate = $request->input('toDate');
            $htype = $request->input('helptype');
            $u_admin = $request->input('union_admin');
            $uname = $request->input('union');
           

            // if (Auth::user()->is_type == 1) {
                
            //     $data = Donation::orderby('id','DESC')->where('approve', '1')
            //         ->when($request->input('fromDate'), function ($query) use ($request) {
            //             $query->whereBetween('date', [$request->input('fromDate'), $request->input('toDate')]);
            //         })
            //         ->when($request->input('helptype'), function ($query) use ($request) {
            //             $query->where("help_type_id",$request->input('helptype'));
            //         })
            //         ->when($request->input('union_admin'), function ($query) use ($request) {
            //             $query->where("created_by",$request->input('union_admin'));
            //         })
            //         ->when($request->input('union'), function ($query) use ($request) {
            //             $query->where("union_name",$request->input('union'));
            //         })
            //         ->limit(100)->get();
            // } else {
            //     $data = Donation::orderby('id','DESC')->where('approve', '1')->where('created_by', Auth::user()->id)
            //         ->when($request->input('fromDate'), function ($query) use ($request) {
            //             $query->whereBetween('date', [$request->input('fromDate'), $request->input('toDate')]);
            //         })
            //         ->when($request->input('helptype'), function ($query) use ($request) {
            //             $query->where("help_type_id",$request->input('helptype'));
            //         })
            //         ->when($request->input('union'), function ($query) use ($request) {
            //             $query->where("union_name",$request->input('union'));
            //         })
            //         ->limit(100)->get();
            // }


            return view('admin.donation.approveddonation',compact('types','users','fdate','tdate','htype','u_admin','uname'));
        }
    }

    public function getDonationsData(Request $request)
    {
        $data = Donation::with('beneficiary')->where('approve', '1')
            ->when($request->input('fromDate'), function ($query) use ($request) {
                $query->whereBetween('date', [$request->input('fromDate'), $request->input('toDate')]);
            })
            ->when($request->input('helptype'), function ($query) use ($request) {
                $query->where("help_type_id", $request->input('helptype'));
            })
            ->when($request->input('union_admin'), function ($query) use ($request) {
                $query->where("created_by", $request->input('union_admin'));
            })
            ->when($request->input('union'), function ($query) use ($request) {
                $query->where("union_name", $request->input('union'));
            });
    
        return DataTables::of($data)
            ->addColumn('beneficiary_name', function ($donation) {
                return $donation->beneficiary->name;
            })
            ->make(true);
    }

    public function getTalikaData(Request $request)
    {
        $data = Donation::with('beneficiary')->where('approve', '1')
            ->when($request->input('fromDate'), function ($query) use ($request) {
                $query->whereBetween('date', [$request->input('fromDate'), $request->input('toDate')]);
            })
            ->when($request->input('helptype'), function ($query) use ($request) {
                $query->where("help_type_id", $request->input('helptype'));
            })
            ->when($request->input('union_admin'), function ($query) use ($request) {
                $query->where("created_by", $request->input('union_admin'));
            })
            ->when($request->input('union'), function ($query) use ($request) {
                $query->where("union_name", $request->input('union'));
            });

        return DataTables::of($data)
            ->addColumn('beneficiary_name', function ($donation) {
                return $donation->beneficiary->name;
            })
            ->make(true);
    }

    public function getApprovedDonationsData(Request $request)
    {
        $query = Donation::with('beneficiary')->where('approve', '1');
    
        if (Auth::user()->is_type == 1) {
            $query->when($request->input('fromDate'), function ($query) use ($request) {
                $query->whereBetween('date', [$request->input('fromDate'), $request->input('toDate')]);
            })
            ->when($request->input('helptype'), function ($query) use ($request) {
                $query->where("help_type_id", $request->input('helptype'));
            })
            ->when($request->input('union_admin'), function ($query) use ($request) {
                $query->where("created_by", $request->input('union_admin'));
            })
            ->when($request->input('union'), function ($query) use ($request) {
                $query->where("union_name", $request->input('union'));
            });
        } else {
            $query->where('created_by', Auth::user()->id)
                ->when($request->input('fromDate'), function ($query) use ($request) {
                    $query->whereBetween('date', [$request->input('fromDate'), $request->input('toDate')]);
                })
                ->when($request->input('helptype'), function ($query) use ($request) {
                    $query->where("help_type_id", $request->input('helptype'));
                })
                ->when($request->input('union'), function ($query) use ($request) {
                    $query->where("union_name", $request->input('union'));
                });
        }
    
        return DataTables::of($query)
            ->addColumn('beneficiary_name', function ($donation) {
                return $donation->beneficiary->name;
            })
            ->addColumn('beneficiary_address', function ($donation) {
                return $donation->beneficiary->address;
            })
            ->addColumn('beneficiary_wordno', function ($donation) {
                return $donation->beneficiary ? $donation->beneficiary->wordno : 'N/A';
            })
            ->addColumn('beneficiary_nid', function ($donation) {
                return $donation->beneficiary ? $donation->beneficiary->nid : 'N/A';
            })
            ->addColumn('product', function ($donation) {
                return $donation->product;
            })
            ->addColumn('amount', function ($donation) {
                return $donation->amount;
            })
            ->addColumn('qr_code', function ($donation) {
                $qrCodeUrl = route('admin.beneficiary.print', $donation->beneficiary_id);
                $qrCode = QrCode::size(50)->generate($qrCodeUrl);
                return $qrCode;
            })
            ->rawColumns(['qr_code'])
            ->make(true);
    }


    public function updateDonation(Request $request)
    {
        if(empty($request->help_type_id)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Type of help \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

        if(empty($request->amount) && empty($request->product)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Amount or Product\" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

        $bendtls = Beneficiary::where('id',$request->beneficiary_id)->first();

        $chkdonation = Donation::where('help_type_id',$request->help_type_id)->where('beneficiary_id',$request->beneficiary_id)->where('id','!=',$request->codeid)->first();

        if (isset($chkdonation)) {
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>You have already donate this humanitarian in this type of help..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        } else {
            $data = Donation::find($request->codeid);
            $data->help_type_id = $request->help_type_id;
            $data->beneficiary_id = $request->beneficiary_id;
            $data->amount = $request->amount;
            $data->product = $request->product;
            $data->comment = $request->comment;
            $data->status= "0";
            $data->updated_by= Auth::user()->id;
            if ($data->save()) {

                $updatedata = Beneficiary::find($request->beneficiary_id);        
                $updatedata->help_type_id = $request->help_type_id;
                $updatedata->updated_by= Auth::user()->id;
                $updatedata->save();


                $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Data Updated Successfully.</b></div>";
                return response()->json(['status'=> 300,'message'=>$message,'updatedata'=>$updatedata,'data'=>$data]);
            } else {
                return response()->json(['status'=> 303,'message'=>'Server Error!!']);
            }
        }
        

        
    }
}
