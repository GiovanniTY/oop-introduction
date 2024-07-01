<?php

declare(strict_types=1);

class Beverage
{
    // Propriétés
    protected string $color; // La couleur de la boisson
    protected float $price; // Le prix de la boisson
    protected string $temperature; // La température de la boisson

    // Le constructeur
    public function __construct(string $color, float $price, string $temperature = 'cold')
    {
        // Initialiser les propriétés de la boisson
        $this->color = $color;
        $this->price = $price;
        $this->temperature = $temperature;
    }

    public function getColor(): string
    {
        return $this->color;
    }


    // Fonction getInfo
    public function getInfo(): string // Déclarer le type de retour
    {
        // Retourner une chaîne de caractères décrivant la boisson
        return "Cette boisson est $this->temperature et $this->color.";
    }

    public function setColor(string $color): void //Nouvelle function pour changer de couler
    {
        $this->color = $color;
    }
}
//Creé une class a partir d une autre 
class Beer extends Beverage
{
    protected string $name;
    protected float $alcoholPercentage;

    public function __construct(string $name,  float $price, string $color, float $alcoholPercentage, string $temperature = 'cold')
    {
        //Appeler le constructeur de la classe parente
        parent::__construct($color,$price,$temperature);
        $this->name = $name;
        $this->alcoholPercentage = $alcoholPercentage;
    }
    public function getAlcoholPercentage(): string
    {

    return "L'alcol de cette boisson est $this->alcoholPercentage%";
    }

    protected function beerInfo(): string
    {
        return "Hi i'm Duvel and have an alcochol percentage of $this->alcoholPercentage% and I have a {$this->color} color.";
    }

    public function getBeerInfo(): string
    {
        return $this->beerInfo();
    }
}



//Creation d un nouvel objet Beverage représantant du Duvel
$Duvel = new Beer('Duvel', 3.5, 'blonde',8.5);

// Afficher les informations sur duvel 
echo "Info sur la Duvel:<br>";
echo "Couleur: " .$Duvel->getColor(). "<br>";
echo $Duvel->getInfo() . "<br>";
echo $Duvel->getAlcoholPercentage() . "<br>";
$Duvel->setColor('light');
echo "Nouvelle couleur du Duvel :" . $Duvel->getColor() . "<br>";
echo $Duvel->getBeerInfo() . "<br>" ;
?>
