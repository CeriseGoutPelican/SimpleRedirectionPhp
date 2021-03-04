<?php session_start();
include('../data/functions.php');
include('../configuration.php');

/**
 * Three possible actions :
 * - Add new redirection
 * - Delete an existing redirection
 * - Edite an existing redirection
 */
if (isset($_SESSION['userData']['login'])){
	
	switch ($_GET['v']) {
		case 'delete':
			
			if(isset($_GET['k']) && isset($json[$_GET['k']])){

				deleteJson($json, $_GET['k']);
				
				createNotice("The redirection was deleted", "green");

			} else {

				createNotice("The redirection was not deleted (wrong key)", "red");

			}
			
			header('Location: '.$url);
			exit();

			break;

		case 'edit':

			if(isset($_POST['key']) && $_POST['key'] != "" && isset($_POST['url']) && $_POST['url'] != "" && isset($_POST['count']) && $_POST['count'] != "") {

				if($_POST['key'] == $_GET['k']){
					
					editJson($json, $_GET['k'], ['url' => $_POST['url'], 'count' => $_POST['count']]);
				
				} else {

					$newJson = editKeyJson($json, $_GET['k'], $_POST['key']);
					editJson($newJson, $_POST['key'], ['url' => $_POST['url'], 'count' => $_POST['count']]);

				}

				createNotice("The redirection was edited", "green");
				header('Location: '.$url);
				exit();

			}

			include('../includes/header.php');

				include('../includes/editForm.php');

			include('../includes/footer.php');
		
			break;

		case 'add':

			if(isset($_POST['key']) && $_POST['key'] != "" && isset($_POST['url']) && $_POST['url'] != "" && isset($_POST['count']) && $_POST['count'] != "") {
					
				editJson($json, $_POST['key'], ['url' => $_POST['url'], 'count' => $_POST['count'], 'time' => time()]);
				
				createNotice("The redirection was created !", "green");
				header('Location: '.$url);
				exit();

			}

			include('../includes/header.php');

				include('../includes/editForm.php');

			include('../includes/footer.php');
		
			break;

		default:

			createNotice("The action is invalid.", "red");

			header('Location: '.$url);

			break;
	}

}