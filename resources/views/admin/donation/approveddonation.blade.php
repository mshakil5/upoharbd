@extends('admin.layouts.admin')
@section('content')

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Approved Donation</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
    </div>

    <div id="contentContainer">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        
                        <form  action="{{route('humanitarianAssistance.search')}}" method ="POST">
                            @csrf
                            <br>
                            <div class="container">
                                <div class="row">
                                    <div class="container-fluid">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <label for="date" class="col-form-label">From Date</label>
                                                <input type="date" class="form-control" id="fromDate" name="fromDate"/>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="date" class="col-form-label">To Date</label>
                                                <input type="date" class="form-control" id="toDate" name="toDate"/>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="helptype" class="col-form-label">Type of Help</label>
                                                <select name="helptype" id="helptype" class="form-control">
                                                    <option value="">All</option>
                                                    @foreach ($types as $type)
                                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            @if (Auth::user()->is_type == 1)
                                                
                                            <div class="col-md-2">
                                                <label for="union_admin" class="col-form-label">Union Admin</label>
                                                <select name="union_admin" id="union_admin" class="form-control">
                                                    <option value="">All</option>
                                                    @foreach ($users as $user)
                                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @endif


                                            
                                            <div class="col-md-1">
                                                <label for="union" class="col-form-label">Union</label>
                                                <select name="union" id="union" class="form-control">
                                                    <option value="">All</option>
                                                    <option value="শুহিলপুর">শুহিলপুর</option>
                                                    <option value="বাতাঘাসি">বাতাঘাসি</option>
                                                    <option value="মাধাইয়া">মাধাইয়া</option>
                                                    <option value="মহিচাইল">মহিচাইল</option>
                                                    <option value="কেরণখাল">কেরণখাল</option>
                                                    <option value="বাড়েরা">বাড়েরা</option>
                                                    <option value="এতবারপুর">এতবারপুর</option>
                                                    <option value="বরকইট">বরকইট</option>
                                                    <option value="মাইজখার">মাইজখার</option>
                                                    <option value="গল্লাই">গল্লাই</option>
                                                    <option value="দোল্লাই">দোল্লাই</option>
                                                    <option value="বরকরই">বরকরই</option>
                                                    <option value="জোয়াগ">জোয়াগ</option>
                                                    <option value="চান্দিনা পৌরসভা">চান্দিনা পৌরসভা</option>
                                                </select>
                                            </div>

                                            <div class="col-md-2">
                                                <label for="date" class="col-form-label"></label>
                                                <button type="submit" id="searchBtn" class="btn btn-primary form-control">Search</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="container">
                                <table class="table table-bordered table-hover" id="example">
                                    <thead>
                                    <tr>
                                        <th>ক্রমিকনং</th>
                                        <th>তারিখ</th>
                                        <th>নাম</th>
                                        <th>পিতা/স্বামীর নাম</th>
                                        <th>ঠিকানা</th>
                                        <th>ওয়ার্ড</th>
                                        <th>এন আই ডি</th>
                                        <th>পরিমান</th>
                                        <th>উপকার ভোগীর স্বাক্ষর </th>
                                        <th>QR Code</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($data as $key => $item)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$item->date}}</td>
                                                <td>{{ \App\Models\Beneficiary::where('id',$item->beneficiary_id)->first()->name }}</td>
                                                <td>{{ \App\Models\Beneficiary::where('id',$item->beneficiary_id)->first()->spouse_name }}</td>
                                                <td>{{ \App\Models\Beneficiary::where('id',$item->beneficiary_id)->first()->address }}</td>
                                                <td>{{ \App\Models\Beneficiary::where('id',$item->beneficiary_id)->first()->wordno }}</td>
                                                <td>{{ \App\Models\Beneficiary::where('id',$item->beneficiary_id)->first()->nid }}</td>
                                                <td>{{ $item->amount }}</td>
                                                <td> </td>
                                                <td>{!! QrCode::size(50)->generate(route('admin.beneficiary.print',$item->beneficiary_id)) !!}  </td>
                                            </tr>
                                        @empty
                                            <h3>No post found.</h3>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


</main>

@endsection
@section('script')

<script type="text/javascript">
    $(document).ready(function() {
        $("#humanitarianAssistance").addClass('active');
    });
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>

@endsection