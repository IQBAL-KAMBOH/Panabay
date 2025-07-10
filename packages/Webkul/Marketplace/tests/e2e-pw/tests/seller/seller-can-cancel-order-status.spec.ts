import { test, expect } from "../../setup";
import { sellerApprove, sellerLogin,sellerRegister, sellerManageProfile, sellerSimpleProduct} from '../../pages/seller';
import { sellerCanCreateInvoice, sellerCanCancelOrder } from "../../pages/mp-product-setting";
import *as fs from 'fs';

test('seller can cancel order status', async ({ adminPage }) => {
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

    // await adminPage.getByRole('paragraph').filter({ hasText: 'Please update your profile' }).click();
    // await expect(adminPage.locator('div').filter({ hasText: 'Please update your profile' })).toBeVisible();
    // await page.getByRole('paragraph').filter({ hasText: 'Please update your profile' }).click(); profile details')).toBeVisible();

    await expect(adminPage.locator('div.fixed.top-5').first()).toHaveText('Please update your profile details');

    await adminPage.goto('seller/profile');

    await adminPage.click('a.primary-button');

    await adminPage.waitForURL('seller/profile/edit');

    await sellerManageProfile(adminPage);

    await expect(adminPage.locator('div.fixed.top-5')).toHaveText('Your Profile is updated successfully');    

    await adminPage.goto('seller/products');

    await adminPage.click('a.primary-button');

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
    const credentials = JSON.parse(fs.readFileSync('seller-simple-product-credentials.json', 'utf-8'));

    await adminPage.goto('');

    await adminPage.fill('//input[@aria-label="Search products here"]', credentials.product_name);

    await adminPage.locator('//input[@aria-label="Search products here"]').press('Enter');
    /**
     * Click the First product of the Search Result
     */
    await adminPage.locator('(//div[contains(@class, "grid-cols-3")])[1]/div[1]').click();

    /**
     * Add the product to the cart 
     */
    await adminPage.locator("(//button[contains(@class, 'secondary-button')])[2]").click();
        
    /**
     * Open the shopping cart 
     */
    await adminPage.locator("(//span[contains(@class, 'icon-cart') and @role='button' and @tabindex='0'])[1]").click();
    
    /**
     * Continue to checkout 
     */
    await adminPage.locator('(//a[contains(., " Continue to Checkout ")])[1]').click();

    await adminPage.waitForURL('checkout/onepage');

    /**
     * Fill in the shipping address details
     */
    await adminPage.getByRole('textbox', { name: 'Company Name' }).fill('webkul');
    await adminPage.getByRole('textbox', { name: 'First Name' }).fill('webkul');
    await adminPage.getByRole('textbox', { name: 'Last Name' }).fill('webkul');
    await adminPage.getByRole('textbox', { name: 'email@example.com' }).fill('webkul@example.com');
    await adminPage.getByRole('textbox', { name: 'Street Address' }).fill('noida');
    await adminPage.locator('select[name="billing\\.country"]').selectOption('IN'); // Country: India
    await adminPage.locator('select[name="billing\\.state"]').selectOption('UP');   // State: UP
    await adminPage.getByRole('textbox', { name: 'City' }).fill('noida');
    await adminPage.getByRole('textbox', { name: 'Zip/Postcode' }).fill('251664');
    await adminPage.getByRole('textbox', { name: 'Telephone' }).fill('154895584');
    
    /**
     * click on save button
     */
    // await adminPage.click('//button[contains(., "Proceed")]');
  
    /**
     * Proceed with the checkout
     */
    await adminPage.getByRole('button', { name: 'Proceed' }).click();
    
     /**
     * Choose shipping method.
     */
    await adminPage.waitForSelector("text=Free Shipping");
    await adminPage.getByText("Free Shipping").first().click();
    await adminPage.waitForTimeout(2000);
    /**
     * Choose payment option.
     */
    await adminPage.waitForSelector("text=Cash On Delivery");
    await adminPage.getByText("Cash On Delivery").first().click();
    await adminPage.waitForTimeout(2000);
    /**
     * Place order.
     */
    await adminPage.getByRole("button", { name: "Place Order" }).click();
    await adminPage.waitForTimeout(2000);
    await adminPage.waitForSelector("text=Thank you for your order!");
    await expect(
        adminPage.locator("text=Thank you for your order!")
    ).toBeVisible();

    await adminPage.goto('admin/configuration/marketplace/settings');

    await sellerCanCancelOrder(adminPage);
});