import { test, expect } from '../../setup';
import { sellerApprove, sellerLogin,sellerRegister } from '../../pages/seller';

test('seller login', async ({ adminPage }) => {

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
});