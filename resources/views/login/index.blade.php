<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Puskesmas Banjarwangi | {{ $title }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link href="{{ asset('dashboard/img/favicon-puskesmas.png') }}" rel="icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome (if still needed for other parts of your site, though not for this specific login form) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <!-- Bootstrap Icons (if still needed for other parts of your site) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Your existing Bootstrap CSS (if needed for alerts or other global styles) -->
    <link href="{{ asset('dashboard/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Your existing main style.css -->
    <link href="{{ asset('dashboard/css/style.css') }}" rel="stylesheet">

    <style>
        /* CSS dari Uiverse.io (vinodjangid07), diadaptasi untuk Laravel */
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #e7e6e7 0%, #2575fc 100%); /* Gradien latar belakang */
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 20px;
            box-sizing: border-box;
        }

        .form_main {
            width: 300px; /* Sesuaikan lebar form */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: rgb(255, 255, 255);
            padding: 30px;
            box-shadow: 0px 0px 40px rgba(0, 0, 0, 0.062);
            position: relative;
            overflow: hidden;
            border-radius: 8px; /* Tambahkan border-radius untuk form */
        }

        .form_main::before {
            position: absolute;
            content: "";
            width: 300px;
            height: 300px;
            background-color: rgb(209, 193, 255);
            transform: rotate(45deg);
            left: -180px;
            bottom: 30px;
            z-index: 1;
            border-radius: 30px;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.082);
        }

        .heading {
            font-size: 2em;
            color: #2e2e2e;
            font-weight: 700;
            margin: 5px 0 10px 0;
            z-index: 2;
            text-align: center; /* Pastikan heading di tengah */
        }

        .inputContainer {
            width: 100%;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 2;
        }

        .inputIcon {
            position: absolute;
            left: 3px;
        }

        .inputField {
            width: 100%;
            height: 30px;
            background-color: transparent;
            border: none;
            border-bottom: 2px solid rgb(173, 173, 173);
            margin: 10px 0;
            color: black;
            font-size: .8em;
            font-weight: 500;
            box-sizing: border-box;
            padding-left: 30px;
        }

        .inputField:focus {
            outline: none;
            border-bottom: 2px solid rgb(199, 114, 255);
        }

        .inputField::placeholder {
            color: rgb(80, 80, 80);
            font-size: 1em;
            font-weight: 500;
        }

        #button {
            z-index: 2;
            position: relative;
            width: 100%;
            border: none;
            background-color: rgb(65, 77, 243);
            height: 30px;
            color: white;
            font-size: .8em;
            font-weight: 500;
            letter-spacing: 1px;
            margin: 10px;
            cursor: pointer;
            border-radius: 5px; /* Tambahkan border-radius untuk tombol */
        }

        #button:hover {
            background-color: rgb(125, 147, 245);
        }

        .forgotLink {
            z-index: 2;
            font-size: .7em;
            font-weight: 500;
            color: rgb(44, 24, 128);
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 20px;
        }

        /* Penyesuaian untuk alert Laravel */
        .alert {
            width: 100%;
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 5px;
            font-size: 0.9em;
            box-sizing: border-box;
        }
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .alert .btn-close {
            float: right;
            font-size: 1em;
            line-height: 1;
            background: none;
            border: none;
            color: inherit;
            opacity: 0.7;
        }
        .alert .btn-close:hover {
            opacity: 1;
        }
    </style>
</head>

<body>
    <form action="{{ route('login') }}" method="POST" class="form_main">
        @csrf
        <p class="heading">Login Admin</p>

        <!-- Laravel Session Alerts -->
        @if (session('alert'))
            <div class="alert alert-danger" role="alert">
                {{ session('alert') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session()->has('loginError'))
            <div class="alert alert-danger" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="inputContainer">
            <svg class="inputIcon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#2e2e2e" viewBox="0 0 16 16">
                <path d="M13.106 7.222c0-2.967-2.249-5.032-5.482-5.032-3.35 0-5.646 2.318-5.646 5.702 0 3.493 2.235 5.708 5.762 5.708.862 0 1.689-.123 2.304-.335v-.862c-.43.199-1.354.328-2.29.328-2.926 0-4.813-1.88-4.813-4.798 0-2.844 1.921-4.881 4.594-4.881 2.735 0 4.608 1.688 4.608 4.156 0 1.682-.554 2.769-1.416 2.769-.492 0-.772-.28-.772-.76V5.206H8.923v.834h-.11c-.266-.595-.881-.964-1.6-.964-1.4 0-2.378 1.162-2.378 2.823 0 1.737.957 2.906 2.379 2.906.8 0 1.415-.39 1.709-1.087h.11c.081.67.703 1.148 1.503 1.148 1.572 0 2.57-1.415 2.57-3.643zm-7.177.704c0-1.197.54-1.907 1.456-1.907.93 0 1.524.738 1.524 1.907S8.308 9.84 7.371 9.84c-.895 0-1.442-.725-1.442-1.914z"></path>
            </svg>
            <input type="email" name="email" id="email" class="inputField" placeholder="E-mail" value="{{ old('email') }}" required>
        </div>
        
        <div class="inputContainer">
            <svg class="inputIcon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#2e2e2e" viewBox="0 0 16 16">
                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"></path>
            </svg>
            <input type="password" name="password" id="password" class="inputField" placeholder="Password" required>
        </div>
        
        <button id="button" type="submit">Submit</button>
    </form>
</body>

</html>