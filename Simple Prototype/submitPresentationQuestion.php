<?php 

$con=mysqli_connect("steminfo.db.10915569.hostedresource.com","steminfo","Outreach4!","steminfo");
  // Check connection
  if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $myQuery = 'INSERT INTO presentationQuestions(question,wrongAnswerOne,wrongAnswerTwo,wrongAnswerThree,correctAnswer)
  VALUES ("' . $_POST['question'] . '","' . $_POST['wrongAnswerOne'] .'","' . $_POST['wrongAnswerTwo'] .'","' . $_POST['wrongAnswerThree'] .'","' . $_POST['correctAnswer'] .'")';
  mysqli_query($con, $myQuery);
  $myQuery = 'SELECT * FROM presentationQuestions WHERE question = "' . $_POST['question'] . '"';
  $result = mysqli_query($con,$myQuery);
  $row = mysqli_fetch_array($result);
  $myQuery = '
  SELECT * 
FROM  `presentation` 
ORDER BY  `position` DESC 
LIMIT 1
';
  $result = mysqli_query($con,$myQuery);
  $highestPosition = mysqli_fetch_array($result);  
  $value = $highestPosition['position'] + 1;
  $myQuery = 'INSERT INTO presentation(slidetype, questionId,position,moduleId) VALUES("question",' . $row['questionId'] . ',' . $value .',' . $_POST['moduleId'] . ')';
  mysqli_query($con,$myQuery);

?>