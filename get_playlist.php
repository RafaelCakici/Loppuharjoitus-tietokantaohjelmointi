<?php

require "dbconnection.php";
$dbcon = createDbConnection();

$playlist_id = $_GET["id"];

$sql = "SELECT tracks.Name as N, tracks.Composer as C
FROM playlists, playlist_track, tracks
WHERE playlists.PlaylistID = ?
AND playlists.PlaylistID = playlist_track.PlayListID
AND playlist_track.TrackId = tracks.TrackID";

$statement = $dbcon->prepare($sql);
$statement->execute(array($playlist_id));

$rows = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach($rows as $row){
    echo "<h3>".$row["N"]."</h3>"."<p>".$row["C"]."</p>"."</br>";
}