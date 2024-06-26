@extends('admin.layouts.admin')



@section('content')


<style>
    table {
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
        border: 1px solid #ddd;
    }
    th, td {
        text-align: left;
        padding: 8px;
    }
    tr:nth-child(even){background-color: #f2f2f2}
</style>


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
                <div class="col-md-3">
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3>New Register</h3>
                        </div>
                        <div class="ermsg"></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="container">

                                    {!! Form::open(['url' => 'admin/register/admincreate','id'=>'createThisForm']) !!}
                                    {!! Form::hidden('codeid','', ['id' => 'codeid']) !!}

                                    
                                    <div>
                                        <label for="name">Name</label>
                                        <input type="text" id="name" name="name" class="form-control">
                                    </div>
                                    <div>
                                        <label for="useremail">Email</label>
                                        <input type="email" id="useremail" name="useremail" class="form-control">
                                    </div>
                                    <div>
                                        <label for="phone">Phone</label>
                                        <input type="text" id="phone" name="phone" class="form-control">
                                    </div>
                                    <div id="admin_type">
                                        <label for="title">Admin Type</label>
                                        <select  id="is_type" name="is_type" class="form-control">
                                            <option value="">Please Select</option>
                                            <option value="1">সুপার অ্যাডমিন</option>
                                            <option value="3">ইউনিয়ন অ্যাডমিন</option>
                                            <option value="1">ওয়েব অ্যাডমিন</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="image">Image<p style="display: inline; color: red">*(Max 2MB)</p></label>
                                        <input class="form-control" id="image" name="image" type="file">
                                    </div>
                                    
                                    <div>
                                        <label for="union">Union</label>
                                        <select id="union" name="union" class="form-control">
                                            <option value="">Select</option>
                                            <option value="শুহিলপুর">শুহিলপুর</option>
                                            <option value="বাতাঘাসি">বাতাঘাসি</option>
                                            <option value="মাধাইয়া">মাধাইয়া</option>
                                            <option value="মহিচাইল">মহিচাইল</option>
                                            <option value="কেরণখাল">কেরণখাল</option>
                                            <option value="বাড়েরা">বাড়েরা</option>
                                            <option value="এতবারপুর">এতবারপুর</option>
                                            <option value="বরকইট">বরকইট</option>
                                            <option value="মাইজখার">মাইজখার</option>
                                            <option value="গল্লাই">গল্লাই</option>
                                            <option value="দোল্লাই">দোল্লাই</option>
                                            <option value="বরকরই">বরকরই</option>
                                            <option value="জোয়াগ">জোয়াগ</option>
                                            <option value="চান্দিনা পৌরসভা">চান্দিনা পৌরসভা</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="password">Password</label>
                                        <input type="password" id="password" name="password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="cpwd">Confirm Password:</label>
                                        <input id="cpassword" type="password" class="form-control" name="cpassword" required autocomplete="new-password">
                                    </div>

                                    <hr>
                                    <input type="button" id="addBtn" value="Create" class="btn btn-primary">
                                    <input type="button" id="FormCloseBtn" value="Close" class="btn btn-warning">
                                    {!! Form::close() !!}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
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
                            <h3> Admin Account Details</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="container">


                                    <table class="table table-bordered table-hover table-responsive" id="example" style="width: 100%">
                                        <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Type</th>
                                            <th>Phone</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $n = 1;
                                            ?>
                                            @forelse ($accounts as $account)
                                                <tr>
                                                    <td>{{$n++}}</td>
                                                    <td>{{$account->name}}</td>
                                                    <td>{{$account->email}}</td>
                                                    <td>
                                                        @if ($account->is_type == 0)
                                                        ইউনিয়ন অ্যাডমিন
                                                        @else
                                                        সুপার অ্যাডমিন
                                                        @endif
                                                    </td>
                                                    <td>{{$account->phone}}</td>
                                                    
                                                    <td style="text-align: center">
                                                        @if ($account->photo)
                                                        <img src="{{asset('images/'.$account->photo)}}" height="120px" width="220px" alt="">
                                                        @endif
                                                    </td>
                                                    
                                                    
                                                    <td>
                                                        <div class="toggle-flip">
                                                            <label>
                                                                <input type="checkbox" class="toggle-class" data-id="{{$account->id}}" {{ $account->status ? 'checked' : '' }}><span class="flip-indecator" data-toggle-on="Active" data-toggle-off="Inactive"></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td><a id="EditBtn" rid="{{$account->id}}"><i class="fa fa-edit" style="color: #2196f3;font-size:16px;"></i></a>
                                                        {{-- <a id="deleteBtn" rid="{{$account->id}}"><i class="fa fa-trash-o" style="color: red;font-size:16px;"></i></a> --}}
                                                    </td>
                                                </tr>
                                            @empty
                                                <h3>No post found from you. Create a new Account</h3>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
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
    $(function() {
      $('.toggle-class').change(function() {
        var url = "{{URL::to('/admin/active-user')}}";
          var status = $(this).prop('checked') == true ? 1 : 0;
          var id = $(this).data('id');
           console.log(status);
          $.ajax({
              type: "GET",
              dataType: "json",
              url: url,
              data: {'status': status, 'id': id},
              success: function(d){
                // console.log(data.success)
                if (d.status == 303) {
                        warning("Deactive Successfully!!");
                    }else if(d.status == 300){
                        success("Active Successfully!!");
                        // window.setTimeout(function(){location.reload()},2000)
                    }
                },
                error: function (d) {
                    console.log(d);
                }
          });
      })
    })
  </script>


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

            var url = "{{URL::to('/admin/register')}}";
            // console.log(url);
            $("#addBtn").click(function(){
                //alert('form work');
                if($(this).val() == 'Create') {

                    var file_data = $('#image').prop('files')[0];
                    if(typeof file_data === 'undefined'){
                        file_data = 'null';
                    }
                    var form_data = new FormData();
                    form_data.append('image', file_data);
                    form_data.append("name", $("#name").val());
                    form_data.append("email", $("#useremail").val());
                    form_data.append("phone", $("#phone").val());
                    form_data.append("union", $("#union").val());
                    form_data.append("is_type", $("#is_type").val());
                    form_data.append("password", $("#password").val());
                    form_data.append("cpassword", $("#cpassword").val());
                    $.ajax({
                      url: url,
                      method: "POST",
                      contentType: false,
                      processData: false,
                      data:form_data,
                      success: function (d) {
                          if (d.status == 303) {
                              $(".ermsg").html(d.message);
                          }else if(d.status == 300){
                            success("Data Insert Successfully!!");
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
                    var file_data = $('#image').prop('files')[0];
                    if(typeof file_data === 'undefined'){
                        file_data = 'null';
                    }
                    
                    var form_data = new FormData();
                    form_data.append('image', file_data);
                    form_data.append("name", $("#name").val());
                    form_data.append("email", $("#useremail").val());
                    form_data.append("phone", $("#phone").val());
                    form_data.append("is_type", $("#is_type").val());
                    form_data.append("union", $("#union").val());
                    form_data.append("codeid", $("#codeid").val());
                    form_data.append("password", $("#password").val());
                    form_data.append("cpassword", $("#cpassword").val());
                    form_data.append('_method', 'put');
                    $.ajax({
                        url:url+'/'+$("#codeid").val(),
                        type: "POST",
                        dataType: 'json',
                        contentType: false,
                        processData: false,
                        data:form_data,
                        success: function(d){
                            console.log(d);
                            if (d.status == 303) {
                                $(".ermsg").html(d.message);
                                pagetop();
                            }else if(d.status == 300){
                                success("Data Update Successfully!!");
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
                $("#union").val(data.city);
                // $("#is_type").val(data.is_type);
                $("#codeid").val(data.id);
                $("#addBtn").val('Update');
                $("#addThisFormContainer").show(300);
                $("#newBtn").hide(100);
                $("#admin_type").hide(100);
            }
            function clearform(){
                $('#createThisForm')[0].reset();
                $("#addBtn").val('Create');
            }


        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#admin").addClass('active');
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>

@endsection
