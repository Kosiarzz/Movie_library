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
                'title' => $node->filter('.preview__title')->text('Brak tytułu'), //Tytuł filmu (filmPreview__title)
                'year' => $node->filter('.preview__year')->text('Brak daty'), //Data premiery
                'original_title' => $node->filter('.preview__originalTitle')->text('Brak oryginalnego tytułu'), //Oryginalna nazwa
                'time' => $node->filter('.preview__duration')->text('Brak czasu trwania'), //Czas trwania
                'rate' => $node->filter('.communityRatings__value')->text('Brak oceny'), //Ocena
                'votes' => $node->filter('span .communityRatings__value')->text('Brak'), //Ilośc głosów
                'description' => $node->filter('.preview__description p')->text('Brak opisu'), //Krótki opis filmu
                'genres' => $node->filter('.preview__detail--genres h3 a')->text('Brak gatunku'), //Gatunek
                'country' => $node->filter('.preview__info--countries a')->text('Brak kraju'), //Produkcja
                'directors' => $node->filter('.preview__info--directors ul')->text('Brak reżysera'), //Reżyser
                'cast' => $node->filter('.preview__detail--cast')->text('Brak danych'), //Obsada
                'img' => $node->filter('.poster__image')->attr('content'), //Zdjęcie
            ];
        });
        
        return $this->results;
    }

}