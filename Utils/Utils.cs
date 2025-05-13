
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

    public static string GenerateBcrptHashPassword(string password)
    {
        return BCrypt.Net.BCrypt.HashPassword(password);
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


    public static string GenerateUniqueBillNumber()
    {
        // Get the current timestamp
        long timestamp = DateTimeOffset.UtcNow.ToUnixTimeSeconds();
        string timestampStr = timestamp.ToString();

        // Generate a random 6-digit number
        Random random = new Random();
        int randomDigit = random.Next(100000, 1000000);

        // Combine timestamp and random number
        string combined = timestampStr + randomDigit;

        // Shuffle the combined string
        char[] array = combined.ToCharArray();
        Random rng = new Random();
        for (int i = array.Length - 1; i > 0; i--)
        {
            int j = rng.Next(i + 1);
            (array[i], array[j]) = (array[j], array[i]);
        }

        // Take the first 7 characters as the bill number
        string billNumber = new string(array).Substring(0, 7);
        return billNumber;
    }
}




public class ResponseData
{
    public required int Code { get; set; }
    public required string Message { get; set; }
    public object? Data { get; set; }
}