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
    <h2>삭제 결과</h2>
    <ul>
        <?php
        $conn = mysqli_connect("localhost", "root", "123456", "abc_corp");
        if (!$conn) {
            echo 'DB에 연결하지 못했습니다.' . mysqli_connect_error();
        } else {
            echo 'DB에 접속했습니다.';
        }
        // table = msg_board에서 글 조회
        // SELECT*FROM 테이블명
        //  $user_skey = $_POST['skey'];
        $user_delnum = $_POST['delnum'];
        $sqlDEL = "DELETE FROM msg_board WHERE number=$user_delnum";
        mysqli_query($conn, $sqlDEL);

        $sql = "SELECT*FROM msg_board";
        $result = mysqli_query($conn, $sql);
        $list = '';
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
        while ($row = mysqli_fetch_array($result)) {
            $list = $list . "<li>{$row['number']}: <a href=\"view.php?number={$row['number']}\">{$row['name']}</a></li>";
            # code...
        }
        echo $list;
        mysqli_close($conn);
        ?>
    </ul>
    <p>
        <?php
        echo $user_delnum . '번째 데이터가 삭제되었습니다.';
        ?> </p>
    <p><a href="index.php">메인화면으로 돌아가기</a></p>

</body>

</html>