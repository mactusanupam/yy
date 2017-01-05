
<?php
use App\teammember;
use App\leavetype;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});	

Route::auth();

Route::get('/home', 'HomeController@index');
Route::post('/home', 'HomeController@index');


Route::get('/inventory', 'HomeController@inventory');
Route::post('/inventory', 'HomeController@inventory');

Route::get('/inventoryin', 'HomeController@inventoryin');
Route::post('/inventoryin', 'HomeController@inventoryin');


Route::get('/invoicein', 'HomeController@invoicein');
//Route::post('/filterdate', 'HomeController@filterdate');

Route::get('/inventoryinreport', 'HomeController@inventoryinreport');
Route::post('/inventoryinreport', 'HomeController@inventoryinreport');


Route::get('/inventoryout', 'HomeController@inventoryout');
Route::post('/inventoryout', 'HomeController@inventoryout');


Route::get('/inventoryoutdata', 'HomeController@inventoryoutdata');
Route::post('/inventoryoutdata', 'HomeController@inventoryoutdata');

Route::get('/invoiceout', 'HomeController@invoiceout');


Route::get('/inventory_outreport', 'HomeController@inventory_outreport');
Route::post('/inventory_outreport', 'HomeController@inventory_outreport');

Route::get('pdfview',array('as'=>'pdfview','uses'=>'HomeController@pdfview'));

Route::get('/conferm', 'HomeController@conferm');
Route::post('/conferm', 'HomeController@conferm');

Route::get('/additemview', 'HomeController@additemview');
Route::post('/additemview', 'HomeController@additemview');



Route::get('/additem', 'HomeController@additem');
Route::post('/additem', 'HomeController@additem');




Route::get('/ItemReportView', 'HomeController@ItemReportView');
Route::post('/ItemReportView', 'HomeController@ItemReportView');

Route::get('ItemReport',array('as'=>'ItemReport','uses'=>'HomeController@ItemReport'));
Route::post('ItemReport',array('as'=>'ItemReport','uses'=>'HomeController@ItemReport'));
  

  Route::get('/addItemCategory', 'HomeController@addItemCategory');
Route::post('/addItemCategory', 'HomeController@addItemCategory');


Route::get('/dbaddCategory', 'HomeController@dbaddCategory');
Route::post('/dbaddCategory', 'HomeController@dbaddCategory');


Route::get('/googlemap','HomeController@googlemap');
Route::post('/googlemap','HomeController@googlemap');


Route::get('/geolocation','HomeController@geolocation');
Route::post('/geolocation','HomeController@geolocation');


Route::get('/geolocationshow','HomeController@geolocationshow');
Route::post('/geolocationshow','HomeController@geolocationshow');



Route::get('/Multimarker','HomeController@Multimarker');
Route::post('/Multimarker','HomeController@Multimarker');


Route::get('/multimarkershow','HomeController@multimarkershow');
Route::post('/multimarkershow','HomeController@multimarkershow');








                                                                         













/*Route::get('/home', 'Inventory@index');
Route::post('/home', 'Inventory@index');

Route::get('/inventory', 'Inventory@inventory');
Route::post('/inventory', 'Inventory@inventory');

Route::get('/inventoryin', 'Inventory@inventoryin');
Route::post('/inventoryin', 'Inventory@inventoryin');
//Route::resource('Inventory', 'Inventory',
                //['only' => ['inventory', 'inventoryin']]);


Route::get('/invoicein', 'Inventory@invoicein');
//Route::post('/filterdate', 'HomeController@filterdate');

Route::get('/inventoryinreport', 'Inventory@inventoryinreport');
Route::post('/inventoryinreport', 'Inventory@inventoryinreport');


Route::get('/inventoryout', 'Inventory@inventoryout');
Route::post('/inventoryout', 'Inventory@inventoryout');


Route::get('/inventoryoutdata', 'Inventory@inventoryoutdata');
Route::post('/inventoryoutdata', 'Inventory@inventoryoutdata');

Route::get('/invoiceout', 'Inventory@invoiceout');


Route::get('/inventory_outreport', 'Inventory@inventory_outreport');
Route::post('/inventory_outreport', 'Inventory@inventory_outreport');

Route::get('pdfview',array('as'=>'pdfview','uses'=>'Inventory@pdfview'));

Route::get('/conferm', 'Inventory@conferm');
Route::post('/conferm', 'Inventory@conferm');

Route::get('/additemview', 'Inventory@additemview');
Route::post('/additemview', 'Inventory@additemview');



Route::get('/additem', 'Inventory@additem');
Route::post('/additem', 'Inventory@additem');




Route::get('/ItemReportView', 'Inventory@ItemReportView');
Route::post('/ItemReportView', 'Inventory@ItemReportView');

Route::get('ItemReport',array('as'=>'ItemReport','uses'=>'Inventory@ItemReport'));
Route::post('ItemReport',array('as'=>'ItemReport','uses'=>'Inventory@ItemReport'));


Route::get('/addItemCategory', 'Inventory@addItemCategory');
Route::post('/addItemCategory', 'Inventory@addItemCategory');


Route::get('/dbaddCategory', 'Inventory@dbaddCategory');
Route::post('/dbaddCategory', 'Inventory@dbaddCategory');*/












Route::get('/project', 'HomeController@project');
Route::get('/submit1', 'HomeController@submit1');
Route::post('/submit1', 'HomeController@submit1');
Route::get('/PdfReport', 'HomeController@PdfReport');
Route::get('/Admin', 'HomeController@AdminConfig');
Route::get('/Date', 'HomeController@dateselection');

Route::get('/pdfgenerator', 'HomeController@pdfgenerator');
Route::post('/pdfgenerator', 'HomeController@pdfgenerator');

Route::get('/EmployeeProfile', 'HomeController@EmployeeProfile');
Route::post('/EmployeeProfile', 'HomeController@EmployeeProfile');

Route::get('/EmployeeProfile1', 'HomeController@EmployeeProfile1');
Route::post('/EmployeeProfile1', 'HomeController@EmployeeProfile1');

Route::get('/datesubmit', 'HomeController@datesubmit');
Route::post('/datesubmit', 'HomeController@datesubmit');

//Route::get('/AdminReportPage', 'HomeController@AdminReportPage');
//Route::get('/AdminReportPage', 'HomeController@AdminReportPage'); 


Route::get('/PdfReport1', 'HomeController@AdminReportPage');
Route::get('/PdfReport1', 'HomeController@AdminReportPage'); 

Route::get('/ProjectReport', 'HomeController@ProjectReportPage');
Route::get('/ProjectReport', 'HomeController@ProjectReportPage');

Route::get('/ServiceLogReport', 'HomeController@ServiceLogReportPage');
Route::get('/ServiceLogReport', 'HomeController@ServiceLogReportPage');

Route::get('/PdfReportByUserName', 'HomeController@PdfReportByUserName');
Route::get('/PdfReportByUserName', 'HomeController@PdfReportByUserName');

Route::get('/userpdfsubmit', 'HomeController@userpdfsubmit');
Route::post('/userpdfsubmit', 'HomeController@userpdfsubmit');

Route::get('/PdfReportByProjectName', 'HomeController@PdfReportByProjectName');
Route::get('/PdfReportByProjectName', 'HomeController@PdfReportByProjectName');

Route::get('/projectpdfsubmit', 'HomeController@projectpdfsubmit');
Route::post('/projectpdfsubmit', 'HomeController@projectpdfsubmit');

Route::get('/submitprojectname', 'HomeController@submitprojectname');
Route::post('/submitprojectname', 'HomeController@submitprojectname');

Route::get('/AdminConfigPage', 'HomeController@AdminConfigPage');
Route::post('/AdminConfigPage', 'HomeController@AdminConfigPage');

Route::get('/Addnewproject', 'HomeController@Addnewproject');
Route::post('/Addnewproject', 'HomeController@Addnewproject');


Route::get('/SubmitInformation', 'HomeController@SubmitInformation');
Route::post('/SubmitInformation', 'HomeController@SubmitInformation');

Route::get('/informationdb', 'HomeController@informationdb');
Route::post('/informationdb', 'HomeController@informationdb');


Route::get('/ApplyLeave', 'HomeController@ApplyLeave');
Route::post('/ApplyLeave', 'HomeController@ApplyLeave');

Route::get('/ApplyLeaveSubmit', 'HomeController@ApplyLeaveSubmit');
Route::post('/ApplyLeaveSubmit', 'HomeController@ApplyLeaveSubmit');



Route::get('/SiteInformation', 'HomeController@SiteInformation');
Route::post('/SiteInformation', 'HomeController@SiteInformation');

Route::get('/submitsitetname', 'HomeController@submitsitetname');
Route::post('/submitsitetname', 'HomeController@submitsitetname');



Route::get('/report123', 'HomeController@report123');
Route::post('/report123', 'HomeController@report123');

Route::get('/DisableEnableProject', 'HomeController@DisableEnableProject');
Route::post('/DisableEnableProject', 'HomeController@DisableEnableProject');

Route::get('/submitprojectstatus', 'HomeController@submitprojectstatus');
Route::post('/submitprojectstatus', 'HomeController@submitprojectstatus');

Route::post('/openpdf', 'HomeController@openpdf');

//Leave Approval

Route::get('/LeaveApproval', 'HomeController@LeaveApproval');
Route::post('/LeaveApproval', 'HomeController@LeaveApproval');

Route::get('/LeaveApproved', 'HomeController@LeaveApproved');
Route::post('/LeaveApproved', 'HomeController@LeaveApproved');  

Route::get('/ManualEntry', 'HomeController@ManualEntry');
Route::post('/ManualEntry', 'HomeController@ManualEntry'); 

Route::get('/submitmanualentry', 'HomeController@submitmanualentry');
Route::post('/submitmanualentry', 'HomeController@submitmanualentry'); 

Route::get('/LeaveReport', 'HomeController@LeaveReport');
Route::post('/LeaveReport', 'HomeController@LeaveReport'); 

Route::get('/GetLeaveReport', 'HomeController@GetLeaveReport');
Route::post('/GetLeaveReport', 'HomeController@GetLeaveReport');

Route::get('/EditLeaveValue', 'HomeController@EditLeaveValue');
Route::post('/EditLeaveValue', 'HomeController@EditLeaveValue');  

Route::get('/Submitavailableleave', 'HomeController@Submitavailableleave');
Route::post('/Submitavailableleave', 'HomeController@Submitavailableleave'); 

Route::get('/Generateservicelog', 'HomeController@Generateservicelog');
Route::post('/Generateservicelog', 'HomeController@Generateservicelog');

Route::get('upload', function(){
	return view('files.upload');
});

Route::post('/handleUpload', 'FileController@handleUpload');

Route::controllers([
   'password' => 'Auth\PasswordController',
]);


Route::get('/chart', function () {
	$typeProject = DB::table('projects')->where('Status', 'Enabled')->get();
	//$hours12=DB::table('projects')->where('project_name', $projectname)->value('Timespent');
  //  dd($typeProject);
	$data = array();
	 foreach($typeProject as $t) {
        $row[0] = $t->project_name;
        $row[1] = $t->Estimated_Time;
        $row[2] = ($t->Timespent);
        array_push($data,$row);
    }
    //dd($data);
	return view('mychart')->with('data', $data);
});	
Route::get('/accreader', 'HomeController@Accessreader');

Route::get('/underdevelopment', 'HomeController@underdevelopment');
Route::post('/underdevelopment', 'HomeController@underdevelopment');

Route::get('/ServiceLog', 'HomeController@ServiceLog');
Route::post('/ServiceLog', 'HomeController@ServiceLog');

Route::get('/SubmitServiceLog', 'HomeController@SubmitServiceLog');
Route::post('/SubmitServiceLog', 'HomeController@SubmitServiceLog');

Route::get('/filterdate', 'HomeController@filterdate');
Route::post('/filterdate', 'HomeController@filterdate');

Route::get('/generateservicelogreport', 'HomeController@generateservicelogreport');
Route::post('/generateservicelogreport', 'HomeController@generateservicelogreport');

// Add new customer details
Route::get('/AddCustomer', 'HomeController@AddCustomer');
Route::post('/AddCustomer', 'HomeController@AddCustomer');

Route::get('/SubmitNewCustomer', 'HomeController@SubmitNewCustomer');
Route::post('/SubmitNewCustomer', 'HomeController@SubmitNewCustomer');

// Add Invoice details
Route::get('/InvoiceInformation', 'HomeController@InvoiceInformation');
Route::post('/InvoiceInformation', 'HomeController@InvoiceInformation');

Route::get('/SubmitInvoiceInformation', 'HomeController@SubmitInvoiceInformation');
Route::post('/SubmitInvoiceInformation', 'HomeController@SubmitInvoiceInformation');

//Service Tax
Route::get('/Taxfilterdate', 'HomeController@Taxfilterdate');
Route::post('/Taxfilterdate', 'HomeController@Taxfilterdate');

Route::get('/generateservicetaxlogreport', 'HomeController@generateservicetaxlogreport');
Route::post('/generateservicetaxlogreport', 'HomeController@generateservicetaxlogreport');


//generatependinglogreport
Route::get('/Pendingfilterdate', 'HomeController@Pendingfilterdate');
Route::post('/Pendingfilterdate', 'HomeController@Pendingfilterdate');

Route::get('/generatependinglogreport', 'HomeController@generatependinglogreport');
Route::post('/generatependinglogreport', 'HomeController@generatependinglogreport');

Route::get('/viewprojects', 'HomeController@viewprojects');
Route::post('/viewprojects', 'HomeController@viewprojects');

Route::get('/Editservicelog', 'HomeController@Editservicelog');
Route::post('/Editservicelog', 'HomeController@Editservicelog');

Route::get('/submitestimatedtime', 'HomeController@submitestimatedtime');
Route::post('/submitestimatedtime', 'HomeController@submitestimatedtime'); 

Route::get('/submiteditservicelog', 'HomeController@submiteditservicelog');
Route::post('/submiteditservicelog', 'HomeController@submiteditservicelog');






Route::get('/AppraisalPage', 'AppraisalController@AppraisalPage');
Route::post('/AppraisalPage', 'AppraisalController@AppraisalPage');

// To define the relationship between users and manager

Route::get('/DefineRelationship', 'AppraisalController@DefineRelationship');
Route::post('/DefineRelationship', 'AppraisalController@DefineRelationship'); 

Route::get('/empmgrrelationshipsubmit', 'AppraisalController@empmgrrelationshipsubmit');
Route::post('/empmgrrelationshipsubmit', 'AppraisalController@empmgrrelationshipsubmit');

// To add the appraisal details 
Route::get('/AppraisalDetails', 'AppraisalController@AppraisalDetails');
Route::post('/AppraisalDetails', 'AppraisalController@AppraisalDetails');

Route::get('/SubmitAppraisalDetails', 'AppraisalController@SubmitAppraisalDetails');
Route::post('/SubmitAppraisalDetails', 'AppraisalController@SubmitAppraisalDetails');

Route::get('/SubmitUserAppraisal', 'AppraisalController@SubmitUserAppraisal');
Route::post('/SubmitUserAppraisal', 'AppraisalController@SubmitUserAppraisal'); 

// To Add organization goals
Route::get('/AddOrganizationGoals', 'AppraisalController@AddOrganizationGoals');
Route::post('/AddOrganizationGoals', 'AppraisalController@AddOrganizationGoals');

Route::get('/SubmitAddOrganizationGoals', 'AppraisalController@SubmitAddOrganizationGoals');
Route::post('/SubmitAddOrganizationGoals', 'AppraisalController@SubmitAddOrganizationGoals'); 

//Appraisal Information for Manager 
Route::get('/AppraisalInformation', 'AppraisalController@AppraisalInformation');
Route::post('/AppraisalInformation', 'AppraisalController@AppraisalInformation');

Route::get('/SubmitManagerAppraisal', 'AppraisalController@SubmitManagerAppraisal');
Route::post('/SubmitManagerAppraisal', 'AppraisalController@SubmitManagerAppraisal'); 

Route::get('/view1', 'AppraisalController@view1');
Route::post('/view1', 'AppraisalController@view1');

Route::get('/moredetailsofuser', 'AppraisalController@moredetailsofuser');
Route::post('/moredetailsofuser', 'AppraisalController@moredetailsofuser'); 



//Route::get('/Editview', 'AppraisalController@Editview');
//Route::post('/Editview', 'AppraisalController@Editview');

//lead information 
Route::get('/lead_value', 'leadcontroller@display_on_lead_value');
Route::get('/lead_progress', 'leadcontroller@display_on_lead_progress');
Route::get('/lead_age', 'leadcontroller@display_on_lead_start_date'); 

//Route::get('/lead', 'leadcontroller@AddNewLead');
//Route::post('/lead', 'leadcontroller@AddNewLead');

Route::get('/AddNewLead', 'leadcontroller@AddNewLead');
Route::post('/AddNewLead', 'leadcontroller@AddNewLead');

Route::get('/submitlead', 'leadcontroller@SubmitLeadInformation');
Route::post('/submitlead', 'leadcontroller@SubmitLeadInformation');

Route::get('/leadreport', 'leadcontroller@leadreport');
Route::post('/leadreport', 'leadcontroller@leadreport');

Route::get('/submitleadreport', 'leadcontroller@submitleadreport');
Route::post('/submitleadreport', 'leadcontroller@submitleadreport'); 

Route::get('/viewleadproject', 'leadcontroller@viewleadproject');
Route::post('/viewleadproject', 'leadcontroller@viewleadproject');

Route::get('/moredetailsoflead', 'leadcontroller@moredetailsoflead');
Route::post('/moredetailsoflead', 'leadcontroller@moredetailsoflead');

Route::get('/Submitleadinfo', 'leadcontroller@Submitleadinfo');
Route::post('/Submitleadinfo', 'leadcontroller@Submitleadinfo');