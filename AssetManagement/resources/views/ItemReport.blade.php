<?php
use Illuminate\Support\Facades\Input;
//use Auth;
//use PDF;
?>
<form class="form-horizontal" role="form" method="POST" action="{{ url('/ItemReportForm') }}">
{!! csrf_field() !!}

<style type="text/css">

	table td, table th{

		border:1px solid black;
         
		 background-color:  #ccffff;

	}
	 h5 
        {
            font-size: 180%;
            color: red;
            font-weight: bold;
        }
 table td{
  border:1px solid black;
  background-color:  #ffffcc;

 }
</style>

<div class="container">


	<br/>

	
	<!--a href="{{ route('ItemReport',['download'=>'pdf']) }}">Download PDF</a-->

	
	<?php 
     $insert=Input::all();
        $fromdbdate = $todbdate= $Itemname = $startdate = $enddate ="";  
    if (isset($_POST['submit'])) {
      $fromdbdate = $_POST['ReportFrom'];
      $todbdate = $_POST['ReportTo']; //this is line 32 and so on...
      $Itemname = $_POST['Item_Name'];
      $startdate = $_POST('Y-m-d H:i:s',$fromdate);
      $endtdate = $_POST('Y-m-d H:i:s',$todate);
    }


	 
//dd($insert);
//$insert="";
//if (isset($_POST['submit'])) 
    $fromdbdate = ($insert['ReportFrom']);
       $todbdate = ($insert['ReportTo']);
        $Itemname= $insert['Item_Name'];
        date_default_timezone_set('Asia/Kolkata');
        $todaydate = date('Y-m-d H:i:s');
        $current=auth::user()->name;
        $fromdate = strtotime($fromdbdate);
        $todate=strtotime($todbdate);
        $startdate = date('Y-m-d H:i:s',$fromdate);
        $enddate = date('Y-m-d H:i:s',$todate);
      //}


	 
     
$data = DB::table('inventoryins')->whereBetween('invoice_date', [ $startdate,$enddate])->where('item',$Itemname)->get();
	  //dd($data);


  if($Itemname==""){
        
          echo"<h5> First fill the item name!!</h5>";
		   //return view('reportsubmit')->with('error_msg', $error_msg);
   	      }elseif($fromdbdate==""||$todbdate ==""){
            echo"<h5> First fill the Dates!!</h5>";
          }
   	  
  
	 
	 

     

	                //echo	"<h4 style = font-size:150%;color:Green>Inventory In:".$data[0]->item."</h4>";
                    if(isset($data[0]))
                       {
                        //echo $array[0];
                       echo"<h4 style = font-size:150%;color:Green>Inventory In:".$data[0]->item."</h4>";
                           //echo"<td>Item Name:-".$data[0]->item."</td>";
                             }
                        /*else {
                           echo"<h5> This item has no record!!</h5>";
                            }*/
           ?>
	<table>
	                       <tr>
	                       <?php echo " Printed By: $current <br>Print Date:$todaydate.";?>
                            </tr>

		<tr>      
		          <th style="width:2%;">No.</th> 
                  <th>  Invoice ID </th>

                  <th> Invoice No. <br></th> 

                  <th> Invoice<br>Date</th> 

                  <th> Invoice<br>Value</th>

                  <th> Project<br>Name</th>

                  <th> Item</th>

                  <th> Quantity</th>

                  <th> Unit Price</th>
			
		</tr>
		<?php
		if(isset($data[0]))
            {
		?>

		@foreach ($data as $key => $data )

		<tr>
           
			<td>{{ ++$key }}</td>
			<td>{{ $data->id }}</td>
			<td>{{ $data->invoice_no}}</td>
			<td> {{$data->invoice_date}}</td> 

			<td>{{ $data->invoice_value }}</td>
			<td>{{ $data->Project_Name }}</td>

			
			<td>{{ $data->item }}</td>
			<td>{{ $data->Quantity }}</td>
			<td>{{ $data->Unit_Price}}</td>


         </tr>
	
	    @endforeach
	  <?php  
      }
      ?>
	</table>

</div>
</form>

          <?php //echo "<a href=\" route('pdfview',['download'=>'pdf']) \">Download PDF</a>"; ?>
<?php 
	 $insert=Input::all();

	 if(isset($insert['ReportFrom']))
   {

    $fromdbdate = ($insert['ReportFrom']);
        $todbdate = ($insert['ReportTo']);
        $Itemname= $insert['Item_Name'];
        date_default_timezone_set('Asia/Kolkata');
        $todaydate = date('Y-m-d H:i:s');
        $current=auth::user()->name;
        $fromdate = strtotime($fromdbdate);
        $todate=strtotime($todbdate);
        $startdate = date('Y-m-d H:i:s',$fromdate);
        $enddate = date('Y-m-d H:i:s',$todate);

     }
   
    if (isset($insert['Item_Name']))
  { 	
   if($Itemname==""){
        
          echo"<h5> First fill the item name!!</h5>";
		   //return view('reportsubmit')->with('error_msg', $error_msg);
   	      }elseif($fromdbdate==""||$todbdate ==""){
            echo"<h5> First fill the Dates!!</h5>";
          }
   	     } 
$flag= "null";
if(isset($startdate[0])&& isset($endtdate[0]))
 {
   $flag= $flag."true";
     }
	  $data = DB::table('inventoryouts')->whereBetween('Invoice_Date', [ $startdate,$enddate])->where('Item',$Itemname)->get();
	  //dd($data);
	//}
  
	                  //echo	"<h4 style = font-size:150%;color:orange>Inventory Out:".$data[0]->Item."</h4>";

	                        if(isset($data[0]))
                       {
                        //echo $array[0];
                        echo "<h4 style = font-size:150%;color:orange>Inventory Out:".$data[0]->Item."</h4>";
                        //echo"<td>Item Name:-".$data[0]->Item."</td>";
                          }
                      /*else {
                      echo"<h5> This item has no record!!</h5>";
                    }*/
?>
<table>
 

		<tr>      
		          <th style="width:2%;">No.</th> 
                  <th>  Invoice ID </th>

                  <th> Invoice No. <br></th> 

                  <th> Invoice<br>Date</th> 

                  <th> Invoice<br>Value</th>

                  <th> Project<br>Name</th>

                  <th> Item</th>

                  <th> Quantity</th>

                  <th> Unit Price</th>
			
		</tr>
		<?php
		if(isset($data[0]))
            {
		?>

		@foreach ($data as $key => $data )

		<tr>

			<td>{{ ++$key }}</td>
			<td>{{ $data->id }}</td>
			<td>{{ $data->Invoice_No}}</td>
			<td>{{ $data->Invoice_Date}}</td>
			<td>{{ $data->Invoice_Value }}</td>
			<td>{{ $data->Project_Name }}</td>

			
			<td>{{ $data->Item }}</td>
			<td>{{ $data->Quantity }}</td>
			<td>{{ $data->Unit_Price}}</td>


         </tr>
	
	    @endforeach
     <?php  
      }
      ?>
	</table>

</div>
</form>
<?php echo "<a href=\"javascript:history.go(-1)\">Go Back to Previous Page</a>";?>

