<!DOCTYPE html>
<html lang="en">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset="utf8_vietnamese_ci" />

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Selling Website</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
            $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');
                $('#products .item').addClass('grid-group-item');
            });
        });
    </script>
    <style>
        <?php include 'views/assets/stylesheets/style.css' ?>
    </style>
</head>
<body>
    <?php include 'header.php' ?>
    <?php require_once('routes.php'); ?>
    <?php include 'footer.php' ?>
</body>
</html>