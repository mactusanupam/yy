@extends('layouts.app')

@section('content')

 <style>
        body 
        {
             font-family: 'Lato';

            color: black;
            background-color: #5959a6;

        }
         h5 
        {
            font-size: 200%;
            color: purple;
            font-weight: bold;
        }

        .fa-btn 
        {

        }


    </style>
<div class="container">
    <div class="row">
        <div class="col-md-15 col-md-offset-100">
            <div class="panel panel-default">
                <div class="panel-heading">Alert</div>

                <div class="panel-body">
                   <h5> Invalid selection of Date <br>
                    To Date must be greater than From Date</h5> <br>
                    <a href="{{ url('/AppraisalDetails') }}"><h5>OK</h5></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
