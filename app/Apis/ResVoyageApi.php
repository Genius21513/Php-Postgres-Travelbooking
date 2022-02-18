<?php

namespace App\Apis;

use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use Exception;

class ResVoyageApi
{
    const AUTH_ENDPOINT                     = "public/token";

    const AIRLINE_SEARCH_ENDPOINT           = "air/references/airlines";
    const AIRPORT_CITY_SEARCH_ENDPOINT      = "air/references/airports";
    const AIR_SEARCH_ENDPOINT               = "air/search";

    const DESTINATION_SEARCH_ENDPOINT       = "hotel/references/destination/";

    const HOTEL_SEARCH_ENDPOINT             = "hotel/search";
    const HOTEL_DETAILS_ENDPOINT            = "hotel/details";

    const CAR_SEARCH_ENDPOINT               = "car/search";
    const CAR_DETAILS_ENDPOINT              = "car/details";

    private $base_url = null;
    private $clientname = null;
    private $access_token = null;
    private $expires_at = null;

    public function __construct()
    {
        $this->base_url = config('resvoyage.base_url').'api/v1/';
        $this->clientname = config('resvoyage.client_name');
    }

    private function isAuthenticated() : bool
    {
        return !is_null($this->access_token) && !is_null($this->expires_at) && Carbon::now()->lessThan($this->expires_at);
    }

    private function authenticate()
    {
        $response = Http::withOptions([
            'verify' => false,
        ])->get($this->base_url.ResVoyageApi::AUTH_ENDPOINT, [
            'clientname' => $this->clientname
        ]);


        if ($response->ok())
        {
            $this->access_token = $response->json()['Token'];
            $this->expires_at = Carbon::now()->addMinutes(300);
        }
        else
        {
            throw new Exception($response->status());
        }
    }

    public function searchAirportCity($name) : array
    {
        if (!$this->isAuthenticated())
        {
            $this->Authenticate();
        }
        $endpoint = $this->base_url.ResVoyageApi::AIRPORT_CITY_SEARCH_ENDPOINT;

        $response = Http::withToken($this->access_token)->withOptions([
            'verify' => false,
        ])->get($endpoint,
            [
                'search' => $name
            ]
        );

        if ($response->ok())
        {
            if ($response->json() == null) return array();
            return $response->json();
        }
        else
        {
            throw new Exception($response->status());
        }

    }

    public function searchAir($from, $to, $departureDate, $adults) : array
    {
        if (!$this->isAuthenticated())
        {
            $this->Authenticate();
        }
        $endpoint = $this->base_url.ResVoyageApi::AIR_SEARCH_ENDPOINT;

        $response = Http::withToken($this->access_token)->withOptions([
            'verify' => false,
        ])->get($endpoint,
            [
                'from1' => $from,
                'to1' => $to,
                'DepartureDate1' => $departureDate,
                'Adults' => $adults,
            ]
        );

        if ($response->ok())
        {
            return $response->json();
        }
        else
        {
            throw new Exception($response->status());
        }

    }

    public function searchDestination ($dest) : array
    {
        if (!$this->isAuthenticated())
        {
            $this->Authenticate();
        }
        $endpoint = $this->base_url.ResVoyageApi::DESTINATION_SEARCH_ENDPOINT.$dest;

        $response = Http::withToken($this->access_token)->withOptions([
            'verify' => false,
        ])->get($endpoint);

        if ($response->ok())
        {
            return $response->json();
        }
        else
        {
            throw new Exception($response->status());
        }

    }

    public function searchHotel ($from, $to, $departureDate, $adults) : array
    {
        if (!$this->isAuthenticated())
        {
            $this->Authenticate();
        }
        $endpoint = $this->base_url.ResVoyageApi::HOTEL_SEARCH_ENDPOINT;

        $response = Http::withToken($this->access_token)->withOptions([
            'verify' => false,
        ])->get($endpoint,
            [
                'from1' => $from,
                'to1' => $to,
                'DepartureDate1' => $departureDate,
                'Adults' => $adults,
            ]
        );

        if ($response->ok())
        {
            return $response->json();
        }
        else
        {
            throw new Exception($response->status());
        }

    }

    public function getHotelDetails ($sessionId, $id) : array
    {
        if (!$this->isAuthenticated())
        {
            $this->Authenticate();
        }
        $endpoint = $this->base_url.ResVoyageApi::HOTEL_DETAILS_ENDPOINT;

        $response = Http::withToken($this->access_token)->withOptions([
            'verify' => false,
        ])->get($endpoint,
            [
                'SessionId' => $sessionId,
                'HotelId' => $id
            ]
        );

        if ($response->ok())
        {
            return $response->json();
        }
        else
        {
            throw new Exception($response->status());
        }

    }
}
