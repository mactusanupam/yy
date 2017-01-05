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
            font-size: 180%;
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
                    <h5>Invalid selection of Leave Type <br>
                    select leave type one among below list<br>
                    1. CL (Casual Leave)<br>
                    2. ML (Medical Leave)<br>
                    3. EL <br></h5>
                    <a href="{{ url('/ApplyLeave') }}"><h5>OK</h5></a> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
