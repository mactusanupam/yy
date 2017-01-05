@extends('layouts.app')

@section('content')

<form class="form-horizontal" role="form" method="POST" action="{{ url('/submitsitetname') }}">
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
	margin-left:550px;
}
m1{
  margin-left:260px;
}
</style>';
echo '<hg1>Add New Project Site</hg1>';
echo "<table border=1 style=width:59%><tr>
<th> Project Site Name</th> 
</tr>";
    echo "<tr>
	  		 		<td >Site Name:  <input type='text' name='site_name' value='' size='100'></td>
				</tr>"; 


				

echo "</table>";
echo "<br>";
echo "<td><m1><button class='btn btn-primary btn-lg' type='submit' value ='submit' type='submit'>Submit</button></m1></td>";
 
?>
</form>

@endsection