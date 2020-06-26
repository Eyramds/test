<?php
namespace App;

class ProviderFacebook extends AbstractProvider
{

    protected $data = [
        "name" => "Facebook",
        "redirect_uri" => "http://localhost:8000",
    ];

    protected $clientId;
    protected $clientSecret;
    protected $uri = "https://graph.facebook.com/v7.0/";
    protected $accessLink = "https://www.facebook.com/v7.0/dialog/oauth";
    protected $uriAuth = "https://graph.facebook.com/v7.0/oauth/access_token";

    public function __construct(string $client_id, string $client_secret)
    {
        $this->clientId = $client_id;
        $this->clientSecret = $client_secret;
    }

    public function getUserData()
    {
        return $this->callback("/me");
    }
}