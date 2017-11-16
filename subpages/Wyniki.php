<?php
$rezultat = $db->query("SELECT g.date, t1.name as 'team1', t2.name as 'team2', u.goals_team_1, u.goals_team_2, g.ID FROM game g, team t1, team t2, updates u where g.team1_id = t1.ID and g.team2_id = t2.ID and u.game_id = g.ID and u.verified=1 ORDER BY u.date  DESC");

$wiersz = $rezultat->fetch_assoc();


?>

<div class="artykul" xmlns="http://www.w3.org/1999/html">
    <h2 class="artykul"><?= $wiersz['team1'] ?> <?= $wiersz['goals_team_1'] ?>  : <?= $wiersz['goals_team_2'] ?> <?= $wiersz['team2'] ?></h2>
    <p class="artykul">
    <form action="panel_exe.html" method="POST">

		<?php
		$rezultat->close();
		if(isset($_SESSION['error']))
			echo '<p class="error">'.$_SESSION['error'].'</p>';
		    unset ($_SESSION['error']);
		if(isset($_SESSION['message']))
		    echo '<p class="message">'.$_SESSION['message'].'</p>';
		unset ($_SESSION['message']);
		?>
        <input type="hidden" name="game" value="<?= $wiersz['ID'] ?>">
        <p><?= $wiersz['team1'] ?> <input type="text" name="team1" size="2"/> : <input type="text" name="team2" size="2"/> <?= $wiersz['team2'] ?></p>
        <input type="submit" name="dodaj" value="Aktualizuj wynik"/>

    </form>
    </p>
</div>
