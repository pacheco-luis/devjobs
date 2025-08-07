<?php if (!empty($breadcrumbs)): ?>

    <!-- BREADCRUMBS -->
    <nav
            aria-label="Breadcrumb"
            class="py-6"
    >
        <ol class="flex items-center gap-x-3">
            <?php foreach ($breadcrumbs as $index => $crumb): ?>
                <?php if (!empty($crumb['url']) && $index !== array_key_last($breadcrumbs)): ?>
                    <li class="flex items-center gap-x-3">
                        <a
                                href="<?php echo escape($crumb['url']); ?>"
                                class="text-base font-bold text-very-dark-blue hover:text-dark-grey transition-colors duration-200 ease-in-out"
                        ><?php echo escape($crumb['label']); ?></a>
                        <span class="text-base font-bold text-dark-grey">&rarr;</span>
                    </li>
                <?php else: ?>
                    <li>
                        <span
                                aria-current="page"
                                class="text-base font-bold text-dark-grey"
                        ><?php echo escape($crumb['label']); ?></span>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ol>
    </nav>

<?php endif; ?>
