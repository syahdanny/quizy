<?php 
$idQuiz=$_GET["idQuiz"];
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
                    <input type="hidden" name="idQuiz" value="<?php echo $idQuiz ?>">
                    <br>
                    <div class="form-group">
                    <label class="col control-label col-form-label
                    ">Pertanyaan</label>
                    <div class="col-md-12">
                        <div class="form-group">
                            <textarea class="form-control" name="isiSoal" style="height: 200px;"></textarea>
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-12 control-label col-form-label">Nilai Soal</label>
                        <div class="col-12">
                            <input type="number" class="form-control" id="name" name="nilai" placeholder="Nilai Soal">
                        </div>
                    </div>
                    <br>
                    <table id="pilihan-list" class="">
                        <tbody>

                            <?php
                            $jumlahPilihan = 4;
                            
                                for ($index = 1; $index <= $jumlahPilihan; $index++) {
                                    ?>
                                    <input type="hidden" name="jumlahPilihan" value="<?php echo $jumlahPilihan ?>">

                                    <tr>
                                        <td style="width: 1%;">
                                            <label class="container">
                                                <input type="radio" class="custom-control custom-radio" id="pilihanSoal<?php echo $index;?>" name="pilihan" value="pilihan<?php echo $index;?>" required>
                                                <span class="checkmark"></span>
                                            </label>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                    <input type="text" class="form-control" name="pilihan<?php echo $index;?>" id="exampleFormControlInput1" placeholder="Masukan pilihan <?php echo $index; ?>">
                                            </div>
                                        </td>
                                    </tr>
                                    
                                    <?php 
                                }
                            // close mysql connection
                            mysqli_close($con); 
                            ?>


                        </tbody>
                    </table>
                    <button type="submit" name="add" class="btn btn-primary col">Tambah</button>
                </div>
            </div>
        </div>   
                    
    </form>
</main>