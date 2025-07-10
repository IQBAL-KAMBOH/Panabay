import { test, expect } from '../../setup';
import { sellerLogin, sellerRegister, sellerSimpleProduct, sellerApprove, sellerManageProfile } from '../../pages/seller';
import { loginAsCustomer } from '../../utils/customer';
import * as fs from 'fs';

test('customer contact to seller', async ({ adminPage }) => {

    const randomID = Date.now();
    const contact_details = {
        name: 'customer'+ randomID,
        email: 'customer' +randomID+ '@example.com',
        subject: 'Test Subject',
        query : 'Test Query',
    }
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
    
    await adminPage.goto('customer/register');
    
    await loginAsCustomer(adminPage);

    await adminPage.waitForURL('')

    const seller_profile_credentials = JSON.parse(fs.readFileSync('seller-credentials.json', 'utf-8'));
    

    await adminPage.goto(`marketplace/${seller_profile_credentials.url}`);

    await expect(adminPage.locator('//input[@placeholder="Search for Products"]')).toBeVisible();

    await adminPage.click('//span[contains(.," Contact ")]');

    await adminPage.waitForSelector('(//button[contains(.,"Submit")])[1]');

    await adminPage.fill('input[placeholder="Name"]', contact_details.name);
    await adminPage.fill('input[placeholder="Email"]', contact_details.email);
    await adminPage.fill('input[placeholder="Subject"]', contact_details.subject);
    await adminPage.fill('textarea[placeholder="Query"]', contact_details.query);

    await adminPage.click('(//button[contains(.,"Submit")])[1]');

    await expect(adminPage.getByText('Your query has been submitted successfully').first()
    ).toBeVisible();
});