@extends('layouts.app')

@section('content')

<form class="form-horizontal" role="form" method="POST" action="{{ url('/submitlead') }}">
{!! csrf_field() !!}
<script src="{{asset('newdt/datetimepicker_css.js')}}"></script>

<style>

hg1 {
	font-weight: bold;
	font-size: 170%;
  color: #9ffea9;

}
hg2 {
  font-weight: bold;
  font-size: 150%;

}
m1{
  margin-left:100px;
}

table, th, td, #gpbutton {
    border: 1px solid black;
    border-collapse: collapse;
    background-color: #f1f1c1;
    margin-top:50px;
    margin-left:50px;
}
th, td {
    padding: 5px;
    text-align: left;    
}




</style>



<table border=1 style=width:90%>
<tr>
        <th colspan='6'><center>Add New Project Leads</center></th> 
</tr>

<tr>
        <td >Customer name: </td>
        <td colspan='5' > {{ Form::select('customer_name' , $customer_options ) }} </td>
               
</tr>

<tr>
        <td >Lead ID </td>
        <td> <input type='text' name='leadID' value='' style=width:99% ></td>

        <td >Lead Name </td>
        <td> <input type='text' name='Lead_Name' value='' style=width:99% ></td>

        <td> Lead Status </td>
        <td > <select name='LeadStatus'>
              <option value="10">Initial Stage</option>
              <option value="25">25% Progress</option>
              <option value="50">50% Progress</option>
              <option value="75">75% Progress</option>
              <option value="100">Converted to Prj </option>
              <option value="0">Cancelled </option>
            </select>
              </td>
</tr>

<tr>
        <td >Lead Description </td>
        <td colspan='3'> <input type='text' name='LeadDescription' value='' style=width:99.5% ></td>

        <td >Focal Assigned: </td>
        <td> {{ Form::select('User_Name' , $user_options ) }} </td>
        
</tr>

<tr>
        <td> Est. Start Date:  </td>
        <td> <input type='Text' id="LeadEstimatedStartDate"  name="LeadEstimatedStartDate"  style=width:90% />
             <img src='newdt/images/cal.gif'  onclick='javascript:NewCssCal("LeadEstimatedStartDate", "ddMMyyyy")' style="cursor:pointer"/>

        <td >Lead to Prj Conversion Probability  </td>    
        <td> <select name='LeadProbability'>
              <option value="25">25%</option>
              <option value="50">50%</option>
              <option value="75">75%</option>
              <option value="100">100%</option>
            </select>
        </td>
        <td >Estimated Prj Value (Rs) </td>   
        <td> <input type='text' name='LeadEstimatedValue' value=''  style=width:99%  ></td>
 

</tr>
<tr>
        <td >Lead Action </td>
        <td colspan='5'> <input type='text' name='Lead_Action' value='' style=width:99.5% ></td>

         
        
</tr>

 
</table>

<br> 



<m1> <button  class="btn btn-primary btn-lg"  type='submit' value ='submit' >Submit</button><m1>

             <div class="btn-group btn-group-lg">
              <a  href="http://localhost:8000/lead_value" class="btn btn-primary">Lead Value</a>
             
            </div>

            <div class="btn-group btn-group-lg">
              <a href="http://localhost:8000/lead_progress" class="btn btn-primary">Lead Progress</a>
              
            </div>
             <div class="btn-group btn-group-lg">
               <a href="http://localhost:8000/lead_age" class="btn btn-primary">Est. Start Date </a>
            </div>

            <div class="btn-group btn-group-lg">
              <a  href="http://localhost:8000/viewleadproject" class="btn btn-primary">Edit</a>
             
            </div>

</form>

@endsection
