<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title;?></title>
    <link rel="stylesheet" href="public/style/style.css">
    <link rel="stylesheet" href="public/style/properties.css">
    <link rel="stylesheet" href="public/style/searchResults.css">
    <link rel="stylesheet" href="public/style/profile.css">
    <link rel="stylesheet" href="public/style/signUp.css">
    <link rel="stylesheet" href="public/style/modal.css">
    <link rel="stylesheet" href="public/style/indexView.css">
    <link rel="stylesheet" href="public/style/createProfile.css">
    <link rel="stylesheet" href="public/style/modifyProfile.css">
    <link rel="stylesheet" href="public/style/header.css">
    <link rel="stylesheet" href="public/style/footer.css">
    <link rel="stylesheet" href="public/style/postProperty.css">
</head>
<body class="flexColumn">
    <?php require "header.php"; ?>
    <?=$content;?>
    <?php require "footer.php"; ?>
</body>
</html> 