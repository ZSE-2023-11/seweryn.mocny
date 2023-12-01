<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Seweryn Mocny">
    <title>Zadanie 2</title>
    <style>
                    * {
                padding: 0;
                margin: 0;
                box-sizing: border-box;
                font-family: Arial, sans-serif;
            }

            html, body {
                width: 100vw;
                height: 100vh;
                background-color: #34D399;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .container {
                width: 500px;
                height: 500px;
                background-color: whitesmoke;
                border-radius: 15px;
            }

            .title-box {
                background-color: #10B981;
                color: whitesmoke;
                width: auto;
                height: 120px;
                display: flex;
                justify-content: center;
                align-items: center;
                border-radius: 15px 15px 0 0;
            }

            .input-box {
                height: 380px;
                padding: 3rem;
                display: grid;
                justify-content: center;
            }

            input {
                width: 180px;
                height: 50px;
                border: 1px solid black;
                border-radius: 15px;
                padding: 10px 15px 10px 15px;
            }

            button {
                width: 180px;
                height: 50px;
                background-color: #10B981;
                color: whitesmoke;
                font-size: 1.5rem;
                border: 1px solid black;
                cursor: pointer;
            }

            form {
                display: grid;
            }
    </style>

</head>
<body>
    <div class="container">
        <div class="title-box">
            <h1>Logowanie</h1>
        </div>
        <div class="input-box">
            <form method="post">
                <input name="username" id="username" type="text" required>
                <input name="password" id="password" type="password" required>
                <button id="button-login">Zaloguj</button>
            </form>
        </div>
    </div>

    <?php
    $conn = new mysqli("127.0.0.1","admin","test","baza");
    
    if ($conn->connect_error) {
        die("Błąd połączenia bazy: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $login = $conn->real_escape_string($_POST["login"]);
        $haslo = $conn->real_escape_string($_POST["password"]);


        $query = "SELECT * FROM users WHERE login='$login' AND password='$haslo'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $message = "Zalogowano pomyślnie!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        } 
        else 
        {
            $message = "Błąd!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }

        
        $conn->close();
    }
?>

</body>
</html>