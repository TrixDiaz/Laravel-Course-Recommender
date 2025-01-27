<div>
    <div class="pt-12">
        <section class="bg-white dark:bg-gray-950">
            <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                <div class="mx-auto max-w-screen-md sm:text-center">
                    <h3 class="mb-4 text-2xl tracking-tight font-bold text-gray-900 sm:text-3xl dark:text-white">
                        ISAT U Miagao Campus Course Recommender</h3>
                    <p class="mx-auto mb-8 max-w-2xl font-light text-gray-500 md:mb-12 sm:text-xl dark:text-gray-400">
                        The Course Recommender System is exclusively developed for ISAT U Miagao Campus which aims to
                        recommend courses for the incoming college students.</p>
                    <form action="">
                        <div class="dark:bg-gray-800 rounded-xl mb-4">
                            <div class="text-start">
                                <p class="p-4 dark:text-white uppercase text-md">Student Information</p>
                                <hr class="w-full bg-gray-100 border-1 rounded-sm dark:bg-gray-300">
                            </div>
                            <section class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6 p-8">
                                <!-- Full Name -->
                                <div class="text-start">
                                    <label for="name"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                        Full Name <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" id="name"
                                           class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light"
                                           placeholder="John Doe" required>
                                </div>

                                <!-- Average -->
                                <div class="text-start">
                                    <label for="average"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                        Average <span class="text-red-500">*</span>
                                    </label>
                                    <input type="number" id="average" min="75" max="100" value="75"
                                           class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light"
                                           placeholder="Enter your Final Average" required>
                                </div>

                                <!-- School -->
                                <div class="text-start sm:col-span-2">
                                    <label for="school"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                        School <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" id="school"
                                           class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light"
                                           placeholder="Enter your School Here" required>
                                </div>
                            </section>

                        </div>
                        <div class="dark:bg-gray-800 rounded-xl">
                            <div class="text-start">
                                <p class="p-4 dark:text-white uppercase text-md">List of Skills</p>
                                <hr class="w-full bg-gray-100 border-1 rounded-sm dark:bg-gray-300">
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 p-8">
                                <div class="flex items-center mb-2">
                                    <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Default checkbox</label>
                                </div>
                                <div class="flex items-center mb-2">
                                    <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Default checkbox</label>
                                </div>
                                <div class="flex items-center mb-2">
                                    <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Default checkbox</label>
                                </div>
                                <div class="flex items-center mb-2">
                                    <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Default checkbox</label>
                                </div>
                                <div class="flex items-center mb-2">
                                    <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Default checkbox</label>
                                </div>
                                <div class="flex items-center mb-2">
                                    <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Default checkbox</label>
                                </div>
                                <div class="flex items-center mb-2">
                                    <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Default checkbox</label>
                                </div>
                                <div class="flex items-center mb-2">
                                    <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Default checkbox</label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
