 <?php
    $conn = mysqli_connect("localhost", "root", "123456", "abc_corp");
    if (!$conn) {
        echo 'DB에 연결하지 못했습니다.' . mysqli_connect_error();
    } else {
        echo 'DB에 접속했습니다.';
    }
    // table = msg_board에서 글 조회
    // SELECT*FROM 테이블명
    $view_num = $_GET['number'];
    $sql = "SELECT*FROM msg_board WHERE number=$view_num";
    $result = mysqli_query($conn, $sql);
    // $list = '';
    // echo 값을 그대로 출력
    // print 값을 그대로 출력
    // print_r 배열, 객체 모양을 그대로 출력
    // var_dump = print_r 상세하게
    // echo $result;
    // print $result;
    // print_r($result);
    // var_dump($result);
    // echo 'test'
    /*
    list
    var i=0;
    while(i<=list.length) {반복할 일}
    $row 배열
    var list=''
    list=list+'<li>...</li>'
    */
    // foreach
    //  while ($row = mysqli_fetch_array($result)) {
 //   $list = $list . "<li>{$row['number']}: <a href=\"view.php?number={$row['number']}\">{$row['name']}</a></li>";
    # code...
    //  }
    //  echo $list;
    ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>글수정</title>
 </head>

 <body>
     <h1>수정하기</h1>
     <?php
     if($row=mysqli_fetch_array($result))
     {
?>
     <form action="insert_update.php" method="post">
         <input type="hidden" name="number" value="<?=$view_num?>">
         <p>
             <label for="name">이름:</label>
             <input type="text" id="name" name="name" value="<?=$row['name']?>">
         </p>
         <P>
             <label for="message">메시지 : </label>
             <textarea name="message" id="message" cols="30" rows="10"><?=$row['message']?></textarea>
         </P>
         <input type="submit" value="글쓰기">
     </form>
<?php } 
mysqli_close($conn);
?>
 </body>

 </html>