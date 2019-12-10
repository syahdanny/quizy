<?php

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

if ($_SESSION['level'] == 'admin') 
{

		if ($_GET['module']=='adminQuiz'){
			include "module/adminQuiz.php";
		}

		elseif ($_GET['module']=='adminPlayer'){
			include "module/adminPlayer.php";
		}
		
		elseif ($_GET['module']=='home'){
			include "module/adminQuiz.php";
		}
		
		elseif ($_GET['module']=='adminQuizResult'){
			include "module/adminQuizResult.php";
		}

		elseif ($_GET['module']=='adminAddQuiz'){
			include "module/adminAddQuiz.php";
		}

		elseif ($_GET['module']=='adminEditQuiz'){
			include "module/adminEditQuiz.php";
		}

		elseif ($_GET['module']=='adminAddSoal'){
			include "module/adminAddSoal.php";
		}

		elseif ($_GET['module']=='adminEditSoal'){
			include "module/adminEditSoal.php";
		}

		elseif ($_GET['module']=='adminEditPlayer'){
			include "module/adminEditPlayer.php";
		}
		// Apabila modul tidak ditemukan
		else{
		include "module/page_not_found.php";
		}
	}
else {
		// Bagian User
		if ($_GET['module']=='userHome'){
			include "module/userHome.php";
		}

		elseif ($_GET['module']=='home'){
			include "module/userHome.php";
		}

		elseif ($_GET['module']=='play'){
			include "play.php";
		}

		elseif ($_GET['module']=='userInfoQuiz'){
			include "module/userInfoQuiz.php";
		}

		elseif ($_GET['module']=='userProfile'){
			include "module/userProfile.php";
		}

		elseif ($_GET['module']=='userQuizResult'){
			include "module/userQuizResult.php";
		}
		else{
			include "module/page_not_found.php";
			}
}
?>