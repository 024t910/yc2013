<?php

//MySQLにログインするための情報を入力
$dbc=mysql_connect("localhost","user","password") or die("MySQL接続失敗: ".mysql_error());

$db_selected=mysql_select_db("yc2013",$dbc);
if(!$db_selected){
	die('データベース選択失敗: '.mysql_error());
}
mysql_query("set names utf8");


$sql="SELECT * FROM l_locate  WHERE id = (SELECT MAX(id) FROM l_locate)";
$res=mysql_query($sql,$dbc) or die("クエリ失敗: ".mysql_error());
$l_locate_row = mysql_fetch_assoc($res);

$sql="SELECT * FROM r_locate  WHERE id = (SELECT MAX(id) FROM r_locate)";
$res=mysql_query($sql,$dbc) or die("クエリ失敗: ".mysql_error());
$r_locate_row = mysql_fetch_assoc($res);

$sql="SELECT * FROM l_ss  WHERE id = (SELECT MAX(id) FROM l_ss)";
$res=mysql_query($sql,$dbc) or die("クエリ失敗: ".mysql_error());
$l_ss_row = mysql_fetch_assoc($res);

$sql="SELECT * FROM r_ss  WHERE id = (SELECT MAX(id) FROM r_ss)";
$res=mysql_query($sql,$dbc) or die("クエリ失敗: ".mysql_error());
$r_ss_row = mysql_fetch_assoc($res);

$sql="SELECT * FROM l_bw  WHERE id = (SELECT MAX(id) FROM l_bw)";
$res=mysql_query($sql,$dbc) or die("クエリ失敗: ".mysql_error());
$l_bw_row = mysql_fetch_assoc($res);

$sql="SELECT * FROM r_bw  WHERE id = (SELECT MAX(id) FROM r_bw)";
$res=mysql_query($sql,$dbc) or die("クエリ失敗: ".mysql_error());
$r_bw_row = mysql_fetch_assoc($res);



$date = date("YmdGis");

$str = '<div id="mainarea">
<section>
    <div class="centering">
        <h1>'.date('Y/m/d G:i:s').'</h1>
        <h2>Screen Shot</h2>
            <div class="left ss">
            <img src="'.$l_ss_row['image_path'].'"/>
            </div>
            <div class="right ss">
            <img src="'.$r_ss_row['image_path'].'"/>
            </div>
            <h2>Brain Wave<br>
                <small><span class="attention">□attention</span> <span class="meditation">■meditation</span> <span class="delta">-delta</span> <span class="theta">-theta</span> <span class="lowAlpha">-lowAlpha</span> <span class="highAlpha">-highAlpha</span> <span class="lowBeta">-lowBeta</span> <span class="highBeta">-highBeta</span> <span class="lowGamma">-lowGamma</span> <span class="highGamma">-highGamma</span></small>
			</h2>
            <div class="left bw">
            <canvas width="490" height="276" id="leftcanvas_'.$l_bw_row["id"].'"/>
            </div>
            <div class="right bw">
            <canvas width="490" height="276" id="rightcanvas_'.$r_bw_row["id"].'"/>
            </div>
        <h2>GPS</h2>
            <div class="left gps">
            <iframe width="490" height="276" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.jp/maps?hl=ja&amp;ie=UTF8&amp;t=h&amp;q=loc:'.$l_locate_row['latitude'].','.$l_locate_row['longtitude'].'&amp;ll='.$l_locate_row['latitude'].','.$l_locate_row['longtitude'].'&amp;z=17&amp;om=0&amp;output=embed&amp;iwloc=J"></iframe>
	    </div>
            <div class="right gps">
            <iframe width="490" height="276" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.jp/maps?hl=ja&amp;ie=UTF8&amp;t=h&amp;q=loc:'.$r_locate_row['latitude'].','.$r_locate_row['longtitude'].'&amp;ll='.$r_locate_row['latitude'].','.$r_locate_row['longtitude'].'&amp;z=17&amp;om=0&amp;output=embed&amp;iwloc=J"></iframe>
		            </div>
    </div>
</section>
</div>';


$last_f = fopen($date.".html", 'w');
fwrite($last_f, $str);
fclose($last_f); 

$main_f = fopen("main.html", 'w');
fwrite($main_f, $str);
fclose($main_f); 

$js_str =  '$.get("./'.$l_bw_row["csv"].'",function(data){
				drawGraph("leftcanvas_'.$l_bw_row["id"].'",data);
			});
			$.get("./'.$r_bw_row["csv"].'",function(data){
				drawGraph("rightcanvas_'.$r_bw_row["id"].'",data);
			});';
$last_js = fopen("js/".$date.".js", 'w');
fwrite($last_js, $js_str);
fclose($last_js); 

$main_js = fopen("js/main.js", 'w');
fwrite($main_js, $js_str);
fclose($main_js); 
			
 


$sql="INSERT INTO yc_master (html_path,js_path,l_locate_id,r_locate_id,l_ss_id,r_ss_id,l_bw_id,r_bw_id) VALUES ('".$date.".html','js/".$date.".js',".$l_locate_row['id'].",".$r_locate_row['id'].",".$l_ss_row['id'].",".$r_ss_row['id'].",0,0);";
 
$res=mysql_query($sql,$dbc) or die("クエリ失敗: ".mysql_error());
echo $sql;


?>