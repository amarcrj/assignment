<?php
session_start();
if(!isset($_SESSION)){
    header("location: index.php");
    exit();
}
?>
<html>
    <head>
        <title>Prime or not</title>
    </head>
    <body>
        <form method="POST" action="#">
            Enter 5 number followed by coma [Ex. 1,2,3,4,5] [<a href="logout.php">Logout</a>]<br/><br/>
            <input type="text" name="numbers"/>
            <input type="submit" name="checkprime"/>
        </form>
    </body>
</html>
<?php
    function check_prime($num){
        if ($num == 1){
            return 0;
        }
        for ($i = 2; $i <= $num/2; $i++){
            if ($num % $i == 0){
              return 0;
            }
        }
        return 1;
    }
    if(isset($_POST['checkprime'])){
        extract($_POST);
        //var_dump($arr);
        $numarray= explode(",", $numbers);
        $count= count($numarray);
        //echo $count;
        if($count!=5){
            die("ERROR : INPUT 5 NUMBERS SEPARATED BY COMAS");
        }else{
            for($i=0; $i<$count; $i++){
                $num= $numarray[$i];
                if (check_prime($num)){
                    echo "$num => PRIME <br/>";
                }else{
                    echo "$num => NOT PRIME <br/>";
                }
            }
        }
        
    }
?>