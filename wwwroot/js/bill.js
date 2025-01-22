import * as config from "./config.js";
import {getAgencyAndRevenueCallBack,createBillCallBack} from "./callBackFunction.js";


$("#cancelButton").click(function () {
  $("#billModal").modal("hide");
});


window.fetchAgencyandRevenue = function () {
  let requesData = {
    z: "get_agencyRevenue"
  };
  sendAjaxRequest(requesData,getAgencyAndRevenueCallBack);
}

window.loadData = function () {
  let agencies = JSON.parse(localStorage.getItem("agencies"));
  let revenues = JSON.parse(localStorage.getItem("revenues"));
  if (!agencies || !revenues) {
    fetchAgencyandRevenue();
  } else {
    populateAgencies(agencies);
  }
};

window.populateAgencies = function (agencies) {
  let agencySelect = $("#agency");
  agencySelect.empty();
  agencies.forEach(function (agency) {
    agencySelect.append(
      `<option value="${agency.agency_code}">${agency.agency_name} - (${agency.agency_code})</option>`
    );
  });

  agencySelect.change();
}

window.populateRevenues = function (revenues, agencyCode) {
  let revenueSelect = $("#revenueName");
  revenueSelect.empty();
  revenueSelect.append('<option value="">-- SELECT REVENUE --</option>');
  revenues
    .filter(function (revenue) {
      return revenue.agency_code == agencyCode;
    })
    .forEach(function (revenue) {
      revenueSelect.append(
        `<option value="${revenue.rev_code}">${revenue.rev_name} - (${revenue.rev_code})</option>`
      );
    });
}

// On agency change, update revenue options
$("#agency").on("change", function () {
  let selectedAgencyCode = $(this).val();
  let revenues = JSON.parse(localStorage.getItem("revenues"));
  populateRevenues(revenues, selectedAgencyCode);
});




/*****************************SINGLE BILL JS******************************************************* */


window.createBill = function () {
  if (!config.validateForm("singleBillForm")) {return;}
  let data = config.formData("singleBillForm");
  $('#loadingSpinner').removeClass('d-none');
  let requesData = {
    a: data,
    z: "create-bill",
  };
  $("#generateBill").prop("disabled", true);
  sendAjaxRequest(requesData,createBillCallBack);
}


/*****************************COMBINE BILL JS START******************************************************* */
