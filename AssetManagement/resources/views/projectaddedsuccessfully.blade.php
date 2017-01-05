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
                  <h5> New Project is added successfully. </h5><br>
                  <?php echo "<a href=\"javascript:history.go(-1)\">Go back to previous page.</a>";?>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
