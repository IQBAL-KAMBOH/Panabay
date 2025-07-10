import { test, expect } from '../../setup';
import { sellerLogin, sellerRegister, sellerApprove, sellerManageProfile, sellerCreateRole } from '../../pages/seller';

test ('seller create role', async ({adminPage}) => {

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

    await adminPage.goto('seller/settings/roles');
    await adminPage.click('//a[contains(.," Create Role ")]');

    await adminPage.waitForURL('seller/settings/roles/create');

    await sellerCreateRole(adminPage);
    /**
     * Checked the Expected pop-up message "Role created successfully"
     */
    await expect(adminPage.locator('div.fixed.top-5')).toHaveText('Role is created successfully');
});