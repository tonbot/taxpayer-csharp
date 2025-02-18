using System.Text.Json.Serialization;
using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.RazorPages;

namespace MyFirstCoreApp.Pages;

public class DashboardModel : PageModel
{
    private readonly ILogger<TaxPayerModel> _logger;
    public required string  Username { get; set; }

    public DashboardModel(ILogger<TaxPayerModel> logger)
    {
        _logger = logger;
    }

    public void OnGet()
    {
        Username = HttpContext.Session.GetString("fname") ?? "Guest";
    }

}

