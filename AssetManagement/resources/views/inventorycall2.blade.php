    

@extends('layouts.app')

@section('content')

<form class="form-horizontal" role="form" method="POST" action="{{ url('/inventoryin') }}">

{!! csrf_field() !!}
<script src="{{asset('newdt/datetimepicker_css.js')}}"></script>

<style type="text/css">

    table{
        text-align: center;
   }

  .navbar-static-top {

      z-index: 0;
    }

    th{
        height: 30px;

        font-weight: bold;

        text-align: center;
        background-color: orange;
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

    .table td {
        
        <!!border: 1px solid black;>
        height: 30px;

        padding: 3px !important;
    }
    .table td input {

        size: 30 !important;
    }

    .button{

        text-align: left !important;
    }

    #btnwrap{
    width: 100%;
}
    
    </style>
       
        <h3>Inventory In</h3><br>
    <table class='table'>
    <tr>

        <td>Invoice No: </td>

        <td><input type = 'Text' name = 'invoiceno' ></td>

        <td>Invoice Value: </td>

        <td><input type = 'Text' name = 'invoicevalue' ></td>

        <td>Invoice Date: </td>

        <td><input type='Text' id='Invoicedate' name ='Invoicedate' readonly='readonly'>

        <img src='newdt/images/cal.gif' onclick="javascript:NewCssCal('Invoicedate','yyyyMMdd')" style='cursor: pointer;'/>

        </td>
         
        <td>Project: </td>
        <td colspan='2'> {{ Form::select('project_name', $projectdetails) }}</td>
    
    </tr>
    


    <tr style="text-align: left; font-weight: bold;">

        <td colspan='8'>Add Items</td>

    </tr>

    <?php
         /*for($i=0;$i<=2;$i++){
            
        echo"<tr><td>".Form::select('project_name'.$i.'', $projectdetails )."</td>";
          echo  "<td ><input type = 'Text' name = 'Quantity'".$i." id='quantity1'></td>".
           "<td  style= text-align: left><input type = 'Text' name = 'Price' ".$i."id='price1'></td><tr>";

        
         }*/
         ?>
    <tr>
        <td>Item1: </td>
         <td>{{ Form::select('item_name[]', $itemname, "Please Select An Item", array('id' => 'item1')) }}</td>

        

        <td colspan="3" style= text-align:right >Quantity: </td>

        <td ><input type = 'Text' name = 'Quantity[]' id='quantity1'></td>

        <td>Unit Price: </td>

        <td  style="text-align: left;"><input type = 'Text' name = 'Price[]' id='price1'></td>
        
    </tr>

    <tr id="reference_tr" >
        
        <td>
        
        <button class="btn btn-primary" onclick="javascript:addItems();" type="button">Click here to add more items</button>

        </td>
        <td colspan ="2" style="text-align:left;"><div id="btnwrap">
        <a href="{{"javascript:history.go(-1)"}}"  button class="btn btn-primary" id="idAddButton" onclick="idAddButton_onclick()" type="button">Go Back to Previous Page</a>

         <a  href="{{ url('/conferm') }}" class="btn btn-primary" id="idAddButton" onclick="idAddButton_onclick()" type ="button">Conferm</a>
         <button  class="btn btn-primary" id="idAddButton" onclick="idAddButton_onclick()" value ='submit' type='submit'>Submit</button>
         </div></td>
        <!--td><button class='btn btn-primary' value ='submit' type='submit'>Submit</button></td-->

    </tr>
    
    </table>
    </form>

    <script type="text/javascript">

        var items = 1;

        function addItems() {

        item = document.getElementById('item'+items).value;

        quantity = document.getElementById('quantity'+items).value;

        price = document.getElementById('price'+items).value;


    //} 
       //project=  document.getElementById('project'+items).value;

       if(item != "" && quantity != "" && price != "") {

        items += 1;

        tr = document.getElementById('reference_tr');

        html = "<tr><td>Item"+items+":</td>";
html +='<td>{{ Form::select("item_name[]" ,$itemname,"Please Select An Item", array("id" => "item")) }}</td>'; 
        
 
         html += "<td colspan= 3 style= text-align:right>Quantity: </td>";
        html+= "<td><input type = 'Text' name = 'Quantity[]' id='quantity"+items+"'></td>";

        html += "<td>Unit Price: </td><td colspan='3' style='text-align: left;'>";

        html += "<input type='Text' name ='Price[]' id='price"+items+"'></td></tr>";

        
       
         
        tr.insertAdjacentHTML("beforebegin", html);
      
       newID = "item"+items;
       document.getElementById("item").id=newID;
       }
      else{
            alert("Please fill all previous fields.");
        }

}
</script>

@endsection






    