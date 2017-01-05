@extends('layouts.app')

@section('content')
<form class="form-horizontal" role="form" method="POST" action="{{ url('/ApplyLeaveSubmit') }}">
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
    
    margin-left:50px;
    margin-top:50px;
    background-color:ALICEBLUE;
}

hg1 {
	color: #9ffea9;
	font-weight: bold;
	font-size: 170%;
	margin-left:550px;
} 
m1{
  margin-left:50px;
}


</style>';


echo '<hg1>Leave Apply/Approval</hg1>';

echo "<table border=2 style=width:90%>
<tr>
	<th style=width:12%> Name</th> 
	<th style=width:18%> Leave Type</th> 
	<th style=width:20%> Leave From <br> dd-mm-yyyy</th> 
	<th style=width:20%> Leave To <br> dd-mm-yyyy</th>
	<th style=width:20%> Reason </th>  
	
 
</tr>";
	$username = Auth::user()->name;
	$i = 0;
	echo "<tr>
           			<td>".$username."</td>
           			<td>".Form::select('leavetype', $leave_options ). " </td>".

					//<td> <input type='text' name=".'"leavefrom"'." size='37' ></td>
	  		 		//<td> <input type='text' name=".'"leaveto"'." size='37'></td>


	  		 		 "<td> <input type='Text' id=".  '"leavefrom"'.  " name=".'"leavefrom"'.  ' maxlength="35" size="25"/>'.
     				 "<img src=".'"newdt/images/cal.gif" '. 'onclick="javascript:NewCssCal('. "'leavefrom'".','. "'ddMMyyyy'".','."'dropdown'".')"'. 'style=cursor:pointer/>'.
 
 					 "<td> <input type='Text' id=".  '"leaveto"'.  " name=".'"leaveto"'.  ' maxlength="35" size="25"/>'.
     				 "<img src=".'"newdt/images/cal.gif" '. 'onclick="javascript:NewCssCal('. "'leaveto'".','. "'ddMMyyyy'".','."'dropdown'".')"'. 'style=cursor:pointer/>'.
	  		 		"<td> <input type='text' name=".'"Reason"'." size='56'></td>
	  		 		
		  </tr>"; 
//echo "<td><button type='submit' value ='submit' type='submit'>Submit</button> </td>";


//echo "</table>";
echo "</table>";
echo "<br>";
echo "<td><m1><button class='btn btn-primary btn-lg' type='submit' value ='submit' type='submit'>Submit</button></m1></td>";

echo "<table border=2 style=width:90%>
<tr>
	<th style=width:5%> Id</th>
	<th style=width:5%> Name</th> 
	<th style=width:10%> Leave Type</th> 
	<th style=width:20%> Leave From</th> 
	<th style=width:20%> Leave To</th>
	<th style=width:20%> Reason </th>
	<th style=width:10%> Approval Status </th>    
	
 
</tr>";


 for ($i = 0; $i < count($data) ; $i++)
    {
          echo "<tr>
          			<td>".$data[$i]->id."</td>
           			<td>".$data[$i]->Name."</td>
					<td>".$data[$i]->Leave_Type."</td>
					<td>".$data[$i]->Leave_From."</td>
	  		 		<td>".$data[$i]->Leave_To." </td>
	  		 		<td>".$data[$i]->Reason."</td>
	  		 		<td>".$data[$i]->Approval_Status."</td>
				</tr>"; 
	}


echo "</table>";
?>
</form>

@endsection