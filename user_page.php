<?php
include ('connect.php');
// $query = " select * from data_penyewa ";
// $result = mysqli_query($koneksi,$query);

$nama           = "";
$alamat         = "";
$no_hp          = "";
$mobil          = "";
$jangka_waktu   = "";
$jaminan        = "";
$sukses         = "";
$error          = "";

if(isset($_POST['submit'])) {
    $nama           = $_POST['nama'];
    $alamat         = $_POST['alamat'];
    $no_hp          = $_POST['no_hp'];
    $mobil          = $_POST['mobil'];
    $jangka_waktu   = $_POST['jangka_waktu'];
    $jaminan        = $_POST['jaminan'];

    if($nama && $alamat && $no_hp && $mobil && $jangka_waktu && $jaminan) {
            $sql1   = "insert into data_penyewa (nama, alamat, no_hp,mobil, jangka_waktu, jaminan) values ('$nama', '$alamat', '$no_hp', '$mobil', '$jangka_waktu', '$jaminan')";
            $q1     = mysqli_query($koneksi,$sql1);

            if($q1 >= 1) {
                $sukses     = "Berhasil memasukkan data!";
            } else {
                $error      = "Gagal memasukkan data!";
            }
        } else {
            $error    = "Masukkan semua data dengan benar!";
        }   
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&family=Silkscreen&display=swap');

        h1 {
            font-family: 'Silkscreen', cursive;
        }
        .card-header {
            font-family: 'Comfortaa', cursive;
        }
    </style>
    <title>Rental Mobil</title>
</head>
<body>
    <div class="judul bg-info text-center">
        <h1>RENTAL MOBIL</h1>
        <a href="loginform.php"><img src="icon/box-arrow-left.svg" style="width: 2rem;" alt=""></a>
    </div>
    

    <div class="mx-auto">
        <div class="card">
            <div class="card-header">
                Pendaftaran Rental Mobil
            </div>
            <div class="card-body">
                <?php
                    if($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="margin-left: 30rem;"></button>
                        <?php header("refresh:5;url=user_page.php"); ?>
                    </div>
                <?php
                    }
                ?>
                <?php
                    if($error) {
                ?>
                    <div class="alert alert-warning" role="alert">
                        <?php echo $error ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="margin-left: 40rem;"></button>
                        
                    </div>
                <?php
                    }
                ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="nama" id="nama" value="<?php echo $nama ?>">
                        </div>   
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="alamat" id="alamat" value="<?php echo $alamat ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="no_hp" class="col-sm-2 col-form-label">No. Hp</label>
                        <div class="col-sm-10">   
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="no_hp" id="no_hp" value="<?php echo $no_hp ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="mobil" class="col-sm-2 col-form-label">Mobil</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="mobil" name="mobil">
                                <option value=""> * Pilih Mobil Yang Akan Anda Sewa * </option>
                                <option value="Avanza" <?php if($mobil == "Avanza") echo "Terpilih" ?>>Avanza</option>
                                <option value="Honda Jazz" <?php if($mobil == "Honda Jazz") echo "Terpilih" ?>>Honda Jazz</option>
                                <option value="Mazda" <?php if($jaminan == "Mazda") echo "Terpilih" ?>>Mazda</option>
                                <option value="Alphard" <?php if($jaminan == "Alphard") echo "Terpilih" ?>>Alphard</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jangka_waktu" class="col-sm-2 col-form-label">Jangka Waktu (hari)</label>
                        <div class="col-sm-10">   
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="jangka_waktu" id="jangka_waktu" value="<?php echo $jangka_waktu ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jaminan" class="col-sm-2 col-form-label">Jaminan</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="jaminan" name="jaminan">
                                <option value=""> * Pilih Jaminan Yang Akan Anda Berikan * </option>
                                <option value="KTP" <?php if($jaminan == "KTP") echo "Terpilih" ?>>KTP</option>
                                <option value="Sertifikat" <?php if($jaminan == "Sertifikat") echo "Terpilih" ?>>Sertifikat</option>
                                <option value="Sepeda Motor" <?php if($jaminan == "Sepeda Motor") echo "Terpilih" ?>>Sepeda Motor</option>
                                <option value="Perhiasan" <?php if($jaminan == "Perhiasan") echo "Terpilih" ?>>Perhiasan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" value="Submit" class="btn btn-success" name="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>