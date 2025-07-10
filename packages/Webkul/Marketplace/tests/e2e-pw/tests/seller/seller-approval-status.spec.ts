import { test, expect } from "../../setup";
import { sellerApprove, sellerLogin,sellerRegister, sellerManageProfile, sellerSimpleProduct} from '../../pages/seller';
import { sellerApprovalStatus } from "../../pages/mp-product-setting";

test('seller approval status', async ({ adminPage }) => {

    await adminPage.goto('seller/register');
    
    await sellerRegister(adminPage);

    await adminPage.goto('seller/login');

    await sellerLogin(adminPage);

    await adminPage.locator('div.fixed.top-5 ').getByText('Your activation seeks admin approval').isVisible();

    await adminPage.goto('admin/configuration/marketplace/settings');

    await sellerApprovalStatus(adminPage);
});