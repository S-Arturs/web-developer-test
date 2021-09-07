<?php
  	include '../app/autoloader.inc.php';
?>
<div style=" text-align: center">
<button onclick="sortTable(2)">Sort by address</button>
<button onclick="sortTable(3)">Sort by date</button>
<input type="text" id="filterInput" onkeyup="filterTable('')" placeholder="Search for emails" title="Type in a name">

<?php
$EmailView = new EmailView();
$EmailView->showTable();

?>
<div id="buttons"></div>
<br>
<button id="btnExportToCsv" type="button" class="button" onClick="exportTable(true)">Export checked to CSV (with header)</button>
<button id="btnExportToCsv" type="button" class="button" onClick="exportTable(false)">Export checked to CSV (without header)</button>
<script src="emails-table.js"></script>

<script src="tableCSVExporter.js"></script>
    <script>
        const dataTable = document.getElementById("emails_table");
        const btnExportToCsv = document.getElementById("btnExportToCsv");
        function exportTable(header){
            const exporter = new TableCSVExporter(dataTable, header);
            const csvOutput = exporter.convertToCSV();
            const csvBlob = new Blob([csvOutput], { type: "text/csv" });
            const blobUrl = URL.createObjectURL(csvBlob);
            const anchorElement = document.createElement("a");

            anchorElement.href = blobUrl;
            anchorElement.download = "table-export.csv";
            anchorElement.click();
            //there is a bug on some browsers where exporting won't happen unless there's some timeout
            setTimeout(() => {
                URL.revokeObjectURL(blobUrl);
            }, 500);
        }
</script>
