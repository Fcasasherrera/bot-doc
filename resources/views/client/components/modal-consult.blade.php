<!-- Main modal -->
<div id="modalConsult" tabindex="-1" aria-hidden="true"
    class="hidden bg-black-200 overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full animated fadeIn faster">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto flex m-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 w-full">
            <!-- Modal header -->
            <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Crear consulta
                </h3>
                <button type="button" onclick="consultModal()"
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
            <form id="cites" method="post" action="/api/citas">
                <div class="p-6 space-y-6">
                    <div class="form-group">
                        <label for="sintomas" class="block text-gray-700 text-sm font-bold mb-2">
                            Sintomas
                        </label>
                        <span note class="text-sm text-gray-600"> Seleccione 3 sintomas </span>
                        <select class="js-example-basic-single w-full form-control" name="sintomas[]"
                            multiple="multiple" id="sintomas">

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="signos" class="block text-gray-700 text-sm font-bold mb-2">
                            Signos
                        </label>
                        <span note class="text-sm text-gray-600"> Seleccione 3 signos </span>
                        <select class="js-example-basic-single w-full form-control" name="signos[]" multiple="multiple"
                            id="signos">

                        </select>
                    </div>

                    <textarea class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="detalles" name="detalles" rows="3" placeholder="Detalles"></textarea>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <button type="button" onclick="createCite()"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Agregar</button>
                    <button type="button" onclick="consultModal()"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
