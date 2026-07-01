<?php
// 1 Définir les données 

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

// 2 Afficher toutes catégories qui n'ont pas de produits 

foreach ($categories as $categorie) {
    if (empty($categorie["produits"])) {
        echo $categorie["nom"]."\n";
    }
}
