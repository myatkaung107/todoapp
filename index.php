<?php

require 'config.php';


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Todo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  </head>
  <body>
    <?php
      $pdostatement = $pdo -> prepare("SELECT * FROM todo ORDER BY id DESC");
      $pdostatement -> execute();
      $result = $pdostatement -> fetchAll();
    ?>
    <div class="card">
      <div class="card-body">
        <h2>ToDo Home Page</h2>
        <a type="button" class="btn btn-outline-primary" href="add.php">Create New</a>
        <table class="table table-striped">
          <thead class="thead-dark">
            <tr>
              <th>Id</th>
              <th>Title</th>
              <th>Description</th>
              <th>Created</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $i = 1;
              if ($result) {
                foreach ($result as $value) {
                ?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $value['title'] ?></td>
                  <td><?php echo $value['description'] ?></td>
                  <td><?php echo date('Y-m-d',strtotime($value['created_at'])) ?></td>
                  <td>
                    <a type="button" class="btn btn-outline-warning" href="edit.php?id=<?php echo $value['id']; ?>">Edit</a>
                    <a type="button" class="btn btn-outline-danger" href="delete.php?id=<?php echo $value['id']; ?>">Delete</a>
                  </td>
                </tr>
                <?php
                $i++;
                }
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>
