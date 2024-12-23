using Microsoft.AspNetCore.Mvc;
using Microsoft.Extensions.Configuration;
using System.Data;

[Route("api/[controller]")]
[ApiController]

public class TransaksiController : ControllerBase {
    private readonly DbManager _dbManager;
    Response response = new Response();

    public TransaksiController(IConfiguration configuration){
        _dbManager = new DbManager(configuration);
    }


    //GET
    [HttpGet]
    public IActionResult GetAllTransaksis(){
        try{
            response.status = 200;
            response.message = "Succes";
            response.data = _dbManager.GetAllTransaksis();
        }catch(Exception ex) {
            response.status = 500;
            response.message = ex.Message;
        }
        return Ok(response);
    }

    [HttpGet("GetTransaksiById")]
    public IActionResult GetTransaksiById(int id_trx)
    {
        try
        {
            var transaksi = _dbManager.GetTransaksiById(id_trx);
            if (transaksi == null)
            {
                response.status = 404;
                response.message = "Transaksi not found";
                response.data = null;
            }
            else
            {
                response.status = 200;
                response.message = "Success";
                response.data = transaksi;
            }
        }
        catch (Exception ex)
        {
            response.status = 500;
            response.message = ex.Message;
        }
        return Ok(response);
    }


    //CREATE-Post
    [HttpPost("insertTransaksi")]
    public IActionResult CreateTransaksi([FromBody] Transaksi transaksi){
        try{
            response.status = 200;
            response.message = "Succes";
            _dbManager.CreateTransaksi(transaksi);
        }catch(Exception ex) {
            response.status = 500;
            response.message = ex.Message;
        }
        return Ok(response);
    }



    //UPDATE by Id -Put
    [HttpPut("updateTransaksi/{id_trx}")]
    public IActionResult UpdateTransaksi(int id_trx, [FromBody] Transaksi transaksi){
        try{
            response.status = 200;
            response.message = "Succes";
            _dbManager.UpdateTransaksi(id_trx, transaksi);
        }catch(Exception ex) {
            response.status = 500;
            response.message = ex.Message;
        }
        return Ok(response);
    }



    //DELETE 
    [HttpDelete("deleteTransaksi/{id_trx}")]
    public IActionResult DeleteTransaksi(int id_trx){
        try{
            response.status = 200;
            response.message = "Succes";
            _dbManager.DeleteTransaksi(id_trx);
        }catch(Exception ex) {
            response.status = 500;
            response.message = ex.Message;
        }
        return Ok(response);
    }
}

// Mukhamad_Viko_Ramayudha