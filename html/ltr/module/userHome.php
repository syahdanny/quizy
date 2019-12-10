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
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- Column -->
            <div class="col-md-12">
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Selamat Datang!</h4>
                <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                <hr>
                <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
            </div>
            </div>
            <div class="col">
            <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">List Quiz</h5>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class='text-center align-middle'>No</th>
                                        <th class='text-center align-middle'>Nama</th>
                                        <th class='text-center align-middle'>Penyusun</th>
                                        <th class='text-center align-middle'>Jumlah Soal</th>
                                        <th class='text-center align-middle'>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                    // Query command
                    $query = "
                        SELECT
                            a.nama AS 'penyusun',
                            b.id,
                            b.nama
                        FROM
                            tb_quiz b,
                            tb_user a
                        WHERE
                            a.id = b.user_id AND b.id NOT IN(
                            SELECT
                                quiz_id
                            FROM
                                tb_hasil_quiz
                            WHERE
                                user_id = $idUser
                        )                    
                        ";


                    $result = mysqli_query($con, $query);
                    if (mysqli_num_rows($result) > 0){
                        $index = 1;
                        while($row = mysqli_fetch_assoc($result)){

                            $id = $row["id"];

                            $sql = "SELECT * FROM tb_soal WHERE quiz_id = $id";
                            $jml_soal = mysqli_query($con, $sql);

                            ?>
                            <tr>
                                <td class='text-center align-middle'> <?php echo $index++; ?></td>
                                <td class='text-center align-middle'><?php echo $row["nama"] ?></td>
                                <td class='text-center align-middle'><?php echo $row["penyusun"] ?></td>
                                <td class='text-center align-middle'> <?php echo mysqli_num_rows($jml_soal); ?></td>
                                <td class='text-center align-middle'>
                                    <a href='../ltr/route.php?id=<?php echo $id ?>&module=userInfoQuiz' class='btn btn-warning'><i class='fas fa-pencil-alt'></i></a>
                                </td>
                            </tr>
                            <?php 
                        }
                    }
                    else {
                        ?>

                        <tr>
                            <td colspan="6" class='text-center'>Tidak ada soal yang aktif</td>
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