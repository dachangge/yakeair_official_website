<?php
    $art_id = $_POST["art_id"];
    $coon = mysqli_connect("sql.v172.vhostgo.com", "yousouyun","cptefzmb");
    mysqli_select_db($coon, "yousouyun");
    mysqli_set_charset($coon, "utf8");
    // limit为约束显示多少条信息，后面有两个参数，第一个为从第几个开始，第二个为长度
    $rs = "select * from yake_art_info where art_id = " . $art_id;
    $r = mysqli_query($coon, $rs);
    $obj = mysqli_fetch_object($r);
    mysqli_close($coon);
    $res = array('code' => 1, 'msg' => $obj);
    echo json_encode($res,JSON_UNESCAPED_UNICODE);
    ?>