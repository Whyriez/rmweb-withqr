@extends('layouts.admin')
@section('title', 'Laporan')
@section('laporan', 'bg-gray-100 dark:bg-gray-700')

@section('content')
    <div class="w-full mx-auto bg-white dark:bg-gray-900 border border-gray-200 rounded-lg shadow-lg p-6">
        <div class="flex justify-between mb-4">
            <h2 class="text-xl font-bold text-gray-900 dark:text-white">Laporan Bulanan</h2>
            <span class="text-gray-700 dark:text-gray-400">Date: {{ $bulan }},
                {{ $tahun }}</span>
        </div>
        <hr class="my-4 border-gray-200 dark:border-gray-700">
        <div class="overflow-x-auto">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden shadow">
                    <table
                        class="w-full mb-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text-left font-semibold text-gray-900 dark:text-white">No</th>
                                <th class="px-4 py-2 text-left font-semibold text-gray-900 dark:text-white">Menu</th>
                                <th class="px-4 py-2 text-left font-semibold text-gray-900 dark:text-white">Jumlah</th>
                                <th class="px-4 py-2 text-left font-semibold text-gray-900 dark:text-white">No Meja</th>
                                <th class="px-4 py-2 font-semibold text-gray-900 dark:text-white">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $totalAmount = 0;
                            @endphp
                            @foreach ($pendapatanHarian as $item)
                                @foreach ($item->detailTransaksi as $detail)
                                    <tr>
                                        <td class="px-4 py-2 text-left text-gray-900 dark:text-white">{{ $loop->iteration }}
                                        </td>
                                        <td class="px-4 py-2 text-left text-gray-900 dark:text-white">
                                            {{ $detail->menu->Menu }}
                                        </td>
                                        <td class="px-4 py-2 text-left text-gray-900 dark:text-white">{{ $detail->qty }}
                                        </td>
                                        <td class="px-4 py-2 text-left text-gray-900 dark:text-white">{{ $detail->meja }}
                                        </td>
                                        <td class="px-4 py-2 font-semibold text-center text-gray-900 dark:text-white">
                                            {{ $detail->menu->harga }}</td>
                                    </tr>

                                    @php
                                        $totalAmount += $detail->menu->harga;
                                    @endphp
                                @endforeach
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" class="px-4 py-2 text-left font-semibold text-gray-900 dark:text-white">
                                    Total
                                </td>
                                <td class="px-4 py-2 font-semibold text-center text-gray-900 dark:text-white">
                                    {{ $totalAmount }}
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>



        <div class="text-right flex justify-center" id="non-printable">
            <button id="print-window"
                class="px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Print</button>
        </div>
    </div>

@endsection
