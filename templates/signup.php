<?php include 'inc/header.php'; ?>
<div class="container p-5">
    <div class="row">
        <?php $message; ?>
        <div class="col-lg-12">
            <div class="page-header">
                <h1 class="text-success">Sign Up Page</h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="bs-component">
                <form action="register.php" method="POST" enctype="multipart/form-data">
                    <fieldset>
                        <legend>Fill in your details</legend>

                        <div class="form-group has-danger">
                            <label class="form-label mt-4" for="username">Username</label>
                            <input type="text" class="form-control" name="username" required>
                            <!-- <div class="invalid-feedback">Sorry, that username's taken. Try another?</div> -->
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label mt-4">Email address</label>
                            <input type="email" class="form-control" name="email" aria-describedby="email" placeholder="Enter email" required>
                            <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-label mt-4">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <label for="profile image" class="form-label mt-4">Profile Image</label>
                            <input class="form-control" type="file" name="image" required>
                        </div>

                        <button type="submit" class="btn btn-outline-success mt-3" name="submit">Sign Up</button>
                    </fieldset>
                </form>
                <p>Already have an account ? <a href="index.php">Login here</a></p>
            </div>
        </div>
    </div>
</div>