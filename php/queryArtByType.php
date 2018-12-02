<?php

//分页的函数
function news($pageNum = 1, $pageSize = 3, $type = 1)
{
    $array = array();
    $coon = mysqli_connect("sql.v172.vhostgo.com", "yousouyun","cptefzmb");
    mysqli_select_db($coon, "yousouyun");
    mysqli_set_charset($coon, "utf8");
    // limit为约束显示多少条信息，后面有两个参数，第一个为从第几个开始，第二个为长度
    $rs = "select * from yake_art_info where art_type =" . $type . " ORDER BY create_time desc limit " . (($pageNum - 1) * $pageSize) . "," . $pageSize;
    $r = mysqli_query($coon, $rs);
    while ($obj = mysqli_fetch_object($r)) {
        $array[] = $obj;
    }
    mysqli_close($coon);
    return $array;
}

//显示总页数的函数
function allNews($type = 1)
{
    $coon = mysqli_connect("sql.v172.vhostgo.com", "yousouyun","cptefzmb");
    mysqli_select_db($coon, "yousouyun");
    mysqli_set_charset($coon, "utf8");
    $rs = "select count(*) num from yake_art_info where art_type =" . $type; //可以显示出总页数
    $r = mysqli_query($coon, $rs);
    $obj = mysqli_fetch_object($r);
    mysqli_close($coon);
    return $obj->num;
}

    $type = $_POST["type"];
    $allNum = allNews($type);
    $pageSize = 3; //约定没页显示几条信息
    $pageNum = empty($_GET["pageNum"])?1:$_GET["pageNum"];
    $endPage = ceil($allNum/$pageSize); //总页数
    $array = news($pageNum,$pageSize,$type);
    $res = array('code' => 1, 'msg' => array('count'=> $allNum,'list' => $array));
    echo json_encode($res,JSON_UNESCAPED_UNICODE);
    ?>