using System.Data;
using MySql.Data.MySqlClient;

public class DbManager {
    private readonly string connectionString;
    private readonly MySqlConnection _connection;
    public DbManager(IConfiguration configuration) {
        connectionString = configuration.GetConnectionString("DefaultConnection");
        _connection = new MySqlConnection(connectionString);
    }

    // GET
    public List<User> GetAllUsers()
    {
        List<User> userList = new List<User>();
        try
        {
            using (MySqlConnection connection = new MySqlConnection(connectionString))
            {
                string query = "SELECT * FROM user";
                MySqlCommand command = new MySqlCommand(query, connection);
                connection.Open();
                using (MySqlDataReader reader = command.ExecuteReader())
                {
                    while (reader.Read())
                    {
                        User user = new User
                        {
                            id_user = Convert.ToInt32(reader["Id_user"]),
                            username = reader["Username"].ToString(),
                            email = reader["Email"].ToString(),
                            password = reader["Password"].ToString(),
                            role = reader["Role"].ToString(),
                            id_spesialisasi = Convert.ToInt32(reader["Id_spesialisasi"]),
                        };
                        userList.Add(user);
                    }
                }
            }
        }
        catch (Exception ex)
        {
            Console.WriteLine(ex.Message);
        }
        return userList;
    }

    
    public User Login   (string username, string password)
    {
        User user = null;
        try
        {
            using (MySqlConnection connection = _connection)
            {
                string query = "SELECT * FROM user WHERE username = @Username AND password = @Password";
                MySqlCommand command = new MySqlCommand(query, connection);
                command.Parameters.AddWithValue("@Username", username);
                command.Parameters.AddWithValue("@Password", password);

                connection.Open();
                using (MySqlDataReader reader = command.ExecuteReader())
                {
                    if (reader.Read())
                    {
                        user = new User
                        {
                            id_user = Convert.ToInt32(reader["Id_user"]),
                            username = reader["Username"].ToString(),
                            email = reader["Email"].ToString(),
                            password = reader["Password"].ToString(),
                            role = reader["Role"].ToString(),
                            id_spesialisasi = Convert.ToInt32(reader["id_spesialisasi"]),
                        };
                    }
                }
            }
        }
        catch (Exception ex)
        {
            Console.WriteLine(ex.Message);
        }
        return user;

    }

    //Warteg GetById
    public User GetUserById(int id_user)
    {
        User user = null;
        try
        {
            using (MySqlConnection connection = _connection)
            {
                string query = "SELECT * FROM user WHERE id_user = @Id_user";
                MySqlCommand command = new MySqlCommand(query, connection);
                command.Parameters.AddWithValue("@Id_user", id_user); // Fixed typo here
                connection.Open();
                using (MySqlDataReader reader = command.ExecuteReader())
                {
                    if (reader.Read())
                    {
                        user = new User
                        {
                            id_user = Convert.ToInt32(reader["Id_user"]),
                            username = reader["Username"].ToString(),
                            email = reader["Email"].ToString(),
                            password = reader["Password"].ToString(),
                            role = reader["Role"].ToString(),
                            id_spesialisasi = Convert.ToInt32(reader["id_spesialisasi"]),
                        };
                    }
                }
            }
        }
        catch (Exception ex)
        {
            Console.WriteLine(ex.Message);
        }
        return user;
    }

    public User GetUserByRole(string role)
    {
        User user = null;
        try
        {
            using (MySqlConnection connection = _connection)
            {
                string query = "SELECT * FROM user WHERE role = @Role";
                MySqlCommand command = new MySqlCommand(query, connection);
                command.Parameters.AddWithValue("@Role", role); // Fixed typo here
                connection.Open();
                using (MySqlDataReader reader = command.ExecuteReader())
                {
                    if (reader.Read())
                    {
                        user = new User
                        {
                            role = reader["Role"].ToString(),
                            id_user = Convert.ToInt32(reader["Id_user"]),
                            username = reader["Username"].ToString(),
                            email = reader["Email"].ToString(),
                            password = reader["Password"].ToString(),
                            id_spesialisasi = Convert.ToInt32(reader["id_spesialisasi"]),
                        };
                    }
                }
            }
        }
        catch (Exception ex)
        {
            Console.WriteLine(ex.Message);
        }
        return user;
    }

    // Create Warteg
    public int CreateUser(User user)
        {
            using (MySqlConnection connection = _connection)
            {
                string query = "INSERT INTO user (id_user, username, email, password, role, id_spesialisasi) VALUES (@Id_user, @Username, @Email, @Password, @Role, @Id_spesialisasi)";
                using (MySqlCommand command = new MySqlCommand(query, connection))
                {
                    command.Parameters.AddWithValue("@Id_user", user.id_user);
                    command.Parameters.AddWithValue("@Username", user.username);
                    command.Parameters.AddWithValue("@Email", user.email);
                    command.Parameters.AddWithValue("@Password", user.password);
                    command.Parameters.AddWithValue("@Role", user.role);
                    command.Parameters.AddWithValue("@Id_spesialisasi", user.id_spesialisasi);

                    connection.Open();
                    return command.ExecuteNonQuery();
                }
            }
        }

    // Update Warteg
    public int UpdateUser(int id_user, User user)
    {
        using (MySqlConnection connection = _connection)
        {
            string query = "UPDATE user SET username = @Username, email = @Email, password = @Password, role = @Role, id_spesialisasi = @Id_spesialisasi WHERE id_user = @Id_user";
            using (MySqlCommand command = new MySqlCommand(query, connection))
            {
                command.Parameters.AddWithValue("@Username", user.username);
                command.Parameters.AddWithValue("@Email", user.email);
                command.Parameters.AddWithValue("@Password", user.password);
                command.Parameters.AddWithValue("@Role", user.role);
                command.Parameters.AddWithValue("@Id_spesialisasi", user.id_spesialisasi);
                command.Parameters.AddWithValue("@Id_user", id_user);

                connection.Open();
                return command.ExecuteNonQuery();
            }
        }
    }

    // Delete Warteg
    public int DeleteUser(int id_user)
    {
        using (MySqlConnection connection = new MySqlConnection(connectionString))
        {
            string query = "DELETE FROM user WHERE id_user = @Id_user";
            using (MySqlCommand command = new MySqlCommand(query, connection))
            {
                command.Parameters.AddWithValue("@Id_user", id_user);

                connection.Open();
                return command.ExecuteNonQuery();
            }
        }
    }


    // GET
    public List<Kategori> GetAllKategoris()
        {
            List<Kategori> kategoriList = new List<Kategori>();
            try
            {
                using (MySqlConnection connection = new MySqlConnection(connectionString))
                {
                    string query = "SELECT * FROM kategori_layanan";
                    MySqlCommand command = new MySqlCommand(query, connection);
                    connection.Open();
                    using (MySqlDataReader reader = command.ExecuteReader())
                    {
                        while (reader.Read())
                        {
                            Kategori kategori = new Kategori
                            {
                                id_kategori = Convert.ToInt32(reader["Id_kategori"]),
                                nama_kategori = reader["Nama_kategori"].ToString(),
                                deskripsi = reader["Deskripsi"].ToString(),
                                url = reader["Url"].ToString(),
                            };
                            kategoriList.Add(kategori);
                        }
                    }
                }
            }
            catch (Exception ex)
            {
                Console.WriteLine(ex.Message);
            }
            return kategoriList;
        }

    // Warteg GetById
    public Kategori GetKategoriById(int id_kategori)
    {
        Kategori kategori = null;
        try
        {
            using (MySqlConnection connection = _connection)
            {
                string query = "SELECT * FROM kategori_layanan WHERE id_kategori = @Id_kategori";
                MySqlCommand command = new MySqlCommand(query, connection);
                command.Parameters.AddWithValue("@Id_kategori", id_kategori); // Fixed typo here
                connection.Open();
                using (MySqlDataReader reader = command.ExecuteReader())
                {
                    if (reader.Read())
                    {
                        kategori = new Kategori
                        {
                            id_kategori = Convert.ToInt32(reader["Id_kategori"]),
                            nama_kategori = reader["Nama_kategori"].ToString(),
                            deskripsi = reader["Deskripsi"].ToString(),
                            url = reader["Url"].ToString(),
                        };
                    }
                }
            }
        }
        catch (Exception ex)
        {
            Console.WriteLine(ex.Message);
        }
        return kategori;
    }

        // Create Warteg
        public int CreateKategori(Kategori kategori)
            {
                using (MySqlConnection connection = _connection)
                {
                    string query = "INSERT INTO kategori_layanan (id_kategori, nama_kategori, deskripsi, url) VALUES (@Id_kategori, @Nama_kategori, @Deskripsi, @Url)";
                    using (MySqlCommand command = new MySqlCommand(query, connection))
                    {
                        command.Parameters.AddWithValue("@Id_kategori", kategori.id_kategori);
                        command.Parameters.AddWithValue("@Nama_kategori", kategori.nama_kategori);
                        command.Parameters.AddWithValue("@Deskripsi", kategori.deskripsi);
                        command.Parameters.AddWithValue("@Url", kategori.url);

                        connection.Open();
                        return command.ExecuteNonQuery();
                    }
                }
            }

        // Update Warteg
        public int UpdateKategori(int id_kategori, Kategori kategori)
        {
            using (MySqlConnection connection = _connection)
            {
                string query = "UPDATE kategori_layanan SET nama_kategori = @Nama_kategori, deskripsi = @Deskripsi, url = @Url WHERE id_kategori = @Id_kategori";
                using (MySqlCommand command = new MySqlCommand(query, connection))
                {
                    command.Parameters.AddWithValue("@Nama_kategori", kategori.nama_kategori);
                    command.Parameters.AddWithValue("@Deskripsi", kategori.deskripsi);
                    command.Parameters.AddWithValue("@Url", kategori.url);
                    command.Parameters.AddWithValue("@Id_kategori", id_kategori);

                    connection.Open();
                    return command.ExecuteNonQuery();
                }
            }
        }

        // Delete Warteg
        public int DeleteKategori(int id_kategori)
        {
            using (MySqlConnection connection = new MySqlConnection(connectionString))
            {
                string query = "DELETE FROM kategori_layanan WHERE id_kategori = @Id_kategori";
                using (MySqlCommand command = new MySqlCommand(query, connection))
                {
                    command.Parameters.AddWithValue("@Id_kategori", id_kategori);

                    connection.Open();
                    return command.ExecuteNonQuery();
                }
            }
        }


    public List<GetDetail> GetAllDetailLayanans()
    {
    List<GetDetail> detaillayananList = new List<GetDetail>();
    try
    {
        using (MySqlConnection connection = new MySqlConnection(connectionString))
        {
        string query = "SELECT dl.*, kl.nama_kategori " + "FROM detail_layanan dl " + "INNER JOIN kategori_layanan kl ON dl.id_kategori = kl.id_kategori";


        MySqlCommand command = new MySqlCommand(query, connection);
        connection.Open();
        using (MySqlDataReader reader = command.ExecuteReader())
        {
            while (reader.Read())
            {
            GetDetail detaillayanan = new GetDetail
            {
                id_layanan = Convert.ToInt32(reader["Id_layanan"]),
                id_kategori = Convert.ToInt32(reader["Id_kategori"]),
                id_spesialisasi = Convert.ToInt32(reader["Id_spesialisasi"]),
                nama_layanan = reader["Nama_layanan"].ToString(),
                harga = Convert.ToDecimal(reader["Harga"]),
                url = reader["Url"].ToString(),
                nama_kategori = reader["Nama_kategori"].ToString() // Include related category name
            };
            detaillayananList.Add(detaillayanan);
            }
        }
        }
    }
    catch (Exception ex)
    {
        Console.WriteLine(ex.Message);
    }
    return detaillayananList;
    }



    // public List<DetailLayanan> GetAllDetailLayanans()
    //     {
    //         List<DetailLayanan> detaillayananList = new List<DetailLayanan>();
    //         try
    //         {
    //             using (MySqlConnection connection = new MySqlConnection(connectionString))
    //             {
    //                 string query = "SELECT * FROM detail_layanan";
    //                 MySqlCommand command = new MySqlCommand(query, connection);
    //                 connection.Open();
    //                 using (MySqlDataReader reader = command.ExecuteReader())
    //                 {
    //                     while (reader.Read())
    //                     {
    //                         DetailLayanan detaillayanan = new DetailLayanan
    //                         {
    //                             id_layanan = Convert.ToInt32(reader["Id_layanan"]),
    //                             id_kategori = Convert.ToInt32(reader["Id_kategori"]),
    //                             id_spesialisasi = Convert.ToInt32(reader["Id_spesialisasi"]),
    //                             nama_layanan = reader["Nama_layanan"].ToString(),
    //                             harga = Convert.ToDecimal(reader["Harga"]),
                                
    //                         };
    //                         detaillayananList.Add(detaillayanan);
    //                     }
    //                 }
    //             }
    //         }
    //         catch (Exception ex)
    //         {
    //             Console.WriteLine(ex.Message);
    //         }
    //         return detaillayananList;
    //     }

    // Warteg GetById
    // public DetailLayanan GetDetailLayananByIdKategori(int id_kategori)
    //     {
    //     DetailLayanan detaillayanan = null;
    //     try
    //     {
    //         using (MySqlConnection connection = _connection)
    //         {
    //             string query = "SELECT * FROM detail_layanan WHERE id_kategori = @Id_kategori";
    //             MySqlCommand command = new MySqlCommand(query, connection);
    //             command.Parameters.AddWithValue("@Id_kategori", id_kategori);
    //             connection.Open();
    //             using (MySqlDataReader reader = command.ExecuteReader())
    //             {
    //                 if (reader.Read())
    //                 {
    //                     detaillayanan = new DetailLayanan
    //                     {
    //                         id_layanan = Convert.ToInt32(reader["Id_layanan"]),
    //                         id_kategori = Convert.ToInt32(reader["Id_kategori"]),
    //                         id_spesialisasi = Convert.ToInt32(reader["Id_spesialisasi"]),
    //                         nama_layanan = reader["Nama_layanan"].ToString(),
    //                         harga = Convert.ToDecimal(reader["Harga"]),
    //                     };
    //                 }
    //             }
    //         }
    //     }
    //     catch (Exception ex)
    //     {
    //         Console.WriteLine(ex.Message);
    //     }
    //     return detaillayanan;
    //     }


    public DetailLayanan GetDetailLayananByIdKategori(int id_kategori)
{
    DetailLayanan detailLayanan = null;
    try
    {
        using (MySqlConnection connection = _connection) // Open and close connection within the using block
        {
            string query = "SELECT * FROM detail_layanan WHERE #id_kategori = @Id_kategori"; // Use # for parameter binding
            MySqlCommand command = new MySqlCommand(query, connection);
            command.Parameters.AddWithValue("@Id_kategori", id_kategori); // Add parameter with name

            connection.Open();

            using (MySqlDataReader reader = command.ExecuteReader())
            {
                if (reader.Read()) // Check if a record is found
                {
                    detailLayanan = new DetailLayanan // Create object only if data exists
                    {
                        id_layanan = Convert.ToInt32(reader["Id_layanan"]),
                        id_kategori = Convert.ToInt32(reader["Id_kategori"]),
                        id_spesialisasi = Convert.ToInt32(reader["Id_spesialisasi"]),
                        nama_layanan = reader["Nama_layanan"].ToString(),
                        harga = Convert.ToDecimal(reader["Harga"]),
                    };
                }
            }
        }
    }
    catch (Exception ex)
    {
        Console.WriteLine(ex.Message); // Log the error message, consider more robust error handling
    }
    return detailLayanan;
}


        // Create Warteg
        public int CreateDetailLayanan(DetailLayanan detaillayanan)
            {
                using (MySqlConnection connection = _connection)
                {
                    string query = "INSERT INTO detail_layanan (id_layanan, id_kategori, id_spesialisasi, nama_layanan, harga, url) VALUES (@Id_layanan, @Id_kategori, @Id_spesialisasi, @Nama_layanan, @Harga, @Url)";
                    using (MySqlCommand command = new MySqlCommand(query, connection))
                    {
                        command.Parameters.AddWithValue("@Id_layanan", detaillayanan.id_layanan);
                        command.Parameters.AddWithValue("@Id_kategori", detaillayanan.id_kategori);
                        command.Parameters.AddWithValue("@Id_spesialisasi", detaillayanan.id_spesialisasi);
                        command.Parameters.AddWithValue("@Nama_layanan", detaillayanan.nama_layanan);
                        command.Parameters.AddWithValue("@Harga", detaillayanan.harga);
                        command.Parameters.AddWithValue("@Url", detaillayanan.url);

                        connection.Open();
                        return command.ExecuteNonQuery();
                    }
                }
            }

        // Update Warteg
        public int UpdateDetailLayanan(int id_layanan, DetailLayanan detaillayanan)
        {
            using (MySqlConnection connection = _connection)
            {
                string query = "UPDATE detail_layanan SET id_kategori = @Id_kategori, id_spesialisasi = @Id_spesialisasi, nama_layanan = @Nama_layanan, harga = @Harga, url = @Url WHERE id_layanan = @Id_layanan";
                using (MySqlCommand command = new MySqlCommand(query, connection))
                {
                    
                    command.Parameters.AddWithValue("@Id_kategori", detaillayanan.id_kategori);
                    command.Parameters.AddWithValue("@Id_spesialisasi", detaillayanan.id_spesialisasi);
                    command.Parameters.AddWithValue("@Nama_layanan", detaillayanan.nama_layanan);
                    command.Parameters.AddWithValue("@Harga", detaillayanan.harga);
                    command.Parameters.AddWithValue("@Url", detaillayanan.url);
                    command.Parameters.AddWithValue("@Id_layanan", id_layanan);

                    connection.Open();
                    return command.ExecuteNonQuery();
                }
            }
        }

        // Delete Warteg
        public int DeleteDetailLayanan(int id_layanan)
        {
            using (MySqlConnection connection = new MySqlConnection(connectionString))
            {
                string query = "DELETE FROM detail_layanan WHERE id_layanan = @Id_layanan";
                using (MySqlCommand command = new MySqlCommand(query, connection))
                {
                    command.Parameters.AddWithValue("@Id_layanan", id_layanan);

                    connection.Open();
                    return command.ExecuteNonQuery();
                }
            }
        }




    


    public List<Transaksi> GetAllTransaksis()
        {
            List<Transaksi> transaksiList = new List<Transaksi>();
            try
            {
                using (MySqlConnection connection = new MySqlConnection(connectionString))
                {
                    string query = "SELECT * FROM transaksi";
                    MySqlCommand command = new MySqlCommand(query, connection);
                    connection.Open();
                    using (MySqlDataReader reader = command.ExecuteReader())
                    {
                        while (reader.Read())
                        {
                            Transaksi transaksi = new Transaksi
                            {
                                id_trx = Convert.ToInt32(reader["Id_trx"]),
                                tgl_trx = Convert.ToDateTime(reader["Tgl_trx"]),
                                id_layanan = Convert.ToInt32(reader["Id_layanan"]),
                                id_user = Convert.ToInt32(reader["Id_user"]),
                                id_userr = Convert.ToInt32(reader["Id_userr"]),
                                tgl_janjian = Convert.ToDateTime(reader["Tgl_janjian"]),
                                total_hrg = Convert.ToDecimal(reader["Total_hrg"]),
                                
                            };
                            transaksiList.Add(transaksi);
                        }
                    }
                }
            }
            catch (Exception ex)
            {
                Console.WriteLine(ex.Message);
            }
            return transaksiList;
        }

    //Warteg GetById
    public Transaksi GetTransaksiById(int id_trx)
        {
        Transaksi transaksi = null;
        try
        {
            using (MySqlConnection connection = _connection)
            {
                string query = "SELECT * FROM transaksi WHERE id_trx = @Id_trx";
                MySqlCommand command = new MySqlCommand(query, connection);
                command.Parameters.AddWithValue("@Id_trx", id_trx);
                connection.Open();
                using (MySqlDataReader reader = command.ExecuteReader())
                {
                    if (reader.Read())
                    {
                        transaksi = new Transaksi
                        {
                            id_trx = Convert.ToInt32(reader["Id_trx"]),
                            tgl_trx = Convert.ToDateTime(reader["Tgl_trx"]),
                            id_layanan = Convert.ToInt32(reader["Id_layanan"]),
                            id_user = Convert.ToInt32(reader["Id_user"]),
                            id_userr = Convert.ToInt32(reader["Id_userr"]),
                            tgl_janjian = Convert.ToDateTime(reader["Tgl_janjian"]),
                            total_hrg = Convert.ToDecimal(reader["Total_hrg"]),
                        };
                    }
                }
            }
        }
        catch (Exception ex)
        {
            Console.WriteLine(ex.Message);
        }
        return transaksi;
        }


        // Create Warteg
        public int CreateTransaksi(Transaksi transaksi)
            {
                using (MySqlConnection connection = _connection)
                {
                    string query = "INSERT INTO transaksi (id_trx, tgl_trx, id_layanan, id_user, id_userr, tgl_janjian, total_hrg) VALUES (@Id_trx, @Tgl_trx, @Id_layanan, @Id_user, @Id_userr, @Tgl_janjian, @Total_hrg)";
                    using (MySqlCommand command = new MySqlCommand(query, connection))
                    {
                        command.Parameters.AddWithValue("@Id_trx", transaksi.id_trx);
                        command.Parameters.AddWithValue("@Tgl_trx", transaksi.tgl_trx);
                        command.Parameters.AddWithValue("@Id_layanan", transaksi.id_layanan);
                        command.Parameters.AddWithValue("@Id_user", transaksi.id_user);
                        command.Parameters.AddWithValue("@Id_userr", transaksi.id_userr);
                        command.Parameters.AddWithValue("@Tgl_janjian", transaksi.tgl_janjian);
                        command.Parameters.AddWithValue("@Total_hrg", transaksi.total_hrg);

                        connection.Open();
                        return command.ExecuteNonQuery();
                    }
                }
            }

        // Update Warteg
        public int UpdateTransaksi(int id_trx, Transaksi transaksi)
        {
            using (MySqlConnection connection = _connection)
            {
                string query = "UPDATE transaksi SET tgl_trx = @Trgl_trx, id_layanan = @Id_layanan, id_user = @Id_user, id_userr = @Id_userr, tgl_janjian = @Tgl_janjian, total_hrg = @Total_hrg WHERE id_trx = @Id_trx";
                using (MySqlCommand command = new MySqlCommand(query, connection))
                {
                    
                    
                    command.Parameters.AddWithValue("@Tgl_trx", transaksi.tgl_trx);
                    command.Parameters.AddWithValue("@Id_layanan", transaksi.id_layanan);
                    command.Parameters.AddWithValue("@Id_user", transaksi.id_user);
                    command.Parameters.AddWithValue("@Id_userr", transaksi.id_userr);
                    command.Parameters.AddWithValue("@Tgl_janjian", transaksi.tgl_janjian);
                    command.Parameters.AddWithValue("@Total_hrg", transaksi.total_hrg);
                    command.Parameters.AddWithValue("@Id_trx", id_trx);

                    connection.Open();
                    return command.ExecuteNonQuery();
                }
            }
        }

        // Delete Warteg
        public int DeleteTransaksi(int id_trx)
        {
            using (MySqlConnection connection = new MySqlConnection(connectionString))
            {
                string query = "DELETE FROM transaksi WHERE id_trx = @Id_trx";
                using (MySqlCommand command = new MySqlCommand(query, connection))
                {
                    command.Parameters.AddWithValue("@Id_trx", id_trx);

                    connection.Open();
                    return command.ExecuteNonQuery();
                }
            }
        }
}