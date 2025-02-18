
public static class Utils
{
    public static ResponseData? _ResponseData { get; set; }

    public static ResponseData GetResponseData(int Code, string Message, object? Data)
    {
        _ResponseData = new ResponseData { Code = Code, Message = Message, Data = Data };
        return _ResponseData;
    }


    public static bool VerifyBcrptHashPassword(string Password, string? HashedPassword)
    {
        bool isPasswordValid = BCrypt.Net.BCrypt.Verify(Password, HashedPassword);
        return isPasswordValid;
    }



    public static string DTrim(string data)
    {
        if (string.IsNullOrWhiteSpace(data))
        {
            return string.Empty; // Handle null or whitespace input gracefully
        }
        // Trim whitespace from the input
        data = data.Trim();

        // Encode special HTML characters
        data = System.Net.WebUtility.HtmlEncode(data);

        return data;
    }
   


}
public class ResponseData
{
    public required int Code { get; set; }
    public required string Message { get; set; }
    public object? Data { get; set; }
}