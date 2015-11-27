	$(document).ready(function() {
		$('#data-table').dataTable({
			"sDom": 'T<"clear">lfrtip',
			"oTableTools": { "sSwfPath": "/swf/copy_csv_xls_pdf.swf" },
			"aaSorting": [],
			"sPaginationType": "full_numbers",
			"aoColumnDefs": [ { "bSortable": false, "aTargets": [ $("#data-table th").size() - 1 ] } ],
			"aLengthMenu": [[5, 10, 20, 50, 100, -1], [5, 10, 20, 50, 100, "All"]],
        			"iDisplayLength": 10 //default display length, if removed will show first entry in aLengthMenu
		})
	});
