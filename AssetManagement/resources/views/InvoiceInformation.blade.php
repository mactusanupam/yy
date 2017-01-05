@extends('layouts.app')

@section('content')

<form class="form-horizontal" role="form" method="POST" action="{{ url('/SubmitInvoiceInformation') }}">
{!! csrf_field() !!}
<script src="{{asset('newdt/datetimepicker_css.js')}}"></script>

<style>

hg1 {
	font-weight: bold;
	font-size: 170%;
    color: #9ffea9;
	margin-left:600px;
}

m1{
  margin-left:50px;
}

table, th, td {
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
.foo {
    width: 500px;
}


</style>';

<hg1>Invoice Information</hg1>
<table border=1 style=width:90%>
<tr>
        <th colspan='6'><center>Details</center></th> 
</tr>

<tr>
        <td >Customer name: </td>
        <td colspan='5' > {{ Form::select('Customer_Name' , $customer_options ) }} </td>
               
</tr>

<tr>
        <td> Customer PO Number: </td>
        <!--<td> <input type='Text' id="POdate"  name="POdate"  style=width:90% /> 
             <img src="newdt/images/cal.gif" onclick='javascript:NewCssCal("POdate", "ddMMyyyy" )' style="cursor:pointer"/> -->
        <td> {{ Form::select('PO_Number' , $PO_options ) }} </td>

        <td >Project Name: </td>
        <td>{{ Form::select('Project_Name' , $Project_options ) }}</td> 

        <td >Invoice Number: </td>
        <td> <input type='text' name='Invoice_Number' value='' style=width:99% ></td>

        
</tr>

<tr>
        <td> Invoice Date:  </td>
        <td colspan='2'> <input type='Text' id="invoicedate"  name="invoicedate"  style=width:90% />
             <img src='newdt/images/cal.gif'  onclick='javascript:NewCssCal("invoicedate", "ddMMyyyy")' style="cursor:pointer"/>

        <td >Invoice Value: </td>
        <td colspan='4'> <input type='text' name='Invoice_Value' value='' style=width:99% ></td>
</tr>
<tr>
        <td colspan='6'><center> Value Breakup</center></td>
</tr>

<tr>
        <td> Mactus Value:</td>
        <td> <input type='text' name='Mactus_Value' value='' size='25' style=width:99% ></td>

        <td> VAT:</td>
        <td> <input type='text' name='VAT' value='' size='25' style=width:99% ></td>

        <td> Service Tax:</td>
        <td> <input type='text' name='Service_Tax' value='' size='25' style=width:99% ></td>

</tr>

<tr>

        <td >Invoice Submitted By: </td> 
        <td colspan='2'> {{ Form::select('user_name' , $user_options ) }} </td>

        <td >Payment Rcvd on:  </td>    
        <td colspan='2'> <input type='Text' id="payment_recd_on"  name="payment_recd_on"  style=width:90% /> 
             <img src="newdt/images/cal.gif" onclick='javascript:NewCssCal("payment_recd_on", "ddMMyyyy" )' style="cursor:pointer"/>

        
</tr>


<tr>
        <td >Invoice Description: </td>
        <td colspan='5'> <input type='text' name='Invoice_Description' value='' style=width:99.5% ></td>
        
</tr>
 
</table>

<br>
<td><m1><button class='btn btn-primary btn-lg' type='submit' value ='submit' type='submit' size='40'>Submit</button> </m1></td>

</form>

@endsection
<!-- 

<th style=width:20%> Estimated Start<br> Date</th>
<th style=width:20%> Estimated End<br> Date</th>
<th style=width:10%> Estimated Time<br>(in Hours)*</th>
<th style=width:1%> Status </th>


            "<td> <input type='Text' id=".  '"projectstartdate"'.  " name=".'"projectstartdate"'.  ' maxlength="35" size="30"/>'.
        "<img src=".'"newdt/images/cal.gif" '. 'onclick="javascript:NewCssCal('. "'projectstartdate'".','. "'ddMMyyyy'".','."'dropdown'".','."true".','."'14'".')"'. 'style=cursor:pointer/>'.
 
      "<td> <input type='Text' id=".  '"projectenddate"'.  " name=".'"projectenddate"'.  ' maxlength="35" size="30"/>'.
        "<img src=".'"newdt/images/cal.gif" '. 'onclick="javascript:NewCssCal('. "'projectenddate'".','. "'ddMMyyyy'".','."'dropdown'".','."true".','."'24'".')"'. 'style=cursor:pointer/>'.
             "<td ><input type='text' name='Estimated_Time' value='' size='30'></td>".
            "<td >".Form::select('Project_Status', $status_options )." </td>

-->