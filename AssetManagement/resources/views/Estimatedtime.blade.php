@extends('layouts.app')

@section('content')

<form id="myform"  class="form-horizontal" role="form" method="POST" action="{{ url('/submitestimatedtime') }}">
{!! csrf_field() !!}
<script src="{{asset('newdt/datetimepicker_css.js')}}"></script>

<?php
echo '<style>

hg1 {
    font-weight: bold;
    font-size: 170%;
    color: #9ffea9;
    margin-left:600px;
}

 

m1{
  margin-left:4%;

}
m2{
  margin-left:8%;
}

table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    background-color: #f1f1c1;
    margin-top:10px;
    margin-left:50px;
}
th, td {
    padding: 5px;
    text-align: left;    
}
.foo {
    width: 500px;
}

b1{
    font-weight: bold;
}


</style>';
echo "<table border=2 style=width:45%>
<tr>
  <th style=width:1%> Select </th>
  <th style=width:4%> ID </th>
  <th style=width:30%> Project Name</th> 
  <th style=width:10%> Estimated Days</th>  
</tr>";

   for ($i = 0; $i < count($data) ; $i++)
    {
          echo "<tr><td> <input type='checkbox' name=".'"check_list'.$i.'"'."   ></td>".
                "<td>".$data[$i]->id."</td>".
          "<td>".$data[$i]->project_Name."</td>".
          
          

            
    
            "<td><input type='text' name=".'"Estimated_Time'.$i.'"'." id =".'"Estimated_Time'.$i.'"'." disabled value=".$data[$i]->Estimated_Time."> </td>
            

        </tr>"; 

    echo "<input type='hidden' name=".'"project_name'.$i.'"'." value = '".$data[$i]->project_Name."'>";
    echo "<input type='hidden' name=".'"id'.$i.'"'." value = ".$data[$i]->id.">";
    echo "<input type='hidden' name=".'"Estimated_Time'.$i.'"'." value = ".$data[$i]->Estimated_Time.">";
      
    }
echo "</table>";
?>
<td colspan="2" style="text-align:left;"> <a href="{{"javascript:history.go(-1)"}}"  button class="btn btn-primary" type="button">Go Back to Previous Page</a></button></td>
<?php //echo "<a href=\"javascript:history.go(-1)\">Go back to previous page.</a>";?>
  
<!--td><m1><button class='btn btn-primary btn-lg' onclick="goal_enable_before_submit()">Submit</button> </m1></td>

</form>


<!td><m1><button class='btn btn-primary btn-lg'  onclick = "goal_enable()" >Edit</button></m1></td-->


<script>
    function goal_enable()
    {
        document.getElementById("Estimated_Time0").disabled =false;
        document.getElementById("Estimated_Time1").disabled =false;
        document.getElementById("Estimated_Time2").disabled =false;
        document.getElementById("Estimated_Time3").disabled =false;
        document.getElementById("Estimated_Time4").disabled =false;
        document.getElementById("Estimated_Time5").disabled =false;
        document.getElementById("Estimated_Time6").disabled =false;
        document.getElementById("Estimated_Time7").disabled =false;
        document.getElementById("Estimated_Time8").disabled =false;
        document.getElementById("Estimated_Time9").disabled =false;
        document.getElementById("Estimated_Time10").disabled =false;
        document.getElementById("Estimated_Time11").disabled =false;
        document.getElementById("Estimated_Time12").disabled =false;
        document.getElementById("Estimated_Time13").disabled =false;
        document.getElementById("Estimated_Time14").disabled =false;
        document.getElementById("Estimated_Time15").disabled =false;
        document.getElementById("Estimated_Time16").disabled =false;
        document.getElementById("Estimated_Time17").disabled =false;
        document.getElementById("Estimated_Time18").disabled =false;
        document.getElementById("Estimated_Time19").disabled =false;
        document.getElementById("Estimated_Time20").disabled =false;
        document.getElementById("Estimated_Time21").disabled =false;
        document.getElementById("Estimated_Time22").disabled =false;
        document.getElementById("Estimated_Time23").disabled =false;
         
    }

    
    function goal_enable_before_submit()
    {
         document.getElementById("Estimated_Time0").disabled =false;
        document.getElementById("Estimated_Time1").disabled =false;
        document.getElementById("Estimated_Time2").disabled =false;
        document.getElementById("Estimated_Time3").disabled =false;
        document.getElementById("Estimated_Time4").disabled =false;
        document.getElementById("Estimated_Time5").disabled =false;
        document.getElementById("Estimated_Time6").disabled =false;
        document.getElementById("Estimated_Time7").disabled =false;
        document.getElementById("Estimated_Time8").disabled =false;
        document.getElementById("Estimated_Time9").disabled =false;
        document.getElementById("Estimated_Time10").disabled =false;
        document.getElementById("Estimated_Time11").disabled =false;
        document.getElementById("Estimated_Time12").disabled =false;
        document.getElementById("Estimated_Time13").disabled =false;
        document.getElementById("Estimated_Time14").disabled =false;
        document.getElementById("Estimated_Time15").disabled =false;
        document.getElementById("Estimated_Time16").disabled =false;
        document.getElementById("Estimated_Time17").disabled =false;
        document.getElementById("Estimated_Time18").disabled =false;
        document.getElementById("Estimated_Time19").disabled =false;
        document.getElementById("Estimated_Time20").disabled =false;
        document.getElementById("Estimated_Time21").disabled =false;
        document.getElementById("Estimated_Time22").disabled =false;
        document.getElementById("Estimated_Time23").disabled =false;
        document.getElementById("myform").submit();
    }
</script>



@endsection
