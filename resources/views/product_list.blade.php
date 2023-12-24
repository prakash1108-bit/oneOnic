<div class="flex justify-end">
    <div class="w-50">
        <input type="text" id="search" name="search"
            class="bg-gray-50 w-full border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Search" >
    </div>
</div>
<div class="grid grid-cols-3 gap-4">
    @foreach ($product as $item)
        <div class="max-w-md mx-auto bg-white p-8 rounded shadow-md">
            <img src="{{asset('upload/'.$item->image)}}" alt="Product Image" class="w-full h-48 object-cover mb-4 rounded">
            <h2 class="text-xl font-semibold text-gray-800 mb-2">{{$item->name}}</h2>
            <p class="text-lg font-bold mb-4">{{$item->price}}</p>
        </div>
    @endforeach
</div>
