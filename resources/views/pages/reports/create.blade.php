@extends('../layout/side-menu')

@section('subhead')
    <title>{{ $TITLE }}</title>
@endsection

@section('subcontent')
    <form method="POST" action="{{ $ACTION }}/save-create">
        @csrf
        <h2 class="intro-y text-lg font-medium mt-10">{{ $TITLE }}</h2>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
                <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0 mr-1">
                    <div class="w-56 relative text-gray-700 dark:text-gray-300">
                        <input type="text" class="form-control w-56 box pr-10 placeholder-theme-13" placeholder="Search...">
                        <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>
                    </div>
                </div>

                <button type="submit" href="javascript:;" class="tooltip btn btn-primary shadow-md ml-2"
                    title="Simpan Laporan Hari ini" data-toggle="modal" data-target="#header-footer-modal-preview">
                    <i class="w-4 h-4" data-feather="save"></i>
                </button>
            </div>
            <!-- BEGIN: Data List -->
            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                <table class="table table-report -mt-2">
                    <thead>
                        <tr>
                            <th class="whitespace-nowrap">#</th>
                            <th class="whitespace-nowrap">Barang</th>
                            @foreach ($conditions as $condition)
                                <th class="whitespace-nowrap ">{{ $condition->name }}</th>
                            @endforeach
                            <th class="whitespace-nowrap">Note</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($room->stuffs as $stuff)
                            <tr class="intro-x">
                                <td class="w-10 text-center">
                                    <a href="#" class="font-medium whitespace-nowrap">{{ $loop->iteration }}</a>
                                </td>

                                <td>
                                    <a href="#" class="font-medium whitespace-nowrap">{{ $stuff->name }}</a>
                                </td>

                                @foreach ($conditions as $condition)
                                    <td>
                                        <input name="reports[{{ $stuff->id }}][conditions][{{ $condition->name }}]"
                                            id="modal-form-1" type="number" class="form-control"
                                            placeholder="inputkan jumlah">
                                    </td>
                                @endforeach

                                <td>
                                    <input name="reports[{{ $stuff->id }}][note]" id="modal-form-1" type="text"
                                        class="form-control" placeholder="inputkan notes">
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

    </form>
@endsection
