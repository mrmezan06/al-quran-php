<?php
require_once("Include/DB.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Al Quran</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
    <!-- <?php
        $query = "SELECT * FROM `sura`";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("Query Failed.");
        }else{
            while ($row = mysqli_fetch_assoc($result)) {
                echo $row['sura_name'] . "<br>";
            }
        }
        ?> -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">Al Quran</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Sura Number</th>
                                <th>Sura Name</th>
                                <th>Sura Translation</th>
                                <th>English Name</th>
                                <th>Total Ayat</th>
                                <th>Total Ruku</th>
                                <th>Read</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query = "SELECT * FROM `sura` order by sura_no";
                                $result = mysqli_query($connection, $query);
                                if (!$result) {
                                    die("Query Failed.");
                                }else{
                                    while ($row = mysqli_fetch_assoc($result)) {

                                        echo "<tr>";
                                        echo "<td>{$row['sura_no']}</td>";
                                        echo "<td>{$row['sura_name']}</td>";
                                        echo "<td>{$row['meaning']}</td>";
                                        echo "<td>{$row['eng_name']}</td>";
                                        echo "<td>{$row['total_ayat']}</td>";
                                        echo "<td>{$row['total_ruku']}</td>";
                                        echo "<td><a href=\"pages\single.php?no={$row['sura_no']}&name={$row['sura_name']}&ty={$row['total_ayat']}\">Read</a></td>";
                                        echo "</tr>";
                                    }
                                }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>