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
                <h1><i class="fa fa-dashboard"></i> Beneficiary</h1>
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
                            <h3>New Pages
                                {{-- <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target=".bd-example-modal-lg">Get Image Link</button> --}}
                            </h3>
                        </div>
                        
                        <div class="ermsg">
                        </div>
                        {{-- @if (Session::has('success'))
                            <div class="alert alert-danger mt-2">{{ Session::get('success') }} 
                            </div>
                        @endif --}}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                  <div class="tile">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            {!! Form::open(['url' => 'admin/master/create','id'=>'createThisForm']) !!}
                                            {!! Form::hidden('codeid','', ['id' => 'codeid']) !!}
                                            @csrf
                                            <div>
                                                <label for="name">Name</label>
                                                <input type="text" id="name" name="name" class="form-control">
                                            </div>
                                            
                                            <div>
                                                <label for="nid">NID</label>
                                                <input type="number" id="nid" name="nid" class="form-control">
                                            </div>
                                            
                                            <div>
                                                <label for="dob">Date of Birth</label>
                                                <input type="date" id="dob" name="dob" class="form-control">
                                            </div>
                                            <div>
                                                <label for="age">Age</label>
                                                <input type="number" id="age" name="age" class="form-control">
                                            </div>
                                            <div>
                                                <label for="mobile">Mobile</label>
                                                <input type="number" id="mobile" name="mobile" class="form-control">
                                            </div>
                                            <div>
                                                <label for="family_member">Number of family member</label>
                                                <input type="number" id="family_member" name="family_member" class="form-control">
                                            </div>
                                            <div>
                                                <label for="wordno">Wordno</label>
                                                <input type="text" id="wordno" name="wordno" class="form-control">
                                            </div>
                                            <div>
                                                <label for="upazila">Upazila</label>
                                                <input type="text" id="upazila" name="upazila" class="form-control" value="চান্দিনা" readonly>
                                            </div>

                                        </div>

                                        <div class="col-lg-6">
                                                
                                            <div>
                                                <label for="spouse_name">Spouse name</label>
                                                <input type="text" id="spouse_name" name="spouse_name" class="form-control">
                                            </div>

                                            
                                            <div>
                                                <label for="bid">Birth Registration</label>
                                                <input type="number" id="bid" name="bid" class="form-control">
                                            </div>
                                            <div>
                                                <label for="image">Image</label>
                                                <input class="form-control" id="image" name="image" type="file">
                                            </div>
                                            
                                            <div>
                                                <label for="gender">Gender</label>
                                                <select  id="gender" name="gender" class="form-control">
                                                    <option value="">Please Select</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label for="marital_status">Marital status</label>
                                                <select  id="marital_status" name="marital_status" class="form-control">
                                                    <option value="">Please Select</option>
                                                    <option value="Unmarried">Unmarried</option>
                                                    <option value="Married">Married</option>
                                                    <option value="Divorced">Divorced</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label for="union">Union</label>
                                                {{-- <input type="text" id="union" name="union" class="form-control"> --}}
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
                                                <label for="district">District</label>
                                                <input type="text" id="district" name="district" class="form-control" value="কুমিল্লা" readonly>
                                            </div>
                                            <div>
                                                <label for="address">Address</label>
                                                <textarea  id="address" name="address" cols="30" rows="3" class="form-control"></textarea>
                                            </div>
                                                
                                        </div>
                                        <div class="col-lg-12">

                                        </div>
                                    </div>
                                    <div class="tile-footer">
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

            </div>
        </div>
        <button id="newBtn" type="button" class="btn btn-info">Add New</button>
        <hr>
        <div id="contentContainer">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3> All Data</h3>
                        </div>
                        <div class="card-body">
                                <div class="container">
                                    <table class="table table-bordered table-hover" id="example">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center">NID/জন্মনিবন্ধন/কৃষি</th>
                                                <th style="text-align: center">নাম</th>                      
                                                <th style="text-align: center">পিতা/স্বামীর নাম </th>
                                                <th style="text-align: center">মোবাইল</th>
                                                <th style="text-align: center">ইউনিয়ন</th>
                                                <th style="text-align: center">উপজিলা</th>
                                                <th style="text-align: center">Add</th>
                                                <th style="text-align: center">View</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                              @foreach ($data as $key => $data)
                                            <tr>
                                              <td style="text-align: center">{{$data->nid}} <br> {{$data->bid}}</td>
                                              <td style="text-align: center">{{$data->name}}</td>
                                              <td style="text-align: center">{{$data->spouse_name}}</td>
                                              <td style="text-align: center">{{$data->mobile}}</td>
                                              <td style="text-align: center">{{$data->union}}</td>
                                              <td style="text-align: center">{{$data->upazila}}</td>
                                              <td style="text-align: center">
                                                <a href="{{route('admin.makedonation', $data->id)}}" class="btn btn-success btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Donate</a>
                                              </td>
                                                
                                              <td style="text-align: center">
                                                <a href="{{route('admin.beneficiarydetails',$data->id)}}"><i class="fa fa-eye" style="color: #307e44;font-size:16px;"></i></a>
                                                @if (Auth::user()->is_type == 1)
                                                    
                                                <a id="EditBtn" rid="{{$data->id}}"><i class="fa fa-edit" style="color: #2196f3;font-size:16px;"></i></a>
                                                <a id="deleteBtn" rid="{{$data->id}}"><i class="fa fa-trash-o" style="color: red;font-size:16px;"></i></a>
                                              
                                                @endif
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

        {{-- @include('admin.photo.modal')  --}}
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
            var url = "{{URL::to('/admin/beneficiary')}}";
            // console.log(url);
            $("#addBtn").click(function(){
            //   alert("#addBtn");
                if($(this).val() == 'Create') {
                    var file_data = $('#image').prop('files')[0];
                    if(typeof file_data === 'undefined'){
                        file_data = 'null';
                    }
                    var form_data = new FormData();
                    form_data.append('image', file_data);
                    form_data.append("name", $("#name").val());
                    form_data.append("nid", $("#nid").val());
                    form_data.append("bid", $("#bid").val());
                    form_data.append("dob", $("#dob").val());
                    form_data.append("age", $("#age").val());
                    form_data.append("mobile", $("#mobile").val());
                    form_data.append("family_member", $("#family_member").val());
                    form_data.append("spouse_name", $("#spouse_name").val());
                    form_data.append("gender", $("#gender").val());
                    form_data.append("marital_status", $("#marital_status").val());
                    form_data.append("wordno", $("#wordno").val());
                    form_data.append("upazila", $("#upazila").val());
                    form_data.append("union", $("#union").val());
                    form_data.append("district", $("#district").val());
                    form_data.append("address", $("#address").val());
                    
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
                    form_data.append("nid", $("#nid").val());
                    form_data.append("bid", $("#bid").val());
                    form_data.append("dob", $("#dob").val());
                    form_data.append("age", $("#age").val());
                    form_data.append("mobile", $("#mobile").val());
                    form_data.append("family_member", $("#family_member").val());
                    form_data.append("spouse_name", $("#spouse_name").val());
                    form_data.append("gender", $("#gender").val());
                    form_data.append("marital_status", $("#marital_status").val());
                    form_data.append("wordno", $("#wordno").val());
                    form_data.append("upazila", $("#upazila").val());
                    form_data.append("union", $("#union").val());
                    form_data.append("district", $("#district").val());
                    form_data.append("address", $("#address").val());
                    form_data.append("codeid", $("#codeid").val());
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
                //alert("btn work");
                codeid = $(this).attr('rid');
                //console.log($codeid);
                info_url = url + '/'+codeid+'/edit';
                //console.log($info_url);
                $.get(info_url,{},function(d){
                    populateForm(d);
                    pagetop();
                });
            });
            //Edit  end
            //Delete 
            $("#contentContainer").on('click','#deleteBtn', function(){
                var dataid = $(this).attr('rid');
                var info_url = url + '/'+dataid;
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
                $("#nid").val(data.nid);
                $("#bid").val(data.bid);
                $("#dob").val(data.dob);
                $("#age").val(data.age);
                $("#mobile").val(data.mobile);
                $("#family_member").val(data.family_member);
                $("#spouse_name").val(data.spouse_name);
                $("#gender").val(data.gender);
                $("#marital_status").val(data.marital_status);
                $("#wordno").val(data.wordno);
                $("#upazila").val(data.upazila);
                $("#union").val(data.union);
                $("#district").val(data.district);
                $("#address").val(data.address);
                $("#codeid").val(data.id);
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

            $(document).ready(function () {
                $('#example2').DataTable();
            });
    </script>
      <script>
        function copyToClipboard(id) {
            document.getElementById(id).select();
            document.execCommand('copy');
            swal("Copied!");
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#beneficiary").addClass('active');
        });
    </script>
@endsection
