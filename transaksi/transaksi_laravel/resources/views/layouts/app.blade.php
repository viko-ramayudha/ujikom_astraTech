<!-- bisa dikatakan sebagai tempat kerangka tampilandari sebuah website -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halodoc - Official Website</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>
<body>
    <div id="app">
        <div class="main-wrapper">
            <!-- untuk memanggil bagian header -->
            @include('shared.header')

            <div class="main-content">
            <!-- akan memanggil bagian section content yang akan berubah
            sesuai yang akan ditampilkan -->
                @yield('content')
            </div>
            <!-- memanggil bagian footer -->
            @include('shared.footer')
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "pageLength": 5,
                "lengthMenu": [ [5, 10, 20], [5, 10, 20] ],
                "language": {
                    "search": "Cari:",
                    "lengthMenu": "Tampilkan MENU data",
                    "zeroRecords": "Tidak ada data yang ditemukan",
                    "info": "Menampilkan START sampai END dari TOTAL data",
                    "infoEmpty": "Menampilkan 0 sampai 0 dari 0 data",
                    "infoFiltered": "(disaring dari MAX total data)",
                    "paginate": {
                        "first": "Pertama",
                        "last": "Terakhir",
                        "next": "Berikutnya",
                        "previous": "Sebelumnya"
                    }
                }
            });
        });
    </script>
</body>
</html>