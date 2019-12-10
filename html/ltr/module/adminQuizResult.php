<?php
$idUser = $_SESSION["id_user"];
?>
<main>
<div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col">
            <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Quiz Result</h5>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th rowspan="2" class='text-center align-middle'>No</th>
                                        <th rowspan="2" class='text-center align-middle'>Nama</th>
                                        <th rowspan="2" class='text-center align-middle'>Penyusun</th>
                                        <th rowspan="2" class='text-center align-middle'>Tanggal Pengerjaan</th>
                                        <th rowspan="2" class='text-center align-middle'>Jumlah Soal</th>
                                        <th colspan="3" class='text-center'>Jumlah Jawaban</th>
                                        <th rowspan="2" class='text-center align-middle'>Nilai</th>
                                    </tr>
                                    <tr>
                                        <th class='text-center'>Benar</th>
                                        <th class='text-center'>Salah</th>
                                        <th class='text-center'>Kosong</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                    // Query command
                    $query = "
                        SELECT
                            a.nama AS 'penyusun',
                            b.id,
                            b.nama,
                            c.tanggal,
                            c.soal_benar,
                            c.soal_salah,
                            c.soal_kosong
                        FROM
                            tb_user a,
                            tb_quiz b,
                            tb_hasil_quiz c
                        WHERE
                            a.id = b.user_id AND c.quiz_id = b.id AND c.user_id = $idUser
                        ";


                    $result = mysqli_query($con, $query);

                    if (mysqli_num_rows($result) > 0){
                        $index = 1;
                        while($row = mysqli_fetch_assoc($result)){

                            $id = $row["id"];

                            $sql = "SELECT * FROM tb_soal WHERE quiz_id = $id";
                            $jml_soal = mysqli_query($con, $sql);


                            $jBenar=$row["soal_benar"];
                            $jSalah=$row["soal_salah"];
                            $jKosong=$row["soal_kosong"];

                            $nilai = $jBenar + $jSalah + $jKosong;
                            $nilai = $jBenar / $nilai * 100;
                            
                            
                            ?>
                            <tr>
                                <td class='text-center'> <?php echo $index++; ?></td>
                                <td><?php echo $row["nama"] ?></td>
                                <td><?php echo $row["penyusun"] ?></td>
                                <td class='text-center'><?php echo $row["tanggal"] ?></td>
                                <td class='text-center'> <?php echo mysqli_num_rows($jml_soal); ?></td>
                                <td class='text-center'><?php echo $row["soal_benar"] ?></td>
                                <td class='text-center'><?php echo $row["soal_salah"] ?></td>
                                <td class='text-center'><?php echo $row["soal_kosong"] ?></td>
                                <td class='text-center'><?php echo $nilai ?></td>
                            </tr>
                            <?php 
                        }
                    }
                    else {
                        ?>

                        <tr>
                            <td colspan="9" class='text-center'>Tidak ada data</td>
                        </tr>

                        <?php 
                    }
                    // close mysql connection
                    mysqli_close($con); 
                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
        </div>
    </div>  
</main>