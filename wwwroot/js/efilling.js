import * as config from "./config.js";
import {monthlyScheduleCallBack,formH1CallBack,remittanceReceiptCallBack,payeTccRequestCallBack,payeTccDownloadCallBack} from "./callBackFunction.js";

window.redirectPage = function (id){
  if (id === 1) location.href = "paye-payment.php";
  if (id === 2) location.href = "paye-filling.php";
  if (id === 3) location.href = "paye-tcc.php";
};

window.openModalFormUpload = function (modalId){
  if (modalId === 'formH1')  $('#uploadModalFormH1').modal('show');
  if (modalId === 'remittanceEvidence')  $('#uploadModalremittanceEvidence').modal('show');
  if (modalId === 'salaryProjection')  $('#uploadModalsalaryProjection').modal('show');
  if (modalId === 'payeTccModal')  $('#payeTccModal').modal('show');
};


function validateFile(formId){
  const fileInput = $("#"+formId)[0];
  if (fileInput.files.length === 0) {
    alert("Please select a file.");
    return false;
  }
  const file = fileInput.files[0];
  if (file.type !== "text/csv" && !file.name.endsWith(".csv")) {
    alert("Please upload a valid CSV file.");
    return false;
  }
  return true;
}

/*-------------------------- monthly schedule upload starts -------
---------------------------------*/
function processScheduleTemplateUpload () {
  $('#loadingSpinner').removeClass('d-none');
  var formData = new FormData($("#scheduleTemplateForm")[0]);
  formData.append("upload-schedule", "upload-schedule");
  sendAjaxRequestUpload(formData, monthlyScheduleCallBack);
  $("#uploadModal").modal("hide"); 
};

// Handle file upload form submission
$("#scheduleTemplateForm").submit(function (event) {
  event.preventDefault(); 
  let isFileValid = false
  isFileValid = validateFile('scheduleTemplate');
  if(!isFileValid) return;
  processScheduleTemplateUpload();
});
/*-------------------------- monthly schedule upload ends ----------------*/

/*--------------------------  form h1 upload starts ---------------
----------------------------------*/

function processFormH1FormUpload () {
  $('#loadingSpinner').removeClass('d-none');
  var formData = new FormData($("#FormH1Form")[0]);
  formData.append("upload-formH1", "upload-formH1");
  sendAjaxRequestUpload(formData, formH1CallBack);
  $("#uploadModalFormH1").modal("hide"); 
}
// Handle file upload form submission
$("#submitFormH1Btn").click(function () {
  let isFileValid = false
  isFileValid = validateFile('formH1');
  if(!isFileValid) return;
  processFormH1FormUpload();
})
/*--------------------------  form h1 upload ends ----------------*/


/*--------------------------  form h1 upload starts ---------------
----------------------------------*/

function processRemittanceReceiptUpload () {
  $('#loadingSpinner').removeClass('d-none');
  var formData = new FormData($("#remittanceReceiptForm")[0]);
  formData.append("upload-remittance-receipt", "upload-remittance-receipt");
  sendAjaxRequestUpload(formData, remittanceReceiptCallBack);
  $("#uploadModalremittanceEvidence").modal("hide"); 
}
// Handle file upload form submission
$("#submitRemittanceReceiptBtn").click(function () {
  let isFileValid = false
  isFileValid = validateFile('remittanceReceipt');
  if(!isFileValid) return;
  processRemittanceReceiptUpload();
})
/*--------------------------  form h1 upload ends ----------------*/




$("#payeTccRequestBtn").click(function () {
    if (!config.validateForm("payeTccRequestForm")) {return;}
    let data = config.formData("payeTccRequestForm");
    $('#loadingSpinner').removeClass('d-none');
    let requesData = {
      a: data,
      z: "paye-tcc-request",
    };
    sendAjaxRequest(requesData,payeTccRequestCallBack);
})


$("#payeTccDownloadBtn").click(function () {
  if (!config.validateForm("payeTccDownloadForm")) {return;}
  let data = config.formData("payeTccDownloadForm");
  $('#loadingSpinner').removeClass('d-none');
  let requesData = {
    a: data,
    z: "paye-tcc-download",
  };
  sendAjaxRequest(requesData,payeTccDownloadCallBack);
})
