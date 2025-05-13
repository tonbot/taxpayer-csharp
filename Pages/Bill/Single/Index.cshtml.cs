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
    public required string  TaxId { get; set; }

    public SingleBillModel(ILogger<SingleBillModel> logger, Bill bill)
    {
        _logger = logger;
        _bill = bill;
    }

    public void OnGet() {
        Username = HttpContext.Session.GetString("fname") ?? "Guest";
        TaxId = HttpContext.Session.GetString("tax_id") ?? "0";

         ResponseData result =  _bill.GetBillsByTaxId("single", "3000001");
        if(result.Code != 200)
           billsData = new List<BillDataModel> ();
        else
           billsData = (List<BillDataModel>?) result.Data ?? new List<BillDataModel> ();
     }

    public IActionResult OnPost([FromBody] SingleBillDTO formData)
    {
        
       ResponseData result =  _bill.CreateBill(formData);
        return new JsonResult(result) ;
    }
}

public class SingleBillDTO
{
  public required string tax_id { get; set; }
  public required string agency { get; set; }
  public required string revenueName { get; set; }
  public required string amount { get; set; }
  
}