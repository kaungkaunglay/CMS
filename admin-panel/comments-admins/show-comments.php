<?php
require "../layouts/header.php";
require "../../config/config.php";
if(!isset($_SESSION['adminname'])){
    header("Location: ".ADMINROOT."/admins/login-admins.php");
}

//Query
$comments = $conn->query("SELECT posts.id AS id, posts.title AS title, comment.post_id  AS post_id, comment.comment_user AS commenet_user, comment.comment AS comment, comment.status_comment AS status_comment, comment.id AS comment_id FROM comment JOIN posts ON posts.id = comment.post_id");
$comments->execute();
$rows = $comments->fetchAll(PDO::FETCH_OBJ);
?>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4 d-inline">Posts</h5>

                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Post ID</th>
                            <th scope="col">title</th>
                            <th scope="col">comment</th>
                            <th scope="col">Comment By</th>
                            <th scope="col">status</th>
                            <th scope="col">delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach($rows as $row):
                            ?>
                            <tr>
                                <th scope="row"><?php echo $row->post_id; ?></th>
                                <td><?php echo $row->title; ?></td>
                                <td><?php echo $row->comment; ?></td>
                                <td><?php echo $row->commenet_user; ?></td>
                               <?php
                                if($row->status_comment ==0):
                                    ?>
                                    <td><a href="<?php echo ADMINROOT ?>/comments-admins/status-comments.php?comment_id=<?php echo $row->comment_id; ?>&status_comment=<?php echo $row->status_comment ?>" class="btn btn-danger  text-center ">deactivated</a></td>
                                <?php else:  ?>
                                <td><a href="<?php echo ADMINROOT ?>/comments-admins/status-comments.php?comment_id=<?php echo $row->comment_id; ?>&status_comment=<?php echo $row->status_comment ?>" class="btn btn-success  text-center ">activated</a></td>
                                <?php endif; ?>
                                <td><a href="<?php echo ADMINROOT ?>/comments-admins/delete_comment.php?comment_id=<?php echo $row->comment_id; ?>&status_comment=<?php echo $row->status_comment ?>" class="btn btn-danger  text-center ">Delete</a></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


<?php
require "../layouts/header.php";
?>