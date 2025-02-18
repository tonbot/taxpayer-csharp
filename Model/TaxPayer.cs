
using MyFirstCoreApp.Pages;

using System;
using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Http;




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


public class TaxPayerModel
{
    public int? id { get; set; }
    public string? fname { get; set; }
    public string? mname { get; set; }
    public string? lname { get; set; }
    public string? email { get; set; }
    public string? sex { get; set; }
    public string? phone { get; set; }
    public string? phone1 { get; set; }
    public string? phone2 { get; set; }
    public string? dob { get; set; }
    public string? house_no { get; set; }
    public string? address { get; set; }
    public string? town { get; set; }
    public string? lga { get; set; }
    public string? tax_station { get; set; }
    public string? nin { get; set; }
    public string? jtb_tin { get; set; }
    public string? tax_id { get; set; }
    public string? image_name { get; set; }
    public string? mime_type { get; set; }
    public string? reg_type { get; set; }
    public string? org_name { get; set; }
    public string? rc_no { get; set; }
    public string? password { get; set; }
    public string? contact_name { get; set; }
    public DateTime? created_at { get; set; }

}

public class TaxPayer
{

    private readonly ILogger<IndexModel> _logger;
    private readonly DatabaseHelper _databaseHelper;
        private readonly IHttpContextAccessor _httpContextAccessor;


    public TaxPayer(ILogger<IndexModel> logger, DatabaseHelper databaseHelper, IHttpContextAccessor httpContextAccessor)
    {
        _logger = logger;
        _databaseHelper = databaseHelper;
           _httpContextAccessor = httpContextAccessor;
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
