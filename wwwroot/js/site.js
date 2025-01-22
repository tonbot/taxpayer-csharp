// Please see documentation at https://learn.microsoft.com/aspnet/core/client-side/bundling-and-minification
// for details on configuring this project to bundle and minify static web assets.

// Write your JavaScript code.


$(".select-2").select2({
    width: "100%",
  });

  //this is for date input
  $(".datepicker").datepicker({
    dateFormat: "yy-mm-dd",
    maxDate: 0,
  });

  var show = false;
  $(".toggle-sidebar").click(function () {
    if (show) {
      gsap.to(".sidebar-wrapper", { x: "-250px", duration: 1 });
      show = false;
      return;
    }
    gsap.to(".sidebar-wrapper", { x: "250px", duration: 1 });
    show = true;
  });

  $("#showAddStockModal").click(function () {
    $("#addStockModal").modal("show");
  });


