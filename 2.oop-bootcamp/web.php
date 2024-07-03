<?php

declare(strict_types=1);

class Content 
{
    protected string $text;
    protected string $title;

    public function __construct(string $text,string $title)
    {
        $this->text = $text;
        $this->title = $title;
        
    }

    public function getTitle(): string{
        return $this->title;
    }

    public function getText(): string {
        return $this->text;
    }

    public function getFormattedTitle(): string {
        return $this->title;
    }

    
}

class Article extends Content
{
    private bool $isBreakingnews;
    public function __construct(string $title, string $text, bool $isBreakingnews = false)
    {
        parent::__construct($title,$text);
        $this->isBreakingnews = $isBreakingnews;
    }
    public function getFormattedTitle(): string
    {
        return $this->isBreakingnews ? 'BREAKING: ' . $this->title : $this->title;
    }
}

class Ads extends Content
{
    public function getFormattedTitle(): string
    {
       return strtoupper($this->title);
    }

}

class Vacancies extends Content 
{
    public function getFormattedTitle(): string
    {
        return $this->title . ' -postulez maintenant !';
    }
}

$contents = [
    new Article ('New PHP Version Relased',  'PHP 8.1 has been released with new features.', true),
    new Article ('Introduction to OOP', 'This article explains the basics of Object-Oriented Programming.'),
    new Ads ('Black Friday Sale', 'Get up to 50% of on all products!'),
    new Vacancies('Software Developer Position', 'We are looking for a skilled software developer.')
];

foreach ($contents as $content) {
    echo '<h1>' . htmlspecialchars($content->getFormattedTitle()) . '</h1>';
    echo '<p>' . htmlspecialchars($content->getText()) . '</p>';
}