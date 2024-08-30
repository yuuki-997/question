<html>
<head>
<meta charset="utf-8">
<title>おすすめの旅先アンケート</title>
<style>
  /* ページ全体のスタイル */
  body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
  }

  /* フォーム全体のスタイル */
  form {
    display: flex;
    flex-direction: column;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  /* 各入力グループのスタイル */
  .form-group {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    margin-bottom: 15px;
  }

  /* ラベルのスタイル */
  label {
    width: 160px; 
    text-align: right; 
    margin-right: 10px; 
  }

  /* 入力フィールドのスタイル */
  input[type="text"],
  select {
    flex: 1;
    max-width: 200px;
  }

  /* 送信ボタンのスタイル */
  input[type="submit"] {
    margin-top: 20px;
    width: 100%; 
  }
</style>
</head>
<body>
  <form action="write.php" method="post">
    <h1>おすすめの旅先を教えてください🐶</h1>
    <div class="form-group">
      <label for="name">ニックネーム:</label>
      <input type="text" id="name" name="name" required>
    </div>
    <div class="form-group">
      <label for="mail">EMAIL:</label>
      <input type="text" id="mail" name="mail" required>
    </div>
    <div class="form-group">
      <label for="destination">おすすめの旅先<br>(地域):</label>
      <select id="destination" name="destination" required>
        <option value="日本国内">日本国内</option>
        <option value="アジア">アジア</option>
        <option value="アフリカ">アフリカ</option>
        <option value="ヨーロッパ">ヨーロッパ</option>
        <option value="北アメリカ">北アメリカ</option>
        <option value="南アメリカ">南アメリカ</option>
        <option value="オセアニア">オセアニア</option>
      </select>
    </div>
    <div class="form-group">
      <label for="destinationplus">おすすめの旅先<br>(詳細):</label>
      <input type="text" id="destinationplus" name="destinationplus" required>
    </div>
    <div class="form-group">
      <label for="reason">理由:</label>
      <input type="text" id="reason" name="reason" required>
    </div>
    <input type="submit" value="送信">
  </form>
</body>
</html>
