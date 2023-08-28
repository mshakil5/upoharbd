<!DOCTYPE html>

<html>
<head>
    <!-- CSRF Token -->
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>হেল্প টাইপ রিপোর্ট</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <style type="text/css">
    html, body {
                margin: 50 0 0 0;
                padding: 0;
                font-size: 12px;
                font-family: Arial, Helvetica;
            }

        @font-face{
            font-family: "My-custom-font";
            src: url(kalpurush.ttf) format('truetype');
        }
        .custom-font{
            font: normal 20px/18px kalpurush;
        }

  </style>

  <script>
    setTimeout(function () {
        window.print();
    }, 800);
</script>

</head>

<body style="position: relative;" class="custom-font">

  <h3 style="text-align: center">গণপ্রজাতন্ত্রী বাংলাদেশ সরকার</h3>
  <h4 style="text-align: center">দুর্যোগ ব্যবস্থাপনা ও ত্রাণ মন্ত্রণালয় </h4>
  <h5 style="text-align: center">মানিবক সহায়তা কর্মসূচি </h5>
  <h6 style="text-align: center">সাহায্যের ধরণ: {{$helpname}}</h6>
  <hr>
    <table style="width:100%">
        <tbody>
            <tr>
                <td>উপজেলা: চান্দিনা</td>
                <td style="width: 5%"></td>
                <td style="width: 15%"></td>
                <td style="width: 5%"></td>
                <td style="width: 5%"> </td>
                <td style="width: 20%">জেলা:কুমিল্লা</td>
            </tr>
        </tbody>
    </table>
  <hr>

  <table width="100%" style="  border: 1px solid;  border-collapse: collapse; margin-bottom: 10px;">
    <thead>
        <tr>
            <th style="border:1px solid; padding:5px; font-size: 12px;">ক্রমিক নং</th>
            <th style="border:1px solid; padding:5px; font-size: 12px;">ইউনিয়ন/পৌরসভা</th>
            <th style="border:1px solid; padding:5px; font-size: 12px;">উপভোগকারীর সংখ্যা</th>
            <th style="border:1px solid; padding:5px; font-size: 12px;">সহায়তার পরিমান </th>
            <th style="border:1px solid; padding:5px; font-size: 12px;">মন্তব্য </th>
        </tr>
    </thead>
    <tbody>

        @foreach ($data as $key => $item)
        @php
            $count = \App\Models\Donation::where('union_name',$item->union_name)->where('help_type_id',$helptypeid)->count();
        @endphp
        <tr>
            <td style="border:1px solid; padding:5px; font-size: 12px;">{{$key + 1}}</td>
            <td style="border:1px solid; padding:5px; font-size: 12px;">{{$item->union_name}}</td>
            <td style="border:1px solid; padding:5px; font-size: 12px;">{{$count}}</td>
            <td style="border:1px solid; padding:5px; font-size: 12px;">{{$item->total_amnt}}</td>
            <td style="border:1px solid; padding:5px; font-size: 12px;"> </td>
        </tr>
        @endforeach
    </tbody>
  </table>

</body>
</html>