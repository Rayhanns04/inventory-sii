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
                        <div class="col-span-12"> <label for="modal-form-1" class="form-label">Condition</label>
                            <input name="name" id="modal-form-1" type="text" class="form-control"
                                placeholder="inputkan Condition">
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
    <!-- END: Modal CREATED -->

    <!-- BEGIN: Modal EDIT -->
    @foreach ($conditions as $condition)
        <div id="header-footer-modal-preview-{{ $condition->id }}" class="modal" tabindex="-1"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- BEGIN: Modal Header -->
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">Create</h2>
                    </div> <!-- END: Modal Header -->

                    {{-- Form --}}
                    <form enctype="multipart/form-data" action="{{ $ACTION }}/save-edit/{{ $condition->id }}"
                        method="POST">
                        @csrf
                        <!-- BEGIN: Modal Body -->
                        <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                            <div class="col-span-12"> <label for="modal-form-1" class="form-label">Condition</label>
                                <input name="name" id="modal-form-1" type="text" class="form-control"
                                    placeholder="inputkan angka Condition" value="{{ $condition->name }}">
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


    <h2 class="intro-y text-lg font-medium mt-10">{{ $TITLE }}</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <button class="tooltip btn btn-outline-primary shadow-md mr-2" title="Import Condition">
                <i class="w-4 h-4" data-feather="upload"></i>
            </button>

            {{-- Import Excel --}}
            <button class="tooltip btn btn-outline-primary shadow-md mr-2" title="Import Condition">
                <i class="w-4 h-4" data-feather="download"></i>
            </button>

            {{-- Plus --}}
            <a href="javascript:;" class="tooltip btn btn-primary shadow-md mr-2" title="Tambah Condition"
                data-toggle="modal" data-target="#header-footer-modal-preview">
                <i class="w-4 h-4" data-feather="plus"></i>
            </a>

            {{-- Mass Delete --}}
            <button class="disabled:opacity-50 tooltip btn text-white bg-red-300 shadow-md mr-2"
                title="Hapus Condition yang dipilih">
                <i class="w-4 h-4" data-feather="trash-2"></i>
            </button>


            <div class="hidden md:block mx-auto text-gray-600">Showing {{ $conditions->firstItem() }} to
                {{ $conditions->lastItem() }} of {{ $conditions->total() }} entries
            </div>
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
                            <div class="flex items-center h-100">
                                <input type="checkbox" class="form-check-input bg-white">
                            </div>
                        </th>
                        <th class="whitespace-nowrap">Nama</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($conditions->count() <= 0)
                        <tr>
                            <td colspan="6" class="h2 p-4 text-center m-0">Belum ada data!</td>
                        </tr>
                    @endif
                    @foreach ($conditions as $condition)
                        <tr class="intro-x">
                            <td class="w-10 text-center">
                                <div class="flex items-center h-100">
                                    <input type="checkbox" class="form-check-input">
                                </div>
                            </td>
                            <td>
                                <a href="" class="font-medium whitespace-nowrap">{{ $condition->name }}</a>
                            </td>

                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center mr-3" href="javascript:;" data-toggle="modal"
                                        data-target="#header-footer-modal-preview-{{ $condition->id }}">
                                        <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit
                                    </a>
                                    <a class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal"
                                        data-target="#delete-confirmation-modal-{{ $condition->id }}">
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
        <!-- END: Pagination -->
    </div>

    @foreach ($conditions as $condition)
        <!-- BEGIN: Delete Confirmation Modal -->
        <div id="delete-confirmation-modal-{{ $condition->id }}" class="modal" tabindex="-1" aria-hidden="true">
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
                            <a href="{{ $ACTION }}/{{ $condition->id }}" type="button"
                                class="btn btn-danger w-24">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Delete Confirmation Modal -->
    @endforeach

@endsection
