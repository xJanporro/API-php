<?php

declare(strict_types=1);

class NextMovie
{

    public function __construct(
        private int $days_until,
        private string $title,
        private string $following_production,
        private string $release_date,
        private string $poster_url,
        private string $overview
    ) {}

    public function get_until_message(): string
    {

        $days = $this->days_until;

        return match (TRUE) {
            $days === 0 => "Hoy se estrena",
            $days === 1 => "Mañana se estrena",
            $days < 7   => "Esta semana se estrena",
            $days < 30  => "Menos de $days dias",
            default     => "En $days dias se estrena",
        };
    }

    public static function fetchAndCreateMovie(string $api_url): NextMovie
    {

        $result = file_get_contents($api_url); //file_get_contents es solo para get request 
        $data = json_decode($result, true);

        return new self(
            $data['days_until'],
            $data['title'],
            $data['following_production']['title'] ?? 'Desconocido',
            $data['release_date'],
            $data['poster_url'],
            $data['overview']
        );
    }

    public function getData()
    {
        return get_object_vars($this);
    }
}
