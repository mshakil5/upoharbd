@extends('admin.layouts.admin')



@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            </ul>
        </div>
        <div id="addThisFormContainer">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>New User Registration</h3>
                        </div>
                        <div class="ermsg"> </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="container">

                                        {!! Form::open(['url' => 'admin/register/admincreate','id'=>'createThisForm']) !!}
                                        {!! Form::hidden('registerid','', ['id' => 'registerid']) !!}
    
                                        
                                        <div>
                                            <label for="name">Name</label>
                                            <input type="text" id="name" name="name" class="form-control">
                                        </div>

                                        <div>
                                            <label for="email">Email</label>
                                            <input type="email" id="useremail" name="useremail" class="form-control">
                                        </div>
                                        <div>
                                            <label for="phone">Mobile</label>
                                            <input type="text" id="phone" name="phone" class="form-control">
                                        </div>
                                        <div>
                                            <label for="password">Password</label>
                                            <input type="password" id="password" name="password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="cpwd">Confirm Password:</label>
                                            <input id="cpassword" type="password" class="form-control" name="cpassword" required autocomplete="new-password">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="container">
                                        <div>
                                            <label for="bname">Business Name</label>
                                            <input type="text" id="bname" name="bname" class="form-control">
                                        </div>
    
                                        <div>
                                            <label for="baddress">Business Address</label>
                                            <input type="text" id="baddress" name="baddress" class="form-control">
                                        </div>
    
                                        <div>
                                            <label for="contact_person">Contact Person</label>
                                            <input type="text" id="contact_person" name="contact_person" class="form-control">
                                        </div>
                                        <div>
                                            <label for="blandnumber">Business Land Number</label>
                                            <input type="text" id="blandnumber" name="blandnumber" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <hr>
                                    <input type="button" id="addBtn" value="Create" class="btn btn-primary">
                                    <input type="button" id="FormCloseBtn" value="Close" class="btn btn-warning">
                                    {!! Form::close() !!}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <button id="newBtn" type="button" class="btn btn-info">Add New</button>
        <hr>

        <div id="contentContainer">


            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3> User Account Details</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <table class="table table-bordered table-hover" id="example">
                                    <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>Business Name</th>
                                        <th>Business Address</th>
                                        <th>Contact Person</th>
                                        <th>Mobile</th>
                                        <th>Land Number</th>
                                        <th>Email</th>
                                        <th>New Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($accounts as $key => $account)
                                            <tr>
                                                <td>{{$key++}}</td>
                                                <td>{{$account->created_at->format("m/d/Y")}}</td>
                                                <td>{{$account->name}}</td>
                                                <td>{{$account->bname}}</td>
                                                <td>{{$account->baddress}}</td>
                                                <td>{{$account->contact_person}}</td>
                                                <td>{{$account->phone}}</td>
                                                <td>{{$account->blandnumber}}</td>
                                                <td>{{$account->email}}</td>
                                                <td>0</td>
                                                <td>
                                                    <a href="{{ route('showimg', $account->id)}}"><i class="fa fa-eye" style="color: #3ddf52;font-size:16px;"></i></a>
                                                    <a id="EditBtn" rid="{{$account->id}}"><i class="fa fa-edit" style="color: #2196f3;font-size:16px;"></i></a>
                                                    <a id="deleteBtn" rid="{{$account->id}}"><i class="fa fa-trash-o" style="color: red;font-size:16px;"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </main>

@endsection
@section('script')
    <script>
        $(document).ready(function () {

            $("#addThisFormContainer").hide();
            $("#newBtn").click(function(){
                clearform();
                $("#newBtn").hide(100);
                $("#addThisFormContainer").show(300);

            });
            $("#FormCloseBtn").click(function(){
                $("#addThisFormContainer").hide(200);
                $("#newBtn").show(100);
                clearform();
            });


            //header for csrf-token is must in laravel
            $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
            //

            var url = "{{URL::to('/admin/user-register')}}";
            // console.log(url);
            $("#addBtn").click(function(){
                //alert('form work');
                if($(this).val() == 'Create') {
                    $.ajax({
                        url: url,
                        method: "POST",
                        data: {
                            name: $("#name").val(),
                            email: $("#useremail").val(),
                            bname: $("#bname").val(),
                            baddress: $("#baddress").val(),
                            contact_person: $("#contact_person").val(),
                            blandnumber: $("#blandnumber").val(),
                            phone: $("#phone").val(),
                            password: $("#password").val(),
                            cpassword: $("#cpassword").val()
                        },
                        success: function (d) {
                            if (d.status == 303) {
                                $(".ermsg").html(d.message);
                            }else if(d.status == 300){
                                $(".ermsg").html(d.message);
                                window.setTimeout(function(){location.reload()},2000)
                            }
                        },
                        error: function (d) {
                            console.log(d);
                        }
                    });
                }

                //create  end
                //Update
                if($(this).val() == 'Update'){

                    $.ajax({
                        url:url+'/'+$("#registerid").val(),
                        method: "PUT",
                        type: "PUT",
                        data:{ 
                            registerid: $("#registerid").val(),
                            name: $("#name").val(),
                            email: $("#useremail").val(),
                            bname: $("#bname").val(),
                            baddress: $("#baddress").val(),
                            contact_person: $("#contact_person").val(),
                            blandnumber: $("#blandnumber").val(),
                            phone: $("#phone").val(),
                            password: $("#password").val(),
                            cpassword: $("#cpassword").val()
                            },
                        success: function(d){
                            if (d.status == 303) {
                                $(".ermsg").html(d.message);
                            }else if(d.status == 300){
                                success("User Updated Successfully!!");
                                window.setTimeout(function(){location.reload()},2000)
                            }
                        },
                        error:function(d){
                            console.log(d);
                        }
                    });
                }
                //Update
            });
            //Edit
            $("#contentContainer").on('click','#EditBtn', function(){
                $accountid = $(this).attr('rid');
                $info_url = url + '/'+$accountid+'/edit';
                $.get($info_url,{},function(d){
                    populateForm(d);
                    pagetop();
                });
            });
            //Edit  end

             //Delete 
             $("#contentContainer").on('click','#deleteBtn', function(){
            var registerid = $(this).attr('rid');
            var info_url = url + '/'+registerid;
            swal({
            title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel plx!",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url:info_url,
                    method: "GET",
                    type: "DELETE",
                    data:{
                    },
                    success: function(d){
                        if(d.success) {
                            swal("Deleted!", "Your imaginary file has been deleted.", "success");     
                            location.reload();
                        }
                    },
                    error:function(d){
                        console.log(d);
                    }
                });
            } else {
                swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
            });
            });
            //Delete  

            function populateForm(data){
                $("#name").val(data.name);
                $("#useremail").val(data.email);
                $("#phone").val(data.phone);   
                $("#bname").val(data.bname);   
                $("#baddress").val(data.baddress);   
                $("#contact_person").val(data.contact_person);   
                $("#blandnumber").val(data.blandnumber);   
                $("#registerid").val(data.id);
                $("#addBtn").val('Update');
                $("#addThisFormContainer").show(300);
                $("#newBtn").hide(100);
            }
            function clearform(){
                $('#createThisForm')[0].reset();
                $("#addBtn").val('Create');
            }


        });

        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#alluser").addClass('active');
            $("#alluser").addClass('is-expanded');
            $("#user").addClass('active');
        });
    </script>

@endsection
