<?php
require '../models/db.php';
$sql = 'SELECT * FROM data';
$statement = $connection->prepare($sql);
$statement->execute();
$data = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
<?php require '../views/file.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Uploaded Files</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Uploader</th>
          <th>File Name</th>
		  <th>Size(KB)</th>
          <th>Uploaded On</th>
		  <th>Action</th>
        </tr>
        <?php foreach($data as $datas): ?>
          <tr>
            <td><?= $datas->id; ?></td>
            <td><?= $datas->username; ?></td>
            <td><?= $datas->name; ?></td>
			<td><?= $datas->size; ?></td>
	        <td><?= $datas->dates; ?></td>
			
			
            
            <td>
              <a href="../controllers/View.php?id=<?= $datas->id ?>" class="btn btn-info">View</a>
			  <a href="../controllers/download.php?id=<?= $datas->id ?>" class="btn btn-info">Download</a>
              <a onclick="return confirm('Are you sure you want to delete this entry?')" href="../models/delete.php?id=<?= $datas->id ?>" class='btn btn-danger'>Delete</a>

            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php require '../css/footer.php'; ?>
