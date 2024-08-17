<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateShipmentRequest;
use App\Models\Area;
use App\Models\City;
use App\Models\Package;
use App\Models\PaymentMethod;
use App\Models\Shipment;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShipmentController extends Controller
{
    use ValidatesRequests;

    public $packages = [
        [],
    ];

    private int $totalPackages;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shipments = Shipment::with('city')
            ->withCount('packages')
            ->get();

        return view('shipment.index', compact('shipments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $contacts = Auth::user()->addresses->where('is_pickup', true);
        $paymentMethods = PaymentMethod::all();
        //        dd($paymentMethods);
        $cities = City::all();
        $areas = Area::all();
        $totalPackages = $this->totalPackages = count($this->packages);
        $packages = $this->packages;

        return view('shipment.create', compact('contacts', 'cities', 'areas', 'totalPackages', 'packages', 'paymentMethods'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Define validation rules for the fields, including dynamic package fields
        $rules = [
            'pickup_address_id' => 'required|exists:addresses,id',
            'delivery_reference' => 'required|string|max:255',
            'pickup_date' => 'required|date',
            'pickup_time_one' => 'required|date_format:H:i',
            'pickup_time_two' => 'required|date_format:H:i|after:pickup_time_one',
            'pickup_driver_note' => 'nullable|string|max:255',
            'delivery_name' => 'required|string|max:255',
            'delivery_phone_number' => 'required|string|max:255',
            'city_id' => 'required|exists:cities,id',
            'area_id' => 'required|exists:areas,id',
            'delivery_address' => 'required|string|max:255',
            'delivery_note' => 'nullable|string|max:255',
            'packages' => 'required|array|min:1', // Ensure at least one package is submitted
            'packages.*.weight' => 'required|numeric',
            'packages.*.length' => 'required|numeric',
            'packages.*.width' => 'required|numeric',
            'packages.*.height' => 'required|numeric',
            'packages.*.description' => 'required|string|max:255',
        ];

        $request->validate($rules);

        $uniqueString = generateUniqueString(16);
        // Create the shipment record
        $shipment = Shipment::create([
            'user_id' => Auth::id(),
            'shipment_number' => $uniqueString,
            'pickup_address_id' => $request->pickup_address_id,
            'delivery_reference' => $request->delivery_reference,
            'pickup_date' => $request->pickup_date,
            'pickup_time' => "{$request->pickup_time_one} - {$request->pickup_time_two}",
            'note_for_pickup_driver' => $request->pickup_driver_note,
            'delivery_name' => $request->delivery_name,
            'delivery_phone_number' => $request->delivery_phone_number,
            'delivery_country_id' => '128',
            'delivery_city_id' => $request->city_id,
            'delivery_area_id' => $request->area_id,
            'delivery_address' => $request->delivery_address,
            'delivery_note' => $request->delivery_note,
            'shipping_type_id' => $request->shipment_type_id,
            'payment_method_id' => $request->payment_method_id,
        ]);
        $latestShipment = Shipment::latest()->first();
        $latestShipmentId = $latestShipment?->id;

        // Iterate over packages and create each one
        foreach ($request->packages as $package) {
            $shipment->packages()->create([
                'shipment_id' => $latestShipmentId,
                'weight' => $package['weight'],
                'length' => $package['length'],
                'width' => $package['width'],
                'height' => $package['height'],
                'description' => $package['description'],
                'dangerous_good' => 1,
                'fragile_good' => 1,
                'un_number' => 1,
            ]);
        }

        return redirect()->route('shipment.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Shipment $shipment)
    {

        $shipment->load('country', 'city', 'area', 'packages', 'paymentMethod', 'pickupAddress');

        //        dd($shipment);
        return view('shipment.show', compact('shipment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shipment $shipment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShipmentRequest $request, Shipment $shipment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shipment $shipment)
    {

        $shipment->delete();

        return redirect()->route('shipment.index')->with('success', 'Shipment has been deleted');
    }

    public function getAreas(City $city)
    {
        return response()->json($city->areas);
    }

    public function getZipCode(Area $area)
    {
        return response()->json(['zip_code' => $area->zip_code]);
    }
}
