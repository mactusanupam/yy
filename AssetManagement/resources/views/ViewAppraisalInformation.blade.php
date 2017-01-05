@extends('layouts.app')

@section('content')
<form class="form-horizontal" role="form" method="POST" action="{{ url('/moredetailsofuser') }}">
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
    
    margin-left:100px;
    margin-top:3%;
    background-color:ALICEBLUE;
}

hg1 {
    font-weight: bold;
    font-size: 170%;
  color: #9ffea9;
    margin-left:500px;
}

hg2 {
    font-weight: bold;
    font-size: 100%;
    margin-left:100px;
}

</style>';




echo "<table border=2 style=width:86%>
<tr>
    <th style=width:1%> Select </th>
    <th style=width:1%> ID</th>
    <th style=width:4%>User Name</th>
    <th style=width:20%> Project Name</th> 
    <th style=width:10%> Appraisal ID</th> 
    <th style=width:20%> Appraisal Start</th>
    <th style=width:20%> Appraisal End</th> 
    <th Style=width:10%> Details</th> 
 
</tr>";
    
      for ($i = 0; $i < count($masterdata) ; $i++)
    {
          echo "<tr>
                    <td> <input type='checkbox' name=".'"check_list'.$i.'"'."   ></td>
                    <td>".$masterdata[$i]->id."</td>
                    <td>".$masterdata[$i]->User_Name."</td>
                    <td>".$masterdata[$i]->Project_Name."</td>
                    <td>".$masterdata[$i]->Appraisal_ID."</td>
                    <td>".$masterdata[$i]->Appraisal_period_start."</td>
                    <td>".$masterdata[$i]->Appraisal_period_end."</td>
                    <td><button type='submit' value ='submit' type='submit'>More Details</button> </td>


                </tr>"; 

             // echo  "<tr>  <td><button type='submit' value ='submit' type='submit'>Submit</button> </td></tr>";

        echo "<input type='hidden' name=".'"project_name'.$i.'"'." value = ".$masterdata[$i]->Project_Name.">";
        echo "<input type='hidden' name=".'"User_Name'.$i.'"'." value = ".$masterdata[$i]->User_Name.">";
        
          
    }

echo "</table>";

?>
 
</form>

@endsection