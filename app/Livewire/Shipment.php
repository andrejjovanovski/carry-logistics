<?php

namespace App\Livewire;

use App\Models\Area;
use App\Models\City;
use App\Models\Package;
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

    public $shipment_number;

    public $pickup_date;

    public $pickup_time_one;

    public $pickup_time_two;

    public $note_for_pickup_driver;

    public $delivery_name;

    public $delivery_email;

    public $delivery_phone_number;

    public $delivery_address;

    public $delivery_note;

    public $delivery_reference;

    public $shipment_type_id;

    public $payment_method_id;

    public $pickup_address_id;

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
        $this->packages = array_values($this->packages); // Re-index the array
    }

    // Validation rules
    protected $rules = [
        'packages.*.description' => 'required|string|max:255',
        'packages.*.weight' => 'required|numeric|min:0',
        'packages.*.length' => 'required|numeric|min:0',
        'packages.*.width' => 'required|numeric|min:0',
        'packages.*.height' => 'required|numeric|min:0',
        'pickup_date' => 'bail|required|date',
        'pickup_time_one' => 'bail|required',
        'pickup_time_two' => 'bail|required',
        'delivery_name' => 'bail|required',
        'delivery_email' => 'email',
        'delivery_phone_number' => 'bail|numeric',
        'delivery_address' => 'bail|required|string',
        //        'shipment_type_id' => 'bail|required',
        //        'payment_method_id' => 'bail|required',
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

    public function submit()
    {
        $this->validate([
            $this->rules,
        ]);

        $uniqueString = generateUniqueString(16);

        \App\Models\Shipment::create([
            'user_id' => Auth::user()->id,
            'shipment_number' => $uniqueString,
            'pickup_address_id' => '1',
            'delivery_name' => $this->delivery_name,
            'delivery_email' => $this->delivery_email,
            'delivery_phone_number' => $this->delivery_phone_number,
            'delivery_country_id' => '128',
            'delivery_city_id' => $this->cityID,
            'delivery_area_id' => $this->areaID,
            'delivery_address' => $this->delivery_address,
            'delivery_note' => $this->delivery_note,
            'delivery_reference' => $this->delivery_reference,
            'pickup_date' => $this->pickup_date,
            'pickup_time_one' => $this->pickup_time_one,
            'pickup_time_two' => $this->pickup_time_two,
            'note_for_pickup_driver' => $this->note_for_pickup_driver,
            'shipment_type_id' => '1',
            'payment_method_id' => '1',
        ]);

        foreach ($this->packages as $package) {
            Package::create([
                'shipment_id' => \App\Models\Shipment::latest()->first()->id,
                'description' => $package['description'],
                'weight' => $package['weight'],
                'length' => $package['length'],
                'width' => $package['width'],
                'height' => $package['height'],
            ]);
        }

        return redirect('/shipment');
    }

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
