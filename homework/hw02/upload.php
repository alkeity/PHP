<?php
    session_start();

    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit;
    }

    if($_SERVER['REQUEST_METHOD'] === "POST") {
        $targetDir = __DIR__ . "/";
        $fileType = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
        $fileName = uniqid() . '.' . $fileType;
        $targetFile = $targetDir . $fileName;

        print_r($fileType);

        if (in_array($fileType, ['jpeg', 'jpg', 'png', 'gif'])) {
            if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
                file_put_contents('user-images.txt', $_SESSION['username'] . ":" . $fileName . "\n", FILE_APPEND);
                $message = "Файл успешно загружен";
            } else {
                $error = "Ошибка при загрузке файла";
            }
        } else {
            $error = "Разрешены файлы только JPG, JPEG, PNG, GIF";
        }
    }
?>

<html>
    <head></head>
    <body>
        <div class="container">
            <?php if(isset($error)):?>
                <p><?php echo($error);?></p>
            <?php endif;?>
            <?php if(isset($message)):?>
                <p><?php echo($message);?></p>
            <?php endif;?>
            <form method="POST">
                <label for="file">Select photo</label>
                <input type="file" id="file" name="file" required>
                <button type="submit">Upload</button>
            </form>
        </div>
    </body>
</html>