<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de pdf de categorias</title>
</head>
<body>
    <main>
        <section>cabezera</section>

        <main>
            josue Huarsaya

            <h2>reporte Categorias</h2>
            <table>
                <thead>
                    <tr>
                        <tr>nombre</tr>
                        <tr>descripcion</tr>
                        <tr>estado</tr>
                        <tr>fecha Creacion</tr>
                        <tr></tr>
                        <tr></tr>
                    </tr>
                </thead>
                <tbody>
                    @forelse ( $categorias as $item )
                    <tr>
                        <td>{{ $item->nombre_categoria}}</td>
                        <td>{{ $item->descripcion}}</td>
                        <td>{{ $item->estado}}</td>
                        <td>{{ $item->}}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspam='4'> no hay datos</td>
                    </tr>
                        
                    @endforelse
                    
                </tbody>
            </table>

            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    </tr>
                    <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    </tr>
                    <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                    </tr>
                </tbody>
                </table>
                        </main>

        <section>footer</section>
    </main>
</body>
</html>