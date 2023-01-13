<?php require "../includes/navbar.php";  ?>
<?php require "../config/config.php"; ?>

<?php
    if(isset($_GET['post_id'])){
        $id = $_GET['post_id'];
        $select = $conn->query("SELECT * FROM posts WHERE id = '$id'");
        $select->execute();
        $post = $select->fetch(PDO::FETCH_OBJ);
    }else{
        header("Location: ".ROOT."/404.php");
    }
    //comment
    if(isset($_POST['submit']) AND isset($_GET['post_id'])){

        //the id of teh post and username for the those who posted the comments
        if(empty($_POST['comment'])){
            echo "<script>alert('Write a comment')</script>";
        }else{
            $id = $_GET['post_id'];
            $username = $_SESSION['username'];
            $comment  = $_POST['comment'];
            $insert = $conn->prepare("INSERT INTO comment (post_id, comment_user, comment) VALUES (:post_id, :comment_user, :comment)");
            $insert->execute([
                ':post_id' => $id,
                ':comment_user' => $username,
                ':comment' => $comment
            ]);
            header("Location: ".ROOT."/posts/post.php?post_id=".$id);
        }
    }
    //selecting the comments
    $comment = $conn->query("SELECT posts.id, comment.post_id AS post_id, comment.comment_user AS comment_username,
comment.comment AS comment, comment.created_at AS created_at, comment.status_comment AS status_comment FROM posts JOIN comment ON posts.id = comment.post_id WHERE posts.id = '$id'
AND comment.status_comment = 1");
    $comment->execute();
    $allcomments = $comment->fetchAll(PDO::FETCH_OBJ) ;


?>
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('images/<?php echo $post->img; ?>')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="post-heading">
                            <h1><?php echo $post->title; ?></h1>
                            <h2 class="subheading"><?php echo $post->subtitle ; ?></h2>
                            <span class="meta">
                                Posted by
                                <a href="#!"><?php echo $post->username; ?></a>
                                <?php echo date('M',strtotime($post->created_at)).", ".date("d",strtotime($post->created_at))." ".date('Y',strtotime($post->created_at));  ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Post Content-->
        <article class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <p><?php echo $post->body;  ?></p>
                        <?php
                            if(isset($_SESSION['user_id']) AND $_SESSION['user_id'] == $post->id):
                        ?>
                        <a href="<?php echo ROOT ?>/posts/delete.php?del_id=<?php echo $post->id; ?>" class="btn btn-danger text-center float-end">Delete</a>
                        <a href="<?php echo ROOT ?>/posts/update.php?upd_id=<?php echo $post->id; ?>" class="btn btn-warning text-center">Update</a>
                        <?php endif;  ?>
                        <p>
                            Placeholder text by
                            <a href="http://spaceipsum.com/">Space Ipsum</a>
                            &middot; Images by
                            <a href="https://www.flickr.com/photos/nasacommons/">NASA on The Commons</a>
                        </p>
                    </div>
                </div>
            </div>
        </article>
        <!-- Footer-->
<!--    Comment Section-->
<section>
    <div class="container my-5 py-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 col-lg-10 col-xl-8">
                <?php if(isset($_POST['submit']) AND empty($_POST['comment'])): ?>
                <div class="bg-danger alert alert-danger text-white">Comment should not be empty</div>
                <?php endif; ?>
                <h3 class="mb-5">Comments</h3>

                <div class="card">
                    <?php
                    if(count($allcomments) > 0):
                    foreach($allcomments as $comment):
                    ?>
                    <div class="card-body">
                        <div class="d-flex flex-start align-items-center">

                            <div>
                                <h6 class="fw-bold text-primary"><?php  echo $comment->comment_username; ?><h8 class="p-3 text-black"><?php echo date('M',strtotime($comment->created_at)).", ".date('d',strtotime($comment->created_at))." ".date('Y', strtotime($comment->created_at)) ?></h8></h6>

                            </div>
                        </div>

                        <p class="mt-3 mb-4 pb-2">
                       <?php echo $comment->comment; ?>
                        </p>


                        <hr class="my-4" />

                    </div>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <div class="text-center">No Comment for this post be the first to comment</div>
                    <?php  endif;?>
                    <?php
                    if(isset($_SESSION['username'])):
                    ?>
                    <form method="post" action="post.php?post_id=<?php echo $id; ?>">

                        <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">

                            <div class="d-flex flex-start w-100">

                                <div class="form-outline w-100">
                                    <textarea class="form-control" id="" placeholder="write message" rows="4"
                                              name="comment"></textarea>
                                </div>
                            </div>
                            <div class="float-end mt-2 pt-1">
                                <button type="submit" name="submit" class="btn btn-primary btn-sm mb-3">Post comment</button>
                            </div>
                        </div>
                    </form>
            <?php else: ?>
                    <div class="bg-danger alert alert-danger text-white">Login to comment</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
require "../includes/footer.php";
?>
