import { test, expect } from '../../setup';
import { sellerLogin, sellerRegister, sellerSimpleProduct, sellerApprove, sellerManageProfile } from '../../pages/seller';
import {productFlagStatus, sellerCanCreateInvoice} from '../../pages/mp-product-setting';
import { loginAsCustomer } from '../../utils/customer';

test('customer report product to seller product', async ({ adminPage }) => {

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

    await adminPage.waitForURL('');


    // await adminPage.goto('admin/configuration/marketplace/settings')
    await productFlagStatus(adminPage);

    await adminPage.click('//span[@class="flex cursor-pointer items-center gap-2.5"]');

    await adminPage.waitForSelector('//button[contains(.,"Submit")]');

    await adminPage.selectOption('select[placeholder="Reason"]', {value: 'Poor product quality'});

    await adminPage.click('//button[contains(.,"Submit")]');

    await expect(
        adminPage.getByText("You cannot report this product without placing an order").first()
    ).toBeVisible();

    // /**
    //  * Add the product to the cart 
    //  */
    // await adminPage.locator("//button[@type='submit' and contains(@class, 'secondary-button')]").click();
        
    // /**
    //  * Open the shopping cart 
    //  */
    // await adminPage.locator("(//span[@role='button' and contains(@class, 'icon-cart') and @tabindex='0'])[1]").click();
    
    // /**
    //  * Continue to checkout 
    //  */
    // await adminPage.locator('(//a[contains(., " Continue to Checkout ")])[1]').click();

    // await adminPage.waitForURL('checkout/onepage');

     await adminPage.getByRole('button', { name: 'Add To Cart' }).first().click();

    /**
     * Add the product to the cart 
     */
    await adminPage.locator("span.icon-cart").first().click();
        
    // /**
    //  * Open the shopping cart 
    //  */
    // await adminPage.locator("(//span[@role='button' and contains(@class, 'icon-cart') and @tabindex='0'])[1]").click();
    
    /**
     * Continue to checkout 
     */
    await adminPage.locator('(//a[contains(., " Continue to Checkout ")])[1]').click();

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
    await adminPage.click('//button[contains(., "Save")]');

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


    // await adminPage.goto('admin/configuration/marketplace/settings')
    await productFlagStatus(adminPage);

    await adminPage.click('//span[@class="flex cursor-pointer items-center gap-2.5"]');

    await adminPage.waitForSelector('//button[contains(.,"Submit")]');

    await adminPage.selectOption('select[placeholder="Reason"]', {value: 'Poor product quality'});

    await adminPage.click('//button[contains(.,"Submit")]');

    await expect(
        adminPage.getByText("Product Reported successfully").first()
    ).toBeVisible();

});