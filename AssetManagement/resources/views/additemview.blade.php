
@extends('layouts.app')

@section('content')

<form class="form-horizontal" role="form" method="POST" action="{{ url('/additem') }}">

{!! csrf_field() !!}
<script src="{{asset('newdt/datetimepicker_css.js')}}"></script>

<style type="text/css">

    table{
        text-align: center;
   }

  .navbar-static-top {

      z-index: 0;
    }

   
    h3 {

        font-weight: bold;

        font-size: 170%;

        color: #9ffea9;

        text-align: center;
    }

    .table{

        margin-top:10px;

        margin-left: 4%;

        margin-right: 4%;

        background-color:#f1f1c1;

        width:90%;

        text-align: center;
    }

    .table  th{
        height: 30px;

        font-weight: bold;
        
        text-align: center;
        background-color: orange;
    }

    .table td {

        height: 30px;

        padding: 3px !important;
    }
    .table td input {

        size: 30 !important;
    }
    
    .button{

        text-align: left !important;
    }

</style>

<h3>Item-Quantity Record </h3><br>

    <table class='table'>
    









<tr style="text-align: left; font-weight: bold;">

        <td colspan='8'>Add Items</td>

    </tr>
    <tr>
        <td>item1: </td>

        <td style ="width:20%;"><input type = 'Text' name = 'Item[]'  style = width:100% id='item1'></td>

        <td>Quantity: </td>

        <td ><input type = 'Text' name = 'Quantity[]' id='quantity1'></td>

        <td>Unit Price: </td>
        <td ><input type = 'Text' name = 'Price[]' id='price1'></td></tr>
        <tr><td>Item Code:</td>
         <td ><input type = 'Text' name = 'Code[]' id='code1'></td>
         <td>Item Model No.:</td>
         <td><input type = 'Text' name = 'Model[]' id='model1'></td>
         <td>Item Category :</td>
         <td><input type = 'Text' name = 'Category[]' id='category1'></td></tr>


        
    </tr>

    <tr id="reference_tr" style="text-align: left; font-weight: bold;">

        <td><button class='btn btn-primary' type='submit' value ='submit' type='submit'>Submit</button></td>

       <td><button class="btn btn-primary" onclick="javascript:addItems();" type="button">Click here to add  more items</button></td>
      
    </tr>
    </table>
    </form>

    <script type="text/javascript">

        var items = 1;

        function addItems() {

        item = document.getElementById('item'+items).value;

        quantity = document.getElementById('quantity'+items).value;

        price = document.getElementById('price'+items).value;

        code = document.getElementById('code'+items).value;

        model = document.getElementById('model'+items).value;

        category = document.getElementById('category'+items).value;

        //price = document.getElementById('price'+items).value;
       //project=  document.getElementById('project'+items).value;

    if(item != "" && quantity != "" &&  price !="") {

        items += 1;

        tr = document.getElementById('reference_tr');

        html = "<tr><td >Item"+items+": </td><td style = width:20%><input type='Text' name ='Item[]'  style = width:100% id='item"+items+"'></td>";
         

        html += "<td>Quantity: </td><td><input type = 'Text' name = 'Quantity[]' id='quantity"+items+"'></td>";

        html += "<td>Unit Price: </td><td><input type='Text' name ='Price[]' id='price"+items+"'></td></tr>";

       

        html +="<tr><td> Item Code: </td><td><input type = 'Text' name = 'Code[]' id='code"+items+"'></td>";

        html += "<td> Item Model No.: </td><td><input type = 'Text' name = 'Model[]' id='model"+items+"'></td>";

        html += "<td> Item Category: </td><td><input type = 'Text' name = 'Category[]' id='category"+items+"'></td></tr>";
        

        

        tr.insertAdjacentHTML("beforebegin", html);
         
    } 
    else {

        alert("Please fill all previous fields.");
    }
}

</script>

@endsection
