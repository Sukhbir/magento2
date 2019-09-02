/**
 * Techno
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Techno.com license that is
 * available through the world-wide-web at this URL:
 * https://www.Techno.com/LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    Techno
 * @package     Techno_Core
 * @copyright   Copyright (c) 2016 Techno (http://www.Techno.com/)
 * @license     https://www.Techno.com/LICENSE.txt
 */

var config = {
    paths: {
        'Techno/core/jquery/popup': 'Techno_Core/js/jquery.magnific-popup.min',
        'Techno/core/owl.carousel': 'Techno_Core/js/owl.carousel.min',
        'Techno/core/bootstrap': 'Techno_Core/js/bootstrap.min'
    },
    shim: {
        "Techno/core/jquery/popup": ["jquery"],
        "Techno/core/owl.carousel": ["jquery"],
        "Techno/core/bootstrap": ["jquery"]
    }
};
