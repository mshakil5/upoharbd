@extends('frontend.layouts.master')

@section('css')
@endsection

@section('content')


@include('frontend.inc.banner')

<section class="body-content">
    <div class="container">
        <div class="row">
            @include('frontend.inc.leftside')


            <div class="col-lg-6 text-muted  p-2">
                <section class="service">
                    <div id="service">
                        <div class="infoBar shadow-sm border">
                            <div class="title p-2">
                                মানবিক সহায়তা
                            </div>
                            
                            <div class="content p-2 ">
                                
                                <div class="row">

                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th style="text-align: center">Title</th>
                                                <th>Download</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($help as $item)
                                                <tr>
                                                    <td style="width: 20%">{{$item->date}}</td>
                                                    <td>{{$item->title}}</td>
                                                    <td style="width: 20%"> <a href="{{route('help.download', $item->id)}}" class="btn btn-success"> Download</a> </td>
                                                </tr>
                                            @endforeach


                                        </tbody>
                                    </table>

                                </div>


                            </div>
                        </div>
                    </div>
                </section>
                
                
            </div>


            @include('frontend.inc.rightside')
            
        </div>
    </div>

</section>


@endsection

@section('script')
<script>
    $(document).ready(function () {
            $("#complainForm").hide();
            $("#complainBtn").click(function(){
                $("#complainForm").show(300);

            });
            $("#FormCloseBtn").click(function(){
                $("#complainForm").hide(200);
            });
            
        });
</script>

<script>
    $(document).ready(function () {


//header for csrf-token is must in laravel
$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

           //  make mail start
           var url = "{{URL::to('/complain-store')}}";
           $("#submit").click(function(){

                   var name= $("#name").val();
                   var phone= $("#phone").val();
                   var message= $("#message").val();
                   $.ajax({
                       url: url,
                       method: "POST",
                       data: {name,phone,message},
                       success: function (d) {
                           if (d.status == 303) {
                               $(".ermsg").html(d.message);
                           }else if(d.status == 300){
                               $(".ermsg").html(d.message);
                               window.setTimeout(function(){location.reload()},3000)
                           }
                       },
                       error: function (d) {
                           console.log(d);
                       }
                   });

           });
           // send mail end


});
</script>
@endsection