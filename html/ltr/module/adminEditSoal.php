<?php

$id=$_GET["id"];
$quizId=$_GET["quizId"];
$sql="SELECT * FROM tb_soal WHERE id=$id";
$result=mysqli_query($con,$sql);

$soal='';
if(mysqli_num_rows($result)==1){
    $soal=mysqli_fetch_assoc($result);
}else{
    echo "Soal tidak ditemukan";
}
?>
<main>
    <div class="container-fluid">
    <form class="row" action="../process/actionSoal.php" method="POST">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Soal</h4>
                    <!-- Create the editor container -->
                    <!-- <input type="hidden" > -->
                    <input type="hidden" id="idSoal" name="idSoal" value="<?php echo $soal["id"];?>">
                    <input type="hidden" id="quizId" name="quizId" value="<?php echo $quizId;?>">
                    <br>
                    <div class="form-group">
                    <label class="col control-label col-form-label
                    ">Pertanyaan</label>
                    <div class="col-md-12">
                        <div class="form-group">
                            <textarea class="form-control" name="isiSoal" style="height: 200px;"><?php echo $soal["soal"]; ?></textarea>
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-12 control-label col-form-label">Nilai Soal</label>
                        <div class="col-12">
                            <input type="number" class="form-control" id="name" name="nilai" value="<?php echo $soal["nilai"]; ?>">
                        </div>
                    </div>
                    <br>
                    <table id="pilihan-list" class="">
                        <tbody>

                            <?php
                            
                            $query = "SELECT * FROM tb_pilihan WHERE soal_id=$id";
                            $result = mysqli_query($con, $query);

                            if (mysqli_num_rows($result) > 0){
                                $index = 1;
                                while($row = mysqli_fetch_assoc($result)){
                                    $pilihan_id = $row["id"];

                                    ?>

                                    <tr>
                                        <td style="width: 1%;">
                                            <label class="container">
                                                <input type="radio" class="custom-control custom-radio" id="pilihanSoal<?php echo $index;?>" name="pilihan" <?php echo ($row["status"] == 'benar') ? 'checked' : '' ?> value=<?php echo $row["id"]; ?> required>
                                                <span class="checkmark"></span>
                                            </label>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                    <input type="text" class="form-control" name="<?php echo $row["id"]; ?>" id="exampleFormControlInput1" placeholder="Masukan pilihan Pilihan <?php echo $index; ?>" value="<?php echo $row["pilihan"];?>">
                                            </div>
                                        </td>
                                    </tr>
                                    
                                    <?php 
                                    $index++;
                                }
                            }
                            // close mysql connection
                            mysqli_close($con); 
                            ?>


                        </tbody>
                    </table>
                    <button type="submit" name="edit" class="btn btn-primary col">Edit</button>
                </div>
            </div>
        </div>   
                    
    </form>
</main>