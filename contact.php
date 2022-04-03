<?php
session_start();

if(!empty($_POST)){
  if($_POST['nameSei']==''){
    $error['nameSei']='blank';
  }
  if($_POST['nameMei']==''){
    $error['nameMei']='blank';
  }
  if($_POST['address1']==''){
    $error['address1']='blank';
  }
  $address1=strval($_POST['address1']);
  if(strlen($address1) != 7){
    $error['address1']='length';
  }

  if($_POST['address2']==''){
    $error['address2']='blank';
  }
  if($_POST['phone']==''){
    $error['phone']='blank';
  }

  if(empty($error)){
  $_SESSION['join']=$_POST;
  header('Location:questionForm.php');
  exit();
  }
}

?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>【練習】問い合わせフォーム</title>
  </head>
  <body>
    <p><お問い合わせフォーム></p>
    <form action="" method="post">
      <dl>
        <dt>お名前</dt>
        <dd>
          【必須】姓:<input type="text", name="nameSei" size="7">
          <?php if(isset($error['nameSei']) && $error['nameSei'] == 'blank'): ?>
            <label>姓を入力してください</label><br>
          <?php endif; ?>
          【必須】名:<input type="text", name="nameMei" size="7">
          <?php if(isset($error['nameMei']) && $error['nameMei'] == 'blank'): ?>
            <label>名を入力してください</label>
          <?php endif; ?>
        </dd>
        <dt>性別</dt>
        <dd>
          <input type="radio" name="gender" value="男性" checked>男性
          <input type="radio" name="gender" value="女性">女性
        </dd>
        <dt>生年月日</dt>
        <dd>
          <select name="year">
            <?php
            $now = date("Y");
            for($i=1900; $i<=$now; $i++): ?>
            <option value="<?php echo $i;?>"><?php echo $i;?></option>
            <?php endfor;?>
          </select>年
          <select name="month">
            <?php
            $now = date("m");
            for($i=1; $i<=12; $i++): ?>
            <option value="<?php echo $i;?>"><?php echo $i;?></option>
            <?php endfor;?>
          </select>月
          <select name="day">
            <?php
            $now = date("d");
            for($i=1; $i<=31; $i++): ?>
            <option value="<?php echo $i;?>"><?php echo $i;?></option>
            <?php endfor;?>
          </select>日
        </dd>
        <dt>〒郵便番号【必須】</dt>
        <dd>
          <input type="text" name="address1">
          <?php if(isset($error['address1']) && $error['address1'] == 'blank'):?>
          <label>郵便番号を入力してください</label>
          <?php endif; ?>
          <?php if(isset($error['address1']) && $error['address1'] == 'length'):?>
          <label>郵便番号を7桁入力してください</label>
          <?php endif; ?>
        </dd>
        <dt>住所【必須】</dt>
        <dd>
          <input type="text" name="address2">
          <?php if(isset($error['address2']) && $error['address2'] == 'blank'):?>
           <label>住所を入力してください</label>
          <?php endif; ?>
        </dd>
        <dt>電話番号【必須】</dt>
        <dd>
          <input type="text" name="phone">
          <?php if(isset($error['phone']) && $error['phone'] == 'blank'):?>
            <label>電話番号を入力してください</label>
          <?php endif; ?>
        </dd>
        <dt>メールアドレス【任意】</dt>
        <dd>
          <input type="text" name="email">
        </dd>
        <dt>お問い合わせ内容</dt>
        <dd>
          <textarea name="question" rows="10" cols="50"></textarea>
        </dd>
      </dl>
      <input type="submit" value="送信">
    </form>
  </body>
</html>