 <?php
    $conn = mysqli_connect("localhost", "root", "123456", "abc_corp");
    if (!$conn) {
        echo 'db에 연결하지 못했습니다.' . mysqli_connect_error();
    } else {
        echo 'db에 접속했습니다.';
    }
    // table = msg_board에서 글 조회
    // SELECT*FROM 테이블명
    $view_num=$_GET['number'];
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
   //     $list = $list . "<li>{$row['number']}: <a href=\"view.php?number={$row['number']}\">{$row['name']}</a></li>";
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
     <title>나의 DB 글쓰기, 검색, 업데이트, 삭제 view - 나의 DB 메모</title>
 </head>

 <body>
     <h1>게시판</h1>
     <h2>글 내용</h2>
     <?php
     if($row=mysqli_fetch_array($result))
     {
      ?>
      <h3>글번호 : <?= $row['number']?> / 글쓴이 : <?= $row['name']?></h3>
      <div>
        <?= $row['message'] ?>

      </div>
      <?php } 
      mysqli_close($conn);
      ?>
      <p><a href="index.php">메인화면으로 돌아가기</a></p>
      <p><a href="update.php?number=<?= $row['number']?>">수정하기</a></p>
 </body>

 </html>