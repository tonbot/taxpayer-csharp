
using MyFirstCoreApp.Pages;

public class AgencyDataModel
{
    public int id { get; set; }
    public string agency_name { get; set; }
    public string agency_code { get; set; }
}

public class RevenueDataModel
{
    public int id { get; set; }
    public string rev_code { get; set; }
    public string rev_name { get; set; }
    public string agency_code { get; set; }
}


public class Agency
{

    private readonly ILogger<IndexModel> _logger;
    private readonly DatabaseHelper _databaseHelper;


    public Agency(ILogger<IndexModel> logger, DatabaseHelper databaseHelper)
    {
        _logger = logger;
        _databaseHelper = databaseHelper;

    }


    public ResponseData GetAgency()
    {
        string sql = $@"SELECT * FROM {TblDef.AGENCY_TBL}";
        ResponseData result = _databaseHelper.Query<AgencyDataModel>(sql);
        return result;
    }

    public ResponseData GetRevenue()
    {
        string sql = $@"SELECT * FROM {TblDef.REVENUE_LIST_TBL}";
        ResponseData result = _databaseHelper.Query<RevenueDataModel>(sql);
        return result;
    }

    public ResponseData GetAgencyAndRevenue()
    {
        ResponseData agencyres = GetAgency();
        ResponseData revenueres = GetRevenue();

        var data = new
        {
            Agencies = agencyres?.Code == 200 ? agencyres.Data : new List<object>(),
            Revenues = revenueres?.Code == 200 ? revenueres.Data : new List<object>()
        };

        return Utils.GetResponseData(200, "success", data);
    }


}
