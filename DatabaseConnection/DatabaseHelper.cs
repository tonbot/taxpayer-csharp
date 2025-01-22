using MySql.Data.MySqlClient;
using System.Data;
using Dapper;
 
//  namespace MyFirstCoreApp.Database;


public class DatabaseHelper
{
    private readonly string _connectionString;

    public DatabaseHelper( )
    {
        _connectionString = "server=localhost;database=smart_revenue;user=root;password=";
    }

    private IDbConnection GetConnection()
    {
        return new MySqlConnection(_connectionString);
    }

    // this is use to on select statement
    public ResponseData Query<T>(string sql, object parameters = null)
    {
        try
        {
            using (var connection = GetConnection())
            {
                //open connection
                connection.Open();
                
                // validate sql string 
                if(string.IsNullOrWhiteSpace(sql))
                    return Utils.GetResponseData(204,"Invalid Query", null);
             
               //Execute sql query 
               var QueryResults  = connection.Query<T>(sql, parameters);

               //return no record found on if no result found
                if (!QueryResults.Any())
                    return Utils.GetResponseData(204, "No Record Found", null);
                else
                    return Utils.GetResponseData(200, "Success", QueryResults);
            }
        }
        catch (Exception ex)
        {
            return Utils.GetResponseData(500,"Internal Server Error",null);
        }
    }

    // // this is used for insert or delete or update operations 
    // public int Execute(string sql, object parameters = null)
    // {
    //     using (var connection = GetConnection())
    //     {
    //         connection.Open();
    //         return connection.Execute(sql, parameters);
    //     }
    // }


}



