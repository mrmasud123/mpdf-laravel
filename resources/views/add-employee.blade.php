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
                <form action="{{ route('employee.save') }}" method="post">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="name">Enter Name</label>
                        <input type="text" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" name="name" id="name">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>    
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="email">Enter E-mail</label>
                        <input type="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" name="email" id="email">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>    
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="project">Enter Project Name</label>
                        <input type="text" value="{{ old('project') }}" class="form-control @error('project') is-invalid @enderror" name="project" id="project">
                        @error('project')
                            <span class="text-danger">{{ $message }}</span>    
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="phone">Enter Phone</label>
                        <input type="text" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone">
                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>    
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary">Add Employee</button>
                </form>
            </div>
        </div>
        
    </div>
</body>
</html>