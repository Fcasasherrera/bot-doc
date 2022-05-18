<!-- Main modal -->
<div id="modalRegister" tabindex="-1" aria-hidden="true"
    class="hidden bg-black-200 overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full animated fadeIn faster">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto flex m-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 w-full">
            <!-- Modal header -->
            <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Registro paciente
                </h3>
                <button type="button" onclick="registerModal()"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">

                <input type="text" class="block border border-grey-light w-full p-3 rounded mb-4" name="fullname"
                    placeholder="Nombre" />

                <input type="text" class="block border border-grey-light w-full p-3 rounded mb-4" name="email"
                    placeholder="Correo" />

                <input type="password" class="block border border-grey-light w-full p-3 rounded mb-4" name="password"
                    placeholder="Contraseña" />
                <input type="password" class="block border border-grey-light w-full p-3 rounded mb-4"
                    name="confirm_password" placeholder="Confirmar Contraseña" />
                <input type="text" class="block border border-grey-light w-full p-3 rounded mb-4" name="nss"
                    placeholder="Numero Seguro Social" />
                <input type="text" class="block border border-grey-light w-full p-3 rounded mb-4" name="bornDate"
                    placeholder="Fecha nacimiento" />
                <div class="mt-4">
                    <span class="text-gray-700">Sexo</span>
                    <div class="mt-2">
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="accountType" value="man">
                            <span class="ml-2">Hombre</span>
                        </label>
                        <label class="inline-flex items-center ml-6">
                            <input type="radio" class="form-radio" name="accountType" value="woman">
                            <span class="ml-2">Mujer</span>
                        </label>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                <button onclick="registerModal()"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Continuar</button>
                <button onclick="registerModal()"
                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>
            </div>
        </div>
    </div>
</div>
