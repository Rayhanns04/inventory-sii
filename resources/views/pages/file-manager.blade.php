@extends('../layout/side-menu')

@section('subhead')
    <title>File Manager - Midone - Tailwind HTML Admin Template</title>
@endsection

@section('subcontent')

<!-- BEGIN: Delete Modal -->
            <div class="intro-y box mt-5">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                    <h2 class="font-medium text-base mr-auto">Delete Modal</h2>
                    <div class="w-full sm:w-auto flex items-center sm:ml-auto mt-3 sm:mt-0">
                        <label class="form-check-label ml-0 sm:ml-2" for="show-example-8">Show example code</label>
                        <input id="show-example-8" data-target="#delete-modal" class="show-code form-check-switch mr-0 ml-3" type="checkbox">
                    </div>
                </div>
                <div id="delete-modal" class="p-5">
                    <div class="preview">
                        <!-- BEGIN: Modal Toggle -->
                        <div class="text-center">
                            <a href="javascript:;" data-toggle="modal" data-target="#delete-modal-preview" class="btn btn-primary">Show Modal</a>
                        </div>
                        <!-- END: Modal Toggle -->
                        <!-- BEGIN: Modal Content -->
                        <div id="delete-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body p-0">
                                        <div class="p-5 text-center">
                                            <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                                            <div class="text-3xl mt-5">Are you sure?</div>
                                            <div class="text-gray-600 mt-2">Do you really want to delete these records? <br>This process cannot be undone.</div>
                                        </div>
                                        <div class="px-5 pb-8 text-center">
                                            <button type="button" data-dismiss="modal" class="btn btn-outline-secondary w-24 dark:border-dark-5 dark:text-gray-300 mr-1">Cancel</button>
                                            <button type="button" class="btn btn-danger w-24">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Modal Content -->
                    </div>
                    <div class="source-code hidden">
                        <button data-target="#copy-delete-modal" class="copy-code btn py-1 px-2 btn-outline-secondary">
                            <i data-feather="file" class="w-4 h-4 mr-2"></i> Copy example code
                        </button>
                        <div class="overflow-y-auto mt-3 rounded-md">
                            <pre id="copy-delete-modal" class="source-preview">
                                <code class="text-xs p-0 rounded-md html pl-5 pt-8 pb-4 -mb-10 -mt-10">
                                    {{ \Hp::formatCode('
                                        <!-- BEGIN: Modal Toggle -->
                                        <div class="text-center">
                                            <a href="javascript:;" data-toggle="modal" data-target="#delete-modal-preview" class="btn btn-primary">Show Modal</a>
                                        </div>
                                        <!-- END: Modal Toggle -->
                                        <!-- BEGIN: Modal Content -->
                                        <div id="delete-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-body p-0">
                                                        <div class="p-5 text-center">
                                                            <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                                                            <div class="text-3xl mt-5">Are you sure?</div>
                                                            <div class="text-gray-600 mt-2">Do you really want to delete these records? <br>This process cannot be undone.</div>
                                                        </div>
                                                        <div class="px-5 pb-8 text-center">
                                                            <button type="button" data-dismiss="modal" class="btn btn-outline-secondary w-24 dark:border-dark-5 dark:text-gray-300 mr-1">Cancel</button>
                                                            <button type="button" class="btn btn-danger w-24">Delete</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END: Modal Content -->
                                    ') }}
                                </code>
                            </pre>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Delete Modal -->
    <div class="grid grid-cols-12 gap-6 mt-8">
        <div class="col-span-12 lg:col-span-3 xxl:col-span-2">
            <h2 class="intro-y text-lg font-medium mr-auto mt-2">Gallery Cirendeu</h2>
            <!-- BEGIN: File Manager Menu -->
            <div class="intro-y box p-5 mt-6">
                <a href="" class="flex items-center px-3 py-2 rounded-md">
                    <i class="w-4 h-4 mr-2" data-feather="plus"></i> Add New Album
                </a>
                <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md">
                    <div class="w-2 h-2 bg-theme-11 rounded-full mr-3"></div> Kerja Bakti
                </a>
                <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md">
                    <div class="w-2 h-2 bg-theme-9 rounded-full mr-3"></div> Important Meetings
                </a>
                <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md">
                    <div class="w-2 h-2 bg-theme-12 rounded-full mr-3"></div> Work
                </a>
                <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md">
                    <div class="w-2 h-2 bg-theme-11 rounded-full mr-3"></div> Design
                </a>
                <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md">
                    <div class="w-2 h-2 bg-theme-6 rounded-full mr-3"></div> Next Week
                </a>
            </div>
            <!-- END: File Manager Menu -->
        </div>
        <div class="col-span-12 lg:col-span-9 xxl:col-span-10">
            <!-- BEGIN: File Manager Filter -->
            <div class="intro-y flex flex-col-reverse sm:flex-row items-center">
                <div class="w-full sm:w-auto relative mr-auto mt-3 sm:mt-0">
                    <h2 class="intro-y text-lg font-medium mr-auto mt-2">Album: Kerja Bakti</h2>
                </div>
                <div class="w-full sm:w-auto">
                    <button class="btn btn-primary shadow-md mr-2">Upload</button>
                </div>
            </div>
            <!-- END: File Manager Filter -->

            <!-- BEGIN: Directory & Files -->
            <div class="intro-y grid grid-cols-12 gap-3 sm:gap-6 mt-5">
                @foreach ($fakers as $faker)
                    @if ($faker['files'][0]['type'] == 'Image')
                    <div class="intro-y col-span-6 sm:col-span-4 md:col-span-3 xxl:col-span-2">
                        <div class="file box rounded-md pt-5 pb-5 px-3 sm:px-5 relative zoom-in">
                            <div class="absolute right-0 top-0 mt-3 mr-3 z-50">
                                <button class="bg-red-600 dark:bg-red-400 text-white rounded p-2">
                                    <i class="w-4 h-4" data-feather="trash-2"></i>
                                </button>
                            </div>
                            <a href="" class="w-full file__icon file__icon--image mx-auto">
                                <div class="file__icon--image__preview image-fit">
                                    <img alt="Midone Tailwind HTML Admin Template" src="{{ asset('dist/images/' . strtolower($faker['files'][0]['file_name'])) }}">
                                </div>
                            </a>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
            <!-- END: Directory & Files -->
            <!-- BEGIN: Pagination -->
            <div class="intro-y flex flex-wrap sm:flex-row sm:flex-nowrap items-center mt-6">
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
                        <a class="pagination__link" href="#">...</a>
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
                        <a class="pagination__link" href="#">...</a>
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
                <select class="w-20 form-select box mt-3 sm:mt-0">
                    <option>10</option>
                    <option>25</option>
                    <option>35</option>
                    <option>50</option>
                </select>
            </div>
            <!-- END: Pagination -->
        </div>
    </div>
@endsection
