using Microsoft.AspNetCore.Mvc;
using Microsoft.Extensions.Configuration;
using System.Data;

[Route("api/[controller]")]
[ApiController]

public class KategoriController : ControllerBase {
    private readonly DbManager _dbManager;
    Response response = new Response();

    public KategoriController(IConfiguration configuration){
        _dbManager = new DbManager(configuration);
    }


    //GET
    [HttpGet]
    public IActionResult GetAllKategoris(){
        try{
            response.status = 200;
            response.message = "Succes";
            response.data = _dbManager.GetAllKategoris();
        }catch(Exception ex) {
            response.status = 500;
            response.message = ex.Message;
        }
        return Ok(response);
    }

    [HttpGet("GetKategoriById")]
    public IActionResult GetKategoriById(int id_kategori)
    {
        try
        {
            var kategori = _dbManager.GetKategoriById(id_kategori);
            if (kategori == null)
            {
                response.status = 404;
                response.message = "Kategori not found";
                response.data = null;
            }
            else
            {
                response.status = 200;
                response.message = "Success";
                response.data = kategori;
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
    [HttpPost("insertKategori")]
    public IActionResult CreateKategori([FromBody] Kategori kategori){
        try{
            response.status = 200;
            response.message = "Succes";
            _dbManager.CreateKategori(kategori);
        }catch(Exception ex) {
            response.status = 500;
            response.message = ex.Message;
        }
        return Ok(response);
    }



    //UPDATE by Id -Put
    [HttpPut("updateKategori/{id_kategori}")]
    public IActionResult UpdateKategori(int id_kategori, [FromBody] Kategori kategori){
        try{
            response.status = 200;
            response.message = "Succes";
            _dbManager.UpdateKategori(id_kategori, kategori);
        }catch(Exception ex) {
            response.status = 500;
            response.message = ex.Message;
        }
        return Ok(response);
    }



    //DELETE 
    [HttpDelete("deleteKategori/{id_kategori}")]
    public IActionResult DeleteKategori(int id_kategori){
        try{
            response.status = 200;
            response.message = "Succes";
            _dbManager.DeleteKategori(id_kategori);
        }catch(Exception ex) {
            response.status = 500;
            response.message = ex.Message;
        }
        return Ok(response);
    }
}

// Mukhamad_Viko_Ramayudha