<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Apis\ResVoyageApi;
use Illuminate\Support\Facades\App;

class Flights extends Component
{

    // protected $listeners = ['searchAirportCity' => 'searchAirportCity'];
    protected $listeners = ['searchAirportCity'];

    private $api;

    public $area, $country, $city;

    public $trip, $plan;
    public $adults;
    public $from1, $to1, $from2, $to2;
    public $departure1, $departure2;

    public $airportcities = array();
    public $flights = array();

    public function mount($area = '', $country = '', $city = '')
    {
        $this->area = $area;
        $this->country = $country;
        $this->city = $city;
    }

    public function render()
    {
        return view('livewire.flights')
                ->extends('layouts.app');
    }

    public function searchAirportCity($name)
    {
        $api = App::make(ResVoyageApi::class);
        $this->airportcities =  $api->searchAirportCity($name);
    }
}
