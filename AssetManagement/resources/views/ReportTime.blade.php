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


    </style>
<div class="container">
    <div class="row">
        <div class="col-md-15 col-md-offset-100">
            <div class="panel panel-default">
                <div class="panel-heading">Alert</div>

                <div class="panel-body">
             

<?php
                /*if( $invoicevalue ==""&&$invoiceno== ""&& $projectname=="" && $invoicedate =="")
                    {
                      echo"<a href=\"javascript:history.go(-1)\"><h4 style = font-size:120%>Please fill all Invoice Details and Project Name!!<br>Go back to previous page.</h4></a>";
                     	echo" <h5> <h5>"; 
                     }elseif($projectname=="")
                     {
                      echo"<a href=\"javascript:history.go(-1)\"><h4 style = font-size:120%> Please fill Project Name.<br>Go back to previous page.</h4></a>";
                      //echo"<h5> Please fill Project Name.</h5>";
                     }
                else{ 
                      echo"<a href=\"javascript:history.go(-1)\"><h4 style = font-size:120%> Please fill all Invoice Details!!<br>Go back to previous page.</h4></a>";
                     	echo"<h5></h5>";
                     }	*/
                   if($fromdbdate == ""){
                    echo"<a href=\"javascript:history.go(-1)\"><h4 style = font-size:120%>Please insert Report to Date.<br>Go back to previous page.</h4></a>";
                   }  
                   else{
                    echo"<a href=\"javascript:history.go(-1)\"><h4 style = font-size:120%>Please insert Report From Date.<br>Go back to previous page.</h4></a>";
                   }
                 ?>

                     
                   <a href="{{ url('/inventory') }}"><h5>Go back to new page.</h5></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
