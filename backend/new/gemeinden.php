<?php
include 'head.php';
//print_r($_POST);
if (isset($_POST['get_gemeinden'])) {
    if (isset($_POST['bundesland'])) {
        //comming soon
    } else if (isset($_POST['bezirk'])) {
        $bezirk = escape_string($_POST['bezirk']);
        $gemeinden = query("SELECT * FROM gemeindekompass360_gemeinden WHERE bezirk='$bezirk'"); // LIMIT 30
        $i = 0;
        foreach ($gemeinden as $g) {
            $bundesland = fetch_assoc(qusery("SELECT * FROM gemeindekompass360_bezirke WHERE name='$bezirk'"))['bundesland'];
            $json[$i]['id'] = $g['id'];
            $json[$i]['type'] = "gemeinde";
            $json[$i]['name'] = $g['name'];
            $json[$i]['code'] = strtolower(preg_replace("/\s+/", "-", $g['name']));
            $json[$i]['buergermeister'] = $g['bürgermeister'];
            $json[$i]['zuletzt_bearbeitet'] = date('Y-m-d');
            $i++;
        }
    } else if (isset($_POST['gemeinde'])) {
        $gemeinde = escape_string($_POST['gemeinde']);
        $gemeinde = query("SELECT * FROM gemeindekompass360_gemeinden WHERE code='$gemeinde'");
        if (mysqli_num_rows($gemeinde) == 1) {
            $g = fetch_assoc($gemeinde);
            $bezirk = $g['bezirk'];
            $bundesland = fetch_assoc(query("SELECT * FROM gemeindekompass360_bezirke WHERE name='$bezirk'"))['bundesland'];

            $json['id'] = $g['id'];
            $json['name'] = $g['name'];
            $json['type'] = "gemeinde";
            $json['beschreibung'] = $g['name'] . " ist eine Gemeinde im Bezirk " . $g['bezirk'] . " in " . $bundesland . ", Österreich.";
            $json['code'] = $g['code'];
            $json['bilder'] = array(
                ["url" => "https://alex.polan.sk/api/gemeinde-kompass-360/bilder/".$g['bild'], "attribution" => "My own Source ;)"],
                ["url" => "https://media04.meinbezirk.at/article/2022/11/14/8/31703398_L.jpg?1668415805", "attribution" => "My own Source ;)"],
                ["url" => "https://www.best-of-burgenland.com/assets/img/gemeinden/deutsch_jahrndorf/deutsch_jahrndorf_ortstafel_2021-07-27_006.jpg", "attribution" => "My own Source ;)"],
                ["url" => "https://www.best-of-burgenland.com/assets/img/gemeinden/deutsch_jahrndorf/deutsch_jahrndorf_pestsaeule_1857_2021-07-27_009.jpg", "attribution" => "My own Source ;)"],
            );
            $json['oeffnungszeiten'] = $g['öffnungszeiten'];
            $json['buergermeister'] = $g['bürgermeister'];
            $json['zuletzt_bearbeitet'] = date('Y-m-d');
            $json['adresse'] = $g['adresse'];
            $json['telefon'] = $g['telefon'];
            $json['email'] = $g['email'];
            $json['plz'] = $g['plz'];
            $json['einwohner'] = $g['einwohnerzahl'];
            $json["location"] = ["lat" => $g["latitude"], "lon" => $g["longitude"]];
        } else {
            echo "Error";
        }
    } else if (isset($_POST['get_search_index'])) {
        $gemeinden = query("SELECT * FROM gemeindekompass360_gemeinden");

        $i = 0;
        foreach ($gemeinden as $g) {
            $bezirk = $g['bezirk'];
            $bundesland = fetch_assoc(query("SELECT * FROM gemeindekompass360_bezirke WHERE name='$bezirk'"))['bundesland'] ?? "Unbekannt";
            $json[$i]['ref'] = "gemeinde_" . $g['id'];
            $json[$i]['name'] = $g['name'];
            $json[$i]['beschreibung'] = $g['name'] . " ist eine Gemeinde im Bezirk " . $g['bezirk'] . " in " . $bundesland . ", Österreich.";
            $json[$i]['code'] = $g['code'];
            $json[$i]['buergermeister'] = $g['bürgermeister'];
            $i++;
        }


    } else {
        $gemeinden = query("SELECT * FROM gemeindekompass360_gemeinden LIMIT 36");

        $i = 0;
        foreach ($gemeinden as $g) {
            $bezirk = $g['bezirk'];
            $bundesland = fetch_assoc(query("SELECT * FROM gemeindekompass360_bezirke WHERE name='$bezirk'"))['bundesland'] ?? "Unbekannt";

            $json[$i]['id'] = $g['id'];
            $json[$i]['t'] = "gemeinde";
            $json[$i]['n'] = $g['name'];
            $json[$i]['bd'] = pathinfo($g['bild'], PATHINFO_EXTENSION);
            $json[$i]['b'] = $g['name'] . " ist eine Gemeinde im Bezirk " . $g['bezirk'] . " in " . $bundesland . ", Österreich.";
            //."Deutsch Jahrndorf - blablalldakf"
            $json[$i]['c'] = $g['code'];
            $json[$i]['o'] = $g['öffnungszeiten'];
            $json[$i]['bm'] = $g['bürgermeister'];
            $json[$i]['zb'] = date('Y-m-d');
            $i++;
        }
    }

    echo echoJson($json);
}
?>