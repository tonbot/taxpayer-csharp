
using MyFirstCoreApp.Pages;

public class BillModel
{
    public int id { get; set; }
    public string first_name { get; set; }
    public string last_name { get; set; }
    public string username { get; set; }
    public string password { get; set; }
    public int role_id { get; set; }
    public string email { get; set; }
    public string status { get; set; }
    public string created_at { get; set; }
}

public class Bill
{

   private readonly ILogger<IndexModel> _logger;
    private readonly DatabaseHelper  _databaseHelper;
   
    public User(ILogger<IndexModel> logger, DatabaseHelper databaseHelper)
    {
        _logger = logger;
        _databaseHelper = databaseHelper;
    }



    // Bill
    public ResponseData GetBill(DataModel Input)
    {
        string sql = "SELECT * FROM sm_users";
        ResponseData result = _databaseHelper.Query<UserModel>(sql);
        return result;
    }


   
 



}
