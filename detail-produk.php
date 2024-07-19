<?php
    error_reporting(0);
    include 'db.php';

    $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '".$_GET['id']."' ");
    $p = mysqli_fetch_object($produk);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D'Racing | Detail</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
</head>
<body>
    <!--Header-->
    <header>
        <div class="container">
            <h1><a href="index.php">Dayat Racing</a></h1>
            <ul>
                <li><a href="produk.php">Produk</a></li>
            </ul>
        </div>
    </header>

    <!--search-->
    <div class="search">
        <div class="container">
            <form action="produk.php">
                <input type="text" name="search" placeholder="Cari Produk">
                <input type="hidden" name="kat" value="<?php echo $_GET['kat']?>">
                <input type="submit" name="cari" value="Cari Produk">
            </form>
        </div>
    </div>

    <!-- detail produk-->
     <div class="section">
        <div class="container">
            <h3>Detail Produk</h3>
            <div class="box">
                <div class="col-2">
                    <img src="produk/<?php echo $p->product_image ?>" width="100%" alt="">
                </div>
                <div class="col-2">
                    <h3><?php echo $p->product_name ?></h3>
                    <h4>Rp. <?php echo number_format($p->product_price) ?></h4>
                    <p>Deskripsi :<br>
                        <?php echo $p->product_description ?>
                    </p>
                    <p><a href="https://api.whatsapp.com/send?phone=6281287914200&text=Hai, saya tertarik dengan produk ini." target="_blank">Hubungi Via Whatsapp Admin <img src="img/wa.png" width="50px" alt=""></a></p>
                </div>
            </div>
        </div>
     </div>

    <!--Footer-->
    <div class="footer">
        <div class="container">
            <h4>Alamat</h4>
            <p>Tebet Timur Dalam, Jakarta Selatan</p>
            <h4>Email</h4>
            <p>dayatrace@dracing.com</p>
            <h4>No. Telp</h4>
            <p>081234567890</p>
            <small>Copyright &copy; Kelompok Pemrog</small>
        </div>
    </div>
</body>
</html>