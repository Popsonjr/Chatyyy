<?php include 'inc/header.php'; ?>
<div class="container p-5">
<!-- <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    <strong class="me-auto">Notification</strong>
    <small>11 mins ago</small>
    <button type="button" class="btn-close ms-2 mb-1" data-bs-dismiss="toast" aria-label="Close">
      <span aria-hidden="true"></span>
    </button>
  </div>
  <div class="toast-body">
    
  </div> -->
<!-- </div> -->

    <div class="row">
        <?php $message ?>
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <img class="rounded-circle" width="50" src="<?= $user->image ?>" alt="image">
                <div class="d-flex flex-column mx-3">
                    <h4><?=$user->username ?></h4>
                    <span><?=$user->status ?></span>
                </div>
            </div>
            <a href="logout.php?logoutId=<?php echo $_SESSION['uniqueId'] ?>"><button type="button" class="btn btn-outline-danger">Logout</button></a>
        </div>
        <!-- <div class="col-lg-12">
            <div class="page-header">
              <h1 class="text-success">Friends</h1>
            </div> -->
        <!-- </div> -->
    
        <div class="d-flex mt-5 search">

            <div class="form-control" id="text">Select a user to chat with below</div>
            <input class="form-control me-sm-2 d-none" type="text" placeholder="Search a user to chat with">
            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
        </div>
        <div>
            <ul class="list-group mt-5 py-2">
            <?php foreach ($friends as $friend) { ?>

                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <img class="rounded-circle" width="30" src="<?= $friend->image ?>" alt="image">
                        <div class="d-flex flex-column mx-3">
                            <h6><?=$friend->username ?></h6>
                            <span>Last message from this user</span>
                        </div>
                    </div>
                    <?php if ($friend->status == 'Online') {  ?>
                        <span class="badge bg-success rounded-pill"><?= $friend->status ?></span>
                    <?php } else { ?>
                        <span class="badge bg-light rounded-pill"><?= $friend->status ?></span>
                    <?php } ?>
                    
                    
                </li>
        
            <?php } ?>
            </ul>
        </div>
    </div>

    <script src="js/users.js"></script>
