<?php
	include("bddconnect.inc.php");
	
		if(isset($_POST['univpage'])){
			if(isset($_POST['univfav'])&&($_POST['univfav']==1)){	
				if(mysqli_num_rows(mysqli_query($mysqli, 'SELECT * FROM univers_fav WHERE user_id='.$_POST["userid"].' AND univers_id='.$_POST['univpage'].';'))==0){
					mysqli_query($mysqli, "INSERT INTO `univers_fav`(`user_id`,`univers_id`) VALUES ('".$_POST["userid"]."','".$_POST['univpage']."')");
				}
			}else if(isset($_POST['univfav'])&&($_POST['univfav']==0)){
				if(mysqli_num_rows(mysqli_query($mysqli, 'SELECT * FROM univers_fav WHERE user_id='.$_POST["userid"].' AND univers_id='.$_POST['univpage'].';'))>=1){
					mysqli_query($mysqli, "DELETE FROM `univers_fav` WHERE `user_id`='".$_POST["userid"]."' AND `univers_id`='".$_POST['univpage']."'");
				}
				
			}
			if(isset($_POST['univlike'])&&($_POST['univlike']==1)){	
				if(mysqli_num_rows(mysqli_query($mysqli, 'SELECT * FROM univers_likes WHERE user_id='.$_POST["userid"].' AND univers_id='.$_POST['univpage'].';'))==0){
					mysqli_query($mysqli, "INSERT INTO `univers_likes`(`user_id`,`univers_id`) VALUES ('".$_POST["userid"]."','".$_POST['univpage']."')");
				}
			}else if(isset($_POST['univlike'])&&($_POST['univlike']==0)){
				if(mysqli_num_rows(mysqli_query($mysqli, 'SELECT * FROM univers_likes WHERE user_id='.$_POST["userid"].' AND univers_id='.$_POST['univpage'].';'))>=1){
					mysqli_query($mysqli, "DELETE FROM `univers_likes` WHERE `user_id`='".$_POST["userid"]."' AND `univers_id`='".$_POST['univpage']."'");
				}
				
			}
			$likenb = mysqli_num_rows(mysqli_query($_SESSION["mysqli"], 'SELECT * FROM univers_likes WHERE univers_id='.$_POST['univpage'].';'));
			$favnb = mysqli_num_rows(mysqli_query($_SESSION["mysqli"], 'SELECT * FROM univers_fav WHERE univers_id='.$_POST['univpage'].';'));
			echo $likenb;
			echo $favnb;
		}
		if(isset($_POST['scenarpage'])){
			if(isset($_POST['scenarfav'])&&($_POST['scenarfav']==1)){	
				if(mysqli_num_rows(mysqli_query($mysqli, 'SELECT * FROM scenario_fav WHERE user_id='.$_POST["userid"].' AND scenario_id='.$_POST['scenarpage'].';'))==0){
					mysqli_query($mysqli, "INSERT INTO `scenario_fav`(`user_id`,`scenario_id`) VALUES ('".$_POST["userid"]."','".$_POST['scenarpage']."')");
				}
			}else if(isset($_POST['scenarfav'])&&($_POST['scenarfav']==0)){
				if(mysqli_num_rows(mysqli_query($mysqli, 'SELECT * FROM scenario_fav WHERE user_id='.$_POST["userid"].' AND scenario_id='.$_POST['scenarpage'].';'))>=1){
					mysqli_query($mysqli, "DELETE FROM `scenario_fav` WHERE `user_id`='".$_POST["userid"]."' AND `scenario_id`='".$_POST['scenarpage']."'");
				}
				
			}
			if(isset($_POST['scenarlike'])&&($_POST['scenarlike']==1)){	
				if(mysqli_num_rows(mysqli_query($mysqli, 'SELECT * FROM scenario_likes WHERE user_id='.$_POST["userid"].' AND scenario_id='.$_POST['scenarpage'].';'))==0){
					mysqli_query($mysqli, "INSERT INTO `scenario_likes`(`user_id`,`scenario_id`) VALUES ('".$_POST["userid"]."','".$_POST['scenarpage']."')");
				}
			}else if(isset($_POST['scenarlike'])&&($_POST['scenarlike']==0)){
				if(mysqli_num_rows(mysqli_query($mysqli, 'SELECT * FROM scenario_likes WHERE user_id='.$_POST["userid"].' AND scenario_id='.$_POST['scenarpage'].';'))>=1){
					mysqli_query($mysqli, "DELETE FROM `scenario_likes` WHERE `user_id`='".$_POST["userid"]."' AND `scenario_id`='".$_POST['scenarpage']."'");
				}
				
			}
			$likenb = mysqli_num_rows(mysqli_query($_SESSION["mysqli"], 'SELECT * FROM scenario_likes WHERE scenario_id='.$_POST['scenarpage'].';'));
			$favnb = mysqli_num_rows(mysqli_query($_SESSION["mysqli"], 'SELECT * FROM scenario_fav WHERE scenario_id='.$_POST['scenarpage'].';'));
			echo $likenb;
			echo $favnb;
		}
		
?>