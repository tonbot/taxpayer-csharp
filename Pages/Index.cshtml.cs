using System.Text.Json.Serialization;
using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.RazorPages;

namespace MyFirstCoreApp.Pages;

public class IndexModel : PageModel
{
    private readonly ILogger<IndexModel> _logger;

    private readonly User _user;

    public IndexModel(ILogger<IndexModel> logger, User user)
    {
        _logger = logger;
        _user = user;
    }

    public void OnGet() { }
    public IActionResult OnPost([FromBody] LoginDataModel Input)
    {
       ResponseData result =  _user.Login(Input);
        return new JsonResult(result);
    }
}


public class LoginDataModel
{
    public String Username { get; set; }
    public String password { get; set; }
}