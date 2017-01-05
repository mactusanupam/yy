@extends('layouts.app')

@section('content')
<form class="form-horizontal" role="form" method="POST" action="{{ url('/generateservicelogreport') }}">
{!! csrf_field() !!}

<script src="{{asset('newdt/datetimepicker_css.js')}}"></script>
<?php
echo '<style>
th {
  height: 30px;
  width: 100px;
  font-weight: bold;
  text-align: center;
  background-color: orange;
}

table{
    
    margin-left:10%;
    margin-top:5%;
    background-color:ALICEBLUE;
}


hg1 {
  font-weight: bold;
  font-size: 170%;
	color: #9ffea9;
  margin-left: 35%;
  
}
m1{
	margin-left:140px;
}


</style>';


echo '<hg1>Service Log Report</hg1>';

echo "<table border=2 style=width:70%>
<tr>
	 
	<th style=width:25%> Report From </th> 
	<th style=width:25%> Report To </th>
	<th style=width:10%> Customer Name </th>
	<th style=width:10%> Project Name </th>
	
 
</tr>";
	$username = Auth::user()->name;
	$i = 0;
	
	echo "<tr>
	  		 		<td> <input type='Text' id=".  '"ReportFrom"'.  " name=".'"ReportFrom"'.  ' maxlength="35" size="30"/>'.
     				 "<img src=".'"newdt/images/cal.gif" '. 'onclick="javascript:NewCssCal('. "'ReportFrom'".','. "'ddMMyyyy'".','."'dropdown'".')"'. 'style=cursor:pointer/>'.
 
 					 "<td> <input type='Text' id=".  '"ReportTo"'.  " name=".'"ReportTo"'.  ' maxlength="35" size="30"/>'.
     				 "<img src=".'"newdt/images/cal.gif" '. 'onclick="javascript:NewCssCal('. "'ReportTo'".','. "'ddMMyyyy'".','."'dropdown'".')"'. 'style=cursor:pointer/>'.
    

	  		 		"<td>".Form::select('Customer_Name', $customer_options )." </td>".
	  		 		"<td>".Form::select('Project_Name', $Project_options )." </td>

				</tr></table>"; 

		
 echo "<br>";   
echo "<td><m1><button class='btn btn-primary btn-lg' type='submit' value ='submit' type='submit'>Submit</button></m1></td>";



?>
</form>

@endsection