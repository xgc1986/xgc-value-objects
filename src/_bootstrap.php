<?php
declare(strict_types=1);

if (!defined('PASSWORD_ARGON2I')) {
    define('PASSWORD_ARGON2I', \PASSWORD_BCRYPT);
}
