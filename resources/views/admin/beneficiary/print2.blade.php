
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html">
    <title>Beneficiary</title>
    <link href="{{ asset('assets/css/bootstrap-5.1.3min.css')}}" rel="stylesheet">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>
        setTimeout(function () {
            window.print();
        }, 800);
    </script>
    <style>
        @media print {
            
            @page {
                margin: 100px auto; /* imprtant to logo margin */
            }

            html, body {
                margin: 50 0 0 0;
                padding: 0;
                font-size: 12px;
                font-family: Arial, Helvetica;
            }

            #printContainer {
                width: 250px;
                margin: auto;
                /*text-align: justify;*/
            }

            .text-center {
                text-align: center;
            }
            .text-right {
                text-align: right;
            }

            /* body{
                font-family: Arial, Helvetica;
            } */
        }
    </style>
    
</head>

<body>


    
    <main class="app-content">
        <div class="app-title">
          <div>
            <h1><i class="fa fa-file-text-o"></i> Beneficiary</h1>
          </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
          <div class="col-md-6">
            <div class="tile">
              <section class="invoice">
                
                <div class="row invoice-info">
                    <div class="col-6">
                        @if (isset($data->image))
                            <img src="{{asset('images/'.$data->image)}}" height="200px" width="180px" alt="">
                        @endif
                    </div>
                  
                    <div class="col-6">
                        Name: <br>
                        <b>{{$data->name}}</b> <br>
                        Spouse Name: <br>
                        <b>{{$data->spouse_name}}</b> <br>
                        Date of birth: <br>
                        <b>{{$data->dob}}</b> <br>
                        
                    </div>
                </div>
                <div class="row">
                  <div class="col-12 table-responsive">
                    <table class="table table-striped">
                      <tbody>
                        <tr>
                          <td>NID</td>
                          <td>{{$data->nid}}</td>
                        </tr>
                        <tr>
                          <td>Birth Registration</td>
                          <td>{{$data->bid}}</td>
                        </tr>
                        <tr>
                          <td>Address</td>
                          <td>{{$data->wordno}} {{$data->union}} {{$data->upazila}} {{$data->district}}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                
              </section>
            </div>
          </div>
          <div class="col-md-3"></div>
        </div>
      </main>

</body>
</html>

