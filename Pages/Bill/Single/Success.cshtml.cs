using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.RazorPages;

namespace MyFirstCoreApp.Pages
{
    public class SuccessModel : PageModel
    {
        private readonly ILogger<SuccessModel> _logger;

        [BindProperty(SupportsGet = true)]
        public string? BillNumber { get; set; }

        [BindProperty(SupportsGet = true)]
        public decimal Amount { get; set; }

        [BindProperty(SupportsGet = true)]
        public string? Reference { get; set; }

        public DateTime TransactionDate { get; private set; }

        public string? Username { get; set; }

        public SuccessModel(ILogger<SuccessModel> logger)
        {
            _logger = logger;
        }

        public IActionResult OnGet()
        {
            if (string.IsNullOrEmpty(BillNumber))
            {
                _logger.LogWarning("Attempted to access success page without bill number");
                return RedirectToPage("/Bill/Single/Index");
            }

            Username = User.Identity?.Name;
            TransactionDate = DateTime.Now;
            _logger.LogInformation("Payment success page accessed for bill: {BillNumber}", BillNumber);
            
            return Page();
        }
    }
}