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
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0 mr-1">
                <div class="w-56 relative text-gray-700 dark:text-gray-300">
                    <input type="text" class="form-control w-56 box pr-10 placeholder-theme-13" placeholder="Search...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>
                </div>
            </div>

            <a href="" class="tooltip btn btn-link box shadow-md ml-1 mr-3" title="Reset All Filter">
                <i class="w-5 h-5" data-feather="refresh-cw"></i>
            </a>

            {{-- Plus --}}
            <a href="{{ $ACTION }}/{{ $roomID }}/create-report" class="tooltip btn btn-primary shadow-md mr-2"
                title="Tambah Stuff">
                <i class="w-5 h-5" data-feather="plus"></i>
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
                        <th class="whitespace-nowrap">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($reports->count() <= 0)
                        <tr>
                            <td colspan="6" class="h2 p-4 text-center m-0">Belum ada data!</td>
                        </tr>
                    @endif
                    @foreach ($reports as $key => $report)
                        <tr>
                            <td class="w-10 text-center">
                                <div class="flex items-center h-100">
                                    {{ $loop->iteration }}
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
        <div class="d-flex justify-content-between pull-left">
            {{-- <div>
                Showing
                {{ $reports->firstItem() }}
                to
                {{ $reports->lastItem() }}
                of
                {{ $reports->total() }}
                entries
            </div>
            <div class="pull-right">
                {{ $reports->links() }}
            </div> --}}
        </div>
        <!-- END: Pagination -->
    </div>
@endsection
