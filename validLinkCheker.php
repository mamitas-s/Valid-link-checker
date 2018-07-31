//テキストファイルを読み込む
$text = file_get_contents("url.txt");

//配列に格納するために改行(\n)ごとに行に分割して余分なスペースを取り除く
$array = explode("\n", $text); 
$array = array_map('trim', $array);


//有効なURLを格納する変数と、無効なURLを格納する変数を準備
$exist_list = [];
$not_exist_list = [];

//配列のなかのURLをひとつずつ見て有効かどうか判定する
foreach($array as $value){

//ヘッダーを取得する
　$header = @get_headers($value);

//ヘッダーの0番目の要素を判定(もし他のステータスもチェックしたかったら分岐を増やしてね）
if($header[0] !== 'HTTP/1.0 404 Not Found'){
 $exist_list[] = $value;
 }else{
 $does_not_exist[] = $value;
 }
}

//print valid link（ファイルにアウトプットしたかったらfile_put_contentsとか使ってね）
var_dump($exist_list);

exit;
