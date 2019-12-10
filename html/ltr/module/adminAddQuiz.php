<main>
    <div class="card">
        <form class="form-horizontal" action="../process/actionQuiz.php" method="POST">
            <div class="card-body">
                <h4 class="card-title">Tambah Quiz</h4>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 text-right control-label col-form-label">Quiz Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="nama" placeholder="Quiz Name">
                    </div>
                </div>
            </div>
            <div class="border-top">
                <div class="card-body">
                    <button type="submit" name="add" class="btn btn-primary col">Submit</button>
                </div>
            </div>
        </form>
    </div>
</main>