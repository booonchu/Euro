<?php

CRUD::resource('school', 'Admin\SchoolCrudController');
CRUD::resource('schoolloyaltyfeehistory', 'Admin\SchoolLoyaltyFeeHistoryCrudController');
CRUD::resource('schoolcourse', 'Admin\SchoolCourseCrudController');
CRUD::resource('schoolcoursecosthistory', 'Admin\SchoolCourseCostHistoryCrudController');
CRUD::resource('schoolcoursesalepricehistory', 'Admin\SchoolCourseSalepriceHistoryCrudController');
CRUD::resource('coursecategory', 'Admin\CourseCategoryCrudController');
CRUD::resource('course', 'Admin\CourseCrudController');
CRUD::resource('student', 'Admin\StudentCrudController');
CRUD::resource('studentsubscription', 'Admin\StudentSubscriptionCrudController');
CRUD::resource('studentsubscriptionclass', 'Admin\StudentSubscriptionClassCrudController');
CRUD::resource('studentsubscriptionpayment', 'Admin\StudentSubscriptionPaymentCrudController');
CRUD::resource('studentsubscriptionpaymentdetail', 'Admin\StudentSubscriptionPaymentDetailCrudController');
CRUD::resource('teacher', 'Admin\TeacherCrudController');
CRUD::resource('teachercourse', 'Admin\TeacherCourseCrudController');
CRUD::resource('teacheradmin', 'Admin\TeacherAdminCrudController');
CRUD::resource('room', 'Admin\RoomCrudController');
CRUD::resource('holiday', 'Admin\HolidayCrudController');
CRUD::resource('xuser', 'Admin\XUserCrudController');
CRUD::resource('report', 'Admin\ReportCrudController');