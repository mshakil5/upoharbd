@extends('admin.layouts.admin')
@section('content')


<main class="app-content">
    <div class="row user">
        
      <div class="col-md-4">
        <div class="timeline-post">

            <div class="">
                <div class="info">
                    @if (isset($beneficiary->image))
                        <img class="user-img" src="{{asset('images/'.$beneficiary->image)}}" style="height: 260px">
                    @else
                        <img src="{{asset('1.png')}}" alt="" class="img-fluid">
                    @endif
                    


                  <h4>{{$beneficiary->name}}</h4>
                  <p>Age: {{$beneficiary->age}}</p>
                </div>
                <div class="cover-image"></div>
            </div>
                
            <div class="post-content">
              
                <div class="widget widget-team-contact">
                    <h3 class="section-title title-bar-primary2">Personal Info</h3>
                   
                        <p>Address:<span>{{$beneficiary->address}}</span></p>
                        <p>Phone:<span>{{$beneficiary->mobile}}</span></p>
                        <p>E-mail:<span>{{$beneficiary->email}}</span></p>            
                    
                </div>
            </div>
        </div>


        
        <div class="timeline-post">
                
            <div class="post-content">

                <div class="widget widget-team-contact">
                    <h3 class="section-title title-bar-primary2">Select Help Type</h3>
                    <input type="hidden" id="benID" name="benID" value="{{$beneficiary->id}}">
                    <select name="helptype" id="helptype" class="form-control helptype">
                        <option value="">Select</option>
                        @foreach ($types as $type)
                        <option value="{{$type->id}}" @if ($type->id == $beneficiary->help_type_id)
                            selected
                        @endif >{{$type->name}}</option>
                        @endforeach
                    </select>          
                    
                </div>
              
                <div class="widget widget-team-contact">
                    <h3 class="section-title title-bar-primary2">Print Personal Info</h3>
                    <a class="btn btn-primary" href="{{route('admin.beneficiary.print',$beneficiary->id)}}" target="_blank"><i class="fa fa-print"></i> Print</a>           
                    
                </div>
            </div>
        </div>

        <div class="timeline-post">
            <div class="post-content">
                <div class="widget widget-team-contact">
                    {!! QrCode::size(250)->generate(route('admin.beneficiary.print',$beneficiary->id)) !!}  
                </div>
            </div>
        </div>


    </div>


    <div class="col-md-8">
            <h3 class="section-title title-bar-primary2">Personal Details:</h3>
            <div class="timeline-post">
                
              <div class="post-content">
                
                <table class="table table-hover bg-info text-center">
                    <thead>
                        <tr>
                            <th>Details Title:</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>NID</td>
                            <td>{{$beneficiary->nid}}</td>
                        </tr> 
                        
                        <tr>
                            <td>জন্মনিবন্ধন</td>
                            <td>{{$beneficiary->bid}}</td>
                        </tr> 
                        <tr>
                            </tr><tr>
                            <td>Father/Husband Name</td>
                            <td>{{$beneficiary->spouse_name}}</td>
                        </tr>
                        <tr>
                        </tr><tr>
                            <td>Date of Birth</td>
                            <td>{{$beneficiary->dob}}</td>
                        </tr>
                        <tr>
                            <td>Age</td>
                            <td>{{$beneficiary->age}}</td>
                        </tr>
                        <tr>
                            </tr><tr>
                            <td>Gender</td>
                            <td>{{$beneficiary->gender}}</td>
                        </tr>
                        <tr>
                            </tr><tr>
                            <td>Ward No</td>
                            <td>{{$beneficiary->wordno}}</td>
                        </tr>
                        <tr>
                            </tr><tr>
                            <td>Union Name</td>
                            <td>{{$beneficiary->union}}</td>
                        </tr>
                        <tr>
                            </tr><tr>
                            <td>Upazila</td>
                            <td>{{$beneficiary->upazila}}</td>
                        </tr>
                        <tr>
                            </tr><tr>
                            <td>District</td>
                            <td>{{$beneficiary->district}}</td>
                        </tr>
                        <tr>
                            </tr><tr>
                            <td>Number of Family Member</td>
                            <td>{{$beneficiary->family_member}}</td>
                        </tr>
                        
                        <tr>
                            <td>Marital Status</td>
                            <td>{{$beneficiary->marital_status}}</td>
                        </tr>                               
                    </tbody>
                </table>


              </div>
              
            </div>

            <h3 class="section-title title-bar-primary2">Profile Activity:</h3>

            <div class="timeline-post">
                <div class="post-content">

                    <table class="table table-hover table-success text-center">
                        <thead>
                            <tr>
                                <th>Title </th>
                                <th>Details</th>                                   
                            </tr>
                        </thead>
                        <tbody>
                        {{-- <tr>
                            <td>Profile Status:</td>
                            <td>2</td>
                        </tr> --}}
                        <tr>
                            <td>Profile Updated By:</td>
                            <td>
                                @if ($beneficiary->updated_by)
                                {{ \App\Models\User::where('id',$beneficiary->updated_by)->first()->name }}
                                @else
                                    Not updated yet
                                @endif
                                
                            </td>
                        </tr>
                        <tr>
                            <td>Profile Updatd Date:</td>
                            <td>{{$beneficiary->updated_at}}</td>
                        </tr>  
                        <tr>
                            <td>Profile Created By:</td>
                            <td>
                                @if ($beneficiary->created_by)
                                {{ \App\Models\User::where('id',$beneficiary->created_by)->first()->name }}
                                @else
                                    
                                @endif
                                
                            </td>
                        </tr> 
                        <tr>
                            <td>Profile Created Date:</td>
                            <td>{{$beneficiary->created_at}}</td>
                        </tr> 
            
                        </tbody>
                    </table>

                </div>
            </div>
          
      </div>

      <div class="col-md-12">
        <div>
            <div>

                <div class="tile">
                    <h3 class="tile-title">Donation Record:</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Purpose Of Donation</th>
                                    <th>Note</th>
                                    <th>Product</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($donations as $donation)
                                <tr>
                                    <td>{{$donation->date}}</td>
                                    <td>{{ \App\Models\HelpType::where('id',$donation->help_type_id)->first()->name }}</td>
                                    <td>{{$donation->comment}}</td>
                                    <td>{{$donation->product}}</td>
                                    <td>{{$donation->amount}}</td>
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
        $(document).ready(function() {
            $("#beneficiary").addClass('active');
        });
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>


<script>
    
    $(document).ready(function () {

        //header for csrf-token is must in laravel
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
            //

            
        
        // customer destails 

        var url = "{{URL::to('/admin/update-beneficiary-helptype')}}";

            $(".helptype").change(function(){
		            event.preventDefault();
                    var helptype = $(this).val();
                    
                    var form_data = new FormData();
                    form_data.append("helptype", helptype);
                    form_data.append("benID", $("#benID").val());

                    console.log(helptype, benID);

                    $.ajax({
                      url: url,
                      method: "POST",
                      contentType: false,
                      processData: false,
                      data: form_data,
                      success: function (d) {
                          if (d.status == 303) {
                              $(".ermsg").html(d.message);
                          }else if(d.status == 300){
                                success("Data Change Successfully!!");
                                window.setTimeout(function(){location.reload()},2000)
                          }
                      },
                      error: function (d) {
                          console.log(d);
                      }
                  });

            });


    });
</script>



@endsection