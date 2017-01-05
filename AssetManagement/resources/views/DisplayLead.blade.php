@extends('layouts.app')

@section('content')

<form class="form-horizontal" role="form" method="POST" action="{{ url('/submitlead') }}">
{!! csrf_field() !!}
<script src="{{asset('newdt/datetimepicker_css.js')}}"></script>



<style>

hg1 {
	font-weight: bold;
	font-size: 170%;
  color: #9ffea9;

}

m1{
  margin-left:100px;
}

table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    background-color: #f1f1c1;
    margin-top:50px;
    margin-left:50px;
    margin-right:50px;
}
th, td {
    padding: 5px;
    text-align: left;    
}



</style>


<?php  

    echo "<table> <tr>  <th colspan='7'><center>Project Leads Display </center></th> </tr>
    <tr> <th style=width:8% >  Lead ID   </th>  <th style=width:8% > Status </th>  <th style=width:40% > Desc. </th> <th style=width:8% > Est date </th>  <th style=width:5% > Conv Prob. </th>  <th style=width:5% > Est Value (Rs) </th> <th style=width:10% >  Customer name   </th></tr>"   ;
  
    for ($i = 0; $i < count($data) ; $i++)
    {
          echo 
          "<tr><td>".$data[$i]->LeadID."</td>
               <td>".$data[$i]->LeadStatus."</td>
               <td>".$data[$i]->LeadDescription."</td>
               <td>".$data[$i]->LeadEstimatedStartDate."</td>
               <td>".$data[$i]->LeadProbability."</td>
               <td>".$data[$i]->LeadEstimatedValue."</td>
               <td>".$data[$i]->Customer_Name."</td>
          
          </tr>"; 
          
    }
     
    echo "</table>";

 
?>

<br>
<m1>
 <div class="btn-group btn-group-lg">
  <a href="http://localhost:8000/lead" class="btn btn-primary">Create Lead </a>
  <a href="http://localhost:8000/lead_value" class="btn btn-primary">Lead Value</a>
  <a href="http://localhost:8000/lead_progress" class="btn btn-primary">Lead Progress</a>
  <a href="http://localhost:8000/lead_age" class="btn btn-primary">Est. Start Date </a>
</div>
<m1>
@endsection