<?php

class Api
{
    private PDO $connect;

    public function __construct()
    {
        $this->connect = new PDO('mysql:host=localhost;dbname=partners_filter;charset=utf8', 'root', 'root');
    }

    protected function makeQuery(string $query): array
    {
        return $this->connect->query($query)
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    protected function getTypes(): ?array
    {
        $query = "SELECT status_name FROM statuses ORDER BY status_id ASC";

        return $this->makeQuery($query);
    }

    protected function getCountries(): ?array
    {
        $query = "SELECT name FROM loc_country";

        return $this->makeQuery($query);
    }

    protected function getStates(): ?array
    {
        $query = "SELECT name FROM loc_state";

        return $this->makeQuery($query);
    }

    public function getData(): ?array
    {
        return [
            'types' => $this->getTypes(),
            'countries' => $this->getCountries(),
            'states' => $this->getStates()
        ];
    }

    public function getPartners(string $status): array|string
    {
        define('NOT_FOUND_TEXT', 'Your search parameters did not match any partners. Please try different search.');

        $queryString = "SELECT * FROM partner_locator WHERE `status` = ?";

        $query = $this->connect->prepare($queryString);
        $query->execute([$status]);

        $partners = $query->fetchAll(PDO::FETCH_ASSOC);

        return !empty($partners) ? $partners : NOT_FOUND_TEXT;
    }
}