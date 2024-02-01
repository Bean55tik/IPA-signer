<!doctype html>
<html>
  <head>
    <title>IPA-signer test</title>
    <meta charset="utf-8">
  </head>
  <body>
    <form action="sign.php" method="post" enctype="multipart/form-data">
      <input type="file" name="ipa" id="ipa" accept=".ipa" required>
      <input type="file" name="p12" id="p12" accept=".p12" required>
      <input type="file" name="mobile" id="mobile" accept=".mobileprovision" required>
      <input type="password" name="pass" placeholder="password" required>
      <input type="submit" value="SIGN">
    </form>
  </body>
</html>