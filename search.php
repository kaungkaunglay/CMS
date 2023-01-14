<?php
require "includes/header.php";
require "config/config.php" ;
?>
<?php
    if(isset($_POST['search']))
    {
        if(empty($_POST['search'])){
           header("Location: index.php");
        }else{
            $search = htmlentities(trim($_POST['search']));
            $data = $conn->query("SELECT * FROM posts WHERE title LIKE '%$search%'");
            $data->execute();
            $rows = $data->fetchAll(PDO::FETCH_OBJ);
            if($data->rowCount() ==  0){
                echo "<div class='alert alert-danger bg-danger text-white text-center'>
            No Search with this post for now
            </div>";
            }
        }
    }else{
        header("Location: index.php");
    }

    ?>

<div class="row gx-4 gx-lg-5 justify-content-center">
    <div class="col-md-10 col-lg-8 col-xl-7">
        <?php
        //                    echo "Hello" .  $_SESSION['username'];
        ?>
        <?php
        if(count($rows) > 0):
        ?>
        <div>Number of Posts: <?php echo count($rows) ?></div>
        <?php ?>
        <?php
        foreach($rows as $row):
            ?>
            <!-- Post preview-->
            <div class="post-preview">
                <a href="<?php echo ROOT ?>/posts/post.php?post_id=<?php echo $row->id; ?>">
                    <h2 class="post-title"><?php echo $row->title; ?></h2>
                    <h3 class="post-subtitle"><?php echo $row->subtitle; ?></h3>
                </a>
                <p class="post-meta">
                    Posted by
                    <a href="#!"><?php echo $row->username; ?></a>
                    <?php echo date('M',strtotime($row->created_at)).",".date('d',strtotime($row->created_at))." ".date('Y',strtotime($row->created_at)) ?>
                </p>
            </div>
            <!-- Divider-->
            <hr class="my-4" />
            <!-- Pager-->
        <?php endforeach;  ?>
        <?php else: ?>
        <div class='alert alert-danger bg-danger text-white text-center'>
            No Search with this post for now
        </div>
        <?php endif; ?>
    </div>
</div>
<?php
require "includes/footer.php";
?>
