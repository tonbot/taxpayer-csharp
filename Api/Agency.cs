using Microsoft.AspNetCore.Mvc;
using Microsoft.Extensions.Logging;

[ApiController]
[Route("api/agency")]
public class AgencyController : ControllerBase
{
    private readonly ILogger<AgencyController> _logger;
        private readonly Agency  _agency;

    public AgencyController(ILogger<AgencyController> logger, Agency agency)
    {
        _logger = logger;
         _agency = agency;
    }

    // [HttpPost("all")]
    // public IActionResult PostFetchAgencyAll()
    // {
    //     _logger.LogInformation("Fetching all agencies.");

    //     // Example response
    //     return Ok(new { success = true, message = "Fetched all agencies.", data = "yui" });
    // }

    // [HttpPost("revenue")]
    // public IActionResult PostFetchRevenueAll()
    // {
    //     _logger.LogInformation("Fetching all revenue.");

    //     return Ok(new { success = true, message = "Fetched all revenue.", data = "yui" });
    // }

    [HttpPost("agency-revenue")]
    public IActionResult PostFetchRevenueAndAgency()
    {
        _logger.LogInformation("Fetching agency and revenue.");
    var result = _agency.GetAgencyAndRevenue();
        return new JsonResult(result);
     
    }
}
