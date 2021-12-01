<div class="container">
    <div class="row">
        <div class="col">
            <form method="post" action="/Semestralka/?c=auth&a=registration">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputUsername" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="exampleInputEmail1">
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="text" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div id="emailHelp" class="form-text">We'll never share your data with anyone else.</div>
                <button type="submit" class="btn btn-primary">Create account</button>
            </form>
        </div>
    </div>
</div>