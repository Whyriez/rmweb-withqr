@props(['menu'])


<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
            <tr ">
                <th scope=" col" class="px-6 py-3 rounded-l-lg">
                Nama Makanan
                </th>
                <th scope="col" class="px-6 py-3">
                    Harga`
                </th>
                <th scope="col" class="px-6 py-3">
                    Gambar
                </th>
                <th scope="col" class="px-6 py-3">
                    Kategori
                </th>
                <th scope="col" class="px-6 py-3 rounded-r-lg  text-center ">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white dark:bg-gray-800 ">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white  ">
                    Magic Mouse 2
                </th>
                <td class="px-6 py-4">
                    <span>Rp </span>1000
                </td>
                <td class="px-6 py-4">
                    path
                </td>
                <td class="px-6 py-4">
                    {{ $menu }}
                </td>
                <td class="px-6 py-4  text-center">
                    <button type="button" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800  font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 ">Detail</button>
                    <button type="button" class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800  font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 ">Delete</button>
                </td>

            </tr>
        </tbody>
        <tfoot>
            <tr class="font-semibold text-gray-900 dark:text-white">
                <th scope="row" class="px-6 py-3 text-base">Total</th>
                <td class="px-6 py-3">3</td>
                <td class="px-6 py-3">21,000</td>
            </tr>
        </tfoot>
    </table>
</div>