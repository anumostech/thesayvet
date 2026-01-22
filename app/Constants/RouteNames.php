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

    // Users  Details
    public const USER_DETAIL_ADD = 'account.users.user-details-add';
    public const USER_DETAIL_STORE = 'account.users.user-details-store';
    public const USER_DETAIL_LIST = 'account.users.user-details-list';
    public const USER_DETAIL_SHOW = 'account.users.user-details-show';
    public const USER_DETAIL_EDIT = 'account.users.user-details-edit';
    public const USER_DETAIL_UPDATE = 'account.users.user-details-update';
    public const USER_DETAIL_DELETE = 'account.users.user-details-delete';

    // Customers
    public const CUSTOMER_ADD = 'account.customers.customer-add';
    public const CUSTOMER_STORE = 'account.customers.customer-store';
    public const CUSTOMER_LIST = 'account.customers.customer-list';
    public const CUSTOMER_SHOW = 'account.customers.customer-show';
    public const CUSTOMER_EDIT = 'account.customers.customer-edit';
    public const CUSTOMER_UPDATE = 'account.customers.customer-update';
    public const CUSTOMER_DELETE = 'account.customers.customer-delete';

    // Categories
    public const CATEGORY_LIST   = 'account.categories.list';
    public const CATEGORY_ADD    = 'account.categories.add';
    public const CATEGORY_STORE  = 'account.categories.store';
    public const CATEGORY_SHOW   = 'account.categories.show';
    public const CATEGORY_EDIT   = 'account.categories.edit';
    public const CATEGORY_UPDATE = 'account.categories.update';
    public const CATEGORY_DELETE = 'account.categories.delete';

    //Products
    public const PRODUCT_LIST   = 'account.products.list';
    public const PRODUCT_ADD    = 'account.products.add';
    public const PRODUCT_STORE  = 'account.products.store';
    public const PRODUCT_SHOW   = 'account.products.show';
    public const PRODUCT_EDIT   = 'account.products.edit';
    public const PRODUCT_UPDATE = 'account.products.update';
    public const PRODUCT_DELETE = 'account.products.delete';

    // Orders
    public const ORDER_LIST   = 'account.orders.list';
    public const ORDER_ADD    = 'account.orders.add';
    public const ORDER_STORE  = 'account.orders.store';
    public const ORDER_SHOW   = 'account.orders.show';
    public const ORDER_EDIT   = 'account.orders.edit';
    public const ORDER_UPDATE = 'account.orders.update';
    public const ORDER_DELETE = 'account.orders.delete';

    // Order Items
    public const ORDER_ITEM_ADD    = 'account.orders.items.add';
    public const ORDER_ITEM_STORE  = 'account.orders.items.store';
    public const ORDER_ITEM_DELETE = 'account.orders.items.delete';

    // Drivers
    public const DRIVER_LIST   = 'account.drivers.list';
    public const DRIVER_ADD    = 'account.drivers.add';
    public const DRIVER_STORE  = 'account.drivers.store';
    public const DRIVER_SHOW   = 'account.drivers.show';
    public const DRIVER_EDIT   = 'account.drivers.edit';
    public const DRIVER_UPDATE = 'account.drivers.update';
    public const DRIVER_DELETE = 'account.drivers.delete';
}
