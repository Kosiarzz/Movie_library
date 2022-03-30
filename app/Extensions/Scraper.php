<?php 

namespace App\Extensions;

use Goutte\Client;

class Scraper
{
    //Adres z którego sa pobierane dane
    protected $url = 'https://www.filmweb.pl/films/search?';

    //Lista pobranych danych
    private $results = [];

    //Pobranie wszystkich filmów o podanej nazwie
    public function getMovies(string $movieName)
    {
        //Parametry filtrowania - pobieranie od największej popularności
        $parameters = [
            'orderBy' => 'popularity',
            'descending' => true,
            'q' => $movieName,
        ];

        $link = http_build_query($parameters);

        //Pobranie danych
        $goutteClient = new Client();
        $crawler = $goutteClient->request('GET', $this->url.$link);

        //Filtrowanie danych
        $crawler->filter('.hits__item')->each(function ($node) 
        {
            $this->results[] = [
                'title' => $node->filter('.filmPreview__title')->text('Brak tytułu'), //Tytuł filmu
                'year' => $node->filter('.filmPreview__year')->attr('content'), //Data premiery
                'original_title' => $node->filter('.filmPreview__originalTitle')->text('Brak oryginalnego tytułu'), //Oryginalna nazwa
                'time' => $node->filter('.filmPreview__filmTime')->text('Brak czasu trwania'), //Czas trwania
                'rate' => $node->filter('.rateBox__rate')->text('Brak oceny'), //Ocena
                'votes' => $node->filter('.rateBox__votes--count')->text('Brak ilości głosów'), //Ilośc głosów
                'description' => $node->filter('.filmPreview__description p')->text('Brak opisu'), //Krótki opis filmu
                'genres' => $node->filter('.filmPreview__info--genres a')->text('Brak gatunku'), //Gatunek
                'country' => $node->filter('.filmPreview__info--countries a')->text('Brak kraju'), //Produkcja
                'directors' => $node->filter('.filmPreview__info--directors ul')->text('Brak reżysera'), //Reżyser
                'cast' => $node->filter('.filmPreview__info--cast ul')->text('Brak danych'), //Obsada
                'img' => $node->filter('.poster__image')->attr('content'), //Zdjęcie
            ];
        });
        
        return $this->results;
    }

}