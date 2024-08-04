<div class="min-h-screen flex justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-5xl w-full space-y-8">
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="flex justify-between items-center mb-6 mt-5">
                <h4 class="text-xl font-extrabold text-gray-900">Pre-Registration Form</h4>
            </div>

            <div class="mt-2">
                <form wire:submit.prevent="register">
                    <div class="mb-4 flex flex-col sm:flex-row sm:space-x-4 space-y-4 sm:space-y-0">
                        <div class="w-full sm:w-1/3">
                            <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                            <input type="text" id="first_name" wire:model="first_name"
                                class="mt-1 p-2 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            @error('first_name')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full sm:w-1/3">
                            <label for="middle_name" class="block text-sm font-medium text-gray-700">Middle Name (Optional)</label>
                            <input type="text" id="middle_name" wire:model="middle_name"
                                class="mt-1 p-2 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            @error('middle_name')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full sm:w-1/3">
                            <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                            <input type="text" id="last_name" wire:model="last_name"
                                class="mt-1 p-2 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            @error('last_name')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="w-full sm:w-1/3">
                            <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                            <select id="gender" wire:model="gender"
                                class="mt-1 p-2 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            @error('gender')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="submit"
                            class="w-full sm:w-auto inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3">Save
                            Changes</button>
                        <button type="button" wire:click="clear"
                            class="mt-3 sm:mt-0 w-full sm:w-auto inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm">Clear</button>
                    </div>
                </form>
            </div>

            <div class="flex justify-between items-center mb-6 mt-5">
                <h4 class="text-xl font-extrabold text-gray-900">Pre-Registration Lists</h4>
                <input type="text" wire:model.live="search" placeholder="Search..."
                    class="mt-1 p-2 block w-full sm:w-1/3 shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b border-gray-300 text-left text-sm font-medium text-gray-500">
                            Fullname</th>
                        <th class="py-2 px-4 border-b border-gray-300 text-left text-sm font-medium text-gray-500">
                            Gender</th>
                        <th class="py-2 px-4 border-b border-gray-300 text-right text-sm font-medium text-gray-500">
                            Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($records as $participant)
                        <tr>
                            <td class="py-2 px-4 border-b border-gray-300 text-sm text-gray-700">
                                {{ $participant->first_name }} {{ $participant->middle_name }}
                                {{ $participant->last_name }}</td>
                            <td class="py-2 px-4 border-b border-gray-300 text-sm text-gray-700">
                                {{ $participant->gender }}</td>
                            <td class="py-2 px-4 border-b border-gray-300 text-sm text-gray-700 text-right">
                                <button wire:click="edit({{ $participant->id }})"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded mr-2">Edit</button>
                                <button onclick="confirmDelete({{ $participant->id }})"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Remove</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3"
                                class="py-2 px-4 border-b border-gray-300 text-sm text-gray-700 text-center">No records
                                found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-3">
                {{ $records->links() }}
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDelete(id) {
        if (confirm('Are you sure you want to delete this record?')) {
            @this.call('delete', id);
        }
    }
</script>
