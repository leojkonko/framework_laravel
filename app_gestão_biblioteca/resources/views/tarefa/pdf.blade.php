<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

        <style>
            .titulo{
                border: 1px;
                background-color: grey;
                text-align: center;
                text-transform: uppercase;
                width: 100%;
                font-weight: bold;
                margin bottom: 25px;
            }

            .tabela{
                width: 100%;
            }

            table th{
                text-align: left;
            }
            .page-break {
    page-break-after: always;
}
        </style>
    </head>
<body>
<h2 class="titulo">Lista de tarefas</h2>
<table class="tabela">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tarefa</th>
            <th>Data Limite Conclusão</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tarefas as $key => $tarefa)
            <tr>
                <td>{{ $tarefa->id }}</td>
                <td>{{ $tarefa->tarefa }}</td>
                <td>{{ date('d/m/Y', strtotime($tarefa->data_limite_conclusao)) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>


<div class="page-break"></div>
<h1>Page 2</h1>
<div class="page-break"></div>
<h1>Page 3</h1>
<div class="page-break"></div>
<h1>Page 4</h1>
<div class="page-break"></div>
<h1>Page 5</h1>
<div class="page-break"></div>
<h1>Page 6</h1>

</body>
</html>