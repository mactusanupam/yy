<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use App;
use PDF;
use Auth;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\projectdetails;
use App\projectrecord as projectrecords;
use App\itemname as itemnames;

//use App\service_logs;
use App\leaveinfos;
use App\leavetype;
use App\enabledisable;
use App\user;
use App\statusapprove;
use App\mastercustomertable;
use App\project;
use Response;
use DateTime;
use Carbon\Carbon;
use App\sitename;
use App\service_logs;
use App\SubmitServiceLog;
use Session;
use Alert;
//namespace App\Http\Controllers;

//use Illuminate\Http\Request;

//use App\Http\Requests;

class Inventory extends Controller
{
    protected $titles = null;
    protected $project_name = null;
    protected $project_list = null;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function store()
    {
        Flash::message('Welcome Aboard!');

        return Redirect::home();
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$username = auth::user()->name;
       $db1= DB::table('information')->orderBy('id', 'desc')->take(5)->get();
       return view('home')->with('db1',$db1);*/

       $user_id = auth::user()->id;
       
       $tab_information= DB::table('information')->orderBy('id', 'desc')->take(5)->get();
       $tab_emprecords= DB::table('emprecords')->where('user_id', $user_id)->get();
       $db=[$tab_information, $tab_emprecords[0]];
       //print_r($db);
       return view('home')->with('db',$db);
 
    }

    
    public function inventory()
    {
     
      $projectdetail = DB::table('projectrecords')->select('id','project_Name')->get();
        
      
      $projectdetails= projectrecords::lists('project_Name','project_Name');
      $projectdetails->prepend('', '');
        
      $itemname= itemnames::lists('Item_name','Item_name');
      $itemname->prepend('', '');
      //dd($itemname);
       
        return view('inventorycall2')->with('projectdetails',$projectdetails)->with('projectdetail',$projectdetail)->with('itemname',$itemname); 
    }

    public function inventoryin()
    {
        $data = Input::all();
         //dd($data);
        $invoiceno = $data['invoiceno'];
        $projectname = $data['project_name'];
        $invoicevalue = $data['invoicevalue'];
        $invoicedate = $data['Invoicedate'];

      if($invoicevalue !="" && $projectname != "" && $invoicedate !=""&& $invoiceno != "") {

            $db_invoiceno = DB::table('inventoryins')->where('invoice_no', $invoiceno)->count();
            //echo $db_invoiceno;
            if($db_invoiceno == 0 ){
              
              for($i=0; $i <sizeof($data['item_name']); $i++){
                array(
                     $Item = $data['item_name'][$i],
                      //$Item=$data['item_name'][$i],
                      $Quantity = $data['Quantity'][$i],
                      $UnitPrice = $data['Price'][$i],
                      
                  );
                
                      
              if($Item!="" && $Quantity !="" &&  $UnitPrice !=""){
              //for($i=0; $i <sizeof($data['Item']); $i++) {
                      DB::table('inventoryins')->insert(array(
                        'Project_Name' => $data['project_name'],
                        'invoice_no' => $data['invoiceno'],
                        'invoice_value' => $data['invoicevalue'],
                        'invoice_date' => $data['Invoicedate'],
                        'item' => $data['item_name'][$i],
                        'Quantity' => $data['Quantity'][$i],
                        'Unit_Price' =>$data['Price'][$i]

                      ));

                      DB::table('itemnames')->where('Item_name', $data['item_name'][$i])->increment('Total_Quantity', $data['Quantity'][$i]); 
                    }

                    else {
                      return view('reportsubmit');
                    }
                
                }
              }
        else{
            return view('dbinvoiceno');
          }
        }
      else{
        return view('inventoryreturn')->with('invoiceno',$invoiceno)->with('invoicevalue',$invoicevalue)->
        with('invoicedate',$invoicedate)->with('projectname',$projectname);
      }

    return view('submitform');
    }   
    
    public function invoicein()
    {
        $projectdetails= projectrecords::lists('project_Name','project_Name');
        $projectdetails->prepend('', '');
        //dd($amounttotal);
         return view('report')->with('projectdetails',$projectdetails);
      }  


      
    public function inventoryinreport()
      {
        
        $insert=Input::all();
        //dd($insert);
        $fromdbdate = ($insert['ReportFrom']);
        $todbdate = ($insert['ReportTo']);
        $project_name= $insert['Project_name'];
        date_default_timezone_set('Asia/Kolkata');
        $todaydate = date('Y-m-d H:i:s');
        $current=auth::user()->name;
        $fromdate = strtotime($fromdbdate);
        $todate=strtotime($todbdate);
        $startdate = date('Y-m-d H:i:s',$fromdate);
        $enddate = date('Y-m-d H:i:s',$todate);
         
      if($project_name != "")
        {
            $data = DB::table('inventoryins')->whereBetween('invoice_date', [ $startdate,$enddate])->where('Project_Name',$project_name)->get();
            
            $totalamount = DB::table('inventoryins')->select('item','Quantity','Unit_Price')->whereBetween('invoice_date', [ $startdate,$enddate])->where('Project_Name',$project_name)->get();//get();
            //dd($totalamount);
             //print_r($data);
              //die()
             $total_amount=0;
             for($i=0;$i<sizeof($totalamount);$i++)
             {
              $total_amountstr = ($totalamount[$i]->Quantity)*($totalamount[$i]->Unit_Price);
              $total_amount = ($total_amount + $total_amountstr);

            //$total_amount= $total_amount + ($totalamount[$i]->Quantity)*($totalamount[$i]->Unit_Price);

              }
            
            $allComplete = '<body style=margin-left:10%>

                            <table margin-left:10%>
                            <tr><h3><center>Mactus Technology Solutions <br> Inventory In Report</center></h3>
                            </tr>       
                                        
                            </table>
                            <table>
                            <tr > Printed By: '.$current.' <br> Print Date: '.$todaydate.'<br></tr>
                            </table>';
            if(isset($data[0]))
            {
              //echo $array[0];
              $allComplete = $allComplete. 
              '<table><tr><td>Project Name:-'.$data[0]->Project_Name.'<td></tr></table>';
              }
              else {
                  echo"some error?";
                 }   

            $allComplete = $allComplete.  '<table border=2 style='.'"border-collapse:collapse">
                        <tr>
                            <th style=width:80> ID </th>
                            <th style=width:90> Invoice No. </th> 
                            <th style=width:90> Invoice Date</th> 
                             <th style=width:90> Invoice Value</th>
                            
                            <th style=width:90> Item</th>
                            <th style=width:80> Quantity</th>
                            <th style=width:90> Unit Price</th>
                            

                            
                        </tr>';


        foreach($data as $row)
         {
            //print_r($row);
            //die();
          $allComplete = $allComplete.
                        "<tr>
                            <td>".$row->id."</td>
                            <td>".$row->invoice_no."</td>
                            <td>".$row->invoice_date."</td>
                            <td>".$row->invoice_value."</td>
                                   
                            <td>".$row->item."</td>
                            <td>".$row->Quantity."</td>
                            <td>".$row->Unit_Price."</td></tr>";
        }

          $allComplete =$allComplete ."<tr><td colspan='6' style='text-align:right;'>Total Amount</td>
          <td>".$total_amount."</td></tr></table></body>";
          
          $pdf = App::make('dompdf.wrapper');
          $pdf->loadHTML($allComplete)->setPaper('a4')->setOrientation('landscape');
          return $pdf->stream() ;
        
      }elseif($project_name == ""){
        
             $data = DB::table('inventoryins')->whereBetween('invoice_date', [ $startdate , $enddate])->get(); 
            //dd($data);
             $totalamount = DB::table('inventoryins')->select('item','Quantity','Unit_Price')->whereBetween('invoice_date', [ $startdate,$enddate])->get();//get();
            
            $total_amount=0;
           for($i=0;$i<sizeof($totalamount);$i++)
          {
            $total_amount= $total_amount + ($totalamount[$i]->Quantity)*($totalamount[$i]->Unit_Price);
          }
                //echo"<h3>{{ Html::image('img/mactus.gif', 'a picture', array('class' => 'thumb')) }}</h3>";
                 //echo $url = asset('img/pic_mountain.jpg');
          $allComplete =  '<body>
                          <table width="100%">
                        <tr> <td style="border-bottom: 1px solid black; margin: 0; padding: 0;">

              <img src="img/mactus.gif" alt="logo" style="margin:0; padding: 0;"/>

              <span style="display: inline-block; text-align: right; margin-right: 7.5%;">

                <h5 style="margin: 5px;">Mactus Technology Solutions LLP</h5>

                <h6 style="margin: 5px;">

                  107 3rd Cross Road, 4th Main Road,<br />

                  MICO Layout II Stage, Arekere,<br />

                  Bannerghatta Road, Bangalore 560076 <br />

                  Email : contact@mactus.in<br />

                  Telephone : +91 80 26493474

                </h6>

              </span>

            </td>

          </tr>
          <tr>

            <td style="text-align: center;">

              <h3>Inventory In Report</h3>

            </td>

          </tr>

          <tr>

           <td>

            Printed By: '.$current.' <br>Print Date: '.$todaydate.'

           </td>

          </tr>

          <tr>

            <td>

              <table border="1" width="100%" style="border-collapse: collapse;">

                <tr>

                  <th> ID </th>

                  <th> Invoice No. <br></th> 

                  <th> Invoice<br>Date</th> 

                  <th> Invoice<br>Value</th>

                  <th> Project<br>Name</th>

                  <th> Item</th>

                  <th> Quantity</th>

                  <th> Unit Price</th>

                </tr>'; 
                foreach($data as $row)
            {
           // print_r($row);
            //die();
                $allComplete = $allComplete.
                            "<tr>
                                    <td>".$row->id."</td>
                                    <td>".$row->invoice_no."</td>
                                    <td>".$row->invoice_date."</td>
                                    <td>".$row->invoice_value."</td>
                                    <td>".$row->Project_Name."</td>
                                    <td>".$row->item."</td>
                                     <td>".$row->Quantity."</td>
                                    <td>".$row->Unit_Price."</td>   
                                     
                                    </tr>";
                            
            }

                $allComplete =$allComplete ."<tr><td colspan='7' style='text-align:right;'>Total Amount</td>

                                       <td>".$total_amount."</td></tr></table></body>";
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($allComplete)->setPaper('a4')->setOrientation('landscape');
        return $pdf->stream() ;
       


    }


}//end of inventoryin


public function inventoryout()
    {
      /*$projectdetails= projectdetails::lists('projec_name','projec_name');
        $projectdetails->prepend('', '');
       return view('inventory')->with('projectdetails',$projectdetails);*/

       $projectdetails= projectrecords::lists('project_Name','project_Name');
      $projectdetails->prepend('', '');
        
      $itemname= itemnames::lists('Item_name','Item_name');
      $itemname->prepend('', '');
      //dd($itemname);
       
        return view('inventorysell')->with('projectdetails',$projectdetails)->with('itemname',$itemname);
  }

  public function inventoryoutdata()
  {

     $data = Input::all();
         //dd($data);
        $invoiceno = $data['invoiceno'];
        $projectname = $data['project_name'];
        $invoicevalue = $data['invoicevalue'];
        $invoicedate = $data['Invoicedate'];

        
        

      if($invoicevalue !="" && $projectname != "" && $invoicedate !=""&& $invoiceno != "") {

            $db_invoiceno = DB::table('inventoryouts')->where('Invoice_No', $invoiceno)->count();

             
            //echo $db_invoiceno;
            if($db_invoiceno == 0 ){

              if($data['Quantity'][0]=="")
                  {
                    return view('reportsubmit');
              
                  }

                $error_msg = "";
                $error_msg1= "";
              for($i=0; $i <sizeof($data['item_name']); $i++){
                                          

                  $db_Quantity = DB::table('itemnames')->select('Total_Quantity')
                  ->where('Item_name',$data['item_name'][$i])->get();
                  
                 //dd($db_Quantity);
                 //print_r($db_Quantity);
                  if(($db_Quantity[0]->Total_Quantity-5)==0){

                    $error_msg1 = $error_msg1." Store Quantity for  ".$data['item_name'][$i]." is 5 only so you should not out  that item."."<br />";
                
                    return view('lessitem')->with('error_msg1', $error_msg1)->with('error_msg', $error_msg);
                   }

                  if(($db_Quantity[0]->Total_Quantity-5) < $data['Quantity'][$i]) {

                    $error_msg = $error_msg."Quantity for ".$data['item_name'][$i]." should not be more than ".($db_Quantity[0]->Total_Quantity-5)."<br />";

                    return view('lessitem')->with('error_msg', $error_msg)->with('error_msg1', $error_msg1);
                  }

               }//end of forloop
                
          
            for($i=0; $i <sizeof($data['item_name']); $i++){
                  //for($i=1; $i <11; $i++){

                array(
                      //$Item = $data['Item'][$i],
                      $Item=$data['item_name'][$i],
                      $Quantity = $data['Quantity'][$i],
                      $UnitPrice = $data['Price'][$i],
                      

                  );

               if($Item!="" && $Quantity !="" &&  $UnitPrice !=""){
              
                      //for($i=0; $i <sizeof($data['Item']); $i++) {
                      DB::table('inventoryouts')->insert(array(
                        'Project_Name' => $data['project_name'],
                        'Invoice_No' => $data['invoiceno'],
                        'Invoice_Value' => $data['invoicevalue'],
                        'Invoice_Date' => $data['Invoicedate'],
                        'Item' => $data['item_name'][$i],
                        'Quantity' => $data['Quantity'][$i],
                        'Unit_Price' => $data['Price'][$i],

                       ));
                      
                      DB::table('itemnames')->where('Item_name', $data['item_name'][$i])->decrement('Total_Quantity', $data['Quantity'][$i]); 
                    

                    }
            else {
                    return view('lessitem')->with('error_msg1', $error_msg1)->with('error_msg', $error_msg);

                  } 
              
                }//end of forloop
              }
              else{
            return view('dbinvoiceno');
           } 
          
        }
      else{
        
        return view('inventoryreturn')->with('invoiceno',$invoiceno)->with('invoicevalue',$invoicevalue)->
        with('invoicedate',$invoicedate)->with('projectname',$projectname);
      }
        return view('submitform');
    } 
    
  public function invoiceout()
      {
        $projectdetails= projectrecords::lists('project_Name','project_Name');
        $projectdetails->prepend('', '');
        //dd($amounttotal);
         return view('inventoryoutreport')->with('projectdetails',$projectdetails);
      }       
 
     public function inventory_outreport()
      {
        
        $insert=Input::all();
        //dd($insert);
        $fromdbdate = ($insert['ReportFrom']);
        $todbdate = ($insert['ReportTo']);
        $project_name= $insert['Project_name'];
        date_default_timezone_set('Asia/Kolkata');
        $todaydate = date('Y-m-d H:i:s');
        $current=auth::user()->name;
        $fromdate = strtotime($fromdbdate);
        $todate=strtotime($todbdate);
        $startdate = date('Y-m-d H:i:s',$fromdate);
        $enddate = date('Y-m-d H:i:s',$todate);
         
      if($project_name != "")
        {
            $data = DB::table('inventoryouts')->whereBetween('Invoice_Date', [ $startdate,$enddate])->where('Project_Name',$project_name)->get();
            
            $totalamount = DB::table('inventoryouts')->select('Item','Quantity','Unit_Price')->whereBetween('Invoice_Date', [ $startdate,$enddate])->where('Project_Name',$project_name)->get();//get();
            //dd($totalamount);
             //print_r($data);
              //die()
             $total_amount=0;
             for($i=0;$i<sizeof($totalamount);$i++)
             {
              $total_amountstr = ($totalamount[$i]->Quantity)*($totalamount[$i]->Unit_Price);
              $total_amount = ($total_amount + $total_amountstr);

            //$total_amount= $total_amount + ($totalamount[$i]->Quantity)*($totalamount[$i]->Unit_Price);

              }
            $allComplete = '<body style=margin-left:10%>

                            <table margin-left:10%>
                            <tr><h3><center>Mactus Technology Solutions <br> Inventory Out Report</center></h3>
                            </tr>       
                                        
                            </table>
                            <table>
                            <tr > Printed By: '.$current.' <br> Print Date: '.$todaydate.'<br></tr>
                            </table>';
            if(isset($data[0]))
            {
              $allComplete = $allComplete. 
              '<table><tr><td>Project Name:-'.$data[0]->Project_Name.'<td></tr></table>';
              }
              else {
                  echo"some error?";
                 }   

            $allComplete = $allComplete.  '<table border=2 style='.'"border-collapse:collapse">
                        <tr>
                            <th style=width:80> ID </th>
                            <th style=width:90> Invoice No. </th> 
                            <th style=width:90> Invoice Date</th> 
                             <th style=width:90> Invoice Value</th>
                            
                            <th style=width:90> Item</th>
                            <th style=width:80> Quantity</th>
                            <th style=width:90> Unit Price</th>
                            

                            
                        </tr>';


        foreach($data as $row)
         {
            //print_r($row);
            //die();
          $allComplete = $allComplete.
                        "<tr>
                            <td>".$row->id."</td>
                            <td>".$row->Invoice_No."</td>
                            <td>".$row->Invoice_Date."</td>
                            <td>".$row->Invoice_Value."</td>
                                   
                            <td>".$row->Item."</td>
                            <td>".$row->Quantity."</td>
                            <td>".$row->Unit_Price."</td></tr>";
        }

          $allComplete =$allComplete ."<tr><td colspan='6' style='text-align:right;'>Total Amount</td>
                            <td>".$total_amount."</td></tr></table></body>";
          
          $pdf = App::make('dompdf.wrapper');
          $pdf->loadHTML($allComplete)->setPaper('a4')->setOrientation('landscape');
          return $pdf->stream() ;
        
      }elseif($project_name == ""){
            
             $data = DB::table('inventoryouts')->whereBetween('Invoice_Date', [ $startdate,$enddate])->get();

             $totalamount = DB::table('inventoryouts')->select('Item','Quantity','Unit_Price')->whereBetween('Invoice_Date',[ $startdate,$enddate])->get();
            
            $total_amount=0;
           for($i=0;$i<sizeof($totalamount);$i++)
          {
            //$total_amount= $total_amount + ($totalamount[$i]->Quantity)*($totalamount[$i]->Unit_Price);
            $total_amountstr = ($totalamount[$i]->Quantity)*($totalamount[$i]->Unit_Price);
              $total_amount = ($total_amount + $total_amountstr);
          }
                //echo"<h3>{{ Html::image('img/mactus.gif', 'a picture', array('class' => 'thumb')) }}</h3>";
                 //echo $url = asset('img/pic_mountain.jpg');
          $allComplete =  '<body>
                          <table width="100%">
                        <tr> <td style="border-bottom: 1px solid black; margin: 0; padding: 0;">

              <img src="img/mactus.gif" alt="logo" style="margin:0; padding: 0;"/>

              <span style="display: inline-block; text-align: right; margin-right: 7.5%;">

                <h5 style="margin: 5px;">Mactus Technology Solutions LLP</h5>

                <h6 style="margin: 5px;">

                  107 3rd Cross Road, 4th Main Road,<br />

                  MICO Layout II Stage, Arekere,<br />

                  Bannerghatta Road, Bangalore 560076 <br />

                  Email : contact@mactus.in<br />

                  Telephone : +91 80 26493474

                </h6>

              </span>

            </td>

          </tr>
          <tr>

            <td style="text-align: center;">

              <h3>Inventory Out Report</h3>

            </td>

          </tr>

          <tr>

           <td>

            Printed By: '.$current.' <br>Print Date: '.$todaydate.'

           </td>

          </tr>

          <tr>

            <td>

              <table border="1" width="100%" style="border-collapse: collapse;">

                <tr>

                  <th> ID </th>

                  <th> Invoice No. <br></th> 

                  <th> Invoice<br>Date</th> 

                  <th> Invoice<br>Value</th>

                  <th> Project<br>Name</th>

                  <th> Item</th>

                  <th> Quantity</th>

                  <th> Unit Price</th>

                </tr>'; 
   foreach($data as $row)
         {
           // print_r($row);
            //die();

            
              $allComplete = $allComplete.
                            "<tr>
                                      <td>".$row->id."</td>
                                    <td>".$row->Invoice_No."</td>
                                    <td>".$row->Invoice_Date."</td>
                                    <td>".$row->Invoice_Value."</td>
                                    <td>".$row->Project_Name."</td>
                                    <td>".$row->Item."</td>
                                     <td>".$row->Quantity."</td>
                                    <td>".$row->Unit_Price."</td>   
                                     
                                    </tr>";
                            
        }

          $allComplete =$allComplete ."<tr><td colspan='7' style='text-align:right;'>Total Amount</td>

        <td>".$total_amount."</td></tr></table></body>";

       

        
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($allComplete)->setPaper('a4')->setOrientation('landscape');
        return $pdf->stream() ;
       


    }


}//end of enventorylog out

 public function pdfview(Request $request)

    {

        $items = DB::table('itemnames')->get();
  //dd($items);
        view()->share('itemnames',$items);


        if($request->has('download')){

            $pdf = PDF::loadView('pdfview1');

            return $pdf->download('pdfview1');

            
        }

        return view('pdfview1');//->('items',$items);
}

 public function conferm()
{
  Alert::message("Are you sure to submit the data")->persistent('OK!');
  return view('conferm');
}

public function additemview()
{
  return view('additemview');
}

public function additem(){

      $data = Input::all();
      //dd($data);
      for($i=0; $i <sizeof($data['Item']); $i++)
      {
           array(
                      //$Item = $data['Item'][$i],
                      $Item=$data['Item'][$i],
                      $Code=$data['Code'][$i],
                      $Quantity = $data['Quantity'][$i],
                      $UnitPrice = $data['Price'][$i],
                      

                  );

       if($Item !="" && $Code !="" && $Quantity !=""&& $UnitPrice !=""){
         DB::table('itemnames')->insert(array(
                        'Item_name' => $data['Item'][$i],
                        'Item_Code'=>  $data['Code'][$i],
                        'Total_Quantity' => $data['Quantity'][$i],
                        'Unit_Price'    => $data['Price'][$i],
                        'Item_Model_No' => $data['Model'][$i],
                        'Category_Id'   => $data['Category'][$i]

                        ));

      
     }

     //} 
        else
        {
          return view('reportsubmit');
        }
       } 
       return view('additem');

    }

     public function ItemReportView()
    {

       $itemname= itemnames::lists('Item_name','Item_name');
      $itemname->prepend('', '');

      return view('ItemReportForm')->with('itemname',$itemname);
    }


    public function ItemReport(Request $request)
    {
      //$insert=Input::all();
       $current=auth::user()->name;

       /*$fromdbdate = ($insert['ReportFrom']);
        $todbdate = ($insert['ReportTo']);
        $Itemname= $insert['Item_Name'];
        date_default_timezone_set('Asia/Kolkata');
        $todaydate = date('Y-m-d H:i:s');
        $current=auth::user()->name;
        $fromdate = strtotime($fromdbdate);
        $todate=strtotime($todbdate);
        $startdate = date('Y-m-d H:i:s',$fromdate);
        $enddate = date('Y-m-d H:i:s',$todate);*/


       
        if($request->has('download')){

         // $pdf = PDF::loadView('pdf.invoice', $data);
            //return $pdf->download('invoice.pdf');

     /*$fromdbdate = $todbdate= $Itemname = $startdate = $enddate ="";  

   


  if (isset($_POST['ReportFrom'])) {
      $fromdbdate = $_POST['ReportFrom'];
      $todbdate = $_POST['todbdate']; //this is line 32 and so on...
      $Itemname = $_POST['Itemname'];
      $startdate = $_POST['startdate'];
      $endtdate = $_POST['endtdate'];

      
//}*/




         /* $fromdbdate = ($insert['ReportFrom']);
        $todbdate = ($insert['ReportTo']);
        $Itemname= $insert['Item_Name'];
        date_default_timezone_set('Asia/Kolkata');
        $todaydate = date('Y-m-d H:i:s');
        //$current=auth::user()->name;
        $fromdate = strtotime($fromdbdate);
        $todate=strtotime($todbdate);
        $startdate = date('Y-m-d H:i:s',$fromdate);
        $enddate = date('Y-m-d H:i:s',$todate);*/


            $pdf = PDF::loadView(' ItemReport');

            return $pdf->download('ItemReport');//->with('fromdbdate',$fromdbdate)->with('todbdate',$todbdate)->('Itemname',$Itemname)->with('todaydate',$todaydate )->with('fromdate',$fromdate)->('todate',$todate)->with('startdate',$startdate)->with('enddate',$enddate );

            
        }
       //} 

        return view('ItemReport');//->with('fromdbdate',$fromdbdate);//->('insert',$insert)->('data',$data);//->('items',$items);

    }


public function addItemCategory()
    {

      return view('addItemCategory');
    }

    public function dbaddCategory()
    {
      $data = Input::all();

      $Category = $data['Category'];

      if($Category != "")
      {

      DB::table('item__categories')->insert(array(
                        
                        'Item_Category_Type' => $data['Category'],
                        ));

           return view('additem');  

           }

   
   else{
    return view('reportsubmit');
   }           
    }


         
}
