<?php
include "session.php";
include "koneksi.php";
include "header.php";
?>

<?php 
    if(isset($_POST['bsimpan'])){
        $tgl = date('Y-m-d');

        $nama = htmlspecialchars($_POST['nama'], ENT_QUOTES); 
        $alamat = htmlspecialchars($_POST['alamat'], ENT_QUOTES); 
        $tujuan = htmlspecialchars($_POST['tujuan'], ENT_QUOTES); 
        $nope = htmlspecialchars($_POST['nope'], ENT_QUOTES);
        
        $simpan = mysqli_query($koneksi, "INSERT INTO ttamu VALUES ('', '$tgl', '$nama', '$alamat', '$tujuan', '$nope')");

        if ($simpan) {
            echo "<script>alert('Simpan Data Berhasil, Terima Kasih');document.location='?'</script>";
        } else {
            echo "<script>alert('Simpan Data Gagal');document.location='?'</script>";
        }
    }
?>


      <br>
      <a href="logout.php" class="pl-3 btn btn-danger ml-5 text-center"> <b> Logout </b></a>
<div class="head text-center">      
    
    <h1 class="text-white">
    Halo, Selamat Datang <b><?php echo $_SESSION['username']; ?></b> <br>
     
    </h1>
</div>
<div class="row mt-5">
    <div class="col-lg-7 pl-5 pr-5">
        <div class="card shadow bg-light pl-3">
            <div class="card-body">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Identitas Tamu</h1>
                </div>
                <form class="user" method="POST" action="">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" name="nama" placeholder="Nama Tamu" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" name="alamat" placeholder="Alamat Tamu" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" name="tujuan" placeholder="Tujuan Tamu" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" name="nope" placeholder="No.hp Tamu" required>
                    </div>
                    <button type="submit" name="bsimpan" class="btn btn-primary btn-user btn-block">Simpan Data Tamu</button>
                </form>
                <hr>
                <div class="text-center">
                    <a href="#" class="small">By. Azmi Arief | 2021 - <?= date('Y') ?></a>
                </div>
            </div>
        </div>
    </div>
    
</div>

                <div class="card shadow mb-2 mt-5 ml-3 mr-3">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Tamu hari ini [<?=date('d-m-y')?>]</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Tanggal</th>
                                            <th>Nama Tamu</th>
                                            <th>Alamat</th>
                                            <th>Tujuan</th>
                                            <th>No. HP</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>Tanggal</th>
                                            <th>Nama Tamu</th>
                                            <th>Alamat</th>
                                            <th>Tujuan</th>
                                            <th>No. HP</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            $tgl = date('Y-m-d');
                                            $tampil = mysqli_query($koneksi, "SELECT * FROM ttamu where tanggal like '%$tgl%' order by id desc");
                                            $no =1;
                                            while($data =mysqli_fetch_array($tampil)){
                                        ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $data['tanggal'] ?></td>
                                            <td><?= $data['nama'] ?></td>
                                            <td><?= $data['alamat'] ?></td>
                                            <td><?= $data['tujuan'] ?></td>
                                            <td><?= $data['nope'] ?></td>
                                        </tr>
                                        <?php } ?>
                             </tbody>
                         </table>
                     </div>
                </div>
            </div>    
<?php include "footer.php"; ?>
    