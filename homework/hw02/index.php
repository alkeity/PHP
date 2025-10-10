<?php 
    session_start();

?>
<html lang="ru">
    <head>
        <title>Simple project php</title>
        <meta charset="utf8">
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #EEE;
                margin: 0;
                padding: 20px;
                font-size: 18px
            }
            .container {
                max-width: 25em;
                margin: 0 auto;
                display: flex;
                flex-direction: column;
                gap: 0.5rem;
            }

            .container__buttons {
                display: flex;
                gap: 0.5rem;
            }

            h1 {
                font-size: 3rem;
            }

            a {
                flex: 1;
                color: #FFFFFF;
                background-color: blue;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 0.5rem;
                border-radius: 0.25rem;
                text-decoration: none;
            }


            
        </style>
    </head>
    <body>
        <?php if(isset($_SESSION['username'])) :?>
            <p>Welcome <?php echo $_SESSION['username']?></p>
            <a href="logout.php">Logout</a>
        <?php else: ?>
        <div class="container">
            <h1>Simple project php</h1>
            <div class="container__buttons">
                <a href="/login.php">Login</a>
                <a href="/register.php">Register</a>
            </div>
        </div>
        <?php endif; ?>
    </body>
</html>