
<div class="flex flex-col gap-1">
    <label for="{{$name}}" class="text-sm">{{$label}}</label>

    <select name="{{$name}}" id="{{$id}}" class="focus:outline-none bg-border/20 border border-border py-2 px-4 rounded-md text-base text-background/90">
        {{$options}}
    </select>
    {{-- <input id="{{$id}}" type="text" name="{{$name}}" class="focus:outline-none bg-border/20 border border-border py-2 px-4 rounded-md text-base text-background/90"> --}}
</div>