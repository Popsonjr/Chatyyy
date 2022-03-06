<?php include 'inc/header.php'; ?>
<div class="container p-5">

  <div class="row">
    <?php $message ?>
    <div class="d-flex justify-content-between align-items-center">
      <div class="d-flex align-items-center">
        <img class="rounded-circle" width="50" src="<?= $user->image ?>" alt="image">
        <div class="d-flex flex-column mx-3">
          <h4><?= $user->username ?></h4>
          <span><?= $user->status ?></span>
        </div>
      </div>
      <a href="logout.php?logoutId=<?php echo $_SESSION['uniqueId'] ?>"><button type="button" class="btn btn-outline-danger">Logout</button></a>
    </div>

    <div class="d-flex mt-5 search">

      <div class="form-control" id="text">Select a user to chat with below</div>
      <input class="form-control me-sm-2 d-none" type="text" placeholder="Search a user to chat with">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </div>
    <div>
      <ul class="list-group mt-5 py-2">
        <?php include '../userList.php' ?>
      </ul>
    </div>
  </div>

  <script src="js/users.js"></script>