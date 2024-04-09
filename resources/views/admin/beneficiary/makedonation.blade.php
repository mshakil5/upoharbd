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
                <h1><i class="fa fa-dashboard"></i> Donation</h1>
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
                            <h3>Donation</h3>
                        </div>
                        
                        <div class="ermsg">
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                  <div class="tile">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <p class="bs-component">
                                                <button class="btn btn-primary btn-lg btn-block" >Beneficiary Information</button>
                                            </p>

                                            <div>
                                                <label for="name">Name</label>
                                                <p class="text-info">{{$beneficiary->name}}</p>
                                            </div>
                                            
                                            <div>
                                                <label for="nid">NID</label>
                                                <p class="text-info">{{$beneficiary->nid}}</p>
                                            </div>

                                            <div>
                                                <label for="nid">Birth Certificate</label>
                                                <p class="text-info">{{$beneficiary->bid}}</p>
                                            </div>
                                            
                                            <div>
                                                <label for="mobile">Mobile</label>
                                                <p class="text-info">{{$beneficiary->mobile}}</p>
                                            </div>

                                        </div>

                                        <div class="col-lg-6">
                                            <p class="bs-component">
                                                <button class="btn btn-success btn-lg btn-block" >Donation Form</button>
                                            </p>

                                            {!! Form::open(['url' => 'admin/master/create','id'=>'createThisForm']) !!}
                                            {!! Form::hidden('codeid','', ['id' => 'codeid']) !!}
                                            @csrf
                                                
                                            
                                            <div>
                                                <label for="help_type_id">Donation Purpose</label>
                                                <select  id="help_type_id" name="help_type_id" class="form-control">
                                                    <option value="">Please Select</option>
                                                    @foreach ($types as $type)
                                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div>
                                                <label for="amount">Amount</label>
                                                <input type="number" id="amount" name="amount" class="form-control">
                                            </div>

                                            
                                            <div>
                                                <label for="product">Product</label>
                                                <input type="text" id="product" name="product" class="form-control">
                                            </div>


                                            <div>
                                                <label for="comment">Comment</label>
                                                <input type="text" id="comment" name="comment" class="form-control">
                                                <input type="hidden" id="beneficiary_id" name="beneficiary_id" class="form-control" value="{{$beneficiary->id}}">
                                            </div>

                                            <br>
                                            <div>
                                                <input type="button" id="addBtn" value="Create" class="btn btn-primary">
                                                <a href="{{route('admin.beneficiary')}}" class="btn btn-warning">Close</a>
                                                {!! Form::close() !!}
                                            </div>
                                                
                                        </div>
                                    </div>
                                    <div class="tile-footer">
                                    </div>
                                  </div>
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

    var typesData = @json($types);

    $(document).ready(function () {
    $("#help_type_id").change(function() {
        var selectedPurposeId = $(this).val();
        if (selectedPurposeId) {
            var selectedType = typesData.find(function(type) {
                return type.id == selectedPurposeId;
            });

            if (selectedType) {
                $("#amount").val(selectedType.amount);
                $("#product").val(selectedType.product);
            }
        } else {
            $("#amount").val('');
            $("#product").val('');
        }
    });

});

</script>

<script>
    $(document).ready(function () {
        //header for csrf-token is must in laravel
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
        //
        var url = "{{URL::to('/admin/donation-store')}}";
        // console.log(url);
        $("#addBtn").click(function(){
        //   alert("#addBtn");
        
                var form_data = new FormData();
                form_data.append("help_type_id", $("#help_type_id").val());
                form_data.append("amount", $("#amount").val());
                form_data.append("comment", $("#comment").val());
                form_data.append("product", $("#product").val());
                form_data.append("beneficiary_id", $("#beneficiary_id").val());
                $.ajax({
                  url: url,
                  method: "POST",
                  contentType: false,
                  processData: false,
                  data:form_data,
                  success: function (d) {
                    console.log(d);
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
            //create  end
        });
    });
</script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#beneficiary").addClass('active');
        });
    </script>
@endsection
