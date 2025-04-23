<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "header.php"; ?>
    <title>Scan Kartu</title>

    <script type="text/javascript">
        $(document).ready(function(){
            setInterval(function(){
                $("#cekkartu").load('bacakartu.php')
            }, 3000);
        })
    </script>

</head>
<body>
    <?php include "menu.php"; ?>
    <div class="container-fluid">
        <div id="cekkartu"></div>
    </div>

    <br>

    <?php include "footer.php"; ?>
</body>
</html>