@extends('layouts.app')

@section('content')
 
 <form class="form-horizontal" role="form" method="POST" action="{{ url('/conferm') }}">

{!! csrf_field() !!}

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
                   <!--h5>Data inserted successfully</h5><br-->
                   <?php echo "<a href=\"javascript:history.go(-1)\"><h4 style = font-size:120%>Go back. <br> Review the inserted data.<br>Click on the submit button for submission.</h4></a>";?>
                   <!--div><button class='btn btn-primary' type='submit' value ='submit' type='submit'>Submit</button></div-->
                   <a href="{{ url('/home') }}"><h5></h5></a>
                </div>
            </div>
        </div>
    </div>
</div>
 <!--td><button class='btn btn-primary' type='submit' value ='submit' type='submit'>Submit</button></td-->

<script src="doozie/js/sweetalert.min.js"></script>
        @include('sweet::alert')


@endsection




