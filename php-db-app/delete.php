<?php 
$dsn = 'mysql:dbname=ywl3cfeoy8pwxya0;host=iu51mf0q32fkhfpl.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;charset=utf8mb4';
$user = 'pnslnqkdktbrdsc1';
$password = 'cvwir4xay91lhxp9';

try {
    $pdo = new PDO($dsn, $user, $password);

    $sql_delete = 'DELETE FROM products WHERE id = :id';
    $stmt_delete = $pdo->prepare($sql_delete);

    $stmt_delete->bindValue(':id', $_GET['id'], PDO::PARAM_INT);

    $stmt_delete->execute();

    $count = $stmt_delete->rowCount();

    $message = "商品を{$count}件削除しました。";

    header("Location: read.php?message={$message}");
} catch (PDOException $e) {
    exit($e->getMessage());
}
