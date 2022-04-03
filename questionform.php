<?php
session_start();
require('dbconnect.php');

if(!isset($_SESSION['join'])){
  header('Location:index.php');
  exit();
}

if(!empty($_POST)){
  $statement=$db->prepare('INSERT INTO question_form SET
     nameSei=?,
     nameMei=?,
     gender=?,
     year=?,
     address1=?,
     address2=?,
     phone=?,
     email=?,
     question=?,
     created=NOW()
     ');
  echo $ret=$statement->execute(array(
    $_SESSION['join']['nameSei'],
    $_SESSION['join']['nameMei'],
    $_SESSION['join']['gender'],
    $_SESSION['join']['year'],
    $_SESSION['join']['address1'],
    $_SESSION['join']['address2'],
    $_SESSION['join']['phone'],
    $_SESSION['join']['email'],
    $_SESSION['join']['question']
  ));
  unset($_SESSION['join']);
  header('Location: Receive.php');
  exit();
}

?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>【練習】問い合わせフォーム</title>
  </head>
  <body>
    <p>【確認】お問い合わせ内容</p>
    <form action="" method="post">
      <input type="hidden" name="action" value="submit">
       <dl>
        <dt>お名前</dt>
        <dd>
          姓:<?php echo htmlspecialchars($_SESSION['join']['nameSei'], ENT_QUOTES);?><br>
          名:<?php echo htmlspecialchars($_SESSION['join']['nameMei'], ENT_QUOTES);?>
        </dd>
        <dt>性別</dt>
        <dd>
          <?php echo htmlspecialchars($_SESSION['join']['gender'], ENT_QUOTES);?>
        </dd>
        <dt>生年月日</dt>
        <dd>
          <?php echo htmlspecialchars($_SESSION['join']['year'], ENT_QUOTES);?>年
          <?php echo htmlspecialchars($_SESSION['join']['month'], ENT_QUOTES);?>月
          <?php echo htmlspecialchars($_SESSION['join']['day'], ENT_QUOTES);?>日
        </dd>
        <dt>〒郵便番号</dt>
        <dd>
          <?php echo htmlspecialchars($_SESSION['join']['address1'], ENT_QUOTES);?>
        </dd>
        <dt>住所</dt>
        <dd>
          <?php echo htmlspecialchars($_SESSION['join']['address2'], ENT_QUOTES);?>
        </dd>
        <dt>電話番号</dt>
        <dd>
          <?php echo htmlspecialchars($_SESSION['join']['phone'], ENT_QUOTES);?>
        </dd>
        <dt>メールアドレス</dt>
        <dd>
          <?php if($_SESSION['join']['email'] == ''):?>
          <label>未入力</label>
          <?php endif; ?>
          <?php echo htmlspecialchars($_SESSION['join']['email'], ENT_QUOTES);?>
        </dd>
        <dt>お問い合わせ内容</dt>
        <dd>
          <?php echo htmlspecialchars($_SESSION['join']['question']); ?>
        </dd>
      </dl>
      <input type="submit" value="登録する" >
    </form>
  </body>
</html>