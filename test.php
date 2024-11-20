<?php 

//session_start();

/*session is started if you don't write this line can't use $_Session  global variable*/
$value=5;
$number= 12;

$_SESSION["newsession"]=$value;

$_Session['Thatnumber']=$number;
/*session created*/

echo $_SESSION["newsession"];
echo $_Session["Thatnumber"];

/*session was getting*/

?>