
    $(".select-m").select2({
      width: "100%",
    });
  
    //this is for date input
    $(".datepicker").datepicker({
      dateFormat: "yy-mm-dd",
      maxDate: 0,
    });
  
    // var show = false;
    // $(".toggle-sidebar").click(function () {
    //   if (show) {
    //     gsap.to(".sidebar-wrapper", { x: "-200px", duration: 1 });
    //     show = false;
    //     return;
    //   }
    //   gsap.to(".sidebar-wrapper", { x: "200px", duration: 1 });
    //   show = true;
    // });
  
    $("#showAddStockModal").click(function () {
      $("#addStockModal").modal("show");
    });


  