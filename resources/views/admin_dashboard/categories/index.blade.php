@extends("admin_dashboard.layouts.app")
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

		@section("wrapper")
		{{-- <!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
					<div class="breadcrumb-title pe-3">Categories</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="p-0 mb-0 breadcrumb">
								<li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">All Categories</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->

				<div class="card">
					<div class="card-body">
						<div class="gap-3 mb-4 d-lg-flex align-items-center">
							<div class="position-relative">
								<input type="text" class="form-control ps-5 radius-30" placeholder="Search Order"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
							</div>
						  <div class="ms-auto"><a href="{{ route('admin.categories.create') }}" class="mt-2 btn btn-primary radius-30 mt-lg-0"><i class="bx bxs-plus-square"></i>Add New Category</a></div>
						</div>
						<div class="table-responsive">
							<table class="table mb-0">
								<thead class="table-light">
									<tr>
										<th>Category#</th>
										<th>Category Name</th>
										<th>Creator</th>
                                        <th>Related Posts</th>
										<th>Created at</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach($categories as $category)
									<tr>
										<td>
											<div class="d-flex align-items-center">
												<div>
													<input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
												</div>
												<div class="ms-2">
													<h6 class="mb-0 font-14">#P-{{ $category->id }}</h6>
												</div>
											</div>
										</td>
										<td>{{ $category->name }} </td>
                                        <td>{{ $category->user->name }}</td>
                                        <td>
                                            <a class='btn btn-primary btn-sm' href="{{ route('admin.categories.show', $category) }}">Related Posts</a>
                                        </td>
                                        <td>{{ $category->created_at->diffForHumans() }}</td>
                                        <td>
											<div class="d-flex order-actions">
												<a href="{{ route('admin.categories.edit', $category) }}" class=""><i class='bx bxs-edit'></i></a>
												<a href="#" onclick="event.preventDefault(); document.getElementById('delete_form_{{ $category->id }}').submit();" class="ms-3"><i class='bx bxs-trash'></i></a>

                                                <form method='post' action="{{ route('admin.categories.destroy', $category) }}" id='delete_form_{{ $category->id }}'>@csrf @method('DELETE')</form>
                                            </div>
										</td>
									</tr>
                                    @endforeach
								</tbody>
							</table>
						</div>

                        <div class='mt-4'>
                        {{ $categories->links() }}
                        </div>

					</div>
				</div>


			</div>
		</div> --}}
		<!--end page wrapper -->
		{{-- @endsection --}}





        All Categories

        <div class="container mx-auto bg-white rounded shadow dark:bg-gray-800">
            <div class="flex flex-col items-start justify-between w-full p-8 lg:flex-row lg:items-stretch">
                <div class="flex flex-col items-start w-full lg:w-1/4 xl:w-1/3 lg:flex-row lg:items-center">
                    <div class="relative w-full mb-2 lg:mb-0 lg:mr-4">
                        <div class="absolute inset-0 z-0 w-5 h-5 m-auto mr-2 xl:mr-4">
                            <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/advance_table_with_filters_search_and_two_level_action_buttons-svg2.svg" alt="arrow down">
                        </div>
                        <select aria-label="Selected tab" class="relative z-10 block w-full px-2 py-2 text-sm text-gray-600 bg-transparent border border-gray-300 rounded appearance-none cursor-pointer focus:outline-none focus:border-gray-800 focus:shadow-outline-gray form-select xl:px-3 dark:border-gray-200 dark:text-gray-400">
                            <option class="text-sm text-gray-600 dark:text-gray-400">Inactive</option>
                            <option class="text-sm text-gray-600 dark:text-gray-400">Inactive</option>
                            <option selected="" class="text-sm text-gray-600 dark:text-gray-400">Representatives</option>
                            <option class="text-sm text-gray-600 dark:text-gray-400">Inactive</option>
                            <option class="text-sm text-gray-600 dark:text-gray-400">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="flex flex-col items-start justify-end w-full gap-2 lg:ml-24 lg:flex-row lg:items-center">
                    <div class="flex flex-col items-start w-full lg:w-1/4 xl:w-1/3 lg:flex-row lg:items-center">
                        <div class="relative w-full mb-2 lg:mb-0">
                            <div class="absolute flex items-center h-full pl-4 text-gray-600 right-2 dark:text-gray-400">
                                <button class="bg-gray-100 border-2 border-gray-100 rounded focus:bg-gray-300 focus:border-gray-300 active:bg-gray-200 active:border-gra-200">
                                    <img class="dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/advance_table_with_filters_search_and_two_level_action_buttons-svg1.svg" alt="search">
                                    <img class="hidden dark:block" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/advance_table_with_filters_search_and_two_level_action_buttons-svg1dark.svg" alt="search">
                                </button>
                            </div>
                            <label for="search" class="hidden"></label>
                            <input placeholder="Search" id="search" class="flex items-center w-full h-10 pl-2 text-sm font-normal text-gray-600 bg-gray-100 border border-gray-300 rounded dark:bg-gray-700 dark:text-gray-400 focus:outline-none focus:border focus:border-indigo-700 dark:border-gray-200" placeholder="Search" />
                        </div>
                    </div>
                    <button class="flex flex-row px-2 py-2 my-2 text-sm text-white transition duration-150 ease-in-out bg-indigo-700 border border-transparent rounded focus:shadow-outline-gray w-44 lg:w-24 lg:my-0 lg:ml-7 xl:ml-4 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 hover:bg-indigo-600">
                        <img class="px-2" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/advance_table_with_filters_search_and_two_level_action_buttons-svg1dark.svg" alt="search">search
                    </button>
                    <a href="{{ route('admin.categories.create') }}">
                        <button class="py-2 my-2 text-sm text-white transition duration-150 ease-in-out bg-indigo-700 border border-transparent rounded focus:shadow-outline-gray w-44 lg:w-1/4 lg:my-0 lg:ml-2 xl:ml-4 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 hover:bg-indigo-600" > <a href="{{ route('admin.categories.create') }}"> Add New Category </button> </a>
                    </a>
                </div>
            </div>
            <div class="w-full overflow-x-scroll xl:overflow-x-hidden">
                <table class="min-w-full bg-white rounded dark:bg-gray-800">
                    <thead>
                        <tr class="w-full h-16 py-8 border-b border-gray-300 dark:border-gray-200 bg-indigo-50">
                            <th role="columnheader" class="pl-8 pr-6 text-sm font-normal leading-4 tracking-normal text-left text-gray-600">Created at</th>
                            <th role="columnheader" class="pr-6 text-sm font-normal leading-4 tracking-normal text-left text-gray-600">Category Name</th>
                            <th role="columnheader" class="pr-6 text-sm font-normal leading-4 tracking-normal text-left text-gray-600">Creator</th>
                            <th role="columnheader" class="pr-6 text-sm font-normal leading-4 tracking-normal text-left text-gray-600">Related Posts</th>
                            <th role="columnheader" class="pr-6 text-sm font-normal leading-4 tracking-normal text-left text-gray-600">Actions</th>
                            <td class="pr-8">
                                <button class="w-32 px-5 py-1 text-sm text-indigo-700 transition duration-150 ease-in-out bg-gray-100 rounded opacity-0 cursor-default focus:outline-none focus:border-gray-800 focus:shadow-outline-gray hover:bg-gray-300">Start Session</button>
                            </td>
                        </tr>
                    </thead>
                    <tbody role="rowgroup" >
                        @foreach ($categories as $category)

                        <tr role="row" class="h-24 transition duration-150 ease-in-out border-t border-b border-gray-300 cursor-pointer hover:border-indigo-300 hover:shadow-md">
                            <td class="pl-8 pr-6 text-sm leading-4 tracking-normal text-left text-gray-800 whitespace-no-wrap dark:text-gray-100">{{$category->id}}</td>

                            <td class="pr-6 text-sm leading-4 tracking-normal text-gray-800 whitespace-no-wrap dark:text-gray-100">{{ $category->user->name }}</td>
                            <td class="pr-6">

                                {{$category->name}}
                            </td>
                            <td class="pr-6 text-sm leading-4 tracking-normal text-gray-800 whitespace-no-wrap dark:text-gray-100">{{ $category->created_at->diffForHumans() }}</td>

                            <td class="pr-6 text-sm leading-4 tracking-normal text-gray-800 whitespace-no-wrap dark:text-gray-100">  <a class='btn btn-primary btn-sm' href="{{ route('admin.categories.show', $category) }}">Related Posts</a></td>


                            <td class="pr-6 text-sm leading-4 tracking-normal text-gray-800 whitespace-no-wrap dark:text-gray-100">
                                <div class="flex items-center">
                                    <a  href="{{ route('admin.categories.edit', $category) }}">
                                        <div aria-label="Edit row" role="button" class="p-2 text-indigo-700 bg-gray-100 rounded cursor-pointer hover:bg-gray-200">
                                            <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/advance_table_with_filters_search_and_two_level_action_buttons-svg4.svg" alt="Edit">
                                        </div>
                                    </a>

                                    <a href="#" onclick="event.preventDefault(); document.getElementById('delete_form_{{ $category->id }}').submit();" class="ms-3">
                                        <button type="submit"class="border border-transparent rounded focus:outline-none focus:border-gray-800 focus:shadow-outline-gray" href="javascript: void(0)">
                                            <div aria-label="Delete" role="button" class="p-2 text-red-500 bg-gray-100 rounded cursor-pointer hover:bg-gray-200">
                                                    <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/advance_table_with_filters_search_and_two_level_action_buttons-svg6.svg" alt="Delete">
                                            </div>
                                        </button>
                                    </a>

                                    {{-- Delete --}}
                                    <form method='post' action="{{ route('admin.categories.destroy', $category) }}" id='delete_form_{{ $category->id }}'>@csrf @method('DELETE')</form>


                                </div>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            {{ $categories->links() }}
        </div>
        <div class="container flex items-center justify-center pt-8 mx-auto sm:justify-end">
            <a class="mr-2 text-gray-600 border border-transparent rounded sm:mr-5 focus:outline-none focus:border-gray-800 focus:shadow-outline-gray" aria-label="Previous Page" role="link" href="javascript: void(0)">
                <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/advance_table_with_filters_search_and_two_level_action_buttons-svg7.svg" alt="Previous">
            </a>
            <p class="text-base text-gray-800 dark:text-gray-100 fot-normal">Page</p>
            <label for="selectedPage" class="hidden"></label>
            <input placeholder="0" id="selectedPage" type="text" class="flex items-center w-8 px-2 mx-2 text-base font-normal text-gray-800 bg-white border border-gray-300 rounded dark:bg-gray-800 dark:text-gray-100 focus:outline-none focus:shadow-outline-gray focus:border focus:border-indigo-700" value="4" />
            <p class="text-base text-gray-800 dark:text-gray-100 fot-normal">of 20</p>
            <a class="mx-2 text-gray-600 border border-transparent rounded sm:mx-5 focus:outline-none focus:border-gray-800 focus:shadow-outline-gray" aria-label="Next Page" role="link" href="javascript: void(0)">
                <img class="transform rotate-180" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/advance_table_with_filters_search_and_two_level_action_buttons-svg7.svg" alt="Previous">
            </a>
            <label for="totalPage" class="hidden"></label>
            <input placeholder="0" id="totalPage" type="text" class="flex items-center w-10 px-2 mr-2 text-base font-normal text-gray-800 bg-white border border-gray-300 rounded dark:bg-gray-800 dark:text-gray-100 focus:outline-none focus:shadow-outline-gray focus:border focus:border-indigo-700" value="30" />
            <p class="-mt-1 text-base text-gray-800 dark:text-gray-100 fot-normal">per page</p>
        </div>


		@endsection


    @section("script")

    <script>
        $(document).ready(function () {

            setTimeout(() => {
                $(".general-message").fadeOut();
            }, 5000);

        });

    </script>
    @endsection
