
import { checkReceiptCallBack,newTccApplicationCallBack} from "./callBackFunction.js";

var additionalreceiptArray = [];


window.validateTccForm=function(formId) {
  var form = $("#" + formId)[0];
  if (form.checkValidity()) {
    switch (formId) {
      case "biodataForm":
        toggleTab(
          "#nav-home",
          "#nav-home-tab",
          "#nav-payment",
          "#nav-payment-tab",
          true
        );
        break;
      case "paymentDetailsForm":
        toggleTab(
          "#nav-payment",
          "#nav-payment-tab",
          "#nav-addPayment",
          "#nav-addPayment-tab",
          true
        );
        break;
      default:
        break;
    }
  } else {
    form.reportValidity();
  }
}


window.checkReceipt = function (...args) {
  const keys = [
    "inputElement",
    "name",
    "amount",
    "purpose",
    "date",
    "error",
    "detailsContainer",
  ];
  let inputObj = Object.fromEntries(
    keys.map((key, index) => [key, args[index]])
  );
  let receiptNumber = inputObj.inputElement.value;
  if (receiptNumber == "") {
    $(inputObj.name, inputObj.purpose, inputObj.date, inputObj.error).text("");
    $(inputObj.amount).val("");
    $(inputObj.detailsContainer).addClass("d-none");
    return;
  }
  let requesData = { a: receiptNumber, z: "check-receipt" };
  sendAjaxRequest(requesData, checkReceiptCallBack, inputObj);
};


window.toggleTab = function(...args) {
  $(args[0]).removeClass("show active");
  $(args[1]).removeClass("active");
  $(args[2]).addClass("show active");
  $(args[3]).removeAttr("disabled").addClass("active");
  if (!args[1]) {
    $(args[1]).attr("disabled", "disabled");
  }
}


window.create_application = function() {
  if (!confirmAction()) {
    messageAlert("Operation Cancelled", "error");
    return;
  }
  var paymentDetailsForm = $("#paymentDetailsForm")[0];
  var biodataForm = $("#biodataForm")[0];
  if (paymentDetailsForm.checkValidity() && biodataForm.checkValidity()) {
    var bioFormData = {};
    var paymentFormData = {};

    $("#biodataForm")
      .serializeArray()
      .map(function (item) {
        bioFormData[item.name] = item.value;
      });
    $("#paymentDetailsForm")
      .serializeArray()
      .map(function (item) {
        paymentFormData[item.name] = item.value;
      });

    var formData = {
      biodata: bioFormData,
      paymentDetails: paymentFormData,
      additionalPayment: additionalreceiptArray,
    };

    let requesData = { a: formData, z: "new-application" };
    sendAjaxRequest(requesData, newTccApplicationCallBack);
  } else {
    paymentDetailsForm.reportValidity();
    messageAlert("Please Fill all the Important Field", "error");
  }
}


function update_application() {
  if (!confirmAction()) {
    messageAlert("Operation Cancelled", "error");
    return;
  }

  var paymentDetailsForm = $("#paymentDetailsForm")[0];
  var biodataForm = $("#biodataForm")[0];
  if (paymentDetailsForm.checkValidity() && biodataForm.checkValidity()) {
    var bioFormData = {};
    var paymentFormData = {};

    $("#biodataForm")
      .serializeArray()
      .map(function (item) {
        bioFormData[item.name] = item.value;
      });
    $("#paymentDetailsForm")
      .serializeArray()
      .map(function (item) {
        paymentFormData[item.name] = item.value;
      });

    var formData = {
      biodata: bioFormData,
      paymentDetails: paymentFormData,
    };

    // Payload
    var payload = {
      a: formData,
      z: "update-application",
    };

    // send request
    $.ajax({
      url: "src/collector.php",
      type: "POST",
      data: JSON.stringify(payload),
      contentType: "application/json",
      beforeSend: function () {
        $("#regLoading").removeClass("d-none");
      },
      success: function (response) {
        var res = JSON.parse(response);
        if (res.code === 200) {
          messageAlert(res.message, "success");
        } else {
          messageAlert(res.message, "error");
        }
      },
      error: function (xhr, status, error) {
        console.error(xhr.responseText);
      },
      complete: function () {
        $("#regLoading").addClass("d-none");
      },
    });
  } else {
    paymentDetailsForm.reportValidity();
    messageAlert("Please Fill all the Important Field", "error");
  }
}


window.addMorePayment = function () {
  const directAssessmentValue = $("#additionalDirAssReceiptNo").val();
  const developmentLevyValue = $("#additionalDevLevyReceiptNo").val();
  const directAssessmentAmount = $("#additionalDirAssAmount").val();
  const developmentLevyAmount = $("#additionalDevLevyAmount").val();
  const selectedYear = $("#additionalPaymentYear").val();

  let receiptObject = {
    dirRno: directAssessmentValue || "",
    devRno: developmentLevyValue || "",
    dirAmount: directAssessmentAmount || "",
    devAmount: developmentLevyAmount || "",
    year: selectedYear,
  };

  if ((directAssessmentValue || developmentLevyValue) && selectedYear) {
    additionalreceiptArray.push(receiptObject);
    displayReceiptObject(receiptObject, additionalreceiptArray.length - 1);
  }

  $("#additionalDirAssReceiptNo").val("");
  $("#additionalDevLevyReceiptNo").val("");
  $("#additionalPaymentYear").val("");
}

function displayReceiptObject(receiptObject, index) {
  const tableBody = document.getElementById("receiptTableBody");
  const newRow = document.createElement("tr");
  newRow.innerHTML = `
          <td class='p-2'>${receiptObject.dirRno}</td>
          <td class='p-2'>${receiptObject.dirAmount}</td>
          <td class='p-2'>${receiptObject.devRno}</td>
          <td class='p-2'>${receiptObject.devAmount}</td>
          <td class='p-2'>${receiptObject.year}</td>
          <td class='p-2'><span class="btn bg-danger text-white remove-btn" data-index="${index}" onclick="removeReceipt(this)">Remove</span></td>
      `;
  tableBody.appendChild(newRow);
}

// Function to remove a receipt row
window.removeReceipt = function(element) {
  const index = $(element).data("index");
  additionalreceiptArray.splice(index, 1);
  const row = element.parentElement.parentElement;
  row.parentElement.removeChild(row);

  $("#receiptTableBody .remove-btn").each(function (i) {
    $(this).data("index", i);
  });
}

function confirmAction() {
  var confirmation = confirm(
    "Are you sure you want to perform this operation?"
  );
  if (confirmation) {
    return true;
  } else {
    return false;
  }
}
