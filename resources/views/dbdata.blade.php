<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Table</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="header d-flex align-items-center justify-content-between">
            <h2 class="">Employee Data Table</h2>
            <a href="{{ route('download.employee.pdf') }}" class="btn btn-sm btn-warning">Generate PDF?</a>
        </div>
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
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->project_name }}</td>
                        <td>{{ $data->phone_number }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>