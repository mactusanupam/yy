@extends('layouts.app')

@section('content')
<form class="form-horizontal" role="form" method="POST" action="{{ url('/pdfgenerator') }}">
{!! csrf_field() !!}
<?php
echo "<table border 1><tr>

<th> ID </th><th>
 project_name</th> 
 <th> project_start</th> 
 <th> project_end</th>  
 
 </tr>";
	 	/*  foreach($data as $row)
	  {
	  	 
	  		 echo "<tr>
	  		 <td>".$row->id."</td>
	  		 <td>".$row->project_name."</td>
	  		 <td> <input type='text' name='pr1'></td>
	  		 <td> <input type='text' name='pr2'></td>
	  		 <td><button type='submit' value='Submit'>Submit</button></td>
	  		 </tr>";

	  	
	  }*/
	
echo "<td><button type='submit' value ='submit' type='submit'>Generate Report</button> </td>";


echo "</table>"
?>
</form>
@endsection

