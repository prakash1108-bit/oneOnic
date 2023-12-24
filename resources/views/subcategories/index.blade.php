<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{__('Subcategories')}}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <div class="container mx-auto p-8">
        <div class="flex justify-between items-center mb-4">
            <div>
                <h1 class="text-2xl font-bold">{{ __('Subcategories') }}</h1>
            </div>
            <div>
                <a href="{{ route('index') }}" class="bg-blue-500 text-white py-2 px-4 rounded mr-3">
                    {{ __('Main Page') }}
                </a>
                <a href="{{ route('subcategories.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded">{{__('Create Subcategory')}}</a>
            </div>
        </div>
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">#</th>
                    <th class="py-2 px-4 border-b">{{__('Name')}}</th>
                    <th class="py-2 px-4 border-b">{{__('Category')}}</th>
                    <th class="py-2 px-4 border-b">{{__('Actions')}}</th>
                </tr>
            </thead>
            <tbody>
                @forelse($subcategories as $item)
                    <tr class="text-center">
                        <td class="py-2 px-4 border-b">{{ $loop->iteration }}</td>
                        <td class="py-2 px-4 border-b">{{ $item->name }}</td>
                        <td class="py-2 px-4 border-b">
                            {{$item->category->name}}
                        </td>
                        <td class="py-2 px-4 border-b flex gap-3 justify-content-center">
                            <a href="{{ route('subcategories.edit', $item->id) }}" class="text-blue-500">Edit</a>
                            <form action="{{ route('subcategories.destroy', $item->id) }}" method="POST">
                              @csrf
                              @method('delete')
                                <button type="submit"
                                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">{{ 'Delete' }}</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="py-2 px-4 border-b text-center">{{__('No Subcategories found')}}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>

</html>
