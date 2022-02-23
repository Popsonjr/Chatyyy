<?php include_once 'inc/header.php'; ?>
<div class="container p-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-header">
              <h1 class="text-success">Login Page</h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="bs-component">
                <form action="login.php" method="POST">
                    <fieldset>
                        <legend>Fill in your details</legend>
                  
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label mt-4">Email address</label>
                            <input type="email" class="form-control" name="email" aria-describedby="email" placeholder="Enter email">
                    
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-label mt-4">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                                    
                        <button type="submit" class="btn btn-outline-success mt-3" name="submit">Login</button>
                    </fieldset>
                </form>
                <p>Don't have an account ? <a href="register.php">Sign Up here</a></p>
            </div>
        </div>
    </div>
</div>