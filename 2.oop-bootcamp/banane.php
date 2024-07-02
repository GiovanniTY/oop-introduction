<?php

declare(strict_types=1);

/* function calculateTotalCost (int $numberOfPieces, float $pricePerItem, float $taxe):float
{
    $totalCost = $numberOfPieces * $pricePerItem;
    //convertir les taxes en fraction 
    $taxeFraction = $taxe/100;
    //Envlever les taxes directement 
    $totalCostWithoutTax = $totalCost - ($totalCost * $taxeFraction);
    
    return $totalCostWithoutTax;
}

$banane = 6;
$priceBanane = 1;
$taxeFruit = 6;
$taxeVin = 21;

$totalGainBanane = calculateTotalCost($banane,$priceBanane,$taxeFruit);

echo $totalGainBanane . "<br>";

$pommes = 3;
$pricesPommes = 1.5;

$totalGainPommes = calculateTotalCost($pommes,$pricesPommes,$taxeFruit);

echo $totalGainPommes . "<br>";

$boutteillesVins = 2;
$priceVin = 10;




$totalGainVin = calculateTotalCost($boutteillesVins, $priceVin, $taxeVin);


echo $totalGainVin; */

//Deuxieme options 

/* function calculateTotalCostWithTax(int $quantity, float $pricePerItem, float $taxeRate):array
{
    $totalCost = $quantity * $pricePerItem;
    $taxAmount = $totalCost * ($taxeRate / 100);
    $totalCostWithTaxe = $totalCost + $taxAmount;

    return[
        'totalCost' => $totalCostWithTaxe,
        'taxAmount' => $taxAmount
    ];
}

//Donnés du panier 

$bananas = ['quantity' => 6, 'price' => 1, 'taxeRate' => 6.0];
$pommes = ['quantity' => 3, 'price' => 1.50, 'taxeRate' => 6.0];
$wineBottles = ['quantity' => 2, 'price' => 10, 'taxeRate' => 21.0];


//Calcule du cout de chaque produit 
$bananasCost = calculateTotalCostWithTax($bananas['quantity'],$bananas['price'],$bananas['taxeRate']);
$pommesCost = calculateTotalCostWithTax($pommes['quantity'],$pommes['price'],$pommes['taxeRate']);
$wineCost = calculateTotalCostWithTax($wineBottles['quantity'],$wineBottles['price'],$wineBottles['taxeRate']);
//calcul di cout total du panier 
$totalCost = $bananasCost['totalCost'] + $pommesCost['totalCost'] + $wineCost['totalCost'];
$totalTax = $bananasCost['taxAmount'] + $pommesCost['taxAmount'] + $wineCost['taxAmount'];

echo "Le cout total du panier est: €" . number_format($totalCost,2) . "\n";
echo "Taxe Total: €" . number_format($totalTax,2) . "\n";



 */

 class Product 
 {
    //Propriétes 
    public string $name;
    public int $pieces;
    public float $price;
    public float $taxeRate;

    // the constructer 
    public function __construct(string $name, int $pieces, float $price, float $taxRate) 
    {

    $this->name = $name;
    $this->pieces = $pieces;
    $this->prices = $price;
    $this->taxRate = $taxRate;
    }

    public function calculateTotalCostWithTax(): array
    {
        $totalCost = $this->pieces * $this->price;
        $taxAmount = $totalCost * ($this->taxeRate / 100);
        $totalCostWithTax = $totalCost + $taxAmount;
        return[
            'totalCost' => $totalCostWithTax,
            'taxAmount' => $taxAmount
        ];

    }
}

// Création des produits
$bananas = new Product('bananas', 6, 1, 6.0);
$apples = new Product('apples', 3, 1.50, 6.0);
$wine = new Product('wine', 2, 10, 21.0);

//Calcul tu cout total et des taxes pour chaque produit 
$bananasCost = $bananas->calculateTotalCostWithTax();
$applesCost = $apples->calculateTotalCostWithTax();
$wineCost = $wine->calculateTotalCostWithTax();

    

 