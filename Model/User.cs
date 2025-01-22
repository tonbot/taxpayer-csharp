
using MyFirstCoreApp.Pages;

public class UserModel
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

public  class User
{

   private readonly ILogger<IndexModel> _logger;
    private readonly DatabaseHelper  _databaseHelper;
   
    public User(ILogger<IndexModel> logger, DatabaseHelper databaseHelper)
    {
        _logger = logger;
        _databaseHelper = databaseHelper;
    }



    // Login user 
    public ResponseData Login(LoginDataModel Input)
    {
        string sql = "SELECT * FROM sm_users";
        ResponseData result = _databaseHelper.Query<UserModel>(sql);
        return result;
    }
   
 



}
