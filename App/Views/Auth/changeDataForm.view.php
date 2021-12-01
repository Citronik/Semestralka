<?php
/** @var \App\Models\User $data */
?>
<div class="container">
    <div class="row">
        <div class="col">
            <form method="post" action="/Semestralka/?c=auth&a=changeData">
                <div class="mb-3">
                    <input type="hidden" name="id" class="form-control" id="userID" value="<?=$data->id?>">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=$data->email?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputUsername" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="exampleInputEmail1" value="<?=$data->username?>">
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="text" name="password" class="form-control" id="exampleInputPassword1" value="<?=$data->password?>">
                </div>
                <div class="form-text">Account created <?=$data->created_at?></div>

                <button type="submit" class="btn btn-primary">Change personal data</button>
            </form>
        </div>
    </div>
</div>