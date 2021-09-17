@extends('../layout/side-menu')

@section('subhead')
    <title>{{ $TITLE }}</title>
@endsection

@section('subcontent')
    <!-- BEGIN: Modal CREATED -->
    <div id="header-footer-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- BEGIN: Modal Header -->
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Create</h2>
                </div> <!-- END: Modal Header -->

                {{-- Form --}}
                <form enctype="multipart/form-data" action="{{ $ACTION }}/save-create" method="POST">
                    @csrf
                    <!-- BEGIN: Modal Body -->
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        <div class="col-span-12"> <label for="modal-form-6" class="form-label">Barang</label>
                            <select id="modal-form-6" class="form-select" name="stuff_id">
                                <option>Pilih Barang</option>
                                @foreach ($stuffs as $stuff)
                                    <option value="{{ $stuff->id }}">{{ $stuff->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-span-12"> <label for="modal-form-6" class="form-label">Kondisi Barang</label>
                            <select id="modal-form-6" class="form-select" name="condition_id">
                                <option>Pilih Kondisi</option>
                                @foreach ($conditions as $condition)
                                    <option value="{{ $condition->id }}">{{ $condition->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-span-12"><label for="modal-form-1" class="form-label">Quantity</label>
                            <input name="qty" id="modal-form-1" type="number" class="form-control"
                                placeholder="inputkan quantity">
                        </div>

                        <div class="col-span-12"> <label for="modal-form-1" class="form-label">Notes</label>
                            <input name="notes" id="modal-form-1" type="text" class="form-control"
                                placeholder="inputkan notes">
                        </div>
                    </div> <!-- END: Modal Body -->

                    <!-- BEGIN: Modal Footer -->
                    <div class="modal-footer text-right">
                        <button type="button" data-dismiss="modal"
                            class="btn btn-outline-se\condary w-20 mr-1">Cancel</button>
                        <button type="submit" class="btn btn-primary w-20">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END: Modal CREATED -->

    <!-- BEGIN: Modal EDIT -->
    @foreach ($stuffs as $stuff)
        <div id="header-footer-modal-preview-{{ $stuff->id }}" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- BEGIN: Modal Header -->
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">Create</h2>
                    </div> <!-- END: Modal Header -->

                    {{-- Form --}}
                    <form enctype="multipart/form-data" action="{{ $ACTION }}/save-edit/{{ $stuff->id }}"
                        method="POST">
                        @csrf
                        <!-- BEGIN: Modal Body -->
                        <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                            <div class="col-span-12"> <label for="modal-form-1" class="form-label">Stuff</label>
                                <input name="name" id="modal-form-1" type="text" class="form-control"
                                    placeholder="inputkan angka Stuff" value="{{ $stuff->name }}">
                            </div>
                        </div> <!-- END: Modal Body -->

                        <!-- BEGIN: Modal Footer -->
                        <div class="modal-footer text-right">
                            <button type="button" data-dismiss="modal"
                                class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                            <button type="submit" class="btn btn-primary w-20">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    <!-- END: Modal EDIT -->


    <h2 class="intro-y text-lg font-medium mt-10">{{ $room->name }}</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <button class="tooltip btn btn-primary shadow-md mr-2" title="Filter Stuff">
                <i class="w-4 h-4" data-feather="filter"></i>
            </button>
            <button class="tooltip btn btn-outline-primary shadow-md mr-2" title="Import Stuff">
                <i class="w-4 h-4" data-feather="upload"></i>
            </button>

            {{-- Import Excel --}}
            <button class="tooltip btn btn-outline-primary shadow-md mr-2" title="Import Stuff">
                <i class="w-4 h-4" data-feather="download"></i>
            </button>

            {{-- Plus --}}
            <a href="{{ $ACTION }}/{{ $roomID }}/create-report" class="tooltip btn btn-primary shadow-md mr-2"
                title="Tambah Stuff">
                <i class="w-4 h-4" data-feather="plus"></i>
            </a>

            {{-- Mass Delete --}}
            <button class="disabled:opacity-50 tooltip btn text-white bg-red-300 shadow-md mr-2"
                title="Hapus Stuff yang dipilih">
                <i class="w-4 h-4" data-feather="trash-2"></i>
            </button>


            {{-- <div class="hidden md:block mx-auto text-gray-600">Showing {{ $stuffs->firstItem() }} to
                {{ $stuffs->lastItem() }} of {{ $stuffs->total() }} entries
            </div> --}}

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
                        <th class="whitespace-nowrap">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reports as $key => $report)
                        <tr>
                            {{-- {{ dd($report) }} --}}
                            <td class="w-10">
                                <div class="flex items-center h-100">
                                    <input type="checkbox" class="form-check-input bg-white">
                                </div>
                            </td>

                            <td>
                                <a href="{{ $ACTION }}/{{ $room->id }}/detail/{{ $key }}">
                                    {{ $key }}
                                </a>
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

    @foreach ($stuffs as $stuff)
        <!-- BEGIN: Delete Confirmation Modal -->
        <div id="delete-confirmation-modal-{{ $stuff->id }}" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="p-5 text-center">
                            <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                            <div class="text-3xl mt-5">Are you sure?</div>
                            <div class="text-gray-600 mt-2">Do you really want to delete these records? <br>This process
                                cannot
                                be undone.</div>
                        </div>
                        <div class="px-5 pb-8 text-center">
                            <button type="button" data-dismiss="modal"
                                class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                            <a href="{{ $ACTION }}/{{ $stuff->id }}" type="button"
                                class="btn btn-danger w-24">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Delete Confirmation Modal -->
    @endforeach

@endsection
