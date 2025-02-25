<!DOCTYPE html>
<html>
<head>
    <title>Savings Statements</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
        }
        .page-break {
            page-break-after: always;
        }
        .header {
            text-align: center;
            line-height: 8px;
        }
        .header-f{
            text-align: right !important;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid black;
            padding: 5px 2px;
            text-align: left;
        }
        @page {
            margin-top: 4cm;
            margin-header: 2cm;
            margin-footer: 2cm;
            header: page-header;
            footer: page-footer;
        }
        *{
            padding:0; 
            margin: 0;
        }

    </style>
</head>
<body>

    <htmlpageheader name="page-header">
        <div class="header">
            <h2>Proyas Manobik Unnayan Society</h2>
            <p>Office Code : 0001, Name : Unit-01 Gobratala</p>
            <h3>Employee Lists</h3>
        </div>
        <div class="header-f">
            <span><strong>POMIS-1</strong></span>
        </div>
        <span>
            <strong>@php echo date('F-Y'); @endphp</strong>
        </span>
    </htmlpageheader>
    
    <htmlpagefooter name="page-footer">
        <div class="footer">
            <table style="border: none; width: 100%; border-collapse: collapse;">
                <tr>
                    <td style="border: none;">
                        @php
                            echo "Printed Date : ". date('d-M-Y');
                        @endphp
                    </td>
                    <td style="border: none; text-align: right;">
                        <p>Page {PAGENO} of {nbpg}</p>
                    </td>
                </tr>
            </table>     
        </div>
    </htmlpagefooter>

    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Project Name</th>
                <th>Phone</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($empData as $data)
                <tr>
                    <td>EMP{{ $data->id }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->project_name }}</td>
                    <td>{{ $data->phone_number }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
