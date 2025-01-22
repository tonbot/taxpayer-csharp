public static class Utils
{
    public static ResponseData _ResponseData {get; set;}

    public static ResponseData GetResponseData(int Code, string Message, object Data){
       _ResponseData = new ResponseData {Code = Code, Message = Message, Data = Data};
       return  _ResponseData ;
    }

    
}
  public class ResponseData
{
    public int Code { get; set; }
    public string Message { get; set; }
    public object Data { get; set; }
}