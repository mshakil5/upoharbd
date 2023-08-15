<!DOCTYPE html>

<html>
<head>
    <!-- CSRF Token -->
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>মাস্টাররোল</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <style type="text/css">
    body {
            margin: 0;
            font-size: 85%;
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
  <h6 style="text-align: center">সাহায্যের ধরণ: সকল</h6>
  <hr>
    <table style="width:100%">
        <tbody>
            <tr>
                <td>ইউনিয়ন/পৌরসভা:</td>
                <td style="width: 15%"></td>
                <td style="width: 15%">উপজেলা:</td>
                <td style="width: 15%"></td>
                <td style="width: 15%">জেলা:</td>
                <td style="width: 15%"></td>
            </tr>
        </tbody>
    </table>
  <hr>

  <table width="100%" style="  border: 1px solid;  border-collapse: collapse; margin-bottom: 10px;">
    <thead>
        <tr>
            <th style="border:1px solid; padding:5px; font-size: 12px;">ক্রমিক নং</th>
            <th style="border:1px solid; padding:5px; font-size: 12px;">নাম</th>
            <th style="border:1px solid; padding:5px; font-size: 12px;">পিতা/স্বামীর নাম</th>
            <th style="border:1px solid; padding:5px; font-size: 12px;">ঠিকানা</th>
            <th style="border:1px solid; padding:5px; font-size: 12px;">ওয়ার্ড</th>
            <th style="border:1px solid; padding:5px; font-size: 12px;">এন আই ডি</th>
            <th style="border:1px solid; padding:5px; font-size: 12px;">পরিমান</th>
            <th style="border:1px solid; padding:5px; font-size: 12px;">উপকার ভোগীর স্বাক্ষর</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($data as $key => $item)
        @php
            $benDtls = \App\Models\Beneficiary::where('id',$item->beneficiary_id)->first();
        @endphp
        <tr>
            <td style="border:1px solid; padding:5px; font-size: 12px;">{{$key + 1}}</td>
            <td style="border:1px solid; padding:5px; font-size: 12px;">{{$benDtls->name}} </td>
            <td style="border:1px solid; padding:5px; font-size: 12px;">{{$benDtls->spouse_name}}</td>
            <td style="border:1px solid; padding:5px; font-size: 12px;">{{$benDtls->address}}</td>
            <td style="border:1px solid; padding:5px; font-size: 12px;">{{$benDtls->wordno}}</td>
            <td style="border:1px solid; padding:5px; font-size: 12px;">{{$benDtls->nid}} <br> {{$benDtls->bid}}</td>
            <td style="border:1px solid; padding:5px; font-size: 12px;">{{$item->amount}} <br> {{$item->product}}</td>
            <td style="border:1px solid; padding:5px; font-size: 12px;"> </td>
        </tr>
        @endforeach
    </tbody>
  </table>

</body>
</html>