<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmissionRecord;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class KalkulatorController extends Controller
{
    public function index(Request $request)
    {
        $date = $request->query('date') ? Carbon::parse($request->query('date')) : Carbon::today();
        
        $emissions = EmissionRecord::where('user_id', Auth::id())
                        ->whereDate('created_at', $date)
                        ->orderBy('created_at', 'desc')
                        ->get();
    
        return view('kalkulator', compact('emissions', 'date'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'transport' => 'required|string',
            'fuel_type' => 'nullable|string',
            'distance'  => 'required|numeric',
        ]);

        $transport = $validatedData['transport'];
        $fuelType  = $validatedData['fuel_type'] ?? null;
        $distance  = $validatedData['distance'];

        $emissionFactor = 0;

        switch ($transport) {
            case 'mobil':
                if ($fuelType === 'bensin') {
                    $emissionFactor = 0.21;
                } elseif ($fuelType === 'solar') {
                    $emissionFactor = 0.19;
                } elseif ($fuelType === 'listrik') {
                    $emissionFactor = 0.05;
                }
                break;
            case 'motor':
                $emissionFactor = 0.10;
                break;
            case 'sepeda':
                $emissionFactor = 0.00;
                break;
            case 'bus':
                $emissionFactor = 0.08;
                break;
            case 'kereta':
                $emissionFactor = 0.06;
                break;
            case 'pesawat':
                $emissionFactor = 0.24;
                break;
            default:
                $emissionFactor = 0;
        }

        $totalCO2 = $distance * $emissionFactor;

        $trees = $totalCO2 / 21.7;

        $record = EmissionRecord::create([
            'user_id'   => auth()->id(), // Ensure user is authenticated
            'transport' => $transport,
            'fuel_type' => $fuelType,
            'distance'  => $distance,
            'emission'  => $totalCO2,
            'trees'     => $trees,
        ]);

        return redirect()->back()->with('success', 'Data berhasil tersimpan');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'transport' => 'required|string',
            'fuel_type' => 'nullable|string',
            'distance'  => 'required|numeric',
        ]);

        $record = EmissionRecord::findOrFail($id);
        
        $transport = $validatedData['transport'];
        $fuelType  = $validatedData['fuel_type'] ?? null;
        $distance  = $validatedData['distance'];
        
        $emissionFactor = 0;
        switch ($transport) {
            case 'mobil':
                if ($fuelType === 'bensin') {
                    $emissionFactor = 0.21;
                } elseif ($fuelType === 'solar') {
                    $emissionFactor = 0.19;
                } elseif ($fuelType === 'listrik') {
                    $emissionFactor = 0.05;
                }
                break;
            case 'motor':
                $emissionFactor = 0.10;
                break;
            case 'sepeda':
                $emissionFactor = 0.00;
                break;
            case 'bus':
                $emissionFactor = 0.08;
                break;
            case 'kereta':
                $emissionFactor = 0.06;
                break;
            case 'pesawat':
                $emissionFactor = 0.24;
                break;
            default:
                $emissionFactor = 0;
        }
        
        $totalCO2 = $distance * $emissionFactor;
        $trees = $totalCO2 / 21.7;
        
        $record->update([
            'transport' => $transport,
            'fuel_type' => $fuelType,
            'distance'  => $distance,
            'emission'  => $totalCO2,
            'trees'     => $trees,
        ]);

        return redirect()->route('kalkulator')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $record = EmissionRecord::findOrFail($id);
        $record->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }

}
