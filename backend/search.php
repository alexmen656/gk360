<?php
include 'head.php';

/*if (isset($_POST['search_keyword'])) {
    $keyword = escape_string($_POST['search_keyword']);
    $results = [];

    // Suche nach Bezirken
    $bezirke = query("SELECT * FROM gemeinde_kompass_360_bezirke WHERE bezirk_name LIKE '%$keyword%'");
    foreach ($bezirke as $bezirk) {
        $results[] = [
            'type' => 'bezirk',
            'name' => $bezirk['bezirk_name']
        ];
    }

    // Suche nach Gemeinden
    $gemeinden = query("SELECT * FROM gemeinde_kompass_360_gemeinden WHERE gemeinde_name LIKE '%$keyword%'");
    foreach ($gemeinden as $gemeinde) {
        $results[] = [
            'type' => 'gemeinde',
            'name' => $gemeinde['gemeinde_name']
        ];
    }

    // Suche nach Bundesländern
    $bundeslaender = query("SELECT * FROM gemeinde_kompass_360_bundeslaender WHERE bundesland_name LIKE '%$keyword%'");
    foreach ($bundeslaender as $bundesland) {
        $results[] = [
            'type' => 'bundesland',
            'name' => $bundesland['bundesland_name']
        ];
    }

    // Suche nach Bürgermeistern
    $buergermeister = query("SELECT * FROM gemeinde_kompass_360_buergermeister WHERE buergermeister_name LIKE '%$keyword%'");
    foreach ($buergermeister as $bm) {
        $results[] = [
            'type' => 'buergermeister',
            'name' => $bm['buergermeister_name']
        ];
    }

    echo echoJson($results);
}*/


if (isset($_POST['get_search'])) {
    $results = [];

    $bezirke = query("SELECT * FROM gemeindekompass360_bezirke");
    foreach ($bezirke as $bezirk) {
        $results[] = [
            'type' => 'bezirk',
            'ref' => 'bezirk_'.$bezirk['id'],
            'name' => $bezirk['name']
        ];
    }

    $gemeinden = query("SELECT * FROM gemeindekompass360_gemeinden");
    foreach ($gemeinden as $gemeinde) {
        $results[] = [
            'type' => 'gemeinde',
            'ref' => 'gemeinde_'.$gemeinde['id'],
            'name' => $gemeinde['name']
        ];
    }

    $bundeslaender = query("SELECT * FROM gemeindekompass360_bundeslander");
    foreach ($bundeslaender as $bundesland) {
        $results[] = [
            'type' => 'bundesland',
            'ref' => 'bundesland_'.$bundesland['id'],
            'name' => $bundesland['name']
        ];
    }

    $buergermeister = query("SELECT * FROM gemeindekompass360_burgermeister");
    foreach ($buergermeister as $bm) {
        $results[] = [
            'type' => 'buergermeister',
            'ref' => 'buergermeister_'.$bm['id'],
            'name' => $bm['name']
        ];
    }

    echo echoJson($results);
}
?>