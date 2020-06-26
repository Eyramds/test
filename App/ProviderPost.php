<?php
namespace App;

class ProviderPost extends AbstractProvider
{

    protected $data = [
        "name" => "Test",
        "redirect_uri" => "http://localhost:8000",
        "redirect_errors" => "",
        "access_link" => "https://www.facebook.com/v7.0/dialog/oauth",
        "token-url" => "",
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

        $_SESSION["state-facebook"] = random_bytes(12);
    }

    public function getUserData()
    {
        // TODO: Implement getUserData() method.
    }
}