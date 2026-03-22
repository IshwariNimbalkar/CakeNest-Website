<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        body {
            background: linear-gradient(135deg, #fff1f8, #fde2ef);
            font-family: 'Segoe UI', sans-serif;
        }

        .auth-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .auth-card {
            background: #ffffff;
            padding: 35px 30px;
            border-radius: 16px;
            width: 360px;
            box-shadow: 0 15px 35px rgba(227, 137, 182, 0.3);
            animation: fadeIn 0.6s ease-in-out;
            text-align: center;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(15px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .auth-card h3 {
            color: #e0569d;
            font-weight: 600;
            margin-bottom: 25px;
        }

        .form-control {
            border-radius: 10px;
            padding: 12px;
            border: 1px solid #f3c2d9;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #e0569d;
        }

        .btn-primary {
            background: linear-gradient(135deg, #e0569d, #ff7eb3);
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #d94b8c, #ff5f9e);
            transform: translateY(-1px);
        }

        .auth-card p {
            font-size: 14px;
            margin-top: 20px;
        }

        .auth-card a {
            color: #e0569d;
            font-weight: 500;
            text-decoration: none;
        }

        .auth-card a:hover {
            text-decoration: underline;
        }

        #msg .alert {
            border-radius: 10px;
            font-size: 14px;
        }
    </style>
</head>

<body>

<div class="auth-wrapper">
    <div class="auth-card">
        <h3>🍰 User Login</h3>

        <form method="POST" id="loginForm">
            <input type="email" name="email" class="form-control mb-3" placeholder="Email" required><br><br>

            <input type="password" name="password" class="form-control mb-4" placeholder="Password" required><br><br>

            <button type="submit" class="btn btn-primary w-100" name="login"><br>
                Login
            </button>
        </form>

        <div id="msg" class="mt-3"></div>

        <p class="text-center">
            Don’t have an account?
            <a href="register.php">Register</a>
        </p>
    </div>
</div>

<script>
$(document).ready(function(){
    $("#loginForm").submit(function(e){
        e.preventDefault(); 

        $.ajax({
            url: "login_action.php",
            type: "POST",
            data: $(this).serialize(),
            success: function(response){
                if(response.startsWith("success")){
                    alert(response.split(":")[1]);
                    window.location.href = "index.php";
                } else {
                    $("#msg").html(
                        "<div class='alert alert-danger'>" +
                        response.split(":")[1] +
                        "</div>"
                    );
                }
            },
            error: function(){
                $("#msg").html(
                    "<div class='alert alert-danger'>Server Error</div>"
                );
            }
        });
    });
});
</script>

</body>
</html>
