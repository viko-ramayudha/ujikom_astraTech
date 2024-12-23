<style>
  .loOut {
    padding: 8px 14px;
    border-radius: 10px;
    font-weight: bold;
    font-size: 18px;
    background-color: #e0004d;
    color: #fff;
    border: none;
  }

  .loOut:hover {
    padding: 8px 13px;
    border-radius: 10px;
    font-weight: bold;
    font-size: 18px;
    background-color: transparent;
    color: #e0004d;
    border: 1px solid #e0004d;
  }
</style>
<header >
  <!-- <div class="px-3 py-2 border-bottom mb-3" style="background-color: #f0f0f0;">
    <div class="container d-flex flex-wrap justify-content-center">
      <form class="col-12 col-lg-auto mb-2 mb-lg-0 me-lg-auto" role="search">
        <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
      </form>
      <div class="text-end">
        <button type="button" class="btn btn-light text-dark me-2">Login</button>
        <button type="button" class="btn btn-primary">Sign-up</button>
      </div>
    </div>
  </div> -->
  <div class="px-2 py-2 " style="background-color: #fff;">
    <div class="container" style="margin-top: -8px; margin-bottom: -8px;">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <a href="/" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
            <img src="https://upload.wikimedia.org/wikipedia/id/3/39/Logo_Halodoc.png" alt="Polman Astra" style="weight: 80px; height: 50px; margin-top: -60px; margin-bottom: -60px"></img>
          </a>
          <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
            <li>
                <a href="/home" style="text-decoration: none; color: #e0004d; font-weight: bold; font-weight: bold; font-size: 18px;">
                    <svg style="padding-top: 80px;" width="24" height="2">
                        <use xlink:href="#home"/>
                    </svg>
                    Home
                </a>
            </li>
            <li>
                <a href="{{ route('kategori.index') }}" style="text-decoration: none; color: #e0004d; font-weight: bold; font-weight: bold; font-size: 18px; margin-left: 30px;">
                    <svg style="padding-top: 80px;" width="24" height="2">
                        <use xlink:href="#home"/>
                    </svg>
                    Kategori
                </a>
            </li>
            <!-- <li>
                <a href="{{ route('layanan.index') }}" style="text-decoration: none; color: #e0004d; font-weight: bold; font-weight: bold; font-size: 18px; margin-left: 30px;">
                    <svg style="padding-top: 80px;" width="24" height="2">
                        <use xlink:href="#home"/>
                    </svg>
                    Layanan
                </a>
            </li> -->
            <li>
                <a href="{{ route('transaksi.index') }}" style="text-decoration: none; color: #e0004d; font-weight: bold; font-weight: bold; font-size: 18px; margin-left: 30px;">
                    <svg style="padding-top: 80px;" width="24" height="2">
                        <use xlink:href="#home"/>
                    </svg>
                    Transaksi
                </a>
            </li>
            <li style="margin-left: 55px; padding-top: 19px;">
              <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <button class="loOut">Logout</button>
              </a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
            </form>
            <!-- <li>
                <a href="#" class="nav-link text-white" style="text-decoration: none; color: #000; font-weight: bold; font-size: 18px; margin-left: 40px;">
                    <svg style="padding-top: 13px;" class="bi d-block mx-auto mb-1" width="24" height="0"><use xlink:href="#speedometer2"/></svg>
                    About
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white" style="text-decoration: none; color: #000; font-weight: bold; font-size: 18px; margin-left: 20px;">
                    <svg style="padding-top: 13px;" class="bi d-block mx-auto mb-1" width="24" height="0"><use xlink:href="#speedometer2"/></svg>
                    Contact
                </a>
            </li> -->
        </ul>
      </div>
    </div>
  </div>
</header>