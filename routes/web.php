<?php

use Illuminate\Support\Facades\Artisan;
//Clear Cache facade value:
Route::get('reboot', function() {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    file_put_contents(storage_path('logs/laravel.log'),'');
    Artisan::call('key:generate');
    Artisan::call('config:cache');
    return '<center><h1>System Rebooted!</h1></center>';
});
Route::get('/','DashboardController@index');
Route::get('change/password','DashboardController@changePassword')->name('change.password');
Route::post('update/password','DashboardController@updatePassword')->name('update.password');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('user/show','UserController@show');

Route::group(['middleware'=>'auth'],function(){
    /** Merchandising */
    /** Buyer Routes */
    Route::get('merchandise/manage-buyer','BuyerController@index');
    Route::get('merchandise/add-buyer','BuyerController@add_buyer');
    Route::post('merchandise/buyer-store','BuyerController@store');
    Route::get('buyer/edit/{id}', 'BuyerController@edit');
    Route::patch('buyer/{id}/update', 'BuyerController@update');
    Route::delete('buyer/delete/{id}', 'BuyerController@destroy');

    /** Supplier Routes */
    Route::get('merchandise/manage-supplier','SupplierController@manage_supplier');
    Route::get('merchandise/add-supplier','SupplierController@add_supplier');
    Route::post('merchandise/supplier-store','SupplierController@store');
    Route::get('supplier/edit/{id}', 'SupplierController@edit');
    Route::patch('supplier/{id}/update', 'SupplierController@update');
    Route::delete('supplier/delete/{id}', 'SupplierController@destroy');

    /** Inventory Routes should be transferred to Inventory part later */
    Route::get('products/fabrics-category','Inventory\FabricCategoryController@category_setting');
    Route::post('products/fabrics-category','Inventory\FabricCategoryController@store');
    Route::delete('products/fabrics-category/{id}','Inventory\FabricCategoryController@destroy')->name('deleteFabrics');
    Route::get('products/fabrics','Inventory\FabricController@fabrics_setting');
    Route::get('products/accessories-category','Inventory\AccessoriesCategoryController@category_setting');
    Route::get('settings/trims-category','Inventory\TrimsCategoryController@category_setting');


    //  Fabrics Routes Start By Nishat Chowdhury
    Route::get('products/fabrics','Inventory\FabricController@create');
    Route::post('products/fabrics/store','Inventory\FabricController@store');
    Route::delete('products/fabrics/{id}/delete','Inventory\FabricController@destroy')->name('delete.fabric');
    Route::get('products/fabrics/edit/{id}','Inventory\FabricController@edit')->name('edit.fabric');
    Route::patch('products/fabrics/update/{id}','Inventory\FabricController@update')->name('update.fabric');
    //  Fabrics Routes End


//  Accessories Routes Start By Nishat Chowdhury
    Route::get('products/accessories','Inventory\AccessoriesController@create');
    Route::post('products/accessories/store','Inventory\AccessoriesController@store');
    Route::delete('products/accessories/{id}/delete','Inventory\AccessoriesController@destroy')->name('delete.accessories');;
    Route::get('products/accessories/edit/{id}','Inventory\AccessoriesController@edit')->name('edit.accessories');
    Route::patch('products/accessories/update/{id}','Inventory\AccessoriesController@update')->name('update.accessories');
//  Accessories Routes End


//  Trims  Routes Start By Nishat Chowdhury
    Route::get('products/trims','Inventory\TrimsController@create');
    Route::post('products/trims/store','Inventory\TrimsController@store');
    Route::delete('products/trims/{id}/delete','Inventory\TrimsController@destroy')->name('delete.trim');
    Route::get('products/trims/edit/{id}','Inventory\TrimsController@edit')->name('edit.trim');
    Route::patch('products/trims/update/{id}','Inventory\TrimsController@update')->name('update.trim');
//  Trims Routes End

//  Other Trims  Routes Start By Nishat Chowdhury
    Route::get('products/other-trims','Inventory\OtherTrimController@create');
    Route::post('products/other-trims/store','Inventory\OtherTrimController@store');
    Route::delete('products/other-trims/{id}/delete','Inventory\OtherTrimController@destroy')->name('delete.other-trim');
    Route::get('products/other-trims/edit/{id}','Inventory\OtherTrimController@edit')->name('edit.other-trim');
    Route::patch('products/other-trims/update/{id}','Inventory\OtherTrimController@update')->name('update.other-trim');
//  Other Trims Routes End

//  Fabrics Categories Start By Nishat Chowdhury
    Route::get('products/fabrics_categories','Inventory\FabricCategoryController@create');
    Route::post('products/fabrics_categories/store','Inventory\FabricCategoryController@store');
    Route::delete('products/fabrics_categories/{id}/delete','Inventory\FabricCategoryController@destroy')->name('delete.fabricsCategory');
    Route::get('products/fabrics_categories/edit/{id}','Inventory\FabricCategoryController@edit')->name('edit.fabricsCategory');
    Route::patch('products/fabrics_categories/update/{id}','Inventory\FabricCategoryController@update')->name('update.fabricsCategory');
//  Fabrics Routes End

    //  Company address Start By Nishat Chowdhury
    Route::get('settings/company_address','Inventory\CompanyAddressController@create');
    Route::post('settings/company_address/store','Inventory\CompanyAddressController@store');
    Route::delete('settings/company_address/{id}/delete','Inventory\CompanyAddressController@destroy')->name('delete.companyCategory');
    Route::get('settings/company_address/edit/{id}','Inventory\CompanyAddressController@edit')->name('edit.companyCategory');
    Route::patch('settings/company_address/update/{id}','Inventory\CompanyAddressController@update')->name('update.companyCategory');
//  Company Routes End

    //  Company unit Start By Nishat Chowdhury
    Route::get('settings/company_unit','Merchandise\CompanyUnitController@index');
    Route::post('settings/company_unit/store','Merchandise\CompanyUnitController@store');
    Route::delete('settings/company_unit/{id}/delete','Merchandise\CompanyUnitController@destroy')->name('delete.companyUnit');
    Route::get('settings/company_unit/edit/{id}','Merchandise\CompanyUnitController@edit')->name('edit.companyUnit');
    Route::patch('settings/company_unit/update/{id}','Merchandise\CompanyUnitController@update')->name('update.companyUnit');
//  Company unit Routes End

    //  Price Quotation Start By Nishat Chowdhury
    Route::get('settings/price_quotation','Merchandise\PriceQuotationController@index');
    Route::post('settings/price_quotation/store','Merchandise\PriceQuotationController@store');
    Route::delete('settings/price_quotation/{id}/delete','Merchandise\PriceQuotationController@destroy')->name('delete.priceQuo');
    Route::get('settings/price_quotation/edit/{id}','Merchandise\PriceQuotationController@edit')->name('edit.priceQuo');
    Route::patch('settings/price_quotation/update/{id}','Merchandise\PriceQuotationController@update')->name('update.priceQuo');
//  Company unit Routes End

//  Accessories Categories Start By Nishat Chowdhury
    Route::get('products/accessories_categories','Inventory\AccessoriesCategoryController@create');
    Route::post('products/accessories_categories/store','Inventory\AccessoriesCategoryController@store');
    Route::delete('products/accessories_categories/{id}/delete','Inventory\AccessoriesCategoryController@destroy')->name('delete.accessoriesCategory');
    Route::get('products/accessories_categories/edit/{id}','Inventory\AccessoriesCategoryController@edit')->name('edit.accessoriesCategory');
    Route::patch('products/accessories_categories/update/{id}','Inventory\AccessoriesCategoryController@update')->name('update.accessoriesCategory');
//  Accessories Routes End


//  Trims Categories Routes Start By Nishat Chowdhury
    Route::get('products/trims-categories','Inventory\TrimsCategoryController@create');
    Route::post('products/trims-categories/store','Inventory\TrimsCategoryController@store');
    Route::delete('products/trims-categories/{id}/delete','Inventory\TrimsCategoryController@destroy')->name('delete.trimsCategory');
    Route::get('products/trims-categories/edit/{id}','Inventory\TrimsCategoryController@edit')->name('edit.trimsCategory');
    Route::patch('products/trims-categories/update/{id}','Inventory\TrimsCategoryController@update')->name('update.trimsCategory');
//  Trims Routes End

//  Other Trims Categories Routes Start By Nishat Chowdhury
    Route::get('products/other-trims-categories','Inventory\OtherTrimCategoryController@create');
    Route::post('products/other-trims-categories/store','Inventory\OtherTrimCategoryController@store');
    Route::delete('products/other-trims-categories/{id}/delete','Inventory\OtherTrimCategoryController@destroy')->name('delete.OtherTrimCategory');
    Route::get('products/other-trims-categories/edit/{id}','Inventory\OtherTrimCategoryController@edit')->name('edit.OtherTrimCategory');
    Route::patch('products/other-trims-categories/update/{id}','Inventory\OtherTrimCategoryController@update')->name('update.OtherTrimCategory');
//  Other Trims Categories Routes End

//  Product Unit Routes Start By Nishat Chowdhury
    Route::get('products/units','Inventory\ProductUnitController@create');
    Route::post('products/unit/store','Inventory\ProductUnitController@store');
    Route::delete('products/unit/{id}/delete','Inventory\ProductUnitController@destroy')->name('delete.productUnit');
    Route::get('products/unit/edit/{id}','Inventory\ProductUnitController@edit')->name('edit.productUnit');
    Route::patch('products/unit/update/{id}','Inventory\ProductUnitController@update')->name('update.productUnit');
//  Product Unit Routes End

//  Zipper Color Start By Nishat Chowdhury
    Route::get('settings/colors','Inventory\ZipperColorController@create');
    Route::post('settings/colors/store','Inventory\ZipperColorController@store');
    Route::delete('settings/colors/{id}/delete','Inventory\ZipperColorController@destroy')->name('delete.zipperColor');
    Route::get('settings/colors/edit/{id}','Inventory\ZipperColorController@edit')->name('edit.zipperColor');
    Route::patch('settings/colors/update/{id}','Inventory\ZipperColorController@update')->name('update.zipperColor');
//  Company Routes End

    Route::get('products/accessories-category','Inventory\AccessoriesCategoryController@category_setting');
    Route::post('products/accessories-category','Inventory\AccessoriesCategoryController@store');
    Route::delete('products/accessories-category/{id}','Inventory\AccessoriesCategoryController@destroy')->name('deleteCategory');

    Route::get('products/trims-category','Inventory\TrimsCategoryController@category_setting');
    Route::post('products/trims-category','Inventory\TrimsCategoryController@store');
    Route::delete('products/trims-category/{id}','Inventory\TrimsCategoryController@destroy')->name('deleteTrims');


    /**
     * Copied from GitLab
     * 2019.08.07
     */

    /** Accessories Category Routes */
    Route::get('accessories/manage-category','AccessoriesCategoryController@manage_category');
    Route::get('accessories/add-category','AccessoriesCategoryController@add_category');
    Route::post('accessories-category-store','AccessoriesCategoryController@store');
    Route::get('accessories/category/edit/{id}', 'AccessoriesCategoryController@edit');
    Route::patch('accessories/category/{id}/update', 'AccessoriesCategoryController@update');
    Route::delete('accessories/category/delete/{id}', 'AccessoriesCategoryController@destroy');

    /** Product Cost Sheet Routes  By Nishat Chowdhury*/
    Route::get('merchandise/product-cost-sheet/create','Merchandise\ProductCostSheetController@create');
    Route::post('merchandise/product-cost-sheet-store','Merchandise\ProductCostSheetController@store');
    Route::get('merchandise/product-cost-sheet-edit/{id}','Merchandise\ProductCostSheetController@edit');
    Route::patch('merchandise/product-cost-sheet-update/{id}','Merchandise\ProductCostSheetController@update');
    Route::delete('merchandise/product-cost-sheet-delete/{id}','Merchandise\ProductCostSheetController@destroy');
    Route::get('merchandise/product-cost-sheet-view/{id}','Merchandise\ProductCostSheetController@view');

    /* fabric content store procedure start */
    Route::post('merchandise/fabric-content-store','Merchandise\ProductCostSheetController@storeFabricContent')->name('fabric-content.store');
    /* fabric content store procedure End */

    /* appointed trims store procedure start */
    Route::post('merchandise/appointed-trims-store','Merchandise\ProductCostSheetController@storeAppointedTrims')->name('appointed-trims.store');
    /* appointed trims store procedure End */

    /* appointed other trims store procedure start */
    Route::post('merchandise/other-trims-store','Merchandise\ProductCostSheetController@storeOtherTrims')->name('other-trims.store');
    /* appointed other trims store procedure End */

    /* fabric content view start */
    Route::get('merchandise/fabric-content-data','Merchandise\ProductCostSheetController@getFabricContent')->name('fabric-content.view');
    Route::post('merchandise/fabric-content-destroy','Merchandise\ProductCostSheetController@destroyFabricContent')->name('fabricContent.destroy');
    /* fabric content view End */

    /* appointed trims view start */
    Route::get('merchandise/appointed-trims-data','Merchandise\ProductCostSheetController@getAppointedTrims')->name('appointed-trims.view');
    Route::post('merchandise/appointed-trims-destroy','Merchandise\ProductCostSheetController@destroyAppointedTrims')->name('appointedTrims.destroy');
    /* appointed trims view End */

    /* other trims view start */
    Route::get('merchandise/other-trims-data','Merchandise\ProductCostSheetController@getOtherTrims')->name('other-trims.view');
    Route::post('merchandise/other-trims-destroy','Merchandise\ProductCostSheetController@destroyOtherTrims')->name('otherTrims.destroy');
    /* other trims view End */

    /** Merchandise Report Routes  By Nishat Chowdhury*/
    Route::get('report/view-cost-breakdown-sheet','Merchandise\ProductCostSheetController@index');
    Route::get('report/view-cost-breakdown-sheet-details','Merchandise\ProductCostSheetController@view')->name('view.cost-breakdown-sheet');

    /** Merchandise Budget sheet By Nishat Chowdhury */
    Route::get('report/view-budget-sheet-details/{id}','Merchandise\BudgetSheetController@index')->name('view.budget-sheet');
    Route::get('report/view-all-budget-sheets','Merchandise\BudgetSheetController@all_budget_sheets')->name('view.all-budget-sheet');
    Route::get('merchandise/budget-sheet-edit/{id}','Merchandise\BudgetSheetController@edit');
    Route::get('merchandise/budget-sheet/create','Merchandise\BudgetSheetController@all_cost_sheets')->name('budget-sheet.create');
    Route::post('merchandise/budget-sheet/create/{id}','Merchandise\BudgetSheetController@create');
    Route::post('merchandise/budget-sheet/store','Merchandise\BudgetSheetController@store');
    Route::delete('merchandise/budget-sheet-delete/{id}','Merchandise\BudgetSheetController@destroy');


//    Merchandise Booking section starts here
//    Merchandise fabric booking routes by Nishat Chowdhury
    Route::get('booking/add-fabric','Merchandise\FabricBookingController@index')->name('add.fabric');
    Route::post('booking/store-fabric','Merchandise\FabricBookingController@store');
    Route::get("report/fabric-edit/{id}","Merchandise\FabricBookingController@edit")->name('fabric.edit');
    Route::post("report/fabric-update/{id}","Merchandise\FabricBookingController@update")->name('fabric.update');
    Route::delete('merchandise/fabric-delete/{id}','Merchandise\FabricBookingController@destroy');

//    Merchandise poly booking routes by Nishat Chowdhury
    Route::get('booking/add-poly','Merchandise\PolyBookingController@index');
    Route::post('booking/store-poly','Merchandise\PolyBookingController@store');
    Route::get("report/poly-edit/{id}","Merchandise\PolyBookingController@edit")->name('poly.edit');
    Route::post("report/poly-update/{id}","Merchandise\PolyBookingController@update")->name('poly.update');
    Route::delete('merchandise/poly-delete/{id}','Merchandise\PolyBookingController@destroy');

//    Merchandise zipper booking routes by Nishat Chowdhury
    Route::get('booking/add-zipper','Merchandise\ZipperBookingController@index');
    Route::post('booking/store-zipper','Merchandise\ZipperBookingController@store');
    Route::get("report/zipper-edit/{id}","Merchandise\ZipperBookingController@edit")->name('zipper.edit');
    Route::post("report/zipper-update/{id}","Merchandise\ZipperBookingController@update")->name('zipper.update');
    Route::delete('merchandise/zipper-delete/{id}','Merchandise\ZipperBookingController@destroy');

    //    Merchandise button booking routes by Sakib
    Route::get('booking/add-button','Merchandise\ButtonBookingController@index');
    Route::post('booking/store-button','Merchandise\ButtonBookingController@store');
    Route::get("report/button-edit/{id}","Merchandise\ButtonBookingController@edit")->name('button.edit');
    Route::post("report/button-update/{id}","Merchandise\ButtonBookingController@update")->name('button.update');
    Route::delete('merchandise/button-delete/{id}','Merchandise\ButtonBookingController@destroy');

    //    Merchandise other booking routes by Sakib
    Route::get('booking/add-other','Merchandise\OtherBookingController@index');
    Route::post('booking/store-other','Merchandise\OtherBookingController@store');
    Route::get("report/other-edit/{id}","Merchandise\OtherBookingController@edit")->name('other.edit');
    Route::post("report/other-update/{id}","Merchandise\OtherBookingController@update")->name('other.update');
    Route::delete('merchandise/other-delete/{id}','Merchandise\OtherBookingController@destroy');


    //    Merchandise thread booking routes by Nishat Chowdhury
    Route::get('booking/add-thread','Merchandise\ThreadBookingController@index');
    Route::post('booking/store-thread','Merchandise\ThreadBookingController@store');
    Route::get("report/thread-edit/{id}","Merchandise\ThreadBookingController@edit")->name('thread.edit');
    Route::post("report/thread-update/{id}","Merchandise\ThreadBookingController@update")->name('thread.update');
    Route::delete('merchandise/thread-delete/{id}','Merchandise\ThreadBookingController@destroy');

    //    Merchandise hangtag booking routes by Nishat Chowdhury
    Route::get('booking/add-hangtag','Merchandise\HangtagBookingController@index');
    Route::post('booking/store-hangtag','Merchandise\HangtagBookingController@store');
    Route::get("report/hangtag-edit/{id}","Merchandise\HangtagBookingController@edit")->name('hangtag.edit');
    Route::post("report/hangtag-update/{id}","Merchandise\HangtagBookingController@update")->name('hangtag.update');
    Route::delete('merchandise/hangtag-delete/{id}','Merchandise\HangtagBookingController@destroy');


    //    Merchandise label booking routes by Nishat Chowdhury
    Route::get('booking/add-label','Merchandise\LabelBookingController@index');
    Route::post('booking/store-label','Merchandise\LabelBookingController@store');
    Route::get("report/label-edit/{id}","Merchandise\LabelBookingController@edit")->name('label.edit');
    Route::post("report/label-update/{id}","Merchandise\LabelBookingController@update")->name('label.update');
    Route::delete('merchandise/label-delete/{id}','Merchandise\LabelBookingController@destroy');

    //    Merchandise label booking routes by Nishat Chowdhury
    Route::get('booking/add-hanger','Merchandise\HangerBookingController@index');
    Route::post('booking/store-hanger','Merchandise\HangerBookingController@store');
    Route::get("report/hanger-edit/{id}","Merchandise\HangerBookingController@edit")->name('hanger.edit');
    Route::post("report/hanger-update/{id}","Merchandise\HangerBookingController@update")->name('hanger.update');
    Route::delete('merchandise/hanger-delete/{id}','Merchandise\HangerBookingController@destroy');

    //    Merchandise carton booking routes by Nishat Chowdhury
    Route::get('booking/add-carton','Merchandise\CartonBookingController@index');
    Route::post('booking/store-carton','Merchandise\CartonBookingController@store');
    Route::get("report/carton-edit/{id}","Merchandise\CartonBookingController@edit")->name('carton.edit');
    Route::post("report/carton-update/{id}","Merchandise\CartonBookingController@update")->name('carton.update');
    Route::delete('merchandise/carton-delete/{id}','Merchandise\CartonBookingController@destroy');

//    Merchandise Booking Report routes By Nishat Chowdhury

    //    fabric booking report By Nishat Chowdhury
    Route::get('report/view-fabrics-booking','Merchandise\FabricBookingController@view');
    Route::get('report/view-fabrics-booking-details/{id}','Merchandise\FabricBookingController@details');

    //     poly booking report By Nishat Chowdhury
    Route::get('report/view-poly-booking','Merchandise\PolyBookingController@view');
    Route::get('report/view-poly-booking-details/{id}','Merchandise\PolyBookingController@details');

    //     zipper booking report By Nishat Chowdhury
    Route::get('report/view-zipper-booking','Merchandise\ZipperBookingController@view');
    Route::get('report/view-zipper-booking-details/{id}','Merchandise\ZipperBookingController@details');

    //     button booking report By Sakib
    Route::get('report/view-button-booking','Merchandise\ButtonBookingController@view');
    Route::get('report/view-button-booking-details/{id}','Merchandise\ButtonBookingController@details');

    //     orther booking report By Sakib
    Route::get('report/view-other-booking','Merchandise\OtherBookingController@view');
    Route::get('report/view-other-booking-details/{id}','Merchandise\OtherBookingController@details');

    //     thread booking report By Nishat Chowdhury
    Route::get('report/view-thread-booking','Merchandise\ThreadBookingController@view');
    Route::get('report/view-thread-booking-details/{id}','Merchandise\ThreadBookingController@details');

    //     hangtag booking report  By Nishat Chowdhury
    Route::get('report/view-hangtag-booking','Merchandise\HangtagBookingController@view');
    Route::get('report/view-hangtag-booking-details/{id}','Merchandise\HangtagBookingController@details');

    //     label booking report By Nishat Chowdhury
    Route::get('report/view-label-booking','Merchandise\LabelBookingController@view');
    Route::get('report/view-label-booking-details/{id}','Merchandise\LabelBookingController@details');

    //     hanger booking report By Nishat Chowdhury
    Route::get('report/view-hanger-booking','Merchandise\HangerBookingController@view');
    Route::get('report/view-hanger-booking-details/{id}','Merchandise\HangerBookingController@details');

    //     carton booking report By Nishat Chowdhury
    Route::get('report/view-carton-booking','Merchandise\CartonBookingController@view');
    Route::get('report/view-carton-booking-details/{id}','Merchandise\CartonBookingController@details');

//Merchandise Booking section ends here


    /** AJAX CODES*/
    Route::get('merchandise/product-cost-sheet/search','Merchandise\ProductCostSheetController@search')->name('search.style');
    Route::get('merchandise/budget-sheet/search','Merchandise\BudgetSheetController@search')->name('budget.search.style');


});

Route::group(['middleware'=>'auth'],function(){
    //  route for store module starts here
    /** Buyer Routes */
    Route::get('store/manage-buyer','StoreBuyerController@index');
    Route::get('store/add-buyer','StoreBuyerController@add_buyer');
    Route::post('store/buyer-store','StoreBuyerController@store');
    Route::get('store/edit/{id}', 'StoreBuyerController@edit');
    Route::patch('store/{id}/update', 'StoreBuyerController@update');
    Route::delete('store/delete/{id}', 'StoreBuyerController@destroy');

    /** Supplier Routes */
    Route::get('store/manage-supplier','store\supplier\StoreSupplierController@index');
    Route::get('store/add-supplier','store\supplier\StoreSupplierController@add_supplier');
    Route::post('store/supplier-store','store\supplier\StoreSupplierController@store');
    Route::get('store/supplier-edit/{id}', 'store\supplier\StoreSupplierController@edit');
    Route::patch('store/{id}/supplier-update', 'store\supplier\StoreSupplierController@update');
    Route::delete('store/supplier-delete/{id}', 'store\supplier\StoreSupplierController@destroy');

    /** Merchandiser Routes */
    Route::get('store/manage-merchandiser','store\merchandiser\StoreMerchandiserController@index');
    Route::get('store/add-merchandiser','store\merchandiser\StoreMerchandiserController@add_merchandiser');
    Route::post('store/merchandiser-store','store\merchandiser\StoreMerchandiserController@store');
    Route::get('store/merchandiser-edit/{id}', 'store\merchandiser\StoreMerchandiserController@edit');
    Route::patch('store/{id}/merchandiser-update', 'store\merchandiser\StoreMerchandiserController@update');
    Route::delete('store/merchandiser-delete/{id}', 'store\merchandiser\StoreMerchandiserController@destroy');

    /** Units Routes */
    Route::get('store/manage-units','store\unit\StoreUnitController@index');
    Route::get('store/add-units','store\unit\StoreUnitController@add_unit');
    Route::post('store/units-store','store\unit\StoreUnitController@store');
    Route::get('store/units-edit/{id}', 'store\unit\StoreUnitController@edit');
    Route::patch('store/{id}/units-update', 'store\unit\StoreUnitController@update');
    Route::delete('store/units-delete/{id}', 'store\unit\StoreUnitController@destroy');

    /** Order Details Routes */
    Route::get('store/manage-order','store\order\StoreOrderController@index');
    Route::get('store/add-order','store\order\StoreOrderController@add_order');
    Route::post('store/order-store','store\order\StoreOrderController@store');
    Route::get('store/order-edit/{id}', 'store\order\StoreOrderController@edit');
    Route::patch('store/{id}/order-update', 'store\order\StoreOrderController@update');
    Route::delete('store/order-delete/{id}', 'store\order\StoreOrderController@destroy');
    /** Units Routes */

//    group routes starts here
    Route::get(' store/manage-group','store\group\StoreGroupController@index');
    Route::get('store/add-group','store\group\StoreGroupController@add_group');
    Route::post('store/group-store','store\group\StoreGroupController@store');
    Route::get('store/group-edit/{id}', 'store\group\StoreGroupController@edit');
    Route::patch('store/{id}/group-update', 'store\group\StoreGroupController@update');
    Route::delete('store/group-delete/{id}', 'store\group\StoreGroupController@destroy');
//    group routes ends here

//    booking details starts here
    Route::get('store/manage-booking','store\booking\StoreBookingController@index');
    Route::get('store/add-booking','store\booking\StoreBookingController@add_booking');
    Route::post('store/booking-store','store\booking\StoreBookingController@store');
    Route::get('store/booking-edit/{id}', 'store\booking\StoreBookingController@edit');
    Route::post('store/{id}/booking-update', 'store\booking\StoreBookingController@update')->name('update.booking');
    Route::delete('store/booking-delete/{id}', 'store\booking\StoreBookingController@destroy');
    Route::get('report/view-Store-booking/{id}','store\booking\StoreBookingController@details');

    Route::get('booking-report/{id}/print','store\booking\StoreBookingController@print');
    
    Route::get('store/inhouse-report/{style_no}/{date_range}','store\booking\StoreBookingController@inhouseReport');
    Route::get('store/issue-report/{style_no}/{date_range}','store\booking\StoreBookingController@issueReport');
    Route::get('store/supplier-wise-products/{data}','store\booking\StoreBookingController@supplierWiseProducts');

//    booking details ends here

//    inventory details starts here
    Route::get('store/manage-inventory','store\inventory\StoreInventoryController@index');
    Route::get('store/get-inventory','store\inventory\StoreInventoryController@getInventory');
    Route::get('store/add-inventory','store\inventory\StoreInventoryController@add_inventory');
    Route::post('store/inventory-store','store\inventory\StoreInventoryController@store');
    Route::get('store/inventory-edit/{id}', 'store\inventory\StoreInventoryController@edit');
    Route::post('store/{id}/inventory-update', 'store\inventory\StoreInventoryController@update')->name('update.inventory');
    Route::delete('store/inventory-delete/{id}', 'store\inventory\StoreInventoryController@destroy');
    Route::get('report/view-Store-inventory/{id}','store\inventory\StoreInventoryController@details');

    Route::get('inventory-report/{id}/print','store\inventory\StoreInventoryController@print');
//    inventory details ends here

    //    Store requisition starts here
    Route::get('store/manage-requisition','store\requisition\StoreRequisitionController@index');
    Route::get('store/add-requisition','store\requisition\StoreRequisitionController@add_requisition');
    Route::post('store/requisition-store','store\requisition\StoreRequisitionController@store');
    Route::get('store/requisition-edit/{id}', 'store\requisition\StoreRequisitionController@edit');
    Route::post('store/{id}/requisition-update', 'store\requisition\StoreRequisitionController@update')->name('update.requisition');
    Route::delete('store/requisition-delete/{id}', 'store\requisition\StoreRequisitionController@destroy');
    Route::get('report/view-Store-requisition/{id}','store\requisition\StoreRequisitionController@details');

    Route::get('requisition-report/{id}/print','store\requisition\StoreRequisitionController@print');
//    Store requisition ends here

//    report for store department starts here
    Route::get('report/invoice_wise','store\inventory\StoreInventoryController@getChalanList')->name('report.chalan');

    //reports
    Route::resource('store/report/mrr','store\mrr\MRRController');
    Route::get('mrr-print','store\mrr\MRRController@print');

//    report for store department ends here

//    route for store module ends here
});

    //ajax routes starts here
    Route::get('get-order-list','store\booking\StoreBookingController@getOrderList');
    Route::get('get-order-list-inventory','store\inventory\StoreInventoryController@getOrderListInventory');
    Route::get('get-requisition','store\requisition\StoreRequisitionController@getRequisition');
    //ajax routes ends here

/** time and planning Routes changing By Asiful Islam Sakib*/ 
Route::group(['middleware'=>'auth'],function(){
    /** time and planning Routes  By Nishat Chowdhury*/
    Route::get('actionPlan/acc_tna','Merchandise\ActionPlanController@acc_tna');
    Route::get('actionPlan/pre_production_act','Merchandise\ActionPlanController@pre_production_act');




    Route::get('actionPlan/create','Merchandise\ActionPlanController@create');
    Route::post('actionPlan/store','Merchandise\ActionPlanController@store');
    Route::get('actionPlan/order_summary/edit/{data}','Merchandise\ActionPlanController@edit');

    Route::get('actionPlan/edit/{id}','Merchandise\ActionPlanController@edit');
    Route::patch('actionPlan/update/{id}','Merchandise\ActionPlanController@update');
    Route::delete('actionPlan/delete/{id}','Merchandise\ActionPlanController@destroy');
    Route::get('actionPlan/view/{id}','Merchandise\ActionPlanController@view');


    //    route for sample tna
    Route::get('actionPlan/sample_tna','Merchandise\ActionPlanController@sample_tna')->name('sample_tna');
    Route::get('actionPlan/sample_tna/edit/{data}','Merchandise\ActionPlanController@sample_tna_edit');
    Route::post('actionPlan/sample_tna/store','Merchandise\ActionPlanController@sample_tna_store');

//    route for fabrics tna
    Route::get('actionPlan/fabrics_tna','Merchandise\ActionPlanController@fabrics_tna');
    Route::get('actionPlan/fabrics_tna/edit/{data}','Merchandise\ActionPlanController@fabrics_tna_edit');
    Route::post('actionPlan/fabrics_tna/store','Merchandise\ActionPlanController@fabrics_tna_store');

    //    route for all acc tna
    Route::get('actionPlan/acc_tna','Merchandise\ActionPlanController@acc_tna');
    Route::get('actionPlan/all_acc_tna/edit/{data}','Merchandise\ActionPlanController@all_acc_tna_edit');
    Route::post('actionPlan/all_acc_tna/store','Merchandise\ActionPlanController@all_acc_tna_store');
    //    route for pre production act
    Route::get('actionPlan/pre_production_act','Merchandise\ActionPlanController@pre_production_act');
    Route::get('actionPlan/pre_production/edit/{data}','Merchandise\ActionPlanController@pre_production_edit');
    Route::post('actionPlan/pre_production/store','Merchandise\ActionPlanController@pre_production_store');


    Route::get('actionPlan/at-a-glance','Merchandise\ActionPlanController@index');
    Route::get('actionPlan/at-a-glance/{id}','Merchandise\ActionPlanController@atAGlance');


    // Reports by Asiful Islam Sakib
    // routes for order summary
    Route::get('actionPlan/reports/order-summary','Merchandise\ActionPlanController@order_summary_show');
    Route::post('actionPlan/reports/order-summary','Merchandise\ActionPlanController@order_summary_show_update');
    Route::get('actionPlan/reports/order-summary/edit/{id}','Merchandise\ActionPlanController@order_summary_show_edit');
    Route::get('actionPlan/reports/order-summary/delete/{id}','Merchandise\ActionPlanController@order_summary_show_delete');

    // routes for order summary details
    Route::get('actionPlan/reports/order-summary-details','Merchandise\ActionPlanController@order_summary_details_show');
    Route::post('actionPlan/reports/order-summary-details','Merchandise\ActionPlanController@order_summary_details_show_update');
    Route::get('actionPlan/reports/order-summary-details/edit/{id}','Merchandise\ActionPlanController@order_summary_details_show_edit');
    Route::get('actionPlan/reports/order-summary-details/add','Merchandise\ActionPlanController@order_summary_details_show_add');
    Route::post('actionPlan/reports/order-summary-details/add','Merchandise\ActionPlanController@order_summary_details_show_addStore');
    Route::get('actionPlan/reports/order-summary-details/delete/{id}','Merchandise\ActionPlanController@order_summary_details_show_delete');

    // routes for sample tna
    Route::get('actionPlan/reports/sample-tna','Merchandise\ActionPlanController@sample_tna_show');
    Route::post('actionPlan/reports/sample-tna','Merchandise\ActionPlanController@sample_tna_show_update');
    Route::get('actionPlan/reports/sample-tna/edit/{id}','Merchandise\ActionPlanController@sample_tna_show_edit');
    Route::get('actionPlan/reports/sample-tna/delete/{id}','Merchandise\ActionPlanController@sample_tna_show_delete');

    // routes for order fabrics tna
    Route::get('actionPlan/reports/fabrics-tna','Merchandise\ActionPlanController@fabrics_tna_show');
    Route::post('actionPlan/reports/fabrics-tna','Merchandise\ActionPlanController@fabrics_tna_show_update');
    Route::get('actionPlan/reports/fabrics-tna/edit/{id}','Merchandise\ActionPlanController@fabrics_tna_show_edit');
    Route::get('actionPlan/reports/fabrics-tna/delete/{id}','Merchandise\ActionPlanController@fabrics_tna_show_delete');

    // routes for order all acc tna
    Route::get('actionPlan/reports/all-acc-tna','Merchandise\ActionPlanController@all_acc_tna_show');
    Route::post('actionPlan/reports/all-acc-tna','Merchandise\ActionPlanController@all_acc_tna_show_update');
    Route::get('actionPlan/reports/all-acc-tna/edit/{id}','Merchandise\ActionPlanController@all_acc_tna_show_edit');
    Route::get('actionPlan/reports/all-acc-tna/delete/{id}','Merchandise\ActionPlanController@all_acc_tna_show_delete');

    // routes for order pre-production_tna
    Route::get('actionPlan/reports/pre-production-tna','Merchandise\ActionPlanController@pre_production_tna_show');
    Route::post('actionPlan/reports/pre-production-tna','Merchandise\ActionPlanController@pre_production_tna_show_update');
    Route::get('actionPlan/reports/pre-production-tna/edit/{id}','Merchandise\ActionPlanController@pre_production_tna_show_edit');
    Route::get('actionPlan/reports/pre-production-tna/delete/{id}','Merchandise\ActionPlanController@pre_production_tna_show_delete');

    // Reports End

    //Booking Plan
    Route::get('bookingPlan/report','Planning\BookingPlanController@index');
    Route::get('bookingPlan/view-report/{id}','Planning\BookingPlanController@viewReport');

    Route::get('bookingPlan/create','Planning\BookingPlanController@create');
    Route::get('bookingPlan/select/{id}','Planning\BookingPlanController@selectBooking');
    Route::post('bookingPlan/store','Planning\BookingPlanController@store');
    Route::get('bookingPlan/edit/{data}','Planning\BookingPlanController@edit');
    Route::get('bookingPlan/edit-store/{id}','Planning\BookingPlanController@editStore');
    Route::post('bookingPlan/update','Planning\BookingPlanController@update');
    Route::get('bookingPlan/delete/{id}','Planning\BookingPlanController@delete');


    //Line Loading Plan
    Route::get('line-loading-plan/report','Planning\LineLoadingPlanController@index');
    Route::delete('line-loading-plan/delete/{id}','Planning\LineLoadingPlanController@delete');
    Route::get('line-loading-plan/view-report/{id}','Planning\LineLoadingPlanController@viewReport');

    Route::get('line-loading-plan/create','Planning\LineLoadingPlanController@create');
    Route::get('line-loading-plan/view/{id}','Planning\LineLoadingPlanController@edit');
    Route::post('line-loading-plan/update/{id}','Planning\LineLoadingPlanController@update')->name('line_loading.update');
    Route::get('line-loading-plan/calculate/{data}','Planning\LineLoadingPlanController@calculate');

    Route::get('line-loading-plan/select/{id}','Planning\LineLoadingPlanController@selectBooking');
    Route::post('line-loading-plan/store','Planning\LineLoadingPlanController@store');
    Route::get('line-loading-plan/edit/{data}','Planning\LineLoadingPlanController@edit');
    Route::get('line-loading-plan/edit-store/{id}','Planning\LineLoadingPlanController@editStore');
    Route::get('line-loading-plan/delete/{id}','Planning\LineLoadingPlanController@delete');
    Route::get('line-loading-plan/edit-efficiency','Planning\LineLoadingPlanController@editEfficiency');
    Route::post('line-loading-plan/edit-efficiency','Planning\LineLoadingPlanController@editEfficiencyStore');


    Route::resource('line-loading-plan/efficiency','Planning\EfficiencyController');
    Route::resource('line-loading-plan/holidays','Planning\HolidayController');

    //Items
    Route::resource('line-loading-plan/items','Planning\ItemController');
    //Line Loading Plan

    /**Production Start/

    /* Forecast */
    Route::get('production/forecast-report','Production\ForecastController@index');
    Route::get('production/forecast-report/{id}','Production\ForecastController@individualForecast');
    Route::get('production/create-forecast','Production\ForecastController@create');
    Route::delete('production/forecast-delete/{id}','Production\ForecastController@delete');
    Route::get('production/get-forecast/{data}','Production\ForecastController@getForecast');
    Route::post('production/store-forecast','Production\ForecastController@store');
    Route::get('production/get-forecast-style/{style_id}','Production\ForecastController@getCM');

    /* Order Progress */
    Route::get('production/order-progress-report','Production\OrderProgressController@index');
    Route::get('production/order-progress-report/{id}','Production\OrderProgressController@individualOrderProgress');
    Route::get('production/create-order-progress','Production\OrderProgressController@create');
    Route::delete('production/order-progress-delete/{id}','Production\OrderProgressController@delete');
    Route::get('production/get-order-progress/{data}','Production\OrderProgressController@getForecast');
    Route::post('production/store-order-progress','Production\OrderProgressController@store');
    



    /* Daily Section Wise */
    Route::get('production/daily-section-wise-report','Production\ForecastController@dailySectionWiseReport');
    Route::post('production/daily-section-wise-report','Production\ForecastController@searchDailySectionWiseReport');


    
    Route::get('daily-analysis-report/style-review/create','Planning\DailyAnalysisReportController@create');
});










Route::get('migrate',function(){
        Artisan::call('migrate');
        return redirect()->back();
    });

    Route::get('optimize',function(){
        Artisan::call('config:cache');
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
    });
