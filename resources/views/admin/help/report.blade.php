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
                <h1><i class="fa fa-dashboard"></i> Pages</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            </ul>
        </div>
        <div id="addThisFormContainer">
            <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3>Type of help</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="ermsg">
                                </div>
                                <div class="container">
                                    <form action="{{route('admin.helpreportsearch')}}" method ="POST">
                                        @csrf
                                        <div>
                                            <label for="name">Name</label>
                                            <select name="helptype" id="helptype" class="form-control">
                                                <option value="">Select</option>
                                                @foreach ($data as $item)
                                                    
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <hr>
                                        
                                        <button type="submit" id="searchBtn" class="btn btn-primary form-control">Print</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                </div>
            </div>
        </div>
    </main>
@endsection
@section('script')
    <script>
        $(document).ready(function () {

            
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#helpreport").addClass('active');
        });
    </script>
@endsection
