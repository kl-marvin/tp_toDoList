<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title><?= $pageTitle ?></title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class=" mt-3 offset-2 col-10">
            <?php require $content ?>
            </div>
        </div>
    </div>
</body>
</html>