using Microsoft.AspNetCore.Mvc;
using Microsoft.Extensions.Configuration;
using MySql.Data.MySqlClient;
using System;
using System.Data;
using Stackup.Api; // Sesuaikan dengan namespace tempat Anda mendefinisikan UserRole

[Route("api/[controller]")]
[ApiController]
public class LoginController : ControllerBase
{
    private readonly string connectionString;

    public LoginController(IConfiguration configuration)
    {
        connectionString = configuration.GetConnectionString("DefaultConnection");
    }

    [HttpPost("login")]
    public IActionResult Login([FromBody] Login request)
    {
        try
        {
            using (MySqlConnection connection = new MySqlConnection(connectionString))
            {
                string query = "SELECT id_user, email, role, id_spesialisasi FROM user WHERE username = @Username AND password = @Password";

                using (MySqlCommand command = new MySqlCommand(query, connection))
                {
                    command.Parameters.AddWithValue("@Username", request.username);
                    command.Parameters.AddWithValue("@Password", request.password);
                    
                    connection.Open();
                    var reader = command.ExecuteReader();
                    
                    if (reader.Read())
                    {
                        var id_user = reader.GetInt32("id_user");
                        
                        var email = reader.GetString("email"); 
                        var role = reader.GetString("role"); 
                        var id_spesialisasi = reader.GetInt32("id_spesialisasi"); 
                       
                        
                        return Ok(new { success = true, id_user, email, role, id_spesialisasi });
                    }
                    else
                    {
                        return Ok(new { success = false });
                    }
                }

            }
        }
        catch (Exception ex)
        {
            return StatusCode(500, new { message = ex.Message });
        }
    }
}