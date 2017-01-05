@extends('layouts.app')

@section('content')
<form class="form-horizontal" role="form" method="POST" action="{{ url('/userpdfsubmit') }}">
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
    
    margin-left:440px;
    margin-top:50px;
   	background-color :ALICEBLUE;
}
 m1{
  margin-left:440px
}
hg1 {
	font-weight: bold;
	font-size: 170%;
  color: #9ffea9;
	margin-left:480px;
}
</style>';
echo '<hg1>Report Based on User Name</hg1>';

echo "<table border=2 style=width:35%>
<tr>
	<th style=width:1%> Select </th>
	<th style=width:4%> ID </th>
	<th style=width:30%> name</th> 
	
 </tr>";
	 	
	  for ($i = 0; $i <count($data) ; $i++)
    {
          echo "<tr>
          			<td> <input type='checkbox' name=".'"check_list'.$i.'"'."   ></td>
          			<td>".$data[$i]->id."</td>
					<td>".$data[$i]->name."</td>
					
				</tr>"; 
		  
    }

echo "</table>";
echo "<br>";
echo "<td><m1><button class='btn btn-primary btn-lg' type='submit' value ='submit' type='submit'>Submit</button></m1></td>";
 
?>
</form>
@endsection