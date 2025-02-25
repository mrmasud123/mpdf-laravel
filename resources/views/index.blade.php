<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report Generate</title>
    <!-- Add Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h2>POMIS1 Office wise Consolidate Report</h2>
    <hr>

    <!-- Bootstrap Form -->
    <div class="container mt-4 mb-4">
        <form>
            <div class="form-group">
                <label for="officeName">Head Office</label>
                <select name="officeName" id="officeName" class="form-control">
                    <option value="null" selected readonly>100000 proyas consolidate</option>
                </select>
            </div>
            <div class="form-group">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="zone" id="zone1" value="zone1">
                    <label class="form-check-label" for="zone1"><strong>Zone wise</strong></label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="zone" id="zone2" value="zone2">
                    <label class="form-check-label" for="zone2"><strong>Program/Project</strong></label>
                </div>
            </div>
            <div class="form-group">
                <label for="zoneOffice">Zone Office</label>
                <select name="zoneOffice" id="zoneOffice" class="form-control">
                    <option value="null" selected readonly>01 Zone-01 | Chapainawabganj</option>
                </select>
            </div>
            <div class="form-group">
                <label for="officeArea">Area Office</label>
                <select name="officeArea" id="officeArea" class="form-control">
                    <option value="null" selected readonly>101 Chapainawabganj Area</option>
                </select>
            </div>
            <div class="form-group">
                <label for="unit">Office</label>
                <select name="unit" id="unit" class="form-control">
                    <option value="01gorbatala">001 Unit - 01 Gorbratala</option>
                    <option value="02gorbatala">001 Unit - 02 Gorbratala</option>
                </select>
            </div>
            <div class="form-group">
                <label for="officeName">Date To</label>
                <input type="date" name="date" class="form-control" id="">
            </div>
            <div class="form-group">
                <label for="exportType">Export Type</label>
                <select name="exportType" id="exportType" class="form-control">
                    <option value="pdf">View as pdf</option>
                    <option value="excel">View as excel</option>
                </select>
            </div>
            <a href="{{ route('generate.pdf') }}" class="btn btn-sm btn-warning">Generate Report</a>
        </form>
    </div>

</body>
</html>