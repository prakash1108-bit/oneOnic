<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Edit Subcategory') }}</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto mt-8 p-8 grid grid-col-4 justify-content-center">
        <div class="col-span-4 text-center ">
            <h1 class="text-2xl font-bold mb-4">{{ __('Edit Subcategory') }}</h1>
            <form action="{{ route('subcategories.update', $subcategory->id) }}" method="post"
                class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md text-left" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-4">
                    <label for="name"
                        class="block text-gray-700 text-sm font-bold mb-2">{{ __('Subcategory Name') }}</label>
                    <input type="text" name="name" id="name"
                        class="w-full border rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-300 @error('name') border-red-500 @enderror"
                        value="{{ $subcategory->name }}" required>
                    @error('name')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        {{ __('Select Main Category') }}
                    </label>
                    <select id="category" name="category_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}" {{$subcategory->id == $item->id ? 'selected' : ''}}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex items-center justify-end gap-3">
                    <a href="{{ route('categories.index') }}"
                        class="bg-blue-500 text-white py-2 px-4 rounded">{{ __('Back') }}</a>
                    <button type="submit"
                        class="bg-blue-500 text-white py-2 px-4 rounded">{{ __('Update') }}</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
