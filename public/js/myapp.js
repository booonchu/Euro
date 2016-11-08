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
	
	$(".content-header small").hide();
	$(".content-header .breadcrumb").hide();
	$(".box-footer .form-group").hide();
	
	if(window.location.pathname.indexOf('admin/schoolloyaltyfeehistory') > 0 
		|| window.location.pathname.indexOf('admin/schoolcoursecosthistory') > 0
		|| window.location.pathname.indexOf('admin/schoolcoursesalepricehistory') > 0 
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
	
});