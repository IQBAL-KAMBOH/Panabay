import { test, expect } from '../../setup';
import { sellerRegister } from '../../pages/seller';
import {
    generateName,
    generateEmail,
    generateDescription,
} from "../../utils/faker";

test('seller register script', async ({ adminPage }) => {

    // const randomID = Date.now();
    // const sellerCredentials = {
    //     name: generateName(),
    //     title: generateDescription(),
    //     url: "test"+ randomID,
    //     email: generateEmail(),
    //     password: "admin123",
    //     confirm_password: "admin123",
    //     description: generateDescription(),
    //     phone_number: randomID,
    //     street_address: "California",
    //     postcode: "90009",
    //     city: "Caala",
    //     country: "United States",
    //     state: "California",
    //     meta_title: "Meta Title",
    //     meta_keywords: "Meta Keywords",
    //     meta_description: "Meta Description",
    //     privacy_policy: "Privacy Policy",
    //     shipping_policy: "Shipping Policy",
    //     return_policy: "Return Policy",
    // };

    await adminPage.goto('seller/register');

    await sellerRegister(adminPage);

    /**
     * Go to the Admin adminPage
     */
    await adminPage.goto('admin/marketplace/sellers');

    /**
     *Select the first checkbox in the Seller list
     */
    await adminPage.click('(//label[@class="icon-uncheckbox peer-checked:icon-checked cursor-pointer rounded-md text-2xl peer-checked:text-blue-600"])[1]')

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
    await expect(adminPage.locator('text=Seller updated successfully!')).toBeVisible();
});