@extends('layouts.app')

@section('content')
<form class="form-horizontal" role="form" method="POST" action="{{ url('/LeaveApproved') }}">
{!! csrf_field() !!}
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
	font-weight: bold;
	font-size: 170%;
	color: #9ffea9;
	margin-left:550px;
}

m1{
  margin-left:50px;
}


</style>';


echo '<hg1>Leave Approval</hg1>';

echo "<table border=2 style=width:90%>
<tr>
	<th style=width:5%> Select</th>
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
          			<td> <input type='checkbox' name=".'"check_list'.$i.'"'."   ></td>
          			<td>".$data[$i]->id."</td>
           			<td>".$data[$i]->Name."</td>
					<td>".$data[$i]->Leave_Type."</td>
					<td>".$data[$i]->Leave_From."</td>
	  		 		<td>".$data[$i]->Leave_To." </td>
	  		 		<td>".$data[$i]->Reason."</td>
	  		 		<td>".Form::select('Approval_Status'.$i.'', $approval_options )." </td>
				</tr>"; 

		  echo "<input type='hidden' name=".'"id'.$i.'"'." value = ".$data[$i]->id.">";
		  echo "<input type='hidden' name=".'"name'.$i.'"'." value = ".$data[$i]->Name.">";
		  echo "<input type='hidden' name=".'"Leave_Type'.$i.'"'." value = ".$data[$i]->Leave_Type.">";
		  echo "<input type='hidden' name=".'"Leave_From'.$i.'"'." value = ".$data[$i]->Leave_From.">";
		  echo "<input type='hidden' name=".'"Leave_To'.$i.'"'." value = ".$data[$i]->Leave_To.">";
	}

echo "</table>";
echo "<br>";
echo "<td><m1><button class='btn btn-primary btn-lg' type='submit' value ='submit' type='submit'>Submit</button></m1></td>";
 

?>
</form>
 <div class="btn-group btn-group-lg">
       <a  href="http://localhost:8000/EditLeaveValue" class="btn btn-primary">Edit</a>
 </div>

  @endsection