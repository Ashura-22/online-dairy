<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php 
echo '<button type="submit" class="btn btn-danger d-print-none" name="delete" value="Delete" onclick="return checkdelete()">
<i class="far fa-trash-alt"></i>&nbsp;Cancel
</button>';
?>
    <script>
    function checkdelete() {
        return window.confirm('Are you want to cancel this order ?');
    }
    </script>
</body>

</html>