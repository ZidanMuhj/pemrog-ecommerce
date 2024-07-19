<?php
    error_reporting(0);
    include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D'Racing | Produk</title>
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
                <li><a href="login.php">Login Admin</a></li>
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

    <!--produk baru-->
    <div class="section">
        <div class="container">
            <h3>Produk</h3>
            <div class="box">
                <?php
                    if($_GET['search'] !='' || $_GET['kat'] != '' ){
                        $where = "AND product_name LIKE '%".$_GET['search']."%' AND category_id LIKE '%".$_GET['kat']."%' ";
                    }
                    $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 $where ORDER BY product_id DESC");
                    if(mysqli_num_rows($produk) > 0){
                        while($p = mysqli_fetch_array($produk)){
                ?>
                <a href="detail-produk.php?id=<?php echo $p['product_id'] ?>">
                <div class="col-4">
                    <img src="produk/<?php echo $p['product_image'] ?>" alt="">
                    <p class="nama"><?php echo substr($p['product_name'], 0, 30) ?></p>
                    <p class="harga">Rp <?php echo number_format($p['product_price'])?></p>
                </div>
                </a>
                <?php }}else{ ?>
                    <p>Produk Tidak Ada</p>
                <?php } ?>
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