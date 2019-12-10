<?php
include '../../conSQL.php';
// Get id from form
if(isset($_POST['edit'])){
    $idSoal = $_POST["idSoal"];
    $idQuiz = $_POST["quizId"];
    $isiSoal = $_POST["isiSoal"];
    $nilai = $_POST["nilai"];
    $pilihan = $_POST["pilihan"];

    $query = "UPDATE tb_soal SET soal = '$isiSoal' WHERE id = $idSoal";

    $queryPilihan = "SELECT * FROM tb_pilihan WHERE soal_id=$idSoal";
    $result = mysqli_query($con, $queryPilihan);

    while($row = mysqli_fetch_assoc($result)){
        
        $id = $row["id"];
        $isiPilihan = mysqli_real_escape_string($con, $_POST[$id]);
        $status = ($id == $pilihan) ? 'benar' : 'salah';

        mysqli_query($con, "UPDATE tb_pilihan SET pilihan = '$isiPilihan', status = '$status' WHERE id = $id");
    }
    
    if (mysqli_query($con, $query)) { 
        echo "<script language='javascript'>alert('berhasil');</script>";
        header("Location: ../ltr/route.php?id=$idQuiz&module=adminEditQuiz");
    } else {
        $error = urldecode("Update Gagal!");
        echo "<script language='javascript'>alert('$error'); window.location = '../ltr/route.php?id=$idQuiz&module=adminEditQuiz'</script>";
    }
    
    // close mysql connection
    mysqli_close($con); 
}
else if(isset($_POST['add'])){
    $idQuiz= $_POST["idQuiz"];
    $jumlahPilihan= $_POST["jumlahPilihan"];
    $isiSoal = $_POST["isiSoal"];
    $nilai = $_POST["nilai"];
    $pilihan = $_POST["pilihan"];


    $query = "INSERT INTO tb_soal(soal, quiz_id, nilai) VALUES('$isiSoal', $idQuiz, $nilai)";
    
    if (mysqli_query($con, $query)) { 
        $newIdSoal = mysqli_insert_id($con);
        echo "<script language='javascript'>alert('berhasil');</script>";
        header("Location: ../ltr/route.php?id=$idQuiz&module=adminEditQuiz");
    } else {
        $error = urldecode("Update Gagal!");
        echo "<script language='javascript'>alert('$error'); window.location = '../ltr/route.php?id=$idQuiz&module=adminEditQuiz'</script>";
    }

    $macamPilihan = [];
    for ($j=0; $j < $jumlahPilihan; $j++) { 
        $k = $j+1;
        $macamPilihan[$j] = $_POST["pilihan$k"];
    }

    for ($i=0; $i < $jumlahPilihan; $i++) { 
        $n = $i + 1;
        $radioPilihan = "pilihan".$n;
        if ($radioPilihan == $_POST["pilihan"]) {
            mysqli_query($con, "INSERT INTO tb_pilihan(soal_id, pilihan, status) VALUES('$newIdSoal', '$macamPilihan[$i]', 'benar')");
        }
        else {
            mysqli_query($con, "INSERT INTO tb_pilihan(soal_id, pilihan) VALUES('$newIdSoal', '$macamPilihan[$i]')");
        }
    }
    
    // close mysql connection
    mysqli_close($con); 
    header("Location: ../ltr/route.php?id=$idQuiz&module=adminEditQuiz");
}
else {
    $id=$_GET["id"];
    $quizId=$_GET["quizId"];
    $action=$_GET["action"];
    
    if ($action == "delete") {
        $queryHapus = "DELETE FROM tb_soal WHERE id = $id";
        if (mysqli_query($con, $queryHapus)) { 
            echo "<script language='javascript'>alert('berhasil');</script>";
            header("Location: ../ltr/route.php?id=$quizId&module=adminEditQuiz");
        } else {
            $error = urldecode("Update Gagal!");
            echo "<script language='javascript'>alert('$error'); window.location = '../ltr/route.php?id=$quizId&module=adminEditQuiz'</script>";
        }
    }
}


?>