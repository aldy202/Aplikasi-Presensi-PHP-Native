<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="assets/img/logo.png">

    <!-- Boostrap Css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

    <!-- CSS -->
    <link rel="stylesheet" href="./assets/css/login-css.css">

    <!-- font awosome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <title>Damansi | LOGIN</title>
</head>

<body>
    <div class="formContainer">

        <!-- Form Login terbaru start -->
        <div class="center">
            <img src="./assets/img/logo.png" alt="">
            <h1>Damansi</h1>
            <form method="POST" action="login_action.php">
                <div class="txt_field">
                    <input type="text" required name="nama" id="inputField" onkeyup="checkInput()" autocomplete="off" autofocus>
                    <span id="errorMsg"></span>

                    <label>Username</label>
                </div>

                <div class="txt_field">
                    <input type="password" required name="password" id="password">
                    <i class="bi bi-eye-slash" id="togglePassword"></i>
                    <span></span>
                    <label>Password</label>
                </div>
                <input type="submit" value="Login" name="login">
            </form>
        </div>
        <!-- Form Login terbaru start -->
    </div>

    <!-- JS -->
    <script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function() {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);

            // toggle the icon
            this.classList.toggle("bi-eye");
        });
    </script>

    <script>
        function checkInput() {
            var input = document.getElementById("inputField").value;
            if (/\s/.test(input)) { // memeriksa jika input mengandung spasi
                document.getElementById("errorMsg").innerHTML = "Input tidak boleh mengandung spasi!";

            } else {
                document.getElementById("errorMsg").innerHTML = "";
            }
        }
    </script>
</body>

</html>