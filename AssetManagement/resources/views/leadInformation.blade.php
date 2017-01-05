@extends('layouts.app')

@section('content')

<form id="myform"  class="form-horizontal" role="form" method="POST" action="{{ url('/Submitleadinfo') }}">
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

    for ($i = 0; $i < count($data) ; $i++)
    {

        echo "<table border=1 style=width:90%>
                <tr>
                    <th colspan='6'><center>Project Lead Details</center></th> 
                </tr>

                <tr>
                        <td >Lead ID: </td>
                        <td> ".$data[$i]->LeadID."</td>

                         <td >User Name: </td>
                        <td> ".$data[$i]->User_Name."</td>

                        <td> Lead Name</td>
                        <td>".$data[$i]->Lead_Name."</td>



                </tr>

                
 
                 <tr>

                        <td >Lead Description:  </td> 
                        <td colspan='2'><input type='text' size= '45%' name='LeadDescription' id = 'LeadDescription' disabled value='".$data[$i]->LeadDescription."'></td>

                        <td >Lead Estimated Start Date: </td> 
                        <td colspan='2'><input type='text' id = 'LeadEstimatedStartDate' name='LeadEstimatedStartDate' disabled value='".$data[$i]->LeadEstimatedStartDate."'</td>
               
                        
                 </tr>
                 

                <tr>

                        <td >Lead Probability:  </td> 
                        <td><input type='text' name='LeadProbability' id = 'LeadProbability' disabled value=".$data[$i]->LeadProbability."></td>

                        <td >LeadEstimatedValue:  </td> 
                        <td><input type='text' name='LeadEstimatedValue' id = 'LeadEstimatedValue' disabled value=".$data[$i]->LeadEstimatedValue."></td>


                        <td >Lead Status:  </td> 
                        <td><input type='text' name='LeadStatus' id = 'LeadStatus' disabled value=".$data[$i]->LeadStatus."></td>

                </tr>


                <tr>
                        <td >Lead Action:  </td> 
                        <td colspan='5'><input type='text' size = '100%' name='Lead_Action' id = 'Lead_Action' disabled value='".$data[$i]->Lead_Action."'></td>
                </tr>


                 


</table>";

        echo "<input type='hidden' name=".'"Lead_ID"'." value = '".$data[$i]->LeadID."'>";
        echo "<input type='hidden' name=".'"Lead_Name"'." value = '".$data[$i]->Lead_Name."'>";
        echo "<input type='hidden' name=".'"User_Name"'." value = '".$data[$i]->User_Name."'>";
  
    }


 ?>


  
<td><m1><button class='btn btn-primary btn-lg' onclick="goal_enable_before_submit()">Submit</button> </m1></td>

</form>


<td><m1><button class='btn btn-primary btn-lg'  onclick = "goal_enable()" >Edit</button></m1></td>



<script>
    function goal_enable()
    {
       // LeadDescription,LeadEstimatedStartDate,LeadProbability,LeadEstimatedValue,LeadStatus,Lead_Action
        document.getElementById("LeadDescription").disabled =false;
        document.getElementById("LeadEstimatedStartDate").disabled =false;
        document.getElementById("LeadProbability").disabled =false;

        document.getElementById("LeadEstimatedValue").disabled =false;
        document.getElementById("LeadStatus").disabled =false;
        document.getElementById("Lead_Action").disabled =false;

    }

    
    function goal_enable_before_submit()
    {
        document.getElementById("LeadDescription").disabled =false;
        document.getElementById("LeadEstimatedStartDate").disabled =false;
        document.getElementById("LeadProbability").disabled =false;

        document.getElementById("LeadEstimatedValue").disabled =false;
        document.getElementById("LeadStatus").disabled =false;
        document.getElementById("Lead_Action").disabled =false;

        document.getElementById("myform").submit();
    }
</script>

@endsection
