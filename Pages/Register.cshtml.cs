using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.RazorPages;

namespace MyFirstCoreApp.Pages;

public class RegisterModel : PageModel
{
    private readonly ILogger<RegisterModel> _logger;
    private readonly TaxPayer _taxPayer;

    public RegisterModel(ILogger<RegisterModel> logger, TaxPayer taxPayer)
    {
        _logger = logger ?? throw new ArgumentNullException(nameof(logger));
        _taxPayer = taxPayer ?? throw new ArgumentNullException(nameof(taxPayer));
    }

    public void OnGet() { }

    public IActionResult OnPost([FromBody] TaxpayerInputModel Input)
    {
        try
        {
            var result = _taxPayer.Register(Input);
            return new JsonResult(result);
        }
        catch (Exception ex)
        {
            _logger.LogError(ex, "Registration failed");
            return new JsonResult(new { success = false, message = "Registration failed" });
        }
    }
}

public class TaxpayerInputModel
{
    public required string FirstName { get; set; }
    public required string LastName { get; set; }
    public required string Email { get; set; }
    public required string Phone { get; set; }
    public required string Sex { get; set; }
    public required string Password { get; set; }
}