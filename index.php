<!DOCTYPE html>
<?php include 'db.php';?>
<html>
<head>
<title>Chat System in PHP</title>
</head>
<link rel="stylesheet" type="text/css" href="style.css"\>
<script>
function ajax(){
var req= new XMLHttpRequest();
req.onreadystatechange=function(){
if(req.readyState==4 && req.status==200){

document.getElementById('chat').innerHTML=req.responseText;


}
}
req.open('GET','chat.php',true);
req.send();

}
setInterval(function(){ajax()},1000);
</script>
<body onload="ajax();">

<div id="container">

<div id="chat_box">

<div id="chat">

</div>
</div>
<form action="index.php"  method="POST">
<input type="text" name="name" placeholder="eneter name">
<textarea name="msg" placeholder="enter your message"></textarea>
<input type="submit" name="submit" value="send it">
</form>
<?php 
if(isset($_POST['submit'])){

$name=$_POST['name'];
$msg=$_POST['msg'];
$insert="INSERT INTO chat (name,msg) values('$name','$msg')";

$run=$db->query($insert);
if($run){
echo "<embed loop='false' src='chat.wav' hidden='true' autoplay='true'>";
}

}
?>
</div>


</body>

</html>
