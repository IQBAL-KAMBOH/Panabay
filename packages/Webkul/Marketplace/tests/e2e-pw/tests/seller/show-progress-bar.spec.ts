import { test, expect } from '../../setup';
import { sellerApprove, sellerLogin,sellerRegister, sellerManageProfile} from '../../pages/seller';
import { showProgressBar } from '../../pages/mp-product-setting';


test('seller show progress bar status', async ({ adminPage }) => {

    await adminPage.goto('seller/register');

    await sellerRegister(adminPage);

    await adminPage.goto('seller/login');

    await sellerLogin(adminPage);

    await adminPage.locator('div.fixed.top-5 ').getByText('Your activation seeks admin approval').isVisible();

    await adminPage.goto('admin/marketplace/sellers');
    
    await sellerApprove(adminPage);

    await expect(adminPage.getByText('Seller updated successfully!')).toBeVisible();

    await adminPage.goto('seller/login');

    await sellerLogin(adminPage);

    await adminPage.waitForURL('seller/dashboard');

    await expect(adminPage).toHaveURL('seller/dashboard');

    await adminPage.goto('seller/products');

    await adminPage.click('a.primary-button');

    await expect(adminPage.locator('div.fixed.top-5')).toHaveText('Please update your profile details');
    await adminPage.goto('seller/profile');

    await adminPage.click('a.primary-button');

    await adminPage.waitForURL('seller/profile/edit');

    await sellerManageProfile(adminPage);

    await expect(adminPage.locator('div.fixed.top-5')).toHaveText('Your Profile is updated successfully');    

    await adminPage.goto('admin/configuration/marketplace/settings');

    await showProgressBar(adminPage);
});