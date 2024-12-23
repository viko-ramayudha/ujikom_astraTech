using Microsoft.AspNetCore.Mvc;
using Microsoft.Extensions.Configuration;
using System.Data;

[Route("api/[controller]")]
[ApiController]

public class DetailLayananController : ControllerBase {
    private readonly DbManager _dbManager;
    Response response = new Response();

    public DetailLayananController(IConfiguration configuration){
        _dbManager = new DbManager(configuration);
    }


    //GET
    [HttpGet]
    public IActionResult GetAllDetailLayanans(){
        try{
            response.status = 200;
            response.message = "Succes";
            response.data = _dbManager.GetAllDetailLayanans();
        }catch(Exception ex) {
            response.status = 500;
            response.message = ex.Message;
        }
        return Ok(response);
    }


    // [HttpGet("GetDetailLayananById")]
    // public IActionResult GetKategoriById(int id_layanan)
    // {
    //     try
    //     {
    //         var detaillayanan = _dbManager.GetDetailLayananById(id_layanan);
    //         if (detaillayanan == null)
    //         {
    //             response.status = 404;
    //             response.message = "Layanan not found";
    //             response.data = null;
    //         }
    //         else
    //         {
    //             response.status = 200;
    //             response.message = "Success";
    //             response.data = detaillayanan;
    //         }
    //     }
    //     catch (Exception ex)
    //     {
    //         response.status = 500;
    //         response.message = ex.Message;
    //     }
    //     return Ok(response);
    // }


    [HttpGet("GetDetailLayananByIdKategori")]
    public IActionResult GetKategoriByIdKategori(int id_kategori)
    {
        try
        {
            var detaillayanan = _dbManager.GetDetailLayananByIdKategori(id_kategori);
            if (detaillayanan == null)
            {
                response.status = 404;
                response.message = "Layanan not found";
                response.data = null;
            }
            else
            {
                response.status = 200;
                response.message = "Success";
                response.data = detaillayanan;
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
    [HttpPost("insertDetailLayanan")]
    public IActionResult CreateDetailLayanan([FromBody] DetailLayanan detaillayanan){
        try{
            response.status = 200;
            response.message = "Succes";
            _dbManager.CreateDetailLayanan(detaillayanan);
        }catch(Exception ex) {
            response.status = 500;
            response.message = ex.Message;
        }
        return Ok(response);
    }



    //UPDATE by Id -Put
    [HttpPut("updateDetaiLayanan/{id_layanan}")]
    public IActionResult UpdateDetailLayanan(int id_layanan, [FromBody] DetailLayanan detaillayanan){
        try{
            response.status = 200;
            response.message = "Succes";
            _dbManager.UpdateDetailLayanan(id_layanan, detaillayanan);
        }catch(Exception ex) {
            response.status = 500;
            response.message = ex.Message;
        }
        return Ok(response);
    }



    //DELETE 
    [HttpDelete("deleteDetaiLayanan/{id_layanan}")]
    public IActionResult DeleteDetailLayanan(int id_layanan){
        try{
            response.status = 200;
            response.message = "Succes";
            _dbManager.DeleteDetailLayanan(id_layanan);
        }catch(Exception ex) {
            response.status = 500;
            response.message = ex.Message;
        }
        return Ok(response);
    }
}

// Mukhamad_Viko_Ramayudha