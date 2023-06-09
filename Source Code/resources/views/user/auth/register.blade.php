<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Registration Form</title>

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 600px;
            padding: 60px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            width: 150px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            width: 40px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="checkbox"] {
            display: inline-block;
            margin-right: 10px;
            vertical-align: middle;
        }

        .form-button {
            text-align: center;
        }

        .form-submit {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>

</head>

<body>
    <div class="container border border-info">
        <div class="logo">
            <img src="{{ asset('img/lambang.png') }}" alt="Logo">
        </div>
        <form method="POST" action="{{ route('register') }}" id="register-form">
            @csrf
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" placeholder="Your Name" required />
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" placeholder="Your Email" required />
            </div>

            <div class="form-group">
                <label for="pass">Password:</label>
                <input type="password" name="password" id="password" placeholder="Password" required />
            </div>

            <div class="form-group">
                <label for="re-pass">Confirm Password:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repeat your password" required />
            </div>

            <div class="form-group form-button">
                <input type="submit" name="signup" id="signup" class="form-submit" value="Register" />
            </div>
            <div class="d-flex justify-content-center">
                <p>
                    Sudah memiliki akun?
                    <strong role="button" tabindex="0"> <a href="{{ route('userlogin') }}">Login</a></strong>
                </p>
            </div>
        </form>
    </div>
</body>

</html>