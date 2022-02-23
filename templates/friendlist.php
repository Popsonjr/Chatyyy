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
        <?= $message ?>
        <div class="d-flex justify-content-between">
            <div class="d-flex">
                <img class="mr-5" width="50" src="php/images/business-1037741_1920.png" alt="image">
               <span><?=$user->username ?></span>
            </div>
            <a href="logout.php?logoutId=<?php echo $_SESSION['uniqueId'] ?>"><button type="button" class="btn btn-outline-danger">Logout</button></a>
        </div>
        <div class="col-lg-12">
            <div class="page-header">
              <h1 class="text-success">Friends</h1>
            </div>
        </div>
    </div>
    <form class="d-flex">
        <input class="form-control me-sm-2" type="text" placeholder="Search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
<?php foreach ($friends as $friend) { ?>


    <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <?php echo $friend->username ?>
            <span class="badge bg-primary rounded-pill"><?= $friend->status ?></span>
        </li>
        <!-- <li class="list-group-item d-flex justify-content-between align-items-center">
            Dapibus ac facilisis in
            <span class="badge bg-primary rounded-pill">2</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Morbi leo risus
            <span class="badge bg-primary rounded-pill">1</span>
        </li> -->
    </ul>
    

<?php } ?>
