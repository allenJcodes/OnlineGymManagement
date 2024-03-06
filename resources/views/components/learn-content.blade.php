
@dd($title)
<div @class(['"pl-36 pr-36', 'bg-white' => !$flipped])>
    <div class="flex pt-52 pb-20">
        <div class="flex-1"><img src="{{ asset('images/home-logo-2.jpg') }}" class="rounded-xl"></div>
        <div class="flex-1 pl-10 pt-4">
            <legend class="text-4xl pb-5 font-bold">{{$title}}</legend>
            <legend class="pb-5 text-gray-400 text-lg">{{$subtitle}}
            </legend>
            <legend class="text-xs pb-5">{{$content}}
            </legend>
            <button type="button"
                class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg  px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 text-sm ">Read
                More</button>
        </div>
    </div>
</div>