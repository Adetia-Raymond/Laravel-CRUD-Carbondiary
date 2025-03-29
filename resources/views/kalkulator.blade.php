@extends('carbonApp')

@section('content')

    <style>
        .main-title {
            color: #006769;
            font-size: 2.25rem;
            font-weight: 600;
            text-align: center;
            margin-top: 40px;
            margin-bottom: 60px;
        }

        .distance-title {
            color: #006769;
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 16px;
            text-align: center;
        }

        .slider-label {
            color: #000;
            font-size: 0.9375rem;
            font-weight: 600;
        }

        .emission-title {
            color: #006769;
            font-size: 19px;
            margin-bottom: 8px;
        }

        .emission-value {
            font-size: 20px;
            font-weight: 600;
            border: 1px solid #000;
            border-radius: 20px;
            background-color: #fff;
        }

        .emssion-box {
            margin-top: 20px;
            margin-bottom: 20px;
            margin-right: 60px;
            margin-left: 60px;
        }

        /************************************
                    TRANSPORT
        ************************************/
        .transport-container {
            display: flex;
            gap: 1rem;
        }

        .transport-option {
            opacity: 0.5;
            transition: opacity 0.3s ease;
            cursor: pointer;
        }

        .transport-option.active {
            opacity: 1;
        }

        .fuel-options.hidden {
            display: none;
        }

        .fuel-options {
            margin-top: 1rem;
            display: inline;
            gap: 1rem;
        }

        .fuels {
            margin-top: 1rem;
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-bottom: 40px;

        }

        .fuel-option {
            opacity: 0.5;
            cursor: pointer;
            transition: opacity 0.3s;
            text-align: center;
        }

        .fuel-option.active {
            opacity: 1;
        }

        /************************************
        * TRANSPORT SLIDER
        ************************************/
        .slider-container {
            width: 70%;
            margin: 0 auto;
            position: relative;
            display: flex;
        }

        .slider-bar {
            width: 100%;
            padding-right: 20px;
            padding-left: 20px;
            margin: 0 auto;
            position: relative;
        }

        .range-labels {
            display: flex;
            justify-content: space-between;
            margin-top: 8px;
            font-size: 18px;
            color: #006769;
        }

        /************************************
        * The Range Input (Slider)
        ************************************/
        .slider-container input[type="range"] {
            -webkit-appearance: none;
            width: 100%;
            height: 6px;
            background: #ccc;
            border-radius: 3px;
            outline: none;
            margin: 0;
            padding: 0;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        /* Chrome / Safari Track */
        .slider-container input[type="range"]::-webkit-slider-runnable-track {
            height: 6px;
            border-radius: 3px;
            background: linear-gradient(to right, #006769 0%, #006769 0%, #ccc 0%, #ccc 100%);
        }

        /* Firefox Track */
        .slider-container input[type="range"]::-moz-range-track {
            height: 6px;
            border-radius: 3px;
            background: linear-gradient(to right, #006769 0%, #006769 0%, #ccc 0%, #ccc 100%);
        }

        /* Thumb (Chrome / Safari) */
        .slider-container input[type="range"]::-webkit-slider-thumb {
            -webkit-appearance: none;
            height: 18px;
            width: 18px;
            background: #006769;
            border-radius: 50%;
            border: 2px solid #fff;
            box-shadow: 0 0 2px rgba(0, 0, 0, 0.3);
            margin-top: -7px;
            cursor: pointer;
        }

        /* Thumb (Firefox) */
        .slider-container input[type="range"]::-moz-range-thumb {
            height: 18px;
            width: 18px;
            background: #006769;
            border-radius: 50%;
            border: 2px solid #fff;
            box-shadow: 0 0 2px rgba(0, 0, 0, 0.3);
            cursor: pointer;
        }

        .slider-container input[type="range"]::-moz-focus-outer {
            border: 0;
        }

        .custom-table thead th {
            background-color: #006769 !important;
            color: white !important;
        }

        .custom-table tbody td {
            font-size: 20px;
        }

        .custom-table {
            border-radius: 10px;
            overflow: hidden;
            text-transform: capitalize;
            text-align: center;
            vertical-align: middle;
        }

        .edit-btn {
            --bs-btn-color: #fff;
            --bs-btn-bg: #003369;
            --bs-btn-border-color: #003369;
            --bs-btn-hover-color: #fff;
            --bs-btn-hover-bg: #001d3d;
            --bs-btn-hover-border-color: #001d3d;
            --bs-btn-focus-shadow-rgb: 60, 153, 110;
            --bs-btn-active-color: #fff;
            --bs-btn-active-bg: #001d3d;
            --bs-btn-active-border-color: #001d3d;
            --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
            --bs-btn-disabled-color: #fff;
            --bs-btn-disabled-bg: #001d3d;
            --bs-btn-disabled-border-color: #001d3d;
            font-size: 18px;
        }

        .delete-btn {
            --bs-btn-color: #fff;
            --bs-btn-bg: #690200;
            --bs-btn-border-color: #690200;
            --bs-btn-hover-color: #fff;
            --bs-btn-hover-bg: #2f0100;
            --bs-btn-hover-border-color: #2f0100;
            --bs-btn-focus-shadow-rgb: 60, 153, 110;
            --bs-btn-active-color: #fff;
            --bs-btn-active-bg: #2f0100;
            --bs-btn-active-border-color: #2f0100;
            --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
            --bs-btn-disabled-color: #fff;
            --bs-btn-disabled-bg: #2f0100;
            --bs-btn-disabled-border-color: #2f0100;
            font-size: 18px;
        }
    </style>

    <h2 class="main-title">Naik apa kamu hari ini?</h2>

    {{-- KALKULATOR UTAMA --}}
    @include('calculator-form', [
        'actionUrl' => route('storeTransport'),
        'transport' => '',
        'fuel_type' => '',
        'distance' => 0,
    ])

    <h3 class="mt-6 mb-2 main-title">Dairy Emisi Tanggal: {{ $date->format('d M Y') }}</h3>

    {{-- TABEL DATA  --}}
    @if ($emissions->count())
        <div class="container mt-1 table-wrapper">
            <table class="table table-striped table-hover custom-table">
                <thead>
                    <tr>
                        <th>Waktu Input</th>
                        <th>Transport</th>
                        <th>Bahan Bakar</th>
                        <th>Jarak (km)</th>
                        <th>Emisi (kg CO₂)</th>
                        <th>Setara Pohon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($emissions as $perData)
                        <tr>
                            <td>{{ $perData->created_at->format('H:i:s') }}</td>
                            <td>{{ ucfirst($perData->transport) }}</td>
                            <td>{{ $perData->fuel_type ? ucfirst($perData->fuel_type) : '-' }}</td>
                            <td>{{ $perData->distance }}</td>
                            <td>{{ number_format($perData->emission, 2) }}</td>
                            <td>{{ number_format($perData->trees, 2) }}</td>
                            <td>
                                {{-- TOMBOL FUNGSI EDIT --}}
                                <button class="btn btn-warning edit-btn" data-id="{{ $perData->id }}"
                                    data-transport="{{ $perData->transport }}" data-fuel-type="{{ $perData->fuel_type }}"
                                    data-distance="{{ $perData->distance }}"
                                    onclick="openEditModal({{ $perData }})">
                                    Edit
                                </button>

                                {{-- TOMBOL FUNGSI DELETE --}}
                                <form action="{{ route('deleteTransport', $perData->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-warning delete-btn"
                                        onclick="return confirm('Konfirmasi Hapus Data')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="main-title fs-5">*Tidak ada data input untuk tanggal {{ $date->format('d M Y') }}.</p>
    @endif

    {{-- EDIT MODAL --}}
    <div class="modal fade modal-xl" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                {{-- KALKULATOR EDIT --}}
                <div class="modal-body">
                    @include('edit-calculator-form', [
                        'actionUrl' => '', // will be set dynamically via JS
                        'transport' => '',
                        'fuel_type' => '',
                        'distance' => 0,
                    ])
                </div>
            </div>
        </div>
    </div>

    <script>
        // FUNGSI EDIT MODAL
        function openEditModal(record) {
            // SET ACTION FORM
            document.getElementById('editCalcForm').action = '/update-transport/' + record.id;
            // DATA
            document.getElementById('edit-transport-input').value = record.transport;
            document.getElementById('edit-fuel-type-input').value = record.fuel_type;
            document.getElementById('edit-distance').value = record.distance;
            document.getElementById('edit-distance-display').textContent = record.distance;
            recalcEditEmissions();

            // TAMPILKAN MODAL
            var editModal = new bootstrap.Modal(document.getElementById('editModal'));
            editModal.show();
        }

        document.addEventListener('DOMContentLoaded', function() {
            updateCreateDistance(document.getElementById('create-distance').value);
        });
    </script>

@endsection
