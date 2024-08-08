<?php

namespace App\Livewire;

use App\Models\Area;
use App\Models\City;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Shipment extends Component
{
    public $cityID;

    public $contacts;

    public $areaID;

    public $zipCode;

    public $address;

    public $packages = [
        [],
    ];

    public $totalPackages;

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

    public function mount()
    {
        $this->contacts = Auth::user()->addresses->where('is_pickup', true);
    }

    public function addNewPackage()
    {
        $this->packages[] = [];
    }

    public function deletePackage($index)
    {
        unset($this->packages[$index]);
        array_values($this->packages);
    }

    //    public function rules()
    //    {
    //        $rules = [];
    //
    //        foreach ($this->packages as $index => $package) {
    //            $rules["packages.{$index}.description"] = 'required|string|max:255';
    //            $rules["packages.{$index}.weight"] = 'required|numeric|min:0';
    //            $rules["packages.{$index}.length"] = 'required|numeric|min:0';
    //            $rules["packages.{$index}.width"] = 'required|numeric|min:0';
    //            $rules["packages.{$index}.height"] = 'required|numeric|min:0';
    //        }
    //
    //        return $rules;
    //    }
    //
    //    public function messages()
    //    {
    //        $messages = [];
    //
    //        foreach ($this->request->get('packages') as $index => $package) {
    //            $messages["packages.{$index}.description"] = "Description for package #$index is required.";
    //            $messages["weight{$index}.required"] = "Weight for package #$index is required.";
    //            $messages["length{$index}.required"] = "Length for package #$index is required.";
    //            $messages["width{$index}.required"] = "Width for package #$index is required.";
    //            $messages["height{$index}.required"] = "Height for package #$index is required.";
    //        }
    //
    //        return $messages;
    //    }

    // Validation rules
    protected $rules = [
        'packages.*.description' => 'required|string|max:255',
        'packages.*.weight' => 'required|numeric|min:0',
        'packages.*.length' => 'required|numeric|min:0',
        'packages.*.width' => 'required|numeric|min:0',
        'packages.*.height' => 'required|numeric|min:0',
    ];

    // Validation messages
    protected $messages = [
        'packages.*.description.required' => 'Description is required.',
        'packages.*.weight.required' => 'Weight is required.',
        'packages.*.length.required' => 'Length is required.',
        'packages.*.width.required' => 'Width is required.',
        'packages.*.height.required' => 'Height is required.',
        'packages.*.weight.numeric' => 'Weight must be a number.',
        'packages.*.length.numeric' => 'Length must be a number.',
        'packages.*.width.numeric' => 'Width must be a number.',
        'packages.*.height.numeric' => 'Height must be a number.',
    ];

    // Save or submit method
    public function submit()
    {
        $this->validate();

        // Handle form submission logic here
    }

    //    public function save() {
    //        $this->validate();
    //    }
    //
    //    public function updated($propertyName) {
    //        $this->validateOnly($propertyName);
    //    }

    #[Layout('layouts.app')]
    public function render(): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
    {
        return view('livewire.shipment', [
            'cities' => $this->cities,
            'areas' => $this->areas,
            'totalPackages' => $this->totalPackages = count($this->packages),
        ]);
    }
}
