<?php

// Available placeholders: :uc:vendor, :uc:package, :lc:vendor, :lc:package
return [
    'config/mypackage.php' => 'config/:lc:package.php',
    'routes/mypackage.api.v1.php' => 'routes/:lc:package.api.v1.php',
    'src/Providers/MyPackageServiceProvider.php' => 'src/:uc:packageServiceProvider.php',
];