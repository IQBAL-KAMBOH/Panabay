import { test, expect } from '../../setup';
import { sellerLogin, sellerRegister, sellerApprove, sellerManageProfile, sellerCreateUser, sellerCreateRole } from '../../pages/seller';

test("seller create a user", async ({ adminPage }) => {

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

    await expect(adminPage.locator('div.fixed.top-5')).toHaveText('Role is created successfully');

    /**
     * Reaching to the user listing page.
     */
    await adminPage.goto("seller/settings/users");
    await adminPage.click('//button[contains(.," Create User ")]');
    

    await sellerCreateUser(adminPage);
    await expect(
        adminPage.locator('div.fixed.top-5')).
    toHaveText('User created successfully');
});