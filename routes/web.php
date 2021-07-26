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

Route::get('/', 'UserController@index')->name('login');
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function() {
    Route::get('/jinesh', 'JineshController@show');
});

Route::post('/checklogin', 'UserController@checklogin')->name('checklogin');
Route::get('/register', 'UserController@register')->name('register');
Route::post('/logout', 'UserController@logout') ->name('logout');
Route::get('/logout', 'UserController@logout') ->name('mainlogout');
Route::get('/successlogin', 'UserController@successlogin')->middleware('auth')->name('successlogin');
Route::get('customer/add', 'Customer\CustomerController@addLeads')->middleware('auth')->name('customeradd');
Route::post('customer/save', 'Customer\CustomerController@savecustomer')->middleware('auth')->name('savecustomer');
Route::get('customer/{customerId}/editdata', 'Customer\CustomerController@editCustomerData')->middleware('auth')->name('editcustomer');
Route::post('customer/{customerId}/updatecustomerdata', 'Customer\CustomerController@updateCustomerData')->middleware('auth')->name('updatecustomerdata');
Route::get('customer/listCustomer', 'Customer\CustomerController@listCustomerDetails')->middleware('auth')->name('listcustomerdata');
Route::get('customer/getCustomerdata/{type}', 'Customer\CustomerController@getCustomerListingData')->middleware('auth')->name('getcustomerdata');
Route::get('customer/columnsetting', 'Customer\CustomerController@getColumnSettingData')->middleware('auth')->name('getcustomerColumnsettingdata');
Route::get('customer/{customerId}/overview', 'Customer\CustomerController@overviewCustomerData')->middleware('auth')->name('customeroverview');
Route::post('customer/{customerId}/noteadd', 'Customer\CustomerController@noteAdd')->middleware('auth')->name('newnote');
Route::get('customer/customerfilter', 'Customer\CustomerController@customerFilter')->middleware('auth')->name('dashboardcustomerfilter');
Route::post('customer/{customerId}/logdata', 'Customer\CustomerController@logData')->middleware('auth')->name('customerlogdata');
Route::post('customer/{customerId}/documentdata', 'Customer\CustomerController@documentData')->middleware('auth')->name('customerdocdata');
Route::get('customer/{customerId}/documentaddform', 'Customer\CustomerController@documentForm')->middleware('auth')->name('customerdocaddform');
Route::post('customer/{customerId}/savedocument', 'Customer\CustomerController@documentDetailSave')->middleware('auth')->name('customerdocdetailsave');
Route::post('customer/{customerId}/deletedocument', 'Customer\CustomerController@documentDelete')->middleware('auth')->name('customerdocdelete');
Route::get('customer/{customerId}/editdocument/{documentId}', 'Customer\CustomerController@documentEdit')->middleware('auth')->name('customerdocedit');

Route::post('customer/{customerId}/documentedit/{documentId}', 'Customer\CustomerController@documentDataEdit')->middleware('auth')->name('customerdocdetailedit');
Route::get('customer/{customerId}/addcontactperson', 'Customer\CustomerController@addContactPerson')->middleware('auth')->name('addcontactperson');
Route::post('customer/{customerId}/savecontactperson', 'Customer\CustomerController@saveContactPerson')->middleware('auth')->name('savecontactperson');
Route::get('customer/{customerId}/editcontactperson/{contactId}', 'Customer\CustomerController@editContactPerson')->middleware('auth')->name('editcontactperson');
Route::post('customer/{customerId}/updatecontactperson/{contactId}', 'Customer\CustomerController@updatecontactPerson')->middleware('auth')->name('updatecontactperson');

Route::get('customer/{customerId}/deletecontactpersonconfirm/{contactId}', 'Customer\CustomerController@deleteContatctPersonConfirm')->middleware('auth')->name('deletecontactpersonconfirm');
Route::post('customer/{customerId}/deletecontactperson/{contactId}', 'Customer\CustomerController@deleteContatctPerson')->middleware('auth')->name('deletecontactperson');

Route::get('customer/{customerId}/addcustomeraddress', 'Customer\CustomerController@addcustomerAddress')->middleware('auth')->name('addcustomeraddress');
Route::post('customer/{customerId}/savecontactaddress', 'Customer\CustomerController@saveContactAddress')->middleware('auth')->name('savecontactaddress');

Route::get('customer/{customerId}/deletecontactaddressconfirm/{addressId}', 'Customer\CustomerController@deleteContatctAddressConfirm')->middleware('auth')->name('deletecontactaddressconfirm');
Route::post('customer/{customerId}/deletecontactaddress/{addressId}', 'Customer\CustomerController@deletecontactAddress')->middleware('auth')->name('deletecontactaddress');

Route::get('customer/{customerId}/editcontactaddress/{addressId}', 'Customer\CustomerController@editContactAddress')->middleware('auth')->name('editcontactaddress');
Route::post('customer/{customerId}/updatecontactaddress/{addressId}', 'Customer\CustomerController@updatecontactAddress')->middleware('auth')->name('updatecontactaddress');

Route::post('customer/{customerId}/quoterequestlist', 'Quote\QuoteController@quoterequestList')->middleware('auth')->name('quoterequestlist');

Route::get('customer/{customerId}/getquoterequestform', 'Quote\QuoteController@getquoterequestForm')->middleware('auth')->name('getquoterequestform');

Route::post('customer/{customerId}/savecrmrequest', 'Quote\QuoteController@savecrmrequestForm')->middleware('auth')->name('savecrmrequest');

Route::get('customer/{customerId}/editquoterequest/{requestId}', 'Quote\QuoteController@getquoterequestEditForm')->middleware('auth')->name('getquoterequesteditform');
Route::post('customer/{customerId}/editcrmrequest/{requestId}', 'Quote\QuoteController@updatecrmRequest')->middleware('auth')->name('editcrmrequest');
Route::get('customer/quoterequestOverview/{requestId}', 'Quote\QuoteController@requestOverView')->middleware('auth')->name('quoterequestOverview');
Route::get('customer/crmrequestOverview/{requestId}', 'Quote\QuoteController@crmOverviewDetails')->middleware('auth')->name('crmrequestOverview');

Route::post('customer/crmrequestlog/{requestId}', 'Quote\QuoteController@crmLogDetails')->middleware('auth')->name('crmrequestlogdata');
Route::post('customer/{customerId}/crmdocument/{crmId}', 'Quote\QuoteController@customerCrmDocumentDetails')->middleware('auth')->name('customercrmdocuments');

Route::get('customer/{customerId}/crmdocumentaddform/{crmId}', 'Quote\QuoteController@customerCrmDocumentForm')->middleware('auth')->name('customercrmdocaddform');

Route::post('customer/{customerId}/crmdocumentsave/{crmId}', 'Quote\QuoteController@customerCrmDocumentSave')->middleware('auth')->name('customercrmdocdetailsave');

Route::post('customer/{customerId}/crmdocumentdelete/{crmId}', 'Quote\QuoteController@customerCrmDocumentDelete')->middleware('auth')->name('customercrmdocdetaildelete');
Route::post('customer/{customerId}/crmdocumenteditform/{crmId}', 'Quote\QuoteController@customercrmdocumentEdit')->middleware('auth')->name('customercrmdocumenteditform');
Route::post('customer/{customerId}/crmdocumenteditdata/{crmId}', 'Quote\QuoteController@customercrmdocumentDataEdit')->middleware('auth')->name('customercrmdocdetailedit');

Route::get('customer/{customerId}/getCustomerDownload/{policyId}/{filename}', 'Customer\CustomerController@getCustomerDownload')->middleware('auth')->name('getCustomerDownload');

Route::get('customer/{customerId}/crmrequestStatusForm/{crmId}/type/{type}/{status}', 'Quote\QuoteController@customerCrmStatusChangeForm')->middleware('auth')->name('getStatusEditform');

Route::post('customer/{customerId}/crmrequeststatusedit/{crmId}', 'Quote\QuoteController@customerCrmStatusUpdate')->middleware('auth')->name('customercrmstatusedit');
Route::get('customer/{customerId}/brokenslip/{crmId}', 'Quote\QuoteController@brokenslipMainForm')->middleware('auth')->name('brokenslipmainform');
Route::post('customer/{customerId}/brokenslipfields/{crmId}', 'Quote\QuoteController@brokenslipSubfields')->middleware('auth')->name('brokenslipfields');

Route::post('customer/{customerId}/generatebrokingslip/{crmId}', 'Quote\QuoteController@generateBrokingSlip')->middleware('auth')->name('generateBrokingSlip');
Route::get('customer/{customerId}/download/{type}/{crmId}/{filename}/{policyId}', 'Customer\CustomerController@getFileDownload')->middleware('auth')->name('getfiledownload');

Route::get('customer/{customerId}/viewfiles/{type}/{crmId}/{filename}', 'Quote\QuoteController@viewFiles')->middleware('auth')->name('viewfile');
Route::get('customer/{customerId}/deletebrokingslip/{crmId}/{filename}/{docId}', 'Quote\QuoteController@deleteBrokingSlip')->middleware('auth')->name('deletebrokingslip');

Route::get('customer/{customerId}/sendbrokenslippopup/{crmId}/{docId}', 'Quote\QuoteController@senBrokingSlipForm')->middleware('auth')->name('sendbrokenslippopup');

Route::get('customer/{customerId}/sendquotespopup/{crmId}/{docId}/{type}', 'Quote\QuoteController@sendQuoteForm')->middleware('auth')->name('sendquotespopup');


Route::post('customer/{customerId}/sendmaildocument/{type}/{crmId}/{docId}', 'Quote\QuoteController@sendMailDocument')->middleware('auth')->name('sendMailDocument');

Route::post('customer/{customerId}/brokingSliplist/{crmId}', 'Quote\QuoteController@brokingSlipDetails')->middleware('auth')->name('brokingsliplist');

Route::post('customer/{customerId}/createquote/{crmId}', 'Quote\QuoteController@createQuotes')->middleware('auth')->name('createquote');
Route::get('customer/{customerId}/quoteuploadform/{crmId}/{brokenId}', 'Quote\QuoteController@quoteUploadForm')->middleware('auth')->name('quoteuploadform');

Route::post('customer/{customerId}/quotelisting', 'Customer\CustomerController@customerquoteDetails')->middleware('auth')->name('quotelisting');

Route::get('customer/{customerId}/comparisondocuploadform/{crmId}', 'Customer\CustomerController@comparisonUploadForm')->middleware('auth')->name('comparisonuploadform');

Route::get('customer/{customerId}/issuancedocsendform/{crmId}/quote/{quoteId}', 'Quote\QuoteController@getIssuanceDocSendForm')->middleware('auth')->name('issuancedocsendform');

Route::post('customer/{customerId}/sendissuancemaildocument/{crmId}/quote/{quoteId}', 'Customer\CustomerController@sendIssuanceMailDocument')->middleware('auth')->name('sendissuancemaildocument');
Route::get('customer/{customerId}/policy/add/{crmId}/quote/{quoteId}', 'Policy\PolicyController@addPolicy')->middleware('auth')->name('addpolicy');

Route::post('customer/seachcustomer/{type}', 'Customer\CustomerController@searchCustomer')->middleware('auth')->name('seachcustomer');

Route::post('customer/savepolicydetails', 'Policy\PolicyController@savePolicyDetails')->middleware('auth')->name('savepolicydetails');

Route::post('customer/productfields', 'Policy\PolicyController@getProductfields')->middleware('auth')->name('productfields');
Route::post('customer/generateinstallment', 'Policy\PolicyController@generateInstallment')->middleware('auth')->name('generateinstallment');

Route::get('policy/createpolicy', 'Policy\PolicyController@createPolicy')->middleware('auth')->name('createpolicy');

Route::get('policy/listpolicy', 'Policy\PolicyController@listPolicy')->middleware('auth')->name('listpolicy');

Route::get('policy/policyoverview/{policyId}', 'Policy\PolicyController@policyDetails')->middleware('auth')->name('policyoverview');

Route::post('/policy/{customerId}/document/{policyId}', 'Policy\PolicyController@documentDetails')->middleware('auth')->name('policydocuments');
Route::get('/policy/{policyId}/{productId}/objectform/{objectId}', 'Policy\PolicyController@editObjectForm')->middleware('auth')->name('editobjectform');

Route::post('/policy/{policyId}/objectupdate/{objectId}', 'Policy\PolicyController@updateObjectDetails')->middleware('auth')->name('updateobjectdata');
Route::get('/policy/{policyId}/product/{productId}', 'Policy\PolicyController@updateCoverageInfo')->middleware('auth')->name('updatecoveragedata');
Route::post('/policy/{policyId}/editproduct', 'Policy\PolicyController@editProductInfo')->middleware('auth')->name('editproductdata');

Route::get('/policy/{policyId}/edit', 'Policy\PolicyController@editPolicyInfo')->middleware('auth')->name('editpolicy');
Route::post('/policy/updateinfo', 'Policy\PolicyController@updatePolicyDetails')->middleware('auth')->name('updatepolicyinfo');
Route::post('/policy/deleteObject', 'Policy\PolicyController@removeObject')->middleware('auth')->name('removeobject');

Route::post('/policy/{policyId}/createObject', 'Policy\PolicyController@creatNewobject')->middleware('auth')->name('createnewobject');
Route::post('/policy/{policyId}/regenerateInstallment', 'Policy\PolicyController@regenerateInstallment')->middleware('auth')->name('regenerateinstallment');

Route::get('/policy/{policyId}/premiuminfodata', 'Policy\PolicyController@getPremiumInfo')->middleware('auth')->name('getpremiuminfodata');
Route::post('/policy/{policyId}/updatepremiuminfodata', 'Policy\PolicyController@savePremiumInfo')->middleware('auth')->name('updatepremiuminfodata');
Route::get('/dashboard', 'Dashboard\DashboardController@dashboardInfo')->middleware('auth')->name('dashboard');

Route::get('/listRequest/status/{status}', 'Dashboard\DashboardController@listCustomerRequest')->middleware('auth')->name('customerrequest');

Route::post('policy/{policyId}/logdata', 'Policy\PolicyController@getPolicyLogInfo')->middleware('auth')->name('policylogdata');
Route::get('customer/{customerId}/addcontactconnection', 'Customer\CustomerController@getcustomerconnectionForm')->middleware('auth')->name('addcontactconnection');
Route::post('customer/{customerId}/saveconnection', 'Customer\CustomerController@savecustomerconnectionDetails')->middleware('auth')->name('saveconnectiondetails');

Route::get('customer/{customerId}/editconnectionform/{connectionid}', 'Customer\CustomerController@getcustomerconnectionDetails')->middleware('auth')->name('editconnectiondetailsform');
Route::post('customer/{customerId}/updateconnection/{connectionid}', 'Customer\CustomerController@updateConnectionDetails')->middleware('auth')->name('updateconnectiondetails');
Route::post('customer/{customerId}/deleteconnection/{connectionid}', 'Customer\CustomerController@deleteConnection')->middleware('auth')->name('deletecustomerconnection');

Route::get('policy/editinstallment/{id}','Policy\PolicyController@editInsatllmentInfo')->middleware('auth')->name('editinstallment');
Route::post('policy/updateinstallment/{id}','Policy\PolicyController@updateInstallment')->middleware('auth')->name('updateinstallment');

Route::get('customer/request/{type}/{id}/{flag}', 'Customer\CustomerController@UpdateFlagDetails')->middleware('auth')->name('updatecrmrequestnotificationflag');
Route::post('customer/changenotificationflag', 'Customer\CustomerController@changeNotificationFlag')->middleware('auth')->name('changenotificationflag');
Route::post('policy/crmrequest/{policyId}', 'Policy\PolicyController@endorsementRequest')->middleware('auth')->name('endorsementrequest');

Route::get('policy/crmrequest/{policyId}/addrequest', 'Policy\PolicyController@createendorsementRequest')->middleware('auth')->name('addendorsementrequest');
Route::post('policy/crmrequest/{policyId}/save', 'Policy\PolicyController@saveCrmRequest')->middleware('auth')->name('saveendorsementcrmrequest');
Route::get('policy/crmrequest/{policyId}/overview/{requestId}', 'Policy\PolicyController@endorsementCrmRequestOverview')->middleware('auth')->name('overviewendorsementcrmrequest');
Route::get('policy/crmrequest/{policyId}/edit/{requestId}', 'Policy\PolicyController@editCrmRequestData')->middleware('auth')->name('editcrmrequestdata');
Route::post('policy/crmrequest/{policyId}/update', 'Policy\PolicyController@updateCrmRequestData')->middleware('auth')->name('updateendorsementcrmrequest');
Route::post('policy/crmrequest/{policyId}/updatestatus', 'Policy\PolicyController@updateCrmRequestStatus')->middleware('auth')->name('updateendorsementrequeststatus');
Route::post('policy/crmrequest/{Id}/uploaddocument', 'Policy\PolicyController@uploadCrmDocument')->middleware('auth')->name('endorsementcrmdocumentsave');
Route::post('policy/crmrequest/{Id}/editdocument', 'Policy\PolicyController@updateCrmDocument')->middleware('auth')->name('endorsementcrmdocumentedit');
Route::get('policy/crmrequest/{Id}/remove', 'Policy\PolicyController@deleteCrmDocument')->middleware('auth')->name('endorsementcrmdocumentremove');
//Endorsement related routes
Route::get('policy/endorsement/{crmId}/add', 'Endorsement\EndorsementController@addEndorsement')->middleware('auth')->name('addendorsement');
Route::post('policy/endorsement/{policyId}/savedetails', 'Endorsement\EndorsementController@saveEndorsementDetails')->middleware('auth')->name('saveendorsementdetails');

Route::post('policy/endorsement/{policyId}/list', 'Endorsement\EndorsementController@listEndorsementDetails')->middleware('auth')->name('listendorsement');
Route::get('policy/endorsement/{policyId}/create', 'Endorsement\EndorsementController@createEndorsementDetails')->middleware('auth')->name('createendorsement');

Route::get('policy/endorsement/{policyId}/editform/{endorsementId}', 'Endorsement\EndorsementController@editEndorsementDetails')->middleware('auth')->name('editendorsement');

Route::post('policy/endorsement/{policyId}/edit/{endorsementId}', 'Endorsement\EndorsementController@updateEndorsementDetails')->middleware('auth')->name('updateendorsementdetails');
Route::get('policy/endorsement/{policyId}/delete/{endorsementId}', 'Endorsement\EndorsementController@deleteEndorsement')->middleware('auth')->name('deleteendorsementdetails');


Route::get('policy/endorsement/{endId}/overview', 'Endorsement\EndorsementController@overviewEndorsement')->middleware('auth')->name('overviewendorsement');

//ANNOUNCEMENT COMPLETE URL
Route::post('policy/endorsementrequst/{erId}/announcementupdate', 'Policy\PolicyController@updateannouncementStatus')->middleware('auth')->name('updateannouncementrequeststatus');

//END



Route::post('customer/{customerId}/policylisting', 'Customer\CustomerController@getPolicylistingData')->middleware('auth')->name('policylisting');

Route::get('customer/allendorsementrequest', 'Endorsement\EndorsementController@viewAllEndorsementRequest')->middleware('auth')->name('allendorsmentrequestlist');
Route::get('customer/addnewendorsementrequest', 'Endorsement\EndorsementController@newEndorsementRequest')->middleware('auth')->name('addnewendorsementrequest');
Route::post('customer/savenewendorsementcrmrequest', 'Endorsement\EndorsementController@saveEndorsementRequest')->middleware('auth')->name('savenewendorsementcrmrequest');
Route::get('customer/{requestid}/deleteendorsementcrmrequest', 'Endorsement\EndorsementController@deleteEndorsementRequest')->middleware('auth')->name('deleteendorsementcrmrequest');
//Complaint related routes
Route::get('complaint/list/{status?}', 'Complaint\ComplaintController@listComplaints')->middleware('auth')->name('complaintlist');
Route::get('complaint/addcomplaint', 'Complaint\ComplaintController@addComplaints')->middleware('auth')->name('addcomplaint');

Route::post('complaint/savecomplaint', 'Complaint\ComplaintController@saveComplaintDetails')->middleware('auth')->name('savecomplaint');
Route::get('complaint/{complaintid}/editcomplaint', 'Complaint\ComplaintController@editComplaintForms')->middleware('auth')->name('editcomplaint');
Route::post('complaint/{complaintid}/updatecomplaint', 'Complaint\ComplaintController@updateComplaintDetails')->middleware('auth')->name('updatecomplaint');
Route::get('complaint/{complaintid}/deletecomplaint', 'Complaint\ComplaintController@deleteComplaint')->middleware('auth')->name('deletecomplaint');
Route::get('complaint/{complaintid}/overview', 'Complaint\ComplaintController@complaintOverview')->middleware('auth')->name('complaintoverview');
Route::post('complaint/clientpolicies', 'Complaint\ComplaintController@getClientPolicies')->middleware('auth')->name('clientpolicies');
Route::post('policy/{policyId}/changestatus', 'Policy\PolicyController@changePolicyStatus')->middleware('auth')->name('changepolicystatus');
Route::get('policy/claimlist', 'Claim\ClaimController@listClaim')->middleware('auth')->name('claimlist');

Route::post('policy/addclaim', 'Claim\ClaimController@createClaim')->middleware('auth')->name('addclaim');
Route::post('policy/claim/saveclaimdetails', 'Claim\ClaimController@saveClaimDetails')->middleware('auth')->name('saveclaimdetails');

Route::post('policy/{policyId}/claims', 'Policy\PolicyController@getClaimDetails')->middleware('auth')->name('getclaimdetails');
Route::get('claim/{claimId}/overviewclaim', 'Claim\ClaimController@claimOverviewDetails')->middleware('auth')->name('overviewclaim');

Route::post('claim/{claimid}/saveclaimant', 'Claim\ClaimController@saveClaimant')->middleware('auth')->name('saveclaimant');
Route::post('claim/claimant/{claimantId}/removeclaimant', 'Claim\ClaimController@removeClaimant')->middleware('auth')->name('removeclaimant');
Route::post('claim/claimant/{claimantId}/updateclaimant', 'Claim\ClaimController@updateClaimant')->middleware('auth')->name('updateclaimant');
Route::post('claim/{claimId}/updatestatus', 'Claim\ClaimController@updateStatus')->middleware('auth')->name('updatestatus');
Route::post('claim/{claimId}/claimlogdata', 'Claim\ClaimController@logData')->middleware('auth')->name('claimlogdata');

Route::post('claim/{claimId}/claimdocumentsave', 'Claim\ClaimController@documentSave')->middleware('auth')->name('claimdocumentsave');
Route::post('claim/{claimId}/claimdocumentedit', 'Claim\ClaimController@documentEdit')->middleware('auth')->name('claimdocumentedit');
Route::get('claim/{claimId}/claimdocumentdelete', 'Claim\ClaimController@deleteDocument')->middleware('auth')->name('claimdocumentdelete');

Route::get('claim/{claimId}/editclaim', 'Claim\ClaimController@editClaim')->middleware('auth')->name('editclaim');

Route::post('claim/{claimId}/updateclaimdetails', 'Claim\ClaimController@updateClaimdetails')->middleware('auth')->name('updateclaimdetails');

Route::post('claim/{claimId}/paymentdetails', 'Claim\ClaimController@paymentDetails')->middleware('auth')->name('paymentdetails');
Route::post('claim/{claimId}/paymentadd', 'Claim\ClaimController@paymentAdd')->middleware('auth')->name('claimpaymentadd');
Route::post('claim/{claimId}/claimreserveadd', 'Claim\ClaimController@reserveAmountAdd')->middleware('auth')->name('claimreserveadd');

Route::post('claim/{claimId}/{historyId}/claimreservedelete', 'Claim\ClaimController@reserveAmountDelete')->middleware('auth')->name('claimreservedelete');
Route::post('claim/{claimId}/{paymentId}/claimpaymentdelete', 'Claim\ClaimController@deductionAmountDelete')->middleware('auth')->name('claimpaymentdelete');


Route::post('/taskreminder/add', 'Dashboard\DashboardController@addTaskReminder')->middleware('auth')->name('addtaskreminder');
Route::get('/appointments', 'Dashboard\DashboardController@appointmentList')->middleware('auth')->name('appointmentlist');

Route::post('/addappointment', 'Dashboard\DashboardController@appointmentAdd')->middleware('auth')->name('addappointment');
Route::get('/deletenotification', 'Dashboard\DashboardController@deleteNotification')->middleware('auth')->name('deletenotification');

Route::get('/salescrmlist', 'Dashboard\DashboardController@salesCrmList')->middleware('auth')->name('salescrmlist');
Route::get('/dashboardcustomers', 'Dashboard\DashboardController@customerList')->middleware('auth')->name('dashboardcustomers');
Route::get('/dashboardcustomerlist', 'Dashboard\DashboardController@dashboardCustomerlist')->middleware('auth')->name('dashboardcustomerlist');
Route::get('/dashboardcomplaintlist/{status?}', 'Dashboard\DashboardController@dashboardComplaintList')->middleware('auth')->name('dashboardcomplaintlist');
Route::get('/dashboardendorsementlist/{status?}', 'Dashboard\DashboardController@dashboardEndorsementList')->middleware('auth')->name('dashboardendorsementlist');

Route::get('/dashboardfinancepolicylist/{status?}', 'Dashboard\DashboardController@dashboardFinancePolicyList')->middleware('auth')->name('dashboardfinancepolicylist');
Route::get('/dashboardfinancepolicydetail', 'Dashboard\DashboardController@dashboardFinancePolicyDetail')->middleware('auth')->name('dashboardfinancepolicydetail');

Route::get('/financeendorsementlist/{status?}', 'Dashboard\DashboardController@financeEndorsementList')->middleware('auth')->name('financeendorsementlist');
Route::get('/financeendorsementDetails', 'Dashboard\DashboardController@financeEndorsementDetail')->middleware('auth')->name('financeendorsementDetails');
Route::post('/endorsementissue', 'Endorsement\EndorsementController@endorsementIssue')->middleware('auth')->name('issueendorsement');

Route::get('/technicalPolicyDetails', 'Dashboard\DashboardController@technicalPolicyDetails')->middleware('auth')->name('technicalPolicyDetails');

Route::post('policy/{policyid}/invoicegenerate','Invoice\InvoiceController@generatePolicyInvoice')->middleware('auth')->name('invoicegenerate');

Route::get('/invoice/list','Dashboard\DashboardController@invoiceList')->middleware('auth')->name('invoicelist');
Route::get('/invoice/{invoiceId}/overview','Invoice\InvoiceController@invoiceOverview')->middleware('auth')->name('invoiceoverview');
Route::get('/invoice/{invoiceId}/overviewdetails','Invoice\InvoiceController@invoiceOverviewDetails')->middleware('auth')->name('invoiceoverviewdetails');
Route::post('/invoice/{invoiceId}/editinvoicedetails','Invoice\InvoiceController@updateInvoiceDetails')->middleware('auth')->name('editinvoicedetails');

Route::post('/invoice/{invoiceId}/savepayment','Invoice\InvoiceController@saveInvoicePayment')->middleware('auth')->name('saveinvoicepayment');

Route::post('/invoice/{invoiceId}/listpayment','Invoice\InvoiceController@listPayments')->middleware('auth')->name('invoicepaymentlist');
Route::get('/invoice/{invoiceId}/removepayment/{paymentId}','Invoice\InvoiceController@deletePayment')->middleware('auth')->name('deleteinvoicepayment');
Route::post('/invoice/{invoiceId}/loglist','Invoice\InvoiceController@listLog')->middleware('auth')->name('invoicelog');

Route::get('/invoice/payments','Dashboard\DashboardController@paymentList')->middleware('auth')->name('invoicepayment');

Route::post('/payments/customerinvoices','Invoice\InvoiceController@getAllInvoices')->middleware('auth')->name('getcustomerinvoice');

Route::get('/leads','Dashboard\DashboardController@leadsDetails')->middleware('auth')->name('leads');

Route::post('/createevents', 'Dashboard\DashboardController@createEvents')->middleware('auth')->name('createevents');
Route::post('/createappointments', 'Dashboard\DashboardController@createMultiDayEvents')->middleware('auth')->name('createappointments');
Route::post('/deleteappointments', 'Dashboard\DashboardController@deleteAppointments')->middleware('auth')->name('deleteappointments');

Route::get('/endorsementdetaillist', 'Dashboard\DashboardController@endorsementDetailList')->middleware('auth')->name('dashboardendorsementdetaillist');

Route::get('/dashboardquoteslist', 'Dashboard\DashboardController@quoteDetailList')->middleware('auth')->name('dashboardquoteslist');
Route::get('/dashboardrequestfilter/{rtype}/status/{status}', 'Dashboard\DashboardController@listCustomerRequest')->middleware('auth')->name('dashboardrequestfilter');
Route::get('/reports/sales/request', 'Report\SaleReportController@salesRequest')->middleware('auth')->name('salesrequest');
Route::post('/reports/sales/requestfilter', 'Report\SaleReportController@salesRequestFilter')->middleware('auth')->name('salesrequestfilter');
Route::get('/reports/sales/requestexport', 'Report\SaleReportController@salesRequestExport')->middleware('auth')->name('salesrequestexport');

Route::get('/reports/sales/lead', 'Report\SaleReportController@salesLeads')->middleware('auth')->name('saleslead');
Route::post('/reports/sales/leadfilter', 'Report\SaleReportController@leadFilter')->middleware('auth')->name('leadfilter');
Route::get('/reports/sales/leadexport', 'Report\SaleReportController@leadExport')->middleware('auth')->name('leadexport');

Route::get('/reports/sales/customer', 'Report\SaleReportController@salesCustomer')->middleware('auth')->name('salescustomer');
Route::post('/reports/sales/customerfilter', 'Report\SaleReportController@customerfilter')->middleware('auth')->name('customerfilter');
Route::get('/reports/sales/customerexport', 'Report\SaleReportController@customerexport')->middleware('auth')->name('customerexport');

Route::post('customer/searchuser', 'Customer\CustomerController@searchUser')->middleware('auth')->name('searchuser');

Route::get('reports/operation/request', 'Report\OperationReportController@operationRequest')->middleware('auth')->name('operationrequestreport');
Route::post('/reports/operation/requestfilter', 'Report\OperationReportController@operationRequestFilter')->middleware('auth')->name('requestfilter');
Route::get('/reports/operation/requestexport', 'Report\OperationReportController@requestExport')->middleware('auth')->name('requestexport');

Route::get('/reports/operation/complaint', 'Report\OperationReportController@policyComplaint')->middleware('auth')->name('policycompliant');
Route::post('/reports/operation/complaintFilter', 'Report\OperationReportController@complaintFilter')->middleware('auth')->name('complaintfilter');
Route::get('/reports/operation/complaintexport', 'Report\OperationReportController@complaintExport')->middleware('auth')->name('complaintexport');


Route::get('/reports/operation/claimreport', 'Report\OperationReportController@claimReport')->middleware('auth')->name('claimreport');
Route::post('/reports/operation/claimfilter', 'Report\OperationReportController@claimFilter')->middleware('auth')->name('claimfilter');
Route::get('/reports/operation/claimexport', 'Report\OperationReportController@claimExport')->middleware('auth')->name('claimexport');

Route::get('/reports/operation/endorsementreport', 'Report\OperationReportController@endorsementReport')->middleware('auth')->name('endorsementreport');
Route::post('/reports/operation/endorsementfilter', 'Report\OperationReportController@endorsementFilter')->middleware('auth')->name('endorsementfilter');
Route::get('/reports/operation/endorsementexport', 'Report\OperationReportController@endorsementExport')->middleware('auth')->name('endorsementexport');

Route::get('/reports/technical/corporatepipelinereport', 'Report\technicalReportController@corporatepipelineReport')->middleware('auth')->name('corporatepipelinereport');
Route::post('/reports/technical/pipelinefilter', 'Report\technicalReportController@corporatepipelineFilter')->middleware('auth')->name('pipelinefilter');
Route::get('/reports/technical/pipelineexport', 'Report\technicalReportController@pipelineExport')->middleware('auth')->name('pipelineexport');

Route::get('/reports/technical/productionreport', 'Report\technicalReportController@productionReport')->middleware('auth')->name('productionreport');
Route::post('/reports/technical/productionfilter', 'Report\technicalReportController@productionFilter')->middleware('auth')->name('productionfilter');
Route::get('/reports/technical/productionexport', 'Report\technicalReportController@productionExport')->middleware('auth')->name('productionexport');

Route::get('/reports/technical/renewalreport', 'Report\technicalReportController@allrenewalReport')->middleware('auth')->name('renewalreport');
Route::post('/reports/technical/renewalfilter', 'Report\technicalReportController@renewalFilter')->middleware('auth')->name('renewalfilter');
Route::get('/reports/technical/renewalexport', 'Report\technicalReportController@renewalExport')->middleware('auth')->name('renewalexport');
Route::get('/reports/technical/renewaldaysexport', 'Report\technicalReportController@renewalDaysExport')->middleware('auth')->name('renewaldaysexport');


Route::get('/reports/technical/quotesreport', 'Report\technicalReportController@quoteReport')->middleware('auth')->name('quotesreport');
Route::post('/reports/technical/quotesfilter', 'Report\technicalReportController@quoteFilter')->middleware('auth')->name('quotesfilter');
Route::get('/reports/technical/quotesexport', 'Report\technicalReportController@quoteExport')->middleware('auth')->name('quotesexport');


Route::post('/finance/invoice/{invoiceId}/debtmanagement', 'Invoice\InvoiceController@debtManagementDetails')->middleware('auth')->name('debtmanagement');
Route::get('/finance/invoice/{invoiceId}/debtnoticecall', 'Invoice\InvoiceController@debtNoticecall')->middleware('auth')->name('debtnoticecall');
Route::post('/finance/invoice/{invoiceId}/savenoticecalldetails', 'Invoice\InvoiceController@saveDebtCall')->middleware('auth')->name('savenoticecalldetails');

Route::get('/report/finance/invoicereport', 'Report\FinanceReportController@invoiceDetails')->middleware('auth')->name('invoicereport');
Route::post('/report/finance/invoicefilter', 'Report\FinanceReportController@invoiceFilter')->middleware('auth')->name('invoicefilter');
Route::get('/report/finance/invoiceexport', 'Report\FinanceReportController@invoiceExport')->middleware('auth')->name('invoiceexport');


Route::get('/report/finance/collectionreport', 'Report\FinanceReportController@collectionDetails')->middleware('auth')->name('collectionreport');


Route::get('/report/finance/productionreport', 'Report\FinanceReportController@productionDetails')->middleware('auth')->name('financeproductionreport');
Route::post('/report/finance/productionreport', 'Report\FinanceReportController@productionFilter')->middleware('auth')->name('financeproductionfilter');
Route::get('/report/finance/productionreportexport', 'Report\FinanceReportController@productionExport')->middleware('auth')->name('productionreportexport');


Route::get('/report/finance/installment', 'Report\FinanceReportController@installmentDetails')->middleware('auth')->name('installmentreport');

Route::post('/report/finance/installment', 'Report\FinanceReportController@installmentFilter')->middleware('auth')->name('installmentfilter');

Route::get('/report/finance/installmentexport', 'Report\FinanceReportController@installmentExport')->middleware('auth')->name('installmentexport');

Route::get('/report/finance/postrequestreport', 'Report\FinanceReportController@postrequestDetails')->middleware('auth')->name('financepostrequestreport');
Route::post('/report/finance/postrequestreport', 'Report\FinanceReportController@postrequestFilter')->middleware('auth')->name('financepostrequestfilter');
Route::get('/report/finance/postrequestreportexport', 'Report\FinanceReportController@postrequestExport')->middleware('auth')->name('postrequestreportexport');




Route::get('customer/{customerId}/quotedisplay/{crmId}/{quoteId}', 'Quote\QuoteController@displayQuote')->middleware('auth')->name('displayquote');

Route::get('customer/{customerId}/policy/{policyId}/scheduletask', 'Policy\PolicyController@createSchedule')->middleware('auth')->name('createschedule');
Route::post('customer/{customerId}/policy/{policyId}/addscheduletask', 'Policy\PolicyController@saveSchedule')->middleware('auth')->name('saveschedule');

//IMPORT RELATED ROUTES

Route::get('/customerimport', 'ImportController@customerImport')->middleware('auth')->name('customerimport');
Route::post('/customerdataimport', 'ImportController@customerDataImport')->middleware('auth')->name('customerdataimport');

Route::get('/policyimport', 'ImportController@policyImport')->middleware('auth')->name('policyimport');
Route::post('/policydataimport', 'ImportController@policyDataImport')->middleware('auth')->name('policydataimport');

Route::get('/installmentimport', 'ImportController@installmentImport')->middleware('auth')->name('installmentimport');
Route::post('/installmentdataimport', 'ImportController@installmentDataImport')->middleware('auth')->name('installmentdataimport');

Route::get('/claimimport', 'ImportController@claimImport')->middleware('auth')->name('claimimport');
Route::post('/claimdataimport', 'ImportController@claimDataImport')->middleware('auth')->name('claimdataimport');

Route::get('/customeragentupdate', 'ImportController@customerAgentUpdate')->middleware('auth')->name('customeragentupdate');
Route::post('/customerdetailupdate', 'ImportController@customerAgentConnection')->middleware('auth')->name('customerdetailupdate');

Route::get('/requestimport', 'ImportController@requestImport')->middleware('auth')->name('requestimport');
Route::post('/requestdataimport', 'ImportController@requestDataImport')->middleware('auth')->name('requestdataimport');

Route::get('/policyexcel', 'ImportController@createpolicyExcel')->middleware('auth')->name('policyexcel');

Route::post('/salespersondataimport', 'ImportController@customerSalespersonConnection')->middleware('auth')->name('salespersondataimport');


//RENEWAL REQUEST REPORT
Route::get('/report/renewalrequest', 'Report\OperationReportController@renewalrequestReport')->middleware('auth')->name('reportrenewalrequest');

Route::post('/report/renewalrequestdata', 'Report\OperationReportController@renewalrequestData')->middleware('auth')->name('getrenewalrequestdata');
Route::get('/report/finance/renewalrequestexport', 'Report\OperationReportController@renewalrequestExport')->middleware('auth')->name('renewalrequestexport');

//END RENEWAL REQUEST

//Management board 

Route::get('/managementboard/{clearflag?}','Management\ManagementController@managementBoard')->middleware('auth')->name('managementdashboard');
Route::post('/management/customerfilter','Management\ManagementController@customerFilter')->middleware('auth')->name('managementcustomerfilter');

Route::get('/managementboard/production/policy','Management\ManagementController@managementPolicy')->middleware('auth')->name('managementpolicy');

//Setting routes

Route::get('/changePassword','SettingController@showChangePasswordForm');
Route::post('/changePassword','SettingController@changePassword')->name('changePassword');

//Comments routes
Route::post('customer/{customerId}/savesalescomments/{crmId}', 'Comments\CommentController@saveComments')->middleware('auth')->name('savesalescomments');

Route::post('policy/{policyId}/saveoperationcomments/{requestId}', 'Comments\CommentController@saveEndorsementComments')->middleware('auth')->name('saveendorsementcomments');

//Reminder mail related routes

Route::get('/remainder/mailform/{reminderId}','Dashboard\DashboardController@sendRemindermailForm')->middleware('auth')->name('mailform');
Route::get('/remainder/sendform/{reminderId}','Dashboard\DashboardController@sendReminderMail')->middleware('auth')->name('sendReminderMail');
// Comparison list creation related routes
Route::get('/customer/{customerId}/request/comparison/{crmId}','Quote\QuoteController@createComparisondoc')->middleware('auth')->name('createcomparisondoc');

Route::post('/customer/{customerId}/request/comparisonpdf/{crmId}','Quote\QuoteController@createComparisonpdf')->middleware('auth')->name('comparisonpdfdoc');


 
// Policy checklist related routes 
 
 Route::get('/customer/policy/{policyId}/checklistform','Policy\PolicychecklistController@generateChecklistForm')->middleware('auth')->name('checklistform');
 Route::post('/customer/policy/savechecklistform','Policy\PolicychecklistController@saveChecklistForm')->middleware('auth')->name('savechecklistform');

 //Renewal report
// Route::get('/customer/renewalreport','Policy\PolicychecklistController@generateChecklistForm')->middleware('auth')->name('checklistform');

Route::post('policy/crmrequest/{policyId}/updateinslyFlag/{requestId}', 'Policy\PolicyController@updateInslyFlag')->middleware('auth')->name('updateinslyflag');
Route::post('policy/crmrequest/{policyId}/updateinvoiceFlag/{requestId}', 'Policy\PolicyController@updateInvoiceFlag')->middleware('auth')->name('updateinvoiceflag');

Route::post('customer/{customerId}/changepolicyscheduleflag/{crmId}', 'Quote\QuoteController@changepolicyscheduleFlag')->middleware('auth')->name('changepolicyscheduleflag');

Route::post('policy/crmrequest/changeconnectionflag/{requestId}', 'Policy\PolicyController@connectCrmRequestData')->middleware('auth')->name('changeconnectionflag');

Route::post('policy/endorsement/{Id}/uploaddocument', 'Endorsement\EndorsementController@uploadInvoice')->middleware('auth')->name('endorsementinvoicesave');

Route::post('policy/endorsement/{Id}/updateendorsementstatus', 'Endorsement\EndorsementController@updateEndorsementStatus')->middleware('auth')->name('updateendorsementstatus');
Route::post('policy/endorsement/reject', 'Endorsement\EndorsementController@rejectEndorsement')->middleware('auth')->name('rejectendorsement');

Route::post('policy/reject', 'Policy\PolicyController@rejectPolicy')->middleware('auth')->name('rejectpolicy');

Route::get('finance/operationrequest', 'Dashboard\DashboardController@operationRequestlist')->middleware('auth')->name('financeoperationrequest');

Route::post('customer/{customerId}/uploadbrokingslip/{crmId}', 'Quote\QuoteController@uploadbrokingSlip')->middleware('auth')->name('uploadbrokingslip');

Route::post('customer/{requestid}/assignendorsementcrmrequest', 'Endorsement\EndorsementController@assignEndorsementRequest')->middleware('auth')->name('assignndorsementcrmrequest');
Route::post('customer/{requestid}/assignsalescrmrequest', 'Endorsement\EndorsementController@assignSalesRequest')->middleware('auth')->name('assignsalescrmrequest');

Route::get('policy/incompleterequest', 'Dashboard\DashboardController@incompleteRequest')->middleware('auth')->name('incompleterequest');

Route::get('customer/{customerId}/crm/delete/{crmId}', 'Customer\CustomerController@removeCrmRequest')->middleware('auth')->name('removecrmrequest');

Route::post('customer/request/filter', 'Dashboard\DashboardController@requestFilter')->middleware('auth')->name('crmrequestfilter');




//Service call from dbroker.com.sa
Route::post('/dbroker/requestsave','Dbroker\DatasaveController@saveRequestForm')->name('dbrokerrequestsave');
Route::post('/dbroker/endorsementcommentsave','Dbroker\DatasaveController@saveEndorsementCommentDetails')->name('dbrokerendorsementcommentsave');
Route::post('/dbroker/endorsementstatuschange','Dbroker\DatasaveController@endorsementstatusChange')->name('dbrokerendorsementstatuschange');

Route::post('/dbroker/endorsementclientdocupload','Dbroker\DatasaveController@saveClientdocument')->name('endorsementclientdocupload');


Route::get('/dbroker/test','Dbroker\DatasaveController@testCurl')->name('test');
Route::post('/customerupdate','ImportController@updateCustomerInfo')->middleware('auth')->name('updateallcustomerinfo');
Route::post('/importnewleads','ImportController@importLeads')->middleware('auth')->name('importnewleads');
//New changes for technical departments

Route::get('/renewalnoticiation/list/{action?}', 'Renewal\RenewalController@renewalnotificationList')->middleware('auth')->name('renewalnotificationlist');
Route::post('/renewallistfilter','Renewal\RenewalController@renewalFilter')->middleware('auth')->name('renewallistdaysfilter');
Route::post('/saverenewalcrmrequest','Renewal\RenewalController@saveRenewalrequest')->middleware('auth')->name('saverenewalcrmrequest');

Route::post('/policy/{policyId}/addsalesperson','Policy\PolicyController@addSalesPerson')->middleware('auth')->name('addSalesperson');

Route::get('/renewalrequest/list', 'Renewal\RenewalController@renewalrequestList')->middleware('auth')->name('renewalrequestlist');

Route::get('/financeapprovedendorsementlist', 'Dashboard\DashboardController@financeapprovedEndorsementList')->middleware('auth')->name('financeapprovedendorsementlist');
Route::get('/duplicateendorsementlist', 'ImportController@duplicateEndorsements')->middleware('auth')->name('duplicateendorsementlist');


Route::get('policy/filter/{status}', 'Policy\PolicyController@listPolicyfilter')->middleware('auth')->name('listpolicyfilter');
Route::get('policy/newclaim', 'Claim\ClaimController@newClaim')->middleware('auth')->name('newclaim');
Route::get('customer/{customerId}/newrequest', 'Customer\CustomerController@newRequest')->middleware('auth')->name('newrequest');
Route::get('policy/newendorsementrequest', 'Endorsement\EndorsementController@addEndorsementRequest')->middleware('auth')->name('newendorsementrequest');

Route::get('policy/edendorsement/{status?}', 'Endorsement\EndorsementController@endorsementList')->middleware('auth')->name('endorsementlist');

Route::get('complaint/new', 'Complaint\ComplaintController@newComplaints')->middleware('auth')->name('newcomplaint');

Route::post('customer/request/{requestid}/reciepient', 'Quote\QuoteController@addReciepient')->middleware('auth')->name('savereciepient');
Route::get('customer/{customerId}/policy/list', 'Policy\PolicyController@getCustomerPolicy')->middleware('auth')->name('getCustomerpolicy');

Route::post('policy/endorsement/{policyId}/savemultipledetails', 'Endorsement\EndorsementController@saveMultipleEndorsementDetails')->middleware('auth')->name('savemultipleendorsementdetails');


//New links for policy timeline
Route::post('/policy/{policyId}/timeline','Timeline\TimelineController@getTimelinedetails')->middleware('auth')->name('policytimeline');
Route::get('/policy/{policyId}/downloadtimeline','Timeline\TimelineController@downloadTimelinedetails')->middleware('auth')->name('downloadtimeline');

//New links for custmer timeline
Route::post('/customer/{customerId}/timeline/{year}','Timeline\TimelineController@customerTimeline')->middleware('auth')->name('customertimeline');
Route::get('/customer/{customerId}/timeline/{year}','Timeline\TimelineController@customerTimeline')->middleware('auth')->name('customertimelinefilter');

Route::get('/customer/{customerId}/downloadtimeline/{year}','Timeline\TimelineController@downloadCustomerTimelinedetails')->middleware('auth')->name('downloadcustomertimeline');

//Auth::routes();

/**************************************************** CUSTOMER DASHBOARD AREA ***********************************************************************************************/
Route::get('/client/policylist', 'Client\ClientController@getPolicyDetails')->middleware('auth')->name('customerpolicies');
Route::get('/clientdashboard', 'Client\ClientController@index')->middleware('auth')->name('customerdashboard');
Route::get('client/claimlist', 'Client\ClientController@claimlist')->middleware('auth')->name('customerclaimlist');
Route::get('client/complaintlist/{status?}', 'Client\ClientController@complaintList')->middleware('auth')->name('customercomplaintlist');
Route::get('client/request/status/{status?}', 'Client\ClientController@listCustomerRequest')->middleware('auth')->name('customerrequestfilter');
Route::get('client/policyoverview/{policyId}', 'Client\ClientController@policyDetails')->middleware('auth')->name('clientpolicyoverview');
Route::post('client/policy/endorsement/{policyId}/list', 'Client\ClientController@listEndorsementDetails')->middleware('auth')->name('policyendorsement');
Route::post('client/endorsementrequest/policy/{policyId}', 'Client\ClientController@endorsementRequest')->middleware('auth')->name('clientendorsementrequest');

Route::get('client/crmrequest/{policyId}/overview/{requestId}', 'Client\ClientController@endorsementCrmRequestOverview')->middleware('auth')->name('overviewcustomerendorsementrequest');
Route::post('client/{requestid}/assignowner', 'Client\ClientController@assignEndorsementRequestOwner')->middleware('auth')->name('assignOwner');


Route::get('client/crmrequest/{clientId}/createrequest', 'Client\ClientController@createrequest')->middleware('auth')->name('createrequest');
Route::post('client/crmrequest/{clientId}/saverequestdata', 'Client\ClientController@saverequestData')->middleware('auth')->name('saverequestinfo');

Route::get('client/{clientId}/profile', 'Client\ClientController@profileDetails')->middleware('auth')->name('profile');

Route::get('client/{clientId}/listusers', 'Client\ClientController@clientUsers')->middleware('auth')->name('listusers');

Route::post('client/userdelete', 'Client\ClientController@userdelete')->middleware('auth')->name('userdelete');
Route::post('client/useractivate', 'Client\ClientController@activateUser')->middleware('auth')->name('activateuser');

Route::get('client/adduser', 'Client\ClientController@userAddform')->middleware('auth')->name('userform');
Route::post('client/saveuserdata', 'Client\ClientController@saveUserData')->middleware('auth')->name('saveuserform');
/**************************************************** CUSTOMER DASHBOARD END ***********************************************************************************************/

/**************************************************** FINANCE ACCOUNT PERIOD LOCK ***********************************************************************************************/
Route::get('finance/createfinanceperiodlock/{period?}', 'SettingController@getPeriodlockForm')->middleware('auth')->name('setperiodlock');
Route::post('finance/savefinanceperiod', 'SettingController@saveFinanceperiods')->middleware('auth')->name('savefinanceperiods');
Route::get('finance/addaccountingyear', 'SettingController@addAccountingyear')->middleware('auth')->name('addaccountingyear');
Route::get('finance/getperioddetails', 'SettingController@getPeriodDetails')->middleware('auth')->name('getperioddetails');
Route::get('finance/checklock', 'SettingController@checkFinancelock')->middleware('auth')->name('checklock');
/**************************************************** FINANCE ACCOUNT PERIOD LOCK ***********************************************************************************************/
Route::get('active/policies', 'Report\FinanceReportController@activePoliciesDetails')->name('activepolicies');


