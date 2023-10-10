@extends('layouts.app')

@section('content')
    <div class="container pt-12">
        <div class="pt-2 pb-12">
            <a href="{{ route('equipment') }}" class="">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Back</button>
            </a>
        </div>
        <div
            class="block p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

            <form enctype="multipart/form-data" action="{{ route('updateEquipment', $equipment->id) }}" method="POST">
                @csrf
                <div class="flex justify-center items-center">
                    <div class="relative w-60">
                        <input type="text" id="floating_outlined"
                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            name="equipment_name" value="{{ $equipment->equipment_name }}" required placeholder=" ">
                        <label for="floating_outlined"
                            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                            <span class="text-center ">Equipment Name</span></label>
                    </div>
                </div>

                <div class="relative z-0 w-full mb-6 group">

                    <label for="message"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                    <input id="description" rows="4" type="text" name="description"
                        value="{{ $equipment->description }}"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Description of an equipment">

                </div>
                <div class="pb-5">
                    <label for="countries" class="block pb-2 text-sm font-medium text-gray-900 dark:text-white">Equipment
                        Type</label>
                    <select id="countries" name="equipment_type"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose a type of equipment</option>
                        <option {{ $equipment->equipment_type == 'Treadmill' ? 'selected' : '' }} value="Treadmill">
                            Treadmill
                        </option>
                        <option {{ $equipment->equipment_type == 'Stationary bicycle' ? 'selected' : '' }}
                            value="Stationary bicycle">Stationary bicycle</option>
                        <option {{ $equipment->equipment_type == 'Bench' ? 'selected' : '' }} value="Bench">Bench</option>
                        <option {{ $equipment->equipment_type == 'Power rack' ? 'selected' : '' }} value="Power rack">Power
                            rack
                        </option>
                    </select>
                </div>

                <div class="pb-5">
                    <label for="countries"
                        class="block pb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                    <select id="countries" name="status"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose a status</option>
                        <option {{ $equipment->status == 'Available' ? 'selected' : '' }} value="Available">Available
                        </option>
                        <option {{ $equipment->status == 'Not Available' ? 'selected' : '' }} value="Not Available">Not
                            Available
                        </option>
                        <option {{ $equipment->status == 'Under Maintenance' ? 'selected' : '' }}
                            value="Under Maintenance">
                            Under
                            Maintenance</option>

                    </select>
                </div>

                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="multiple_files">Upload
                    multiple files</label>
                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    type="file" name="image" value="{{ $equipment->image_path }}" />
                {{-- <img id="blah" src="http://placehold.it/180" alt="your image" style="max-width:180px;" /> --}}


                <div class="flex justify-center items-center pt-2">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </div>

            </form>

            {{-- <script>
                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function(e) {
                            $('#blah')
                                .attr('src', e.target.result);
                        };

                        reader.readAsDataURL(input.files[0]);
                    }
                }
            </script> --}}
        </div>



    </div>
@endsection
