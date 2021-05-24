<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');
// Route::get('/my', 'HomeController@test')->name('login');


Route::get('/userlist','UserController@index')->name('userlist');
Route::get('/user-create','UserController@create')->name('user-create');
Route::post('/user-store','UserController@store')->name('user-store');
Route::get('/user-edit/{id}','UserController@edit')->name('user-edit');
Route::post('/user-update/{id}','UserController@update')->name('user-update');
Route::get('/user-delete/{id}','UserController@delete')->name('user-delete');

Route::get('/rolelist','RoleController@index')->name('rolelist');
Route::get('/role-create','RoleController@create')->name('role-create');
Route::post('/store','RoleController@store')->name('store');
Route::get('/edit/{id}','RoleController@edit')->name('edit');
Route::post('/update/{id}','RoleController@update')->name('update');
Route::get('/delete/{id}','RoleController@delete')->name('delete');

Route::resource('vendor', 'VendorController');
Route::post('/im-vendor-sh','VendorController@vendorexcel')->name('im-vendor-sh');
Route::get('/vendor-format','VendorController@vendorformat')->name('vendor-format');
Route::resource('/PurchaseClient', 'PurchaseClientController');
Route::resource('/BGComm', 'bgcommController');
Route::post('/company_excel/','PurchaseClientController@companyexcel')->name('company_excel');


Route::post('/import_purchase_client/','PurchaseClientController@importclient')->name('import_purchase_client');

Route::get('/get-receiver-company/','PurchaseClientController@get_r_company')->name('get-receiver-company');
Route::get('/get-company-work/','PurchaseClientController@get_c_work')->name('get-company-work');
Route::get('/get-work-details/','PurchaseClientController@get_w_details')->name('get-work-details');
Route::get('/get-work-details/','PurchaseClientController@get_w_details')->name('get-work-details');
Route::get('/vendor_export/','PurchaseClientController@export')->name('vendor_export');
Route::get('/get-perrty-assign-work/','PJobMastController@getperrtyassignwork')->name('get-perrty-assign-work');
Route::get('/get-petty-company/','PJobMastController@getpettycompany')->name('get-petty-company');





Route::resource('/Passingn', 'P_assingnController');
Route::get('/get-Pclient-id/','P_assingnController@getpclient')->name('get-Pclient-id');
Route::resource('/PJobMast', 'PJobMastController');
Route::get('/get-Pclient/','PJobMastController@getPclientgstin')->name('get-Pclient');
Route::get('/Passign-client/','P_assingnController@Passignclient')->name('Passign-client');
Route::get('/purchase-work/','PJobMastController@purchasework')->name('purchase-work');
Route::get('/get-preceiver/','PJobMastController@getpreceiver')->name('get-preceiver');
Route::get('/petty-list/','P_assingnController@pettylist')->name('petty-list');

//Route::group(['middleware' =>  ['auth','role:acco_super_admin']], function () {
Route::get('/client-list/','ClientController@index')->name('client-list');
Route::get('/client-create/','ClientController@create')->name('client-create');
Route::post('/client-store/','ClientController@store')->name('client-store');
Route::get('/client-view/{id}','ClientController@details')->name('client-view');
Route::get('/client-edit/{id}','ClientController@edit')->name('client-edit');
Route::put('/client-update/{id}','ClientController@update')->name('client-update');
Route::get('/client-delete/{id}','ClientController@delete')->name('client-delete');
Route::get('/get-client','ClientController@getclient')->name('get-client');
Route::get('/get-company-client','ClientController@get_c_client')->name('get-company-client');
Route::get('/get-client-work','ClientController@get_c_work')->name('get-client-work');
Route::get('/get-sale-details','ClientController@get_s_details')->name('get-sale-details');
Route::get('/get-city-name','ClientController@getcityname')->name('get-city-name');
Route::get('/get-client-name','ClientController@getclientbene')->name('get-client-bene');
Route::get('/get-benfi-details','ClientController@getbenfidetails')->name('get-benfi-details');
Route::get('/client_export/','ClientController@export')->name('client_export');
//});

Route::get('/assign-client-list','AssignClientController@index')->name('assign-client-list');
Route::get('/create-ac','AssignClientController@create')->name('create-ac');
Route::post('/assined-store','AssignClientController@store')->name('assined-store');
Route::get('/edit-ac/{id}','AssignClientController@edit')->name('edit-ac');
Route::post('/update-ac/{id}','AssignClientController@update')->name('update-ac');
Route::get('/details-ac/{id}','AssignClientController@details')->name('details-ac');
Route::get('/delete-ac/{id}','AssignClientController@delete')->name('delete-ac');
Route::get('/get-client-id/','AssignClientController@getclientid')->name('get-client-id');
Route::get('/assign-client/','AssignClientController@assignclient')->name('assign-client');
Route::get('/get-work/','AssignClientController@getwork')->name('get-work');
Route::get('/get-client-code/','AssignClientController@getclientcode')->name('get-client-code');


Route::get('/benef-list/','BeneficiaryAddController@index')->name('benef-list');
Route::get('/benef-create/','BeneficiaryAddController@create')->name('benef-create');
Route::post('/benef-store/','BeneficiaryAddController@store')->name('benef-store');
Route::get('/benef-edit/{id}','BeneficiaryAddController@edit')->name('benef-edit');
Route::post('/benef-update/{id}','BeneficiaryAddController@update')->name('benef-update');
Route::get('/benef-delete/{id}','BeneficiaryAddController@delete')->name('benef-delete');
Route::get('/benef-details/{id}','BeneficiaryAddController@detail')->name('benef-details');

Route::get('/bg-status','BgSetStatusController@index')->name('bg-status');
Route::get('/bg-add','BgSetStatusController@create')->name('bg-add');
Route::post('/bg-store','BgSetStatusController@store')->name('bg-store');
Route::get('/bg-edit/{id}','BgSetStatusController@edit')->name('bg-edit');
Route::post('/bg-update/{id}','BgSetStatusController@update')->name('bg-update');
Route::get('/bg-delete/{id}','BgSetStatusController@delete')->name('bg-delete');

Route::get('/tax-list/','TaxGstController@index')->name('tax-list');
Route::get('/gst-create/','TaxGstController@create')->name('gst-create');
Route::post('/gst-store/','TaxGstController@store')->name('gst-store');
Route::get('/gst-edit/{id}','TaxGstController@edit')->name('gst-edit');
Route::post('/gst-update/{id}','TaxGstController@update')->name('gst-update');
Route::get('/gst-delete/{id}','TaxGstController@delete')->name('gst-delete');

Route::get('/tds-list/','TaxTdsController@index')->name('tds-list');
Route::get('/tds-create/','TaxTdsController@create')->name('tds-create');
Route::post('/tds-store/','TaxTdsController@store')->name('tds-store');
Route::get('/tds-edit/{id}','TaxTdsController@edit')->name('tds-edit');
Route::post('/tds-update/{id}','TaxTdsController@update')->name('tds-update');
Route::get('/tds-delete/{id}','TaxTdsController@delete')->name('tds-delete');

Route::get('/gstin-list/','GstinController@index')->name('gstin-list');
Route::get('/gstin-create/','GstinController@create')->name('gstin-create');
Route::post('/gstin-store/','GstinController@store')->name('gstin-store');
Route::get('/gstin-edit/{id}','GstinController@edit')->name('gstin-edit');
Route::post('/gstin-update/{id}','GstinController@update')->name('gstin-update');
Route::get('/gstin-delete/{id}','GstinController@delete')->name('gstin-delete');


Route::get('/company-list/','CompanyController@index')->name('company-list');
Route::get('/company-create/','CompanyController@create')->name('company-create');
Route::post('/company-store/','CompanyController@store')->name('company-store');
Route::get('/company-edit/{id}','CompanyController@edit')->name('company-edit');
Route::post('/company-update/{id}','CompanyController@update')->name('company-update');
Route::get('/company-details/{id}','CompanyController@details')->name('company-details');
Route::get('/company-delete/{id}','CompanyController@delete')->name('company-delete');

Route::get('/company-party-list/','CompanyPartyController@index')->name('company-party-list');
Route::get('/company-party-create/','CompanyPartyController@create')->name('company-party-create');
Route::post('/company-party-store/','CompanyPartyController@store')->name('company-party-store');
Route::get('/company-party-details/{id}','CompanyPartyController@details')->name('company-party-details');
Route::get('/company-party-edit/{id}','CompanyPartyController@edit')->name('company-party-edit');
Route::post('/company-party-update/{id}','CompanyPartyController@update')->name('company-party-update');
Route::get('/company-party-delete/{id}','CompanyPartyController@delete')->name('company-party-delete');
Route::get('/get-party','CompanyPartyController@getparty')->name('get-party');



Route::get('/central-party-list/','CenteralPartyController@index')->name('central-party-list');
Route::get('/central-party-create/','CenteralPartyController@create')->name('central-party-create');
Route::post('/central-party-store/','CenteralPartyController@store')->name('central-party-store');
Route::get('/central-party-edit/{id}','CenteralPartyController@edit')->name('central-party-edit');
Route::post('/central-party-update/{id}','CenteralPartyController@update')->name('central-party-update');
Route::get('/central-party-details/{id}','CenteralPartyController@details')->name('central-party-details');
Route::get('/central-party-delete/{id}','CenteralPartyController@delete')->name('central-party-delete');

Route::get('/permissionlist','PermissionController@index')->name('permissionlist');
Route::get('/permission-create','PermissionController@create')->name('permission-create');
Route::post('/permission-store','PermissionController@store')->name('permission-store');
Route::get('/permission-edit/{id}','PermissionController@edit')->name('permission-edit');
Route::post('/permission-update/{id}','PermissionController@update')->name('permission-update');
Route::get('/permission-delete/{id}','PermissionController@delete')->name('permission-delete');

Route::get('/user-role-view/{id}','UserRoleController@index')->name('user-role-view');
Route::get('/user-role-add/{id}','UserRoleController@roleadd')->name('user-role-add');
Route::post('/role-user-store/{id}','UserRoleController@store')->name('role-user-store');

Route::get('/role-permission-view/{id}','UserPermissionController@index')->name('user-permission-view');
Route::post('/role-permission-store/{id}','UserPermissionController@store')->name('role-permission-store');

Route::post('/fund-request-amount-store/{id}','FundRequestAmountController@store')->name('fund-request-amount-store');

Route::get('/fund-request-list','FundRequstController@index')->name('fund-request-list');
Route::get('/fund-request-create','FundRequstController@create')->name('fund-request');
Route::post('/fund-request-store','FundRequstController@store')->name('fund-request-store');
Route::post('/fund-request-add','FundRequstController@requestadd')->name('fund-request-add');
Route::get('/fund-request-edit/{id}{job_id}','FundRequstController@fund_edit')->name('fund-request-edit');
Route::post('/fund-request-update/{id}','FundRequstController@fund_update')->name('fund-request-update');
Route::get('/fund-request-approval/{id}','FundRequstController@requestapproval')->name('fund-request-approval');
Route::get('/fund-list-draft','FundRequstController@fundlistdraft')->name('fund-list-draft');
Route::get('/fund-amount-details/{id}','FundRequstController@fundamountdetails')->name('fund-amount-details');
Route::get('/fund-approve-sadmin/{id}','FundRequstController@fundapprovesadmin')->name('fund-approve-sadmin');

Route::get('/expense-list','ExpenseController@index')->name('expense-list');
Route::post('/expenses-add','ExpenseController@store')->name('expenses-add');
Route::get('/expenses-edit/{id}','ExpenseController@edit')->name('expense-edit');
Route::post('/expenses-update/{id}','ExpenseController@update')->name('expense-update');
Route::get('/expenses-delete/{id}','ExpenseController@delete')->name('expense-delete');

Route::get('/expense-report-list','ExpenseReportController@index')->name('expense-report-list');
Route::post('/expense-report-store','ExpenseReportController@store')->name('expense-report-store');
Route::get('/expense-report-edit/{id}','ExpenseReportController@edit')->name('expense-report-edit');
Route::post('/expense-report-update/{id}','ExpenseReportController@update')->name('expense-report-update');
Route::get('/expense-report-approval/{id}','ExpenseReportController@approval')->name('expense-report-approval');
Route::get('/expense-report-delete/{id}','ExpenseReportController@delete')->name('expense-report-delete');

Route::get('/download/{file}','GuaranteeController@download')->name('download');

Route::get('/bank-list','BankController@index')->name('bank-list');
Route::get('/bank-add','BankController@create')->name('bank-add');
Route::post('/bank-store','BankController@store')->name('bank-store');
Route::get('/bank-edit/{id}','BankController@edit')->name('bank-edit');
Route::post('/bank-update/{id}','BankController@update')->name('bank-update');
Route::get('/bank-detail-view/{id}','BankController@detailsview')->name('bank-detail-view');
Route::get('/bank-delete/{id}','BankController@delete')->name('bank-delete');

Route::get('/master-page','MasterController@index')->name('master-page');
Route::get('/job-list','MasterController@joblist')->name('job-list');
Route::get('/job-create','MasterController@jobcreate')->name('job-create');
Route::post('/job-store','MasterController@jobstore')->name('job-store');
Route::get('/job-edit/{id}','MasterController@jobedit')->name('job-edit');
Route::post('/job-update/{id}','MasterController@jobupdate')->name('job-update');
Route::get('/job-details/{id}','MasterController@details')->name('job-details');
Route::get('/job-delete/{id}','MasterController@jobdelete')->name('job-delete');
Route::get('/get-client-assign-work/','MasterController@getclientassignwork')->name('get-client-assign-work');

Route::get('/beneficiary-request-list','BeneficiaryRequestController@index')->name('beneficiary-request-list');
Route::get('/beneficiary-request-add','BeneficiaryRequestController@create')->name('beneficiary-request-add');
Route::get('/get-job-id','BeneficiaryRequestController@getjobid')->name('get-job-id');
Route::post('/beneficiary-store','BeneficiaryRequestController@store')->name('beneficiary-store');
Route::get('/beneficiary-request-edit/{id}','BeneficiaryRequestController@edit')->name('beneficiary-request-edit');
Route::post('/beneficiary-request-update/{id}','BeneficiaryRequestController@update')->name('beneficiary-request-update');
Route::get('/beneficiary-request-details/{id}','BeneficiaryRequestController@details')->name('beneficiary-request-details');
Route::get('/beneficiary-request-delete/{id}','BeneficiaryRequestController@delete')->name('beneficiary-request-delete');
Route::get('/Guarantee-type-list','BeneficiaryRequestController@guranteetypelist')->name('Guarantee-type-list');
Route::get('/guarantee-view/{id}','BeneficiaryRequestController@guaranteedetails')->name('guarantee-view');
Route::get('/guarantee-edit/{id}','BeneficiaryRequestController@guaranteeedit')->name('guarantee-edit');
Route::post('/guarantee-update-bg/{id}','BeneficiaryRequestController@guaranteeupdate')->name('guarantee-update-bg');
Route::get('/gaurantee-delete/{id}','BeneficiaryRequestController@gauranteedelete')->name('gaurantee-delete');
Route::get('/guarantee-type-add/','BeneficiaryRequestController@gauranteadd')->name('guarantee-type-add');
Route::post('/guarantee-store/','BeneficiaryRequestController@gauranteestore')->name('guarantee-store');
Route::get('/get-job-sale/','BeneficiaryRequestController@getjobsale')->name('get-job-sale');
Route::get('/beneficiary-status/{id}','BeneficiaryRequestController@beneficiarystatus')->name('beneficiary-status');
Route::get('/beneficiary-admin/{id}','BeneficiaryRequestController@beneficiaryadmin')->name('beneficiary-admin');
Route::get('/beneficiary-sadmin/{id}','BeneficiaryRequestController@beneficiarysadmin')->name('beneficiary-sadmin');


Route::get('/guarantee-list/','GuaranteeController@index')->name('guarantee-list');
Route::post('/guarantee-add/','GuaranteeController@store')->name('guarantee-add');
Route::get('/get-bg-code/','GuaranteeController@getbgcode')->name('get-bg-code');
Route::get('/get-bg-show/','GuaranteeController@getbgshow')->name('get-bg-show');
Route::get('/get-cmpg/','GuaranteeController@getcmpg')->name('get-cmpg');
Route::get('/guarantee-request-edit/{id}','GuaranteeController@edit')->name('guarantee-request-edit');
Route::get('/guarantee-temp-edit/{id}','GuaranteeController@tempedit')->name('guarantee-temp-edit');
Route::get('/get-branch/','GuaranteeController@getbranch')->name('get-branch');
Route::post('/guarantee-update/{id}','GuaranteeController@update')->name('guarantee-update');
Route::post('/guarantee-temp-update/{id}','GuaranteeController@tempupdate')->name('guarantee-temp-update');
Route::get('/guarantee-details/{id}','GuaranteeController@details')->name('guarantee-details');
Route::get('/guarantee-request-delete/{id}','GuaranteeController@delete')->name('guarantee-request-delete');
Route::get('/guarantee-request-approval/{id}','GuaranteeController@approval')->name('guarantee-request-approval');
Route::get('/guarantee-approval-list/','GuaranteeController@approvallist')->name('guarantee-approval-list');
Route::get('/guarantee-sa-approve/{id}','GuaranteeController@sadminapproval')->name('guarantee-sa-approve');
Route::get('/gua_sheet_for/','GuaranteeController@guaformat')->name('gua_sheet_for');


Route::get('/due_amount_list','DueAmountController@index')->name('due_amount_list');
Route::get('/due_create','DueAmountController@create')->name('due_create');

Route::get('/customer-list','CustomerController@index')->name('customer-list');
Route::get('/customer-add','CustomerController@create')->name('customer-add');
Route::get('/get-city','CustomerController@getcity')->name('get-city');
Route::post('/customer-store','CustomerController@store')->name('customer-store');
Route::get('/customer-edit/{id}','CustomerController@edit')->name('customer-edit');
Route::post('/customer-update/{id}','CustomerController@update')->name('customer-update');


// Route::post('/loginuser','HomeController@loginuser')->name('loginuser');
//Route::view('/saleform','pages.salesform')->name('saleform');
Route::get('/saleform','SalesController@index')->name('saleform');
Route::get('/comp-wise-job','SalesController@compwisejob')->name('comp-wise-job');
Route::get('/get-receiver','SalesController@receiver')->name('get-receiver');
Route::post('/sales_store','SalesController@store')->name('sales_store');
Route::get('/salelist','SalesController@salelist')->name('salelist');
Route::get('/saledetails/{id}','SalesController@saledetails')->name('saledetails');
Route::get('/saleedit/{id}','SalesController@saleedit')->name('saleedit');
Route::post('/salesupdate/{id}','SalesController@salesupdate')->name('salesupdate');
Route::get('/saledelete/{id}','SalesController@saledelete')->name('saledelete');
Route::post('/export-sale-filter','SalesController@exportsalefilter')->name('export-sale-filter');
//Route::get('/search-data/','SalesController@searchdata')->name('search-data');
Route::get('/delete-add-row/','SalesController@deleterow')->name('delete-add-row');
Route::get('/download-pdf/{id}','SalesController@download_pdf')->name('download-pdf');

Route::get('/purchaseform','PurchaseController@index')->name('purchaseform');
Route::post('/purchase_store','PurchaseController@purchase_store')->name('purchase_store');
Route::get('/purchaselist','PurchaseController@purchaselist')->name('purchaselist');
Route::get('/purchasedetails/{id}','PurchaseController@purchasedetails')->name('purchasedetails');
Route::get('/purchaseedit/{id}','PurchaseController@purchaseedit')->name('purchaseedit');
Route::post('/update_purchase/{id}','PurchaseController@update_purchase')->name('update_purchase');
Route::get('/purchasedelete/{id}','PurchaseController@purchasedelete')->name('purchasedelete');
Route::get('/delete-check-row/','PurchaseController@deletecheck')->name('delete-check-row');
Route::get('/delete-edit-check/','PurchaseController@deleteeditcheck')->name('delete-edit-check');
Route::get('/get-current-out/','PurchaseController@getoutstanding')->name('get-current-out');
// Auth::routes();
//import excel
Route::post('/import_client/','ClientController@importclient')->name('import_client');
Route::get('/export_client/','ClientController@exportclient')->name('export_client');
Route::get('/client_sheet/','ClientController@clientsheet')->name('client_sheet');
Route::get('/client-format/','ClientController@clientformat')->name('client-format');

Route::post('/client-job-create/','MasterController@clientjobexcel')->name('client-job-create');
Route::get('/client-job-format/','MasterController@clientjobformat')->name('client-job-format');



Route::post('/pjov_excel/','PJobMastController@pjovexcel')->name('pjov_excel');
Route::get('/petty-job-format/','PJobMastController@pettyjobformat')->name('petty-job-format');
Route::post('/sale-sheet-import/','SalesController@salesheetimport')->name('sale-sheet-import');

Route::post('/import_gurantee_detail/','GuaranteeController@importgurantee')->name('import_gurantee_detail');
//import excel end

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/login/{username}/{pass}/', 'HomeController@loginuser')->name('userlogin');
Route::post('/logout', 'HomeController@logout')->name('logout');


/*_________Receiving Request_________*/

Route::resource('receiving-request', 'ReceivingReqController');
Route::get('receiving-site', 'ReceivingReqController@receivingSite')->name('receiving-site');
Route::get('receiving-request/{id}/show', 'ReceivingReqController@showRequest')->name('receiving-request.show');
Route::get('search-item', 'ReceivingReqController@searchItems')->name('receiving-searach-items');
Route::post('receiving-req-approval', 'ReceivingReqController@requestApproval')->name('receiving-req.approval');

Route::get('receiving-request-history', 'ReceivingReqController@history')->name('receiving-request.history');
Route::get('receiving-challan/{id}', 'ReceivingReqController@challan')->name('receiving-challan');

/*_____Return Receiving______*/

Route::resource('return-receiving', 'ReturnReceivingController');
Route::post('return-fetch-items', 'ReturnReceivingController@fetchItems')->name('return.fetch-items');
Route::post('return-receiving-site', 'ReturnReceivingController@returnReceivingSite')->name('return-receiving-site');

/*_____Receiving - Direct______*/

Route::resource('receiving-direct', 'ReceivingDirectController');
Route::get('receiving-direct-history', 'ReceivingDirectController@history')->name('receiving-direct.history');
Route::post('receiving-direct-approval', 'ReceivingDirectController@receivingApproval')->name('receiving-direct.approval');


/*_____Receiving For New Items______*/

Route::resource('request-new-item', 'ReceivingNewItemController');
Route::get('receiving-new-item-history', 'ReceivingDirectController@history')->name('receiving-newitem.history');

/*_________Site Items_________*/

Route::get('manage-site-items', 'ReceivingNewItemController@manganeSiteItems')->name('manage-site-items');

