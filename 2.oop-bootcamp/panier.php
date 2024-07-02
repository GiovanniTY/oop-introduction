<?php

declare(strict_types=1);

 class Product 
 {
    //Propriétes 
    public string $name;
    public int $pieces;
    public float $price;
    public float $taxRate;

    // the constructer 
    public function __construct(string $name, int $pieces, float $price, float $taxRate) 
    {

    $this->name = $name;
    $this->pieces = $pieces;
    $this->price = $price;
    $this->taxRate = $taxRate;
    }

    public function calculateTotalCostWithTax(): array
    {
        $totalCost = $this->pieces * $this->price;
        $taxAmount = $totalCost * ($this->taxRate / 100);
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

//Calcul di cout total du panier et du montant total des taxes 
$totalCost = $bananasCost['totalCost'] + $applesCost['totalCost'] + $wineCost ['totalCost'];
$totalTax = $bananasCost['taxAmount'] + $applesCost['taxAmount'] + $wineCost ['taxAmount'];

echo 'Le cout total du panier est' . number_format($totalCost,2) . "\n";
echo 'les taxes total pour ce panier s eleve a' . number_format($totalTax,2) . "\n";

    

 