{{-- <div @class(['pl-36 pr-36', 'bg-white' => !$flipped])>

    <div @class(['flex py-20 gap-10', 'flex-row-reverse' => $flipped, 'flex-row' => !$flipped]) >
        <div class="flex-1"><img src="{{ asset($image) }}" class="rounded-xl"></div>
        <div class="flex-1 pl-10 pt-4">
            <legend @class(['text-4xl pb-5 font-bold', 'text-white' => $flipped])>{{$title}}</legend>
            <legend class="pb-5 text-gray-400 text-lg">{{$subtitle}}</legend>
            <legend @class(['text-xs pb-5', 'text-gray-400' => $flipped])>{{$content}}</legend>
            <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg  px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 text-sm ">Read More</button>
        </div>
    </div>
</div> --}}

<div @class(['flex w-full bg-border/20 ring-1 ring-border rounded-lg overflow-clip max-h-[45vh] text-justify', 'flex-row-reverse' => $flipped])>
    
    <div class="w-[55%]">
        <img class="h-full w-full object-cover object-left-top" src="{{ asset('image/content/'.$image) }}" alt="image of {{$title}}">
    </div>

    <div class="flex flex-col gap-5 divide-y-2 divide-border py-5 px-10 w-[45%] overflow-auto">
        <div class="flex flex-col">
            <h3 class="font-bold text-2xl text-dark-gray-950">{{$title}}</h3>
            <p class="text-base text-dark-gray-900">{{$subtitle}}</p>
        </div>

        <p class="text-sm text-dark-gray-800">{{$content}}</p>
    </div>
</div>