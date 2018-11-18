<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM data WHERE id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['name'])  && isset($_POST['email']) ) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $sql = 'UPDATE data SET name=:name, type=:type WHERE id=:id';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':name' => $name, ':type' => $type, ':id' => $id])) {
    header("Location: /");
  }
}
?>
<?php require 'footer.php'; ?>
