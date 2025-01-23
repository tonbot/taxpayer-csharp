using System.Text.Json.Serialization;
using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.RazorPages;
using System.Text.Json;


namespace MyFirstCoreApp.Pages;

public class SingleBillModel : PageModel
{
    private readonly ILogger<SingleBillModel> _logger;

    private readonly Bill _bill;
    public List<BillModel> billsData { get; private set; }

    public SingleBillModel(ILogger<SingleBillModel> logger, Bill bill)
    {
        _logger = logger;
        _bill = bill;
    }

    public void OnGet() {
         ResponseData result =  _bill.GetBillsByTaxId("single", "3000001");
        if(result.Code != 200)
           billsData = new List<BillModel> ();
        else
           billsData = (List<BillModel>) result.Data;
     }

    // public IActionResult OnPost([FromBody] CreateSingleBillModel Input)
    // {
    //    ResponseData result =  _bill.Create(Input);
    //     return new JsonResult(result);
    // }
}


public class CreateSingleBillModel
{
    public String Username { get; set; }
    public String password { get; set; }
}