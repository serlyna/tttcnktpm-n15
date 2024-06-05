<?php
include_once("db_connect.php");
$commentQuery = "SELECT id, parent_id, comment, sender, date FROM comment WHERE parent_id = '0' ORDER BY id DESC";
$commentsResult = mysqli_query($conn, $commentQuery) or die("database error:". mysqli_error($conn));
$commentHTML = '';
while($comment = mysqli_fetch_assoc($commentsResult)){
	$commentHTML .= '
		<div class="panel panel-primary" style="font-family:times;  "  >
		<div class="panel-heading" style="background:white;  ">By <b>'.$comment["sender"].'</b> on <i>'.$comment["date"].'</i></div>
		<div class="panel-body" style="background:white; font-size:26px; font-style: italic; color:blue">'.$comment["comment"].'</div>
		<div class="panel-footer" align="right" style="background:#F5F5F5"><button type="button" class="btn btn-primary reply" style="background:#0B243B;" id="'.$comment["id"].'">Trả lời</button> </div> <br><br>
		</div> ';
		
	$commentHTML .= getCommentReply($conn, $comment["id"]);
}
echo $commentHTML;

function getCommentReply($conn, $parentId = 0, $marginLeft = 0) {
	$commentHTML = '';
	$commentQuery = "SELECT id, parent_id, comment, sender, date FROM comment WHERE parent_id = '".$parentId."'";	
	$commentsResult = mysqli_query($conn, $commentQuery);
	$commentsCount = mysqli_num_rows($commentsResult);
	if($parentId == 0) {
		$marginLeft = 0;
	} else {
		$marginLeft = $marginLeft + 48;
	}
	if($commentsCount > 0) {
		while($comment = mysqli_fetch_assoc($commentsResult)){  
			$commentHTML .= '
				<div class="panel panel-primary" style="margin-left:'.$marginLeft.'px; font-family:times; ">
				<div class="panel-heading" style="background:white;">By <b>'.$comment["sender"].'</b> on <i>'.$comment["date"].'</i></div>
				<div class="panel-body" style="background:white; font-size:26px; font-style: italic; color:#003399">'.$comment["comment"].'</div>
				<div class="panel-footer" align="right" style="background:#F5F5F5" ><button type="button" class="btn btn-primary reply" style="background:#0B243B;" id="'.$comment["id"].'">Trả lời</button></div><br>
				</div>
				';
			$commentHTML .= getCommentReply($conn, $comment["id"], $marginLeft);
		}
	}
	return $commentHTML;
}
?>