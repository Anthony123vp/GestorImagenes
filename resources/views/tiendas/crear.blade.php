<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            
                <form action="{{ route('tiendas.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
                        <div calss="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-gary-500 text-light font-semibold">Nombre</label>
                            <input type="text" name="nombre" class="py-2 px-3 rounded-lg border-2 border-purple-300 focus:outline-none focus:ring-2 focus:purple-600 w-full" placeholder="nombre de la tienda">
                        </div>   
                        <div calss="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-gary-500 text-light font-semibold">Distrito</label>
                            <input type="text" name="distrito" class="py-2 px-3 rounded-lg border-2 border-purple-300 focus:outline-none focus:ring-2 focus:purple-600 w-full" placeholder="distrito de la tienda">
                        </div> 
                        <div calss="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-gary-500 text-light font-semibold">Direccion</label>
                            <input type="text" name="direccion" class="py-2 px-3 rounded-lg border-2 border-purple-300 focus:outline-none focus:ring-2 focus:purple-600 w-full" placeholder="direccion de la tienda">
                        </div> 
                        <div calss="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-gary-500 text-light font-semibold">Latitud</label>
                            <input type="text" name="lat" class="py-2 px-3 rounded-lg border-2 border-purple-300 focus:outline-none focus:ring-2 focus:purple-600 w-full" placeholder="latitud de la tienda">
                        </div> 
                        <div calss="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-gary-500 text-light font-semibold">Longitud</label>
                            <input type="text" name="lng" class="py-2 px-3 rounded-lg border-2 border-purple-300 focus:outline-none focus:ring-2 focus:purple-600 w-full" placeholder="longitud de la tienda">
                        </div> 
                    </div>
                    <div class="flex items-center justify-center h-20">
                        <a type="button" href="{{ route('tiendas.index') }}" class="w-auto bg-indigo-600 hover:bg-indigo-400 rounded-lg shadow-x1 font-medium text-white px-4 py-2">Cancelar</a>
                        <button type="submit" class="w-auto bg-indigo-600 hover:bg-purple-700 rounded-lg shadow-x1 font-medium text-white px-4 py-2 px-2">Guardar</button>
                    </div>
                    <br>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>