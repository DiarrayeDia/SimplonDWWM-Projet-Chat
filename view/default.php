<!-- Template de vue-->
<!-- Afficher le formulaire pour poster un message (pseudo, messages).-->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/5/darkly/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title>Live Chat Amazin</title>
</head>

<body>
    <div class="container">
        <h1>Live chat Amazin</h1>

        <?php
        require  "chat.php";
        require "form.php";
        ?>

    </div>

</body>

</html>