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
          <textarea id="message" name="message" id="" cols="50" rows="10"></textarea>
          <!-- 
          <div class="cl">
               <div id="id1">
                    <div class="cl2">
                         Minh
                    </div>
               </div>
          </div> -->

          <!-- <img src="https://icdn.dantri.com.vn/thumb_w/680/2022/12/20/messi219-12-22-1671478315263.jpeg" alt="Noel - 1" title="Hinh-1"> -->
          <!-- <h1 class="name-1">Heading 1</h1>
          <h2>Heading 2</h2>
          <h3>Heading 3</h3>
          <h4>Heading 4</h4>
          <h5>Heading 5</h5>
          <h6>Heading 6</h6>
          Đây là chủ đề về ông già noel
          <b style="color: red;">Bold</b>
          <u style="color: yellow;">Underline</u>
          <i style="color: blue;">Italic </i>
          <s style="color: red;">strikethrough</s> -->
     </div>

     <button style="display: block; margin: 20px;" name="btnAdd">Đăng bài viết</button>
</form>
<?php

function BBcode($text)
{
     $text = preg_replace('/<h1 (.*?)>(.*?)<\/h1>/s', '[b]$2[/b]', $text);
     $text = preg_replace('/<h2 (.*?)>(.*?)<\/h2>/s', '[b]$2[/b]', $text);
     $text = preg_replace('/<h3 (.*?)>(.*?)<\/h3>/s', '[b]$2[/b]', $text);
     $text = preg_replace('/<h4 (.*?)>(.*?)<\/h4>/s', '[b]$2[/b]', $text);
     $text = preg_replace('/<h5 (.*?)>(.*?)<\/h5>/s', '[b]$2[/b]', $text);
     $text = preg_replace('/<h6 (.*?)>(.*?)<\/h6>/s', '[b]$2[/b]', $text);

     $text = preg_replace('/<img .*? src="(.*?)" .*?>/s', '[img]$1[/img]', $text);
     $text = preg_replace('/<div .*?>(.*?)<\/div>/s', '$1', $text);
     $text = preg_replace('/<div .*?>(.*?)<\/div>/s', '$1', $text);
     $text = preg_replace('/<div .*?>(.*?)<\/div>/s', '$1', $text);
     $text = preg_replace('/<div .*?>(.*?)<\/div>/s', '$1', $text);
     $text = preg_replace('/<div .*?>(.*?)<\/div>/s', '$1', $text);
     $text = preg_replace('/<div .*?>(.*?)<\/div>/s', '$1', $text);
     $text = preg_replace('/<div .*?>(.*?)<\/div>/s', '$1', $text);

     $text = preg_replace('/<figure .*?>(.*?)<\/figure>/s', '$1', $text);
     $text = preg_replace('/<figcaption .*?>(.*?)<\/figcaption>/s', '$1', $text);
     $text = preg_replace('/<figcaption>(.*?)<\/figcaption>/s', '$1', $text);

     $text = preg_replace('/<a href="(.*?)">(.*?)<\/a>/s', '[url=$1]$2[/url]', $text);
     $text = preg_replace('/<time .*?>(.*?)<\/time>/s', '$1', $text);

     $text = preg_replace('/<ul .*?>(.*?)<\/ul>/s', '[list]$1[/list]', $text);
     $text = preg_replace('/<li>(.*?)<\/li>/s', '[*]$1', $text);


     $text = preg_replace('/<u .*?">(.*?)<\/u>/s', '[u]$1[/u]', $text);
     $text = preg_replace('/<i .*?">(.*?)<\/i>/s', '[i]$1[/i]', $text);
     $text = preg_replace('/<b .*?">(.*?)<\/b>/s', '[b]$1[/b]', $text);
     $text = preg_replace('/<b>(.*?)<\/b>/s', '[b]$1[/b]', $text);
     $text = preg_replace('/<em>(.*?)<\/em>/s', '[i]$1[/i]', $text);
     $text = preg_replace('/<strong>(.*?)<\/strong>/s', '[b]$1[/b]', $text);
     $text = preg_replace('/<s .*?">(.*?)<\/s>/s', '$1', $text);
     $text = preg_replace('/<span .*?">(.*?)<\/span>/s', '$1', $text);
     $text = preg_replace('/<span>(.*?)<\/span>/s', '$1', $text);
     $text = preg_replace('/<p>(.*?)<\/p>/s', '$1', $text);
     $text = preg_replace('/<a .*?>(.*?)<\/a>/s', '$1', $text);

     $text = preg_replace('/<button .*?">(.*?)<\/button>/s', '$1', $text);

     return $text;
}


if (isset($_POST['btnAdd'])) {


     $title = $_POST['title'];
     $message = $_POST['message'];

     $imgText = BBcode($message);

     //echo print_r($imgText);

     $header = array(
          'XF-Api-Key:' . $email->api_key,
     );


     $post = [
          'node_id'   =>  2,
          'title'     =>  $title,
          'message'   =>  $imgText
     ];

     $url = 'http://xenforo.test:81/api/threads/';
     $ch = curl_init();
     curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
     curl_setopt($ch, CURLOPT_URL, $url);
     curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     $json = curl_exec($ch);
     curl_close($ch);
     $result = json_decode($json);
}
?>