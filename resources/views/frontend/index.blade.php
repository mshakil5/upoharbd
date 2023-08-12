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
                <div class="linkSection shadow-sm">
                    <ul>
                        <li><a class="tab-link active-link" href="#service">সেবা সমূহ</a></li>
                        <li><a class="tab-link" href="#human-help">মানবিক সহায়তা</a></li>
                        <li><a class="tab-link" href="#complaint">অভিযোগ/পরামর্শ</a></li>
                        <li><a class="tab-link" href="#report">দুর্যোগ ক্ষয়ক্ষতি প্রতিবেদন</a></li>
                        <li><a class="tab-link" href="#info">তথ্য প্রদান</a></li>
                        <li><a class="tab-link" href="#form">ফরম</a></li>
                        <li><a class="tab-link" href="#video">ভিডিও</a></li>
                        <li><a class="tab-link" href="#gallery">ফটো গ্যালারি </a></li>
                    </ul>
                </div>
                <section class="service">
                    <div id="service">
                        <div class="infoBar shadow-sm border">
                            <div class="title p-2">
                                সেবা সমূহ
                            </div>
                            @php
                                $tr = "টি আর";
                                $kabikha = "কাবিখা";
                                $egpp = "ইজিপিপি";
                                $nibas = "বীর নিবাস নির্মাণ";
                                $flood = "বন্যা আশ্রয়কেন্দ্র নির্মাণ";
                                $hbb = "এইচবিবি রাস্তা নির্মাণ";
                                $bridge = "ব্রীজ কালভার্ট নির্মাণ";
                                $ghor = "'ক' শ্রেণির ঘর নির্মাণ";
                            @endphp
                            <div class="content p-2 ">
                                <a href="{{route('frontend.servicedetails', $tr)}}" class="btn btn-theme mb-1">টি আর </a>
                                <a href="{{route('frontend.servicedetails', $kabikha)}}" class="btn btn-theme mb-1">কাবিখা/কাবিটা</a>
                                <a href="{{route('frontend.servicedetails', $egpp)}}" class="btn btn-theme mb-1">ইজিপিপি </a>
                                <a href="{{route('frontend.servicedetails', $nibas)}}" class="btn btn-theme mb-1">বীর নিবাস নির্মাণ</a>
                                <a href="{{route('frontend.servicedetails', $flood)}}" class="btn btn-theme mb-1">বন্যা আশ্রয়কেন্দ্র নির্মাণ </a>
                                <a href="{{route('frontend.servicedetails', $hbb)}}" class="btn btn-theme mb-1">এইচবিবি রাস্তা নির্মাণ </a>
                                <a href="{{route('frontend.servicedetails', $bridge)}}" class="btn btn-theme ">ব্রীজ কালভার্ট নির্মাণ</a>
                                <a href="{{route('frontend.servicedetails', $ghor)}}" class="btn btn-theme ">'ক' শ্রেণির ঘর নির্মাণ</a>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="human-help">
                    <div id="human-help">
                        <div class="infoBar shadow-sm border">
                            <div class="title p-2">
                                মানবিক সহায়তা
                            </div>
                            @php
                                $tin = "ঢেউটিন";
                                $cash = "নগদ অর্থ";
                                $food = "খাদ্যশস্য";
                                $kombol = "কম্বল";
                                $vgf = "ভিজিএফ";
                            @endphp
                            <div class="content p-2">
                                <ol>
                                    <li> <a href="{{route('help.details', $tin)}}">ঢেউটিন</a> </li>
                                    <li> <a href="{{route('help.details', $cash)}}"> নগদ অর্থ</a></li>
                                    <li> <a href="{{route('help.details', $food)}}">খাদ্যশস্য</a> </li>
                                    <li> <a href="{{route('help.details', $kombol)}}">কম্বল</a> </li>
                                    <li> <a href="{{route('help.details', $vgf)}}">ভিজিএফ</a> </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="complaint">
                    <div id="complaint">
                        <div class="infoBar shadow-sm border">
                            <div class="title p-2" id="complainBtn">
                                অভিযোগ/পরামর্শ
                            </div>
                            @if(session()->has('message'))
                                    <div class="alert alert-success" id="successMessage">{{ session()->get('message') }}</div>
                                    @endif
                                    <div class="ermsg"></div>
                            <div class="content p-2" id="complainForm">
                                <p class="mb-0">
                                    <div class="contact-form-box mt-4" id="contact_form">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 form-group mb-3">
                                                <input type="text"  required="" placeholder="আপনার নাম" class="form-control" name="name" id="name">
                                            </div> 
                                            <div class="col-md-6 form-group mb-3">
                                                <input type="number" placeholder="ফোন" class="form-control" name="phone" required="" id="phone">
                                            </div> 
                                            <div class="col-12 form-group mb-3">
                                                <textarea placeholder="অভিযোগ / পরামর্শ " class="textarea form-control" name="message" id="message" rows="7" cols="20" data-error="Message field is required" required=""></textarea>
                                            </div>
                                            <div class="col-12 form-group mb-3 margin-b-none">
                                                <button id="submit" class="btn-theme bg-primary">প্রেরণ করুন</button>
                                                
                                                <input type="button" id="FormCloseBtn" value="Close" class="btn btn-theme btn-warning">
                                            </div>
                                        </div>
                                    </div>
                                </p>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="report">
                    <div id="report">
                        <div class="infoBar shadow-sm border">
                            <div class="title p-2">
                                দুর্যোগ ক্ষয়ক্ষতি প্রতিবেদন
                            </div>
                            <div class="content p-2">
                                <div class="row">
                                    @foreach (\App\Models\DisasterReport::where('category', '1')->orderby('id','DESC')->get() as $item)
                                        <p>{{$item->date}}</p>
                                        <h5>{{$item->title}} <a href="{{route('disaster.download', $item->id)}}"><i class="fa fa-download" aria-hidden="true"></i></a>  </h5>
                                        <hr>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="info">
                    <div id="info">
                        <div class="infoBar shadow-sm border">
                            <div class="title p-2">
                                তথ্য প্রদান
                            </div>
                            <div class="content p-2">
                                
                                <div class="row">
                                    @foreach (\App\Models\DisasterReport::where('category', '2')->orderby('id','DESC')->get() as $info)
                                        <p>{{$info->date}}</p>
                                        <h5>{{$info->title}} <a href="{{route('disaster.download', $info->id)}}"><i class="fa fa-download" aria-hidden="true"></i></a> </h5>
                                        <hr>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="form">
                    <div id="form">
                        <div class="infoBar shadow-sm border">
                            <div class="title p-2">
                                ফরম
                            </div>
                            @php
                                $dform = 1;
                                $fform = 2;
                                $sosform = 3;
                            @endphp
                            <div class="content p-2">
                                <ol>
                                    <li> <a href="{{route('form.download', $dform)}}">ডি- ফরম</a> </li>
                                    <li><a href="{{route('form.download', $fform)}}">এফ ফরম</a></li>
                                    <li><a href="{{route('form.download', $sosform)}}">এসওএস ফরম</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </section>
            </div>


            @include('frontend.inc.rightside')
            
        </div>
    </div>

</section>

<section class="video container mt-3">
    <div id="video">
        <div class="infoBar shadow-sm border">
            <div class="title p-2">
                ভিডিও
            </div>
            <div class="content p-2 d-flex align-items-center">
                <div class="row scrollerAdjust gx-1 w-100">
                    <div class="col-lg-4">
                        <iframe width="100%" height="315" src="https://www.youtube.com/embed/TuUfhpivAr8"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                    <div class="col-lg-4">
                        <iframe width="100%" height="315" src="https://www.youtube.com/embed/D7KMYDoeb04"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                   
                    <div class="col-lg-4">
                        <iframe width="100%" height="315" src="https://www.youtube.com/embed/lVR4h1mnPO4"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div> 
                    <div class="col-lg-4">
                        <iframe width="100%" height="315" src="https://www.youtube.com/embed/5q-hyIlPgao"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div> 
                    
                    <div class="col-lg-4">
                        <iframe width="100%" height="315" src="https://www.youtube.com/embed/EqR-8JauIMU"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div> 
                </div>

            </div>
        </div>
    </div>
</section>
<section class="gallery  container">
    <div id="gallery">
        <div class="infoBar shadow-sm border">
            <div class="title p-2">
                ফটো গ্যালারি
            </div>
            <div class="content px-2"> 
                <div class="popup-gallery">
                    <div class="row mt-2 scrollerAdjust gy-2">

                        @foreach (\App\Models\Photo::orderby('id','DESC')->get() as $img)
                            
                        <div class="col-lg-3 px-1">
                            <a href="{{asset('images/'.$img->image)}}"
                                class="image">
                                <img src="{{asset('images/'.$img->image)}}"
                                    alt="Alt text" class="img-fluid" />
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
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