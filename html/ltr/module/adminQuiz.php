<main>
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Manage Quiz</h4>
                <hr>
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
                <div class="card card-hover">
                    <div class="box bg-success text-center"><a href="route.php?module=adminAddQuiz">
                        <h1 class="font-light text-white"><i class="fas fa-bullhorn"></i></h1>
                        <h6 class="text-white">Create Quiz!</h6>
                        </a>
                    </div>
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
                            `tb_user`.`nama` AS `penyusun`,
                            `tb_quiz`.`id`,
                            `tb_quiz`.`nama`
                        FROM
                            `tb_user`
                        RIGHT JOIN
                            `tb_quiz`
                        ON
                            `tb_user`.`id` = `tb_quiz`.`user_id`
                    ";


                    $result = mysqli_query($con, $query);

                    //cek jml data
                    if (mysqli_num_rows($result) > 0){
                        // Create row index
                        $index = 1;
                        // Do loop through data
                        while($row = mysqli_fetch_assoc($result)){

                            // id player
                            $id = $row["id"];

                            $sql = "SELECT * FROM tb_soal WHERE quiz_id = $id";
                            $jml_soal = mysqli_query($con, $sql);
                            

                            ?>
                            <tr>
                                <td class='text-center'> <?php echo $index++; ?></td>
                                <td><?php echo $row["nama"] ?></td>
                                <td><?php echo $row["penyusun"] ?></td>
                                <td class='text-center'> <?php echo mysqli_num_rows($jml_soal); ?></td>
                                <td class='text-center'>
                                    <a href='../ltr/route.php?id=<?php echo $id ?>&module=adminEditQuiz' class='btn btn-warning'><i class='fas fa-pencil-alt'></i></a>
                                    <a href='../process/actionQuiz.php?id=<?php echo $id ?>&action=delete' class='btn btn-danger'><i class='fas fa-trash'></i></a>
                                </td>
                            </tr>
                            <?php 
                        }
                    }
                    else {
                        ?>

                        <tr>
                            <td colspan="6" class='text-center'>Tidak ada data</td>
                        </tr>

                        <?php 
                    }
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