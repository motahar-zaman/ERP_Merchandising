<?php
/**
 * Created by PhpStorm.
 * User: smartrahat
 * Date: 10/12/2017
 * Time: 6:31 PM
 */

namespace App\Repositories;

use App\Accessories;
use App\AccessoriesCategory;
use App\CompanyAddress;
use App\Fabric;
use App\FabricCategory;
use App\Hrm\Country;
use App\ProductUnit;
use App\OtherTrim;
use App\OtherTrimCategory;
use App\Supplier;
use App\Trim;
use App\TrimsCategory;
use App\ZipperColor;
use App\CompanyUnit;
use App\PriceQuotation;

class MerchandiseRepository
{

    //get all units to show after foreach...
    public function unitList(){
        return Unit::query()->latest()->paginate(10);
    }

    //get all units to show after without foreach ...
    public function units(){
        return ProductUnit::all()->pluck('name','id');
    }
    //=====================================================================
    //==================Faisal Repositories For Merchandising==============
    //==========================Starts=====================================
    // Fabric Repositories
    public function fabricList(){
        return Fabric::query()->latest()->paginate(10);
    }

    public function fabricCategories(){
        return FabricCategory::all()->pluck('name','id');
    }

    public function fabricCategoryList(){
        return FabricCategory::query()->latest()->paginate(10);
    }
    // Company Address
    public function companyAddressList(){
        return CompanyAddress::query()->latest()->paginate(10);
    }

    // Zipper Color
    public function zipperColorList(){
        return \App\Merchandise\ZipperColor::query()->latest()->paginate(10);
    }

    // Company Unit
    public function CompanyUnit(){
        return \App\Merchandise\CompanyUnit::query()->latest()->paginate(10);
    }

    // Styles
    public function styles(){
        return \App\CostBreakdown::where('style', '!=', null)->pluck('style','id');
    }

    //All Company Unit
    public function AllCompanyUnit(){
        return \App\Merchandise\CompanyUnit::all()->pluck('name','id');
    }

    // PriceQuote
    public function PriceQuote(){
        return \App\Merchandise\PriceQuotation::query()->latest()->paginate(10);
    }
    // AllPriceQuote
    public function AllPriceQuote(){
        return \App\Merchandise\PriceQuotation::all()->pluck('name','id');
    }

    // Accessories Repositories
    public function accessoriesList(){
        return Accessories::query()->latest()->paginate(10);
    }

    public function accessoriesCategories(){
        return AccessoriesCategory::all()->pluck('name','id');
    }

    public function accessoriesCategoryList(){
        return AccessoriesCategory::query()->latest()->paginate(10);
    }

    // Trims Repositories
    public function trimList(){
        return Trim::query()->latest()->paginate(10);
    }

    public function trimsCategories(){
        return TrimsCategory::all()->pluck('name','id');
    }

    public function trimsCategoryList(){
        return TrimsCategory::query()->latest()->paginate(10);
    }

    // Product Unit Repositories
    public function productUnits(){
        return ProductUnit::query()->pluck('name','id');
    }

    public function productUnitList(){
        return ProductUnit::query()->latest()->paginate(10);
    }


    public function check_box(){
        return [
            '1'=>'Yes',
            '2'=> 'No',
        ];
    }

    // Other Trim Repository
    public function otherTrimList()
    {
        return OtherTrim::query()->latest()->paginate(10);
    }

    public function otherTrimCategoryList()
    {
        return OtherTrimCategory::query()->latest()->paginate(10);
    }

    public function countries()
    {
        return Country::query()->pluck('name','id');
    }

    public function suppliers()
    {
        return Supplier::orderBy('name','asc')->pluck('name','id');
    }

    public function fabrics()
    {
        return Fabric::query()->pluck('name','id');
    }

    public function trims()
    {
        return Trim::query()->pluck('name','id');
    }

    public function otherTrims()
    {
        return OtherTrim::query()->pluck('name','id');
    }

    public function otherTrimsCategory()
    {
        return OtherTrimCategory::query()->pluck('name','id');
    }

    //==========================End=====================================

}