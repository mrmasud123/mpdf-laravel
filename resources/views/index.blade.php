<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report Generate</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        #pdf-preview-container{
            display: none;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h2 class="p-2">POMIS1 Office wise Consolidate Report</h2>
    <hr>

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
            {{-- {{ $app_name }} --}}
        </form>
        <a href="{{ route('view.data') }}" class="btn btn-sm btn-success">View Employee Data</a>
        <button class="btn btn-sm btn-info" onclick="pdfgenerate()">Generate Report</button>
    </div>

    <div class="container" id="pdf-preview-container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2>Report Preview</h2>
                        <div class="btns">
                            <a href="{{ route('generate.pdf') }}" class="btn btn-sm btn-primary">PDF</a>
                            <button type="button" class="btn btn-sm btn-warning">Excel</button>
                            <button type="button" onclick="printPDF()" class="btn btn-sm btn-info">Print</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <iframe id="pdf-preview" src="" height="500px" width="100%" frameborder="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function pdfgenerate(e){
            document.getElementById('pdf-preview-container').style.display = 'block';
            document.getElementById('pdf-preview').src = "{{ route('load.pdf') }}";
            document.getElementById('pdf-preview-container').scrollIntoView({ behavior: 'smooth' });
        }
        function printPDF() {
            var pdfUrl = document.getElementById('pdf-preview').src;
            if (!pdfUrl) {
                alert("No PDF loaded to print.");
                return;
            }

            // fetch(pdfUrl)
            //     .then(response => response.blob())
            //     .then(blob => {
            //         var blobUrl = URL.createObjectURL(blob);
            //         console.log(blob);
            //         var newWindow = window.open(blobUrl);
            //         // newWindow.onload = function () {
            //         //     newWindow.print();
            //         // };
            //     })
            //     .catch(error => console.error("Error fetching PDF:", error));

            fetch(pdfUrl)
            .then(response => response.blob())
            .then(blob=>{
                var blobUrl=URL.createObjectURL(blob);
                var newWindow=window.open(blobUrl);
                newWindow.onload= function(){
                    newWindow.print()
                }
            });

        }


    </script>
</body>
</html>