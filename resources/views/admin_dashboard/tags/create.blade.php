@extends("admin_dashboard.layouts.app")
@section("style")
    <link href="{{ asset('admin_dashboard_assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet"/>
@endsection
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

@section("wrapper")
@if (count($errors) > 0)
@foreach ($errors->all() as $error)
<div class="alert alert-danger" role="alert">
    {{ $error }}
</div>
    @endforeach
@endif

@if (Session::has('success'))
<div class="alert alert-success" role="alert">
    {{ Session('success') }}
    </div>
@endif

<form action="{{ route(' admin.tags.store') }}" method='post'>
    @csrf
    <h2 class="text-center">
        ADD NEW TAG
    </h2>
    {{-- BACK to admin index --}}
    <a href="/admin/tags">
        <button class="px-3 py-2 my-2 border-2 rounded border-slate-100 hover:border-gray-600 hover:text-white hover:bg-slate-600"><-- back</button>
    </a>
    <div class="px-8 py-12 bg-white rounded shadow top-40 dark:bg-gray-800">
        <div>
            <div class="flex flex-col w-full mt-8">
                <label class="text-base font-semibold leading-none text-gray-800 dark:text-white">Tag Name</label>
                <input type="text" id="name" name="name" tabindex="0" aria-label="Tag Name"  type="name" class="p-3 mt-4 text-base leading-none text-gray-900 placeholder-gray-100 bg-gray-100 border border-gray-200 rounded resize-none focus:oultine-none focus:border-indigo-700">
                @error('name')
                {{-- look at tailwindcss --}}
                <div class="mt-1 mb-1 alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="w-full ">
            <button class="w-full px-10 py-4 text-base font-semibold leading-none text-white bg-indigo-700 rounded mt-9 hover:bg-indigo-600 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 focus:outline-none" type="submit">SUBMIT</button>
        </div>
    </div>
</form>
@endsection

