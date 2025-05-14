using MyFirstCoreApp.Pages;

using System;
using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Http;
using static MyFirstCoreApp.Pages.RegisterModel;


public class TaxPayerLoginModel
{
    public int? id { get; set; }
    public string? fname { get; set; }
    public string? mname { get; set; }
    public string? lname { get; set; }
    public string? email { get; set; }
    public string? phone { get; set; }
    public string? tax_id { get; set; }
    public string? reg_type { get; set; }
    public string? org_name { get; set; }
    public string? password { get; set; }
}

#pragma warning disable CA1050 // Declare types in namespaces
public class TaxPayerModel
{
    public int? Id { get; set; }
    public string? Fname { get; set; }
    public string? Mname { get; set; }
    public string? Lname { get; set; }
    public string? Email { get; set; }
    public string? Sex { get; set; }
    public string? Phone { get; set; }
    public string? Phone1 { get; set; }
    public string? Phone2 { get; set; }
    public string? Dob { get; set; }
    public string? House_no { get; set; }
    public string? Address { get; set; }
    public string? Town { get; set; }
    public string? Lga { get; set; }
    public string? Tax_station { get; set; }
    public string? Nin { get; set; }
    public string? Jtb_tin { get; set; }
    public string? Tax_id { get; set; }
    public string? Image_name { get; set; }
    public string? Mime_type { get; set; }
    public string? Reg_type { get; set; }
    public string? Org_name { get; set; }
    public string? Rc_no { get; set; }
    public string? Password { get; set; }
    public string? Contact_name { get; set; }
    public DateTime? Created_at { get; set; }

}

public class TaxPayer
{

    private readonly ILogger<IndexModel> _logger;
    private readonly DatabaseHelper _databaseHelper;
    private readonly IHttpContextAccessor _httpContextAccessor;


        public TaxPayer(ILogger<IndexModel> logger, DatabaseHelper databaseHelper, IHttpContextAccessor httpContextAccessor)
    {
        _logger = logger ?? throw new ArgumentNullException(nameof(logger));
        _databaseHelper = databaseHelper ?? throw new ArgumentNullException(nameof(databaseHelper));
        _httpContextAccessor = httpContextAccessor ?? throw new ArgumentNullException(nameof(httpContextAccessor));
    }

    // Login user 
    public ResponseData Login(LoginDataModel Input)
    {
        string sql = $@"
            SELECT id,fname,lname,tax_id,email,phone,password,reg_type,org_name 
            FROM {TblDef.TAXPAYER_TBL} 
            WHERE tax_id = @tax_id";
             
             //execute query 
            ResponseData result = _databaseHelper.Query<TaxPayerLoginModel>(sql, new { tax_id = Input.TaxId });

            // validate result for successful data retrieve
            if (result.Code != 200) 
                return Utils.GetResponseData(result.Code, "TaxId/Password in not correct", null);
            
            // conver the the result object to list
           var DataArray = (List<TaxPayerLoginModel>?)result.Data ?? new List<TaxPayerLoginModel>();

            // verify the taxpayer hash password
            if (!Utils.VerifyBcrptHashPassword(Utils.DTrim(Input.Password), DataArray[0].password)) 
                return Utils.GetResponseData(result.Code, "TaxId/Password in not correct", null);

            HttpContext? context = _httpContextAccessor.HttpContext;
            // onsuccessful login set Setsession
           bool IsSetSession =  SetSession(context, DataArray);

            return result;
    }

    public ResponseData Register(TaxpayerInputModel model)
    {
        if (model == null)
        {
            _logger.LogError("Registration failed: Model is null");
            return Utils.GetResponseData(500, "Registration failed: Invalid input", null);
        }
        try
        {
            // Hash the password before storing
            model.Password = Utils.GenerateBcrptHashPassword(model.Password ?? "");
     
            string sql = $@"
                    INSERT INTO {TblDef.TAXPAYER_TBL} (
                        fname, lname, email, phone, sex, password
                    ) VALUES (
                        @FirstName, @LastName, @Email, @Phone, @Sex, @Password
                    )";

            int result = _databaseHelper.Execute(sql, model);
            if (result <= 0)
            {
                _logger.LogWarning("Registration failed: No rows affected");
                return Utils.GetResponseData(500, "Registration failed", result);
            }

            _logger.LogInformation("Registration successful for email: {Email}", model.Email);
            return Utils.GetResponseData(200, "Registration successful: TaxId-30000001", result);
        }
        catch (Exception ex)
        {
            _logger.LogError(ex, "Registration failed with exception");
            return Utils.GetResponseData(500, "Registration failed: Internal error", null);
        }
    }

 private bool SetSession(HttpContext? context , List<TaxPayerLoginModel> user)
    {
        if(context == null)
            return false;
        // Ensure session state is active
        if (!context.Session.IsAvailable)
        {
            context.Session.LoadAsync().Wait();
        }

        // Regenerate session ID (ASP.NET handles this differently)
        context.Session.Clear();

        // Set cookie options (done at configuration in ASP.NET Core)
        var cookieOptions = new CookieOptions
        {
            SameSite = SameSiteMode.Strict,
            Secure = true,
            HttpOnly = true
        };

        context.Response.Cookies.Append(context.Session.Id, "", cookieOptions);

        // Set user session data
        context.Session.SetString("id", user[0].id.ToString() ?? string.Empty);
        context.Session.SetString("fname", user[0].fname ?? string.Empty);
        context.Session.SetString("lname", user[0].lname ?? string.Empty);
        context.Session.SetString("tax_id", user[0].tax_id ?? string.Empty);
        context.Session.SetString("email", user[0].email ?? string.Empty);
        context.Session.SetString("phone", user[0].phone ?? string.Empty);
        context.Session.SetString("regType", user[0].reg_type ?? string.Empty);
        context.Session.SetString("orgname", user[0].org_name ?? string.Empty);
       return true;
    }




 }
