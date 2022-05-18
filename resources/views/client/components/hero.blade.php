<div class="bg-white">
    <!-- Header -->
    <div class="relative py-44 bg-gray-800">
        <div class="absolute inset-0">
            <img class="w-full h-full object-cover" src="/images/slider.jpg" alt="">
            <div class="absolute inset-0 bg-black-200 mix-blend-multiply" aria-hidden="true"></div>
        </div>
        <div class="relative max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8">
            <h1
                class="text-4xl font-extrabold tracking-tight text-primary-light text-white md:text-5xl lg:text-6xl animated fadeIn">
                Acceso a la sanidad en México</h1>
            <p class="mt-6 max-w-3xl text-xl text-white animated fadeIn delay-2s">Bot-doc es el asistente médico basado
                en Inteligencia
                Artificial más
                preciso para triage y prediagnóstico.
                Dirigimos a los pacientes al nivel adecuado de atención inmediatamente.</p>
        </div>
    </div>

    <!-- Overlapping cards -->
    <section class="-mt-32 max-w-7xl mx-auto relative z-10 pb-12 px-4 sm:px-6 lg:px-8" aria-labelledby="contact-heading">
        <h2 class="sr-only" id="contact-heading">Contact us</h2>
        <div class="grid grid-cols-1 gap-y-20 lg:grid-cols-3 lg:gap-y-0 lg:gap-x-8">
            <div class="flex flex-col bg-white rounded-2xl shadow-xl animated fadeIn">
                <div class="flex-1 relative pt-16 px-6 pb-8 md:px-8">
                    <div
                        class="absolute top-0 p-5 inline-block bg-primary rounded-xl shadow-lg transform -translate-y-1/2">
                        {{-- <svg class="h-8 w-8 text-white" fill="white" stroke="white" viewBox="0 0 480 480"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="m457.389 91.089c-35.378-60.651-113.225-81.138-173.875-45.759-14.664 8.554-27.467 19.958-37.652 33.54l-5.862 7.812-5.86-7.81c-24.072-31.94-61.714-50.763-101.71-50.86h-3.03c-43.469-.002-83.925 22.208-107.259 58.884-14.472 22.715-22.154 49.092-22.141 76.026v23.13c-.113 68.843 34.59 133.075 92.233 170.714l13.654 8.945 56.105 36.755 73.626 48.236c2.674 1.751 6.135 1.742 8.8-.023l144.182-95.487c57.145-37.744 91.489-101.686 91.4-170.17v-10.3c-.007-29.387-7.809-58.246-22.611-83.633zm-264.544 308.5 2.946 5.894-64.3-42.125-16.836-11.03-4.582-3 40.585-60.877c.876-1.315 1.343-2.859 1.342-4.439v-25.04c0-.523.009-1.055.025-1.566.455-9.894 4.224-19.348 10.7-26.841l1.289-1.516 4.226 16.9c.889 3.562 4.089 6.062 7.76 6.063h19.156c5.352-.005 10.351 2.673 13.311 7.132 5.461 8.199 13.903 13.945 23.533 16.018v8.85c-.01 8.832-7.168 15.99-16 16-4.418 0-8 3.582-8 8v29.1c.008 5.53-1.631 10.938-4.707 15.534l-9.95 14.929c-.876 1.314-1.343 2.858-1.343 4.437v24c0 1.242.289 2.467.845 3.578zm31.155 24.377-8-5.241v-6.713c0-1.244-.29-2.471-.847-3.583l-.085-.171 8.932-8.933zm64-21.34-16 10.6v-45.214l16-12zm14.95-100.17c-.579 11.638-4.951 22.766-12.45 31.684l-31.3 23.472c-2.014 1.511-3.2 3.882-3.2 6.4v59.807l-16 10.6v-54.407c0-4.418-3.581-8-8-8-2.122 0-4.157.843-5.657 2.343l-18.343 18.343v-18.264l8.6-12.906c4.835-7.224 7.411-15.723 7.4-24.416v-22.113c14.119-3.665 23.982-16.4 24-30.987v-16c0-4.418-3.582-8-8-8-7.322.006-14.162-3.652-18.222-9.746-3.3-4.962-7.922-8.902-13.344-11.374l12.252-12.252-.264.527 27.79 13.9c14.41 7.182 30.288 10.928 46.388 10.945h3.469l4.046 30.3c.892 6.675 1.171 13.418.835 20.144zm-54.95-130.444v25.99c-.003 3.317-2.692 6.006-6.009 6.01h-9.991v-14.28c-.052-19.482 7.692-38.176 21.507-51.913 3.722-3.715 8.764-5.804 14.023-5.807h17.32c5.023-.013 9.842 1.984 13.383 5.547l16.11 16.11c1.5 1.5 3.535 2.343 5.657 2.343h16v12c-.007 6.624-5.376 11.993-12 12h-20c-4.418 0-8 3.582-8 8v48h-1.4c-13.616-.016-27.043-3.186-39.228-9.261l-13.483-6.739h.1c12.15-.013 21.997-9.86 22.011-22.01v-25.99zm216 13.01c.081 63.116-31.571 122.046-84.237 156.83l-75.763 50.177v-49.137c8.991-11.332 14.212-25.194 14.93-39.642.382-7.699.061-15.416-.96-23.056l-5.97-44.713v-39.469h12c15.457-.018 27.982-12.543 28-28v-20c0-4.418-3.582-8-8-8h-20.686l-13.767-13.768c-6.535-6.572-15.429-10.257-24.697-10.232h-17.32c-9.502.004-18.615 3.777-25.337 10.493-16.825 16.732-26.257 39.499-26.193 63.227v18.967l-27.314 27.313h-6.44l-6.485-25.94c-1.072-4.286-5.415-6.893-9.701-5.821-1.62.405-3.072 1.306-4.154 2.578l-11.373 13.373c-8.812 10.249-13.919 23.164-14.5 36.667-.023.7-.035 1.406-.035 2.1v22.618l-22.33 33.5c-13.503-10.115-25.672-21.896-36.219-35.064l-7.202-9.011c-2.761-3.45-7.797-4.008-11.247-1.247s-4.008 7.797-1.247 11.247l7.2 9.007c11.576 14.453 24.962 27.359 39.828 38.4l-8.052 12.077c-50.652-35.089-80.831-92.825-80.729-154.444v-23.13c-.012-23.891 6.802-47.288 19.64-67.436 20.397-32.06 55.761-51.476 93.76-51.474h3.03c34.963.085 67.868 16.54 88.911 44.461l12.259 16.339c2.651 3.535 7.665 4.251 11.2 1.6.606-.455 1.145-.994 1.6-1.6l12.26-16.34c36.825-49.105 106.485-59.059 155.589-22.234 11.872 8.903 21.841 20.094 29.319 32.912 13.376 22.94 20.426 49.017 20.432 75.572z" />
                            <path d="m272 148.012h16v16h-16z" />
                            <path d="m184 268.012h16v16h-16z" />
                            <path
                                d="m421 269.765c-3.449-2.762-8.483-2.204-11.245 1.245-.001.001-.001.002-.002.002l-7.2 9.006c-15.739 19.705-35.075 36.244-56.981 48.738l-21.537 12.307c-3.84 2.186-5.181 7.07-2.995 10.91s7.07 5.181 10.91 2.995c.008-.004.016-.009.023-.013l21.537-12.306c23.656-13.495 44.537-31.357 61.533-52.637l7.2-9.006c2.759-3.448 2.203-8.48-1.243-11.241z" />
                            <path
                                d="m440 188.012c-4.418 0-8 3.582-8 8v2.633c.004 13.292-2.139 26.498-6.346 39.107l-1.243 3.73c-1.438 4.178.782 8.73 4.96 10.168s8.73-.782 10.168-4.96c.017-.049.033-.099.049-.148l1.244-3.73c4.751-14.241 7.171-29.155 7.167-44.167v-2.633c.001-4.418-3.58-8-7.999-8z" />
                            <path
                                d="m440 148.012c-4.418 0-8 3.582-8 8v8c0 4.418 3.582 8 8 8s8-3.582 8-8v-8c0-4.418-3.581-8-8-8z" />
                            <path
                                d="m54.346 237.753c-4.207-12.609-6.35-25.815-6.346-39.108v-2.633c0-4.418-3.582-8-8-8s-8 3.582-8 8v2.633c-.004 15.012 2.416 29.926 7.167 44.167l1.244 3.729c1.356 4.205 5.864 6.515 10.069 5.159s6.515-5.864 5.159-10.069c-.016-.05-.033-.1-.05-.149z" />
                        </svg> --}}
                    </div>
                    <h3 class="text-xl font-medium text-gray-900">Accesso inmediato</h3>
                    <p class="mt-4 text-base text-gray-500">Todo desde la comodidad de tu hogar!</p>
                </div>
            </div>

            <div class="flex flex-col bg-white rounded-2xl shadow-xl animated fadeIn delay-1s">
                <div class="flex-1 relative pt-16 px-6 pb-8 md:px-8">
                    <div
                        class="absolute top-0 p-5 inline-block bg-primary rounded-xl shadow-lg transform -translate-y-1/2">
                    </div>
                    <h3 class="text-xl font-medium text-gray-900">Seguridad de tu información</h3>
                    <p class="mt-4 text-base text-gray-500">Toda tu información esta protegida por nuestro aviso de
                        privacidad</p>
                </div>
            </div>

            <div class="flex flex-col bg-white rounded-2xl shadow-xl animated fadeIn delay-2s">
                <div class="flex-1 relative pt-16 px-6 pb-8 md:px-8">
                    <div
                        class="absolute top-0 p-5 inline-block bg-primary rounded-xl shadow-lg transform -translate-y-1/2">
                    </div>
                    <h3 class="text-xl font-medium text-gray-900">Calidad</h3>
                    <p class="mt-4 text-base text-gray-500">Contamos con doctores de excelente calidad que nutren
                        nuestra inteligencia todo el tiempo!</p>
                </div>
            </div>
        </div>
    </section>
</div>
