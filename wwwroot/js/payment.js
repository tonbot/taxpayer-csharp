import * as config from "./config.js";
import {selectGatewayCallBack} from "./callBackFunction.js";



window.selectGateway = function (selectedGateway) {
  let billNumber = $("#billNumber").val();
  let requesData = {
    a: selectedGateway,
    b: billNumber,
    z: "init-payment",
  };
  sendAjaxRequest(requesData,selectGatewayCallBack);
}




