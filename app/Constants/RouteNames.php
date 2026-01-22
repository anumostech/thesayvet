<?php

namespace App\Constants;

class RouteNames
{
    public const LOGIN = 'login';
    public const LOGOUT = 'logout';
    public const DASHBOARD = 'account.dashboard';

    // Auth
    public const AUTH_LOGIN_POST = 'login.post';

    //Errors
    public const FORBIDDEN_ERROR = 'errors.forbiddenerror';
    public const PAGE_EXPIRED = 'errors.pageexpired';
    public const PAGE_NOT_FOUND = 'errors.pagenotfound';
    public const UNAUTHORIZED = 'errors.unathorized';
    public const SERVER_ERROR = 'errors.servererror';

    // Users
    public const USER_ADD = 'account.users.user-add';
    public const USER_STORE = 'account.users.user-store';
    public const USER_LIST = 'account.users.user-list';
    public const USER_SHOW = 'account.users.user-show';
    public const USER_EDIT = 'account.users.user-edit';
    public const USER_UPDATE = 'account.users.user-update';
    public const USER_DELETE = 'account.users.user-delete';

    // Customers
    public const CUSTOMER_ADD = 'account.customers.customer-add';
    public const CUSTOMER_STORE = 'account.customers.customer-store';
    public const CUSTOMER_LIST = 'account.customers.customer-list';
    public const CUSTOMER_SHOW = 'account.customers.customer-show';
    public const CUSTOMER_EDIT = 'account.customers.customer-edit';
    public const CUSTOMER_UPDATE = 'account.customers.customer-update';
    public const CUSTOMER_DELETE = 'account.customers.customer-delete';
}
