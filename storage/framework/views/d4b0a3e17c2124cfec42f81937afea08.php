<!DOCTYPE html>

<html
    class="<?php echo e(request()->cookie('dark_mode') ?? 0 ? 'dark' : ''); ?>"
    lang="<?php echo e(app()->getLocale()); ?>"
    dir="<?php echo e(core()->getCurrentLocale()->direction); ?>"
>

<head>

    <?php echo view_render_event('bagisto.admin.layout.head.before'); ?>


    <title><?php echo e($title ?? ''); ?></title>

    <meta charset="UTF-8">

    <meta
        http-equiv="X-UA-Compatible"
        content="IE=edge"
    >
    <meta
        http-equiv="content-language"
        content="<?php echo e(app()->getLocale()); ?>"
    >

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >
    <meta
        name="base-url"
        content="<?php echo e(url()->to('/')); ?>"
    >
    <meta
        name="currency"
        content="<?php echo e(core()->getBaseCurrency()->toJson()); ?>"
    >

    <?php echo $__env->yieldPushContent('meta'); ?>

    <?php echo themes()->setBagistoVite(['src/Resources/assets/css/app.css', 'src/Resources/assets/js/app.js'])->toHtml(); ?>

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    />

    <link
        href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap"
        rel="stylesheet"
    />

    <link
        rel="preload"
        as="image"
        href="<?php echo e(url('cache/logo/bagisto.png')); ?>"
    >

    <?php if($favicon = core()->getConfigData('general.design.admin_logo.favicon')): ?>
        <link
            type="image/x-icon"
            href="<?php echo e(Storage::url($favicon)); ?>"
            rel="shortcut icon"
            sizes="16x16"
        >
    <?php else: ?>
        <link
            type="image/x-icon"
            href="<?php echo e(bagisto_asset('images/favicon.ico')); ?>"
            rel="shortcut icon"
            sizes="16x16"
        />
    <?php endif; ?>

    <?php echo $__env->yieldPushContent('styles'); ?>

    <style>
        <?php echo core()->getConfigData('general.content.custom_scripts.custom_css'); ?>

    </style>

    <?php echo view_render_event('bagisto.admin.layout.head.after'); ?>

</head>

<body class="h-full dark:bg-gray-950">
    <?php echo view_render_event('bagisto.admin.layout.body.before'); ?>


    <div
        id="app"
        class="h-full"
    >
        <!-- Flash Message Blade Component -->
        <?php if (isset($component)) { $__componentOriginal701f473bf36886c6d0b4697249a816f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal701f473bf36886c6d0b4697249a816f6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.flash-group.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::flash-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal701f473bf36886c6d0b4697249a816f6)): ?>
<?php $attributes = $__attributesOriginal701f473bf36886c6d0b4697249a816f6; ?>
<?php unset($__attributesOriginal701f473bf36886c6d0b4697249a816f6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal701f473bf36886c6d0b4697249a816f6)): ?>
<?php $component = $__componentOriginal701f473bf36886c6d0b4697249a816f6; ?>
<?php unset($__componentOriginal701f473bf36886c6d0b4697249a816f6); ?>
<?php endif; ?>

        <!-- Confirm Modal Blade Component -->
        <?php if (isset($component)) { $__componentOriginalc603f2743be5e84d3c165d2adaeaf950 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc603f2743be5e84d3c165d2adaeaf950 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.modal.confirm','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::modal.confirm'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc603f2743be5e84d3c165d2adaeaf950)): ?>
<?php $attributes = $__attributesOriginalc603f2743be5e84d3c165d2adaeaf950; ?>
<?php unset($__attributesOriginalc603f2743be5e84d3c165d2adaeaf950); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc603f2743be5e84d3c165d2adaeaf950)): ?>
<?php $component = $__componentOriginalc603f2743be5e84d3c165d2adaeaf950; ?>
<?php unset($__componentOriginalc603f2743be5e84d3c165d2adaeaf950); ?>
<?php endif; ?>

        <?php echo view_render_event('bagisto.admin.layout.content.before'); ?>


        <!-- Page Header Blade Component -->
        <?php if (isset($component)) { $__componentOriginala93dc3cfd6b332ac9bf34de04284104e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala93dc3cfd6b332ac9bf34de04284104e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.layouts.header.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::layouts.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala93dc3cfd6b332ac9bf34de04284104e)): ?>
<?php $attributes = $__attributesOriginala93dc3cfd6b332ac9bf34de04284104e; ?>
<?php unset($__attributesOriginala93dc3cfd6b332ac9bf34de04284104e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala93dc3cfd6b332ac9bf34de04284104e)): ?>
<?php $component = $__componentOriginala93dc3cfd6b332ac9bf34de04284104e; ?>
<?php unset($__componentOriginala93dc3cfd6b332ac9bf34de04284104e); ?>
<?php endif; ?>

        <div
            class="group/container <?php echo e(request()->cookie('sidebar_collapsed') ?? 0 ? 'sidebar-collapsed' : 'sidebar-not-collapsed'); ?> flex gap-4"
            ref="appLayout"
        >
            <!-- Page Sidebar Blade Component -->
            <?php if (isset($component)) { $__componentOriginaleadb7d7dc37b591b0ef2568f27539414 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaleadb7d7dc37b591b0ef2568f27539414 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.layouts.sidebar.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::layouts.sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaleadb7d7dc37b591b0ef2568f27539414)): ?>
<?php $attributes = $__attributesOriginaleadb7d7dc37b591b0ef2568f27539414; ?>
<?php unset($__attributesOriginaleadb7d7dc37b591b0ef2568f27539414); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaleadb7d7dc37b591b0ef2568f27539414)): ?>
<?php $component = $__componentOriginaleadb7d7dc37b591b0ef2568f27539414; ?>
<?php unset($__componentOriginaleadb7d7dc37b591b0ef2568f27539414); ?>
<?php endif; ?>

            <div class="flex min-h-[calc(100vh-62px)] max-w-full flex-1 flex-col bg-white pt-3 transition-all duration-300 dark:bg-gray-950 ltr:pl-[270px] group-[.sidebar-collapsed]/container:ltr:pl-[69px] rtl:pr-[270px] group-[.sidebar-collapsed]/container:rtl:pr-[69px]">
                <!-- Added dynamic tabs for third level menus  -->
                <div class="px-4 pb-6">
                    <!-- Todo @suraj-webkul need to optimize below statement. -->
                    <?php if(! request()->routeIs('admin.configuration.index')): ?>
                        <?php if (isset($component)) { $__componentOriginal7c57ca9cedd9eea40c8c6361abe0a0f4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7c57ca9cedd9eea40c8c6361abe0a0f4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.layouts.tabs','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::layouts.tabs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7c57ca9cedd9eea40c8c6361abe0a0f4)): ?>
<?php $attributes = $__attributesOriginal7c57ca9cedd9eea40c8c6361abe0a0f4; ?>
<?php unset($__attributesOriginal7c57ca9cedd9eea40c8c6361abe0a0f4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7c57ca9cedd9eea40c8c6361abe0a0f4)): ?>
<?php $component = $__componentOriginal7c57ca9cedd9eea40c8c6361abe0a0f4; ?>
<?php unset($__componentOriginal7c57ca9cedd9eea40c8c6361abe0a0f4); ?>
<?php endif; ?>
                    <?php endif; ?>

                    <!-- Page Content Blade Component -->
                    <?php echo e($slot); ?>

                </div>

                <!-- Powered By -->
                <div class="mt-auto">
                    <div class="border-t bg-white py-2 text-center text-sm dark:border-gray-800 dark:bg-gray-900 dark:text-white">
                        <?php echo app('translator')->get('admin::app.components.layouts.powered-by.description', [
                            'bagisto' => '<a class="text-blue-600 hover:underline dark:text-darkBlue" href="https://bagisto.com/en/">Bagisto</a>',
                            'webkul' => '<a class="text-blue-600 hover:underline dark:text-darkBlue" href="https://webkul.com/">Webkul</a>',
                        ]); ?>
                    </div>
                </div>
            </div>
        </div>

        <?php echo view_render_event('bagisto.admin.layout.content.after'); ?>

    </div>

    <?php echo view_render_event('bagisto.admin.layout.body.after'); ?>


    <?php echo $__env->yieldPushContent('scripts'); ?>

    <?php echo view_render_event('bagisto.admin.layout.vue-app-mount.before'); ?>


    <script>
        /**
         * Load event, the purpose of using the event is to mount the application
         * after all of our `Vue` components which is present in blade file have
         * been registered in the app. No matter what `app.mount()` should be
         * called in the last.
         */
        window.addEventListener("load", function(event) {
            app.mount("#app");
        });
    </script>

    <?php echo view_render_event('bagisto.admin.layout.vue-app-mount.after'); ?>

</body>

</html>
<?php /**PATH /var/www/html/packages/Webkul/Admin/src/Providers/../Resources/views/components/layouts/index.blade.php ENDPATH**/ ?>