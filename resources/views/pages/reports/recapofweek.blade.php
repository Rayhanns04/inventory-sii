@extends('../layout/side-menu')

@section('subhead')
    <title>{{ $TITLE }}</title>
@endsection

@section('subcontent')
    <h2 class="intro-y text-lg font-medium mt-10">Data Rekap per Minggu</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            {{-- <button class="tooltip btn btn-outline-primary shadow-md mr-2" title="Import Room">
                <i class="w-4 h-4" data-feather="upload"></i>
            </button> --}}

            {{-- Import Excel --}}
            <a href="/recap-of-week-export" class="tooltip btn btn-outline-primary shadow-md mr-2"
                title="Export Recap per Minggu">
                <i class="w-4 h-4" data-feather="download"></i>
            </a>

            {{-- Plus --}}
            <a href="javascript:;" class="tooltip btn btn-primary shadow-md mr-2" title="Tambah Recap per Minggu"
                data-toggle="modal" data-target="#header-footer-modal-preview">
                <i class="w-4 h-4" data-feather="plus"></i>
            </a>

            {{-- Mass Delete --}}
            <button class="disabled:opacity-50 tooltip btn text-white bg-red-300 shadow-md mr-2"
                title="Hapus Room yang dipilih">
                <i class="w-4 h-4" data-feather="trash-2"></i>
            </button>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0 mr-1">
                <div class="w-56 relative text-gray-700 dark:text-gray-300">
                    <input type="text" class="form-control w-56 box pr-10 placeholder-theme-13" placeholder="Search...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>
                </div>
            </div>
            <a href="" class="tooltip btn btn-link box shadow-md ml-1" title="Reset All Filter">
                <i class="w-5 h-5" data-feather="refresh-cw"></i>
            </a>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="text-center whitespace-nowrap">
                            #
                        </th>
                        <th class="whitespace-nowrap w-150">Lantai</th>
                        <th class="whitespace-nowrap w-150">Ruang</th>
                        <th class="whitespace-nowrap">Barang</th>
                        <th class="whitespace-nowrap">Note</th>
                        @foreach ($conditions as $condition)
                            <th class="whitespace-nowrap ">{{ $condition->name }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reports as $report)
                        <tr>
                            <td class="w-10">
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                <span class="px-2 py-0.5 text-xs font-bold bg-yellow-600 text-white rounded">
                                    {{ $report->stuff->room->floor->name }}
                                </span>
                            </td>
                            <td class="w-150">
                                <span class="px-2 py-0.5 text-xs font-bold bg-purple-600 text-white rounded">
                                    {{ $report->stuff->room->name }}
                                </span>
                            </td>
                            <td>
                                {{ $report->stuff->name }}
                            </td>
                            <td>
                                {{ $report->note }}
                            </td>
                            @foreach ($report->reportConditions as $item)
                                <td class="whitespace-nowrap ">{{ $item->quantity }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
    </div>
@endsection
