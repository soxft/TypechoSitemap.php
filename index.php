<html>
    <head>
        <title>sitemap.php - Powered by XCSOFT</title>
<head>
<?php
$conn=mysqli_connect("数据库地址","数据库用户名","数据库密码","数据库名");//typecho数据库信息
$url='https://blog.xsot.cn/archives/'   //你的网址(不能忘记加'/')
?>
    <body background="./assets/img/sitemap-background.png" class="mdui-theme-primary-indigo mdui-theme-accent-pink">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/mdui/0.4.2/css/mdui.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/mdui/0.4.2/js/mdui.min.js"></script>
</head>
            <?php
              $html1="<br /><center><div class=\"mdui-table-fluid\">
                        <table class=\"mdui-table mdui-table-hoverable\">
                            <tr>
                                <th>cid</th>
                                <th>文章名</th>
                                <th>时间</th>
                                <th>地址</th>
                            </tr>";
                            echo $html1;
                $comd="SELECT * FROM `typecho_contents` WHERE type='POST' order by cid DESC";
                $sql=mysqli_query($conn,$comd);//检索数据库信息
                while($row = mysqli_fetch_object($sql)){
    echo("
      <tr>
        <td>$row->cid</td>
        <td>$row->title</td>
        <td>" . date('Y-m-d',$row->modified) . "</td>
        <td><a href=\"$url$row->slug.html\" class=\"mdui-btn mdui-btn-raised mdui-ripple\">打开</a></td>
      </tr>");
}
            echo("</table></div>");
        ?>
    </body>
</html>