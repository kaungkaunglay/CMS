<?php
require "../layouts/header.php";
require "../../config/config.php";

    $categories = $conn->query("SELECT * FROM categories LIMIT 7");
    $categories->execute();
    $rows = $categories->fetchAll(PDO::FETCH_OBJ);

?>
<div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Categories</h5>
             <a  href="create-category.php" class="btn btn-primary mb-4 text-center float-right">Create Categories</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">update</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                foreach($rows as $row):
                ?>
                  <tr>
                    <th scope="row"><?php echo $row->id; ?></th>
                    <td><?php echo $row->name; ?></td>
                    <td><a  href="update-category.php?upd_id=<?php echo $row->id; ?>" class="btn btn-warning text-white text-center ">Update Categories</a></td>
                    <td><a href="delete-category.php?del_id=<?php echo $row->id; ?>" class="btn btn-danger  text-center ">Delete Categories</a></td>
                  </tr>
                <?php  endforeach; ?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>


<?php require "../layouts/footer.php"; ?>