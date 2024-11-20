<!--Pie de la pagina -->
<footer class="bg-blue-300 text-black py-6">
    <div class="container mx-auto px-4">
        <!-- Sección Principal del Footer -->
        <div class="flex flex-col md:flex-row justify-between mb-4">
            <!-- Logo y Descripción -->
            <div class="mb-4 md:mb-0">
                <h2 class="text-xl font-semibold text-white">MovilStore</h2>
                <p class="text-sm mt-2">Una aplicación web innovadora para simplificar tu vida.</p>
            </div>

            <!-- Links de Navegación -->
            <div class="flex flex-col md:flex-row gap-4">
                <a href="#" class="hover:text-white">Inicio</a>
                <a href="#" class="hover:text-white">Características</a>
                <a href="#" class="hover:text-white">Contacto</a>
            </div>
        </div>

        <!-- Sección de Contacto -->
        <div class="flex flex-col md:flex-row justify-between mb-4">
            <!-- Información de Contacto -->
            <div class="mb-4 md:w-1/2">
                <h3 class="text-lg font-semibold text-white">Contacto</h3>
                <p><strong>Email:</strong> contacto@movilstore.com</p>
                <p><strong>Teléfono:</strong> +123 456 789</p>
                <div class="flex space-x-4 mt-4">
                    <!-- Íconos de redes sociales -->
                    <a href="https://facebook.com" target="_blank" class="text-blue-700 hover:text-blue-900">
                        <i class="bi bi-facebook"></i>                        
                    </a>
                    <a href="https://twitter.com" target="_blank" class="text-blue-400 hover:text-blue-600">
                        <i class="bi bi-twitter-x"></i>                        
                    </a>
                    <a href="https://whatsapp.com" target="_blank" class="text-green-500 hover:text-green-700">
                        <i class="bi bi-whatsapp"></i>                        
                    </a>
                    <a href="https://instagram.com" target="_blank" class="text-pink-500 hover:text-pink-700">
                        <i class="bi bi-instagram"></i>                        
                    </a>
                </div>
            </div>

            <!-- Mapa de Ubicación -->
            <div class="mb-4 md:w-1/2">
                <h3 class="text-lg font-semibold text-white">Ubicación</h3>
                <div class="mt-2">
                    <!-- API de Google Maps (Iframe) -->
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3916.4790926897063!2d-73.990177!3d40.744034!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzAnNDQnMDAuOCJOIDczz" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>

        <!-- Sección del Equipo de Desarrollo -->
        <div class="mt-4">
            <h3 class="text-lg font-semibold text-white mb-2">Equipo de Desarrollo</h3>
            <div class="flex gap-4 items-center overflow-auto pb-4">
                <!-- Miembro del Equipo -->
                <div class="flex flex-col items-center text-center">
                    <img src="{{asset('img/cindy.jpg') }}" alt="Miembro 1" class="w-16 h-16 rounded-full mb-2">
                    <span class="text-sm">Miembro 1</span>
                </div>
                <!-- Miembro del Equipo -->
                <div class="flex flex-col items-center text-center">
                    <img src="{{asset('img/cindy.jpg') }}" alt="Miembro 2" class="w-16 h-16 rounded-full mb-2">
                    <span class="text-sm">Miembro 2</span>
                </div>
                <!-- Más miembros del equipo -->
                <div class="flex flex-col items-center text-center">
                    <img src="{{asset('img/cindy.jpg') }}" alt="Miembro 1" class="w-16 h-16 rounded-full mb-2">
                    <span class="text-sm">Miembro 1</span>
                </div>
                <div class="flex flex-col items-center text-center">
                    <img src="{{asset('img/cindy.jpg') }}" alt="Miembro 1" class="w-16 h-16 rounded-full mb-2">
                    <span class="text-sm">Miembro 1</span>
                </div>
            </div>
        </div>

        <!-- Sección de Derechos Reservados -->
        <div class="mt-4 text-center text-sm border-t border-gray-700 pt-4">
            <p>&copy; 2024 MovilStore. Todos los derechos reservados.</p>
        </div>
    </div>
</footer>