
//collect formData
export const formData = (formId) => {
    var formData = {};
    $("#"+formId).serializeArray().map(function(item) {
        formData[item.name] = item.value;
    });
    return formData;
}


export const ajaxSettings = {
    type: "POST",
    contentType: "application/json",
}

export const ajaxSettingsUpload = {
    url: "src/collector.php",
    type: "POST",
    processData: false,
    contentType: false,
}

export const ajaxError = {
    error: function(xhr, status, error) {
        console.error(xhr.responseText);
        console.error(error);
    }
}

export const  validateForm = (formId) => {
    var form = $("#" + formId)[0];
    if (form.checkValidity()) {
       return true
    } else {
      form.reportValidity();
      return false
    }
  }


  window.clearForm = (formId) => {
    var form = $(formId);
    // Clear input values
    form.find("input[type=text], input[type=email], input[type=password], textarea").val("");
    // Reset select to default option
    form.find("select").prop("selectedIndex", 0);
}

//loding alert 
window.loadingAlert = function (title, text, time) {
    swal({
      title: title,
      text: text,
      icon: "images/loading1.gif",
      timer: time,
      button: false,
    }).then(
      function () {},
      function (dismiss) {
        if (dismiss === "timer") {
        }
      }
    );
  }
  
  //message alert
  window.messageAlert = function (title, icon, downloadUrl = null) {
    const content = downloadUrl 
        ? `${title}<br><a href="${downloadUrl}" target="_blank" class="btn custom-btn-primary" download>Download Certificate</a>` 
        : '';
  
    swal({
        title: title,
        icon: icon,
        button: "OK", // Optional, can change the button text
        content: {
            element: 'div',
            attributes: {
                innerHTML: content
            }
        }
    });
  }
  
  // confirm Action alert
   window.confirmAction = function() {
    if (confirm("Are you sure you want to perform this operation?")) {
      return true;
    } 
      return false;
  }
  