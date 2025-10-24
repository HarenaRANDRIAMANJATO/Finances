<?php
function connecterBase() {
    $bdd = mysqli_connect('localhost', 'root', '', 'finance');
    if (!$bdd) {
        die('Erreur de connexion : ' . mysqli_connect_error());
    }
    mysqli_set_charset($bdd, 'utf8');
    return $bdd;
}

// RECETTES
function getRecettes() {
    $bdd = connecterBase();
    $res = mysqli_query($bdd, "SELECT * FROM recette ORDER BY created_at ASC");
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

function getTotalRecetteByYear(int $year): float {
    $bdd = connecterBase();
    $total = 0.0;

    // 1) Somme des recettes liées à la table `recette` via la table periode
    $sql = "SELECT IFNULL(SUM(r.montant_milliards),0) AS s
            FROM recette r
            JOIN periode p ON r.periode_id = p.id
            WHERE p.annee = ?";
    $stmt = mysqli_prepare($bdd, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $year);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($res);
    $total += (float) ($row['s'] ?? 0);

    // 2) Somme des recettes douane (colonnes distinctes pour 2024/2025)
    if ($year === 2024 || $year === 2025) {
        $col = $year === 2024 ? 'montant_2024' : 'montant_2025';

        $sql2 = "SELECT IFNULL(SUM($col),0) AS s FROM recette_douane";
        $res2 = mysqli_query($bdd, $sql2);
        $row2 = mysqli_fetch_assoc($res2);
        $total += (float) ($row2['s'] ?? 0);

        $sql3 = "SELECT IFNULL(SUM($col),0) AS s FROM recette_non_fiscale";
        $res3 = mysqli_query($bdd, $sql3);
        $row3 = mysqli_fetch_assoc($res3);
        $total += (float) ($row3['s'] ?? 0);
    }

    // Retour en milliards (selon vos colonnes) — renvoie un float brut
    return $total;

}
?>
