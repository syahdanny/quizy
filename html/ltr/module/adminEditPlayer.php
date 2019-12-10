<?php

$id=$_GET["id"];
$query="SELECT * FROM tb_user WHERE id=$id";
$result=mysqli_query($con,$query);

$user='';
if(mysqli_num_rows($result)==1){
    $user=mysqli_fetch_assoc($result);
}else{
    echo "User tidak ditemukan";
}
?>
<main>
    <div class="card">
        <form class="form-horizontal" action="../process/actionPlayer.php" method="POST">
            <div class="card-body">
                <h4 class="card-title">Edit <?php echo $user["nama"]; ?></h4>
                <input type="hidden" name="idUser" value="<?php echo $user["id"] ?>">
                <div class="form-group row">
                    <label for="name" class="col-sm-3 text-right control-label col-form-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="nama" value="<?php echo $user["nama"] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-3 text-right control-label col-form-label">Username</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="username" name="username" value="<?php echo $user["username"] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-3 text-right control-label col-form-label">E-Mail</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="email" name="email" value="<?php echo $user["email"] ?>">
                    </div>
                </div>
                <div class="form-group row">
                <label class="col-md-3 text-right control-label col-form-label
                ">File Upload</label>
                <div class="col-md-9">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="validatedCustomFile" name="foto">
                        <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                    </div>
                    
                    <div class="col">
                    <br>
                        <img style='width: 200px; height: auto;' src='../../img/<?php echo (empty($user["foto"]) ? 'profile/default.png' : $user["foto"]); ?>'>
                        <input type="hidden" name="foto_lama" value="<?php echo $user["foto"] ?>">
                    </div>
                </div>
            </div>
            </div>
            <div class="border-top">
                <div class="card-body">
                    <button type="submit" name="edit" class="btn btn-primary col">Submit</button>
                </div>
            </div>
        </form>
    </div>
</main>