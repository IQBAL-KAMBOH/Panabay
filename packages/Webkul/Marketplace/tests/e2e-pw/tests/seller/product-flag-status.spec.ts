import { test, expect } from "../../setup";
import { sellerApprove, sellerLogin,sellerRegister, sellerManageProfile, sellerSimpleProduct} from '../../pages/seller';
import { productFlagStatus } from "../../pages/mp-product-setting";
test('Product Flag', async ({ adminPage}) => {


    /**
     * Navigate to the Configuration section
     */
    await adminPage.goto('admin/configuration');

    /**
     * Click to the Marketplace configuration
     */
    await adminPage.click('(//p[contains(.," Manage Marketplace ")])[2]');

    /**
     * Expect result to redirect the Marketpalce settings URL
     */
    await expect(adminPage).toHaveURL('admin/configuration/marketplace/settings');

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
    
    await adminPage.goto('seller/products');

    await adminPage.click('a.primary-button');

    await expect(adminPage.locator('div.fixed.top-5')).toHaveText('Please update your profile details');
    
    await adminPage.goto('seller/profile/edit');

    await sellerManageProfile(adminPage);

    await expect(adminPage.locator('div.fixed.top-5')).toHaveText('Your Profile is updated successfully');    

    await adminPage.goto('seller/products');
    await adminPage.click('a.primary-button');

    await sellerSimpleProduct(adminPage);
    await adminPage.goto('admin/marketplace/products');
    /**
     *Select the first checkbox in the Seller list
     */

    await adminPage.locator('div > .icon-uncheckbox').first().click();
    
    /**
     *Click on the Select Action dropdown
     */
    await adminPage.click('//button[contains(., "Select Action") ]')
    /**
     *Hover over the Update Status option
     */
    const updateStatus = await adminPage.locator("xpath=//span[contains(.,'Update Status')]");
    await updateStatus.hover();
    /**
     *Click on the second dropdown option
     */
    await adminPage.click("//a[contains(.,'Approved')]");
    /**
     *Click on the Agree button
     */
    await adminPage.click('//button[contains(.,"Agree")]');
    await adminPage.waitForSelector('div.fixed.top-5');
    /**
     * Checked the Expected pop-up message "Product updated successfully"
     */
    await expect(adminPage.locator('div.fixed.top-5')).toHaveText('Product Updated successfully. Close ');
    await productFlagStatus(adminPage);

});
