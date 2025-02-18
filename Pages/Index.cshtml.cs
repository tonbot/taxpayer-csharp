using System.Text.Json.Serialization;
using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.RazorPages;

namespace MyFirstCoreApp.Pages;

public class IndexModel : PageModel
{
    private readonly ILogger<TaxPayerModel> _logger;

    private readonly TaxPayer _taxPayer;

    public IndexModel(ILogger<TaxPayerModel> logger, TaxPayer taxPayer)
    {
        _logger = logger;
        _taxPayer = taxPayer;
    }

    public void OnGet() { }
    public IActionResult OnPost([FromBody] LoginDataModel Input)
    {
       ResponseData result =  _taxPayer.Login(Input);
        return new JsonResult(result);
    }
}


public class LoginDataModel
{
    public required string TaxId { get; set; }
    public required string Password { get; set; }
}