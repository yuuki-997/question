<?php
// ファイルを開いてデータを読み込み
$file = fopen('data/data.txt', 'r'); // ファイルを開く

// 地域別カウントの初期化
$region_counts = [
    "日本国内" => 0,
    "アジア" => 0,
    "アフリカ" => 0,
    "ヨーロッパ" => 0,
    "北アメリカ" => 0,
    "南アメリカ" => 0,
    "オセアニア" => 0
];


echo '<table border="1">';
echo '<tr>';
echo '<th>回答日時</th>';
echo '<th>ニックネーム</th>';
echo '<th>EMAIL</th>';
echo '<th>おすすめの旅先(地域)</th>';
echo '<th>おすすめの旅先(詳細)</th>';
echo '<th>理由</th>';
echo '</tr>';

// ファイル内容を1行ずつ読み込んで出力
while ($str = fgets($file)) {
    $data = explode(',', $str);
    echo '<tr>';
    echo '<td>' . htmlspecialchars($data[0]) . '</td>';
    echo '<td>' . htmlspecialchars($data[1]) . '</td>';
    echo '<td>' . htmlspecialchars($data[2]) . '</td>';
    echo '<td>' . htmlspecialchars($data[3]) . '</td>';
    echo '<td>' . htmlspecialchars($data[4]) . '</td>';
    echo '<td>' . htmlspecialchars($data[5]) . '</td>';
    echo '</tr>';
    
    // 地域別のカウントを増やす
    $region = trim($data[3]);
    if (isset($region_counts[$region])) {
        $region_counts[$region]++;
    }
}
echo '</table>';
fclose($file); // ファイルを閉じる

// PHPの配列をJavaScriptの変数に変換
echo '<script type="text/javascript">';
echo 'var regionData = ' . json_encode($region_counts) . ';';
echo '</script>';
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>アンケート結果とグラフ表示</title>
<!-- Google Chartsのロード -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
// Google Chartsの読み込み
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
  // グラフデータの準備
  var data = google.visualization.arrayToDataTable([
    ['地域', 'カウント'],
    ['日本国内', regionData['日本国内']],
    ['アジア', regionData['アジア']],
    ['アフリカ', regionData['アフリカ']],
    ['ヨーロッパ', regionData['ヨーロッパ']],
    ['北アメリカ', regionData['北アメリカ']],
    ['南アメリカ', regionData['南アメリカ']],
    ['オセアニア', regionData['オセアニア']]
  ]);

  // グラフのオプション
  var options = {
    title: 'おすすめの旅先 (地域)',
    is3D: true,
    width: 500,
    height: 300
  };

  // グラフを描画する
  var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
  chart.draw(data, options);
}
</script>
</head>
<body>

<!-- グラフを表示する要素 -->
<div id="chart_div"></div>

<ul>
<li><a href="./post.php">アンケートに答える</a></li>
</ul>
</body>
</html>
