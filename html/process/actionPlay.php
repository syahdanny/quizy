<?php 
include '../../conSQL.php';
session_start();

if(isset($_POST['selesai'])){
    
    $idQuiz = $_POST["idQuiz"];

    $jBenar = 0;
    $jSalah = 0;
    $jKosong = 0;

    // check username exist or not
    $query = "SELECT * FROM tb_soal WHERE quiz_id = '$idQuiz'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0){
        
        while($row = mysqli_fetch_assoc($result)){
            $soal_id = $row["id"];

            $jawaban = "soal".$soal_id;

            if (!isset($_POST[$jawaban])){
                $jKosong++;
            }
            else {
                $jawabanDipilih = $_POST[$jawaban];
                $queryPilihan = "SELECT * FROM tb_pilihan WHERE soal_id = '$soal_id' AND id = '$jawabanDipilih'";
                $resultPilihan = mysqli_query($con, $queryPilihan);
                $rowPilihan = mysqli_fetch_assoc($resultPilihan);
    
                if ($rowPilihan["status"] == "benar") {
                    $jBenar++;
                } else {
                    $jSalah++;
                }
            }
        }

        $id_user = $_SESSION["id_user"];

        $query = "
            INSERT
            INTO
                `tb_hasil_quiz`(
                    `user_id`,
                    `quiz_id`,
                    `tanggal`,
                    `soal_benar`,
                    `soal_salah`,
                    `soal_kosong`
                )
            VALUES('$id_user', '$idQuiz', NOW(), '$jBenar', '$jSalah', '$jKosong');
        ";
        // die($query);
        if (mysqli_query($con, $query)){
            echo("bener");
        }
        else{
            echo("salah");
        }

        header("Location: ../ltr/route.php?module=userQuizResult&jBenar=$jBenar&jSalah=$jSalah&jKosong=$jKosong");
    }
    else {
    }
    mysqli_close($con);
}

?>
