@props(['Kategori'])
<div class="fixed left-0 right-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto top-4 md:inset-0 h-modal sm:h-full"
    id="add-kategori">
    <div class="relative w-full h-full max-w-2xl px-4 md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-700">
                <h3 class="text-xl font-semibold dark:text-white">
                    Tambah Kategori
                </h3>

                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="add-kategori">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close menu</span>
                </button>
            </div>
            <form action="{{ route('kategori/add') }}" id="addForm" method="post">
                @csrf
                <div class="flex gap-3 p-6">
                    <input type="text" name="kategori"
                        class=" shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Tambah Kategori" required>
                    <button type="submit"
                        class="inline-flex items-center justify-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                        <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Tambah
                    </button>
                </div>
            </form>
            <form action="{{ route('kategori/edit') }}" class="hidden" id="editForm" method="post">
                @csrf
                @method('put')
                <div class="flex gap-3 p-6">
                    <input type="hidden" name="idKategori" id="idKategori">
                    <input type="text" name="kategori" id="nameKategori"
                        class=" shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Edit Kategori" required>
                    <button type="submit"
                        class="inline-flex items-center justify-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                        <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Edit
                    </button>
                </div>
            </form>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                    <thead class="bg-gray-100 dark:bg-gray-700">
                        <tr>
                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">
                                No
                            </th>
                            <th scope=" col"
                                class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                Kategori
                            </th>
                            <th scope="col"
                                class="p-4 text-xs font-medium  text-gray-500 uppercase dark:text-gray-400 text-center">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                        @foreach ($Kategori as $k)
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                <td class="w-4 p-4">
                                    <div
                                        class="max-w-sm p-4 overflow-hidden text-base font-medium text-gray-900 truncate xl:max-w-xs dark:text-white">
                                        {{ $loop->iteration }}
                                    </div>
                                </td>
                                <td class="w-4 p-4 hidden">
                                    <div
                                        class="max-w-sm p-4 overflow-hidden text-base font-medium text-gray-900 truncate xl:max-w-xs dark:text-white">
                                        {{ $k->id }}
                                    </div>
                                </td>
                                <td
                                    class="max-w-sm p-4 overflow-hidden text-base font-medium text-gray-900 truncate xl:max-w-xs dark:text-white">
                                    {{ $k->name }}
                                </td>

                                <td class="p-4 space-x-2 whitespace-nowrap text-center">
                                    <button type="button" data-idkategori="{{ $k->id }}"
                                        class="editKategori inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:ring-yellow-300 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                            </path>
                                            <path fill-rule="evenodd"
                                                d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        Edit Kategori
                                    </button>
                                    <button type="button" data-modal-toggle="delete-kategori-{{ $k->id }}"
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{-- <form action="{{ route('table') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="first-name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                            <input type="text" name="Menu" value="Bonnie" id="first-name"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Bonnie" required>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="last-name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori </label>
                            <input type="text" name="kategori" value="Green" id="last-name"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Green" required>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                            <input type="number" name="harga" value="bonnie@flowbite.com" id="email"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="example@company.com" required>
                        </div>
                        <div class="col-span-4 sm:col-span-3">
                            <label for="position"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gambar </label>
                            <input type="file" name="gambar" id="gambar"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Upload File" required>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                        </div>
                        <div class="col-span-6 sm:col-span-3">

                        </div>
                        <div class="col-span-6">

                        </div>
                    </div> --}}
            </div>
            <!-- Modal footer -->
            <div class="items-center p-6 border-t border-gray-200 rounded-b dark:border-gray-700">
                <button id="tambahKategori"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="submit">Tambah Kategori</button>
            </div>
            </form>
        </div>
    </div>
</div>

@foreach ($Kategori as $k)
    <div class="fixed left-0 right-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto top-4 md:inset-0 h-modal sm:h-full"
        id="delete-kategori-{{ $k->id }}">
        <div class="relative w-full h-full max-w-md px-4 md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
                <!-- Modal header -->
                <div class="flex justify-end p-2">
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white"
                        data-modal-toggle="delete-kategori-{{ $k->id }}">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 pt-0 text-center">
                    <svg class="w-16 h-16 mx-auto text-red-600" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="mt-5 mb-6 text-lg text-gray-500 dark:text-gray-400">Apakah Yakin Ingin Menghapus
                        Kategori ini?</h3>
                    <a href="{{ url('kategori/delete/' . $k->id) }}"
                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2 dark:focus:ring-red-800">
                        Ya, Saya Yakin!
                    </a>
                    <button
                        class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-primary-300 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700"
                        data-modal-toggle="delete-kategori-{{ $k->id }}">
                        Tidak, Batalkan!
                    </button>
                </div>
            </div>
        </div>
    </div>
@endforeach

<script>
    document.querySelectorAll('.editKategori').forEach(function(button) {
        button.addEventListener('click', function() {
            var idKategori = this.getAttribute('data-idkategori');
            var name = document.getElementById('nameKategori');
            var id = document.getElementById('idKategori');
            var kategori = $(this).closest('tr').find('td:nth-child(3)').text().trim();
            var idkategori = $(this).closest('tr').find('td:nth-child(2)').text().trim();

            // Set nilai input field dengan nilai kategori
            name.value = kategori;
            id.value = idkategori;
            // Menggunakan JavaScript
            document.getElementById('addForm').style.display = 'none';
            document.getElementById('editForm').style.display = 'block';

        });
    });
    document.getElementById('tambahKategori').addEventListener('click', function() {
        document.getElementById('addForm').style.display = 'block';
        document.getElementById('editForm').style.display = 'none';
    })
</script>
