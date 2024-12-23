<style>
    .footer {
        margin-top: 0px;
        /* background-color:  #46568e; */
        background-color: #e0004d;
    }
</style>

<footer class="footer">
    <div class="container">
        <div class="row" >
            <div class="col-md-4" style="margin-top: 40px; margin-bottom: 30px; padding-right: 90px;">
                <h4 class="footer-title text-white">Alamat</h4>
                <p class="text-white">PT Media Dokter Investama
                Jl. H.R. Rasuna Said Kav B32-33,<br>
                Jakarta Selatan<br>
                    17530</p>
            </div>
            <div class="col-md-4" style="margin-top: 40px;">
                <h4 class="footer-title text-white">Layanan Pengaduan Konsumen</h4>
                <ul class="list-unstyled">
                    <li class="text-white"><i class="fa fa-phone"></i>Email : help@halodoc.com</li>
                    <li class="text-white" style="margin-bottom: 10px;"><i class="fa fa-phone"></i>Telpon   : 021-5095-9900</li>
                    <li class="text-white"><i class="fa fa-whatsapp"></i>Dinjen PKTN, <br>
                            0853 1111 1010 (WhatsApp)</li>
                   
                </ul>
            </div>
            <div class="col-md-4" style="margin-top: 20px; ">
                <!-- <h4 class="footer-title">Website</h4> -->
                <a href="{{ route('kategori.index') }}">
                    <image src="https://lh3.googleusercontent.com/Lw0I9UbclUsrXt9lNmP-z4nBWbmZdxdreRNCdCwP3ZglUZRnKog1YIb9LZbZ1_X0CR8xDq9eRIStzSC0LTXfJg=s0" style="height: 100px; margin-bottom: 0px;" target="_blank"/>
                </a>
                <p class="text-white">&copy; {{ date('Y') }} Halodoc Official Website. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>
