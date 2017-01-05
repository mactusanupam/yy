@extends('layouts.app')

@section('content')

<form id="myform"  class="form-horizontal" role="form" method="POST" action="{{ url('/submiteditservicelog') }}">
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
echo "<table border=2 style=width:85%>
<tr>
  <th style=width:1%> Select </th>
   
  <th style=width:5%> Service ID </th>
  <th style=width:10%> Company Name </th>
  <th style=width:20%> Problem Description </th>
  <th style=width:10%> Project Name </th>
  <th style=width:10%> Total Time</th> 
  <th style=width:30%>Action</th>  
</tr>";

   for ($i = 0; $i < count($servicerecord) ; $i++)
    {
          echo "<tr> 
                    <td> <input type='checkbox' name=".'"check_list'.$i.'"'."   ></td>"."
                    <td>".$servicerecord[$i]->Service_ID."</td>"."
                    <td>".$servicerecord[$i]->Company_Name."</td>"."
                    <td>'".$servicerecord[$i]->Problem_Description."'</td>"."
                    <td>".$servicerecord[$i]->Project_Name."</td>"."
                    <td><input type='text' size='15px' name=".'"timespent'.$i.'"'." id =".'"timespent'.$i.'"'." disabled value=".$servicerecord[$i]->Total_Time_Spent." ></td>"."
                     <td><input type='text' size='70px' name=".'"Action'.$i.'"'." id =".'"Action'.$i.'"'." disabled value='".$servicerecord[$i]->Action."' > </td>
            

        </tr>"; 

    echo "<input type='hidden' name=".'"id'.$i.'"'." value = ".$servicerecord[$i]->id.">";
    echo "<input type='hidden' name=".'"Project_Name'.$i.'"'." value = '".$servicerecord[$i]->Project_Name."''>";
      
    }
echo "</table>";

 ?>


  
<td><m1><button class='btn btn-primary btn-lg' onclick="goal_enable_before_submit()">Submit</button> </m1></td>

</form>


<td><m1><button class='btn btn-primary btn-lg'  onclick = "goal_enable()" >Edit</button></m1></td>



<script>
    function goal_enable()
    {

        document.getElementById("timespent0").disabled =false;
        document.getElementById("timespent1").disabled =false;
        document.getElementById("timespent2").disabled =false;
        document.getElementById("timespent3").disabled =false;
        document.getElementById("timespent4").disabled =false;
        document.getElementById("timespent5").disabled =false;
        document.getElementById("timespent6").disabled =false;
         

        document.getElementById("Action0").disabled =false;
        document.getElementById("Action1").disabled =false;
        document.getElementById("Action2").disabled =false;
        document.getElementById("Action3").disabled =false;
        document.getElementById("Action4").disabled =false;
        document.getElementById("Action5").disabled =false;
        document.getElementById("Action6").disabled =false;
        document.getElementById("Action7").disabled =false;
        document.getElementById("Action8").disabled =false;
        document.getElementById("Action9").disabled =false;
        document.getElementById("Action10").disabled =false;
        document.getElementById("Action11").disabled =false;
        document.getElementById("Action12").disabled =false;
        document.getElementById("Action13").disabled =false;
        document.getElementById("Action14").disabled =false;
        document.getElementById("Action15").disabled =false;
        document.getElementById("Action16").disabled =false;
        document.getElementById("Action17").disabled =false;
        document.getElementById("Action18").disabled =false;
        document.getElementById("Action19").disabled =false;
        document.getElementById("Action20").disabled =false;
        document.getElementById("Action21").disabled =false;
        document.getElementById("Action22").disabled =false;
        document.getElementById("Action23").disabled =false;

        
         
         
    }

    
    function goal_enable_before_submit()
    {
        document.getElementById("timespent0").disabled =false;
        document.getElementById("timespent1").disabled =false;
        document.getElementById("timespent2").disabled =false;
        document.getElementById("timespent3").disabled =false;
        document.getElementById("timespent4").disabled =false;
        document.getElementById("timespent5").disabled =false;
        document.getElementById("timespent6").disabled =false;
        document.getElementById("timespent7").disabled =false;
        document.getElementById("timespent8").disabled =false;
        document.getElementById("timespent9").disabled =false;
        document.getElementById("timespent10").disabled =false;
        document.getElementById("timespent11").disabled =false;
        document.getElementById("timespent12").disabled =false;
        document.getElementById("timespent13").disabled =false;
        document.getElementById("timespent14").disabled =false;
        document.getElementById("timespent15").disabled =false;
        document.getElementById("timespent16").disabled =false;
        document.getElementById("timespent17").disabled =false;
        document.getElementById("timespent18").disabled =false;
        document.getElementById("timespent19").disabled =false;
        document.getElementById("timespent20").disabled =false;
        document.getElementById("timespent21").disabled =false;
        document.getElementById("timespent22").disabled =false;
        document.getElementById("timespent23").disabled =false;
        document.getElementById("timespent24").disabled =false;
        document.getElementById("timespent25").disabled =false;
        document.getElementById("timespent26").disabled =false;
        document.getElementById("timespent27").disabled =false;
        document.getElementById("timespent28").disabled =false;
        document.getElementById("timespent29").disabled =false;


         document.getElementById("Action0").disabled =false;
        document.getElementById("Action1").disabled =false;
        document.getElementById("Action2").disabled =false;
        document.getElementById("Action3").disabled =false;
        document.getElementById("Action4").disabled =false;
        document.getElementById("Action5").disabled =false;
        document.getElementById("Action6").disabled =false;
        document.getElementById("Action7").disabled =false;
        document.getElementById("Action8").disabled =false;
        document.getElementById("Action9").disabled =false;
        document.getElementById("Action10").disabled =false;
        document.getElementById("Action11").disabled =false;
        document.getElementById("Action12").disabled =false;
        document.getElementById("Action13").disabled =false;
        document.getElementById("Action14").disabled =false;
        document.getElementById("Action15").disabled =false;
        document.getElementById("Action16").disabled =false;
        document.getElementById("Action17").disabled =false;
        document.getElementById("Action18").disabled =false;
        document.getElementById("Action19").disabled =false;
        document.getElementById("Action20").disabled =false;
        document.getElementById("Action21").disabled =false;
        document.getElementById("Action22").disabled =false;
        document.getElementById("Action23").disabled =false;
         document.getElementById("timespent0").disabled =false;
        document.getElementById("myform").submit(
    }
</script>

@endsection
