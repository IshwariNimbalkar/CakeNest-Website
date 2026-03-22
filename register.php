<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>

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
        <h3 class="text-center">🍰 User Registration</h3>

        <!-- Alert Message -->
        <div id="msg"></div>

        <form id="registerForm">
            <input type="text" name="username" class="form-control mb-3" placeholder="Username" required><br><br>

            <input type="email" name="email" class="form-control mb-3" placeholder="Email" required><br><br>

            <input type="password" name="password" class="form-control mb-4" placeholder="Password" required><br><br>

            <button type="submit" class="btn btn-primary w-100"><br>
                Create Account
            </button>
        </form>

        <p class="text-center mt-4">
            Already have an account? <a href="login.php">Login</a>
        </p>
    </div>
</div>

<script>
$("#registerForm").submit(function(e){
    e.preventDefault();

    $.ajax({
        url: "register_action.php",
        type: "POST",
        data: $("#registerForm").serialize(),
        success: function(response){

            if(response === "success"){
                $("#msg").html(
                    "<div class='alert alert-success'>Registration successful! Redirecting to login...</div>"
                );

                setTimeout(function(){
                    window.location.href = "login.php";
                }, 2000);

                $("#registerForm")[0].reset();

            } else {
                $("#msg").html(
                    "<div class='alert alert-danger'>" + response + "</div>"
                );
            }
        }
    });
});
</script>

</body>
</html>
