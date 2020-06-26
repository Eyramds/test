<?php

namespace App;

interface ProviderInterface
{
    public function __construct(string $client_id, string $client_secret);

    public function getLink(): string;

//    public function getCode(): ?string;

//    function getToken(): ?string;

    public function getUserData();
}