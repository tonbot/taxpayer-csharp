
using MyFirstCoreApp.Pages;

public class BillDataModel
{
    public int? id { get; set; }
    public string? single_bill_num { get; set; }
    public string? combined_bill_num { get; set; }
    public int? bill_status { get; set; }
    public int? bill_type { get; set; }
    public string? tax_id { get; set; }
    public string? agency_code { get; set; }
    public string? rev_name { get; set; }
    public string? rev_code { get; set; }
    public string? amount { get; set; }
    public string? created_at { get; set; }
    public string? updated_at { get; set; }
}

public class Bill
{

    private readonly ILogger<IndexModel> _logger;
    private readonly DatabaseHelper _databaseHelper;

    public Bill(ILogger<IndexModel> logger, DatabaseHelper databaseHelper)
    {
        _logger = logger;
        _databaseHelper = databaseHelper;
    }

    /*==============================
    This method fetch the bill using the tax_id
    @params - Type represent the type of bill individual or corporate
    ====================*/
    public ResponseData GetBillsByTaxId(string Type, string taxId)
    {
        if (Type == "single")
            return GetBillsOfTypeSingle(taxId);
        else
            return GetBillsOfTypeHarmonized();

    }

    /*==============================
     This method fetch the individual bill using the tax_id
     ====================*/
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


    /*==============================
     This method fetch the corporate bill using the tax_id
     ====================*/
    public ResponseData GetBillsOfTypeHarmonized()
    {
        string sql = "SELECT * FROM sm_bills";
        ResponseData result = _databaseHelper.Query<BillDataModel>(sql);
        return result;
    }


    public bool IsbillNumberUnique(String BillNumber)
    {
        string sql = $@"
         SELECT tax_id 
         FROM {TblDef.BILL_TBL} 
         WHERE single_bill_num=@single 
         OR combined_bill_num=@combined";
        ResponseData result = _databaseHelper.Query<BillDataModel>(sql, new { single = BillNumber, combined = BillNumber });
        return result.Code == 200;
    }



    /*==============================
     creating new bill
     ====================*/
    public ResponseData CreateBill(SingleBillDTO formData)
    {
        string BillNumber = Utils.GenerateUniqueBillNumber();

        // while (IsbillNumberUnique(BillNumber) == false)
        // {
        //     BillNumber = Utils.GenerateUniqueBillNumber();
        // }

        string sql = $@"
                INSERT INTO {TblDef.BILL_TBL} 
                (single_bill_num, tax_id, agency_code, rev_code, amount)
                VALUES (@single_bill_num, @tax_id, @agency_code, @rev_code, @amount)";

        // Prepare the parameters
        var parameters = new
        {
            single_bill_num = "01" + BillNumber,
            tax_id = formData.tax_id,
            agency_code = formData.agency,
            rev_code = formData.revenueName,
            amount = formData.amount
        };

        // Execute the insert
        int rowsAffected = _databaseHelper.Execute(sql, parameters);

        if (rowsAffected > 0)
            return Utils.GetResponseData(200, "Bill Created Successfully", "01" + BillNumber);

        return Utils.GetResponseData(204, "Bill Failed to create", null);


    }



}
