<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Dick Crud Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used by the CRUD interface.
    | You are free to change them to anything
    | you want to customize your views to better match your application.
    |
    */

    // Create form
    'add'                 => 'เพิ่ม',
    'back_to_all'         => '',
    'cancel'              => 'ยกเลิก',
    'add_a_new'           => '',

        // Create form - advanced options
        //'after_saving'            => 'After saving',
        //'go_to_the_table_view'    => 'go to the table view',
        //'let_me_add_another_item' => 'let me add another item',
        //'edit_the_new_item'       => 'edit the new item',

    // Edit form
    'edit'                 => 'แก้ไข',
    'save'                 => 'บันทึก',

    // Revisions
    'revisions'            => 'Revisions',
    'no_revisions'         => 'No revisions found',
    'created_this'          => 'created this',
    'changed_the'          => 'changed the',
    'restore_this_value'   => 'Restore this value',
    'from'                 => 'from',
    'to'                   => 'to',
    'undo'                 => 'Undo',
    'revision_restored'    => 'Revision successfully restored',

    // CRUD table view
    'all'                       => ' ',
    'in_the_database'           => 'in the database',
    'list'                      => 'List',
    'actions'                   => '',
    'preview'                   => 'Preview',
    'delete'                    => 'ยกเลิก',
    'admin'                     => 'Admin',
    'details_row'               => 'This is the details row. Modify as you please.',
    'details_row_loading_error' => 'There was an error loading the details. Please retry.',

        // Confirmation messages and bubbles
        'delete_confirm'                              => 'Are you sure you want to delete this item?',
        'delete_confirmation_title'                   => 'Item Deleted',
        'delete_confirmation_message'                 => 'The item has been deleted successfully.',
        'delete_confirmation_not_title'               => 'NOT deleted',
        'delete_confirmation_not_message'             => "There's been an error. Your item might not have been deleted.",
        'delete_confirmation_not_deleted_title'       => 'Not deleted',
        'delete_confirmation_not_deleted_message'     => 'Nothing happened. Your item is safe.',

        // DataTables translation
        'emptyTable'     => 'ไม่พบข้อมูล',
        'info'           => '',
        'infoEmpty'      => '',
        'infoFiltered'   => '',
        'infoPostFix'    => '',
        'thousands'      => ',',
        'lengthMenu'     => '',
        'loadingRecords' => 'Loading...',
        'processing'     => 'Processing...',
        'search'         => 'ค้นหา',
        'zeroRecords'    => 'No matching records found',
        'paginate'       => [
            'first'    => 'First',
            'last'     => 'Last',
            'next'     => 'Next',
            'previous' => 'Previous',
        ],
        'aria' => [
            'sortAscending'  => ': activate to sort column ascending',
            'sortDescending' => ': activate to sort column descending',
        ],

    // global crud - errors
    'unauthorized_access' => 'Unauthorized access - you do not have the necessary permissions to see this page.',
    'please_fix' => 'Please fix the following errors:',

    // global crud - success / error notification bubbles
    'insert_success' => 'The item has been added successfully.',
    'update_success' => 'The item has been modified successfully.',

    // CRUD reorder view
    'reorder'                      => 'Reorder',
    'reorder_text'                 => 'Use drag&drop to reorder.',
    'reorder_success_title'        => 'Done',
    'reorder_success_message'      => 'Your order has been saved.',
    'reorder_error_title'          => 'Error',
    'reorder_error_message'        => 'Your order has not been saved.',

    // CRUD yes/no
    'yes' => 'Yes',
    'no' => 'No',

    // Fields
    'browse_uploads' => 'Browse uploads',
    'clear' => 'Clear',
    'page_link' => 'Page link',
    'page_link_placeholder' => 'http://example.com/your-desired-page',
    'internal_link' => 'Internal link',
    'internal_link_placeholder' => 'Internal slug. Ex: \'admin/page\' (no quotes) for \':url\'',
    'external_link' => 'External link',
    'choose_file' => 'Choose file',

    //Table field
    'table_cant_add' => 'Cannot add new :entity',
    'table_max_reached' => 'Maximum number of :max reached',

];
