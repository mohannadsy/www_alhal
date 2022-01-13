<!-- <html>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            background-color: #111;
            color: white;
        }
        
        tr:nth-child(odd) {
            background-color: #dddddd;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
    <script>
        $(document).ready(function() {
            var form = $('.form'),
                cache_width = form.width(),
                a4 = [595.28, 841.89]; // for a4 size paper width and height  

            $('#create_pdf').on('click', function() {
                $('body').scrollTop(0);
                createPDF();
            });

            function createPDF() {
                getCanvas().then(function(canvas) {
                    var
                        img = canvas.toDataURL("image/png"),
                        doc = new jsPDF({
                            unit: 'px',
                            format: 'a4'
                        });
                    doc.addImage(img, 'JPEG', 20, 20);
                    //doc.output('dataurlnewwindow');
                    doc.save('filename.pdf') 
                    form.width(cache_width);

//                   var string = doc.output('datauristring');

                    // var iframe = "<iframe width='100%' height='100%' src='" + string + "'></iframe>"

                    // var x = window.open();
                    // x.document.open();
                    // x.document.write(iframe);
                    // x.document.close();
                });
            }

            function getCanvas() {
                form.width((a4[0] * 1.33333) - 80).css('max-width', 'none');
                return html2canvas(form, {
                    imageTimeout: 2000,
                    removeContainer: true
                });
            }
        });
    </script>
</head>
<h1>How To Convert HTML To PDF using JavaScript - Websolutionstuff</h1>
<form class="form">
    <table>
        <tbody>
            <tr>
                <th>Company Name</th>
                <th>Employee Name</th>
                <th>Country</th>
            </tr>
            <tr>
                <td>Dell</td>
                <td>Maria</td>
                <td>Germany</td>
            </tr>
            <tr>
                <td>Asus</td>
                <td>Francisco</td>
                <td>Mexico</td>
            </tr>
            <tr>
                <td>Apple</td>
                <td>Roland</td>
                <td>Austria</td>
            </tr>
            <tr>
                <td>HP</td>
                <td>Helen</td>
                <td>UK</td>
            </tr>
            <tr>
                <td>Lenovo</td>
                <td>Yoshi</td>
                <td>Canada</td>
            </tr>
            <tr>
                <td>Accer</td>
                <td>Rovelli</td>
                <td>Italy</td>
            </tr>
        </tbody>
    </table><br>
    <input type="button" id="create_pdf" value="Generate PDF">
</form>

</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <button onclick="createPDF()">Create PDF</button>
    <div id="example1"></div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.2.7/pdfobject.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.2.7/pdfobject.min.js"></script>
<script>
     function createPDF(){
        var doc = new jsPDF();
        doc.text("This is some text",20,20);
        window.open(doc.output('bloburl'))
    }
    
    
</script>

   

</html>