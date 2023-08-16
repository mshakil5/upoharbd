
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0">
    <title>Relief card</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        
    <script>
        setTimeout(function () {
            window.print();
        }, 800);
    </script>


    <style>
      * {
          margin: 0;
          padding: 0;
        }

        body {
          background: #fefefe;
        }

        .smart-card {
          border-radius: 15px;
          padding: 5px;
          border: 1px solid lightgrey;
          max-width: 515px;
          margin: 5px auto;
          background-size: cover;
          background-repeat: no-repeat;
          background-image:url({{url('bg.png')}});
        }/*# sourceMappingURL=app.css.map */
    </style>
</head>

<body>


    <div class="smart-card shadow-sm">
        <div class="row border-bottom pb-2">
            <div class="col-md-2 text-center">
                <img src="{{asset('download.png')}}" class="img-fluid">
            </div>
            <div class="col-md-10 text-center">
                <small class="fw-bold">গণপ্রজাতন্ত্রী বাংলাদেশ সরকার</small> <br>
                <small class="text-success">Government of the People's Republic of Bangladesh  </small> <br>
                <small> <span class="text-danger">Humanitarian card </span> </small>
            </div>
        </div>
        <div class="row border-bottom pb-2">
            <div class="col-md-4 text-center">

              @if (isset($data->image))
                  <img src="{{asset('images/'.$data->image)}}" alt="" class="img-fluid my-3">
              @else
                <img src="{{asset('1.png')}}" alt="" class="img-fluid">
              @endif
              
                {{-- <img src="{{asset('sig.png')}}" class="img-fluid"> --}}
            </div>
            <div class="col-md-6 pt-3"> 
                <div class="form-group">
                    <small>  Name </small> <br>
                    <small class="fw-bold">{{$data->name}}</small>
                </div>
                <div class="form-group">
                    <small>  Father/Husband Name </small> <br>
                    <small class="fw-bold"> {{$data->spouse_name}}</small>
                </div>
                {{-- <div class="form-group">
                    <small>  Mother </small> <br>
                    <small class="fw-bold">Ms mortuza</small>
                </div> --}}
               
                <div class="form-group">
                    <small>Word no: <span class="fw-bold">{{$data->wordno}}</span> </small> 
                </div>

                <div class="form-group">
                    <small>Union: <span class="fw-bold">{{$data->union}}</span> </small> 
                </div>

                <div class="form-group">
                    <small>Upazila: <span class="fw-bold"> {{$data->upazila}}</span> </small> 
                </div>

                <div class="form-group">
                    <small>Zila: <span class="fw-bold">{{$data->district}}</span> </small> 
                </div>

                <div class="form-group mt-1">
                    <small>  Date of birth:<span class="fw-bold"> {{$data->dob}} </span></small> 
                </div>
                <div class="form-group">
                    <small> NID no: <span class="fw-bold">{{$data->nid}}</span> </small> 
                </div>
            </div>
            <div class="col-md-2 d-flex align-items-center">
                
                  <div class="form-group">
                      <small class="fw-bold">
                        @if (isset($data->help_type_id))
                        {{\App\Models\HelpType::where('id',$data->help_type_id)->first()->name}}
                        @endif
                      
                      </small>
                  </div>
            </div>
        </div>


        <div class="row border-bottom pb-2">
            <div class="col-md-12 text-center">
                <small class="text-success">দুর্যোগ ব্যবস্থাপনা ও ত্রাণ মন্ত্রণালয়  </small>
            </div>
        </div>

    </div>


</body>

</html>