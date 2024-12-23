using Microsoft.AspNetCore.Mvc;
using Microsoft.Extensions.Configuration;
using System.Data;

[Route("api/[controller]")]
[ApiController]

public class UserController : ControllerBase {
    private readonly DbManager _dbManager;
    Response response = new Response();

    public UserController(IConfiguration configuration){
        _dbManager = new DbManager(configuration);
    }

    //GET
    [HttpGet]
    public IActionResult GetAllUsers(){
        try{
            response.status = 200;
            response.message = "Succes";
            response.data = _dbManager.GetAllUsers();
        }catch(Exception ex) {
            response.status = 500;
            response.message = ex.Message;
        }
        return Ok(response);
    }

    [HttpGet("GetUserById")]
    public IActionResult GetUserById(int id_user)
    {
        try
        {
            var user = _dbManager.GetUserById(id_user);
            if (user == null)
            {
                response.status = 404;
                response.message = "User not found";
                response.data = null;
            }
            else
            {
                response.status = 200;
                response.message = "Success";
                response.data = user;
            }
        }
        catch (Exception ex)
        {
            response.status = 500;
            response.message = ex.Message;
        }
        return Ok(response);
    }

     [HttpGet("GetUserByRole")]
    public IActionResult GetUserByRole(string role)
    {
        try
        {
            var user = _dbManager.GetUserByRole(role);
            if (user == null)
            {
                response.status = 404;
                response.message = "User not found";
                response.data = null;
            }
            else
            {
                response.status = 200;
                response.message = "Success";
                response.data = user;
            }
        }
        catch (Exception ex)
        {
            response.status = 500;
            response.message = ex.Message;
        }
        return Ok(response);
    }

    [HttpPost("login")]
    public IActionResult Login([FromBody] LoginRequest loginRequest)
    {
        if (loginRequest == null || string.IsNullOrEmpty(loginRequest.username) || string.IsNullOrEmpty(loginRequest.password))
        {
            return BadRequest("Invalid client request");
        }

        var user = _dbManager.Login(loginRequest.username, loginRequest.password);

        if (user == null)
        {
            return Unauthorized("Username atau password salah.");
        }

        // Jika login berhasil, berikan token atau status berhasil
        return Ok(new { message = "Login berhasil.", username = user.username });
    }


    //CREATE-Post
    [HttpPost("insertUser")]
    public IActionResult CreateUser([FromBody] User user){
        try{
            response.status = 200;
            response.message = "Succes";
            _dbManager.CreateUser(user);
        }catch(Exception ex) {
            response.status = 500;
            response.message = ex.Message;
        }
        return Ok(response);
    }



    //UPDATE by Id -Put
    [HttpPut("updateUser/{id_user}")]
    public IActionResult UpdateUser(int id_user, [FromBody] User user){
        try{
            response.status = 200;
            response.message = "Succes";
            _dbManager.UpdateUser(id_user, user);
        }catch(Exception ex) {
            response.status = 500;
            response.message = ex.Message;
        }
        return Ok(response);
    }

    //DELETE 
    [HttpDelete("deleteUser/{id_user}")]
    public IActionResult DeleteUser(int id_user){
        try{
            response.status = 200;
            response.message = "Succes";
            _dbManager.DeleteUser(id_user);
        }catch(Exception ex) {
            response.status = 500;
            response.message = ex.Message;
        }
        return Ok(response);
    }
}

// Mukhamad_Viko_Ramayudha