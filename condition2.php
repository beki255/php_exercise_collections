<!-- <?php
    $score=$_POST["score"];
    if($score>=90 & $score <=100){
        echo "your grade is : A+";
    }else if($score>=85){
        echo "your grade is : A";
    }else if($score>=80){
        echo "your grade is : A-";
    }else if($score>=75){
        echo "your grade is : B+";
    }else if($score>=70){
        echo "your grade is : B";
    }else if($score>=65){
        echo "your grade is : B-";
    }else if($score>=60){
        echo "your grade is : C+";
    }else if($score>=50){
        echo "your grade is : C";
    }else if($score>=45){
        echo "your grade is : C-";
    }else if($score>=40){
        echo "your grade is : D";
    }else{
        echo "you are fail";
    }
?> -->
<!-- <?php
  $day=$_POST["daynumber"];
  switch($day){
    case "1":
        echo "Monday";
        break;
    case "2":
        echo "thusday";
        break;
    case "3":
        echo "wednsday";
        break;
    case "4":
        echo "thursday";
        break;
    case "5":
        echo "friday";
        break;
    case "6":
        echo "saturday";
        break;
    case "7":
        echo "sunday";
        break;
    default:
        echo "wrong input the number of day must be between 1-7";
  }
?> -->
<?php
$d=date("d");
echo $d;
?>
