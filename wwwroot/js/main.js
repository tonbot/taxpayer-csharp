import * as config from './config.js';
import {sendRegistrationMailCallBack} from "./callBackFunction.js";


//ajax request function
 window.sendAjaxRequest = function (requestData, callBack, inputObj={}, url='') {
  let  forge = $('input[name="__RequestVerificationToken"').val();
  $.ajax({
    ...config.ajaxSettings,
    url: url,
    headers: {
       "RequestVerificationToken":forge
    },
    data: JSON.stringify(requestData),
    success: function(response){
      callBack(response, inputObj);
    },
    ...config.ajaxError,
    ...config.ajaxComplete,
  });
}


window.sendAjaxRequestUpload = function (requestData,callBack) {
  $.ajax({
    ...config.ajaxSettingsUpload,
    data: requestData,
    success: callBack,
    ...config.ajaxError,
  });
}


window.logout = function () {
  localStorage.clear();
  $.ajax({
    ...config.ajaxSettings,
    data: JSON.stringify({ z: "logout" }),

    success: function (response) {
      var res = JSON.parse(response);
      if (res.code === 200) {
        window.location.href = res.data;
      } else {
        window.location.href = "index.php";
      }
    },
    ...config.ajaxError,
  });
}


window.send_registration_mail = function (data){
  let requesData = {a: data.email,b: data.tax_id,z: "send_regmail", };
  sendAjaxRequest(requesData,sendRegistrationMailCallBack);
}



