<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="bg-gray-200">
    <div class="grid grid-cols-4 gap-4">
        <div class="py-8 p-3">
            <h1 class="font-bold text-2xl">{{ __('Products') }}
            </h1>
        </div>
        <div class="col-span-2 p-3">
            <div class="flex gap-3">
                @foreach ($categories as $item)
                    <div class="max-w-xs bg-white p-3 rounded-lg shadow-md">
                        <img src="{{ asset('upload/' . $item->image) }}" alt="Product Image"
                            class="w-full h-24 object-cover rounded-md mb-2">
                        <h2 class="text-lg font-semibold text-gray-800 mb-1 text-center">{{ $item->name }}</h2>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="flex p-2">
            <div>
                <a href="{{route('categories.index')}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">{{__('Category')}}</a>
            </div>
            <div>
                <a href="{{route('subcategories.index')}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">{{__('Subcategory')}}</a>
            </div>
            <div>
                <a href="{{route('product.index')}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">{{__('Product')}}</a>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-4 gap-4 bg-white p-5">
        <div class="p-5">
            <div class="mb-2 text-lg font-semibold text-gray-900 dark:text-white"> <i class="fa-solid fa-sliders"></i> {{__('Filters')}}
            </div>
            <ul class="max-w-md space-y-1 text-gray-500 list-none list-inside dark:text-gray-400">
                <li>
                    <button type="button" data-price="1000" class="py-2.5 pricebtn border-0 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">{{__('Product under 1000')}}</button>
                </li>
                <li>
                    <button type="button" data-price="1500" class="py-2.5 pricebtn border-0 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">{{__('Product under 1500')}}</button>
                </li>
                <li>
                    <button type="button" data-price="2000" class="py-2.5 pricebtn border-0 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">{{__('Product under 2000')}}</button>
                </li>
            </ul>
        </div>
        <div class="col-span-3 response">
            @include('product_list', ['product' => $product])
        </div>
    </div>
    @include('project')
</body>

</html>
