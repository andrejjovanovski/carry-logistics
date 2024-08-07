<?php

namespace App\Livewire;

use App\Models\Area;
use App\Models\City;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Shipment extends Component
{
    public $cityID;

    public $areaID;

    public $zipCode;

    public $pickupName;

    public function updatedCityID(): void
    {
        $this->reset('areaID', 'zipCode');
        $this->areas = Area::where('city_id', $this->cityID)->get();
    }

    public function updatedAreaID($value): void
    {
        $this->zipCode = Area::find($value)->zip_code ?? null;
    }

    public function getCitiesProperty(): \Illuminate\Database\Eloquent\Collection
    {
        return City::all();
    }

    public function getAreasProperty()
    {
        return Area::where('city_id', $this->cityID)->get();
    }

    #[Layout('layouts.app')]
    public function render(): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
    {
        return view('livewire.shipment', [
            'cities' => $this->cities,
            'areas' => $this->areas,
            'pickupName' => User::query()->find(Auth::user()->name),
        ]);
    }
}
