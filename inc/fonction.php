<?php
function connecterBase() {
    $bdd = mysqli_connect('localhost', 'root', 'katilesy', 'finance');
    if (!$bdd) {
        die('Erreur de connexion : ' . mysqli_connect_error());
    }
    mysqli_set_charset($bdd, 'utf8');
    return $bdd;
}

// RECETTES
function getRecettes() {
    $bdd = connecterBase();
    $res = mysqli_query($bdd, "SELECT * FROM recette ORDER BY created_at DESC");
    if (!$res) {
        die("Erreur SQL : " . mysqli_error($bdd));
    }
    $data = [];
    while ($row = mysqli_fetch_assoc($res)) {
        $data[] = $row;
    }
    return $data;
}
function getRecetteDouane() {
    $bdd = connecterBase();
    $res = mysqli_query($bdd, "SELECT * FROM recette_douane ORDER BY id ASC");
    $data = [];
    while($row = mysqli_fetch_assoc($res)) $data[] = $row;
    return $data;
}
function getRecetteNonFiscale() {
    $bdd = connecterBase();
    $sql = "SELECT * FROM recette_non_fiscale ORDER BY id ASC";
    $res = mysqli_query($bdd, $sql);
    $data = [];
    while($row = mysqli_fetch_assoc($res)) {
        $data[] = $row;
    }
    return $data;
}




// DEPENSES
function getDepenses() {
    $bdd = connecterBase();
    $res = mysqli_query($bdd, "SELECT * FROM depense ORDER BY date_depense DESC");
    $data = [];
    while ($row = mysqli_fetch_assoc($res)) {
        $data[] = $row;
    }
    return $data;
}

// DONS
function getDons() {
    $bdd = connecterBase();
    $res = mysqli_query($bdd, "SELECT * FROM don ORDER BY date_don DESC");
    $data = [];
    while ($row = mysqli_fetch_assoc($res)) {
        $data[] = $row;
    }
    return $data;
}

// DEFICITS
function getDeficits() {
    $bdd = connecterBase();
    $res = mysqli_query($bdd, "SELECT * FROM deficit ORDER BY date_deficit DESC");
    $data = [];
    while ($row = mysqli_fetch_assoc($res)) {
        $data[] = $row;
    }
    return $data;
}
?>
