import { expect } from "@playwright/test";
import {  } from "../pages/seller";
import * as fs from 'fs';
import { assert } from "console";


export async function productApprovalStatus(adminPage) {
        
    const product_approval = await adminPage.locator('//input[@id="marketplace[settings][product][approval_required]"]');

    if (await product_approval.isChecked()){
        const disapproval_element = adminPage.locator('//p[contains(text(),"Disapproved")]').nth(0);
        await expect(disapproval_element).toBeVisible();

    } else {
        const approved_element = adminPage.locator('//p[contains(text(),"Approved")]').nth(0);
        await expect(approved_element).toBeVisible({timeout: 5000});
    }
}

export async function sellerAssignProduct(adminPage) {

    const seller_can_assign_product = await adminPage.locator('//input[@id="marketplace[settings][product][seller_can_assign]"]').isEnabled();
    await adminPage.goto('seller/products');
    await adminPage.click('a.primary-button');

    if (seller_can_assign_product){  
        
        /**
         *Expect result:  To check this text is "Search Products" Available
         */
        await expect(adminPage.locator('(//p[contains(.," Search Products ")])[1]')).toBeVisible();
      
    } else {
        /**
         *Expect result:  To check this text is not "Search Products" Available
         */
        await expect(adminPage.locator('(//p[contains(.," Search Products ")])[1]')).not.toBeVisible();

    }
}

export async function sellerCreateProduct(adminPage) {

    const seller_create_product = await adminPage.locator('//input[@id="marketplace[settings][product][seller_can_create]"]').isChecked();

    await adminPage.goto('seller/products');
    await adminPage.click('a.primary-button');

    if (seller_create_product) {       
        /**
         * To check that the Create New Products section is visible
         */
        await expect(adminPage.locator('//p[contains(.," Create New Products ")]')).toBeVisible();
        //  await adminPage.locator('//p[contains(.," Create New Products ")]').isVisible()
    } else {
        /**
         * To check that the Create New Products section is not visible
         */
        await expect(adminPage.locator('//p[contains(.," Create New Products ")]')).not.toBeVisible();
    }
}

export async function showProgressBar(adminPage) {

     /**
     * To create the random id
     */
     const randomID = Date.now();

     const productDetails = {
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
     
    const seller_create_product =  await adminPage.locator('//input[@id="marketplace[settings][product][seller_can_create]"]').isChecked();
    const show_progress_bar = await adminPage.locator('//input[@id="marketplace[settings][product][show_progress_bar]"]').isChecked();

    await adminPage.goto('seller/products');
    await adminPage.click('a.primary-button');

    await adminPage.waitForURL('seller/products/create');
    await adminPage.locator('select[name="type"]').selectOption("simple");
    await adminPage.locator('select[name="attribute_family_id"]').selectOption("1");
    await adminPage.locator('input[name="sku"]').fill(productDetails.sku );

    /**
     * Fill the Sku using the Random fuction
     */
    // await adminPage.fill('//input[@name="sku"]',productDetails.sku );

    /**
     * Click to Continue button
     */
    await adminPage.locator('//button[contains(.,"Continue")]').click();

    await adminPage.waitForSelector('button.primary-button:has-text("Save Product")');

    /**
     * Waiting for the main form to be visible.
     */
    await adminPage.waitForSelector('form[enctype="multipart/form-data"]', {state: "visible"});
    /**
     * Fill the Product Name
     */
    await adminPage.locator('#name').fill(productDetails.product_name);


    if (seller_create_product) {       
        if (show_progress_bar) {
            await expect(adminPage.locator('div.relative.h-4')).toBeVisible();
        } else {
            await expect(adminPage.locator('div.relative.h-4')).not.toBeVisible();
        }
    }
}


export async function productFlagStatus(adminPage) {

    const credentials = JSON.parse(fs.readFileSync('seller-simple-product-credentials.json', 'utf-8'));
    
    await adminPage.goto('admin/configuration/marketplace/settings');
    // await adminPage.waitForTimeout(1000);

    const product_flag = await adminPage.locator('//input[@id="marketplace[settings][product][flag_enabled]"]').isChecked();


    await adminPage.goto('');

    await adminPage.fill('//input[@aria-label="Search products here"]', credentials.product_name);
    
    await adminPage.locator('//input[@aria-label="Search products here"]').press('Enter');

    await adminPage.waitForSelector('//div[contains(@class, "mt-8 grid ")]/div[1]');

    await adminPage.click('//div[@class="mt-8 grid grid-cols-3 gap-8 max-1060:grid-cols-2 max-md:mt-5 max-md:justify-items-center max-md:gap-x-4 max-md:gap-y-5"][1]/div[1]');

    // await adminPage.waitForSelector('//button[contains(.,"Add To Cart")]', {state: "visible"});
    
    /**
     * If the First Product is seller product
     */
    if(product_flag){
        
       /**
        * Create a variable to check this is the seller product or not
        */
        const seller_product = await adminPage.locator('a.text-lg');
    
        /**
         * If the First Product is seller product
         */
        if ( seller_product.isVisible()) {
            console.log('Seller product');
            /**
             * To check the Report Product button is visible or not
             */
            await expect(adminPage.locator('//span[@class="flex cursor-pointer items-center gap-2.5"]')).toBeVisible();
        } else {
            /**
             * This Product is admin Product
             */
            console.log('Admin Product')
            await expect(adminPage.locator('//span[@class="flex cursor-pointer items-center gap-2.5"]')).not.toBeVisible();
        }
    } 
}

export async function sellerApprovalStatus(adminPage) {

    const seller_approval = await adminPage.locator('//input[@id="marketplace[settings][seller][approval_required]"]').isChecked();

    await adminPage.goto('admin/marketplace/sellers');

    if ( seller_approval ){
        await expect(adminPage.locator('label.label-info.py-1').first()).toBeVisible();

    } else {
        await expect(adminPage.locator('label.label-active.py-1').first()).toBeVisible();
    }
}

export async function sellerCanCreateInvoice(adminPage) {

    const seller_can_create_invoice = await adminPage.locator('//input[@id="marketplace[settings][seller][can_create_invoice]"]').isChecked();
    // await adminPage.click('a.primary-button');

    await adminPage.goto('seller/orders');
    /**
     * Click on the "Which View" button for the order with a status of "Pending." According to the index: [3]
     */
    await adminPage.waitForSelector('p.label-pending');
    const pending = await adminPage.$$('p.label-pending'); // Select all elements containing 'Pending'
    const targetElement = pending[0]; // First match
    const lastChildHandle = await targetElement.evaluateHandle(el => {
        let parent: HTMLElement | null = el as HTMLElement;
        for (let i = 0; i < 3; i++) {
            if (!parent) return null; // Safety check
            parent = parent.parentElement;
        }
        return parent?.lastElementChild ?? null; // Get the last child of the 3rd parent
    });
    await lastChildHandle.asElement()?.click(); // Click safely


    if (seller_can_create_invoice) {       

        
        await expect(adminPage.locator('//a[contains(.,"Invoice")]')).toBeVisible();

        await adminPage.click('//a[contains(.,"Invoice")]');

        /**
         * Create the Invoice from the Seller end
         */
        await adminPage.waitForSelector('//p[contains(.,"Create Invoice")]')
        await adminPage.click('//button[contains(.,"Create Invoice")]');

        
        await expect(adminPage.locator('div.fixed.top-5')).toHaveText('Invoice created successfully');

    } else {
        console.log('Invoice Button is not Visible');

        /**
         * Expect that the button is not visible if the status is Disable.
         */
        await expect(adminPage.locator('//a[contains(.,"Invoice")]')).not.toBeVisible();

    }
}

export async function sellerCanCreateShipment(adminPage) {

    const seller_can_create_shipment = await adminPage.locator('//input[@id="marketplace[settings][seller][can_create_invoice]"]').isChecked();
    // await adminPage.click('a.primary-button');

    await adminPage.goto('seller/orders');
    /**
     * Click on the "Which View" button for the order with a status of "Pending." According to the index: [3]
     */
    await adminPage.waitForSelector('p.label-processing');
    const processing = await adminPage.$$('p.label-processing'); // Select all elements containing 'Pending'
    const targetElement = processing[0]; // First match
    const lastChildHandle = await targetElement.evaluateHandle(el => {
        let parent: HTMLElement | null = el as HTMLElement;
        for (let i = 0; i < 3; i++) {
            if (!parent) return null; // Safety check
            parent = parent.parentElement;
        }
        return parent?.lastElementChild ?? null; // Get the last child of the 3rd parent
    });
    await lastChildHandle.asElement()?.click(); // Click safely


    if (seller_can_create_shipment) {       

        
        await expect(adminPage.locator('//a[contains(.,"Ship")]')).toBeVisible();

        await adminPage.click('//a[contains(.,"Ship")]');
        await adminPage.waitForSelector('//button[contains(.," Create Shipment ")]');


        await adminPage.fill('input[name="shipment[carrier_title]"]', 'FedEx');
        await adminPage.fill('input[name="shipment[track_number]"]', '124354FEDEX');

        await adminPage.selectOption('select[name="shipment[source]"]', {index: 0});
        /**
         * Create the Invoice from the Seller end
         */
        await adminPage.click('//button[contains(.," Create Shipment ")]');

        
        await expect(adminPage.locator('div.fixed.top-5')).toHaveText('Shipment created successfully');

        // await expect(adminPage).toHaveURL('seller/orders/view/18');

    } else {
        console.log('Shipment Button is not Visible');

        /**
         * Expect that the button is not visible if the status is Disable.
         */
        await expect(adminPage.locator('//a[contains(.,"Ship")]')).not.toBeVisible();

    }
}

export async function sellerCanCancelOrder(adminPage) {

    const seller_can_cancel_order = await adminPage.locator('//input[@id="marketplace[settings][seller][can_create_invoice]"]').isChecked();
    // await adminPage.click('a.primary-button');

    await adminPage.goto('seller/orders');
    /**
     * Click on the "Which View" button for the order with a status of "Pending." According to the index: [3]
     */
    await adminPage.waitForSelector('p.label-pending');
    const pending = await adminPage.$$('p.label-pending'); // Select all elements containing 'Pending'
    const targetElement = pending[0]; // First match
    const lastChildHandle = await targetElement.evaluateHandle(el => {
        let parent: HTMLElement | null = el as HTMLElement;
        for (let i = 0; i < 3; i++) {
            if (!parent) return null; // Safety check
            parent = parent.parentElement;
        }
        return parent?.lastElementChild ?? null; // Get the last child of the 3rd parent
    });
    await lastChildHandle.asElement()?.click(); // Click safely


    if (seller_can_cancel_order) {       

        
        await expect(adminPage.locator('//a[contains(.," Cancel ")]')).toBeVisible();

        await adminPage.click('//a[contains(.," Cancel ")]');

        /**
         * Create the Invoice from the Seller end
         */
        await adminPage.waitForSelector('//button[contains(.,"Agree")]')
        await adminPage.click('//button[contains(.,"Agree")]');

        
        await expect(adminPage.locator('div.fixed.top-5')).toHaveText('Order has been canceled');

    } else {
        console.log('Cancel Button is not Visible');

        /**
         * Expect that the button is not visible if the status is Disable.
         */
        await expect(adminPage.locator('//a[contains(.," Cancel ")]')).not.toBeVisible();

    }
}

export async function sellerMinimumOrderAmount(adminPage) {

    const minimum_order_amount_status = await adminPage.locator('//input[@id="marketplace[settings][seller][enable_minimum_order_amount]"]').isChecked();

    if (minimum_order_amount_status) {
        console.log('Is Enable');

        /**
        * Expexted to login the Seller panel
        */
        await adminPage.goto('seller/profile')


        /**
         * Click to the Product section
         */
        await adminPage.click('//a[contains(.,"Edit Profile")]');

        await adminPage.waitForSelector('//p[contains(.," Manage Profile ")]')

        await expect(adminPage.locator('//h3[contains(.," Minimum Order Amount ")]')).toBeVisible();

        /**
         * Go to Admin panel -> Seller Sections
         */
        await adminPage.goto('admin/marketplace/sellers');
        await adminPage.click('(//span[@title="Edit"])[1]');

        await expect(adminPage.locator('//label[contains(.," Minimum Order Amount ")]')).toBeVisible();

    } else {
        await expect(adminPage.locator('//label[contains(.," Minimum Order Amount ")]')).not.toBeVisible();
        console.log('Is Disabled');
    }
}

export async function sellerFlagStatus(adminPage) {

    const credentials = JSON.parse(fs.readFileSync('seller-simple-product-credentials.json', 'utf-8'));
    
    // await adminPage.waitForTimeout(1000);

    const seller_flag = await adminPage.locator('//input[@id="marketplace[settings][seller][flag_enabled]"]').isChecked();
    console.log('Seller Flag Status: ', seller_flag);


    await adminPage.goto('');

    await adminPage.fill('//input[@aria-label="Search products here"]', credentials.product_name);
    
    await adminPage.locator('//input[@aria-label="Search products here"]').press('Enter');

    // await adminPage.waitForSelector('//div[contains(@class, "mt-8 grid ")]/div[1]');

    await adminPage.waitForTimeout(2000);

    await adminPage.click('//div[@class="mt-8 grid grid-cols-3 gap-8 max-1060:grid-cols-2 max-md:mt-5 max-md:justify-items-center max-md:gap-x-4 max-md:gap-y-5"][1]/div[1]');

    /**
     * Add the product to the cart 
     */
    // await adminPage.locator("(//button[contains(@class, 'secondary-button')])[2]").click();

    const seller_product = await adminPage.locator('span.text-lg.text-navyBlue');

    // await adminPage.waitForSelector('//button[contains(.,"Add To Cart")]', {state: "visible"});
    
    /**
     * If the First Product is seller product
     */
    if( seller_product.isVisible() ){
        console.log('Seller product is visible');
        /**
         * Click to the Available Seller
         */
        await adminPage.waitForTimeout(2000);
        await adminPage.locator('a.text-navyBlue.text-lg').click();
        await adminPage.waitForSelector('//input[@placeholder="Search for Products"]', {state: 'visible'});
        
        await expect(adminPage.locator('//input[@placeholder="Search for Products"]')).toBeVisible();

        if (seller_flag) {
            console.log('"Report Issue" button is displayed');

            /**
             * To check the Seller Report flag button is visible or not
             */
           
            await expect(adminPage.locator('span.mp-issue-icon.text-2xl')).toBeVisible();
        } else {
            await expect(adminPage.locator('span.mp-issue-icon.text-2xl')).not.toBeVisible();
            // console.log('Report issue button is not displayed');
        }
    }  
}