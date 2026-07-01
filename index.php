<?php
$categories = [
   0 => [
        "code" => "a295",
        "nom" => "categorie0",
        "produits" => [
              0 => [
                "nom" => "produit1",
                "reference" => "ref1",
                "prix" => 5000,
                "quantite" => 5 
              ],
              1 => [
                "nom" => "produit2",
                "reference" => "ref2",
                "prix" => 7000,
                "quantite" => 7 
              ]
        ]
   ],
   1 => [
        "code" => "a295",
        "nom" => "categorie1",
        "produits" => []
   ]
];

function afficheCategorieSansProduit(array $categories): void {
    foreach ($categories as $categorie) {
        if (empty($categorie["produits"])) {
            echo $categorie["nom"]."\n";
        }
    }
}
afficheCategorieSansProduit($categories);

function saisieChaine(string $message): string {
    return readline($message);  
}

function champObligatoire(string $value, string $message): bool {
    if (empty($value)) {
        echo $message."\n";
        return false;
    }
    return true;
}

function rechercheCategorieParCle(array $categories, string $key, string $value): int|bool {
    foreach ($categories as $index => $categorie) {
        if (($categorie[$key]) === $value) {
            return $index;
        }
    } 
    return false;
}

function saisieChampObligatoireEtUnique(array $categories, string $smsSaisie, string $smsError, string $key): string {
    $valueIsValid = true;
    do {   
        $value = saisieChaine($smsSaisie);
        $valueIsValid = champObligatoire($value, $smsError);
        if($valueIsValid) {     
            $valueIsValid = rechercheCategorieParCle($categories, $key, $value);
        }
    } while (!$valueIsValid);
    return $value;
}
