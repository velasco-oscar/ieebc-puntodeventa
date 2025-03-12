<x-app-layout>
    <div class="min-h-screen bg-gradient-to-b from-green-50 to-white">
        <div class="container mx-auto px-4 py-12 md:py-24 text-center max-w-4xl">
            <!-- Icono animado mejor centrado -->
            <div class="animate-bounce mb-6 mx-auto flex justify-center">
                <svg class="h-16 w-16 md:h-20 md:w-20 text-green-600" 
                     xmlns="http://www.w3.org/2000/svg" 
                     fill="none" 
                     viewBox="0 0 24 24" 
                     stroke-width="1"
                     stroke="currentColor">
                    <path stroke-linecap="round" 
                          stroke-linejoin="round" 
                          d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>

            <!-- Mensaje principal -->
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-green-700 mb-4">
                ¡Compra Exitosa!
            </h1>
            
            <p class="text-lg md:text-xl text-gray-600 mb-6 leading-relaxed max-w-md mx-auto">
                Gracias por tu compra. Hemos enviado los detalles de tu pedido a tu correo.
            </p>

            @php
                $venta = session('venta');
            @endphp

            <!-- Detalles de la transacción, se muestran solo si la variable $venta existe -->
            @if($venta)
                <div class="bg-white rounded-lg shadow-md p-6 mb-8 mx-4 md:mx-auto md:max-w-md text-left">
                    <div class="space-y-3">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Número de transacción:</span>
                            <span class="font-medium text-gray-900">#{{ $venta->id }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Fecha:</span>
                            <span class="font-medium text-gray-900">{{ \Carbon\Carbon::parse($venta->fecha)->format('d M Y') }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Total:</span>
                            <span class="font-bold text-green-700">${{ number_format($venta->total, 2) }}</span>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Botón de acción -->
            <div class="mb-6">
                <a href="{{ route('dashboard') }}" 
                   class="inline-flex items-center justify-center px-6 py-3 md:px-8 md:py-4
                          text-base md:text-lg font-semibold rounded-lg transition-all duration-200
                          bg-green-600 text-white hover:bg-green-700 hover:scale-105 hover:shadow-lg
                          focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                    Volver al Inicio
                    <svg class="w-4 h-4 md:w-5 md:h-5 ml-2 -mr-1" 
                         fill="currentColor" 
                         viewBox="0 0 20 20">
                        <path fill-rule="evenodd" 
                              d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" 
                              clip-rule="evenodd"/>
                    </svg>
                </a>
            </div>

            <!-- Mensaje adicional -->
            <p class="mt-8 text-sm text-gray-500 italic">
                ¿Necesitas ayuda? Escríbenos a 
                <a href="mailto:dev.oscarvelasco@gmail.com" class="text-green-600 hover:underline">
                    dev.oscarvelasco@gmail.com
                </a>
            </p>
        </div>
    </div>
</x-app-layout>
