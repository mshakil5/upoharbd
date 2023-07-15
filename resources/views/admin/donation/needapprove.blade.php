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
                                        <th>Purpose of donation</th>
                                        <th>Note</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($data as $key => $item)
                                            <tr>
                                                <td>{{$key++}}</td>
                                                <td>{{$item->date}}</td>
                                                <td>{{ \App\Models\HelpType::where('id',$item->help_type_id)->first()->name }}</td>
                                                <td>{{$item->comment}}</td>
                                                <td>{{$item->amount}}</td>
                                                <td>
                                                    <div class="toggle-flip">
                                                        <label>
                                                            <input type="checkbox" class="toggle-class" data-id="{{$item->id}}" {{ $item->approve ? 'checked' : '' }}><span class="flip-indecator" data-toggle-on="Approved" data-toggle-off="Need approve"></span>
                                                        </label>
                                                    </div>
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
    <script type="text/javascript">
        $(document).ready(function() {
            $("#notapprovedonation").addClass('active');
        });
    </script>
@endsection