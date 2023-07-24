<section class="header shadow-sm bg-white">
    <!-- <div class="container-fluid bg-primary py-2">
        Top bar text will be here
    </div> -->
    <div class="container ">
        <div class="row">
            <div class="col-lg-2 d-flex align-items-center">
                <div class="photo">
                    <div class="items" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="View BIO">
                        <img src="{{ asset('assets/images/FOC104DWYAUwtcU.jpg')}}" class="img-fluid w-100" data-bs-toggle="modal" data-bs-target=" ">
                    </div>
                    {{-- <div class="items" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="View BIO">
                        <img src="{{ asset('assets/images/gopal.jpg')}}" class="img-fluid w-75" data-bs-toggle="modal"
                            data-bs-target="#gopal">
                    </div> --}}


                </div>
            </div>
            <div class="col-lg-8 text-center d-flex align-items-center justify-content-center">
                <div class="inner text-black px-2 py-4">
                    <h3>‘মানবিক সহায়তা ডিজিটাল’ অসহায়ে বাড়বে মনোবল</h3>
                    <h6 class="text-muted">দুর্যোগ ব্যবস্থাপনা ও ত্রাণ মন্ত্রণালয়, চান্দিনা, কুমিল্লা</h6>
                    <button class=" btn btn-theme">
                        @if (Auth::user())
                            
                        <a href="{{route('admin.dashboard')}}" target="_blank">UPOHARDDM-ADMIN</a>
                        @else
                            
                        <a href="{{route('login')}}" target="_blank">UPOHARDDM-ADMIN</a>
                        @endif
                    </button>
                </div>
            </div>
            <div class="col-lg-2 d-flex align-items-center">
                <div class="photo">
                    <div class="items" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="View BIO">
                        <img src="{{ asset('assets/images/sh.jpg')}}" class="img-fluid w-100" data-bs-toggle="modal"
                            data-bs-target="#biodata">
                    </div>
                    {{-- <div class="items" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="View BIO">
                        <img src="{{ asset('assets/images/mp.jpg')}}" class="img-fluid w-75" data-bs-toggle="modal"
                            data-bs-target="#mp">
                    </div> --}}


                </div>
            </div>
        </div>
    </div>
</section>