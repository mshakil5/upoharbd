@extends('frontend.layouts.master')

@section('css')
@endsection

@section('content')

<section class="slider mb-3">
    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/banner/banner.jpg')}}" class="d-block w-100"
                    alt="{{ asset('images/banner/banner.jpg')}}">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/banner/banner_pm.jpg')}}" class="d-block w-100"
                    alt="{{ asset('images/banner/banner_pm.jpg')}}">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/banner/risk-reduction.jpg')}}" class="d-block w-100"
                    alt="{{ asset('images/banner/risk-reduction.jpg')}}">
            </div>
        </div>
        <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button> -->
    </div>
</section>

<section class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 text-muted bg-white p-2">
                <div class="infoBar shadow-sm border">
                    <div class="title p-2">
                 <center>      প্রাণ গোপাল দত্ত</center>
                    <center>   এমপি</center>
                    </div>
                        <div class="items" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="View BIO">
                        <img src="{{ asset('assets/images/gopal.jpg')}}" class="img-fluid w-100" data-bs-toggle="modal" data-bs-target="#gopal">
                    </div>
                </div>
                <div class="infoBar shadow-sm border">
                    <div class="title p-2">
               <center>      চান্দিনা উপজেলা</center>
                    </div>
                    <div class="content p-2">
                        <img src="{{ asset('assets/images/img_8.jpg')}}" class="img-fluid">
                    </div>
                </div>
                <div class="infoBar shadow-sm border">
                    <div class="title p-2">
                        এক নজরে চান্দিনা
                    </div>
                    <div class="content p-2">
                        <ol type="bn">
                            <li>মোট ইউনিয়ন : ১৩টি</li>
                            <li>মোট পৌরসভা : ১টি</li>
                            <li>মোট গ্রাম : ২২৪টি</li>
                            <li>মোট মৌজা : ১২৬টি</li>
                            <li>মোট জনসংখ্যা : ৩৫০২৭৩</li>
                            <li>পুরুষ জনসংখ্যা : ১৬৫৮৭৪</li>
                            <li>মহিলা জনসংখ্যা : ১৮৪৩৯৯</li>
                            <li>শিক্ষার হার : ৫১%</li>
                            <li>মোট খাল : ৮৭</li>
                        </ol>
                    </div>
                </div>
                
                <div class="infoBar shadow-sm border">
                    <div class="title p-2">
                        চান্দিনা উপজেলা
                    </div>
                    <div class="content p-2">
                        <ol type="bn">
                            <li><a href="#"> শুহিলপুর</a></li>
                            <li><a href="#"> বাতাঘাসি</a></li>
                            <li><a href="#"> মাধাইয়া</a></li>
                            <li><a href="#"> মহিচাইল</a></li>
                            <li><a href="#"> কেরণখাল</a></li>
                            <li><a href="#"> বাড়েরা</a></li>
                            <li><a href="#"> এতবারপুর</a></li>
                            <li><a href="#"> বরকইট</a></li>
                            <li><a href="#"> মাইজখার</a></li>
                            <li><a href="#"> গল্লাই</a></li>
                            <li><a href="#"> দোল্লাই</a> </li>
                            <li><a href="#"> বরকরই</a></li>
                            <li><a href="#">জোয়াগ</a></li>
                            <li><a href="#">চান্দিনা পৌরসভা</a></li>
                        </ol>
                    </div>
                </div>
                
            </div>
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
                            <div class="content p-2 ">
                                <a href="" data-bs-toggle="modal" data-bs-target="#tr" class="btn btn-theme mb-1">টি আর </a>
                                <a href="" class="btn btn-theme mb-1">কাবিখা/কাবিটা</a>
                                <a href="" class="btn btn-theme mb-1">ইজিপিপি </a>
                                <a href="" class="btn btn-theme mb-1">বীর নিবাস নির্মাণ</a>
                                <a href="" class="btn btn-theme mb-1">বন্যা আশ্রয়কেন্দ্র নির্মাণ </a>
                                <a href="" class="btn btn-theme mb-1">এইচবিবি রাস্তা নির্মাণ </a>
                                <a href="" class="btn btn-theme ">ব্রীজ কালভার্ট নির্মাণ</a>
                                <a href="" class="btn btn-theme ">'ক' শ্রেণির ঘর নির্মাণ</a>
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
                            <div class="content p-2">
                                <ol>
                                    <li>ঢেউটিন</li>
                                    <li>নগদ অর্থ</li>
                                    <li>খাদ্যশস্য</li>
                                    <li>কম্বল</li>
                                    <li>ভিজিএফ</li>
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
                                    
                                    

                                    {{-- <form class="contact-form-box mt-4" id="contact_form" action="{{route('contact.store')}}" method="post"> --}}
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
                                                {{-- <button type="submit" class="btn btn-theme "> প্রেরণ করুন   </button> --}}
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
                                <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex ullam
                                    illum
                                    temporibus.</p>
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
                                <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex ullam
                                    illum
                                    temporibus.</p>
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
                            <div class="content p-2">
                                <ol>
                                    <li>ডি- ফরম</li>
                                    <li>এফ ফরম</li>
                                    <li>এসওএস ফরম</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-lg-3 text-muted bg-white p-2">
                <div class="infoBar shadow-sm border">
                    <div class="title p-2">
                        <center>     ডাঃ মোঃ এনামুর রহমান এমপি</center>
              
                            <center>   প্রতিমন্ত্রী</center>
                    </div>
                    <div class="content p-2">
                        
                            <img src="{{ asset('assets/images/mp.jpg')}}" class="img-fluid"  data-bs-toggle="modal" data-bs-target="#mp">
                        
                    </div>
                </div>

                <div class="infoBar shadow-sm border">
                    <div class="title p-2">
                        <center>   মো: কামরুল হাসান</br>সচিব </center>
                    </div>
                    <div class="content p-2">
                        <img src="{{ asset('assets/images/sec.jpg')}}" class="img-fluid"  data-bs-toggle="modal" data-bs-target="#sec">
                    </div>
                </div>

                
                <div class="infoBar shadow-sm border">
                    <div class="title p-2">
                       <center>   মো: মিজানুর রহমান</br>মহাপরিচালক</center>
                   </div>
                   <div class="content p-2">
                       <img src="{{ asset('assets/images/dg.jpg')}}" class="img-fluid" data-bs-toggle="modal" data-bs-target="#dg" >
                   </div>
               </div>
               <div class="infoBar shadow-sm border">
                   <div class="content p-2">
                        
                           <img src="{{ asset('assets/images/1090.jpeg')}}" class="img-fluid">
                       
                   </div>
               </div>
               <div class="infoBar shadow-sm border">

                   <div class="content p-2">
                        
                           <img src="{{ asset('assets/images/img_5.jpg')}}" class="img-fluid">
                       
                   </div>
               </div>
               <div class="infoBar shadow-sm border">

                   <div class="content p-2">
                       
                           <img src="{{ asset('assets/images/img_6.jpg')}}" class="img-fluid">
                        
                   </div>
               </div>

            </div>
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


                        {{-- <div class="col-lg-3 px-1">
                            <a href="{{ asset('assets/images/gallery/2.jpeg')}}"
                                class="image">
                                <img src="{{ asset('assets/images/gallery/2.jpeg')}}"
                                    alt="Alt text" class="img-fluid" />
                            </a>
                        </div>
                        <div class="col-lg-3 px-1">
                            <a href="{{ asset('assets/images/gallery/3.jpeg')}}"
                                class="image">
                                <img src="{{ asset('assets/images/gallery/3.jpeg')}}"
                                    alt="Alt text" class="img-fluid" />
                            </a>
                        </div>
                        <div class="col-lg-3 px-1">
                            <a href="{{ asset('assets/images/gallery/11.jpeg')}}"
                                class="image">
                                <img src="{{ asset('assets/images/gallery/11.jpeg')}}"
                                    alt="Alt text" class="img-fluid" />
                            </a>
                        </div>
                        <div class="col-lg-3 px-1">
                            <a href="{{ asset('assets/images/gallery/5.jpeg')}}"
                                class="image">
                                <img src="{{ asset('assets/images/gallery/5.jpeg')}}"
                                    alt="Alt text" class="img-fluid" />
                            </a>
                        </div>
                        <div class="col-lg-3 px-1">
                            <a href="{{ asset('assets/images/gallery/6.jpeg')}}"
                                class="image">
                                <img src="{{ asset('assets/images/gallery/6.jpeg')}}"
                                    alt="Alt text" class="img-fluid" />
                            </a>
                        </div>
                        <div class="col-lg-3 px-1">
                            <a href="{{ asset('assets/images/gallery/7.jpeg')}}"
                                class="image">
                                <img src="{{ asset('assets/images/gallery/7.jpeg')}}"
                                    alt="Alt text" class="img-fluid" />
                            </a>
                        </div>
                        <div class="col-lg-3 px-1">
                            <a href="{{ asset('assets/images/gallery/8.jpeg')}}"
                                class="image">
                                <img src="{{ asset('assets/images/gallery/8.jpeg')}}"
                                    alt="Alt text" class="img-fluid" />
                            </a>
                        </div>
                        <div class="col-lg-3 px-1">
                            <a href="{{ asset('assets/images/gallery/9.jpeg')}}"
                                class="image">
                                <img src="{{ asset('assets/images/gallery/9.jpeg')}}"
                                    alt="Alt text" class="img-fluid" />
                            </a>
                        </div>
                         <div class="col-lg-3 px-1">
                            <a href="{{ asset('assets/images/gallery/10.jpeg')}}"
                                class="image">
                                <img src="{{ asset('assets/images/gallery/10.jpeg')}}"
                                    alt="Alt text" class="img-fluid" />
                            </a>
                        </div>
                         <div class="col-lg-3 px-1">
                            <a href="{{ asset('assets/images/gallery/4.jpeg')}}"
                                class="image">
                                <img src="{{ asset('assets/images/gallery/4.jpeg')}}"
                                    alt="Alt text" class="img-fluid" />
                            </a>
                        </div>
                         <div class="col-lg-3 px-1">
                            <a href="{{ asset('assets/images/gallery/12.jpeg')}}"
                                class="image">
                                <img src="{{ asset('assets/images/gallery/12.jpeg')}}"
                                    alt="Alt text" class="img-fluid" />
                            </a>
                        </div>
                        <div class="col-lg-3 px-1">
                           <a href="{{ asset('assets/images/gallery/s13.jpeg')}}"
                               class="image">
                               <img src="{{ asset('assets/images/gallery/s13.jpeg')}}"
                                   alt="Alt text" class="img-fluid" />
                           </a>
                       </div>
                       <div class="col-lg-3 px-1">
                          <a href="{{ asset('assets/images/gallery/s14.jpeg')}}"
                              class="image">
                              <img src="{{ asset('assets/images/gallery/s14.jpeg')}}"
                                  alt="Alt text" class="img-fluid" />
                          </a>
                      </div>
                      <div class="col-lg-3 px-1">
                         <a href="{{ asset('assets/images/gallery/s15.jpeg')}}"
                             class="image">
                             <img src="{{ asset('assets/images/gallery/s15.jpeg')}}"
                                 alt="Alt text" class="img-fluid" />
                         </a>
                     </div> --}}
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