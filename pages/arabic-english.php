<?php
require_once("../include/db.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_GET['name']; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.6.0/css/all.min.css" integrity="sha512-ykRBEJhyZ+B/BIJcBuOyUoIxh0OfdICfHPnPfBy7eIiyJv536ojTCsgX8aqrLQ9VJZHGz4tvYyzOM0lkgmQZGw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="../index.css">
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
                        <li class="m-menu-li"><a href="index.php" class="m-menu-link"><i class="fas fa-home"></i>Arabic</a></li>
                        <li class="m-menu-li"><a href="index.php" class="m-menu-link"><i class="fas fa-home"></i>Arabic-Bangla</a></li>
                        <li class="m-menu-li"><a href="index.php" class="m-menu-link"><i class="fas fa-home"></i>Arabic-English</a></li>
                        <li class="m-menu-li"><a href="index.php" class="m-menu-link"><i class="fas fa-home"></i>About</a></li>
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
                        <li class="sidebar-item-body-list-item"><a href="index.php" class="sidebar-item-body-list-item-link">All</a></li>
                        <li class="sidebar-item-body-list-item"><a href="index.php" class="sidebar-item-body-list-item-link">Quran</a></li>
                        <li class="sidebar-item-body-list-item"><a href="index.php" class="sidebar-item-body-list-item-link">Hadith</a></li>
                        <li class="sidebar-item-body-list-item"><a href="index.php" class="sidebar-item-body-list-item-link">Hadith-Bangla</a></li>
                        <li class="sidebar-item-body-list-item"><a href="index.php" class="sidebar-item-body-list-item-link">Hadith-English</a></li>
                        <li class="sidebar-item-body-list-item"><a href="index.php" class="sidebar-item-body-list-item-link">Hadith-Arabic</a></li>
                        <li class="sidebar-item-body-list-item"><a href="index.php" class="sidebar-item-body-list-item-link">Hadith-Bangla-English</a></li>
                        <li class="sidebar-item-body-list-item"><a href="index.php" class="sidebar-item-body-list-item-link">Hadith-Bangla-Arabic</a></li>
                        <li class="sidebar-item-body-list-item"><a href="index.php" class="sidebar-item-body-list-item-link">Hadith-English-Arabic</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="main-content">
            <!-- Main Content -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="text-center"><?php echo $_GET['name']; ?></h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Verse No.</th>
                                    <th>Arabic</th>
                                    <th>Bangla Translation</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                // $query = "SELECT * FROM `quranar` where SuraIDAr = '{$_GET['no']}'";
                                // echo $_GET['no'];
                                // echo $_GET['ty'];


                                $query = "SELECT bn_bengali.text, bn_bengali.aya, quranar.AyahTextAr FROM bn_bengali LEFT JOIN quranar ON quranar.VerseIDAr = bn_bengali.aya WHERE sura='{$_GET['no']}' LIMIT 300";
                                // $query = "SELECT bn_bengali.text, bn_bengali.aya, quranar.AyahTextAr FROM bn_bengali LEFT JOIN quranar ON quranar.VerseIDAr = bn_bengali.aya  WHERE sura=1 LIMIT 7";
                                $result = mysqli_query($connection, $query);
                                if (!$result) {
                                    die("Query Failed.");
                                } else {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        if ($row['aya'] < $_GET['ty']) {
                                            echo "<tr>";
                                            echo "<td>{$row['aya']}</td>";
                                            echo "<td>{$row['AyahTextAr']}</td>";
                                            echo "<td>{$row['text']}</td>";
                                            echo "</tr>";
                                        } else {
                                            echo "<tr>";
                                            echo "<td>{$row['aya']}</td>";
                                            echo "<td>{$row['AyahTextAr']}</td>";
                                            echo "<td>{$row['text']}</td>";
                                            echo "</tr>";
                                            break;
                                        }
                                        // echo implode(" ",$row);

                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- End Main Content -->
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>

</html>


<!-- 



 -->