<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="header d-flex align-items-center justify-content-between">
            <h2 class="">Add Employee</h2>
            <div class="btns">
                <a href="{{ route('view.data') }}" class="btn btn-sm btn-success">View Employee?</a>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <table class="table table-bordered table-hover">
                    <tr>
                        <td><strong>Employee Name</strong></td>
                        <td>{{ $empData->name }}</td>
                    </tr>
                    <tr>
                        <td><strong>Employee E-mail</strong></td>
                        <td>{{ $empData->email }}</td>
                    </tr>
                    <tr>
                        <td><strong>Employee Project Name</strong></td>
                        <td>{{ $empData->project_name }}</td>
                    </tr>
                    <tr>
                        <td><strong>Employee Phone Number</strong></td>
                        <td>{{ $empData->phone_number }}</td>
                    </tr>
                </table>
            </div>
        </div>
        
    </div>
</body>
</html>