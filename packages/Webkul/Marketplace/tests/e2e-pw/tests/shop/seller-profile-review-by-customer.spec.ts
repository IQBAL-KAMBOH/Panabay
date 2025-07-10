import { test, expect } from '../../setup';
import { sellerLogin, sellerRegister, sellerSimpleProduct, sellerApprove, sellerManageProfile } from '../../pages/seller';
import {sellerFlagStatus} from '../../pages/mp-product-setting';
import { loginAsCustomer } from '../../utils/customer';
import * as fs from 'fs';

test('customer review to seller profile', async ({ adminPage }) => {
   
    /**
     * Navigate to Shop Front page
     */
    await adminPage.goto("seller/register");

    await sellerRegister(adminPage);
    
    await adminPage.locator('div.fixed.top-5 ').getByText('Your activation seeks admin approval').isVisible();

    await adminPage.goto('admin/marketplace/sellers');

    await sellerApprove(adminPage);
    
    await expect(adminPage.getByText('Seller updated successfully!')).toBeVisible();

    await adminPage.goto('seller/login');

    await sellerLogin(adminPage);

    await expect(adminPage).toHaveURL('seller/dashboard');

    /**
     * Navigate to Manage Profile
     */
    await adminPage.click('//span[contains(.," Manage Profile ")]');
    // await adminPage.waitForTimeout(2000); /* Wait for login to process */

    await adminPage.click('//a[contains(.," Edit Profile ")]');
    await adminPage.waitForURL('seller/profile/edit');

    await sellerManageProfile(adminPage);
    /**
     * Check the Profile is updated successfully.
     */

    await expect(adminPage.locator('div.fixed.top-5')).toHaveText('Your Profile is updated successfully');    


    await adminPage.goto('seller/products');
 
    /**
     * Click to the Add New Product button
     */
    await adminPage.click('//a[contains(.,"Add New Product")]');

    await adminPage.waitForURL('seller/products/create');

    await sellerSimpleProduct(adminPage);

    await expect(adminPage.locator('div.fixed.top-5')).toHaveText('Product updated successfully');
    
    await adminPage.goto('admin/marketplace/products');
    await adminPage.locator('label.icon-uncheckbox').nth(0).click();
    await adminPage.click('//span[contains(.," Select Action ")]');
    const update_product_status = adminPage.locator('//span[contains(.,"Update Status")]');
    await update_product_status.hover();
    await adminPage.click('//a[contains(.,"Approved")]');
    await adminPage.click('//button[contains(.,"Agree")]');
    await expect(adminPage.locator('div.fixed.top-5')).toHaveText('Product Updated successfully. Close ');


    await adminPage.goto('customer/register');
        
    /**
     * Register as a customer
     */

    await loginAsCustomer(adminPage);
    // await adminPage.waitForURL('customer/login');

    // await adminPage.waitForURL('');

    const credentials = JSON.parse(fs.readFileSync('seller-simple-product-credentials.json', 'utf-8'));
    
    await adminPage.goto('');

    await adminPage.fill('//input[@aria-label="Search products here"]', credentials.product_name);

    await adminPage.locator('//input[@aria-label="Search products here"]').press('Enter');

    /**
     * Click the First product of the Search Result
     */
    await adminPage.locator('//div[@class="mt-8 grid grid-cols-3 gap-8 max-1060:grid-cols-2 max-md:mt-5 max-md:justify-items-center max-md:gap-x-4 max-md:gap-y-5"][1]/div[1]').click();
    await adminPage.waitForTimeout(2000);

    await adminPage.locator('a.text-lg').click();


    await adminPage.click('(//div[@class="flex gap-5"])[2]/button[2]');

    /**
     * Click the Write Review Button
     */
    await adminPage.click('(//span[contains(.," Write a Review")])[2]');

    /**
     * select the rating according using the Index
     */
    await adminPage.click('(//span[@class="icon-star-fill cursor-pointer text-2xl"])[2]');

    /**
     * Fill the Review Form
     */
    await adminPage.fill('//input[@placeholder="Title"]', 'Nice Product Review title');
    await adminPage.fill('//textarea[@placeholder="Comment"]', 'Reviwe Comment');

    /**
     * Click the Submit Button
     */
    await adminPage.click('(//button[contains(.,"Submit")])[3]');

    await expect(adminPage.locator('div.fixed.top-5')).toHaveText('Seller Reviewed successfully');

});