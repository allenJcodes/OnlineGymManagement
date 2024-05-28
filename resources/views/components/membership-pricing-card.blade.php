<div @class(['flex flex-col gap-5 divide-off-white/40 bg-[#1B1F23] w-full rounded-lg text-off-white p-5 relative', 'bg-accent shadow-2xl shadow-accent/20' => $bestOffer == 1])>
    @if ($bestOffer == 1)
        <p class="bg-off-white/90 flex text-background py-2 px-4 absolute -right-[3em] -top-[1em] rounded-md font-bold">
            Best Offer!
        </p>
    @endif

    <div class="flex flex-col items-center gap-1">
        <p class="text-sm text-off-white/40">{{$type}}</p>
        <h3 class="text-xl font-bold">₱ {{$price}}</h3>
    </div>

    <p class="text-xs text-justify text-off-white/40">{{$description}}</p>

    <hr>

    <ul class="list-disc list-inside text-sm p-2">
        @foreach ($inclusions as $inclusion)
            <li>{{$inclusion->name}}</li>
        @endforeach
    </ul>

</div>