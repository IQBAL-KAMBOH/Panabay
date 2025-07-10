import { test, expect } from '../../setup';
import {marketplaceConfiguration} from  '../../pages/marketplace-configuration';


test.describe('create flag', () => {

    test('admin create flag for product', async ({ adminPage }) => {

        await marketplaceConfiguration(adminPage);

        await adminPage.goto('admin/marketplace/flag-reasons');

        await adminPage.click('a.primary-button');

        await adminPage.waitForURL('admin/marketplace/flag-reasons/create');
        await adminPage.fill('//input[@placeholder="Admin"]', 'xyz');
        await adminPage.fill('//input[@placeholder="English"]', 'xyz');

        await adminPage.locator('//select[@id="type"]').selectOption('product');
        await adminPage.locator('.relative > label').click();

        await adminPage.click('button.primary-button');

        // await adminPage.waitForURL('admin/marketplace/flag-reasons');
        await expect(adminPage.getByText('Flag Reason created successfully.').first()).toBeVisible();

    });

    test('admin create flag for seller', async ({ adminPage }) => {


        await adminPage.goto('admin/marketplace/flag-reasons');

        await adminPage.click('a.primary-button');

        await adminPage.waitForURL('admin/marketplace/flag-reasons/create');
        await adminPage.fill('//input[@placeholder="Admin"]', 'xyz');
        await adminPage.fill('//input[@placeholder="English"]', 'xyz');

        await adminPage.locator('//select[@id="type"]').selectOption('seller');

        await adminPage.locator('.relative > label').click();

        await adminPage.click('button.primary-button');

        // await adminPage.waitForURL('admin/marketplace/flag-reasons');
        await expect(adminPage.getByText('Flag Reason created successfully.').first()).toBeVisible();
    });
});