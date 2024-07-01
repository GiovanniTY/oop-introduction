<?php

declare(strict_types=1);

class Beverage
{
    // Proprietà
    public string $color;
    public float $price; // Correzione: il nome della proprietà deve essere coerente (price invece di prix)
    public string $temperature;

    // Il costruttore
    public function __construct(string $color, float $price, string $temperature = 'cold')
    {
        $this->color = $color;
        $this->price = $price;
        $this->temperature = $temperature;
    }

    // Funzione getInfo
    public function getInfo(): string // Correzione: dichiarare il tipo di ritorno
    {
        return "Cette boisson est $this->temperature et $this->color."; // Correzione: utilizzare return invece di echo
    }
}

// Creazione di un nuovo oggetto Beverage
$cola = new Beverage('black', 2.0);

// Stampa delle informazioni sull'oggetto
echo $cola->getInfo(); // Output: Cette boisson est cold et black.
?>
