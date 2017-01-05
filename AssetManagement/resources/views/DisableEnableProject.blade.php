@extends('layouts.app')

@section('content')
<form class="form-horizontal" role="form" method="POST" action="{{ url('/submitprojectstatus') }}">
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
    
    margin-left:300px;
    margin-top:10px;
    background-color:ALICEBLUE;
}

hg1 {
	font-weight: bold;
	font-size: 170%;
	color: #9ffea9;
	margin-left:550px;
}
m1{
	margin-left:300px;
}

</style>';


echo '<hg1>Enable/Disable Projects</hg1>';

echo "<table border=2 style=width:56%>;
<tr>
	<th style=width:4%> ID </th>
	<th style=width:50%> project_name</th> 
	<th style=width:1%> Status</th>  
 
</tr>";
	
	  for ($i = 0; $i < count($data) ; $i++)
    {
          echo "<tr><td>".$data[$i]->id."</td>
					<td>".$data[$i]->project_name."</td>
					<td> <input type='checkbox' name=".'"enable'.$i.'"'."  id=".'"enable'.$i.'"'."  > </td>
				</tr>"; 

			echo "<input type='hidden' name=".'"project_name'.$i.'"'." value = ".$data[$i]->project_name.">";
		  
    }
echo "</table>";
//echo "<br>";
echo "<td><m1><button class='btn btn-primary btn-lg' type='submit' value ='submit' type='submit'>Submit</button> </m1></td>";


//echo "</table>"
?>

<script type="text/javascript">
var j =0;
var jsndata = <?php echo json_encode($data, JSON_PRETTY_PRINT) ?>;
for(var j=0;j<jsndata.length;j++)
{

	if ((jsndata[j].Status).localeCompare('Enabled')==0)
	{
  		document.getElementById('enable'+j).checked = true;
	}
	else
	{
		document.getElementById('enable'+j).checked = false;
	}
 
}

</script>

</form>

@endsection