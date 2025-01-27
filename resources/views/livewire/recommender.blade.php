<div>
    <div x-data="{ showModal: false }">
        <div class="pt-12">
            <section class="bg-white dark:bg-gray-950">
                <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                    <div class="mx-auto max-w-screen-md sm:text-center">
                        <h3 class="mb-4 text-2xl tracking-tight font-bold text-gray-900 sm:text-3xl dark:text-white">
                            ISAT U Miagao Campus Course Recommender</h3>
                        <p class="mx-auto mb-8 max-w-2xl font-light text-gray-500 md:mb-12 sm:text-xl dark:text-gray-400">
                            The Course Recommender System is exclusively developed for ISAT U Miagao Campus which aims to
                            recommend courses for the incoming college students.</p>
                    </div>
                    <form wire:submit.prevent="submitForm" class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                        <div class="bg-gray-50 dark:bg-gray-800 rounded-xl">
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
                                    <input wire:model="name" type="text" id="name"
                                           class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light"
                                           placeholder="John Doe" required>
                                </div>

                                <!-- Average -->
                                <div class="text-start">
                                    <label for="average"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                        Average <span class="text-red-500">*</span>
                                    </label>
                                    <input wire:model="average" type="number" id="average" min="75" max="100" value="75"
                                           class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light"
                                           placeholder="Enter your Final Average" required>
                                </div>

                                <!-- School -->
                                <div class="text-start sm:col-span-2">
                                    <label for="school"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                        School <span class="text-red-500">*</span>
                                    </label>
                                    <input wire:model="school" type="text" id="school"
                                           class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light"
                                           placeholder="Enter your School Here" required>
                                </div>
                            </section>
                        </div>

                        <div class="bg-gray-50 dark:bg-gray-800 rounded-xl">
                            <div class="text-start">
                                <p class="p-4 dark:text-white uppercase text-md">List of Skills</p>
                                <hr class="w-full bg-gray-100 border-1 rounded-sm dark:bg-gray-300">
                            </div>
                            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 p-8">
                                <!-- Skills checkboxes -->
                                @foreach ($skills as $skill)
                                    <div class="flex items-center mb-2">
                                        <input wire:model="skills" type="checkbox" value="{{ $skill->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-{{ $skill->id }}" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $skill->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <button type="submit" class="w-full md:w-1/2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            Submit
                        </button>
                    </form>
                </div>

                <!-- Modal -->
                <div x-show="showModal" x-transition class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto bg-gray-800 bg-opacity-50">
                    <div class="relative p-4 w-full max-w-md bg-white rounded-lg shadow-lg dark:bg-gray-700">
                        <button type="button" @click="showModal = false" class="absolute top-3 right-3 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                        </button>
                        <div class="text-center p-4">
                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Form submitted successfully!</h3>
                            <button @click="showModal = false" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5">
                                Close
                            </button>
                        </div>
                    </div>
                </div>

            </section>
        </div>
    </div>
</div>
