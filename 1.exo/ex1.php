<?php

declare(strict_types=1);

class Beverage
{
    // Propriétés
    public string $color; // La couleur de la boisson
    public float $price; // Le prix de la boisson
    public string $temperature; // La température de la boisson

    // Le constructeur
    public function __construct(string $color, float $price, string $temperature = 'cold')
    {
        // Initialiser les propriétés de la boisson
        $this->color = $color;
        $this->price = $price;
        $this->temperature = $temperature;
    }

    // Fonction getInfo
    public function getInfo(): string // Déclarer le type de retour
    {
        // Retourner une chaîne de caractères décrivant la boisson
        return "Cette boisson est $this->temperature et $this->color.";
    }
}

// Création d'un nouvel objet Beverage représentant du cola
$cola = new Beverage('black', 2.0);

// Afficher les informations sur l'objet cola
echo $cola->getInfo(); // Output: Cette boisson est cold et black.
?>
