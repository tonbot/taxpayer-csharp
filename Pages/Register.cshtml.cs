using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.RazorPages;

namespace MyFirstCoreApp.Pages;

public class RegisterModel : PageModel
{
    private readonly ILogger<RegisterModel> _logger;
    private readonly TaxPayer _taxPayer;

    [BindProperty]
    public TaxpayerInputModel Input { get; set; } = new();

    public string? ErrorMessage { get; set; }

    public RegisterModel(ILogger<RegisterModel> logger, TaxPayer taxPayer)
    {
        _logger = logger;
        _taxPayer = taxPayer;
    }

    public void OnGet()
    {
    }

    public IActionResult OnPost([FromBody] TaxpayerInputModel Input)
    {
        ResponseData result = _taxPayer.Register(Input);
        return new JsonResult(result);
    }

    public class TaxpayerInputModel
    {
        public string FirstName { get; set; } = string.Empty;
        public string LastName { get; set; } = string.Empty;
        public string Email { get; set; } = string.Empty;
        public string Phone { get; set; } = string.Empty;
        public string Sex { get; set; } = string.Empty;
        public string Password { get; set; } = string.Empty;
    }

}