@extends('../layout/side-menu')

@section('subhead')
    <title>CRUD Data List - Midone - Tailwind HTML Admin Template</title>
@endsection

@section('subcontent')
    <h2 class="intro-y text-lg font-medium mt-10">Penduduk</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <button class="tooltip btn btn-primary shadow-md mr-2" title="Filter Penduduk">
                <i class="w-4 h-4" data-feather="filter"></i>
            </button>
            <button class="tooltip btn btn-outline-primary shadow-md mr-2" title="Import Penduduk">
                <i class="w-4 h-4" data-feather="upload"></i>
            </button>
            <button class="tooltip btn btn-outline-primary shadow-md mr-2" title="Import Penduduk">
                <i class="w-4 h-4" data-feather="download"></i>
            </button>
            <button class="tooltip btn btn-primary shadow-md mr-2" title="Tambah Penduduk">
                <i class="w-4 h-4" data-feather="plus"></i>
            </button>
            <button class="disabled:opacity-50 tooltip btn text-white bg-red-300 shadow-md mr-2" title="Hapus Penduduk yang dipilih">
                <i class="w-4 h-4" data-feather="trash-2"></i>
            </button>
            <div class="hidden md:block mx-auto text-gray-600">Showing 1 to 10 of 150 entries</div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0 mr-1">
                <div class="w-56 relative text-gray-700 dark:text-gray-300">
                    <input type="text" class="form-control w-56 box pr-10 placeholder-theme-13" placeholder="Search...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>
                </div>
            </div>
            <select class="w-20 form-select box mt-3 sm:mt-0">
                <option>10 Items per Page</option>
                <option>25 Items per Page</option>
                <option>35 Items per Page</option>
                <option>50 Items per Page</option>
                <option>100 Items per Page</option>
            </select>
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
                            <div class="flex items-center h-100">
                                <input type="checkbox" class="form-check-input bg-white">
                            </div>
                        </th>
                        <th class="whitespace-nowrap">Nama</th>
                        <th class="text-center whitespace-nowrap">No Telp</th>
                        <th class="text-center whitespace-nowrap">
                            <i class="w-4 h-4" data-feather="search"></i>
                        </th>
                        <th class="text-center whitespace-nowrap">Status Ekonomi</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (array_slice($fakers, 0, 9) as $faker)
                        <tr class="intro-x">
                            <td class="w-10 text-center">
                                <div class="flex items-center h-100">
                                    <input type="checkbox" class="form-check-input">
                                </div>
                            </td>
                            <td>
                                <a href="" class="font-medium whitespace-nowrap">{{ $faker['products'][0]['name'] }}</a>
                            </td>
                            <td class="text-center">{{ $faker['stocks'][0] }}</td>
                            <td class="text-center">
                                <i class="w-4 h-4" data-feather="search"></i>
                            </td>
                            <td class="w-40">
                                <div class="flex items-center justify-center {{ $faker['true_false'][0] ? 'text-theme-9' : 'text-theme-6' }}">
                                    <i data-feather="check-square" class="w-4 h-4 mr-2"></i> {{ $faker['true_false'][0] ? 'Active' : 'Inactive' }}
                                </div>
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center mr-3" href="javascript:;">
                                        <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit
                                    </a>
                                    <a class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal" data-target="#delete-confirmation-modal">
                                        <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            <ul class="pagination">
                <li>
                    <a class="pagination__link" href="">
                        <i class="w-4 h-4" data-feather="chevrons-left"></i>
                    </a>
                </li>
                <li>
                    <a class="pagination__link" href="">
                        <i class="w-4 h-4" data-feather="chevron-left"></i>
                    </a>
                </li>
                <li>
                    <a class="pagination__link" href="">...</a>
                </li>
                <li>
                    <a class="pagination__link" href="">1</a>
                </li>
                <li>
                    <a class="pagination__link pagination__link--active" href="">2</a>
                </li>
                <li>
                    <a class="pagination__link" href="">3</a>
                </li>
                <li>
                    <a class="pagination__link" href="">...</a>
                </li>
                <li>
                    <a class="pagination__link" href="">
                        <i class="w-4 h-4" data-feather="chevron-right"></i>
                    </a>
                </li>
                <li>
                    <a class="pagination__link" href="">
                        <i class="w-4 h-4" data-feather="chevrons-right"></i>
                    </a>
                </li>
            </ul>
        </div>
        <!-- END: Pagination -->
    </div>
    <!-- BEGIN: Delete Confirmation Modal -->
    <div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Are you sure?</div>
                        <div class="text-gray-600 mt-2">Do you really want to delete these records? <br>This process cannot be undone.</div>
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <button type="button" data-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                        <button type="button" class="btn btn-danger w-24">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Delete Confirmation Modal -->
@endsection
