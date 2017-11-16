<?php

$rezultat2 = $db->query("SELECT g.date, t1.name as 'team1', t2.name as 'team2', u.goals_team_1, u.goals_team_2, g.ID FROM game g, team t1, team t2, updates u where g.team1_id = t1.ID and g.team2_id = t2.ID and u.game_id = g.ID and u.verified=1 ORDER BY u.date  DESC");
$wiersz2 = $rezultat2->fetch_assoc();
$rezultat2->close();


$rezultat = $db->query("SELECT g.date, t1.name as 'team1', t2.name as 'team2', u.goals_team_1, u.goals_team_2, u.ID FROM game g, team t1, team t2, updates u where g.team1_id = t1.ID and g.team2_id = t2.ID and u.game_id = g.ID and u.verified=0 ORDER BY u.date  DESC");

?>

<div class="artykul" xmlns="http://www.w3.org/1999/html">
    <h2 class="artykul">Panel: <?= $wiersz2['team1'] ?> <?= $wiersz2['goals_team_1'] ?>  : <?= $wiersz2['goals_team_2'] ?> <?= $wiersz2['team2'] ?></h2>
    <p class="artykul">
	    <?php
	    if(isset($_SESSION['error']))
		    echo '<p class="error">'.$_SESSION['error'].'</p>';
	    unset ($_SESSION['error']);
	    if(isset($_SESSION['message']))
	        echo '<p class="message">'.$_SESSION['message'].'</p>';
	    unset ($_SESSION['message']);
	    ?>
        <?php if ($rezultat->num_rows > 0){
        while ($wiersz = $rezultat->fetch_object()){
            ?>
        <form action="panel_exe.html" method="POST">
            <input type="hidden" name="game" value="<?= $wiersz->ID ?>">
    <p><span class="wynik"><?= $wiersz->team1 ?> <?= $wiersz->goals_team_1 ?>  : <?= $wiersz->goals_team_2 ?> <?= $wiersz->team2 ?></span>
        <input type="submit" name="zatwierdz" value="Zatwierdź aktualizację"/>
        <input type="submit" name="anuluj" value="Anuluj aktualizację"/>
    </p>
    </form>
    <?php
    }
        }
        else {
	        if(isset($_SESSION['error']))
		        echo '<p class="error">'.$_SESSION['error'].'</p>';
	        unset ($_SESSION['error']);
	        if(isset($_SESSION['message']))
                echo '<p class="message">'.$_SESSION['message'].'</p>';
	        unset ($_SESSION['message']);
	        echo 'Brak wyników do zatwierdzenia.';
    }
    $rezultat->close();
    ?>
    <form action="logout.html" method="POST">
        <p><input type="submit" name="wyloguj" value="Wyloguj się"/></p>
    </form>
    </p>
</div>
