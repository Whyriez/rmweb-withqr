<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- @vite('resources/css/app.css') --}}
</head>


<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Inline CSS Invoice Template</title>
    </head>

    <body>
        <div style="padding: 10px;">
            <table style="width: 100%;">
                <tr style="width: 100%;">
                    <td style="width: 50%;">
                        <label style="font-size: 40px; font-weight: bold;">{{ $noPesanan }}</label>
                    </td>
                </tr>
            </table>
            <table style="width: 100%; margin: 10px 0px;">
                <tr style="width: 100%;">
                    <td style="width: 50%; line-height: 25px; text-align: left;">
                        <label>Tanggal : {{ $tanggal }}</label>
                    </td>
                    <td style="width: 33%; text-align: center;">
                        <span
                            style="background: #e1e1e1; font-size: 15px; font-weight: bold; padding: 10px; color: #343a40;">
                            NOT COMPLETE/NOT PAID
                        </span>
                    </td>
                </tr>

            </table>
            <table style="width: 100%;">
                <tr style="background: #343a40; color: white;">
                    <th style="padding: 10px;">
                        No
                    </th>
                    <th>
                        Menu
                    </th>
                    <th>
                        Jumlah
                    </th>
                    <th>
                        Nomor Meja
                    </th>
                    <th>
                        Harga
                    </th>
                </tr>
                @foreach ($items as $index => $item)
                    <tr>
                        <td style="text-align: center;">
                            {{ $index + 1 }}
                        </td>
                        <td style="text-align: center;">
                            {{ $item['menu'] }}
                        </td>
                        <td style="text-align: center;">
                            {{ $item['jumlah'] }}
                        </td>
                        <td style="text-align: center;">
                            {{ $nomor_meja }}
                        </td>
                        <td style="text-align: center;">
                            {{ $item['harga'] }}
                        </td>
                    </tr>
                @endforeach
            </table>
            <h1>Total : {{ $total }}</h1>
        </div>
    </body>

    </html>
</body>

</html>
