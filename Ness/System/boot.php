<?php
/**
 * Ness PHP Framework.
 * A solid php framework for fast and secure web applications.
 *
 * @author Sinan SALIH
 * @license MIT License
 * @copyright Copyright (C) 2018-2019 Sinan SALIH
 */

use Ness\System\Framework;

// app_config.php is the configuration file for your project.
Framework::LoadConfig('app_config.php');

// This line starts your application.
Framework::Run();
