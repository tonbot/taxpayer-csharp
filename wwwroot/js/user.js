import * as config from "./config.js";
import {loginCallBack, registerCallBack, photoUploadCallBack,changePasswordCallBack,updateIndividualCallBack,updateCorporateCallBack,createIndividualCallBack,createCorporateCallBack,initPasswordResetCallBack,resetPasswordCallBack} from "./callBackFunction.js";

//login function
window.login = function () {
  if (!config.validateForm("loginUserForm")) return;
  let data = config.formData("loginUserForm");
  sendAjaxRequest(data, loginCallBack, '/');
};

window.register = function () {
  if (!config.validateForm("registerForm")) return;
  let data = config.formData("registerForm");
  sendAjaxRequest(data, registerCallBack, '/register');
};

// upload tax payer photo 
$(".uploadNow").on("click", function (e) {
  e.preventDefault();
  var formData = new FormData($("#uploadForm")[0]);
  formData.append("taxId", $("#taxId").text());
  formData.append("upload", "upload");
  sendAjaxRequestUpload(formData,photoUploadCallBack);
});

//create user
 window.changePassword = function () {
    //check if all input are filled
    if (!config.validateForm("changePasswordForm")) {return;}
    //  check if newpassword is equall to re-type password
    if ($('#npassword').val() != $('#rpassword').val()) {
        messageAlert("Password Mismatch", "error");
        return;
    }

    if (confirmAction) {
          let data = config.formData("changePasswordForm");
          $('#loadingSpinner').removeClass('d-none');
          let requesData = {
            a: data,
            z: "change-password",
          };
          sendAjaxRequest(requesData,changePasswordCallBack);
    }else{
        messageAlert("Password Reset Abort", "error");
    }
}

window.createIndividual = function () {
    if (!config.validateForm("individual-registrationForm")) {return;}
    let data = config.formData("individual-registrationForm");
    $('#loadingSpinner').removeClass('d-none');
    let requesData = {
      a: data,
      z: "create-individual",
    };
    sendAjaxRequest(requesData,createIndividualCallBack);
  }

  window.createCorporate = function () {
    if (!config.validateForm("corporate_registrationForm")) {return;}
    let data = config.formData("corporate_registrationForm");
    $('#loadingSpinner').removeClass('d-none');
    let requesData = {
      a: data,
      z: "create-corporate",
    };
    sendAjaxRequest(requesData,createCorporateCallBack);
  }

window.updateIndividual = function () {
    if (!config.validateForm("individual-registrationForm")) {return;}
    let data = config.formData("individual-registrationForm");
    $('#loadingSpinner').removeClass('d-none');
    let requesData = {
      a: data,
      z: "update-individual",
    };
    sendAjaxRequest(requesData,updateIndividualCallBack);

  }

  window.updateCorporate = function () {
    if (!config.validateForm("corporate_registrationForm")) {return;}
    let data = config.formData("corporate_registrationForm");
    $('#loadingSpinner').removeClass('d-none');
    let requesData = {
      a: data,
      z: "update-corporate",
    };
    sendAjaxRequest(requesData,updateCorporateCallBack);
  }

  window.initPasswordReset = function () {
    if (!config.validateForm("forgot-passwordForm")) {return;}
    $('#loadingSpinner').removeClass('d-none');
    let data = config.formData("forgot-passwordForm");
    let requesData = {
      a: data,
      z: "init-password-reset",
    };
    sendAjaxRequest(requesData,initPasswordResetCallBack);
  }

  window.resetPassword = function () {
    if (!config.validateForm("reset-passwordForm")) {return;}

    if ($('#password').val() != $('#confirm_password').val()) {
      messageAlert("Password Mismatch", "error");
      return;
    }

    let data = config.formData("reset-passwordForm");
    $('#loadingSpinner').removeClass('d-none');
    let requesData = {
      a: data,
      z: "reset-password",
    };
    console.log(requesData);
    sendAjaxRequest(requesData,resetPasswordCallBack);
  }