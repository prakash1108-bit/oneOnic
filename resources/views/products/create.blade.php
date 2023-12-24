<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{__('Create Product')}}</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto mt-8 p-8 grid grid-col-4 justify-content-center">
        <div class="col-span-4 text-center ">
            <h1 class="text-2xl font-bold mb-4">{{__('Create Product')}}</h1>
            <form action="{{ route('product.store') }}" method="post" class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md text-left" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">{{__('Product Name')}}</label>
                    <input type="text" name="name" id="name"
                        class="w-full border rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-300 @error('name') border-red-500 @enderror"
                        value="{{ old('name') }}" required>
                    @error('name')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="file_input">{{__('Upload file')}}</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        id="file_input" required name="image" type="file">
                    @error('image')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        {{ __('Select Subcategory') }}
                    </label>
                    <select id="category" name="subcategory_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($subcategories as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="price" class="block text-gray-700 text-sm font-bold mb-2">{{__('Price')}}</label>
                    <input type="number" name="price" id="price"
                        class="w-full border rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-300 @error('price') border-red-500 @enderror"
                        value="{{ old('price') }}" required>
                    @error('price')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex items-center justify-end gap-3">
                    <button type="button" class="bg-blue-500 text-white py-2 px-4 rounded">{{__('Back')}}</button>
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">{{__('Create')}}</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
