<!-- Main modal (Alpine-driven) -->
<div x-show="openDeleteModal" x-cloak x-transition class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/40">
    <div class="w-full max-w-sm sm:max-w-md mx-4 sm:mx-0">
        <!-- Modal content -->
        <div @click.outside="openDeleteModal = false" class="p-4 sm:p-5 text-center bg-white rounded-lg shadow-lg dark:bg-gray-800 max-h-[90vh] overflow-auto">
            <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="deleteModal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>

            <!-- Icon -->
            <svg class="text-gray-400 dark:text-gray-500 w-1 h-1 sm:w-1 sm:h-1 mb-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
            </svg>

            <p class="mb-4 text-gray-500 dark:text-gray-300 text-sm sm:text-base">
                Are you sure you want to delete this item?
            </p>

            <div class="flex flex-col sm:flex-row justify-center items-center gap-3">
                <button @click="openDeleteModal = false" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                    No, cancel
                </button>
                <!-- Replace this plain button with a form submit if you use the modal partial alone.
                     When using the inline modal in index.blade.php you already have the form there. -->
                <button @click="$refs.deleteForm?.submit()" type="button" class="py-2 px-3 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                    Yes, I'm not sure
                </button>
             </div>
         </div>
     </div>
 </div>
