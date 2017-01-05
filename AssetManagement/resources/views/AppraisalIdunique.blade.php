@extends('layouts.app')

@section('content')

 <style>
        body 
        {
            font-family: 'Lato';
            color: red;
           background-color: lightblue;

        }
         h1 
        {
            font-size: 170%;
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
                   <h1> Appraisal ID must be unique <br>
                   <a href="{{ url('/AppraisalDetails') }}"><h1>OK</h1></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
