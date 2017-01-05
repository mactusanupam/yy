@extends('layouts.app')

@section('content')
<form class="form-horizontal" role="form" method="POST" action="{{ url('/projectpdfsubmit') }}">
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
    margin-top:20px;
    background-color :ALICEBLUE;
}

hg1 {
	font-weight: bold;
	font-size: 170%;
  color: #9ffea9;
	margin-left:360px;
}
m1{
  margin-left:260px;
}
</style>';
echo '<hg1>Report Based on Project Name and User Name</hg1>';
echo "<table border=2 style=width:58%>
<tr>
	<th style=width:1%> Select </th>
	<th style=width:4%> ID </th>
	<th style=width:50%> Project Name</th>
	<th style=width:4%> User Name </th> 
 </tr>";
	 	
	  for ($i = 0; $i < count($data) ; $i++)
    {
          echo "<tr><td> <input type='checkbox' name=".'"check_list'.$i.'"'."   ></td>
          			
           		 <td>".$data[$i]->id."</td>
					     <td>".$data[$i]->project_name."</td>
					     <td>".Form::select('username'.$i.'', $user_options )."</td> 
				</tr>"; 
		  
    }

echo "</table>";
echo "<br>";
echo "<td><m1><button class='btn btn-primary btn-lg' type='submit' value ='submit' type='submit'>Submit</button></m1></td>";

?>
</form>
@endsection