<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>

    body {
        background-image: url('https://cdn.myportfolio.com/18834e80-a9ef-4e79-8767-1817d931976f/c67ef6b0-4bff-41b7-8f92-3d51e0b45ca8_rw_1920.png?h=62cdf0e29259602f0ed29951ef0e7488'); /* Replace with your image path */
        background-size: cover; /* Ensure the background image covers the entire screen */
        background-position: center; /* Center the background image */
        background-repeat: no-repeat; /* Prevent background image from repeating */
        height: 95vh; /* Set full viewport height */
        margin: 0; /* Remove default margin */
        display: flex;
        justify-content: center; /* Center content horizontally */
        align-items: center; /* Center content vertically */
    }
        
.cont-log {
    padding: 60px 60px;
    /* margin-left: 420px; */
    
}


.card {
    margin-top: 0px;
    box-shadow: 0 15px 25px rgba(0, 0, 0, 0.3);
    transition: 0.3s;
    background-color: rgba(255, 255, 255, 0.6); /* Semi-transparent white background */
    max-width: 400px;
    height: auto;
    border-radius: 10px;
    padding: 30px;
    backdrop-filter: blur(2px);
}

h1 {
    text-align: center;
    margin-top: 8px;
    font-weight: bold;
}

.inp {
    padding: 10px 15px; /* Increase padding for better readability */
    margin-bottom: 15px; /* Add spacing between inputs */
    border: 1px solid #ccc; /* Add a thin border */
    border-radius: 15px; /* Subtle border radius */
    width: 90%; /* Make inputs full width */
    background-color: #E7F0DC; /* Light background for disabled input */
}

.butt {
    margin-top: 20px;
    padding: 10px 144px;
    background-color: #e0004d;
    cursor: pointer;
    align-self: center;
    color: #fff;
    font-weight: bold;
    border: none;
    border-radius: 15px;
    font-weight: 900;
    font-size:14px;
}

.butt:hover {
    margin-top: 20px;
    padding: 9px 143px;
    background-color: transparent;
    cursor: pointer;
    align-self: center;
    color: #e0004d;
    font-weight: bold;
    border: 1px solid #e0004d;
    border-radius: 15px;
    font-weight: 900;
    font-size:14px;
}


/* .butt-spes {
    margin-top: 20px;
    padding: 10px 179px;
    background-color: #e0004d;
    cursor: pointer;
    align-self: center;
    color: #fff;
    font-weight: bold;
    border: none;
    border-radius: 15px;
}


.card {
  background-image: url('path/to/your/image.jpg');
  background-size: cover;
  background-position: center;
}

.butt-spes {
  transition: 0.3s; 
  background-color: #e0004d;
  cursor: pointer;
  align-self: center;
  color: #fff;
  font-weight: bold;
  border: none;
  border-radius: 15px;
  padding: 15px 30px;
} */
    </style>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">  </head>
<body>
    <div class="container">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif

        <div class="cont-log">
            <div class="card">
            <h1>Login</h1>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div style="margin-bottom: 6px; margin-left: 3px; font-weight: 600">
                     <label for="username">Username :</label>
                    </div>
                    <div class="form-group">
                        
                        <input type="text" name="username" id="username" class="inp" placeholder="username" required autofocus>
                    </div>

                    <div style="margin-bottom: 6px; margin-left: 3px;">
                     <label for="password" style="font-weight: bold;">Password :</label>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" class="inp" placeholder="password" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="butt">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/login.js') }}"></script>  </body>
</html>