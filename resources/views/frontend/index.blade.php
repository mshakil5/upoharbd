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

                
                <section class="description">
                    <div id="description">
                        <div class="infoBar shadow-sm border">
                            <div class="title p-2">
                                মানবিক সহায়তা কর্মসূচি বাস্তবায়ন
                            </div>
                            <div class="content p-2">
                                <p>বাংলাদেশ বিশ্বের অন্যতম দুর্যোগপ্রবণ দেশ হিসেবে পরিচিত। ভৌগোলিক অবস্থান ও জলবায়ু পরিবর্তনের প্রভাবে এ দেশ নিয়মিতভাবে বন্যা, ঘূর্ণিঝড় ও জলোচ্ছ্বাসের মতো প্রাকৃতিক দুর্যোগের সম্মুখীন হয় । বাংলাদেশ পরিসংখ্যান ব্যুরো (বিবিএস, ২০১১) এর তথ্য অনুযায়ী, দেশের মোট জনগোষ্ঠীর প্রায় ৩১.৫ শতাংশ দারিদ্র্যসীমার নিচে বাস করে, যার মধ্যে এক-তৃতীয়াংশই অত্যন্ত দরিদ্র এবং মূলত কায়িক পরিশ্রমের ওপর নির্ভরশীল । এই বিশাল জনগোষ্ঠীর একটি বড় অংশ দুর্যোগকালীন সময়ে, দুর্যোগ পরবর্তী অবস্থায় এবং কৃষিক্ষেত্রে কাজ না থাকার সময় (lean period) চরম খাদ্য ও আর্থিক সংকটে পতিত হয় । তাদের জীবন ও জীবিকা রক্ষার্থে এবং দুর্যোগের ঝুঁকি হ্রাসের লক্ষ্যে সরকার ও বিভিন্ন উন্নয়ন সহযোগী সংস্থা বিভিন্ন প্রকার মানবিক সহায়তা প্রদান করে থাকে । <br>

                                এই সহায়তা কার্যক্রমগুলোকে আরও সুশৃঙ্খল ও কার্যকর করার লক্ষ্যে  দুর্যোগ ব্যবস্থাপনা ও ত্রাণ মন্ত্রণালয় 'মানবিক সহায়তা কর্মসূচি বাস্তবায়ন নির্দেশিকা ২০১২-১৩' প্রণয়ন করেছে । এটি মূলত পূর্বে বিভিন্ন সময়ে জারিকৃত আলাদা আলাদা পরিপত্রসমূহের একটি সমন্বিত ও সংশোধিত রূপ । নির্দেশিকাটি সরকারের 'দুর্যোগ বিষয়ক স্থায়ী আদেশাবলী (SOD) ২০১০'-এর সাথে সামঞ্জস্য রেখে তৈরি করা হয়েছে, যা পরিবর্তিত প্রেক্ষাপটে মানবিক সহায়তা কার্যক্রম বাস্তবায়নে একটি পূর্ণাঙ্গ কাঠামো প্রদান করে ।
                                </p>

                                <p>
                                    <strong> কর্মসূচির প্রধান দিকসমূহ</strong>: এই নির্দেশিকার আওতায় বেশ কিছু গুরুত্বপূর্ণ কর্মসূচি অন্তর্ভুক্ত করা হয়েছে, যা দেশের সকল জেলা, উপজেলা ও ইউনিয়ন পর্যায়ে প্রযোজ্য । উল্লেখযোগ্য সহায়তাসমূহ হলো: <br>

                                    <strong> খাদ্য সহায়তা (ভিজিএফ ও জিআর)</strong>: দুঃস্থ ও অতিদরিদ্র পরিবারকে মাসিক ১০-৩০ কেজি খাদ্যশস্য প্রদান করে খাদ্য নিরাপত্তা নিশ্চিত করা । <br>

                                    <strong> নগদ অর্থ সহায়তা (জিআর)</strong>: দুর্যোগে ক্ষতিগ্রস্ত বা দুর্ঘটনায় হতাহতদের পরিবারকে তাৎক্ষণিক আর্থিক সাহায্য এবং দাফন/সৎকারের জন্য অর্থ প্রদান । <br>

                                    <strong> পুনর্বাসন সহায়তা</strong>: ক্ষতিগ্রস্তদের ঘর নির্মাণের জন্য ঢেউটিন এবং এর আনুষঙ্গিক নগদ অর্থ বরাদ্দ করা । <br>
                                    
                                    <strong> শীতবস্ত্র ও পুষ্টি সহায়তা</strong>: অতিদরিদ্রদের শৈত্যপ্রবাহ থেকে রক্ষায় কম্বল ও শীতবস্ত্র এবং  অপুষ্টি রোধে খাদ্যসামগ্রী প্রদান ।

                                </p>

                                
                                <p><strong>বাস্তবায়ন ও তদারকি কাঠামো</strong>:
                                    এই বিশাল কর্মযজ্ঞ সুষ্ঠুভাবে সম্পাদনের জন্য একটি <b>শক্তিশালী সাংগঠনিক কাঠামো</b> নির্ধারণ করা হয়েছে। <b>দুর্যোগ ব্যবস্থাপনা ও ত্রাণ মন্ত্রণালয়ের</b> অধীনে দুর্যোগ ব্যবস্থাপনা অধিদপ্তর সামগ্রিক তত্ত্বাবধানের দায়িত্বে থাকে। কার্যক্রমের নীতিনির্ধারণ ও সমন্বয়ের জন্য জাতীয় পর্যায়ে একটি <b>'স্টিয়ারিং কমিটি'</b> রয়েছে।
                                </p>
                                <p>
                                    এছাড়া তৃণমূল পর্যায়ে সহায়তা পৌঁছে দিতে জেলা, উপজেলা, পৌরসভা, ইউনিয়ন এবং এমনকি ওয়ার্ড পর্যায়েও <b>'মানবিক সহায়তা বাস্তবায়ন কমিটি'</b> কাজ করে। এই কমিটিগুলো সুবিধাভোগীদের তালিকা প্রণয়ন থেকে শুরু করে ত্রাণ বিতরণ ও পরিবীক্ষণের (monitoring) দায়িত্ব পালন করে থাকে।
                                </p>

                                <br>

                                
                                <p><strong>ডিজিটাল পদ্ধতির ব্যবহার</strong>:
                                    স্বাধীনতার পরবর্তী সময়ে প্রতি বছর বিশাল সংখ্যক জনগোষ্ঠীকে মানবিক সহায়তা প্রদান করা হলেও প্রযুক্তিগত সীমাবদ্ধতার কারণে সঠিক সংখ্যা নিরূপণ এবং একই ব্যক্তির বারবার সহায়তা পাওয়ার ঝুঁকি থেকে যায়, যা সরকারের প্রায় <b>১৪০টি সামাজিক নিরাপত্তা কর্মসূচির</b> স্বচ্ছতা নিশ্চিত করার পথে একটি বড় চ্যালেঞ্জ।
                                </p>
                                <p>
                                    এই প্রেক্ষাপটে সম্পদের সর্বোচ্চ ব্যবহার ও সুষম বণ্টন নিশ্চিত করতে কুমিল্লা জেলার চান্দিনা উপজেলার প্রকল্প বাস্তবায়ন অফিসার <b>দেবেশ চন্দ্র দাস</b> ২০২১ সালে ব্যক্তিগত উদ্যোগে <b>'Upohar' (উপহার)</b> নামক একটি আধুনিক সফটওয়্যার উদ্ভাবন করেন। 
                                    <br><br>
                                    পরবর্তীতে <b>Upoharddm.com</b>-এর মাধ্যমে চান্দিনা উপজেলায় দুই বছর পরীক্ষামূলকভাবে এই ডিজিটাল পদ্ধতি ব্যবহারের ফলে মানবিক সহায়তা বন্টনে স্বচ্ছতা বৃদ্ধি পেয়েছে এবং সম্পদের অপচয় রোধসহ প্রকৃত দুস্থদের মাঝে সম্পদের সুষম বণ্টন নিশ্চিত করা সম্ভব হয়েছে।
                                </p>

                                <br>

                                
                                <p><strong>পরিশেষ</strong>:
                                    পরিশেষে বলা যায়, এই নির্দেশিকাটি দেশের প্রান্তিক ও চরম দুর্দশাগ্রস্ত মানুষের জন্য একটি শক্তিশালী <b>সামাজিক নিরাপত্তা বেষ্টনী</b> হিসেবে কাজ করে। নির্দিষ্ট যোগ্যতার ভিত্তিতে দুঃস্থ ও অতিদরিদ্র পরিবার নির্বাচন করে সঠিক সময়ে সঠিক সহায়তা পৌঁছে দেওয়াই এর মূল লক্ষ্য।
                                </p>
                                <p>
                                    বিশেষ করে, <b>'Upohar'</b> সফটওয়্যারের মতো ডিজিটাল পদ্ধতির উদ্ভাবন ও প্রয়োগ মানবিক সহায়তা কার্যক্রমে এক যুগান্তকারী পরিবর্তন এনেছে। এই প্রযুক্তিনির্ভর ব্যবস্থার মাধ্যমে ত্রাণের দ্বৈততা পরিহার করে প্রকৃত অভাবী মানুষের কাছে স্বচ্ছতার সাথে সরকারি সহায়তা পৌঁছে দেওয়া সম্ভব হচ্ছে। এর মাধ্যমে সরকার দুর্যোগের ঝুঁকি হ্রাস, দারিদ্র্য বিমোচন এবং জলবায়ু পরিবর্তনের অভিযানে অবদান রাখার একটি দীর্ঘমেয়াদী পরিকল্পনা বাস্তবায়ন করছে।
                                </p>


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