<?php require 'require/header.php'; ?>

<?php

/*この画面では、店の検索、店へのコメントが可能です

$name = "店の名前"
$id = "店のID"

$shop_comment = POSTで送られてきた追加するコメント
$shop_comments = データベースから取得したコメント

コメントを追加するテーブルはSwichで振り分けている。
新しく店舗を追加したい場合は、shop_Mに店舗を追加。
店舗コメント用のデータベースを追加。(comments_id_X)
ソースにスイッチしテーブルを追加する。


*/




$name = null;
if (isset($_POST['name'])) $name = htmlspecialchars($_POST['name']);
$id = null;
if (isset($_POST['id'])) $id = htmlspecialchars($_POST['id']);


require 'require/pdo.php';


//クエリ ショップに繋ぐ
$sql = $pdo -> prepare('select * from shop_M where id = ?');
$sql -> execute([$id]);

//IDで検索
foreach ($sql -> fetchAll() as $row) {
  $shop_M =[
    'id' => $row['id'],
    'name' => $row['name'],
    'address' => $row['address'],
    'tel' => $row['tel']
  ];
}
//名前で検索
if(!isset($shop_M)){
  //クエリ ショップに繋ぐ
  $sql = $pdo -> prepare('select * from shop_M where name = ?');
  $sql -> execute([$name]);

  //ショップ情報を取得
  foreach ($sql -> fetchAll() as $row) {
    $shop_M =[
      'id' => $row['id'],
      'name' => $row['name'],
      'address' => $row['address'],
      'tel' => $row['tel']
    ];
  }
}


//クエリ コメントを追加
$shop_comment = null;
if(isset($_POST['shop_comment'])) {
  $shop_comment = htmlspecialchars($_POST['shop_comment']);
//データベース振り分け
  switch ($id) {
      case '1':
      $sql = $pdo -> prepare('insert into comments_id_1 values(null,?)');
      break;

      case '2':
      $sql = $pdo -> prepare('insert into comments_id_2 values(null,?)');
      break;

      case '3':
      $sql = $pdo -> prepare('insert into comments_id_3 values(null,?)');
      break;

      case '4':
      $sql = $pdo -> prepare('insert into comments_id_4 values(null,?)');
      break;

      case '5':
      $sql = $pdo -> prepare('insert into comments_id_5 values(null,?)');
      break;

      case '6':
      $sql = $pdo -> prepare('insert into comments_id_6 values(null,?)');
      break;

      case '7':
      $sql = $pdo -> prepare('insert into comments_id_7 values(null,?)');
      break;

      case '8':
      $sql = $pdo -> prepare('insert into comments_id_8 values(null,?)');
        break;

      case '9':
      $sql = $pdo -> prepare('insert into comments_id_9 values(null,?)');
      break;

      case '10':
      $sql = $pdo -> prepare('insert into comments_id_10 values(null,?)');
      break;

  }
  $sql -> execute([$shop_comment]);
}


//クエリ コメントに繋ぐ
//データベース振り分け
switch ($id) {
  case '1':
  $sql = $pdo -> prepare('select com from comments_id_1;');
  break;

  case '2':
  $sql = $pdo -> prepare('select com from comments_id_2;');
  break;

  case '3':
  $sql = $pdo -> prepare('select com from comments_id_3;');
  break;

  case '4':
  $sql = $pdo -> prepare('select com from comments_id_4;');
  break;

  case '5':
  $sql = $pdo -> prepare('select com from comments_id_5;');
  break;

  case '6':
  $sql = $pdo -> prepare('select com from comments_id_6;');
  break;

  case '7':
  $sql = $pdo -> prepare('select com from comments_id_7;');
  break;

  case '8':
  $sql = $pdo -> prepare('select com from comments_id_8;');
    break;

  case '9':
  $sql = $pdo -> prepare('select com from comments_id_9;');
  break;

  case '10':
  $sql = $pdo -> prepare('select com from comments_id_10;');
  break;
}

//$sql = $pdo -> prepare('select com from comments_id_1;');
$sql -> execute([$id]);

//コメントを取得
$shop_comments = array();
foreach ($sql -> fetchAll() as $row) {
  $shop_comments[] = $row['com'];
}

$shop_comments = array_reverse($shop_comments)

?>

<div class="stage">
  <div class="mainbox center">
  <div class="namehead">
  <?php
  echo $_SESSION['user_M']['name'],'さん';
   ?>
 </div>
 <div class="shopinfo">
   <form action="main.php" method="post">


   <div class="box">
     <?php echo '<input type="text" name="id" value=',$shop_M['id'],'>'; ?>
     <?php echo '<input type="text" name="name" value=',$shop_M['name'],'>'; ?>
     <input type="submit" value="検索"><br>
   </div>
   <div class="box">
    <span class="outputarea"> 住所：<?php echo $shop_M['address']; ?></span>
    <span class="outputarea"> 電話番号：<?php echo $shop_M['tel']; ?></span>
  </div>

 </form>




 </div>


<form action ="main.php" method="post">
<input type="text" name="shop_comment" class="w620">
<input type="submit"  value="コメントを送信">
<?php echo '<input type="hidden" name="id" value=',$shop_M['id'],'>'; ?>
<?php echo '<input type="hidden" name="name" value=',$shop_M['name'],'>'; ?>
</form>
<div class="box w620 h200 over-s">
  <?php
    foreach ($shop_comments as $value) {
      echo $value,'<hr>';
    }
    ?>
</div>
</div>
</div>
<?php  require 'require/footer.php'; ?>
