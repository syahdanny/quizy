<?php
include '../../conSQL.php';
session_start();


// Get id from form
if(isset($_POST['edit'])){
    $idUser = $_POST["idUser"];
    $username=$_POST["username"];
    $nama=$_POST["nama"];
    $email=$_POST["email"];
    
    if(!$_FILES["foto"]["name"]==""){
        $code=$_FILES["foto"]["error"];
        if($code===0){
            $nama_folder="profile";
            $tmp=$_FILES["foto"]["tmp_name"];
            $nama_file=$_FILES["foto"]["name"];
            $path="../../../img/$nama_folder/$nama_file";
            $pathdb="$nama_folder/$nama_file";
            $upload_check=false;
            $tipe_file=array("image/jpeg","image/jpg","image/png");
    
            if(!in_array($_FILES["foto"]["type"],$tipe_file)){
                $error.="Cek kembali ekstensi file anda (*.jpeg,*.jpg,*.png)<br>";
                echo "<script language='javascript'>alert('$error'); window.location = '../ltr/route.php?module=adminPlayer'</script>";
                $upload_check=true;
            }
            if($upload_check==false){
                $foto_lama = $_POST["foto_lama"];
                $pathDel = "../../../img/$foto_lama";
                unlink($pathDel);
            }
            if(!$upload_check and move_uploaded_file($tmp,$path)){
                $query = "UPDATE tb_user SET username='$username', nama='$nama', email='$email', foto='$pathdb' WHERE id = $idUser";
            }
            else{
                $error="Upload foto gagal $tmp   $path  $upload_check";
                echo "<script language='javascript'>alert('$error'); window.location = '../ltr/route.php?module=adminPlayer'</script>";
            }
        }
    }
    else {
        $query = "UPDATE tb_user SET username='$username', nama='$nama', email='$email' WHERE id = $idUser";
    }
    
    if (mysqli_query($con, $query)) { 
        echo "<script language='javascript'>alert('berhasil');</script>";
        header("Location: ../ltr/route.php?module=home");
    } else {
        $error = urldecode("Update Gagal! Username telah dipakai");
        echo "<script language='javascript'>alert('$error'); window.location = '../ltr/route.php?module=home'</script>";
    }
    
    // close mysql connection
    mysqli_close($con); 

}
else {
    $id=$_GET["id"];
    $action=$_GET["action"];

    if ($action == "delete") {
        $queryHapus = "DELETE FROM tb_user WHERE id = $id";
        mysqli_query($con,$queryHapus);
        header("Location: ../ltr/route.php?module=adminPlayer");
    }
    else {
        $error = urldecode("Data tidak berhasil di delete");
        echo "<script language='javascript'>alert('Data tidak berhasil di delete'); window.location = '../ltr/route.php?module=adminPlayer'</script>";
    }
    
}



?>