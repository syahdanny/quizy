<?php

$id=$_GET["id"];
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
    WHERE `tb_quiz`.`id` = $id
";

$result=mysqli_query($con,$query);

$quiz='';
if(mysqli_num_rows($result)==1){
    $quiz=mysqli_fetch_assoc($result);
}else{
    echo "Quiz tidak ditemukan";
}


$sql = "SELECT * FROM tb_soal WHERE quiz_id = $id";
$jml_soal = mysqli_query($con, $sql);
?>


<!-- Main content area -->
<main class="container-fluid">
    <br>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <article>
                            <form action="play.php" method="POST" >
                                <fieldset>
                                    <legend>Info Quiz</legend>
                                    <input type="hidden" name="idQuiz" value="<?php echo $id ?>">
                                    <table class="table">
                                        <tr>
                                            <td>
                                                Nama Quiz:
                                            </td>
                                            <td>
                                                <?php echo $quiz["nama"]?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Nama Penyusun:
                                            </td>
                                            <td>
                                                <?php echo $quiz["penyusun"]?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Jumlah Soal
                                            </td>
                                            <td>
                                                <?php echo mysqli_num_rows($jml_soal); ?>
                                            </td>
                                        </tr>
                                    </table>
                                    <button type="submit" name="mulai" class="btn btn-primary col">Mulai</button>
                                </fieldset>
                            </form>
                        </article>
                    </div>
                </div>
            </div>
            <!-- Example pagination Bootstrap component -->
        </div>

    </div>
</main>