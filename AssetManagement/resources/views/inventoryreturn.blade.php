
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
                if( $invoicevalue ==""&&$invoiceno== ""&& $projectname=="" && $invoicedate =="")
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
                     }	
                 

                
               
                   
                       
                     /* do{

                      	
                      	if($invoicevalue=="")
                      {
                      echo"please fill invoicevalue";
                      //clean_all_processes();
                      break;
                      }
                      if($invoicevalue=="" &&$invoiceno== "")
                      {
                      	echo"please fill the invoice value and invoiceno.";
                      	//clean_all_processes();
                      	break;
                      }
                      if($invoicevalue=="" &&$invoiceno== ""&&$projecname=="")
                      {
                      	echo"please fill the invoice details and project name";
                      	//clean_all_processes();
                      	break;
                      }
                      if($invoicevalue=="" && $invoiceno== "" && $projecname=="" && $invoicedate=="")
                      {
                     	echo" All Invoice details are empty!!  "; 
                     	//clean_all_processes();
                     	break;	
                      }
                    } */


                      
                      /*if($invoicevalue=="" && $invoiceno== "" && $projectname=="" && $invoicedate=="")
                      {
                        echo" <h5>All Invoice details are empty!!  </h5>"; 
                      }
                      elseif($invoicevalue=="" &&$invoiceno== ""&&$projectname=="")
                       {
                        echo"<h5>please fill the invoice details and project name</h5>";
                        }
                        elseif($invoicevalue=="" &&$invoiceno== ""&&$invoicedate=="")
                        {
                          echo"<h5>please fill the invoice details and invoicedate</h5>";
                        }
                        elseif($invoicedate=="" &&$projectname== ""){
                          echo"<h5> Please fill invoicedate and projectname</h5>";
                        }
                        elseif($invoicevalue=="" &&$invoiceno== "")
                       {
                        echo"<h5>please fill the invoice value and invoiceno.</h5>";
                      }
                      elseif($invoicevalue=="")
                      {
                         echo"<h5>please fill invoicevalue</h5>";
                       
                      }*/
       
        ?>
                  

 
                   
                   
                     
                   <a href="{{ url('/inventory') }}"><h5>Go back to new page.</h5></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
