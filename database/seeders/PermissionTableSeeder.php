<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionTableSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{
$permissions = [
    'اضافة قسم',
    'تعديل قسم',
    'حذف قسم',
    'الاشعارات',


];
foreach ($permissions as $permission) {
Permission::create(['guard_name' => 'admin','name' => $permission]);
}
}
}
