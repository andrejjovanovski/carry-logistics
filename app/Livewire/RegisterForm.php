<?php

namespace App\Livewire;

use App\Models\Area;
use App\Models\City;
use Livewire\Attributes\Layout;
use Livewire\Component;

class RegisterForm extends Component
{
    public $name;

    public $email;

    public $gender;

    public $date_of_birth;

    public $phone_number;

    public $address;

    public $password;

    public $cityID;

    public $areaID;

    public $zipCode;

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

    #[Layout('layouts.guest')]
    public function render(): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
    {
        return view('livewire.register', [
            'cities' => $this->cities,
            'areas' => $this->areas,
        ]);
    }
}
