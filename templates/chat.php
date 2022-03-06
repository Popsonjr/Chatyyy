<?php include 'inc/header.php'; ?>
<div class="container p-5">
    <div class="card border-primary mx-auto mb-3" style="max-width: 30rem;">
        <div class="card-header">

            <div class="d-flex align-items-center">
                <a href="index.php?users=true" class="mr-5"><i class="fa fa-long-arrow-left"></i></a>
                <img class="rounded-circle ms-4 me-2" width="50" src="<?= $friend->image ?>" alt="image">
                <div class="d-flex flex-column mx-3">
                    <h5><?= $friend->username ?></h5>
                    <span id="user-details"> </span>

                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="message-body">


            </div>
            <form class="d-flex mt-3" action="#" id="chat" method="POST" autocomplete="off">
                <input type="hidden" name="friendId" value="<?= $friendId ?>">
                <input class="form-control me-sm-2" id="input-field" name="message" type="text" placeholder="Type a message here ...">
                <button class="btn btn-secondary my-2 my-sm-0" name="submit" type="submit"><i class="fa fa-paper-plane"></i></button>
            </form>

        </div>
    </div>

    <script src="js/chat.js"></script>