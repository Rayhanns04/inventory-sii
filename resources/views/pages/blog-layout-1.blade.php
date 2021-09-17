@extends('../layout/side-menu')

@section('subhead')
    <title>Blog - Midone - Tailwind HTML Admin Template</title>
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Blog Layout</h2>
        <div class="intro-x relative mr-1 sm:mr-6">
            <div class="search hidden sm:block">
                <input type="text" class="search__input form-control border-transparent placeholder-theme-13" placeholder="Search...">
                <i data-feather="search" class="feather feather-search search__icon dark:text-gray-300"></i>
            </div>
        </div>
        <div class="w-full sm:w-auto mt-4 sm:mt-0">
            <button class="btn btn-primary shadow-md mr-2">Add New Post</button>
        </div>
    </div>
    <div class="intro-y grid grid-cols-12 gap-6 mt-5">
        <!-- BEGIN: Blog Layout -->
        @foreach (array_slice($fakers, 0, 9) as $faker)
        <div class="intro-y col-span-12 md:col-span-6 xl:col-span-4 box">
                <div class="p-5">
                    <div class="h-40 xxl:h-56 image-fit">
                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-md" src="{{ asset('dist/images/' . $faker['images'][0]) }}">
                    </div>
                    <a href="/" class="block font-medium text-base mt-5">{{ $faker['news'][0]['title'] }}</a>
                    <div class="text-gray-700 dark:text-gray-600 my-2">{{ $faker['news'][0]['short_content'] }}</div>
                    <strong><a href="" class="text-blue-900 dark:text-blue-500">Show More</a></strong>
                </div>
            </div>
        @endforeach
        <!-- END: Blog Layout -->
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
            <select class="w-20 form-select box mt-3 sm:mt-0">
                <option>10</option>
                <option>25</option>
                <option>35</option>
                <option>50</option>
            </select>
        </div>
        <!-- END: Pagination -->
    </div>
@endsection
