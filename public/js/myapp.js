$(document).ready(function() {
  if ($( "#mytree" ).length ) {
		$('#mytree').jstree({
        'plugins': ["wholerow", "checkbox"],
        'core': {
            'data': [{
                    "text": "เปียโน เริ่มต้น",
                    "children": ["เปียโน เริ่มต้น 1", "เปียโน เริ่มต้น 2", "เปียโน เริ่มต้น 3"]
                },
								{
                    "text": "เปียโน ขั้นสูง",
                    "children": ["เปียโน ขั้นสูง 1", "เปียโน ขั้นสูง 2", "เปียโน ขั้นสูง 3"]
                },
								{
                    "text": "กลอง",
                    "children": ["กลองเริ่มต้น", "กลองขั้นทั่วไป", "กลองขั้นสูง"]
                },
            ],
            'themes': {
                'name': 'proton',
                'responsive': true
            }
        }
		});
	}
	
	if ($("#tbClass").length ) {
		$("#tbClass").toggle();
	}
	
	$(".content-header small").hide();
	$(".content-header .breadcrumb").hide();
	$(".box-footer .form-group").hide();
	
	if(window.location.pathname.indexOf('admin/schoolloyaltyfeehistory') > 0
		|| window.location.pathname.indexOf('admin/schoolcourse') > 0
		|| window.location.pathname.indexOf('admin/schoolcoursecosthistory') > 0
		|| window.location.pathname.indexOf('admin/schoolcoursesalepricehistory') > 0 
		|| window.location.pathname.indexOf('admin/teachercourse') > 0 
	)  {
		$("#crudTable_filter").hide();
	}
	
	if(window.location.pathname.indexOf('admin/report') > 0)  {
		$("#crudTable_filter").hide();
		$("#datatable_button_stack .buttons-copy").hide();
		$("#datatable_button_stack .buttons-excel").hide();
		$("#datatable_button_stack .buttons-csv").hide();
		$("#datatable_button_stack .buttons-pdf").hide();
		$("#datatable_button_stack .buttons-colvis").hide();
		$("#crudTable_paginate").hide();
		$("#crudTable").hide();
	}
	
	if(window.location.pathname.indexOf('admin/holiday') > 0)  {
		$("#crudTable_paginate").hide();
	}
	
	if(window.location.pathname.indexOf('admin/teacheradmin') > 0)  {
		$("#crudTable_filter").hide();
		
		$("#crudTable > tbody > tr > td:nth-child(10) > a:nth-child(1)").html('<i class="fa fa-edit"> อนุมัติ')
	}
	
	if(window.location.pathname.indexOf('admin/studentsubscription') > 0)  {
		if(window.location.pathname.indexOf('admin/studentsubscriptionclass') > 0)  {
			$("#crudTable_filter").hide();
			$("#crudTable > tbody > tr:nth-child(2) > td:nth-child(10) > a").replaceWith('')
		}
		else if(window.location.pathname.indexOf('admin/studentsubscriptionpayment') > 0)  {
			$("#crudTable_filter").hide();
			$("#crudTable > tbody > tr:nth-child(2) > td:nth-child(11) > a").replaceWith('')
			$("#crudTable > tbody > tr > td:nth-child(11) > a:nth-child(1)").replaceWith('<a href="http://192.168.28.100:8000/admin/studentsubscriptionpayment2/1/edit" class="btn btn-xs btn-default"><i class="fa fa-edit"> แสดง</i></a>')
			
		}
		else {
			$("#crudTable_filter").hide();
			$("#crudTable > tbody > tr:nth-child(1) > td:nth-child(10) > a:nth-child(2)").replaceWith('<a href="#" class="btn btn-xs btn-default"><i class="fa fa-edit"></i> จบหลักสูตร</a><a href="#" class="btn btn-xs btn-default" data-button-type="delete"><i class="fa fa-trash"></i> ยกเลิก</a>')
			$("#crudTable > tbody > tr:nth-child(2) > td:nth-child(10) > a").replaceWith('')
		}
	}
	
	if ($("#popover").length ) {
			$('#popover').popover()
	}

$( "#day_1" ).click(function() {
	$( "#cheque_bank" ).parent().hide();
	$( "#cheque_branch" ).parent().hide();
	$( "#cheque_no" ).parent().hide();
	$( "#cheque_date" ).parent().parent().hide();
	$( "#bankdeposit_bank" ).parent().hide();
	$( "#bankdeposit_branch" ).parent().hide();
	$( "#bankdeposit_no" ).parent().hide();
	$( "#bankdeposit_date" ).parent().parent().hide();
	$( "#creditcard_issuer" ).parent().hide();
	$( "#creditcard_no" ).parent().hide();
});

$( "#day_2" ).click(function() {
	$( "#cheque_bank" ).parent().show();
	$( "#cheque_branch" ).parent().show();
	$( "#cheque_no" ).parent().show();
	$( "#cheque_date" ).parent().parent().show();
	$( "#bankdeposit_bank" ).parent().hide();
	$( "#bankdeposit_branch" ).parent().hide();
	$( "#bankdeposit_no" ).parent().hide();
	$( "#bankdeposit_date" ).parent().parent().hide();
	$( "#creditcard_issuer" ).parent().hide();
	$( "#creditcard_no" ).parent().hide();
});

$( "#day_3" ).click(function() {
	$( "#cheque_bank" ).parent().hide();
	$( "#cheque_branch" ).parent().hide();
	$( "#cheque_no" ).parent().hide();
	$( "#cheque_date" ).parent().parent().hide();
	$( "#bankdeposit_bank" ).parent().show();
	$( "#bankdeposit_branch" ).parent().show();
	$( "#bankdeposit_no" ).parent().show();
	$( "#bankdeposit_date" ).parent().parent().show();
	$( "#creditcard_issuer" ).parent().hide();
	$( "#creditcard_no" ).parent().hide();
});

$( "#day_4" ).click(function() {
	$( "#cheque_bank" ).parent().hide();
	$( "#cheque_branch" ).parent().hide();
	$( "#cheque_no" ).parent().hide();
	$( "#cheque_date" ).parent().parent().hide();
	$( "#bankdeposit_bank" ).parent().hide();
	$( "#bankdeposit_branch" ).parent().hide();
	$( "#bankdeposit_no" ).parent().hide();
	$( "#bankdeposit_date" ).parent().parent().hide();
	$( "#creditcard_issuer" ).parent().show();
	$( "#creditcard_no" ).parent().show();
});

	if ($("#day_1").length ) {
			$("#day_1").click()
	}
	
});

function showClass() {
		$("#tbClass").toggle();
}