<?php

// $header = array(
//      'XF-Api-Key:k9tX1_SvODePaNNMDmvF2_4nthEZTxj_',
// );

// $user = [
//      'username' => 'userha',
//      'email' => 'userha@gmail.com',
//      'password' => 'userha'
// ];

// $url = "http://xenforo.test:81/api/users/";
// $ch = curl_init();
// curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
// curl_setopt($ch, CURLOPT_URL, $url);
// curl_setopt($ch, CURLOPT_POSTFIELDS, $user);
// curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// $json = curl_exec($ch);
// curl_close($ch);
// $result = json_decode($json);

// echo print_r($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Tạo email</title>
</head>

<body>
     <div>Random Email</div>
     <?php
     function stripVN($str)
     {
          $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ|å)/", 'a', $str);
          $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
          $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
          $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ|ö)/", 'o', $str);
          $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
          $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
          $str = preg_replace("/(đ)/", 'd', $str);

          $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
          $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
          $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
          $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
          $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
          $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
          $str = preg_replace("/(Đ)/", 'D', $str);
          return $str;
     }
     ?>
     <form action="" method="post">
          <button name="btnRand">Random</button>
     </form>
</body>

</html>

<?php
global $wpdb;
if (isset($_POST['btnRand'])) {
?>
     <form action="" method="post">
          <table border="1">
               <thead>
                    <tr>
                         <td>First name</td>
                         <td>Last name</td>
                         <td>Full name</td>
                         <td>Email</td>
                    </tr>
               </thead>
               <tbody>
                    <?php
                    global $wpdb;
                    $tabel = $wpdb->prefix . "info_user";
                    $listuser = $wpdb->get_results("SELECT * FROM $tabel order by rand() limit 1");
                    foreach ($listuser as $user) { ?>
                         <tr>
                              <td> <input name="first_name" value="<?= $user->first_name ?>"> </td>
                              <td><?= $user->last_name ?></td>
                              <td><?= $user->full_name ?></td>
                              <?php
                              $date = date("Y-m-d");
                              $birth = str_replace('-', '', $date);
                              $names = stripVN($user->full_name);
                              $name = strtolower($names);
                              $email_name = str_replace(' ', '', $name);
                              // $tail_email  =  array("@gmai.com", "@outlook.com", "@icloud.com", "@zoho.com", "@yahoo.com", "@mail.com", "@hotmail.com");
                              // $rand_email = Array_rand($tail_email);
                              $email = $email_name . $birth . '@gmail.com';
                              ?>
                              <td> <input name="email" value="<?= $email ?>"> </td>
                         </tr>
                    <?php }
                    ?>
               </tbody>
          </table>
          <button name="btnCreate">Tạo user Xenforo</button>
     </form>
<?php
}
?>

<!-- Tao user Xenforo -->

<?php
if (isset($_POST['btnCreate'])) {
     global $wpdb;
     $tabel = $wpdb->prefix . "info_email";

     $name = $_POST['first_name'];
     $email = $_POST['email'];

     $header = array(
          'XF-Api-Key:k9tX1_SvODePaNNMDmvF2_4nthEZTxj_',
     );

     $user = [
          'username' => $name,
          'email' => $email,
          'password' => 123123
     ];

     $url = "http://xenforo.test:81/api/users/";
     $ch = curl_init();
     curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
     curl_setopt($ch, CURLOPT_URL, $url);
     curl_setopt($ch, CURLOPT_POSTFIELDS, $user);
     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     $json = curl_exec($ch);
     curl_close($ch);
     $result = json_decode($json);

     $sqlAdd = $wpdb->insert($tabel, array("name" => $name, "email" => $email));
     $wpdb->query($wpdb->prepare($sqlAdd));
     if ($sqlAdd == true) {
          echo "<script> alert('Them thanh cong')</script>";
     } else {
          echo "<script> alert('Them that bai')</script>";
     }
}
?>