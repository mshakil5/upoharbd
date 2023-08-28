@extends('admin.layouts.admin')
@section('content')

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Need Approval</h1>
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
                        <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target=".bd-example-modal-lg">Get Image Link</button></h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="ermsg">
                            </div>
                            <div class="col-md-12">
                              <div class="tile">
                                <div class="row">
                                  <div class="col-lg-6">
                                    {!! Form::open(['url' => 'admin/master/create','id'=>'createThisForm']) !!}
                                    {!! Form::hidden('codeid','', ['id' => 'codeid']) !!}
                                    @csrf
                                    <div>
                                        <label for="help_type_id">Donation Purpose</label>
                                        <select  id="help_type_id" name="help_type_id" class="form-control">
                                            <option value="">Please Select</option>
                                            @foreach (\App\Models\HelpType::all() as $type)
                                            <option value="{{$type->id}}">{{$type->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div>
                                        <label for="comment">Comment</label>
                                        <input type="text" id="comment" name="comment" class="form-control">
                                        <input type="hidden" id="beneficiary_id" name="beneficiary_id" class="form-control">
                                    </div>
                                      
                                  </div>
                                  <div class="col-lg-6">
                                        
                                        

                                        <div>
                                            <label for="amount">Amount</label>
                                            <input type="number" id="amount" name="amount" class="form-control">
                                        </div>

                                        
                                        <div>
                                            <label for="product">Product</label>
                                            <input type="text" id="product" name="product" class="form-control">
                                        </div>


                                        
                                  </div>
                                </div>
                                <div class="tile-footer">
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

        </div>
    </div>


    <div id="contentContainer">


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Donation list</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="container">


                                <table class="table table-bordered table-hover" id="example">
                                    <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Date</th>
                                        <th>Beneficiary</th>
                                        <th>Purpose of donation</th>
                                        <th>Note</th>
                                        <th>Amount</th>
                                        <th>Product</th>
                                        <th>Status</th>
                                        <th style="text-align: center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($data as $key => $item)
                                            <tr>
                                                <td>{{$key++}}</td>
                                                <td>{{$item->date}}</td>
                                                <td>{{ \App\Models\Beneficiary::where('id',$item->beneficiary_id)->first()->name }}</td>
                                                <td>{{ \App\Models\HelpType::where('id',$item->help_type_id)->first()->name }}</td>
                                                <td>{{$item->comment}}</td>
                                                <td>{{$item->amount}}</td>
                                                <td>{{$item->product}}</td>
                                                <td>
                                                    <div class="toggle-flip">
                                                        <label>
                                                            <input type="checkbox" class="toggle-class" data-id="{{$item->id}}" {{ $item->approve ? 'checked' : '' }}><span class="flip-indecator" data-toggle-on="Approved" data-toggle-off="Need approve"></span>
                                                        </label>
                                                    </div>
                                                </td>
                                                
                                              <td style="text-align: center">
                                                <a id="EditBtn" rid="{{$item->id}}"><i class="fa fa-edit" style="color: #2196f3;font-size:16px;"></i></a>
                                              </td>
                                            </tr>
                                        @empty
                                            <h3>No post found.</h3>
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
        var url = "{{URL::to('/admin/approve-donation')}}";
          var approve = $(this).prop('checked') == true ? 1 : 0;
          var id = $(this).data('id');
        
          $.ajax({
              type: "GET",
              dataType: "json",
              url: url,
              data: {'approve': approve, 'id': id},
              success: function(d){
                // console.log(data.success)
                if (d.status == 303) {
                        warning("Deactive Successfully!!");
                    }else if(d.status == 300){
                        success("Approved Successfully!!");
                        window.setTimeout(function(){location.reload()},2000)
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
            $("#addThisFormContainer").show(300);

        });
        $("#FormCloseBtn").click(function(){
            window.setTimeout(function(){location.reload()},100)
            $("#addThisFormContainer").hide(200);
            clearform();
        });
        //header for csrf-token is must in laravel
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
        //
        var url = "{{URL::to('/admin/donation-edit')}}";
        var upurl = "{{URL::to('/admin/donation-update')}}";
        // console.log(url);
        $("#addBtn").click(function(){
            //Update
                var form_data = new FormData();
                form_data.append("codeid", $("#codeid").val());
                form_data.append("help_type_id", $("#help_type_id").val());
                form_data.append("comment", $("#comment").val());
                form_data.append("beneficiary_id", $("#beneficiary_id").val());
                form_data.append("amount", $("#amount").val());
                form_data.append("product", $("#product").val());
                $.ajax({
                    url:upurl,
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
                console.log(d);
                populateForm(d);
                pagetop();
            });
        });
        //Edit  end

        function populateForm(data){
            $("#amount").val(data.amount);
            $("#help_type_id").val(data.help_type_id);
            $("#beneficiary_id").val(data.beneficiary_id);
            $("#product").val(data.product);
            $("#comment").val(data.comment);
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

</script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#notapprovedonation").addClass('active');
        });
    </script>
@endsection