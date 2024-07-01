<?php

declare(strict_types=1);

class Beverage
{
    // Propriétés
    private string $color; // La couleur de la boisson
    private float $price; // Le prix de la boisson
    private string $temperature; // La température de la boisson

    private static string $address = "Melkmarkt 9, 2000 Antwerpen";

    public const barname = "Het Vervolg";

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
        return "Cette boisson est $this->temperature et $this->color and elle est vendu au " . self::barname . ".";
    }
    // Getter pour la couleur
    public function getColor(): string
    {
        return $this->color;
    }
    // Setter pour la couleur
    public function setColor(string $color): void
    {
        $this->color = $color;
    }
    public static function getAddress(): string
    {
        return self::$address;
    }
}
//Creé une class a partir d une autre 
class Beer extends Beverage
{
    private string $name;
    private float $alcoholPercentage;

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
}

// Création d'un nouvel objet Beverage représentant du cola
$cola = new Beverage('black', 2.0);

//Creation d un nouvel objet Beverage représantant du Duvel
$Duvel = new Beer('Duvel', 3.5, 'blonde',8.5);

echo "Info sur la cola: <br>";
echo $cola->getInfo() . "<br>";
// Afficher les informations sur duvel 
echo "Info sur la Duvel:<br>";
echo $Duvel->getInfo() . "<br>";
echo $Duvel->getAlcoholPercentage() . "<br>";
echo "Nom du bar : " . Beverage::barname . "<br>";

//Print de l addresse 
echo "Addresse du bar:" . Beverage::getAddress() . "<br>";
echo "Addresse du bar:" . $Duvel::getAddress() . "<br>";
?>
