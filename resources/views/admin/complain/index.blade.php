@extends('admin.layouts.admin')
@section('content')
<style>
    table {
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
        border: 1px solid #ddd;
    }
    th, td {
        text-align: left;
        padding: 8px;
    }
    tr:nth-child(even){background-color: #f2f2f2}
</style>
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-dashboard"></i> Complain and Suggestions</h1>
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
                            <h3> All data</h3>
                        </div>
                        <div class="card-body">
                                <div class="container">
                                    <table class="table table-bordered table-hover" id="example">
                                        <thead>
                                        <tr>
                                          <th style="text-align: center">ID</th>
                                          <th style="text-align: center">Name</th>
                                          <th style="text-align: center">Phone</th>
                                          <th style="text-align: center">Message</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                              @foreach ($data as $key => $data)
                                            <tr>
                                              <td style="text-align: center">{{ $key + 1 }}</td>
                                              <td style="text-align: center">{{$data->name}}</td>
                                              <td style="text-align: center">{{$data->number}}</td>
                                              <td style="text-align: center">{{$data->description}}</td>
                                              
                                            </tr>
                                            @endforeach
                                          </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('script')
    <script>

        $(document).ready(function () {
            $('#example').DataTable();
        });

    </script>


    
    <script type="text/javascript">
        $(document).ready(function() {
            $("#complain").addClass('active');
        });
    </script>
@endsection
