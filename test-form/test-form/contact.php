<?php

// 絶対に本番環境でこのまま利用しないこと！
// ローカル環境で検証するか、検証が終わったらサーバーから削除すること！
// セキュリティ対策は一切行っていません！

mb_language("Japanese");
//↑マルチバイトの言語設定を日本語にします

mb_internal_encoding("UTF-8");
//↑マルチバイトの文字エンコーディングをUTF-8にします

if($_POST) {
  $to = 'info@wish-planning.net';
  //↑このお問い合わせフォームに入力された内容を送る先のメールアドレス。
  //通常は、お問い合わせフォームがあるホームページを管理している人のメールアドレスです。

  $subject = 'お問い合わせがありました';
  //↑送信されるメールの題名です。

  //↓以下は、送信するメールの本文です。1行ずつ$messageに追記する形です。
  // \nは、改行の意味。
  $message = "お問い合わせがありました。\n";
  $message .= "\n";
  $message .= "入力された内容は以下の通りです。\n";
  $message .= "---\n";
  $message .= "\n";
  $message .= "お名前：\n";
  $message .= $_POST["name"]; // name属性がnameの内容が入ります
  $message .= "\n";
  $message .= "メールアドレス:\n";
  $message .= $_POST["email"]; // name属性がemailの内容が入ります
  $message .= "\n";
  $message .= "お問い合わせ本文:\n";
  $message .= $_POST["message"]; // name属性がmessageの内容が入ります

  //↓最後に、設定した内容でメールを送る命令です
  if(mb_send_mail($to,$subject,$message)) {
    echo "メールが送信されました";
  } else {
    echo "メールの送信に失敗しました";
  }
} else {
  echo "HTMLからのPOST送信受信に失敗しました";
}