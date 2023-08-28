<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $getAllBlogDataPermission = Permission::create(["name" => "Get All Blog Data"]);
        $createBlogPermission = Permission::create(["name" => "Create Blog"]);
        $deleteBlogPermission = Permission::create(["name" => "Delete Blog"]);
        $editBlogPermission = Permission::create(["name" => "Edit Blog"]);

        $getAllProductDataPermission = Permission::create(["name" => "Get All Product Data"]);
        $createProductPermission = Permission::create(["name" => "Create Product"]);
        $deleteProductPermission = Permission::create(["name" => "Delete Product"]);
        $editProductPermission = Permission::create(["name" => "Edit Product"]);

        $getAllProductCategoryDataPermission = Permission::create(["name" => "Get All Product Category Data"]);
        $createProductCategoryPermission = Permission::create(["name" => "Create Category"]);
        $deleteProductCategoryPermission = Permission::create(["name" => "Delete Category"]);
        $editProductCategoryPermission = Permission::create(["name" => "Edit Category"]);

        $getAllProductColorDataPermission = Permission::create(["name" => "Get All Product Color Data"]);
        $createProductColorPermission = Permission::create(["name" => "Create Product Color"]);
        $deleteProductColorPermission = Permission::create(["name" => "Delete Product Color"]);
        $editProductColorPermission = Permission::create(["name" => "Edit Product Color"]);

        $getAllProductVariationDataPermission = Permission::create(["name" => "Get All Product Variation Data"]);
        $createProductVariationPermission = Permission::create(["name" => "Create Product Variation"]);
        $deleteProductVariationPermission = Permission::create(["name" => "Delete Product Variation"]);

        $getAllProductCouponDataPermission = Permission::create(["name" => "Get All Product Coupon Data"]);
        $createProductCouponPermission = Permission::create(["name" => "Create Product Coupon"]);
        $deleteProductCouponPermission = Permission::create(["name" => "Delete Product Coupon"]);
        $editProductCouponPermission = Permission::create(["name" => "Edit Product Coupon"]);

        $getAllUserDataPermission = Permission::create(["name" => "Get All User Data"]);
        $createUserPermission = Permission::create(["name" => "Create User"]);
        $deleteUserPermission = Permission::create(["name" => "Delete User"]);
        $editUserPermission = Permission::create(["name" => "Edit User"]);

        $editSettingPermission = Permission::create(["name" => "Edit Setting"]);

        $roleAdmin = Role::create(["name" => "Admin"]);
        $roleAdmin->syncPermissions([$getAllBlogDataPermission, $createBlogPermission, $deleteBlogPermission, $editBlogPermission, $getAllProductDataPermission, $createProductPermission, $deleteProductPermission, $editProductPermission, $getAllProductCategoryDataPermission, $createProductCategoryPermission, $deleteProductCategoryPermission, $editProductCategoryPermission, $getAllProductColorDataPermission, $createProductColorPermission, $deleteProductColorPermission, $editProductColorPermission, $getAllProductCouponDataPermission, $createProductCouponPermission, $deleteProductCouponPermission, $editProductCouponPermission, $getAllProductVariationDataPermission, $createProductVariationPermission, $deleteProductVariationPermission, $getAllUserDataPermission, $createUserPermission, $deleteUserPermission, $editUserPermission, $editSettingPermission]);

        $roleUser = Role::create(["name" => "User"]);
        $roleUser->syncPermissions([$getAllBlogDataPermission, $getAllProductDataPermission, $getAllProductColorDataPermission, $getAllProductCategoryDataPermission, $getAllProductVariationDataPermission, $createUserPermission, $editUserPermission]);
    }
}
