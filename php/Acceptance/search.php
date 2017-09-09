<?php require 'require/header.php';?>

<?php
/*この画面は、検索画面です。
ユーザ名とパスワードが一致しないと、検索画面は表示されません。

新しくユーザーを追加したい場合は、user_Mにユーザーを追加してください。


*/

$name = null;
if (isset($_POST['name'])) $name = htmlspecialchars($_POST['name']);

$password = null;
if (isset($_POST['password'])) $password = htmlspecialchars($_POST['password']);
/*PDO*/
require 'require/pdo.php';

unset ($_SESSION['user_M']);

//ログイン処理
$sql = $pdo -> prepare('select * from user_M where name = ? and password = ?');
$sql -> execute([$name,$password]);

foreach($sql -> fetchAll() as $row ) {
  $_SESSION['user_M'] = [
    'id' => $row['id'],
    'name' => $row['name'],
    'password' => $row['password']
  ];
}

  if(isset($_SESSION['user_M'])){
    //最上段
    echo '<div class="stage">';
    echo '<div class="stage_inner">';
      echo '<div class="box nameline">';
        echo 'ようこそ',$_SESSION['user_M']['name'],'さん';
      echo '</div>';
    //最上段
  echo '<form class="" action="main.php" method="post">';
    echo '<table class="search_table">';
      echo '<tr>';
        echo '<td>ID</td><td><input class="id_input" type="text" name="id"></td>';
      echo '<td>店舗名</td><td><input class="name_input" type="text" name="name"></td>';
        echo '<td colspan="2" align="center"><input type="submit" class="submit" value="検索"></td>';
      echo '</tr>';
    echo '</table>';
  echo '</form>';
  echo '</div>';
echo '</div>';


  }

  else{
    echo 'ダメです';
  }

 ?>

<?php require 'require/footer.php'; ?>
