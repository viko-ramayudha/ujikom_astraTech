public class Transaksi
{
    public int id_trx { get; set; }
    public DateTime tgl_trx { get; set; }
    public int id_layanan { get; set; }
    public int id_user { get; set; }
    public int id_userr { get; set; }
    public DateTime tgl_janjian { get; set; }
    public decimal total_hrg { get; set; }
}