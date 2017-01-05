@extends('layouts.app')

@section('content')
<form class="form-horizontal" role="form" method="POST" action="{{ url('/submitmanualentry') }}">
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
    
    margin-left:150px;
    margin-top:50px;
    background-color:ALICEBLUE;
}

hg3 {
	font-weight: bold;
	margin-left:580px;
	font-size: 170%;
	color: #9ffea9;
	 margin-top:40px;
}

hg2 {
	font-weight: bold;
	font-size: 100%;
	margin-left:150px;
	color: LAVENDER;
}
m1{
	margin-left:150px;
}

</style>';




echo '<hg3>Manual Time Entry</hg3><br>';
echo "<table border=2 style=width:60%>
<tr>
	<th style=width:20%> Start Time* <br> dd-mm-yyyy hh:mm</th> 
	<th style=width:10%> Site</th> 
	<th style=width:30%> Description</th>
	
	 
 
</tr>";
	
	 
          echo "<tr>
          			

          			<td> <input type='Text' id=".  '"starttime"'.  " name=".'"starttime"'.  ' maxlength="27" size="22"/>'.
     				 "<img src=".'"newdt/images/cal.gif" '. 'onclick="javascript:NewCssCal('. "'starttime'".','. "'ddMMyyyy'".','."'dropdown'".','."true".','."'24'".')"'. 'style=cursor:pointer/>'.
  
	  		 		"<td>".Form::select('site', $site_options )." </td>
	  		 		<td ><input type='text' name='Description1' value='' size='70%'></td>

				</tr>"; 

		 
		  
    
echo "</table>";


echo "<table border=2 style=width:60%>
<tr>
	<th style=width:5%> End Time* <br> dd-mm-yyyy hh:mm</th>
	<th style=width:55%> Description</th>
	
	 
 
</tr>";
	
	 
          	echo "<tr>
          			

          		
 					 <td> <input type='Text' id=".  '"endtime"'.  " name=".'"endtime"'.  ' maxlength="27" size="22"/>'.
     				 "<img src=".'"newdt/images/cal.gif" '. 'onclick="javascript:NewCssCal('. "'endtime'".','. "'ddMMyyyy'".','."'dropdown'".','."true".','."'24'".')"'. 'style=cursor:pointer/>'.
    

	  		 		"<td ><input type='text' name='Description2' value='' size='60%'></td>

				</tr>"; 

		 
		  
    
echo "</table>";
echo "<br>";
echo "<td><m1><button class='btn btn-primary btn-lg' type='submit' value ='submit' type='submit'>Submit</button></m1></td>";



?>
 
</form>

@endsection