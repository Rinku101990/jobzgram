<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MembershipPackage;

class MembershipPackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MembershipPackage::truncate();

        $package = [   
        	['title'=>'6 Months','price'=>'599','duration'=>'180','features'=>'','status'=>'active'],
        	['title'=>'12 Months','price'=>'999','duration'=>'365','features'=>'','status'=>'active'],
      
        ];
        MembershipPackage::insert($package);
    }
}
