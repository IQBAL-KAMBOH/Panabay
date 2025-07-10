import { test, expect } from '../../setup';
import { sellerLogin, sellerRegister, sellerSimpleProduct, sellerApprove, sellerManageProfile, createSellerInventorySource } from '../../pages/seller';

test('seller inventory create', async ({ adminPage }) => {
    
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
    
    await adminPage.goto('seller/settings/inventory-sources');

    await createSellerInventorySource(adminPage);

    /**
     * Checked the Expected pop-up message "Inventory Source Created Successfully"
     */
    await expect(adminPage.locator('div.fixed.top-5')).toHaveText('Inventory Source Created Successfully');

});