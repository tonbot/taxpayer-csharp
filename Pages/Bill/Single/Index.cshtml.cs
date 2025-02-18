using System.Text.Json.Serialization;
using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.RazorPages;
using System.Text.Json;


namespace MyFirstCoreApp.Pages;

public class SingleBillModel : PageModel
{
    private readonly ILogger<SingleBillModel> _logger;

    private readonly Bill _bill;
    public List<BillDataModel>? billsData { get; private set; }

    public required string  Username { get; set; }

    public SingleBillModel(ILogger<SingleBillModel> logger, Bill bill)
    {
        _logger = logger;
        _bill = bill;
    }

    public void OnGet() {
        Username = HttpContext.Session.GetString("fname") ?? "Guest";

         ResponseData result =  _bill.GetBillsByTaxId("single", "3000001");
        if(result.Code != 200)
           billsData = new List<BillDataModel> ();
        else
           billsData = (List<BillDataModel>?) result.Data ?? new List<BillDataModel> ();
     }

    // public IActionResult OnPost([FromBody] CreateSingleBillModel Input)
    // {
    //    ResponseData result =  _bill.Create(Input);
    //     return new JsonResult(result);
    // }
}


