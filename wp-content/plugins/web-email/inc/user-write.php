

<div>Random user tạo bài biết</div>

<form action="" method="post">
     <button name="btnUser">User ngẫu nhiên</button>
</form>

<?php
global $wpdb;
$tabel = $wpdb->prefix . "info_email";
$listemail = $wpdb->get_results("SELECT * FROM $tabel order by rand() limit 1");

foreach ($listemail as $email) { ?>
     <div>Tên: <?= $email->name ?></div>
     <div>Email: <?= $email->email ?></div>
     <div>Api_key: <?= $email->api_key ?></div>
<?php
}
?>
<form action="" method="POST" enctype="multipart/form-data">
     <div>
          <label for="">Tiêu đề bài viết</label>
          <input type="text" name="title" placeholder="Tiêu đề bài viết" />
     </div>

     <div style="display: inline-grid;">
          <label for="">Nội dung bài viết</label>
          <input type="file" name="massage" id="massage">
          <textarea id="message" name="message" id="" cols="50" rows="10"></textarea>
          <!-- <h1>Hình ảnh </h1>
          <p>Đây là chủ đề về ông già noel</p>
          <img src="https://i.imgur.com/S5XdRSh.jpeg" alt=""> -->
     </div>

     <button style="display: block; margin: 20px;" name="btnAdd">Đăng bài viết</button>
</form>
<?php
if (isset($_POST['btnAdd'])) {


     $title = $_POST['title'];
     $message = $_POST['message'];

     echo print_r($message);

     $header = array(
          'XF-Api-Key:' . $email->api_key,
     );


     $post = [
          'node_id'   =>  2,
          'title'     =>  $title,
          'message'   =>  $message
     ];
     echo print_r($post);
     // $url = 'http://xenforo.test:81/api/threads/';
     // $ch = curl_init();
     // curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
     // curl_setopt($ch, CURLOPT_URL, $url);
     // curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
     // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
     // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     // $json = curl_exec($ch);
     // curl_close($ch);
     // $result = json_decode($json);
}
?>
<script>
     CKEDITOR.replace('message');
</script>