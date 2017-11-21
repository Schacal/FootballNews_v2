<?php
ob_start();
session_start();
error_reporting(E_ALL & ~E_NOTICE);
include ('subpages/connect.php');

$db = @new mysqli($host,$db_user,$db_password,$db_name); //@ obsluga bledu
if($db->connect_errno!=0)
{
	echo '<p class="error"> ' . $db->connect_errno . '</p>';
}
$active = 1;


$s = $_GET['s'];
switch ( $s ) {
	case "Ekstraklasa":
                $active = 2;
		$t = "Ekstraklasa";
		break;
	case "BundesLiga":
                $active = 3;
		$t = "Bundes Liga";
		break;
	case "Wyniki":
                $active = 5;
		$t = "Wyniki";
		break;
	case "panel":
            $active = 6;
		if (isset($_SESSION['logedin']) || $_SESSION['logedin'] == '1')
		{
			$t = "Panel";
			$s = 'panel';
		}
		else
		{
			$t = "Logowanie";
			$s = 'login';
		}
		break;
	case "panel_exe":
            $active = 6;
		if ($_POST['dodaj'] !='') {
			if ( $_POST['team1'] != '' && $_POST['team2'] != '' ) {
				$query = "INSERT INTO updates (`goals_team_1`, `goals_team_2`, `game_id`) VALUES ('" . $_POST['team1'] . "', '" . $_POST['team2'] . "', '" . $_POST['game'] . "');";
				if ( $db->query( $query ) === true ) {
					$_SESSION['message'] = "Wynik został dodany.";
				}
				else {
					$_SESSION['error'] = "Wystąpił błąd";
				}
			} else {
				$_SESSION['error'] = "Proszę podać wynik.";
			}
			header( 'Location: Wyniki.html' );
		}
		if ($_POST['zatwierdz'] !='')
		{
			$query = "UPDATE updates SET verified = '1', date = now() WHERE ID = '".$_POST['game']."';";
			if ( $db->query( $query ) === true ) {
				$_SESSION['message'] = "Wynik został zatwierdzony. ";
			} else {
				$_SESSION['error'] = "Wystąpił błąd";
			}
			header( 'Location: panel.html' );
		}if ($_POST['anuluj'] !='')
		{
			$query = "UPDATE updates SET verified = '2', date = now()  WHERE ID = '".$_POST['game']."';";
			if ( $db->query( $query ) === true ) {
				$_SESSION['message'] = "Wynik został anulowany. ";
			} else {
				$_SESSION['error'] = "Wystąpił błąd";
			}
			header( 'Location: panel.html' );
		}
		//header('Location: panel.html');
		break;

	case "login_exe":
            $active = 6;
		if ($_POST['login'] != '' && $_POST['haslo'] != '') {

			$rezultat = $db->query(
				sprintf("SELECT * FROM user WHERE user='%s' AND pass='%s'",
					mysqli_real_escape_string($db,$_POST['login']),
					mysqli_real_escape_string($db, md5($_POST['haslo']))));
			if ($rezultat->num_rows != 0)
			{
				$_SESSION['logedin'] = '1';
			}
			else
			{
				$_SESSION['error'] = "Zły login lub/i hasło.";
			}
			$rezultat->close();
		}
		else {
			$_SESSION['error'] = "Login i/lub hasło nie może/ą być puste.";
		}
		header('Location: panel.html');
		break;
	case "logout":
            $active = 1;
		unset ($_SESSION['logedin']);
		header('Location: panel.html');
		break;
	case "LigaMistrzow":
            $active = 4;
		$t = "Liga Mistrzów";
		break;
	default:
                $active = 1;
		$s = "home";
		$t = "Home";
}

include( "subpages/header.php" );
include( "subpages/" . $s . ".php" );
include( "subpages/footer.php" );
?>