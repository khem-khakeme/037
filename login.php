<!doctype html>
<html lang="th">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>เข้าสู่ระบบ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        body,
        html {
            height: 100%;
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: url('https://i.pinimg.com/1200x/9d/1f/2e/9d1f2e441590c09d737125a61b5f5281.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-box {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            width: 550px;
            max-width: 90%;
            color: #fff;
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
        }

        .login-box h3 {
            text-align: center;
            font-weight: bold;
            margin-bottom: 30px;
            color: #fff;
        }

        .form-control {
            background: transparent;
            border: none;
            border-bottom: 1px solid #fff;
            border-radius: 0;
            color: #fff;
        }

        .form-control:focus {
            background: transparent;
            color: #fff;
            box-shadow: none;
            border-bottom: 1px solid #007bff;
        }

        label,
        .form-check-label {
            color: #fff;
        }

        .btn-login {
            background: linear-gradient(to bottom, #4d94ff, #3d34baff);
            color: white;
            border: none;
            border-radius: 30px;
            padding: 10px;
            font-weight: bold;
            transition: 0.3s ease;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.2);
        }

        .btn-login:hover {
            background: linear-gradient(to bottom, #3a7bd5, #3d34baff);

            .extra-links {
                text-align: center;
                margin-top: 20px;
                font-size: 0.9em;
            }

            .extra-links a {
                color: #aad4ff;
                text-decoration: underline;
            }

            .extra-links a:hover {
                color: #007bff;
            }
    </style>
</head>

<body>
    <div class="login-box">
        <h3>LOGIN</h3>
        <form action="check_login.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Email</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-login">Login</button>
            </div>
        </form>
    </div>
</body>

</html>