export const loginCallBack = (response) => {
  console.log(response);
  $('#loadingSpinner').addClass('d-none');
  // var res = JSON.parse(response);
  // if (res.code === 200) {
  //   messageAlert(res.message, "success");
  //   window.location.href = res.data;
  // } else {
  //   messageAlert(res.message, "error");
  // }
};

export const photoUploadCallBack = (response) => {
  $('#loadingSpinner').addClass('d-none');
  var res = JSON.parse(response);
  if (res.code === 200) {
    messageAlert(res.message, "success");
    location.reload();
  } else {
    messageAlert(res.message, "error");
  }
};

export const changePasswordCallBack = (response) => {
  $('#loadingSpinner').addClass('d-none');
  var res = JSON.parse(response);
  if (res.code === 200) {
    messageAlert(res.message, "success");
    setTimeout(function() {
      window.location.href = '/taxpayer/index.php';
  }, 2000); 
  } else {
    messageAlert(res.message, "error");
  }
};

export const updateIndividualCallBack = (response) => {
  $('#loadingSpinner').addClass('d-none');
      var res = JSON.parse(response);
      if (res.code != 200) {
        messageAlert(res.message,"error");
        return;
      }
      messageAlert(res.message,"success");
      window.location.href = res.data;
  }

  export const updateCorporateCallBack = (response) => {
    $('#loadingSpinner').addClass('d-none');
    console.log(response)
    var res = JSON.parse(response);
    if (res.code != 200) {
      messageAlert(res.message,"error");
      return;
    }
    messageAlert(res.message,"success");
    window.location.href = res.data;
}

  export const createIndividualCallBack = (response) => {
    $('#loadingSpinner').addClass('d-none');
    console.log(response);
    var res = JSON.parse(response);
    if (res.code === 200) {
      messageAlert(
        res.message,
        "success",
        "regCert.php?id=" + res.data.tax_id,
        `<p>Your Tax ID is : <b>${res.data.tax_id}</b></p>`
      );
      clearForm("#individual-registrationForm");
      send_registration_mail(res.data);
    } else {
     
      messageAlert(res.message, "error");
    }
  }

  export const createCorporateCallBack = (response) => {
    $('#loadingSpinner').addClass('d-none');
    console.log(response);
    var res = JSON.parse(response);
    if (res.code === 200) {
      messageAlert(
        res.message,
        "success",
        "regCert.php?id=" + res.data.tax_id,
        `<p>Your Tax ID is : <b>${res.data.tax_id}</b></p>`
      );
      clearForm("#corporate-registrationForm");
      send_registration_mail(res.data);
    } else {
     
      messageAlert(res.message, "error");
    }
  }


  export const sendRegistrationMailCallBack = (response) => {
    try {
        var res = JSON.parse(response);
        if (res.code === 200) {
          console.log(response);
        } else {
          console.log(response);
        }
      } catch (e) {
        console.error("JSON Parse Error: ", response);
      }
  }

 
  export const getAgencyAndRevenueCallBack = (res) => {
    console.log(res)
    try {
     
      if (res.code === 200) {
        let agencies = res.data.agencies;
        let revenues = res.data.revenues;
        // Store data in localStorage
        localStorage.setItem("agencies", JSON.stringify(agencies));
        localStorage.setItem("revenues", JSON.stringify(revenues));
        // Populate dropdowns
        populateAgencies(agencies);
        messageAlert(
          "Data success",
          "success"
        );
        // populateRevenues(revenues);
      } else {
        console.log(response);
      }
    } catch (e) {
      console.error("JSON Parse Error: ", e);
    }
  }

  export const selectGatewayCallBack = (response) => {
    console.log(response);
    messageAlert("successfully processes", "success");
    try {
      var res = JSON.parse(response);
      if (res.code === 200) {
           messageAlert("You were redirected successfully", "success");
           window.open(res.data, '_blank');
      } else {
        messageAlert(res.message, "error");
      }
    } catch (e) {
      messageAlert("Invalid response format", "error");
      console.error("JSON Parse Error: ", response);
    }
  }

  export const checkReceiptCallBack = (response,inputObj) => {
    console.log(response);
    try {
      var res = JSON.parse(response);
      if (res.code === 200) {
        let data = res.data;
        $(inputObj.error).text("");
        $(inputObj.name).text(data.name);
        $(inputObj.amount).val(data.amount);
        $(inputObj.purpose).text(data.purpose);
        $(inputObj.date).text(data.date);
        $(inputObj.detailsContainer).removeClass("d-none");
      } else {
        $(inputObj.error).text(res.message);
        $(inputObj.name).text("");
        $(inputObj.amount).val("");
        $(inputObj.purpose).text("");
        $(inputObj.date).text("");
        $(inputObj.detailsContainer).addClass("d-none");
      }
    } catch (e) {
      messageAlert("Invalid response format", "error");
      console.error("JSON Parse Error: ", response);
    }
  }


  export const newTccApplicationCallBack = (response,inputObj) => {
    $('#loadingSpinner').addClass('d-none');
    var res = JSON.parse(response);
    if (res.code === 200) {
      localStorage.removeItem("data");
      messageAlert(res.message, "success");
      setTimeout(function() {
        window.location.href = '/taxpayer/tcc.php';
    }, 2000); 
    } else {
      messageAlert(res.message, "error");
    }
  }
  

  export const initPasswordResetCallBack = (response) => {
    $('#loadingSpinner').addClass('d-none');
    var res = JSON.parse(response);
    if (res.code === 200) {
      clearForm('#forgot-passwordForm');
      messageAlert(res.message, "success");
      setTimeout(function() {
        window.location.href = '/taxpayer/index.php';
    }, 3000); 
    } else {
      messageAlert(res.message, "error");
    }
  }

  export const resetPasswordCallBack = (response) => {
    $('#loadingSpinner').addClass('d-none');
    var res = JSON.parse(response);
    if (res.code === 200) {
      clearForm('#reset-passwordForm');
      messageAlert(res.message, "success");
      setTimeout(function() {
        window.location.href = '/taxpayer/tcc.php';
    }, 3000); 
    } else {
      messageAlert(res.message, "error");
    }
  }
  

  export const createBillCallBack = (response) => {
    $('#loadingSpinner').addClass('d-none');
    try {
      var res = JSON.parse(response);
      if (res.code === 200) {
        $('#addBillModal').modal('hide');
        $("#downloadBill").attr("href", `invoice.php?id=${res.data}`); 
        $("#makePayment").attr("href", `payment-gateway.php?id=${res.data}`);
        $("#bill-number").text(res.data);
        $("#bill-purpose").text($("#revenueName option:selected").text());
        $("#bill-agency").text($("#agency option:selected").text());
        $("#bill-amount").text($("#amount").val());
        $("#yourSelectId option:selected").text();
        $("#billModal").modal("show");
        $("#generateBill").prop("disabled", false);
        $("#amount").val("");

      } else {
        messageAlert(res.message, "error");
        $("#generateBill").prop("disabled", false);
      }
    } catch (e) {
      messageAlert("Invalid response format", "error");
      console.error("JSON Parse Error: ", response);
      $("#generateBill").prop("disabled", false);
    }
  }


  export const monthlyScheduleCallBack = (response) => {
    $('#loadingSpinner').addClass('d-none');
    var res = JSON.parse(response);
    if (res.code === 200) {
      messageAlert(res.message, "success");
      setTimeout(function() {
        location.reload();
    }, 3000); 
    } else {
      messageAlert(res.message, "error");
    }
  };
  
  export const formH1CallBack = (response) => {
    $('#loadingSpinner').addClass('d-none');
    var res = JSON.parse(response);
    if (res.code === 200) {
      messageAlert(res.message, "success");
      setTimeout(function() {
        location.reload();
    }, 3000); 
    } else {
      messageAlert(res.message, "error");
    }
  };

  export const remittanceReceiptCallBack = (response) => {
    $('#loadingSpinner').addClass('d-none');
    var res = JSON.parse(response);
    if (res.code === 200) {
      messageAlert(res.message, "success");
      setTimeout(function() {
        location.reload();
    }, 3000); 
    } else {
      messageAlert(res.message, "error");
    }
  };

  export const payeTccRequestCallBack = (response) => {
    $('#loadingSpinner').addClass('d-none');
    var res = JSON.parse(response);
    if (res.code === 200) {
      messageAlert(res.message, "success");
      setTimeout(function() {
        location.reload();
    }, 3000); 
    } else {
      messageAlert(res.message, "error");
    }
  };

  export const payeTccDownloadCallBack = (response) => {
    $('#loadingSpinner').addClass('d-none');
    var res = JSON.parse(response);
    if (res.code === 200) {
      messageAlert(res.message, "success");
      window.open(res.data, '_blank');
    } else {
      messageAlert(res.message, "error");
    }
  };

  