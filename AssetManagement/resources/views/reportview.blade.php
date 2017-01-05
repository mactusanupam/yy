<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>





                                    <table >
                                        <tr><h3> Mactus Technology Solutions <br> Service Log Report</h3></tr>       
                                        
                                    
                                    <?php
                                     "<tr> Printed By:".$current."<br> Print Date:".$todaydate."<br></tr>";
                                      ?>
                                    </table>


                        <table border=1 style='.'"border-collapse:collapse">
                        <tr>
                            <th> ID </th>
                            <th> Invoice No. <br>call recieved</th> 
                            <th> Invoice<br>Date</th> 
                            <th> Project<br>Name</th>
                            <th> Item</th>
                            <th> Quantity</th>
                            
                            
                        </tr>';

<?php
       /* ($data as $row)
         {
              $allComplete = $allComplete.
                            "<tr>
                                    <td>".$row->id."</td>
                                    <td>".$row->invoice_no."</td>
                                    <td>".$row->invoice_Date."</td>
                                    <td>".$row->projec_name."</td>
                                    <td>".$row->Item."</td>
                                    <td>".$row->Quantity."</td>

                            </tr>";
        }

         

        $allComplete =$allComplete ."</table></body>";
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($allComplete)->setPaper('a4')->setOrientation('landscape');
        return $pdf->stream() ;
        //return view('PdfView')->with('data',$data); */
       ?>
    }
       }
        
    }
    </body>
    </html>


    @extends('layouts.app')
@section('content')


<div width= 10%>

                    <h5>Please insert all Details of Items!!</h5><br>
                    
                   <a href="{{ url('/inventory') }}"><h5>OK</h5></a>
                </div>

<script src="doozie/js/sweetalert.min.js"></script>

 @include('sweet::alert')

 @endsection
 <?php
/*  on controller method add this code for alert msg:

 1//Session::flash('message', $error_msg); 
   //Session::flash('alert-class', 'alert-warning'); 


2   //$sms=  "quantity more than store quantity.";
     Alert::message("quantity more than store quantity.")->persistent('OK!');

     return view('reportsubmit');   

 on reportsubmit view must be add :-
   
  1 @if(Session::has('message'))
      <div class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</div>
    @endif
 
  2<script src="doozie/js/sweetalert.min.js"></script>

   @include('sweet::alert')

  ------------------------------------------------------------------------------------------------------------------------------       

   
                    /*else{
                      Alert::message(" oops! total quantity less than store quantity.")->persistent('OK!');
                      return view('lessitem');
                      //
                    }
                   

*/
                    ?>