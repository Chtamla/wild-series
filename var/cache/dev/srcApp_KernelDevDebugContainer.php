<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerFvexeV4\srcApp_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerFvexeV4/srcApp_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerFvexeV4.legacy');

    return;
}

if (!\class_exists(srcApp_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerFvexeV4\srcApp_KernelDevDebugContainer::class, srcApp_KernelDevDebugContainer::class, false);
}

return new \ContainerFvexeV4\srcApp_KernelDevDebugContainer([
    'container.build_hash' => 'FvexeV4',
    'container.build_id' => '92b88872',
    'container.build_time' => 1574851724,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerFvexeV4');
