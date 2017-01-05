@extends('layouts.app')

@section('content')

<form class="form-horizontal" role="form" method="POST" action="{{ url('/SubmitManagerAppraisal') }}">
{!! csrf_field() !!}
<script src="{{asset('newdt/datetimepicker_css.js')}}"></script>

<style>

hg1 {
    font-weight: bold;
    font-size: 100%;
    margin-left:600px;
}

m1{
  margin-left:100px;
}

m1{
  margin-left:180px;
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


</style>


<?php
   for ($i = 0; $i < count($masterdata) ; $i++)
    {
          echo "<tr>
                   <td>".$masterdata[$i]->id."</td>
                    <td>".$masterdata[$i]->User_Name."</td>
                    <td>".$masterdata[$i]->Project_Name."</td>
                    <td>".$masterdata[$i]->Appraisal_ID."</td>
                    <td>".$masterdata[$i]->Appraisal_period_start."</td>
                    <td>".$masterdata[$i]->Appraisal_period_end."</td>
                    
                </tr>"; 

             // echo  "<tr>  <td><button type='submit' value ='submit' type='submit'>Submit</button> </td></tr>";

        echo "<input type='hidden' name=".'"project_name'.$i.'"'." value = ".$masterdata[$i]->Project_Name.">";
        echo "<input type='hidden' name=".'"User_Name'.$i.'"'." value = ".$masterdata[$i]->User_Name.">";
        
          
    }
    //dd();
?>  
  

<table border=1 style=width:90%>
<tr>
        <th colspan='6'><center>Appraisal Details</center></th> 
</tr>

<tr> 
        <td >Appraisal ID: </td>
        <td> <?php  $i = 0;  echo $appID = $appdata[$i]->Appraisal_ID;?></td>

        <td> Appraisal Start Period:  </td>
        <td> <?php  $i = 0;  echo $appdata[$i]->Appraisal_period_start;?></td>

        <td> Appraisal End Period:  </td>
        <td> <?php  $i = 0;  echo $appdata[$i]->Appraisal_period_end;?></td>
               
</tr>


<tr>
        <td >User Name</td>
        <td colspan='2'><?php  $i = 0;  echo $data[$i]->username;?></td>

        <td > Project Name </td>
        <td colspan='2'><?php  $i = 0;  echo $masterdata[$i]->Project_Name;?></td>
</tr>

<tr>
        <td colspan='6'><center><b1>Goal for the project</b1></center></td>
        
</tr>

<tr>

        <td >Goal - 1 Description: </td> 
        <td><input type='text' name='Goal1_Description' id = 'Goal1_Description' disabled value=<?php echo $masterdata[$i]->Goal1_Description;?> style=width:99% ></td>
       
        <td >Start Date:  </td> 
        <td><input type='text' name='Goal1_Start_Period' id = 'Goal1_Start_Period' disabled value=<?php echo $masterdata[$i]->Goal1_Start_Period;?> >
        <img src="newdt/images/cal.gif" onclick='javascript:NewCssCal("Goal1_Start_Period", "ddMMyyyy" )' style="cursor:pointer"/></td>   
       

        <td >End Date:  </td>    
        <td><input type='text' name='Goal1_End_Period' id = 'Goal1_End_Period' disabled value=<?php echo $masterdata[$i]->Goal1_End_Period;?>>
        <img src="newdt/images/cal.gif" onclick='javascript:NewCssCal("Goal1_Start_Period", "ddMMyyyy" )' style="cursor:pointer"/></td> 
</tr>

<tr>

        <td >Goal - 2 Description: </td> 
        <td><input type='text' name='Goal2_Description' id = 'Goal2_Description' disabled value=<?php echo $masterdata[$i]->Goal2_Description;?> style=width:99% ></td>
       
        <td >Start Date:  </td> 
        <td><input type='text' name='Goal2_Start_Period' id = 'Goal2_Start_Period' disabled value=<?php echo $masterdata[$i]->Goal2_Start_Period;?> >
        <img src="newdt/images/cal.gif" onclick='javascript:NewCssCal("Goal2_Start_Period", "ddMMyyyy" )' style="cursor:pointer"/></td>   
       

        <td >End Date:  </td>    
        <td><input type='text' name='Goal2_End_Period' id = 'Goal2_End_Period' disabled value=<?php echo $masterdata[$i]->Goal2_End_Period;?>>
        <img src="newdt/images/cal.gif" onclick='javascript:NewCssCal("Goal2_Start_Period", "ddMMyyyy" )' style="cursor:pointer"/></td> 
        
</tr>

<tr>

        <td >Goal - 3 Description: </td> 
        <td><input type='text' name='Goal3_Description' id = 'Goal3_Description' disabled value=<?php echo $masterdata[$i]->Goal3_Description;?> style=width:99% ></td>
       
        <td >Start Date:  </td> 
        <td><input type='text' name='Goal3_Start_Period' id = 'Goal3_Start_Period' disabled value=<?php echo $masterdata[$i]->Goal3_Start_Period;?> >
        <img src="newdt/images/cal.gif" onclick='javascript:NewCssCal("Goal3_Start_Period", "ddMMyyyy" )' style="cursor:pointer"/></td>   
       

        <td >End Date:  </td>    
        <td><input type='text' name='Goal3_End_Period' id = 'Goal3_End_Period' disabled value=<?php echo $masterdata[$i]->Goal3_End_Period;?>>
        <img src="newdt/images/cal.gif" onclick='javascript:NewCssCal("Goal3_Start_Period", "ddMMyyyy" )' style="cursor:pointer"/></td>        
</tr>

<tr>

        <td >Goal - 4 Description: </td> 
        <td><input type='text' name='Goal4_Description' id = 'Goal4_Description' disabled value=<?php echo $masterdata[$i]->Goal4_Description;?> style=width:99% ></td>
       
        <td >Start Date:  </td> 
        <td><input type='text' name='Goal4_Start_Period' id = 'Goal4_Start_Period' disabled value=<?php echo $masterdata[$i]->Goal4_Start_Period;?> >
        <img src="newdt/images/cal.gif" onclick='javascript:NewCssCal("Goal2_Start_Period", "ddMMyyyy" )' style="cursor:pointer"/></td>   
       

        <td >End Date:  </td>    
        <td><input type='text' name='Goal4_End_Period' id = 'Goal4_End_Period' disabled value=<?php echo $masterdata[$i]->Goal4_End_Period;?>>
        <img src="newdt/images/cal.gif" onclick='javascript:NewCssCal("Goal4_Start_Period", "ddMMyyyy" )' style="cursor:pointer"/></td>

        
</tr>

<tr>    
        <td>Self Rating</td>
        <td colspan='5'><?php  $i = 0;  echo $masterdata[$i]->Self_Rating;?> </td>
</tr>


   
     <td>Manager Rating</td>
     <td> 1  : <input name="Manager_Rating"  type="radio" value="1"></td>
     <td> 3  : <input name="Manager_Rating" type="radio"  value="3"></td>
     <td> 5  : <input name="Manager_Rating" type="radio" value="5"></td>
     <td> 7  : <input name="Manager_Rating" type="radio" value="7"></td>
     <td> 9  : <input name="Manager_Rating" type="radio"  value="9"></td>

 
<tr>
        <td > Remarks</td>
        <td colspan="5"><input type='text' name='Remarks' id = 'Remarks' disabled value=<?php echo $masterdata[$i]->Remarks;?> style=width:99% ></td>
        
</tr>


<tr>
        <td colspan='6'><center><b1>Status</b1></center></td>
</tr>

<tr>
        <td> Intial: <input name="status" type="radio" value="Initial"></td>
        <td> In Progress: <input name="status" type="radio" value="In Progress"></td>
        <td> Completed: <input name="status" type="radio" value="Completed"></td>
        <td> Approved: <input name="status" type="radio" value="Approved"></td>
        <td> Previous: <input name="status" type="radio" value="Previous"></td>
        <td> Cancelled: <input name="status" type="radio" value="Cancelled"></td>
</tr>

</table>

<?php
    echo
    "<input type='hidden' name=".'"Appraisal_ID"'." value = ".$appdata[$i]->Appraisal_ID.">".
    "<input type='hidden' name=".'"Appraisal Start Period"'." value = ".$appdata[$i]->Appraisal_period_start.">".
    "<input type='hidden' name=".'"Appraisal End Period"'." value = ".$appdata[$i]->Appraisal_period_end.">".
    "<input type='hidden' name=".'"User_Name"'." value = ".$data[$i]->username.">".
    "<input type='hidden' name=".'"Project_Name"'." value = '".$masterdata[$i]->Project_Name."'>";

?>
<td><m1><button type='submit' value ='submit' type='submit' size='40'>Submit</button> </m1></td>
</form>



<td><button  onclick = "goal_enable()" >Edit NEW</button></td>



<script>
    function goal_enable()
    {
       // document.getElementById("goal4desc").disabled =false;
        document.getElementById("Goal1_Description").disabled =false;
        document.getElementById("Goal1_Start_Period").disabled =false;
        document.getElementById("Goal1_End_Period").disabled =false;

        document.getElementById("Goal2_Description").disabled =false;
        document.getElementById("Goal2_Start_Period").disabled =false;
        document.getElementById("Goal2_End_Period").disabled =false;

        document.getElementById("Goal3_Description").disabled =false;
        document.getElementById("Goal3_Start_Period").disabled =false;
        document.getElementById("Goal3_End_Period").disabled =false;

        document.getElementById("Goal4_Description").disabled =false;
        document.getElementById("Goal4_Start_Period").disabled =false;
        document.getElementById("Goal4_End_Period").disabled =false;

        document.getElementById("Remarks").disabled =false;
    }
</script>



@endsection
