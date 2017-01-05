@extends('layouts.app')

@section('content')
<form class="form-horizontal" role="form" method="POST" action="{{ url('/submit1') }}">
{!! csrf_field() !!}

<script src="{{asset('newdt/datetimepicker_css.js')}}"></script>
<style type="text/css">

    table{
        text-align: center;
   }

  .navbar-static-top {

      z-index: 0;
    }



<?php

echo '<style>
th {
  height: 30px;
  width: 100px;
  font-weight: bold;
  text-align: center;
  background-color: orange;
}

hg1 {
	font-weight: bold;
	margin-left:580px;
	font-size: 170%;
	color: #9ffea9;
}

hg2 {
	font-weight: bold;
	font-size: 100%;
	margin-left:150px;
	color: LAVENDER;
}

table{
    
    margin-left:150px;
    margin-top:10px;
    background-color:ALICEBLUE;
    width:80%
}


m1{
	margin-left:150px;
}

</style>';



//echo'<hg1>"<img src='"this_pic.jpg"'></hg1><br>"';
echo '<hg1>List of the Projects</hg1><br>';
echo '<hg2>Select check box, Enter Project Start and Project End Time</hg2>';
echo "<table border=2 >
<tr>
	<th style=width:3%> Select </th>
	<th style=width:5%> ID </th>
	<th style=width:25%> Project Name</th> 
	<th style=width:20%> Project Start* <br> dd-mm-yyyy hh:mm</th> 
	<th style=width:20%> Project End* <br> dd-mm-yyyy hh:mm</th>
	<th style=width:6%> Site</th>  
 
</tr>";
	
	  for ($i = 0; $i < count($data) ; $i++)
    {
          echo "<tr><td> <input type= 'checkbox' name=".'"check_list'.$i.'"'."   ></td>".
           			"<td>".$data[$i]->id."</td>".
					"<td>".$data[$i]->project_name."</td>".
					

					 "<td> <input type='Text' id=".  '"projectstart'.$i.'"'.  " name=".'"projectstart'.$i.'"'.  ' maxlength="32" size="27"/>'.
     				 "<img src=".'"newdt/images/cal.gif" '. 'onclick="javascript:NewCssCal('. "'projectstart".$i."'".','. "'ddMMyyyy'".','."'dropdown'".','."true".','."'24'".')"'. 'style=cursor:pointer/>'.
 
 					 "<td> <input type='Text' id=".  '"projectend'.$i.'"'.  " name=".'"projectend'.$i.'"'.  ' maxlength="40" size="35"/>'.
     				 "<img src=".'"newdt/images/cal.gif" '. 'onclick="javascript:NewCssCal('. "'projectend".$i."'".','. "'ddMMyyyy'".','."'dropdown'".','."true".','."'24'".')"'. 'style=cursor:pointer/>'.
    

	  		 		"<td>".Form::select('site'.$i.'', $user_options )." </td>

				</tr>"; 

		echo "<input type='hidden' name=".'"project_name'.$i.'"'." value = ".$data[$i]->project_name.">";
		echo "<input type='hidden' name=".'"id'.$i.'"'." value = ".$data[$i]->id.">";
		
		  
    }
echo "</table>";
echo "<br>";
echo "<td><m1><button class='btn btn-primary btn-lg' type='submit' value ='submit' type='submit'>Submit</button></m1></td>";



?>
 
</form>

@endsection