<?php
include '../../conSQL.php';

session_start();

if(isset($_POST['edit'])){
    $idQuiz = $_POST["idQuiz"];
    $nama = $_POST["nama"];

    $query = "UPDATE tb_quiz SET nama='$nama' WHERE id = $idQuiz";

    if (mysqli_query($con, $query)) { 
        echo "<script language='javascript'>alert('berhasil');</script>";
        header("Location: ../ltr/route.php?module=adminQuiz");
    } else {
        $error = urldecode("Update Gagal!<br>");
        echo "<script language='javascript'>alert('$error'); window.location = '../ltr/route.php?module=adminEditQuiz'</script>";
    }

    // close mysql connection
    mysqli_close($con); 

}
else if(isset($_POST['add'])){
    
    $nama = $_POST["nama"];
    $idUser = $_SESSION["id_user"];

    $query = "INSERT INTO tb_quiz(nama, user_id) VALUES('$nama', $idUser)";

    if (mysqli_query($con, $query)) {
        $newIdQuiz = mysqli_insert_id($con);
        header("Location: ../ltr/route.php?id=$newIdQuiz&module=adminEditQuiz");
    } else {
        $error = urlencode("Gagal tambah");
        echo "<script language='javascript'>alert('$idUser'); window.location = '../ltr/route.php?module=adminAddQuiz'</script>";
    }

    mysqli_close($con);
}

else {
    $id=$_GET["id"];
    $action=$_GET["action"];
        
    if ($action == "delete") {
        $queryHapus = "DELETE FROM tb_quiz WHERE id = $id";
    
        mysqli_query($con,$queryHapus);
        header("Location: ../ltr/route.php?module=adminQuiz");
    }
    else {
        $error = urldecode("Data tidak berhasil di delete");
        echo "<script language='javascript'>alert('Data tidak berhasil di delete'); window.location = '../ltr/route.php?module=adminQuiz'</script>";
    }
}

?>

<!-- } else {
    $error = urldecode("Data tidak berhasil di delete" . mysqli_error($con));
    header("Location:../admin.php?error=$error");
} -->