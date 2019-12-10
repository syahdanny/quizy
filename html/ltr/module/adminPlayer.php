<main>
<div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Manage Player</h4>
                <hr>
            </div>
        </div>
    </div>
<div class="container-fluid">
    <div class="row">
        <div class="col">
        <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Player List</h5>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class='text-center align-middle'>No</th>
                                    <th class='text-center align-middle'>Foto</th>
                                    <th class='text-center align-middle'>Username</th>
                                    <th class='text-center align-middle'>Nama</th>
                                    <th class='text-center align-middle'>E-Mail</th>
                                    <th class='text-center align-middle'>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $query = "SELECT * FROM tb_user WHERE level = 'player'";

                                $result = mysqli_query($con, $query);

                                if (mysqli_num_rows($result) > 0){
                                    $index = 1;
                                    //loop
                                    while($row = mysqli_fetch_assoc($result)){
                                        $id = $row["id"];

                                        ?>
                                        <tr>
                                            <td class='text-center align-middle'> <?php echo $index++; ?></td>
                                            <td class='text-center align-middle'><img style='width: 50px; height: auto' src='../img/<?php echo (empty($row["foto"]) ? 'profile/default.png' : $row["foto"]); ?>' height=25%></td>
                                            <td class='text-center align-middle'><?php echo $row["username"] ?></td>
                                            <td class='text-center align-middle'><?php echo $row["nama"] ?></td>
                                            <td class='text-center align-middle'><?php echo $row["email"] ?></td>
                                            <td class='text-center'>
                                                <a href='../ltr/route.php?id=<?php echo $id ?>&module=adminEditPlayer' class='btn btn-warning'><i class='fas fa-pencil-alt'></i></a>
                                                <a href='../process/actionPlayer.php?id=<?php echo $id ?>&action=delete' class='btn btn-danger'><i class='fa fa-trash'></i></a>
                                            </td>
                                        </tr>
                                        <?php 
                                    }
                                }
                                // close mysql connection
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