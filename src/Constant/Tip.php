<?php

namespace Nilnice\Phalcon\Constant;

class Tip
{
    // Successful operation.
    public const SUCCESS = 200000;

    // Failed operation.
    public const FAILED = 400000;

    // Account type invalid.
    public const AUTH_ACCOUNT_TYPE_INVALID = 200101;

    // JWT invalid.
    public const AUTH_JWT_INVALID = 200102;

    // Login failed.
    public const AUTH_LOGIN_FAILED = 200103;

    // Token expired.
    public const AUTH_TOKEN_EXPIRED = 200104;

    // Token failed.
    public const AUTH_TOKEN_FAILED = 200105;

    // Token invalid.
    public const AUTH_TOKEN_INVALID = 200106;

    // Unauthorized.
    public const AUTH_UNAUTHORIZED = 200207;

    // User not found.
    public const AUTH_USER_NOT_FOUND = 200108;

    // Access denied.
    public const ACCESS_DENIED = 200109;

    // Class implementation error.
    public const CLASS_IMPLEMENT_ERROR = 200110;
}
