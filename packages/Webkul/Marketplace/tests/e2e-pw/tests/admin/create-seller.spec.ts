import { test, expect } from '../../setup';


import {
    generateName,
    generateEmail,
    generateDescription,
} from "../../utils/faker";

test('admin create a new seller', async ({ adminPage }) => {
const randomID = Date.now();
const sellerCredentials = {
    name: generateName(),
    shop_title: "Fashion" + randomID,
    title: generateDescription(),
    url: "test"+ randomID,
    email: generateEmail(),
    password: "admin123",
    confirm_password: "admin123",
    description: generateDescription(),
    phone_number: randomID,
    street_address: "California",
    postcode: "90009",
    city: "Caala",
    country: "United States",
    state: "California",
    meta_title: "Meta Title",
    meta_keywords: "Meta Keywords",
    meta_description: "Meta Description",
    privacy_policy: "Privacy Policy",
    shipping_policy: "Shipping Policy",
    return_policy: "Return Policy",
};

    await adminPage.goto('admin/marketplace/sellers');
    await adminPage.getByRole('button', { name: 'Add Sellers' }).click();
    await adminPage.getByRole('textbox', { name: 'Name' }).click();
    await adminPage.getByRole('textbox', { name: 'Name' }).fill(sellerCredentials.name);
    await adminPage.getByRole('textbox', { name: 'Email' }).fill(sellerCredentials.email);
    await adminPage.getByRole('textbox', { name: 'Shop Title' }).fill(sellerCredentials.shop_title);
    await adminPage.getByRole('textbox', { name: 'Shop Url' }).fill(sellerCredentials.url);
    await adminPage.getByRole('textbox', { name: 'Street Address' }).fill(sellerCredentials.street_address);
    await adminPage.getByRole('textbox', { name: 'Phone Number' }).fill(sellerCredentials.phone_number.toString());
    await adminPage.getByRole('textbox', { name: 'Postcode' }).fill(sellerCredentials.postcode);
    await adminPage.getByRole('textbox', { name: 'City' }).fill(sellerCredentials.city);
    await adminPage.selectOption('//select[@name="country"]','IN');
    await adminPage.locator('#state').selectOption('UP');
    await adminPage.getByRole('button', { name: 'Save' }).click();

    await expect(adminPage.getByText('Seller Created Successfully.')).toBeVisible();

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

