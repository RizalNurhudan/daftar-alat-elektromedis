<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Data Alat Login</title>
</head>
<style>
    *{
    .container-logout {
        width: 500px;
        min-height: 200px;
        background: #FFF;
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(0, 0, 0, .3);
        padding: 40px 30px;
    }
    .input-group {
        width: 100%;
        margin-bottom: 25px;
    }

    .input-group input {
        width: 100%;
        height: 50px;
        border: 2px solid #e7e7e7;
        padding: 15px 20px;
        font-size: 1rem;
        border-radius: 30px;
        background: transparent;
        outline: none;
        transition: .3s;
    }

    .input-group input:focus, .input-group input:valid {
        border-color: orangered;
    }

    .input-group .btn {
        display: block;
        width: 100%;
        padding: 15px 20px;
        text-align: center;
        border: none;
        background: orangered;
        outline: none;
        border-radius: 30px;
        font-size: 1.2rem;
        color: #FFF;
        cursor: pointer;
        transition: .3s;
    }

    .input-group .btn:hover {
        transform: translateY(-5px);
        background: orange;
    }

    .login-register-text, .login-register-text a {
        color: #111;
        font-weight: 600;
        text-decoration: none;
    }

    .login-register-text a {
        color: orange;
    }

    @media (max-width: 430px) {
        .container {
            width: 300px;
        }
    }
    }
</style>
<body>
<div class="container">
    <form action="" method="POST" class="login-email">
        <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
        <div class="input-group">
            <input type="email" placeholder="Email" name="email" required>
        </div>
        <div class="input-group">
            <input type="password" placeholder="Password" name="password" required>
        </div>
        <div class="input-group">
            <button name="submit" class="btn">Login</button>
        </div>
        <p class="login-register-text">Anda belum punya akun? <a href="register.php">Register</a></p>
    </form>
</div>
</body>
</html>
