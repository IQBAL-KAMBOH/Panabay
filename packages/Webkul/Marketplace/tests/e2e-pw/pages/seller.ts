
import { expect } from "@playwright/test";
import {
    generateName,
    generateFirstName,
    generateLastName,
    generateEmail,
    generateDescription,
} from "..//utils/faker";

import * as fs from 'fs';

export async function sellerRegister(adminPage) {
    
    const randomID1 = Date.now();
    const seller_credentials = {
        title: generateDescription(),
        url: "test"+ randomID1,
        email: generateEmail(),
        password: "admin123",
        confirm_password: "admin123",
    };
    /**
     * Fill Seller registration form
     */
    await adminPage.fill('//input[@placeholder="Name"]', seller_credentials.email);
    await adminPage.fill('//input[@placeholder="Shop Url"]', seller_credentials.url);
    await adminPage.fill('//input[@placeholder="email@example.com"]', seller_credentials.email);
    await adminPage.fill('//input[@placeholder="Password"]', seller_credentials.password);
    await adminPage.fill('//input[@placeholder="Confirm Password"]', seller_credentials.confirm_password);

    /**
     * Click on register button
     */ 
    await adminPage.click('//button[contains(.," Register ")]');

    await adminPage.locator('div.fixed.top-5 ').getByText('Account created successfully.').isVisible();
    
    await adminPage.goto('seller/login');
    /**
     * Fill the Login Form
     */
    await adminPage.fill('//input[@placeholder="email@example.com"]', seller_credentials.email);
    await adminPage.fill('//input[@placeholder="Password"]', seller_credentials.password);
    await adminPage.click('//button[contains(.," Sign In ")]');


    // return seller_credentials;
    // Save credentials to a file
    fs.writeFileSync('seller-credentials.json', JSON.stringify(seller_credentials));

};

export async function sellerLogin(page) {

    // Read credentials
    const credentials = JSON.parse(fs.readFileSync('seller-credentials.json', 'utf-8'));
    await page.fill('//input[@placeholder="email@example.com"]', credentials.email);
    await page.fill('//input[@placeholder="Password"]', credentials.password);
    await page.click('//button[contains(.," Sign In ")]');
}

export async function sellerApprove(page) {
    await page.locator('label.icon-uncheckbox').nth(0).click();

    await page.click('//span[contains(.," Select Action ")]');

    const updateStatus = await page.locator("xpath=//span[contains(.,'Update Status')]");
    await updateStatus.hover();

    await page.click('//a[contains(.,"Approved")]');

    await page.click('//button[contains(.,"Agree")]');
}

export async function sellerManageProfile(page) {

    const randomID = Date.now();
    const sellerProfileDetailsCredentials = {
        name: generateName(),
        shop_title: "Fashion" + randomID,
        description: generateDescription(),
        street_address: "California",
        phone_number : "91" +randomID,
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
        minium_order_amount: "10",
    };
    /**
     * Fill Profile Details.
     */
    await page.fill('//input[@name="shop_title"]', sellerProfileDetailsCredentials.shop_title);
    await page.fill('//input[@name="phone"]', sellerProfileDetailsCredentials.phone_number.toString());

    /**
     * Fill the "About Store" inside iframe
     */
    await page.fillInTinymce('#content_ifr', sellerProfileDetailsCredentials.description); // Filling the TinyMCE editor

    /**
     * Fill the "Meta Information"
     */
    await page.fill('//input[@name="meta_title"]', sellerProfileDetailsCredentials.meta_title);
    await page.fill('//input[@name="meta_keywords"]', sellerProfileDetailsCredentials.meta_keywords);
    await page.fill('//textarea[@name="meta_description"]', sellerProfileDetailsCredentials.meta_description);

    /**
     * Fill Privacy Policy, Shipping Policy, Return Policy inside iframe
     */
    await page.fillInTinymce('#privacy_policy_ifr', sellerProfileDetailsCredentials.description);
    await page.fillInTinymce('#shipping_policy_ifr', sellerProfileDetailsCredentials.description);
    await page.fillInTinymce('#return_policy_ifr', sellerProfileDetailsCredentials.description);

    /**
     * Fill Address Information
     */
    await page.fill('//input[@placeholder="Street Address"]', sellerProfileDetailsCredentials.street_address);
    await page.fill('//input[@placeholder="Postcode"]', sellerProfileDetailsCredentials.postcode);
    await page.fill('//input[@placeholder="City"]', sellerProfileDetailsCredentials.city);

    /**
     * Select Country and State
     */
    await page.selectOption('//select[@name="country"]', 'US');
    await page.selectOption('//select[@placeholder="State"]', 'CA');

    // await page.fill('input[placeholder="Minimum Order Amount"]', sellerProfileDetailsCredentials.minium_order_amount);
// 
    // const minium_order_amount = await page.locator('input[placeholder="Minimum Order Amount"]').innerText();

    /**
     * Click on Save Profile button
     */
    await page.locator('//button[contains(.," Save Profile" )]').click();

    fs.writeFileSync('seller-profile-details.credentials.json', JSON.stringify(sellerProfileDetailsCredentials));

    
    // await sellerSimpleProduct(page);
}

export async function sellerManageProfileForMinimumOrderAmount(page) {

    const randomID = Date.now();
    const seller_profile_details_credentials = {
        name: generateName(),
        shop_title: "Fashion" + randomID,
        description: generateDescription(),
        street_address: "California",
        phone_number : "91" +randomID,
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
        minimum_order_amount: "110",
    };
    /**
     * Fill Profile Details.
     */
    await page.fill('//input[@name="shop_title"]', seller_profile_details_credentials.shop_title);
    await page.fill('//input[@name="phone"]', seller_profile_details_credentials.phone_number.toString());

    /**
     * Fill the "About Store" inside iframe
     */
    await page.fillInTinymce('#content_ifr', seller_profile_details_credentials.description); // Filling the TinyMCE editor

    /**
     * Fill the "Meta Information"
     */
    await page.fill('//input[@name="meta_title"]', seller_profile_details_credentials.meta_title);
    await page.fill('//input[@name="meta_keywords"]', seller_profile_details_credentials.meta_keywords);
    await page.fill('//textarea[@name="meta_description"]', seller_profile_details_credentials.meta_description);

    /**
     * Fill Privacy Policy, Shipping Policy, Return Policy inside iframe
     */
    await page.fillInTinymce('#privacy_policy_ifr', seller_profile_details_credentials.description);
    await page.fillInTinymce('#shipping_policy_ifr', seller_profile_details_credentials.description);
    await page.fillInTinymce('#return_policy_ifr', seller_profile_details_credentials.description);

    /**
     * Fill Address Information
     */
    await page.fill('//input[@placeholder="Street Address"]', seller_profile_details_credentials.street_address);
    await page.fill('//input[@placeholder="Postcode"]', seller_profile_details_credentials.postcode);
    await page.fill('//input[@placeholder="City"]', seller_profile_details_credentials.city);

    /**
     * Select Country and State
     */
    await page.selectOption('//select[@name="country"]', 'US');
    await page.selectOption('//select[@placeholder="State"]', 'CA');

    await page.fill('input[placeholder="Minimum Order Amount"]', seller_profile_details_credentials.minimum_order_amount);

    const minium_order_amount = await page.locator('input[placeholder="Minimum Order Amount"]').innerText();

    /**
     * Click on Save Profile button
     */
    await page.locator('//button[contains(.," Save Profile" )]').click();

    fs.writeFileSync('seller-profile-details.credentials.json', JSON.stringify(seller_profile_details_credentials));

    
    // await sellerSimpleProduct(page);
}


export async function sellerSimpleProduct(page) {
    /**
     * To create the random id
     */
    const randomID = Date.now();

    const product_details = {
        sku: 'SKU'+ randomID,
        product_name: 'Product Name'+ randomID,
        short_description: ' Fashion Product',
        description: ' Fashion Product',
        meta_title: 'Meta Title',
        meta_keywords: 'Meta Keyword',
        meta_description: 'Meta Description',
        price: '100',
        weight: '0.322',
        inventories: '50',
    }

    /**
     * Opening create product form in modal.
     */
        await page.locator('select[name="type"]').selectOption("simple");
        await page.locator('select[name="attribute_family_id"]').selectOption("1");
        await page.locator('input[name="sku"]').fill(product_details.sku );

        /**
         * Fill the Sku using the Random fuction
         */
        // await page.fill('//input[@name="sku"]',product_details.sku );

        /**
         * Click to Continue button
         */
        await page.locator('//button[contains(.,"Continue")]').click();

        await page.waitForSelector('button.primary-button:has-text("Save Product")');
    
        /**
         * Waiting for the main form to be visible.
         */
        await page.waitForSelector('form[enctype="multipart/form-data"]', {state: "visible"});

        await page.waitForTimeout(2000);
        /**
         * Fill the Product Name
         */
        await page.locator('#name').fill(product_details.product_name);

        
        // await productNameInput.fill(product_details.product_name);
        /**
         * Fill the Description and Short DEscription using the Function
         */
        await page.fillInTinymce("#short_description_ifr", product_details.short_description);
        await page.fillInTinymce('#description_ifr', product_details.description);

        /**
         * Fill the Meta Title details
         */
        await page.locator('//textarea[@name="meta_title"]').fill(product_details.meta_title);
        await page.locator('//textarea[@name="meta_keywords"]').fill(product_details.meta_keywords);
        await page.locator('//textarea[@name="meta_description"]').fill(product_details.meta_description);

        /**
         * Enter the Price
         */
        await page.fill('//input[@name="price"]', product_details.price);

        /**
         * Enter the Weight
         */
        await page.fill('//input[@name="weight"]', product_details.weight);

        /**
         * Enable the all Status
         */
        await page.locator('div:nth-child(3) > .relative > label').click();
        await page.locator('div:nth-child(4) > .relative > label').click();
        await page.locator('div:nth-child(5) > .relative > label').click();
        await page.locator('div:nth-child(3) > div:nth-child(6)').click();
        await page.locator('div:nth-child(6) > .relative > label').click();
        // await page.fill('//input[@name="inventories[17]"]' , product_details.inventories);
        await page.fill('(//input[@class="w-full mb-0.5 py-2.5 px-3 border-2 rounded-lg text-sm text-gray-600 transition-all hover:border-gray-400 focus:border-gray-400"])[4]',product_details.inventories)

        /**
         * Click on the save button
         */
        await page.click('//button[contains(.,"Save Product") ]')

        fs.writeFileSync('seller-simple-product-credentials.json', JSON.stringify(product_details));


}

export async function sellerConfugProduct(page) {
    const randomID = Date.now();

    const productDetails = {
        sku: 'SKU'+ randomID,
        product_name: "Fashion Product"+ randomID,
        short_description: generateDescription(),
        description: generateDescription(),
        meta_title: 'Meta Title',
        meta_keywords: 'Meta Keyword',
        meta_description: 'Meta Description',
        price: '100',
        weight: '0.322',
        inventories: '50',
    }

        /**
         * Click to the Product section
         */
        await page.click('//span[contains(.," Products ")]');
    
        /**
         * Click to the Add New Product button
         */
        await page.click('//a[contains(.,"Add New Product")]');
    
        /**
         * Check that after redirect to the seller product create page
         */
        await expect(page).toHaveURL('seller/products/create');
        
        /**
         * Select the Product Type [index 0]
         */
        await page.selectOption('//select[@name="type"]', { index: 1 });
        
        /**
         * Select the Attribute Family [Index 0]
         */
        await page.selectOption('//select[@name="attribute_family_id"]', { index: 0 });

        /**
         * Fill the Sku using the Random fuction
         */
        await page.fill('//input[@name="sku"]',productDetails.sku );

        /**
         * Click to Continue button
         */
        await page.click('//button[contains(.,"Continue")]')

               
        /**
         * Delete Red,Green and Yellow option
         */
        await page.getByRole('paragraph').filter({ hasText: 'Red' }).locator('span').click();
        await page.getByRole('paragraph').filter({ hasText: 'Green' }).locator('span').click();
        await page.getByRole('paragraph').filter({ hasText: 'Yellow' }).locator('span').click();

        /**
         * Delete the M,L and XL size
         */
        await page.locator('div:nth-child(2) > div > p:nth-child(2) > .mp-delete-icon').click();
        await page.locator('form').filter({ hasText: 'Product Type Simple' }).locator('span').nth(3).click();
        await page.getByRole('paragraph').filter({ hasText: 'XL' }).locator('span').click();
        
        /**
         * Click to Continue button
         */
        await page.click('//button[contains(.,"Continue")]');

        await page.locator('//div[@class="mt-3.5 rounded-xl border bg-white p-5"]').isVisible();
        
        await page.waitForTimeout(8000);
        /**
         * Fill the Product Name
         */
        await page.fill('//input[@id="name"]', productDetails.product_name);

        /**
         * Fill the Description and Short DEscription using the Function
         */
        await page.fillInTinymce('#short_description_ifr', productDetails.short_description);
        await page.fillInTinymce('#description_ifr', productDetails.description);

        /**
         * Fill the Meta Title details
         */
        await page.fill('//textarea[@name="meta_title"]', productDetails.meta_title);
        await page.fill('//textarea[@name="meta_keywords"]', productDetails.meta_keywords);
        await page.fill('//textarea[@name="meta_description"]', productDetails.meta_description);

        /**
         * Select All Variants
         */
        await page.click('//span[@for="select-all-variants"]');
        
        await page.waitForSelector('//button[contains(.," Select Action ")]');

        /**man
         * Click on the Select Action Button
         */
        await page.click('//button[contains(.," Select Action ")]');

        /**
         * Select the Edit price option
         */
        await page.click('//div/ul/li[3]');

        /**
         * Click on Agree button on the Modal
         */
        await page.click('//button[contains(.,"Agree")]');

        /**
         * Enter the Price For the all variants
         */
        await page.fill('//input[@name="price"]', productDetails.price);

        /**
         * Click on "Apply To All" button
         */
        await page.click('//button[contains(.," Apply to All ")]');

        /**
         * Click on "Save" button
         */
        await page.click('//button[@class="primary-button ltr:mr-11 rtl:ml-11"]');
        await page.waitForTimeout(2000);

        /**
         * Select All Variants
         */
        await page.click('//span[@for="select-all-variants"]');
        
        /**
         * Click on the Select Action Button
         */
        await page.click('//button[contains(.," Select Action ")]');

        /**
         * Select the Edit price option
         */
        await page.click('//div/ul/li[4]');

        /**
         * Click on Agree button on the Modal
         */
        await page.click('//button[contains(.,"Agree")]');

        /**
         * Enter the Price For the all variants
         */
        await page.fill('//input[@name="inventories[17]"]', productDetails.inventories);

        /**
         * Click on "Apply To All" button
         */
        await page.click('//button[contains(.," Apply to All ")]');

        /**
         * Click on "Save" button
         */
        await page.click('//button[@class="primary-button ltr:mr-11 rtl:ml-11"]');
        await page.waitForTimeout(2000);
        
        /**
         * Enter the Weight
         */
        // await page.fill('//input[@name="weight"]', productDetails.weight);

        /**
         * Enable the all Status
         */
        await page.locator('.relative > label').first().click();
        await page.locator('div:nth-child(3) > .relative > label').click();
        await page.locator('div:nth-child(6) > .relative > label').click();
        await page.locator('div:nth-child(4) > .relative > label').click();

        /**
         * Click on the save button
         */
        await page.click('//button[contains(.,"Save Product") ]')

        /**
         * Checked the Expected pop-up message "Product updated successfully"
         */
        await expect(page.locator('div.fixed.top-5')).toHaveText('Product updated successfully');
}

export async function createSellerInventorySource(page) {

    const randomID = Date.now();

    const inventory_source = {
        code: "Code" + randomID,
        inventory_name: "Inventory Source" + randomID,
        description: "Inventory Source Description",
        street_address: "California",
        city: "California",
        postcode: "90009",
        contact_name: "Contact Name" + randomID,
        email: "seller" + randomID + "@example.com",
        phone_number: "91" + randomID,
        name: "seller" + randomID,
    }

    /**
     * Click on the Inventory Source link
     */
    await page.click('//a[contains(.," Create Inventory Source ")]');

    /**
     * Fill the Inventory Source form
     */
    await page.fill('//input[@placeholder="Code"]', inventory_source.code);
    await page.fill('//input[@placeholder="Name"]', inventory_source.inventory_name);
    await page.fill('//textarea[@placeholder="Description"]', inventory_source.description);
    await page.selectOption('//select[@name="country"]', 'US');
    await page.selectOption('//select[@placeholder="State"]', 'CA');
    await page.fill('//input[@placeholder="City"]', inventory_source.city);
    await page.fill('//input[@placeholder="Street"]', inventory_source.street_address);
    await page.fill('//input[@placeholder="Postcode"]', inventory_source.postcode);

    await page.locator('.relative > label').click();;
    await page.fill('input[name="contact_name"]', inventory_source.name);
    await page.fill('input[placeholder="Email"]', inventory_source.email);
    await page.fill('//input[@placeholder="Contact Number"]', inventory_source.phone_number);

    /**
     * Click on Save button
     */
    await page.click('//button[contains(.," Save Inventory Sources ")]');
}

export async function sellerCreateRole(page) {

    const randomID = Date.now();
    const role_details = {
        name: "Role" + randomID,
        description: "Role Description" + randomID,
    }
    
    await page.selectOption("#permission_type", "all");

    await page.fill('input[name="name"]', role_details.name);
    await page.fill(
        'textarea[name="description"]', role_details.description
        
    );
    await page.click(
        '//button[contains(.," Save Role ")]'
    );
}

export async function sellerCreateUser(page) {
    const randomID = Date.now();
    const user_details = {
        name: "User" + randomID,
        email: "user" + randomID + "@example.com",
        password: "admin123",
        confirm_password: "admin123",
        phone_number: "91" + randomID,
    }
    
    await page.waitForSelector('//button[contains(.,"Save User")]');

    await page.fill('input[name="name"]', user_details.name);
    await page.fill('(//input[@placeholder="Email"])[3]', user_details.email);
    await page.fill('//input[@placeholder="Phone Number"]', user_details.phone_number);
    await page.fill('input[name="password"]', user_details.password);
    await page.fill('input[name="password_confirmation"]', user_details.confirm_password);
    await page.selectOption('select[name="marketplace_role_id"]', {index: 1});


    // Clicking the status and verify the toggle state.
    await page.click('label[for="is_suspended"]');
    const toggleInput = await page.locator('input[id="is_suspended"]');
    await expect(toggleInput).toBeChecked();
    /**
     * Saving user and closing the modal.
     */
    await page.getByRole("button", { name: "Save User" }).click();

}