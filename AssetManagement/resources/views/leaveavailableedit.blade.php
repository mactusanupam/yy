@extends('layouts.app')

@section('content')
<form class="form-horizontal" role="form" method="POST" action="{{ url('/Submitavailableleave') }}">
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
    
    margin-left:480px;
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
  margin-left:480px;
}


</style>';


echo '<hg1>Update Available Leave</hg1>';

echo "<table border=2 style=width:32%>
<tr>
	<th style=width:2%> Select* </th>
	<th style=width:20%> Leave Type</th> 
	<th style=width:10%> Available Leave </th>
	
 
</tr>";
	$username = Auth::user()->name;
	for ($i = 0; $i < count($data) ; $i++)
    {
			echo "<tr>
							<td> <input type='checkbox' name=".'"check_list'.$i.'"'."   ></td>
							<td><input type='text' size='35px' id = 'leavetype' name=".'"leavetype'.$i.'"'." value='".$data[$i]->leavetype."'</td>
		           			<td><input type='text' id = 'availableleave' name=".'"availableleave'.$i.'"'." value='".$data[$i]->Available_Leave."'</td>
			  		 		
				  </tr>"; 
	}
echo "</table>";
echo "<br>";
echo "<td><m1><button class='btn btn-primary btn-lg' type='submit' value ='submit' type='submit'>Submit</button></m1></td>";


?>
</form>

@endsection