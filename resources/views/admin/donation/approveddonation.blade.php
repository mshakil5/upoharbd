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
                                            <div class="col-md-3">
                                                <label for="date" class="col-form-label">From Date</label>
                                                <input type="date" class="form-control" id="fromDate" name="fromDate" required/>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="date" class="col-form-label">To Date</label>
                                                <input type="date" class="form-control" id="toDate" name="toDate" required/>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="date" class="col-form-label">Type of Help</label>
                                                <select name="helptype" id="helptype" class="form-control">
                                                    <option value="">All</option>
                                                    @foreach ($types as $type)
                                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                                    @endforeach
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
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($data as $key => $item)
                                            <tr>
                                                <td>{{$key++}}</td>
                                                <td>{{$item->date}}</td>
                                                <td>{{ \App\Models\Beneficiary::where('id',$item->beneficiary_id)->first()->name }}</td>
                                                <td>{{ \App\Models\Beneficiary::where('id',$item->beneficiary_id)->first()->spouse_name }}</td>
                                                <td>{{ \App\Models\Beneficiary::where('id',$item->beneficiary_id)->first()->address }}</td>
                                                <td>{{ \App\Models\Beneficiary::where('id',$item->beneficiary_id)->first()->wordno }}</td>
                                                <td>{{ \App\Models\Beneficiary::where('id',$item->beneficiary_id)->first()->nid }}</td>
                                                <td>{{ $item->amount }}</td>
                                                <td> </td>
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