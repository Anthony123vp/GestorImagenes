<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tiendas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div id="map"></div>
            </div>
        </div>
    </div>

    <div class="py-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <a type="button" href="{{ route('tiendas.create') }}" class="bg-indigo-600 px-12 py-2 rounded text-gray-200 font-semibold 
                                                                                    hover:bg-indigo-800 duration-200 each-in-out height:6px">Crear</a>
                <table class="table-fixed w-full">
                    <thead>
                        <tr clsss="bg-gray-300 text-white">
                            <th class="border px4 py-2" style="display: none">ID</th>
                            <th class="border px4 py-2">NOMBRE</th>
                            <th class="border px4 py-2">DISTRITO</th>
                            <th class="border px14 py-2">DIRECCION</th>
                            <th class="border px14 py-2">LATITUD</th>
                            <th class="border px14 py-2">LONGITUD</th>
                            <th class="border px14 py-3">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach ($tiendas as $tienda)
                        <tr>
                            <td style="text-align:center; display:none">{{ $tienda->id }}</td>
                            <td style="text-align:center">{{ $tienda->nombre }}</td>
                            <td style="text-align:center">{{ $tienda->distrito }}</td>
                            <td style="text-align:center">{{ $tienda->direccion }}</td>
                            <td style="text-align:center">{{ $tienda->lat }}</td>
                            <td style="text-align:center">{{ $tienda->lng }}</td>
                            <td class="border px-14 py3">
                                <div class="flex justify-center rounded-lg text-lg" role="group">
                                    <!-- boton editar -->
                                    <a href="{{ route('tiendas.edit', $tienda->id) }}"> 
                                        <button class="inline-flex items-center px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 text-sm font-medium rounded-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>
                                        </button>
                                    </a>
                                    <!-- boton ver -->
                                    <a href="{{ route('tiendas.show', $tienda->id) }}"> 
                                        <button class="inline-flex items-center px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white text-sm font-medium rounded-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 4.5v15m6-15v15m-10.875 0h15.75c.621 0 1.125-.504 1.125-1.125V5.625c0-.621-.504-1.125-1.125-1.125H4.125C3.504 4.5 3 5.004 3 5.625v12.75c0 .621.504 1.125 1.125 1.125z" />
                                            </svg>
                                        </button>
                                    </a>
                                    <!-- boton borrar -->
                                    <form action="{{ route('tiendas.destroy', $tienda->id) }}" method="POST" class="formEliminar">
                                        @csrf
                                        @method('DELETE')
                                        <button  type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                <div>
                    {!! $tiendas->links() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<style>
    /* Set the size of the div element that contains the map */
    #map {
        height: 500px; /* The height is 400 pixels */
        width: 100%; /* The width is the width of the web page */
    }
</style>
<script>

    //console.log('{{$ubicacion}}');
;
     let ubicacion = {!! json_encode($ubicacion, JSON_HEX_TAG) !!};
     let lat = {!! json_encode($lat, JSON_HEX_TAG) !!};
     let lng = {!! json_encode($lng, JSON_HEX_TAG) !!};
     //console.log(ubicacion[1].direccion);
     const mihtml = "<p>Carrito</p><img src='https://www.shutterstock.com/image-illustration/tula-russia-february-28-2021-260nw-1932915491.jpg'></img>";
     
     function initMap() {
        // The location of tecsup
        const centro = { lat: lat, lng: lng };
        //const medio = { lat: parseInt(centro[0]) , lng: parseInt(centro[1]) };

        // Create an info window to share between markers.
        const infoWindow = new google.maps.InfoWindow();

        // The map, centered at tecsup
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 16,
            center: centro,
        });

        // The marker, positioned at tecsup
        for(i=0; i < ubicacion.length; i++){
            const marker = new google.maps.Marker({
            position: new google.maps.LatLng(ubicacion[i].lat, ubicacion[i].lng),
            title: '"' + ubicacion[i].nombre + '"',
            map: map,});
            
            // Add a click listener for each marker, and set up the info window.
            marker.addListener("click", ({ domEvent, latLng }) => {
                const { target } = domEvent;

                infoWindow.close();
                infoWindow.setContent(mihtml);
                infoWindow.open(marker.map, marker);
            });
        }
       
    }

    window.initMap = initMap;

</script>



