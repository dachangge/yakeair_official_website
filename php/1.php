 <?php
  $phone = $_POST["phone"];
  $customerName = $_POST["customerName"];
  $customerAddress  = $_POST["customerAddress"];
  $raw_success = array('code' => 1, 'msg' => '验证码正确');
  $raw_fail = array('code' => 2, 'msg' => '验证码错误');
  $res_success = json_encode($raw_success,JSON_UNESCAPED_UNICODE);
  $res_fail = json_encode($raw_fail,JSON_UNESCAPED_UNICODE);
  $db = new MySQLi("sql.v172.vhostgo.com","yousouyun","cptefzmb","yousouyun");
  !mysqli_connect_error() or die("连接失败！");
  $sql = "insert into customer_info values(null,'{$phone}','{$customerName}','{$customerAddress}',now());";
  $result = $db->query($sql);
  if($result){
  echo $res_success;
  }
  else{
    echo $res_fail;
  }
  ?>