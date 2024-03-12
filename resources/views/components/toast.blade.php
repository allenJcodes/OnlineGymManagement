@if (session()->has('toast'))
    
    <div id="toast" @class([
        'ring-1 flex flex-col gap-3 fixed top-4 right-[1.5rem] items-center justify-center w-[320px] rounded-md overflow-hidden animate-toast z-[21]',
        'ring-green-400 bg-green-50' => session('toast.status') == 'success',
        'ring-amber-500 bg-amber-50' => session('toast.status') == 'warning',
        'ring-red-600 bg-red-50' => session('toast.status') == 'error',
        'ring-blue-600 bg-blue-50' => session('toast.status') == 'information'
        ])>
        <div class="flex w-full items-center pt-4 px-4 border-red border-1">
            <div class="w-full flex items-center">
                @if (session('toast.status') == 'success')
                <box-icon name="check-circle" size="sm" @class([
                        'flex items-center justify-center relative rounded-full aspect-square w-fit
                        after:scale-75 after:animate-ping after:absolute after:ring-2 after:ring-green-600/30 after:h-full after:w-full after:rounded-full',
                        'fill-green-600' => session('toast.status') == 'success',
                    ])>
                </box-icon>
                @else
                <box-icon name="info-circle" @class([
                        'flex items-center justify-center relative rounded-full aspect-square w-fit
                        after:scale-75 after:animate-ping after:absolute after:ring-2 after:h-full after:w-full after:rounded-full',
                        'fill-amber-600 after:ring-amber-600/30' => session('toast.status') == 'warning',
                        'fill-red-600 after:ring-red-600/30' => session('toast.status') == 'error',
                        'fill-blue-600 after:ring-blue-600/30' => session('toast.status') == 'information'
                    ])>
                </box-icon>
                @endif
            </div>
        
            <box-icon id="close-toast-btn" type="regular" name="x" size="sm" @class([
                'cursor-pointer',
                'fill-green-600' => session('toast.status') == 'success',
                'fill-amber-500' => session('toast.status') == 'warning',
                'fill-red-500' => session('toast.status') == 'error',
                'fill-blue-500' => session('toast.status') == 'information'
                ])>
            </box-icon>   
        </div>
        
        <div class="flex relative w-full pl-4 pb-4">
            <div class="flex flex-col gap-1 border-red border-1">
                <p @class([
                    'text-sm font-bold',
                    'text-green-700' => session('toast.status') == 'success',
                    'text-amber-700' => session('toast.status') == 'warning',
                    'text-red-700' => session('toast.status') == 'error',
                    'text-blue-700' => session('toast.status') == 'information'
                    ])>{{ session('toast.status') }}</p>
                <p id="close-toast" @class([
                    'text-sm w-full',
                    'text-green-700' => session('toast.status') == 'success',
                    'text-amber-700' => session('toast.status') == 'warning',
                    'text-red-700' => session('toast.status') == 'error',
                    'text-blue-700' => session('toast.status') == 'information',
                    ])>{{ session('toast.message') }}
                </p>
            </div>
        </div>
    </div>
@endif

@vite('resources/js/components/toast.js')