<?php
include('include/nav.php');
?>

<h1>Test Blank</h1>
<div class="container" id="container">

    <table class="table border">
        <tr>
            <th>Header</th>
        </tr>
        <tr>
            <td>Body</td>
        </tr>
    </table>
    <button onclick="print_pdf()">Print</button>
</div>

<script>
    function print_pdf() {
        var prtContent = document.getElementById('#container');
        var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
        WinPrint.document.write(prtContent.innerHTML);
        WinPrint.document.close();
        WinPrint.focus();
        WinPrint.print();
        WinPrint.close();;
    }
</script>
<?php
include('include/footer.php');
?>