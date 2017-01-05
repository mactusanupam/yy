@extends('layouts.app')

@section('content')
<form class="form-horizontal" role="form" method="POST" action="{{ url('/empmgrrelationshipsubmit') }}">
{!! csrf_field() !!}
<?php



echo '<style>
th {
  height: 30px;
  width: 100px;
  font-weight: bold;
  text-align: center;
  background-color: orange;
  font-size: 150%;
}

table{
    
    margin-left:260px;
    margin-top:50px;
    background-color :ALICEBLUE;
}

hg1 {
	font-weight: bold;
	font-size: 170%;
  color: #9ffea9;
	margin-left:360px;
}
m1{
  margin-left: 260px;
}
</style>';
echo '<hg1>Report Based on Project Name and User Name</hg1>';
echo "<table border=2 style=width:61%>
<tr>
	<th style=width:1%> User Name </th>
	<th style=width:20%> Primary Manager </th>
	<th style=width:20%>Secondary Manager-1</th>
	<th style=width:20%>Secondary Manager-2</th> 
 </tr>";
	 	
	  
          echo "<tr>
               <td>".Form::select('username', $user_options )."</td> 
               <td>".Form::select('primary_mgr', $mgr_options )."</td>
               <td>".Form::select('scecondary_mgr1', $mgr_options )." </td>
               <td>".Form::select('scecondary_mgr2', $mgr_options )." </td>

					     
</tr>"; 
	
echo "</table>";
echo "<br>";
echo "<td><m1><button class='btn btn-primary btn-lg' type='submit' value ='submit' type='submit'>Submit</button></m1></td>";

//echo "</table>"
?>
</form>
@endsection