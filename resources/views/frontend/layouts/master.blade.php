<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- FOR SEO -->
    <!-- <meta property='og:title' content='Custom Notion-styled Avatar Icon'/>
    <meta property='og:image' content='./assets/images/link.jpg'/> 
    <meta property='og:description' content='DESCRIPTION OF YOUR SITE'/>
    <meta property='og:url' content='URL OF YOUR WEBSITE'/>
    <meta property='og:image:width' content='1200' />
    <meta property='og:image:height' content='627' />
    <meta property="og:type" content='website'/> -->
    <title>Upohar DDM - Chandina</title>
    <link rel="icon" href="{{ asset('assets/images/favi.png')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-5.1.3min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css')}}">
</head>

<!-- oncontextmenu="return false;" -->

<body>


    @include('frontend.inc.header')
    
    @yield('content')

    @include('frontend.inc.footer') 



    <!-- Modal BIO -->
    <!-- prime -->
    <div class="modal fade" id="biodata" tabindex="-1" aria-labelledby="biodataLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <img src="{{ asset('assets/images/sh.jpg')}}" class="img-fluid">
                        </div>
                        <div class="col-lg-8">
                            <h6>শেখ হাসিনা ওয়াজেদ</h6>
                            <small class="text-muted">
                                বাংলাদেশের বর্তমান প্রধানমন্ত্রী। তিনি বাংলাদেশের একাদশ জাতীয় সংসদের সরকারদলীয় প্রধান
                                এবং বাংলাদেশ আওয়ামী লীগের সভানেত্রী। তিনি বাংলাদেশের ইতিহাসে সবচেয়ে দীর্ঘ সময় ধরে
                                দায়িত্ব পালন করা প্রধানমন্ত্রী। শেখ হাসিনা বাংলাদেশের প্রথম রাষ্ট্রপতি শেখ মুজিবুর
                                রহমানের কন্যা।
                            </small>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- mp -->
    <div class="modal fade" id="mp" tabindex="-1" aria-labelledby="mpLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <img src="{{ asset('assets/images/nmp.jpg')}}" class="img-fluid">
                        </div>
                        <div class="col-lg-8">
                            <h6>ড.মুহাম্মদ ইউনুস                            </h6>
                            <small class="text-muted">
                                মুহাম্মদ ইউনূস (জন্ম: ২৮ জুন, ১৯৪০) একজন সামাজিক উদ্যোক্তা, সমাজসেবক ও নোবেল পুরস্কার বিজয়ী। তিনি ২০২৪ সালের ৮ই আগস্ট থেকে বাংলাদেশের অন্তর্বর্তীকালীন সরকারের প্রধান উপদেষ্টা হিসেবে দায়িত্ব পালন করছেন।তিনি ২০০৬ সালে গ্রামীণ ব্যাংক প্রতিষ্ঠা এবং ক্ষুদ্রঋণ ও ক্ষুদ্রবিত্ত ধারণার প্রেরণার জন্য নোবেল শান্তি পুরস্কার লাভ করেন। তিনি ২০০৯ সালে যুক্তরাষ্ট্রের প্রেসিডেন্সিয়াল মেডেল অব ফ্রিডম এবং ২০১০ সালে কংগ্রেশনাল গোল্ড মেডেলসহ বিভিন্ন জাতীয় ও আন্তর্জাতিক সম্মাননায় ভূষিত হয়েছেন। তিনি সেই সাতজন ব্যক্তির একজন যারা নোবেল শান্তি পুরস্কার, যুক্তরাষ্ট্রের প্রেসিডেন্সিয়াল মেডেল অব ফ্রিডম এবং মার্কিন যুক্তরাষ্ট্রের কংগ্রেশনাল গোল্ড মেডেল পেয়েছেন।
                            </small>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

       <!-- sec -->
       <div class="modal fade" id="sec" tabindex="-1" aria-labelledby="secLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <img src="{{ asset('assets/images/sec.jpg')}}" class="img-fluid">
                        </div>
                        <div class="col-lg-8">
                            <h6> মো: কামরুল হাসান</h6>
                            <small class="text-muted">
                              মো: কামরুল হাসান এনডিসি   জানুয়ারি ৩০, ২০২২ তারিখে সচিব হিসেবে দুর্যোগ ব্যবস্থাপনা ও ত্রাণ মন্ত্রণালয়ে যোগদান করেন। এ পদে যোগদানের পূর্বে তিনি বিভাগীয় কমিশনার, চট্টগ্রাম হিসেবে কর্মরত ছিলেন।১৯৯৩ সালে বাংলাদেশ সিভিল সার্ভিসের প্রশাসন ক্যাডারে সহকারী কমিশনার হিসেবে বিভাগীয় কমিশনারের কার্যালয়, চট্টগ্রামে তাঁর কর্মজীবন শুরু করেন। তিনি সহকারী কমিশনার ও ম্যাজিস্ট্রেট হিসেবে জেলা প্রশাসকের কার্যালয়, সিলেটে কর্মরত ছিলেন। পরবর্তীতে সিলেট নতুন বিভাগ হিসেবে যাত্রা শুরু করলে তিনি প্রথম বিভাগীয় কমিশনারের একান্ত সচিব হিসেবে দায়িত্ব পালন করেন। সহকারী কমিশনার (ভূমি) হিসেবে তিনি মৌলভীবাজার সদর ও বালাগঞ্জ উপজেলায় কর্মরত ছিলেন। তিনি ভূমি হুকুমদখল কর্মকর্তা ও প্রথম শ্রেণির ম্যাজিস্ট্রেট হিসেবে চট্টগ্রাম কালেক্টরেটে কর্মরত ছিলেন।জনাব মোঃ কামরুল হাসান এনডিসি উপজেলা নির্বাহী অফিসার হিসেবে পাকুন্দিয়া, লালমোহন ও হরিরামপুর উপজেলায় কাজ করেন। এছাড়া অতিরিক্ত জেলা প্রশাসক হিসেবে তিনি মাগুরা জেলায় দায়িত্ব পালন করেন। তিনি ধর্ম বিষয়ক মন্ত্রণালয়ের প্রতিমন্ত্রীর একান্ত সচিব হিসেবে দায়িত্ব পালন করেন। সৌদি আরবের জেদ্দায় মৌসুমী হজ্জ্ব অফিসার হিসেবে ২০০৯, ২০১০, ২০১১ ও ২০১২ খ্রিস্টাব্দে তিনি হজ্জ্ব ব্যবস্থাপনার দায়িত্ব পালন করেন।জনাব মোঃ কামরুল হাসান এনডিসি জেলা প্রশাসক ও জেলা ম্যাজিস্ট্রেট হিসেবে মৌলভীবাজার জেলায় দায়িত্ব পালন করেন। পরবর্তী সময়ে তিনি উপসচিব ও যুগ্মসচিব হিসেবে গৃহায়ন ও গণপূর্ত মন্ত্রণালয়ে দায়িত্ব পালন করেন। তিনি বাংলাদেশ নির্বাচন কমিশন সচিবালয়ে যুগ্মসচিব হিসেবেও কর্মরত ছিলেন। প্রধানমন্ত্রীর কার্যালয়ের অধীন বাংলাদেশ বিনিয়োগ উন্নয়ন কর্তৃপক্ষের (বিডা) নির্বাহী সদস্য (অতিরিক্ত সচিব) হিসেবে তিনি দায়িত্ব পালন করেন।২০২০ সালের জুন মাসে তিনি ময়মনসিংহ বিভাগের বিভাগীয় কমিশনার হিসেবে যোগদান করেন। এক বছর পর ২০২১ সালের জুন মাসে চট্টগ্রাম বিভাগের বিভাগীয় কমিশনার হিসেবে যোগ দেন।জনাব মোঃ কামরুল হাসান এনডিসি বাংলাদেশ কৃষি বিশ্ববিদ্যালয় থেকে কৃষিতে স্নাতক ডিগ্রি এবং পরবর্তী সময়ে জাতীয় বিশ্ববিদ্যালয় থেকে রাষ্ট্রবিজ্ঞানে স্নাতকোত্তর ডিগ্রি অর্জন করেন। তিনি ন্যাশনাল ডিফেন্স কলেজ থেকে ন্যাশনাল ডিফেন্স কোর্স (এনডিসি) সম্পন্ন করেন। এছাড়া তিনি বাংলাদেশ ইউনিভার্সিটি অব প্রফেশনালস (বিইউপি) থেকে সিকিউরিটি অ্যান্ড ডেভেলপমেন্ট স্টাডিজ বিষয়ে দ্বিতীয় মাস্টার্স ডিগ্রি লাভ করেন।জনাব মোঃ কামরুল হাসান এনডিসি দেশের অভ্যন্তরে ও বিদেশে বিভিন্ন প্রশিক্ষণ কর্মসূচিতে অংশগ্রহণ করেন।  জনাব মোঃ কামরুল হাসান এনডিসি জামালপুর জেলার মাদারগঞ্জ উপজেলার ফাজিলপুর গ্রামে এক সম্ভ্রান্ত মুসলিম পরিবারে জন্মগ্রহণ করেন। তাঁর পিতার নাম মোঃ রকিবুল ইসলাম এবং মাতার নাম মোছাঃ মনোয়ারা বেগম।ব্যক্তিগত জীবনে তিনি বিবাহিত এবং দুই পুত্র সন্তানের জনক। তাঁর সহধর্মিনী মিজ নাহিদ সুলতানা এবং দুই সন্তান ফাহিম হাসান রকিব এবং রাহাত হাসান রকিব।
                            </small>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

   <!-- dg -->
   <div class="modal fade" id="dg" tabindex="-1" aria-labelledby="dgLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-4">
                        <img src="{{ asset('assets/images/dg.jpg')}}" class="img-fluid">
                    </div>
                    <div class="col-lg-8">
                        <h6> রেজওয়ানুর রহমান  </h6>
                        <small class="text-muted">
                            দুর্যোগ ব্যবস্থাপনা অধিদপ্তর এ জনাব রেজওয়ানুর রহমান  মহাপরিচালক (গ্রেড-১) পদে ৩০ জুন ২০২০ তারিখ যোগদান করেন। ইতোঃপূর্বে তিনি অতিরিক্ত সচিব হিসেবে বেসামরিক বিমান চলাচল ও পর্যটন মন্ত্রণালয়ে  দায়িত্ব পালন করেন।

 

                            তিনি ঢাকা বিশ্ববিদ্যালয় হতে সমাজ কল্যাণ বিষয়ে  এমএসএস ডিগ্রী অর্জন করেন। বিসিএস (প্রশাসন) ক্যাডারের ৮৬ ব্যাচের কর্মকর্তা হিসেবে ২০ ডিসেম্বর ১৯৮৯ সালে সহকারী কমিশনার পদে রাজশাহীতে যোগদান করেন।  ৩০ বছরের অধিক সময়ের দীর্ঘ চাকুরী জীবনে সরকারের বিভিন্ন গুরুত্বপূর্ণ পদে কমরত ছিলেন। উপজেলা নির্বাহী কর্মকর্তা ও মেট্রোপলিটন ম্যাজিষ্ট্রেট হিসেবে মাঠ প্রশাসনে দায়িত্ব পালন করেন। তিনি প্রকল্প পরিচালক হিসেবে আঞ্চলিক পাসপোর্ট অফিস নির্মাণ প্রকল্পে কাজ করেন। এছাড়া যুগ্ন সচিব এবং অতিরিক্ত সচিব হিসেবে স্বরাষ্ট মন্ত্রণালয়ে দায়িত্ব পালন করেন।
                            
                             
                            
                             জনাব রেজওয়ানুর রহমান আইন এবং প্রশাসন, ভূমি ব্যবস্থাপনা, MAT-2 সহ বিভিন্ন বিষয়ে উচ্চতর প্রশিক্ষণ গ্রহণ করেছেন।
                        </small>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

   <!-- dg -->
   <div class="modal fade" id="gopal" tabindex="-1" aria-labelledby="gopalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <img src="{{ asset('assets/images/gopal.jpg')}}" class="img-fluid" data-bs-toggle="modal" data-bs-target="#gopal" >
                        </div>
                        <div class="col-lg-8">
                            <h6>  প্রাণ গোপাল দত্ত  </h6>
                            <small class="text-muted">
                                <img src="{{ asset('assets/images/gopal.jpg')}}" class="img-fluid float-start" data-bs-toggle="modal" data-bs-target="#gopal" >
                                প্রাণ গোপাল দত্ত (জন্ম: ১ অক্টোবর ১৯৫৩) বাংলাদেশের একজন চিকিৎসক ও রাজনীতিবিদ।[১] তিনি বঙ্গবন্ধু শেখ মুজিব মেডিকেল বিশ্ববিদ্যালয়ের সাবেক উপাচার্য।[২][৩] চিকিৎসা সেবায় অনন্য সাধারণ অবদানের জন্য ২০১২ সালে বাংলাদেশ সরকার তাকে “চিকিৎসাবিদ্যায় স্বাধীনতা পুরস্কারর” প্রদান করেন।[১][৪]

                                ২০ সেপ্টেম্বর ২০২১ সালে তিনি কুমিল্লা-৭ আসনের উপনির্বাচনে বিনা প্রতিদ্বন্দ্বিতায় সংসদ সদস্য নির্বাচিত হন।
                                
                                প্রাথমিক জীবন
                                গোপাল ১ অক্টোবর ১৯৫৩ সালে কুমিল্লার চান্দিনার মহিচাইলে জন্মগ্রহণ করেন। পিতা কালা চান দত্ত এবং মা কিরণ প্রভা দত্তের ৪ ছেলে ও ৩ মেয়ের মধ্যে তিনি দ্বিতীয়।
                                
                                মহিচাইল উচ্চ বিদ্যালয়ে ৮ম শ্রেণি পর্যন্ত লেখা-পড়া করে। ১৯৬৮ সালে কুমিল্লার চান্দিনা পাইলট হাই স্কুল থেকে মেট্রিক পাশ করেন। কুমিল্লা ভিক্টোরিয়া সরকারি কলেজ থেকে ১৯৭০ সালে ইন্টার পাশ করেন। এর পর ১৯৭৬ সালে চট্টগ্রাম মেডিকেল কলেজ থেকে এমবিবিএস পাশ করেন। এরপর ২০ জানুয়ারি ১৯৮০ সালে স্কলারশিপ নিয়ে তৎকালীন সোভিয়েত ইউনিয়নে গিয়ে প্রথমে মাস্টার্স (এমএস), এবং পরবর্তীতে পিএইচডি ডিগ্রি অর্জন করে ৭ জুলাই ১৯৮৩ সালে দেশে ফিরেন।[৫]
                                
                                ১৮ জুন ১৯৭৯ সালে তিনি জয়শ্রী রায় জয়াকে (ঢাকা মেডিক্যাল কলেজে সহযোগী অধ্যাপক) বিয়ে করেন। তাদের এক ছেলে অরিন্দম দত্ত, এক মেয়ে, সন্তান অনিন্দিতা দত্ত।
                                
                                কর্মজীবন
                                প্রাণ গোপাল দত্ত ১৯৭৭ সালে প্রথম শ্রেণীর সরকারি কর্মকর্তা হিসেবে কর্মজীবন শুরু করেন। নাক কান গলা বিভাগে যোগদানের মাধ্যমে চট্টগ্রাম মেডিকেল কলেজ ও রংপুর মেডিকেল কলেজর সহকারী অধ্যাপক ছিলেন। অধ্যাপক হিসেবে স্যার সলিমুল্লাহ মেডিকেল কলেজে নিয়োজিত ছিলেন। বঙ্গবন্ধু শেখ মুজিব মেডিকেল বিশ্ববিদ্যালয়ে ১৯৯৯ সালে যোগদান করেন নাক কান গলা বিভাগের অধ্যাপক ও চেয়ারম্যান পদে। ২০০০ সালে ট্রেজারার পদে দায়িত্ব পান তিনি। এই পদে দায়িত্ব পালন করেন ২০০৯ সাল পর্যন্ত পর্যন্ত। তিনি ২০০৯ থেকে ২০১৫ সাল পর্যন্ত বঙ্গবন্ধু শেখ মুজিব মেডিকেল বিশ্ববিদ্যালয়ের উপাচার্য ছিলেন।
                                
                                রাজনৈতিক জীবন
                                গোপাল কুমিল্লা ভিক্টোরিয়া সরকারি কলেজে অধ্যয়নকালে ছাত্র লীগের রাজনীতি শুরু করেন। তিনি কুমিল্লা উত্তর জেলা আওয়ামী লীগের সিনিয়র সহসভাপতি।
                                
                                ৩০ জুলাই ২০২১ সালে কুমিল্লা-৭ আসনের সংসদ সদস্য আলী আশরাফ মৃত্যুবরণ করলে শূন্য আসনের উপনির্বাচনে বিনা প্রতিদ্বন্দ্বিতায় তিনি ২০ সেপ্টেম্বর ২০২১ সালে সংসদ সদস্য নির্বাচিত হন।[৬]
                                
                                গ্রন্থ
                                গোপাল বিভিন্ন বিষয়ে গ্রন্থ রচনা করেন। তার উল্লেখযোগ্য গ্রন্থের মধ্যে রয়েছে:
                                
                                একান্ত ভাবনা
                                অবিচল সতর্কতা: স্বাধীনতার মূল লক্ষ্য
                                পদোন্নতির সাতকাহন
                                যুবসমাজ ও মূল্যবোধ
                                আমার যত কথা
                                সমকালীন ভাবনা
                                পুরস্কার ও সম্মননা
                                গোপাল চিকিৎসা ক্ষেত্রে অসাধারণ অবদানের জন্য ২০১২ সালে দেশের “সর্বোচ্চ বেসামরিক পুরস্কার”[৭][৮][৯] হিসাবে পরিচিত “স্বাধীনতা পুরস্কার” লাভ করেন।
                            </small>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal services -->
    <div class="modal fade" id="tr" tabindex="-1" aria-labelledby="trLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="mb-0 txt-primary">টি আর </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <small class="text-muted">
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique nobis quibusdam
                                debitis repellat dolorem, ad amet beatae aut. Perspiciatis minima aut accusantium ipsum
                                molestias sequi.
                            </small>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/bootstrap-5.bundle.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/iconify.min.js')}}"></script>
    <script src="{{ asset('assets/js/app.js')}}"></script>

    <script>
        
        var mycls = document.getElementsByClassName('tab-link');
        for (let i = 0; i <= mycls.length; i++) {
            mycls[i].addEventListener("click", function () {
                for (var j = 0; j < mycls.length; j++) {
                    mycls[j].classList.remove('active-link');
                }
                this.classList.add('active-link');
            });
        }
    </script>
    <script>
        jQuery(document).ready(function () {
            jQuery('.popup-gallery').magnificPopup({
                delegate: 'a',
                type: 'image',
                callbacks: {
                    elementParse: function (item) {
                        console.log(item.el.context.className);
                        if (item.el.context.className == 'video') {
                            item.type = 'iframe',
                                item.iframe = {
                                    patterns: {
                                        youtube: {
                                            index: 'youtube.com/',

                                            id: 'v=',
                                            src: '//www.youtube.com/embed/%id%?autoplay=1' // URL that will be set as a source for iframe. 
                                        },
                                        vimeo: {
                                            index: 'vimeo.com/',
                                            id: '/',
                                            src: '//player.vimeo.com/video/%id%?autoplay=1'
                                        },
                                        gmaps: {
                                            index: '//maps.google.',
                                            src: '%id%&output=embed'
                                        }
                                    }
                                }
                        } else {
                            item.type = 'image',
                                item.tLoading = 'Loading image #%curr%...',
                                item.mainClass = 'mfp-img-mobile',
                                item.image = {
                                    tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
                                }
                        }

                    }
                },
                gallery: {
                    enabled: true,
                    navigateByImgClick: true,
                    preload: [0, 1]
                }

            });

        });
    </script>
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
    <!-- <script>
        document.onkeydown = function (e) {
            if (e.ctrlKey && e.keyCode === 85) {
                alert("sed");
                return false;
            }
        };
    </script> -->

    @yield('script')
</body>

</html>