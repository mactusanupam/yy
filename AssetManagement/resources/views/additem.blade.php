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
            color: green;
            font-weight: bold;
        }

        .fa-btn 
        {

        }
view

    </style>
<div class="container">
    <div class="row">
        <div class="col-md-15 col-md-offset-100">
            <div class="panel panel-default">
                <div class="panel-heading">Alert</div>

                <div class="panel-body">
                <h5></h5><br>

               <?php echo "<a href=\"javascript:history.go(-1)\"><h4 style = font-size:120%> Data inserted successfully!!<br>Go back to previous page.<h4></a>";?>
                   <a href="{{ url('/additemview') }}"><h5>Go back to new page.</h5></a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
