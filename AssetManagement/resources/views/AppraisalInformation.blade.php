@extends('layouts.app')

@section('content')

<form id="myform"  class="form-horizontal" role="form" method="POST" action="{{ url('/SubmitManagerAppraisal') }}">
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
dd($masterdata);
    for ($i = 0; $i < count($masterdata) ; $i++)
    {

        echo "<table border=1 style=width:90%>
                <tr>
                    <th colspan='6'><center>Appraisal Details</center></th> 
                </tr>

                <tr>
                        <td >Appraisal ID: </td>
                        <td> ".$masterdata[$i]->Appraisal_ID."</td>

                        <td> Appraisal Start Period:  </td>
                        <td>".$masterdata[$i]->Appraisal_period_start."</td>

                        <td> Appraisal End Period:  </td>
                        <td>".$masterdata[$i]->Appraisal_period_end."</td>



                </tr>

                <tr>
                        <td >User Name: </td>
                        <td colspan='2'> ".$masterdata[$i]->User_Name."</td>

                        <td> Project Name</td>
                        <td colspan='2'>".$masterdata[$i]->Project_Name."</td>

                       
                </tr>

                <tr>
                        <td colspan='6'><center><b1>Goal for the project</b1></center></td>
        
                </tr>


                <tr>

                        <td >Goal - 1 Description: </td> 
                        <td><input type='text' id = 'Goal1_Description' name='Goal1_Description' disabled value='".$masterdata[$i]->Goal1_Description."'</td>
               
                        <td >Start Date:  </td> 
                        <td><input type='text' name='Goal1_Start_Period' id = 'Goal1_Start_Period' disabled value=".$masterdata[$i]->Goal1_Start_Period."></td>
                        

                        <td >Start Date:  </td> 
                        <td><input type='text' name='Goal1_End_Period' id = 'Goal1_End_Period' disabled value=".$masterdata[$i]->Goal1_End_Period."></td>
                           
               

                </tr>


                <tr>

                        <td >Goal - 2 Description: </td> 
                        <td><input type='text' name='Goal2_Description' id = 'Goal2_Description' disabled value='".$masterdata[$i]->Goal2_Description."'</td>
               
                        <td >Start Date:  </td> 
                        <td><input type='text' name='Goal2_Start_Period' id = 'Goal2_Start_Period' disabled value=".$masterdata[$i]->Goal2_Start_Period."></td>

                        <td >Start Date:  </td> 
                        <td><input type='text' name='Goal2_End_Period' id = 'Goal2_End_Period' disabled value=".$masterdata[$i]->Goal2_End_Period."></td>
                           
               

                </tr>


                <tr>

                        <td >Goal - 3 Description: </td> 
                        <td><input type='text' name='Goal3_Description' id = 'Goal3_Description' disabled value='".$masterdata[$i]->Goal3_Description."'</td>
               
                        <td >Start Date:  </td> 
                        <td><input type='text' name='Goal3_Start_Period' id = 'Goal3_Start_Period' disabled value=".$masterdata[$i]->Goal3_Start_Period."></td>

                        <td >Start Date:  </td> 
                        <td><input type='text' name='Goal3_End_Period' id = 'Goal3_End_Period' disabled value=".$masterdata[$i]->Goal3_End_Period."></td>
                           
               

                </tr>


                <tr>

                        <td >Goal - 4 Description: </td> 
                        <td><input type='text' name='Goal4_Description' id = 'Goal4_Description' disabled value='".$masterdata[$i]->Goal4_Description."'</td>
               
                        <td >Start Date:  </td> 
                        <td><input type='text' name='Goal4_Start_Period' id = 'Goal4_Start_Period' disabled value=".$masterdata[$i]->Goal4_Start_Period."></td>

                        <td >Start Date:  </td> 
                        <td><input type='text' name='Goal4_End_Period' id = 'Goal4_End_Period' disabled value=".$masterdata[$i]->Goal4_End_Period."></td>
                           
               

                </tr>


                <tr>    
                        <td>Self Rating</td>
                        <td colspan='5'>".$masterdata[$i]->Self_Rating."</td>
                </tr>

                <tr>

                        <td>Manager Rating</td>
                         <td> 1  : <input name='Manager_Rating'  type='radio' value='1' checked='checked'></td>
                         <td> 3  : <input name='Manager_Rating' type='radio'  value='3'></td>
                         <td> 5  : <input name='Manager_Rating' type='radio' value='5'></td>
                         <td> 7  : <input name='Manager_Rating' type='radio' value='7'></td>
                         <td> 9  : <input name='Manager_Rating' type='radio'  value='9'></td>
                </tr>


                <tr>
                        <td > Remarks</td>
                        <td colspan='5'><input type='text' name='Remarks' id = 'Remarks' disabled value='".$masterdata[$i]->Remarks."'' style=width:99% ></td>
        
                </tr>


                <tr>
                        <td colspan='6'><center><b1>Status</b1></center></td>
                </tr>

                <tr>
                        <td> Intial: <input name='status' type='radio' value='Initial' checked='checked'></td>
                        <td> In Progress: <input name='status' type='radio' value='In Progress'></td>
                        <td> Completed: <input name='status' type='radio' value='Completed'></td>
                        <td> Approved: <input name='status' type='radio' value='Approved'></td>
                        <td> Previous: <input name='status' type='radio' value='Previous'></td>
                        <td> Cancelled: <input name='status' type='radio' value='Cancelled'></td>
                </tr>


</table>";

        echo "<input type='hidden' name=".'"Appraisal_ID"'." value = '".$masterdata[$i]->Appraisal_ID."'>";
        echo "<input type='hidden' name=".'"Appraisal_period_start"'." value = '".$masterdata[$i]->Appraisal_period_start."'>";
        echo "<input type='hidden' name=".'"Appraisal_period_end"'." value = '".$masterdata[$i]->Appraisal_period_end."'>";

        echo "<input type='hidden' name=".'"Project_Name"'." value = '".$masterdata[$i]->Project_Name."'>";
        echo "<input type='hidden' name=".'"User_Name"'." value = '".$masterdata[$i]->User_Name."'>";

       // echo "<input type='hidden' name=".'"Manager_Rating"'." value = '".$masterdata[$i]->Manager_Rating."'>";
       // echo "<input type='hidden' name=".'"status"'." value = '".$masterdata[$i]->status."'>"; 
         

        
 
       
    }


 ?>


  
<td><m1><button class='btn btn-primary btn-lg' onclick="goal_enable_before_submit()">Submit</button> </m1></td>

</form>


<td><m1><button class='btn btn-primary btn-lg'  onclick = "goal_enable()" >Edit</button></m1></td>



<script>
    function goal_enable()
    {
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

    
    function goal_enable_before_submit()
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

        document.getElementById("myform").submit();
    }
</script>

@endsection
