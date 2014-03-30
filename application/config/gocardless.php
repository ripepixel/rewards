<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Environment
|--------------------------------------------------------------------------
|
| Use sandbox to test payments without actually creating transactions.
| Upgrade to "production" when you're ready. You need to do this from the
| sandbox to get your new production API keys.
|
*/
$config['gocardless_environment'] = 'sandbox';

/*
|--------------------------------------------------------------------------
| Mode
|--------------------------------------------------------------------------
|
| Are you a merchant or a partner? If not sure, you're probably a merchant.
|
*/
$config['gocardless_mode'] = 'merchant'; // or partner

/*
|--------------------------------------------------------------------------
| GoCardless App ID
|--------------------------------------------------------------------------
|
| Your app id from the GoCardless developer dashboard
|
*/
$config['gocardless_app_id'] = 'VD4NYGA6NWWGYG299RFB094SKZ07MBHMYHY2WP5Z2C41MSKHYD5562H1B9GCT8F2';

/*
|--------------------------------------------------------------------------
| GoCardless App Secret
|--------------------------------------------------------------------------
|
| Your app secret from the GoCardless developer dashboard
|
*/
$config['gocardless_app_secret'] = 'BRHCVR7Z3VQYY50CXHECSQCY8Y0RBV6NCMEZ3PEXH8J6XB36HX58FD7P7J7AHVYY';

/*
|--------------------------------------------------------------------------
| Merchant ID
|--------------------------------------------------------------------------
|
| Your merchant id from the GoCardless developer dashboard
|
*/
$config['gocardless_merchant_id'] = '0JJNJY6F0N';

/*
|--------------------------------------------------------------------------
| Access Token
|--------------------------------------------------------------------------
|
| Your access token from the GoCardless developer dashboard
|
*/
$config['gocardless_access_token'] = 'QK3T8D6RFZ0C83Y7889CYMT30Q9N9JRJ1GCTFQNWA76Z4Z06YDXM5VQTEBDYWPFP';