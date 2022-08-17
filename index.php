<?php
require_once("include/DB.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Al Quran</title>
    <link rel="icon" type="image/svg" href="block.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.6.0/css/all.min.css" integrity="sha512-ykRBEJhyZ+B/BIJcBuOyUoIxh0OfdICfHPnPfBy7eIiyJv536ojTCsgX8aqrLQ9VJZHGz4tvYyzOM0lkgmQZGw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <div class="m-container">
        <div class="m-nav">
            <div class="m-nav-logo">
                <h1 class="logo">Al Quran</h1>
            </div>
            <div class="m-nav-item">
                <div class="m-left">
                    <i class="fas fa-bars"></i>
                </div>
                <div class="m-right">
                    <ul class="m-menu">
                        <li class="m-menu-li"><a href="index.php" class="m-menu-link"><i class="fas fa-home"></i>Home</a></li>
                        <li class="m-menu-li"><a href="./index/arabic.php" class="m-menu-link"><i class="fas fa-equals"></i>Arabic</a></li>
                        <li class="m-menu-li"><a href="./index/arabic-bengali.php" class="m-menu-link"><i class="fas fa-equals"></i>Arabic-Bangla</a></li>
                        <li class="m-menu-li"><a href="./index/arabic-english.php" class="m-menu-link"><i class="fas fa-equals"></i>Arabic-English</a></li>
                        <li class="m-menu-li"><a href="./pages/about.php" class="m-menu-link"><i class="fas fa-info-circle"></i>About</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="sidebar">
            <div class="sidebar-item">
                <div class="sidebar-item-header">
                    <h3 class="sidebar-item-header-title">Main Menu</h3>
                </div>
                <div class="sidebar-item-body">
                    <ul class="sidebar-item-body-list">
                        <li class="sidebar-item-body-list-item"><a href="#" class="sidebar-item-body-list-item-link">All</a></li>
                        <li class="sidebar-item-body-list-item"><a href="#" class="sidebar-item-body-list-item-link">Quran</a></li>
                        <li class="sidebar-item-body-list-item"><a href="#" class="sidebar-item-body-list-item-link">Hadith</a></li>
                        <li class="sidebar-item-body-list-item"><a href="#" class="sidebar-item-body-list-item-link">Hadith-Bangla</a></li>
                        <li class="sidebar-item-body-list-item"><a href="#" class="sidebar-item-body-list-item-link">Hadith-English</a></li>
                        <li class="sidebar-item-body-list-item"><a href="#" class="sidebar-item-body-list-item-link">Hadith-Arabic</a></li>
                        <li class="sidebar-item-body-list-item"><a href="#" class="sidebar-item-body-list-item-link">Hadith-Bangla-English</a></li>
                        <li class="sidebar-item-body-list-item"><a href="#" class="sidebar-item-body-list-item-link">Hadith-Bangla-Arabic</a></li>
                        <li class="sidebar-item-body-list-item"><a href="#" class="sidebar-item-body-list-item-link">Hadith-English-Arabic</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="main-content">
            <!-- Main Content -->
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
                    } else {
                        while ($row = mysqli_fetch_assoc($result)) {

                            echo "<tr>";
                            echo "<td>{$row['sura_no']}</td>";
                            echo "<td>{$row['sura_name']}</td>";
                            echo "<td>{$row['meaning']}</td>";
                            echo "<td>{$row['eng_name']}</td>";
                            echo "<td>{$row['total_ayat']}</td>";
                            echo "<td>{$row['total_ruku']}</td>";
                            echo "<td><a href=\"pages\arabic-bengali.php?no={$row['sura_no']}&name={$row['sura_name']}&ty={$row['total_ayat']}\">Read</a></td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
            <!-- End Main Content -->
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>

</html>
