<?php include_once 'config/init.php' ?>
<?php

$message = new Message;
foreach ($friends as $friend) {
    $lastMessageRow = $message->getLastMessages($_SESSION['uniqueId'], $friend->uniqueId);
    if ($lastMessageRow) {
        ($lastMessageRow->message) ? $lastMessage = $lastMessageRow->message : $lastMessage = "Start a chat!";
        (strlen($lastMessage) > 20) ? $lastMessage = substr($lastMessage, 0, 20) . ". . ." : "";

        if ($lastMessageRow->senderId == $_SESSION['uniqueId']) {
            $lastMessage = "You: " . $lastMessageRow->message;
        }
    } else {
        $lastMessage = "Start a chat!";
    }



?>

    <?php  ?>
    <a id="user" href="index.php?friendId=<?= $friend->uniqueId ?>">
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <img class="rounded-circle" width="30" src="<?= $friend->image ?>" alt="image">
                <div class="d-flex flex-column mx-3">
                    <h6><?= $friend->username ?></h6>
                    <span><?= $lastMessage ?></span>
                </div>
            </div>
            <?php if ($friend->status == 'Online') {  ?>
                <span class="badge bg-success rounded-pill"><?= $friend->status ?></span>
            <?php } else { ?>
                <span class="badge bg-light rounded-pill"><?= $friend->status ?></span>
            <?php } ?>


        </li>
    </a>

<?php } ?>