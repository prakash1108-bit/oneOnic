<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <div class="container mx-auto p-8">
        <div class="flex justify-between items-center mb-4">
            <div>
                <h1 class="text-2xl font-bold">{{ __('Categories') }}</h1>
            </div>
            <div>
                <a href="{{ route('index') }}" class="bg-blue-500 text-white py-2 px-4 rounded mr-3">
                {{__('Main Page')}}
                </a>
                <a href="{{ route('categories.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded">Create
                    Category</a>
            </div>
        </div>
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">#</th>
                    <th class="py-2 px-4 border-b">Name</th>
                    <th class="py-2 px-4 border-b">Image</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $item)
                    <tr class="text-center">
                        <td class="py-2 px-4 border-b">{{ $loop->iteration }}</td>
                        <td class="py-2 px-4 border-b">{{ $item->name }}</td>
                        <td class="py-2 px-4 border-b">
                            <img width="200" height="200" src="{{ asset('upload/' . $item->image) }}"
                                alt="">
                        </td>
                        <td class="py-2 px-4 border-b flex gap-3 justify-content-center">
                            <a href="{{ route('categories.edit', $item->id) }}" class="text-blue-500">Edit</a>
                            <form action="{{ route('categories.destroy', $item->id) }}" method="POST">
                              @csrf
                              @method('delete')
                                <button type="submit"
                                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">{{ 'Delete' }}</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="py-2 px-4 border-b text-center">No categories found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>

</html>
