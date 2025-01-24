
using MyFirstCoreApp.Pages;

public class BillDataModel
{
    public int id { get; set; }
    public string single_bill_num { get; set; }
    public string combined_bill_num { get; set; }
    public int bill_status { get; set; }
    public int bill_type { get; set; }
    public string tax_id { get; set; }
    public string agency_code { get; set; }
    public string rev_name { get; set; }
    public string rev_code { get; set; }
    public string amount { get; set; }
    public string created_at { get; set; }
    public string updated_at { get; set; }
}

public class Bill
{

   private readonly ILogger<IndexModel> _logger;
    private readonly DatabaseHelper  _databaseHelper;
   
    public Bill(ILogger<IndexModel> logger, DatabaseHelper databaseHelper)
    {
        _logger = logger;
        _databaseHelper = databaseHelper;
    }


    public ResponseData GetBillsByTaxId(string Type, string taxId)
    {
       if(Type == "single")
         return GetBillsOfTypeSingle(taxId);
       else 
        return GetBillsOfTypeHarmonized();

    }
      public ResponseData GetBillsOfTypeSingle(string taxId)
    {
        string sql = $@"
            SELECT b.*, r.rev_name 
            FROM {TblDef.BILL_TBL} AS b
            LEFT JOIN {TblDef.REVENUE_LIST_TBL} AS r 
            ON b.rev_code = r.rev_code AND b.agency_code = r.agency_code 
            WHERE b.tax_id = @TaxId 
            ORDER BY b.created_at DESC";

        ResponseData result = _databaseHelper.Query<BillDataModel>(sql, new { TaxId = taxId });
        return result;
    }
 
   public ResponseData GetBillsOfTypeHarmonized()
    {
        string sql = "SELECT * FROM sm_bills";
        ResponseData result = _databaseHelper.Query<BillDataModel>(sql);
        return result;
    }


}
