<form class="min-w-[20vw]">
    <input value="{{request()->search ?? ''}}" id="search" type="text" name="search" class="form-input text-sm w-full h-fit p-1.5" placeholder="Search {{$model}}...">
</form>