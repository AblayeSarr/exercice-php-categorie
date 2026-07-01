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

// 3 Enregistrer une nouvelle catégorie

$codeIsValid = true;

do { 
    $code = readline("saisir le code :");
    if (empty($code)) {
        echo "le code est obligatoire \n";
        $codeIsValid = false;
    } else {
        foreach ($categories as $categorie) {
            if (($categorie["code"]) === $code) {
                $codeIsValid = false;
                echo "le code existe deja ...\n"; 
            }
        }  
    }
} while (!$codeIsValid);

$nomIsValid = true;
do { 
    $nom = readline("saisir le nom : ");
    if (empty($nom)) {
        echo "le nom est obligatoire";
        $nomIsValid = false;
    } else {
        foreach ($categories as $categorie) {
            if (($categorie["nom"]) === $nom) {
                $nomIsValid = false;
                echo "le nom existe deja ..."; 
            }
        }  
    }
} while (!$nomIsValid);

$categorie = [
    "code" => $code,
    "nom" => $nom,
    "produits" => []
];

$categories[] = $categorie;

// 4 Ajouter un produit à une catégorie

$categorieExiste = false;
$code = readline("saisir le code :");
foreach ($categories as $index => $categorie) {
    if (($categorie["code"]) === $code) {
        $categorieExiste = true;
        break;
    }
} 

if ($categorieExiste) {
    $produit = [
        "nom" => readline("saisir le nom : "),
        "reference" => readline("saisir la reference : "),
        "prix" => (int)readline("saisir le prix : "),
        "quantite" => (int)readline("saisir la quantité : ")
    ];
    $categories[$index]["produits"][] = $produit;
} else {
    echo " désolé , la categorie n'existe pas...";
}

// 5 On ajoute une catégorie en lui affectant des produits

$codeIsValid = true;

do { 
    $code = readline("saisir le code :");
    if (empty($code)) {
        echo "le code est obligatoire \n";
        $codeIsValid = false;
    } else {
        foreach ($categories as $categorie) {
            if (($categorie["code"]) === $code) {
                $codeIsValid = false;
                echo "le code existe deja ...\n"; 
            }
        }  
    }
} while (!$codeIsValid);

$nomIsValid = true;
do { 
    $nom = readline("saisir le nom : ");
    if (empty($nom)) {
        echo "le nom est obligatoire";
        $nomIsValid = false;
    } else {
        foreach ($categories as $categorie) {
            if (($categorie["nom"]) === $nom) {
                $nomIsValid = false;
                echo "le nom existe deja ..."; 
            }
        }  
    }
} while (!$nomIsValid);

$produits = [];
do {
    $produit = [
        "nom" => readline("saisir le nom : "),
        "reference" => readline("saisir la reference : "),
        "prix" => (int)readline("saisir le prix : "),
        "quantite" => (int)readline("saisir la quantité : ")
    ];
    $produits[] = $produit;
    $choix = strtolower(readline(" voulez vous continuer  oui/non "));
} while ($choix === "oui");

$categorie = [
    "code" => $code,
    "nom" => $nom,
    "produits" => $produits 
];

$categories[] = $categorie;
