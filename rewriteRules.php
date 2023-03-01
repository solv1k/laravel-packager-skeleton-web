<?php

// Available placeholders: :uc:vendor, :uc:package, :lc:vendor, :lc:package
return [
    'config/mypackage.php' => 'config/:lc:package.php',
    'routes/mypackage.web.php' => 'routes/:lc:package.web.php'
];