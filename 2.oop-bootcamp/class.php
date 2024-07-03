<?php

declare(strict_types=1);

class Student
{
    public string $name;
    public float $grade;

    public function __construct(string $name, float $grade)
    {
        $this->name = $name;
        $this->grade = $grade;
    }
}

class Group 
{
   private array $students = [];

   public function addStudent(Student $student): void
   {
    $this->students[] = $student;
   }

   public function getAverageGrade(): float 
   {
    $totalGrades = array_reduce($this->students, fn($carry,$student) => $carry + $student->grade, 0);
    return $totalGrades / count($this->students);
   }

   public function getHighestScoringStudent(): Student
   {
    return array_reduce($this->students, fn($highest, $student) => $student->grade > $highest->grade ? $student : $highest, $this->students[0]);
   }
   public function getLowestScoringStudent(): Student
    {
        return array_reduce($this->students, fn($lowest, $student) => $student->grade < $lowest->grade ? $student : $lowest, $this->students[0]);
    }
    public function removeStudent(Student $student): void
    {
        $this->students = array_filter($this->students, fn($s) => $s !== $student);
    }
    public function displayStudents(): void
    {
        foreach ($this->students as $student) {
            echo $student->name . ' has grade ' . $student->grade . '<br>';
        }
    }
}

//Creation des groups et des students 
$group1 = new Group();
$group2 = new Group();

$studentsGroup1 = [
    new Student('Alice', 8.5),
    new Student('Bob', 7.0),
    new Student('Charlie', 9.0),
    new Student('David', 6.5),
    new Student('Eve', 7.5),
    new Student('Frank', 8.0),
    new Student('Grace', 9.5),
    new Student('Hank', 7.0),
    new Student('Ivy', 8.5),
    new Student('Jack', 6.0)
];

$studentsGroup2 = [
    new Student('Karen', 5.5),
    new Student('Leo', 6.5),
    new Student('Mallory', 7.5),
    new Student('Nina', 8.5),
    new Student('Oscar', 9.0),
    new Student('Peggy', 7.0),
    new Student('Quentin', 6.0),
    new Student('Rudy', 5.0),
    new Student('Sybil', 8.0),
    new Student('Trent', 6.5)
];

foreach ($studentsGroup1 as $student) {
    $group1->addStudent($student);
}

foreach ($studentsGroup2 as $students) {
    $group2->addStudent($student);
}

echo 'Moyenne des votes du group 1: ' . number_format($group1->getAverageGrade(),2) . '<br>';
echo 'Moyenne des votes du group 2: ' . number_format($group2->getAverageGrade(),2) . '<br>';

$highestInGroup1 = $group1->getHighestScoringStudent();
$lowestInGroup2 = $group2->getLowestScoringStudent();

$group1->removeStudent($highestInGroup1);
$group2->removeStudent($lowestInGroup2);

$group1->addStudent($lowestInGroup2);
$group2->addStudent($highestInGroup1);

// Recalcul de la mmoyenne des votes apres changement du meilleur student
echo 'Moyenne des votes du group 1 apres deplacement: ' . number_format($group1->getAverageGrade(), 2) . '<br>';
echo 'Moyenne des votes du group 2 apres deplacement: ' . number_format($group2->getAverageGrade(), 2) . '<br>';

?>