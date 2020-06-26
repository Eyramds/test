<?php


namespace App;


abstract class AbstractProvider implements ProviderInterface
{
    protected $hello;

    public function getLink(): string
    {
        return $this->accessLink . "?client_id=" . $this->clientId . "&redirect_uri=" . $this->data['redirect_uri'] . "&state=provider-" . $this->data["name"];
    }

    private function getToken(): ?string
    {
        if (isset($_GET["error"])) {
            [
                "error_reason" => $error_reason,
                "error" => $error,
                "error_description" => $error_description
            ] = $_GET;

            echo $error;
            die;
        }

        [
            "code" => $code,
            "state" => $state,
        ] = $_GET;

        if ("provider-Facebook" === $state) {

            $surl = "{$this->uriAuth}?client_id={$this->clientId}&redirect_uri={$this->data['redirect_uri']}&client_secret={$this->clientSecret}&code={$code}";

            $result = json_decode(file_get_contents($surl), true);
            ['access_token' => $access_token] = $result;


            return $access_token;

        } else {
            throw new \Exception("Bad response");
        }

    }

    public function callback(string $path)
    {
        $token = $this->getToken();

        // Get userdata with access_token
        $sapi = $this->uri . "/" . $path;
        $rs = curl_init($sapi);
        curl_setopt($rs, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($rs, CURLOPT_HEADER, 0);
        curl_setopt($rs, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer {$token}"
        ]);
        $result = curl_exec($rs);
        curl_close($rs);
        return $result;
    }

}