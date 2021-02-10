@extends("app")

@section('content')
<script async src="https://telegram.org/js/telegram-widget.js?14" data-telegram-login="libros" data-size="large" data-auth-url="" data-request-access="write"></script>
    <div class="flex justify-center flex-wrap bg-gray-200 p-4 mt-5">
        <div class="text-center">
        <h1 class="mb-5">{{ __("Lista de vehiculos")}}</h1>
        <a href="{{route("vehicles.create")}}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
        {{ __("Añadir vehicle")}}
        </a>
        </div>
        <script async src="https://telegram.org/js/telegram-widget.js?14" data-telegram-share-url="https://web.telegram.org/"></script>
    </div>
    <table class="border-separate border-2 text-center border-gray-500 mt-3" style="width: 100%">
        <thead>
            <tr>
            <th class="px-4 py-2">{{ __("Placa")}}</th>
            <th class="px-4 py-2">{{ __("Marca")}}</th>
            <th class="px-4 py-2">{{ __("Color")}}</th>
            <th class="px-4 py-2">{{ __("Modelo")}}</th>
            <th class="px-4 py-2">{{ __("Propietario")}}</th>
            <th class="px-4 py-2">{{ __("CI")}}</th>

            </tr>
        </thead>
        <tbody>
            @forelse($vehicles as $vehicle)
                <tr>
                    <td class="border px-4 py-2">{{ $vehicle->Placa }}</td>
                    <td class="border px-4 py-2">{{ $vehicle->Marca }}</td>
                    <td class="border px-4 py-2">{{ $vehicle->Color }}</td>
                    <td class="border px-4 py-2">{{ $vehicle->Modelo }}</td>
                    <td class="border px-4 py-2">{{ $vehicle->Propietario }}</td>
                    <td class="border px-4 py-2">{{ $vehicle->CI }}</td>

                    @foreach($munipality as $municipality)
                    @if($vehicle->id_municipality== $municipality->id)
                    <td class="border px-4 py-2">{{$municipality->departament}}</td>
                    @endif
                    @endforeach

                    <td class="border px-4 py-2">{{ date_format($vehicle->created_at, "d/m/Y") }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route("vehicles.edit" , ["vehicles" => $vehicle]) }}" class="text-blue-400">{{ __("Editar") }}</a> |
                        <a
                            href="#"
                            class="text-red-400"
                            onclick="event.preventDefault();
                                document.getElementById('delete-vehicle-{{ $vehicle->id }}-form').submit();"
                        >{{ __("Eliminar") }}
                        </a>
                        <form id="delete-vehicle-{{ $vechicle->id }}-form" action="{{ route("vehicles.destroy", ["vehicle" => $vehicle]) }}" method="POST" class="hidden">
                            @method("DELETE")
                            @csrf
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">
                        
                        <div class="bg-red-100 text-center border border-red-400 text-red-700 px-4 py-3 rounded relative " role="alert">
                            <p><strong class="font-bold">{{ __("No hay proyectos") }}</strong></p>
                            <span class="block sm:inline">{{ __("Todavía no hay nada que mostrar aquí") }}</span>
                        </div>
                        
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
    @if($vehicles->count())
        <div class="mt-3">
            {{ $vehicles->links() }}
        </div>
    @endif

@endsection