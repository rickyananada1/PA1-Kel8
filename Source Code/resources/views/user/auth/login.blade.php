<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
            padding: 50px;
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
        <form method="POST" action="{{ route('customLogin') }}" id="login-form">
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
                <label for="email">Email<i class="zmdi zmdi-account material-icons-name"></i></label>
                <input type="text" name="email" id="email" placeholder="Your email" required>
            </div>

            <div class="form-group">
                <label for="your_pass">Password<i class="zmdi zmdi-lock"></i></label>

                <input type="password" name="password" id="password" placeholder="Password" required>
            </div>

            <div class="form-group form-button">
                <input type="submit" name="signin" id="signin" class="form-submit" value="Login" />
            </div>
            <div class="d-flex justify-content-center">
                <p>
                    Belum memiliki akun?
                    <strong role="button" tabindex="0"> <a href="{{ route('user.register') }}">Register</a></strong>
                </p>
            </div>

        </form>
    </div>
</body>

</html>