<?php

$id=$_GET["id"];
$sql="SELECT * FROM tb_quiz WHERE id=$id";
$result=mysqli_query($con,$sql);

$quiz='';
if(mysqli_num_rows($result)==1){
    $quiz=mysqli_fetch_assoc($result);
}else{
    echo "Quiz tidak ditemukan";
}
?>
<main>
    <div class="card">
        <form class="form-horizontal" action="../process/actionQuiz.php" method="POST">
            <div class="card-body">
                <h4 class="card-title">Edit Quiz <?php echo $quiz["nama"]; ?></h4>
                <input type="hidden" name="idQuiz" value="<?php echo $quiz["id"] ?>">
                <div class="form-group row">
                    <label for="name" class="col-sm-3 text-right control-label col-form-label">Quiz Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="nama" value="<?php echo $quiz["nama"] ?>">
                    </div>
                </div>
            </div>
            <div class="border-top">
                <div class="card-body">
                    <button type="submit" name="edit" class="btn btn-primary col">Edit</button>
                </div>
            </div>
            <div class="border-top">
                <div class="card-body">
                    <a href="route.php?idQuiz=<?php echo $quiz["id"] ?>&module=adminAddSoal">
                    <button type="button" class="btn btn-success col">Tambah Soal</button>
                    </a>
                </div>
            </div>
        </form>
        <fieldset>
            <div class="accordion" id="accordionExample">

                <?php
                $query = "SELECT * FROM tb_soal WHERE quiz_id=$id";
                $result = mysqli_query($con, $query);

                if (mysqli_num_rows($result) > 0){
                    $index = 1;
                    while($row = mysqli_fetch_assoc($result)){
                        $soal_id = $row["id"];
                ?>
                <div class="card">
                    <div class="card-header" id="heading<?php echo $index; ?>">
                        <h5 class="mb-0">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <button class="btn btn-block btn-link text-left" type="button" data-toggle="collapse" data-target="#collapse<?php echo $index; ?>" aria-expanded="true" aria-controls="collapse<?php echo $index; ?>">
                                            Soal <?php echo $index;?>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-auto">
                                        <div class="row">
                                            <a href='route.php?quizId=<?php echo $quiz["id"] ?>&id=<?php echo $soal_id ?>&module=adminEditSoal' class='btn btn-warning'><i class='fas fa-pencil-alt'></i></a>
                                            <a href='../process/actionSoal.php?quizId=<?php echo $quiz["id"] ?>&id=<?php echo $soal_id ?>&action=delete' class='btn btn-danger'><i class='fa fa-trash'></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </h5>
                    </div>
                    <div id="collapse<?php echo $index; ?>" class="collapse" aria-labelledby="heading<?php echo $index; ?>" data-parent="#accordionExample">
                        <div class="card-body">
                            <?php echo $row["soal"]; ?>     
                                                                
                        </div>
                        <div class="card-body">

                            <?php
                            $query_pilihan = "SELECT * FROM tb_pilihan WHERE soal_id=$soal_id";
                            $result_pilihan = mysqli_query($con, $query_pilihan);

                            if (mysqli_num_rows($result_pilihan) > 0){
                                while($row_pilihan = mysqli_fetch_assoc($result_pilihan)){

                            ?>

                            <div class="alert <?php echo ($row_pilihan["status"] == 'benar') ? 'alert-warning' : 'alert-danger'; ?>" role="alert">
                                <?php echo $row_pilihan["pilihan"]?>
                            </div>

                            <?php 
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <?php 
                    $index++;
                    }
                }
                // close mysql connection
                mysqli_close($con); 
                ?>
            </div>
        </fieldset>
    </div>
</main>