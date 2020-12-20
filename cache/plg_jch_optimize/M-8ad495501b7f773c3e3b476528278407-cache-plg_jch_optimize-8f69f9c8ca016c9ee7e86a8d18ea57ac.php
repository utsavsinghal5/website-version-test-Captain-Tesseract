<?php die("Access Denied"); ?>#x#a:2:{s:6:"result";s:328673:"/* Copyright @ Balbooa, http://www.gnu.org/licenses/gpl.html GNU/GPL */

/* ========================================================================
    Global Reset
 ========================================================================== */
body.contentpane,
html {
    background: transparent;
}

body {
  -webkit-locale: auto;
}

body {
    -webkit-text-size-adjust: none!important ;
    -webkit-overflow-scrolling: touch !important;
    -webkit-tap-highlight-color: transparent;
}
h2 {
	font-size:36px !important;
}
.footer h1,
.footer h2,
.footer h3,
.footer h4,
.footer h5,
.footer h6,
.footer p,
.header h1,
.header h2,
.header h3,
.header h4,
.header h5,
.header h6,
.header p,
.com_gridbox:not(.modal) h1,
.com_gridbox:not(.modal) h2,
.com_gridbox:not(.modal) h3,
.com_gridbox:not(.modal) h4,
.com_gridbox:not(.modal) h5,
.com_gridbox:not(.modal) h6,
.com_gridbox:not(.modal) p {
    margin: 0;
}

.ba-authorize-pay-btn .ba-authorize-pay,
body .ba-item:not(.ba-item-modules) {
    font-size: initial;
    letter-spacing: initial;
    line-height: initial;
}

.ba-item-text a {
    transition: .3s
}

table {
    border-spacing: 0;
    width: 100%;
}

a {
    cursor: pointer;
    text-decoration: none;
}

a[name]:hover,
a[name] {
    color: inherit;
    cursor: text;
}

img {
    min-width: 1px;
}

h1:focus,
h2:focus,
h3:focus,
h4:focus,
h5:focus,
h6:focus,
li:focus,
button:focus,
a:focus,
div:focus,
p:focus {
    outline: none;
}

input[type=range]::-moz-focus-outer {
    border: 0;
}

.ba-item .search input[type="search"],
img {
    max-width: 100%;
}

.content-text table {
    width: 100% !important;
}

body:not(.com_gridbox) .body .main-body {
    box-sizing: border-box;
    margin: 0 auto;
    max-width: 100%;
}

/* Blockquote */

blockquote {
    border-left: 4px solid;
    border-color: var(--primary);
    margin: 0;
    padding: 50px;
}

/* Lazy-Load */
.lazy-load-image,
.lazy-load-image > .parallax-wrapper .parallax,
.slideshow-content.lazy-load-image .ba-slideshow-img {
    background-image: none !important;
}

.highlight,
.ba-search-highlighted-word {
    font-weight: bold!important;
}

/* ========================================================================
    Global Inputs
 ========================================================================== */
.com_virtuemart table.user-details input,
.chzn-container-single .chzn-search input[type="text"],
.chzn-container-multi .chzn-choices,
.chzn-container-single .chzn-single,
textarea:not([class*="span"]),
input[type="text"],
input[type="password"],
input[type="datetime"],
input[type="datetime-local"],
input[type="date"],
input[type="month"],
input[type="time"],
input[type="week"],
input[type="number"],
input[type="email"],
input[type="url"],
input[type="search"],
input[type="tel"],
input[type="color"],
select {
    background: #fff;
    border: 1px solid #f3f3f3;
    box-sizing: border-box;
    color: #555;
    display: inline-block;
    font-size: 13px;
    font-family: inherit;
    height: 48px;
    line-height: 20px;
    margin-bottom: 10px;
    padding: 4px 6px;
    width: 250px;
}

input[readonly] {
    background-color: #fafafa;
}

label,
select,
button,
input[type="button"],
input[type="reset"],
input[type="submit"],
input[type="radio"],
input[type="checkbox"] {
  cursor: pointer;
}

input:focus,
textarea:not(.ba-comment-message):focus,
select:focus {
    border-color: #03ADEB !important;
    outline: none;
}

input:focus,
select:focus,
textarea:not(.ba-comment-message):focus {
    box-shadow: none !important;
}

label.invalid {
    color: #F54A40;
}

input.invalid {
    border: 1px solid #F54A40;
}


/* Disabled inputs */
body input[disabled],
body select[disabled],
body textarea[disabled],
body input[readonly],
body select[readonly],
body textarea[readonly] {
    cursor: not-allowed;
    background-color: transparent;
}

/* ========================================================================
    Gridbox Template General Styles
 ========================================================================== */

body {
    display: flex;
    flex-direction: column;
    margin: 0;
    min-height: 100vh;
    overflow-x: hidden;
}

.body {
    flex: 1 1 auto;
}

body:not(.com_gridbox) .body {
    margin: 100px 0;
}

@media (-ms-high-contrast: active), (-ms-high-contrast: none){
    .body {
        min-height: 1px;
    }
}

body.contentpane.modal {
    position: static;
}

.ba-overlay-section-backdrop.horizontal-top  .ba-overlay-section.ba-container .ba-row-wrapper.ba-container,
.ba-overlay-section-backdrop.horizontal-bottom  .ba-overlay-section.ba-container .ba-row-wrapper.ba-container,
.ba-container {
    box-sizing: border-box;
    margin: 0 auto;
    max-width: 100%;
}

header.header {
    min-width: inherit;
    width: 100%;
    z-index: 10;
}

.ba-lightbox-open header.header,
.lightbox-open header.header {
    z-index: 20 !important;
}

body:not(.gridbox) header.header {
    margin-left: 0 !important
}

img:focus {
    outline: none;
}

.ba-item {
    min-height: 20px;
    position: relative;
}

.ba-item:not(.ba-item-scroll-to-top):not(.ba-social-sidebar):not(.side-navigation-menu):not(.ba-pull-right):not(.ba-pull-left) {
    width: 100%;
}

#add-plugin-dialog .ba-plugin-group:before,
#add-plugin-dialog .ba-plugin-group:after,
.ba-row > .column-wrapper .ba-grid-column:before,
.ba-row > .column-wrapper .ba-grid-column:after,
.ba-row > .column-wrapper:before,
.ba-row > .column-wrapper:after {
    clear: both;
    content: "";
    display: table;
    line-height: 0;
}

/*
/* Grid
*/

.ba-section,
.ba-row,
.ba-grid-column {
    box-sizing: border-box;
    position: relative;
}

.ba-row {
    z-index: 1;
}

.row-with-menu {
    z-index: 5;
}

.ba-grid-column {
    flex-direction: row;
}

.ba-section-items,
.ba-tabs-wrapper
.ba-grid-column .ba-item:not(.ba-item-scroll-to-top):not(.ba-inline-icon) {
    width: 100%;
}

@media screen and (-ms-high-contrast: active), (-ms-high-contrast: none) {
    .ba-wrapper,
    .ba-row-wrapper,
    .ba-grid-column-wrapper {
        display: flex;
    }

    header.header {
        flex-shrink: 0;
    }
}

.column-wrapper .ba-grid-column-wrapper {
    align-self: stretch;
    display: flex;
    order: 1;
}

.column-wrapper .ba-grid-column-wrapper > .ba-grid-column {
    align-content: flex-start;
    align-items: flex-start;
    align-self: stretch;
    display: flex !important;
    justify-content: center;
    flex-wrap: wrap;
    width: 100%;
}

.ba-grid-column > a {
    position: absolute;
    top: 0;
    right: 0;
    left: 0;
    bottom: 0;
    cursor: pointer;
    z-index: 100;
}

.column-wrapper .ba-grid-column-wrapper .ba-grid-column.column-content-align-middle {
    align-items: center;
    align-content: center;
}

.column-wrapper .ba-grid-column-wrapper .ba-grid-column.column-content-align-bottom {
    align-items: flex-end;
    align-content: flex-end;
}

.ba-grid-column .ba-row-wrapper:not(.ba-container) {
    width: 100%;
}

/* ========================================================================
    Article
 ========================================================================== */

/* Tooltip */
.ba-account-alert-tooltip,
.ba-checkout-alert-tooltip,
.tooltip,
.popover {
    position: absolute !important;
    z-index: 1060;
}

.tooltip.top,
.popover.top {
    margin-top: -10px;
}

.tooltip.right,
.popover.right {
    margin-left: 10px;
}

.tooltip.bottom,
.popover.bottom {
    margin-top: 10px;
}

.tooltip.left,
.popover.left {
    margin-left: -10px;
}

.tooltip-arrow,
.popover .arrow {
    border: 5px solid transparent;
    border-right: 5px solid #2c2c2c;
    bottom: calc(50% - 5px);
    left: -15px;
    position: absolute;
    width: 5px;
}

.popover.top .arrow,
.tooltip-arrow {
    border-right: 5px solid transparent;
    border-top: 5px solid #2c2c2c;
    bottom: -15px;
    height: 5px;
    left: calc(50% - 5px);
    width: 0px;
}

.tooltip.bottom .tooltip-arrow {
    border-bottom: 5px solid #2c2c2c;
    border-top: 0;
    bottom: auto;
    top: -10px;
}

.ba-checkout-alert  {
    position: relative;
}

.ba-account-alert-tooltip,
.ba-checkout-alert-tooltip,
.ba-items-filter-show-button,
.tooltip,
.tip-wrap,
.popover {
    background: #2c2c2c;
    border-radius: 4px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.3);
    max-width: 200px;
    opacity: 0;
    padding: 20px;
    text-align: left;
    transition: opacity .3s;
    width: auto;
    z-index: 100000;
}

.ba-checkout-alert .ba-checkout-order-form-payment ~.ba-checkout-alert-tooltip ,
.ba-checkout-alert .ba-checkout-order-form-shipping ~.ba-checkout-alert-tooltip {
    left: 10px;
    margin-top: 10px;
}

.ba-checkout-alert .ba-radio span:before {
    border: 2px solid #ff671f !important;
}

.ba-items-filter-show-button,
.tooltip.in,
.tip-wrap,
.popover.in {
    opacity: 1;
}

.tip-wrap .tip,
.tooltip .tooltip-inner,
.popover .popover-content {
    color: #fff;
    font-size: 12px;
    font-weight: 500;
    line-height: 24px;
    margin: 0;
    opacity: .56;
}

.ba-items-filter-show-button,
.popover .popover-title {
    color: #fff;
    display: block;
    font-size: 12px;
    font-weight: 500;
    letter-spacing: 0;
    line-height: 16px;
    margin: 0 0 15px !important;
    text-align: left;
    text-decoration: none;
    text-transform: uppercase;
}

.tooltip .tooltip-inner {
    margin: 0!important;
}

.tooltip {
    margin: 0 auto;
    margin-top: -5px;
}

.ba-account-profile-fields,
.ba-checkout-form-field-wrapper {
    position: relative;
}

.ba-account-alert-tooltip,
.ba-checkout-alert-tooltip {
    animation: tooltip .3s ease-in-out both!important;
    background: #ff671f;
    bottom: auto;
    color: #fff;
    display: flex!important;
    left: 0;
    margin-left: 0;
    opacity: 1;
    text-transform: initial;
    top: 100%;
    transform: translateX(0);
    transition: .3s;
    width: auto!important;
    z-index: 999;
}

.ba-account-alert-tooltip {
    font-size: initial;
    letter-spacing: initial;
    line-height: initial;
    margin-top: 10px;
}

.ba-my-account-profile .ba-account-profile-fields[style="--ba-checkout-field-width:50%;"]:nth-child(even) .ba-account-alert-tooltip {
    margin-left: 10px;    
}

.ba-checkout-form-fields[data-type="acceptance"] .ba-checkout-alert-tooltip {
    top: calc(100% + 10px);
    left: 5px;
}

.ba-checkout-form-fields .ba-checkbox-wrapper > span {
    cursor: default;
}

.ba-account-alert-tooltip:before,
.ba-checkout-alert-tooltip:before {
    border: 5px solid transparent;
    border-bottom: 5px solid #ff671f;
    bottom: auto;
    box-sizing: content-box;
    content: "";
    height: 5px;
    left: 10px !important;
    position: absolute;
    top: -14px;
}

.ba-account-alert  input,
.ba-checkout-alert * {
    border-color: #ff671f !important;
}

.ba-authorize-field-wrapper .ba-checkout-alert-tooltip,
.ba-checkout-registration-wrapper .ba-checkout-alert-tooltip,
.ba-checkout-authentication-wrapper .ba-checkout-alert-tooltip {
    font-size: 12px;
    font-weight: 400;
    line-height: 12px;
    margin-top: -4px;
}

/* ========================================================================
    System Message
 ========================================================================== */

@keyframes notification-in {
    from {bottom: 0; transform: translateY(100%); opacity: 0;}
}

#system-message {
    animation: notification-in .4s cubic-bezier(.25,.98,.26,.99) both;
    border-radius: 6px;
    border: none;
    bottom: 50px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.3);
    color: #fff;
    display: block;
    opacity: 1;
    overflow: hidden;
    padding: 0;
    position: fixed;
    right: 50px;
    text-shadow: none;
    visibility: visible;
    z-index: 1510;
}

#system-message-container .alert {
    background: #02adea;
    display: inline-block;
    padding: 40px 25px;
    width: 250px;
}

#system-message-container .alert.alert-warning,
#system-message-container .alert.alert-danger,
#system-message-container .alert.alert-error {
    background-color: #ff776f;;
}

#system-message .alert-heading {
    color: #fff;
    display: block;
    font-size: 14px;
    font-weight: bold;
    letter-spacing: 0;
    line-height: 16px;
    margin: 0 0 15px !important;
    text-align: left;
    text-decoration: none;
    text-transform: uppercase;
}

#system-message > div .alert-message {
    color: #fff;
    font-size: 14px;
    font-weight: 500;
    line-height: 24px;
    margin: 0;
    opacity: .6;
    word-break: break-word;
}

#system-message .alert:before,
#system-message .close {
    color: #fff;
    opacity: 1;
    padding: 8px;
    position: absolute;
    right: 5px;
    text-shadow: none;
    top: 0;
    opacity: 0;
}

#system-message > .alert:before {
    content: '\f136';
    display: inline-block;
    font: normal normal normal 24px/1 'Material-Design-Iconic-Font';
    opacity: 1;
    padding: 13px 10px;
}

/* ========================================================================
    Header Sidebar
 ========================================================================== */

.sidebar-menu > .ba-wrapper:not(.ba-sticky-header) > .ba-section {
    min-height: 100vh !important;
}

.sidebar-menu .ba-wrapper.ba-sticky-header,
.sidebar-menu + .body ~ .footer,
.sidebar-menu + .body  {
    margin-left: var(--sidebar-menu-width)!important;
    margin-top: 0;
    width: calc(100% - ( var(--sidebar-menu-width) ));
}

.header.sidebar-menu .column-wrapper {
    display: block;
}

/* ========================================================================
    Modal
 ========================================================================== */

.modal {
    background-color: #fff;
    border: none;
    bottom: auto;
    box-shadow: none;
    left: 50%;
    margin: 0;
    position: fixed;
    top: 5%;
    z-index: 1041;
}

.modal-body {
    position: relative;
}

.hide {
    display: none;
}

.visible {
    animation-fill-mode: both;
    display: block;
}

.visible * {
    backface-visibility: hidden;
    -webkit-backface-visibility: hidden;
}

.modal.ba-modal-sm {
    border-radius: 6px;
    border: none;
    box-shadow: 0 15px 40px rgba(0,0,0,.15);
    box-sizing: border-box;
    left: 50%;
    margin-left: -162px;
    overflow: visible;
    padding: 25px;
    position: fixed;
    top: calc(50% - 185px) !important;
    width: 325px;
    z-index: 1060;
}

.ba-store-cart-opened .ba-modal-sm {
    display: block;
    font-size: initial;
    letter-spacing: 0;
    line-height: normal;
    text-align: left;
    z-index: 10000;
}

.modal.ba-modal-sm h3.ba-modal-title {
    color: #1a1a1a;
    cursor: default;
    font-weight: bold;
    font-size: 18px;
    line-height: 20px;
    display: inline-block;
    margin: 0 0 50px 0;
}

.ba-modal-sm input[type="text"]::-webkit-input-placeholder {
    color: #757575;
}

.ba-modal-sm input[type="text"]:focus {
    border-bottom-color: #e3e3e3 !important;
}

.ba-modal-sm .ba-btn-primary.active-button {
    position: relative;
    z-index: 1;
}

.ba-modal-sm .ba-btn-primary.active-button:hover:after,
.ba-btn-primary.active-button:hover:after {
    backface-visibility: hidden;
    -webkit-backface-visibility: hidden;
    background: #75d84d;
    opacity: 1;
    transform: scale(27);
}

.ba-modal-sm .ba-btn-primary.active-button:hover:after {
    background: var(--primary);
}

.ba-input-lg {
    position: relative;
}

.ba-modal-sm .focus-underline {
    bottom: 50px;
}

.ba-modal-sm input[type="password"],
.ba-modal-sm input[type="text"] {
    border: none;
    border-bottom: 1px solid #e3e3e3;
    box-shadow: none;
    box-sizing: border-box;
    color: #1a1a1a;
    font-size: 22px;
    font-weight: 400;
    height: 45px;
    line-height: 45px;
    margin: 25px 0 50px 0;
    padding: 4px 6px;
    width: 100%;
}

.ba-store-cart-opened .ba-modal-sm input[type="text"]{
    font-weight: normal;
}

.ba-modal-sm p {
    color: #757575;
    font-size: 16px;
    font-weight: 400;
    line-height: 30px;
    margin: 0 0 10px;
}

@keyframes modal-in {
    from {opacity: 0;}
    to {opacity: 1;}
}

.modal.in {
    animation: modal-in .3s cubic-bezier(0.4,0,0.2,1) both;
    display: block !important;
}

@keyframes close-modal-sm {
    to { opacity: 0;}
}

.modal.ba-modal-close:not(.contentpane) {
    animation: close-modal-sm .3s cubic-bezier(0.4,0,0.2,1) both;
    display: block !important;
    opacity: 1;
    visibility: visible;
}

.modal.ba-modal-sm .ba-footer-content {
    text-align: right;
}

.modal.ba-modal-sm .modal-footer {
    background: transparent;
    border: none;
    box-shadow: none;
    margin-top: 25px;
    padding: 0;
    text-align: right;
}

.ba-live-search-add-to-cart-cell > span,
.ba-wishlist-add-to-cart-cell > span:not(.ba-wishlist-empty-stock),
.modal.ba-modal-sm .modal-footer a.ba-btn-primary.active-button {
    background: var(--primary) !important;
    color: #fff !important;
    line-height: 18px;
}

.ba-modal-sm .modal-footer a:not(.ba-btn-primary):hover {
    background-color: rgba(0,0,0,0.1);
    color: #363637;
}

.ba-modal-sm .modal-footer a:hover {
    background: #e6e6e6;
}

.ba-live-search-add-to-cart-cell > span,
.ba-wishlist-add-to-cart-cell > span,
.ba-store-cart-opened .ba-modal-sm .modal-footer a {
    transition: .3s;
    font-weight: bold;
}

.ba-live-search-add-to-cart-cell > span,
.ba-wishlist-add-to-cart-cell > span,
.ba-modal-sm a.ba-btn-primary,
.ba-modal-sm .modal-footer a {
    background-color: transparent;
    border-radius: 3px;
    border: none;
    color: #363637;
    display: inline-block;
    font-weight: 500;
    font-size: 16px;
    line-height: 18px;
    overflow: hidden;
    padding: 15px;
    text-decoration: none;
    text-transform: uppercase;
}

.ba-live-search-add-to-cart-cell > span,
.ba-wishlist-add-to-cart-cell > span {
    box-sizing: border-box;
    font-size: 14px;
    font-weight: bold;
    margin-left: 25px;
    text-align: center;
    text-transform: initial;
    color: var(--title);
}

.ba-live-search-add-to-cart-cell,
.ba-wishlist-add-to-cart-cell {
    align-items: center;
    display: flex;
    text-align: right;
}

/* ========================================================================
    Shape Divider
 ========================================================================== */

.ba-shape-divider.ba-shape-divider-top {
    transform: scaleY(-1);
}

.ba-shape-divider {
    border-radius: inherit;
    bottom: 0;
    left: 0;
    overflow: hidden;
    position: absolute;
    right: 0;
    top: 0;
    z-index: 1;
}

.ba-shape-divider svg {
    bottom: 0;
    fill: currentColor;
    left: 0;
    min-width: 100%;
    position: absolute;
}

.ba-row .ba-shape-divider {
    z-index: -1;
}

/* MS Edge Browser */
@supports (-ms-ime-align:auto) {
    .ba-shape-divider:empty {
        display: none !important;
    }
}


/* IE10 and IE11 */
@media screen and (-ms-high-contrast: active), (-ms-high-contrast: none) {
    .ba-shape-divider:empty {
        display: none !important;
    }
}

/* ========================================================================
    Video BG
 ========================================================================== */
.ba-grid-column .ba-row > .ba-overlay,
.ba-overlay {
    border-radius: inherit;
    bottom: 0;
    left: 0;
    position: absolute;
    right: 0;
    top: 0;
    z-index: 0;
}

.ba-video-background.global-video-bg {
    position: fixed;
}

body > .ba-overlay {
    position: fixed;
    z-index: -2;
}

.ba-section > .ba-overlay {
    z-index: 1;
}

.ba-video-background {
    bottom: 0;
    border-radius: inherit;
    height: 100%;
    left: 0;
    overflow: hidden;
    position: absolute;
    right: 0;
    top: 0;
    width: 100%;
    z-index: -2;
}

.ba-row > .ba-overlay,
.ba-grid-column .ba-video-background {
    z-index: -1;
}

.ba-section > .ba-video-background {
    z-index: 0;
}

/* ========================================================================
    Paralax
 ========================================================================== */

.parallax-wrapper,
.parallax {
    background-attachment: scroll;
    border-radius: inherit;
    background: inherit;
    height: 100%;
    left: 0;
    position: absolute;
    top: 0;
    width: 100%;
    z-index: -2;
}

.parallax {
    height: 120%;
    left: -10%;
    top: -10%;
    transition: none;
    width: 120%;
}

.parallax-wrapper {
    overflow: hidden;
}

.parallax-wrapper.scroll .parallax {
    left: 0;
    width: 100%;
}

/* ========================================================================
    Main menu
 ========================================================================== */

.main-menu > .add-new-item,
.close-menu,
.open-menu {
    display: none;
}

.nav-child {
    transition: all .5s ease;
}

.menu.nav {
    margin: 0;
}

.main-menu .nav.menu {
    font-size: 0;
    letter-spacing: 0;
    line-height: 0;
    list-style: none;
    padding-left: 0;
}

.main-menu .nav.menu > li {
    display: inline-block;
    float: none;
    overflow: visible;
    text-decoration: none;
    position: relative;
}

.vertical-menu .main-menu .nav.menu > li {
    overflow: visible;
}

.nav.menu > li > a,
.nav.menu > li > span {
    background: transparent;
    display: block;
}

.nav.menu > li > a:hover,
.nav.menu > li > a:focus {
    background: transparent;
}

.nav-child {
    padding: 0;
    width: 250px;
}

li.deeper > span i.zmdi-caret-right,
li.deeper > a i.zmdi-caret-right {
    color: inherit;
    font-size: inherit;
    line-height: inherit;
    margin: 0 5px;
}

.vertical-menu li.deeper > span i.zmdi-caret-right,
.vertical-menu li.deeper > a i.zmdi-caret-right,
.nav.menu > li li.deeper > span i.zmdi-caret-right,
.nav.menu > li li.deeper > a i.zmdi-caret-right {
    float: right;
}

@-moz-document url-prefix() {
    .nav.menu li.deeper > span i.zmdi-caret-right,
    .nav.menu li.deeper > a i.zmdi-caret-right {
        float: right;
    }

    li.deeper > span i.zmdi-caret-right,
    li.deeper > a i.zmdi-caret-right {
        display: block;
        float: none;
        position: static;
        text-align: right;
    }
}

.deeper.parent .nav-child {
    display: none;
}

.nav > .deeper.parent > .nav-child {
    padding: 0;
    position: absolute;
    z-index: 20;
}

.nav-child li > span,
.nav-child li > a {
    display: block;
    padding: 10px 20px;
}

.nav-child > .deeper {
    position: relative;
}

.nav-child li {
    text-decoration: none;
    list-style: none;
}

.nav-child > .deeper:hover > .nav-child {
    left: 100%;
    position: absolute;
    top: 0px;
}

.megamenu-editing.megamenu-item > .tabs-content-wrapper .ba-section,
.nav li:hover > .tabs-content-wrapper .ba-section,
.nav li.deeper:hover > .nav-child {
    animation-fill-mode: none;
    animation-delay: 0s;
    box-sizing: border-box;
    display: block;
}

li.deeper >span,
li.deeper > a {
    position: relative;
}

.ba-menu-backdrop {
    background: #000;
    bottom: 0;
    display: none;
    left: 0;
    opacity: 0;
    position: fixed;
    right: 0;
    top: 0;
    z-index: 1;
}

.dropdown-left-direction {
    right: 0;
}

.child-dropdown-left-direction,
.dropdown-left-direction ul {
    right: 100%;
    left: auto !important;
}

.dropdown-top-direction {
    transform: translateY(calc( 0px - var(--dropdown-top-diff) - 25px));
    top: auto !important;
}

/* Menu With Icon */
.menu li span i.ba-menu-item-icon,
.menu li a i.ba-menu-item-icon {
    color: inherit;
    line-height: 0;
    margin-right: 10px;
    text-align: center;
    vertical-align: middle;
    width: 1em;
}

/* Megamenu */
.megamenu-item .ba-section {
    max-width: 100%;
}

.ba-menu-wrapper > .tabs-content-wrapper,
.megamenu-item > .tabs-content-wrapper,
.megamenu-item > .nav-child {
    display: none !important;
    z-index: 999;
}

.row-with-megamenu .megamenu-editing.megamenu-item > .tabs-content-wrapper,
.megamenu-item:hover >.tabs-content-wrapper {
    display: block !important;
}

.megamenu-item >.tabs-content-wrapper {
    position: absolute;
    top: 100%;
}

.vertical-menu .megamenu-item >.tabs-content-wrapper.ba-container {
    top: 0;
}

.megamenu-item >.tabs-content-wrapper:not(.ba-container) {
    max-width: none !important;
}

.megamenu-item >.tabs-content-wrapper:not(.ba-container) .ba-section {
    width: 100% !important;
}

.megamenu-item >.tabs-content-wrapper.ba-container:not(.megamenu-center) {
    margin: 0 !important;
}

.megamenu-item >.tabs-content-wrapper.ba-container {
    width: auto !important;
}

.nav-child > .megamenu-item .zmdi-caret-right,
.nav-child > .megamenu-item >.tabs-content-wrapper {
    display: none !important;
}

/* Vertical layout menu */
.vertical-menu .main-menu .nav.menu > li {
    display: block;
    position: relative;
}

.vertical-menu .megamenu-item > .tabs-content-wrapper.ba-container,
.vertical-menu .main-menu .nav.menu > li.deeper.parent>.nav-child {
    margin-left: 100% !important;
}

.vertical-menu .megamenu-item >.tabs-content-wrapper.ba-container.megamenu-center {
    padding: 0 !important;
    top: auto;
}

.vertical-menu .main-menu .nav.menu > li.megamenu-item {
    align-items: center;
    display: flex;
}

.vertical-menu .main-menu .nav.menu > li> span,
.vertical-menu .main-menu .nav.menu > li> a {
    width: 100%;
    box-sizing: border-box;
}

.vertical-menu .main-menu .nav.menu > li .nav-child {
    top: 0;
}

body:not(.gridbox) .ba-item-preloader{
    position: fixed;
    z-index: 99999;
}

body:not(.gridbox) .ba-item-preloader.preloader-animation-out {
    pointer-events: none;
}

/* ========================================================================
    Plugins
 ========================================================================== */

/*
/* Plugin Add To Cart
*/

.ba-item-add-to-cart .ba-add-to-cart-wrapper .ba-add-to-cart-info > div,
.ba-item-add-to-cart .ba-add-to-cart-wrapper > div:not(.ba-add-to-cart-info) {
    display: flex;
}

.ba-item-add-to-cart .ba-add-to-cart-wrapper > .ba-add-to-cart-extra-options {
    flex-direction: column;
}

.ba-item-add-to-cart .ba-add-to-cart-row-label {
    margin-right: 10px;
    position: relative;
    width: 25%;
}

.ba-add-to-cart-quantity {
    align-items: center;
    border: 1px solid var(--border);
    margin-right: 20px;
    padding: 5px;
    position: relative;
}

.ba-add-to-cart-quantity + .ba-btn-transition {
    align-items: center;
    display: flex;
}

.ba-add-to-cart-buttons-wrapper {
    display: flex;
    border-radius: var(--border-radius);
    border-width: var(--border-width);
}

.ba-add-to-cart-buttons-wrapper > span,
.ba-add-to-cart-buttons-wrapper > span:after {
    border-radius: var(--border-radius);
    border-top-left-radius: calc(var(--border-radius) * var(--display-wishlist));
    border-bottom-left-radius: calc(var(--border-radius) * var(--display-wishlist));
}

.ba-add-to-cart-buttons-wrapper a {
    align-items: center;
    border-radius: var(--border-radius);
    border-top-right-radius: calc(var(--border-radius) * var(--display-wishlist));
    border-bottom-right-radius: calc(var(--border-radius) * var(--display-wishlist));
    padding-bottom: var(--padding-bottom);
    padding-left: var(--padding-left);
    padding-right: var(--padding-right);
    padding-top: var(--padding-top);
}

.ba-add-to-cart-buttons-wrapper > span {
    padding-bottom: var(--padding-bottom);
    padding-left: calc((var(--padding-bottom) + var(--padding-top))/2);
    padding-right: calc((var(--padding-bottom) + var(--padding-top))/2);
    padding-top: var(--padding-top);
    cursor: pointer;
    transition: .3s;
    text-decoration: initial !important;
}

.ba-add-to-cart-buttons-wrapper > span i {
    margin-left: 4px;
    z-index: 1;
}

.ba-add-to-wishlist {
    align-items: center;
    justify-content: center;
    position: relative;
}

.ba-add-to-wishlist i {
    font-size: 2em;
    text-align: center;
}

.ba-add-to-cart-buttons-wrapper span:after {
    content: "";
    background: rgba(0, 0, 0, 0.1);
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
}

.disabled .ba-add-to-cart-quantity {
    display: none !important;
}

.disabled .ba-add-to-cart-quantity + .ba-btn-transition {
    opacity: .65;
}

.ba-item-cart .ba-cart-subtotal.right-currency-position {
    flex-direction: row-reverse;
}

.ba-add-to-cart-quantity i:hover {
    opacity: .5;
}

.ba-add-to-cart-quantity i {
    cursor: pointer;
    font-size: 24px;
    padding: 10px;
    text-align: center;
    transition: .3s;
    width: 24px;
}

.ba-add-to-cart-quantity input {
    border: none;
    color: inherit;
    font-family: inherit;
    font-size: inherit;
    font-style: inherit;
    font-weight: normal;
    letter-spacing: inherit;
    margin: 0;
    padding: 0;
    text-align: center;
    width: 30px;
}


.ba-add-to-cart-sale-price-wrapper + .ba-add-to-cart-price-wrapper {
    font-size: 0.5em;
    margin-left: 20px;
    opacity: .5;
    position: relative;
    text-decoration: line-through;
}

.ba-item-add-to-cart .ba-add-to-cart-variations {
    flex-direction: column;
}

.ba-item-add-to-cart .ba-add-to-cart-wrapper > .ba-add-to-cart-extra-options .ba-add-to-cart-extra-option,
.ba-item-add-to-cart .ba-add-to-cart-row-value,
.ba-item-add-to-cart .ba-add-to-cart-variation {
    align-items: center;
    display: flex;
}

.ba-add-to-cart-extra-option,
.ba-add-to-cart-variation {
    margin-bottom: 20px;
}

.ba-item-add-to-cart .ba-add-to-cart-variation[data-type="radio"],
.ba-item-add-to-cart .ba-add-to-cart-variation[data-type="checkbox"],
.ba-item-add-to-cart .ba-add-to-cart-wrapper > .ba-add-to-cart-extra-options .ba-add-to-cart-extra-option[data-type="checkbox"],
.ba-item-add-to-cart .ba-add-to-cart-wrapper > .ba-add-to-cart-extra-options .ba-add-to-cart-extra-option[data-type="radio"] {
    align-items: flex-start;
}

.ba-item-add-to-cart .ba-add-to-cart-row-value {
    flex-wrap: wrap;
    width: 75%;
}

.ba-item-add-to-cart .ba-add-to-cart-row-value[data-type="radio"],
.ba-item-add-to-cart .ba-add-to-cart-row-value[data-type="checkbox"] {
    align-items: flex-start;
    display: flex;
    flex-direction: column;
}

.ba-item-add-to-cart .ba-add-to-cart-row-value[data-type="radio"] .ba-checkbox-wrapper,
.ba-item-add-to-cart .ba-add-to-cart-row-value[data-type="checkbox"] .ba-checkbox-wrapper {
    display: flex;
    flex-direction: row-reverse;
}

.ba-item-add-to-cart .ba-add-to-cart-row-value > span {
    cursor: pointer;
    margin: 10px;
    position: relative;
}

.ba-item-fields-filter .ba-field-filter .ba-filter-image-value .ba-checkbox span,
.ba-item-fields-filter .ba-field-filter .ba-filter-color-value .ba-checkbox span,
.ba-item-add-to-cart .ba-add-to-cart-row-value > span > span:not(.ba-tooltip) {
    background-color: var(--variation-color-value);
    background-image: var(--variation-image-value);
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    border-radius: 30px;
    cursor: pointer;
    display: flex;
    height: 30px;
    overflow: hidden;
    transition: .3s;
    width: 30px;
}

.ba-item-fields-filter .ba-field-filter .ba-filter-image-value .ba-checkbox span {
    background-color: transparent !important;
}

.ba-item-fields-filter .ba-field-filter .ba-filter-image-value,
.ba-item-fields-filter .ba-field-filter .ba-filter-color-value {
    display: inline-block;
    height: 30px;
    margin: 0 20px 0 0;
    position: relative;
    width: 30px;
}

.ba-item-fields-filter .ba-field-filter .ba-filter-image-value .ba-checkbox span,
.ba-item-fields-filter .ba-field-filter .ba-filter-color-value .ba-checkbox span {
    align-items: center;
    border: none !important;
    display: flex;
    justify-content: center;
    top: 0;
    overflow: visible;
}

.ba-item-fields-filter .ba-field-filter .ba-filter-image-value .ba-checkbox input:checked ~ span,
.ba-item-fields-filter .ba-field-filter .ba-filter-color-value .ba-checkbox input:checked ~ span {
    background-color: var(--variation-color-value) ;
    overflow: visible;
}

.ba-item-add-to-cart .ba-add-to-cart-row-value[data-type="image"] > span > span:not(.ba-tooltip) {
    border-radius: 3px;
    height: 50px;
    width: 50px;
}

.ba-item-add-to-cart .ba-add-to-cart-row-value[data-type="tag"] > span:hover {
    border-color: var(--hover);
}

.ba-blog-post-product-options-wrapper .ba-blog-post-product-options[data-type="image"] > span > span:not(.ba-tooltip):hover,
.ba-item-fields-filter .ba-field-filter .ba-filter-color-value .ba-checkbox span:hover,
.ba-item-add-to-cart .ba-add-to-cart-row-value > span > span:not(.ba-tooltip):hover,
.ba-item-add-to-cart .ba-add-to-cart-row-value[data-type="image"] > span > span:not(.ba-tooltip):hover {
    opacity: .75;
}


.ba-blog-post-product-options-wrapper .ba-blog-post-product-options[data-type="color"] > span > span:not(.ba-tooltip):before,
.ba-item-fields-filter .ba-field-filter .ba-filter-image-value .ba-checkbox input[type="checkbox"] ~ span:before,
.ba-item-fields-filter .ba-field-filter .ba-filter-color-value .ba-checkbox input[type="checkbox"] ~ span:before,
.ba-item-add-to-cart .ba-add-to-cart-row-value > span > span:not(.ba-tooltip):before {
    content: "";
    border: 3px solid var(--variation-color-value);
    border-radius: inherit;
    bottom: -5px;
    left: -5px;
    position: absolute;
    right: -5px;
    top: -5px;
    transition: .3s;
}

.ba-item-fields-filter .ba-field-filter .ba-filter-color-value .ba-checkbox input[type="checkbox"] ~ span:before {
    border: none;
}

.ba-item-fields-filter .ba-field-filter .ba-filter-image-value .ba-checkbox input[type="checkbox"] ~ span:before {
    border: 3px solid var(--primary);
    opacity: 1;
}

.ba-item-fields-filter .ba-field-filter .ba-filter-image-value .ba-checkbox input[type="checkbox"] ~ span:before,
.ba-item-fields-filter .ba-field-filter .ba-filter-color-value .ba-checkbox input[type="checkbox"] ~ span:before {
    background: transparent !important;
    animation: none !important;
}

.ba-item-fields-filter .ba-field-filter .ba-filter-image-value .ba-checkbox input[type="checkbox"]:not(:checked) ~ span:before,
.ba-item-fields-filter .ba-field-filter .ba-filter-color-value .ba-checkbox input[type="checkbox"]:not(:checked) ~ span:before,
.ba-item-add-to-cart .ba-add-to-cart-row-value:not([data-type="image"]) > span:not(.active) > span:not(.ba-tooltip):before {
    transform: scale(.8);
}

.ba-blog-post-product-options-wrapper .ba-blog-post-product-options > span:not(:hover) > span:not(.ba-tooltip):before {
    transform: scale(.5);
}

.ba-blog-post:not(.product-option-hovered) .ba-blog-post-product-options-wrapper .ba-blog-post-product-options[data-type="color"] > span.active > span:not(.ba-tooltip):before {
    transform: scale(1);
}

.ba-item-fields-filter .ba-field-filter .ba-filter-image-value .ba-checkbox input[type="checkbox"]:not(:checked) ~ span:before {
    z-index: -1;
    opacity: 0;
}

.ba-item-add-to-cart .ba-add-to-cart-row-value[data-type="tag"] > span:before,
.ba-item-add-to-cart .ba-add-to-cart-row-value[data-type="image"] > span > span:not(.ba-tooltip):before {
    background: #fff;
    border-radius: 50%;
    bottom: auto;
    color: var(--primary);
    content: '\f269';
    font: normal normal normal 24px/20px 'Material-Design-Iconic-Font';
    left: auto;
    opacity: 0;
    right: -7px;
    top: -7px;
    position: absolute;
    transform: scale(.8);
    transition: .3s;
    width: auto;
}

.ba-item-add-to-cart .ba-add-to-cart-row-value[data-type="tag"] > span.active:before,
.ba-item-add-to-cart .ba-add-to-cart-row-value[data-type="image"] > span.active > span:not(.ba-tooltip):before {
    opacity: 1;
    transform: scale(1);
}

.ba-item-add-to-cart .ba-add-to-cart-row-value[data-type="tag"] > span {
    align-items: center;
    border: 2px solid var(--border);
    box-sizing: border-box;
    display: flex;
    line-height: 24px !important;
    padding: 10px 15px;
    transition: .3s;
}

.ba-item-add-to-cart .ba-custom-select ul.visible-select li.disabled,
.ba-item-add-to-cart .ba-add-to-cart-row-value > span.disabled  {
    pointer-events: none;
    overflow: hidden;
}

.ba-item-add-to-cart .ba-custom-select ul.visible-select li.disabled {
    opacity: .25;
}

.ba-item-add-to-cart .ba-add-to-cart-row-value[data-type="tag"] > span.disabled,
.ba-item-add-to-cart .ba-add-to-cart-row-value > span.disabled > span {
    opacity: 0.3;
    overflow: hidden;
}

.ba-item-add-to-cart .ba-add-to-cart-row-value[data-type="color"] > span.disabled {
    border-radius: 50%;
}

.ba-item-add-to-cart .ba-add-to-cart-row-value[data-type="dropdown"],
.ba-item-add-to-cart .ba-add-to-cart-row-value[data-type="tag"],
.ba-item-add-to-cart .ba-add-to-cart-row-value[data-type="image"],
.ba-item-add-to-cart .ba-add-to-cart-row-value[data-type="color"] {
    margin-left: -15px;
}

/* Custom Select */
.ba-item-add-to-cart .ba-custom-select {
    position: relative;
    margin: 0 0 0 10px;
}

.ba-item-add-to-cart .ba-custom-select input {
    border: 1px solid var(--border);
    cursor: pointer !important;
    margin: 0;
    overflow: hidden;
    padding-right: 35px;
    text-overflow: ellipsis;
}

.ba-item-add-to-cart .ba-custom-select ul {
    background: #fff;
    box-shadow: 0 15px 40px rgba(0,0,0,.15);
    box-sizing: border-box;
    left: 0;
    list-style: none;
    margin: 0;
    max-height: 96px;
    opacity: 0;
    overflow-y: auto;
    padding: 0;
    position: absolute;
    top: 0;
    visibility: hidden;
    width: 250px;
    z-index: 2;
}

.ba-item-add-to-cart .ba-custom-select ul li {
    box-sizing: border-box;
    cursor: pointer;
    overflow-y: auto;
    padding: 20px;
    padding-left: 65px;
    position: relative;
}

.ba-item-add-to-cart .ba-custom-select input,
.ba-item-add-to-cart .ba-custom-select ul,
.ba-item-add-to-cart .ba-custom-select ul li {
    color:inherit;
    font-family:inherit;
    font-size: inherit;
    font-weight: inherit;
    letter-spacing: inherit;
    line-height: inherit;
    text-align: inherit;
    text-transform: inherit;
}

@keyframes custom-select {
    0%{ left: 50%; width: 0; max-height: 2px; }
    50%{ left: 0; width: 250px; max-height: 2px; }
    100%{ left:0; width: 250px; max-height: 292px; }
}

.ba-item-add-to-cart .ba-custom-select ul.visible-select {
    animation: custom-select .4s cubic-bezier(.25,.98,.26,.99) both;
    border-radius: 6px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-top: 2px solid var(--primary);
    max-height: none;
    opacity: 1;
    overflow: hidden;
    overflow-y: auto;
    top: 48px;
    visibility: visible;
    z-index: 15;
}

.ba-item-add-to-cart .ba-custom-select ul.visible-select li {
    opacity: 1;
    width: 100%;
}

.ba-item-add-to-cart .ba-custom-select ul li.selected:after {
    border-radius: 3px;
    left: 14px;
    padding: 8px;
    position: absolute;
    text-align: center;
    top: 10px;
    width: 24px;
}

.ba-item-add-to-cart .ba-custom-select ul.visible-select li.selected:after {
    content: '\f26b';
    font: normal normal normal 24px/1 'Material-Design-Iconic-Font';
}

.ba-item-add-to-cart .ba-custom-select .zmdi-caret-down {
    font-size: 23px;
    position: absolute;
    right: 15px;
    top: 12px;
}

.ba-item-add-to-cart .ba-custom-select ul li label {
    margin-left: 15px;
}

.ba-item-add-to-cart .ba-custom-select ul li:not(.selected):before {
    border-radius: 50%;
    border: 2px solid #ddd;
    content: "";
    height: 15px;
    left: 25px;
    position: absolute;
    top: 20px;
    width: 15px;
}

.ba-item-add-to-cart .ba-custom-select ul li:hover {
    background: var(--primary);
    color: var(--title-inverse);
}

.ba-item-add-to-cart .ba-custom-select ul li:hover:before {
    border-color: #fff;
}

.ba-item-add-to-cart .ba-add-to-cart-row-value[data-type="checkbox"] .ba-checkbox,
.ba-item-add-to-cart .ba-add-to-cart-row-value[data-type="radio"] .ba-radio {
    position: relative;
}

.ba-item-add-to-cart .ba-add-to-cart-row-value[data-type="checkbox"] .ba-checkbox input[type="checkbox"],
.ba-item-add-to-cart .ba-add-to-cart-row-value[data-type="radio"] .ba-radio input[type="radio"] {
    display: none;
}

.ba-item-add-to-cart .ba-add-to-cart-row-value[data-type="checkbox"] .ba-checkbox-wrapper > span,
.ba-item-add-to-cart .ba-add-to-cart-row-value[data-type="radio"] .ba-checkbox-wrapper >span {
    align-items: center;
    display: flex;
    justify-content: space-between;
    padding: 0 0 0 40px;
    width: 100%;
}

.ba-item-add-to-cart .ba-add-to-cart-row-value[data-type="radio"] .ba-checkbox-wrapper,
.ba-item-add-to-cart .ba-add-to-cart-row-value[data-type="checkbox"] .ba-checkbox-wrapper {
    width: 100%;
}

.ba-item-add-to-cart .ba-add-to-cart-row-value[data-type="checkbox"] .extra-option-price, 
.ba-item-add-to-cart .ba-add-to-cart-row-value[data-type="radio"] .extra-option-price {
    font-weight: bold;
}

.ba-item-add-to-cart .ba-add-to-cart-row-value[data-type="checkbox"] .ba-checkbox-wrapper:not(:last-child),
.ba-item-add-to-cart .ba-add-to-cart-row-value[data-type="radio"] .ba-checkbox-wrapper:not(:last-child){
    margin-bottom: 10px;
}

.extra-option-price {
    white-space: nowrap !important;
}

.ba-item-add-to-cart .ba-add-to-cart-row-value[data-type="radio"] .ba-radio input[type="radio"]+ span:before,
.ba-item-add-to-cart .ba-add-to-cart-row-value[data-type="radio"] + span:before {
    border-radius: 50%;
    border: 2px solid #757575;
    content: "";
    cursor: pointer;
    display: block;
    height: 18px;
    left: 0;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    transition: all .3s;
    width: 18px;
}

.ba-item-add-to-cart .ba-add-to-cart-row-value[data-type="radio"] .ba-radio input[type="radio"]:checked + span:before {
    background: var(--primary);
    border-radius: 50%;
    border: 2px solid var(--primary);
    box-shadow: inset 0px 0px 0px 3px rgb(245, 245, 245);
    content: "";
    display: block;
    height: 18px;
    left: 0;
    opacity: 1;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 18px;
}

.ba-item-add-to-cart .ba-add-to-cart-row-value[data-type="checkbox"] .ba-checkbox > span {
    border-radius: 3px;
    border: 2px solid #757575;
    box-sizing: border-box;
    display: block;
    height: 20px;
    position: absolute;
    top: calc(50% - 8px);
    width: 20px;
}

.ba-item-add-to-cart .ba-add-to-cart-row-value[data-type="checkbox"] .ba-checkbox input[type="checkbox"]:checked + span:after{
    bottom: 0px;
    color: #fff;
    content: '\f26b';
    display: block;
    font: normal normal normal 16px/16px 'Material-Design-Iconic-Font';
    left: 50%;
    margin-left: -8px;
    position: absolute;
    text-align: center;
    width: 16px;
}

.ba-item-add-to-cart .ba-add-to-cart-row-value[data-type="checkbox"] .ba-checkbox input[type="checkbox"]:checked + span {
    border-color: var(--primary);
    background: var(--primary);
}

@keyframes click-wave {
    0% { left: calc(50% - 10px); bottom: 0px;width: 19px; height: 19px; opacity: 0.35;}
    100% { width: 50px; height: 50px; left: calc(50% - 25px); bottom: -15px; opacity: 0;}
}

.ba-item-add-to-cart .ba-add-to-cart-row-value[data-type="checkbox"] .ba-checkbox input[type="checkbox"]:checked + span:before {
    animation: click-wave 0.65s;
    background: var(--primary);
    border-radius: 50%;
    bottom: 0;
    content: '';
    display: block;
    left: calc(50% - 10px);
    position: absolute;
    z-index: 100;
}

/*
/* Plugin Fields Filter
*/

.ba-item-fields-filter {
    box-sizing: border-box;
}

.ba-item-fields-filter .ba-fields-filter-wrapper .ba-field-filter,
.ba-item-fields-filter .ba-fields-filter-wrapper {
    display: flex;
    flex-direction: column;
}

.ba-item-fields-filter .ba-fields-filter-wrapper:not(.horizontal-filter-bar) .ba-field-filter {
    margin-bottom: 20px;
}

.ba-item-fields-filter .ba-fields-filter-wrapper.horizontal-filter-bar .ba-field-filter-label i {
    margin-left: 5px;
    margin-top: .2em;
}

.ba-item-fields-filter .ba-fields-filter-wrapper.horizontal-filter-bar .ba-field-filter {
    flex-grow: 1;
    margin-right: 45px;
    position: relative;
}

.ba-item-fields-filter .ba-fields-filter-wrapper.horizontal-filter-bar .ba-field-filter-label {
    align-items: center;
    cursor: pointer;
    display: flex;
    justify-content: space-between;
    margin-bottom: 0;
    transition: opacity .3s;
}

.ba-item-checkout-form .ba-checkout-form-field-wrapper .ba-checkbox-wrapper,
.ba-item-fields-filter .ba-fields-filter-wrapper .ba-checkbox-wrapper {
    align-items: flex-start;
    display: flex;
    flex-direction: row-reverse;
}

.ba-item-checkout-form .ba-checkout-form-field-wrapper .ba-checkbox-wrapper,
.ba-item-fields-filter .ba-fields-filter-wrapper .ba-checkbox-wrapper {
    margin-bottom: 10px;
}

.ba-item-fields-filter .ba-field-filter-label {
    align-items: center;
    display: flex;
    justify-content: space-between;
    margin-bottom: 15px;
}

.ba-item-fields-filter .ba-field-filter-label span {
    width: 100%;
}

.ba-item-fields-filter .ba-selected-filter-values-wrapper {
    margin-bottom: 20px;
}

.ba-item-fields-filter .horizontal-filter-bar .ba-selected-filter-values-wrapper {
    align-items: baseline;
    display: flex;
    width: 100%;
}

.ba-checkout-form-field-wrapper .ba-checkbox,
.ba-item-fields-filter .ba-field-filter .ba-checkbox {
    position: relative;
    display: inline;
}

.ba-checkout-authentication-checkbox input[type="checkbox"],
.ba-checkout-form-field-wrapper .ba-checkbox input[type="checkbox"],
.ba-item-fields-filter .ba-fields-filter-wrapper:not(.horizontal-filter-bar):not(.ba-collapsible-filter) .ba-field-filter-label i,
.ba-item-fields-filter .ba-field-filter .ba-checkbox input[type="checkbox"],
.ba-field-filter-value-wrapper:not(.visible-filters-value) .ba-hide-filters,
.ba-field-filter-value-wrapper.visible-filters-value  .ba-show-all-filters,
.ba-field-filter-value-wrapper:not(.visible-filters-value) .ba-checkbox-wrapper:nth-child(10) ~ .ba-checkbox-wrapper {
    display: none;
}

.ba-item-fields-filter .ba-fields-filter-wrapper:not(.horizontal-filter-bar) .ba-field-filter-label {
    cursor: pointer;
}

.ba-item-fields-filter .ba-fields-filter-wrapper:not(.horizontal-filter-bar) .ba-field-filter-label i {
    float: right;
    transition: .3s;
}

.ba-item-fields-filter .ba-fields-filter-wrapper:not(.horizontal-filter-bar) .ba-field-filter.ba-filter-icon-rotated .ba-field-filter-label i {
    transform: rotate(45deg);
}

.ba-item-fields-filter .ba-fields-filter-wrapper:not(.horizontal-filter-bar) .ba-field-filter-label i:before {
    content: '\f136';
}

.ba-fields-filter-wrapper.horizontal-filter-bar .ba-checkbox-wrapper:nth-child(10) ~ .ba-checkbox-wrapper {
    display: flex !important;
}

.ba-field-filter-value-wrapper:not(.visible-filters-value) .ba-checkbox-wrapper:nth-child(10),
.ba-field-filter-value-wrapper.visible-filters-value .ba-checkbox-wrapper:last-child {
    margin-bottom: 0;
}

.ba-fields-filter-wrapper.horizontal-filter-bar .ba-checkbox-wrapper:nth-child(10) {
    margin-bottom: 10px!important;
}

.ba-selected-filter-values-remove-all span,
.ba-hide-filters,
.ba-show-all-filters {
    cursor: pointer;
    font-size: .8em !important;
    font-weight: bold !important;
    transition: opacity .3s;
}

.ba-selected-filter-values-remove-all span {
    font-size: inherit !important;
}

.ba-cart-checkout-promo-code .ba-activated-promo-code .zmdi-close:hover,
.ba-item-fields-filter .ba-fields-filter-wrapper.horizontal-filter-bar .ba-field-filter-label:hover,
.ba-item-fields-filter .zmdi-close:hover,
.ba-selected-filter-values-remove-all span:hover,
.ba-hide-filters:hover,
.ba-show-all-filters:hover {
    opacity: .5
}

.ba-selected-filter-values-title {
    display: block;
}

.ba-selected-filter-values-body {
    margin-top: 10px;
}

.ba-item-fields-filter .ba-field-filter .ba-checkbox input ~ span {
    top: calc(var(--filter-value-line-height)/2 - 10px);
}

.ba-item-fields-filter .ba-field-filter[data-id="rating"] .ba-checkbox input ~ span {
    top: 2px;
}

.ba-checkout-acceptance-html,
.ba-checkout-form-fields .ba-checkbox-wrapper > span,
.ba-item-fields-filter .ba-checkbox-wrapper > span {
    background: transparent !important;
    border: none !important;
    cursor: pointer;
    margin: 0;
    min-width: 0;
    padding: 0 0 0 30px;
    width: auto;
}

.ba-checkout-acceptance-html {
    padding: 0 0 0 20px;
}

.ba-item-fields-filter .ba-checkbox-wrapper > span.ba-filter-rating {
    display: flex;
}

.ba-item-fields-filter .ba-field-filter-value-wrapper select {
    color: inherit;
}

.ba-checkout-authentication-checkbox .ba-checkbox span,
.ba-checkout-form-field-wrapper .ba-checkbox span,
.ba-item-fields-filter .ba-field-filter .ba-checkbox span {
    border-radius: 3px;
    border: 2px solid #757575;
    box-sizing: border-box;
    display: block;
    height: 20px;
    top: 8px;
    position: absolute;
    width: 20px;
}

.ba-checkout-form-field-wrapper .ba-checkbox span {
    top: 50%;
    transform: translateY(-50%);
}

.ba-checkout-form-field-wrapper .ba-checkbox {
    position: absolute;
    top: calc(var(--field-line-height)/2 );
    left: 0;
}

.ba-checkout-form-fields[data-type="headline"],
.ba-checkout-form-fields[data-type="acceptance"] {
    margin: 10px 0;
}

.ba-checkout-form-fields[data-type="headline"] {
    margin-top: 30px;
}

.ba-checkout-form-fields[data-type="acceptance"] .ba-checkout-form-field-wrapper {
    align-items: center;
    display: flex;
}

.ba-checkout-form-fields[data-type="acceptance"] .ba-checkout-form-field-wrapper .acceptance-checkbox-wrapper {
    height: 0;
    width: 20px;
}

.ba-checkout-form-fields[data-type="acceptance"] .ba-checkout-form-field-wrapper .acceptance-checkbox-wrapper .ba-checkbox {
    top: 0;
}

@keyframes click-wave {
    0% { left: -1px; top: -1px;width: 19px; height: 19px; opacity: 0.35;}
    100% { width: 50px; height: 50px; left: -17px; top: -17px; opacity: 0;}
}

.ba-checkout-authentication-checkbox .ba-checkbox input[type="checkbox"]:checked ~ span:before,
.ba-checkout-order-form-row.ba-checkout-order-form-shipping .ba-radio input[type="radio"]:checked + span:after,
.ba-checkout-order-form-row.ba-checkout-order-form-payment .ba-radio input[type="radio"]:checked + span:after,
.ba-checkout-order-form-row.ba-checkout-order-form-payment .ba-radio input[type="radio"]:checked + span:after,
.ba-checkout-form-field-wrapper .ba-radio input[type="radio"]:checked + span:after,
.ba-checkout-form-field-wrapper .ba-checkbox input[type="checkbox"]:checked ~ span:before,
.ba-item-fields-filter .ba-field-filter .ba-checkbox input[type="checkbox"]:checked ~ span:before {
    animation: click-wave 0.65s;
    background: var(--primary);
    border-radius: 50%;
    content: '';
    display: block;
    position: absolute;
    z-index: 100;
}

@keyframes click-wave-radio {
    0% { left: -10px; top: -10px;width: 19px; height: 19px; opacity: 0.35;}
    100% { width: var(--field-line-height); height: var(--field-line-height); left: -25px; top: -25px; opacity: 0;}
}

.ba-checkout-form-field-wrapper .ba-radio input[type="radio"]:checked + span:after{
    animation: click-wave-radio 0.65s;
}

@keyframes click-wave-radio-shipping {
    0% { left: 16px;top: calc(var(--field-line-height)/2 - 9px);width: 19px; height: 19px; opacity: 0.35;}
    100% {width: calc(var(--field-line-height)*1.5);height: calc(var(--field-line-height)*1.5);left: calc(25px - (var(--field-line-height)*1.5)/2);top: calc( var(--field-line-height)/2 - (var(--field-line-height)*1.5)/2);opacity: 0;}
}

.ba-checkout-order-form-row.ba-checkout-order-form-shipping .ba-radio input[type="radio"]:checked + span:after,
.ba-checkout-order-form-row.ba-checkout-order-form-payment .ba-radio input[type="radio"]:checked + span:after {
    animation: click-wave-radio-shipping 0.65s;
}

.ba-checkout-authentication-checkbox .ba-checkbox input[type="checkbox"] + span:after,
.ba-checkout-form-field-wrapper .ba-checkbox input[type="checkbox"] + span:after,
.ba-item-fields-filter .ba-field-filter .ba-checkbox input[type="checkbox"] + span:after,
.ba-item-fields-filter .ba-field-filter .ba-checkbox input[type="checkbox"]:checked + span:after {
    color: #fff;
    content: '\f26b';
    display: block;
    font: normal normal normal 16px/16px 'Material-Design-Iconic-Font';
    letter-spacing: 0;
    text-align: center;
    transition: .3s;
    will-change: transform;
}

.ba-checkout-authentication-checkbox .ba-checkbox input[type="checkbox"]:not(:checked) + span:after,
.ba-checkout-form-field-wrapper .ba-checkbox input[type="checkbox"]:not(:checked) + span:after,
.ba-item-fields-filter .ba-field-filter .ba-checkbox input[type="checkbox"]:not(:checked) + span:after {
    opacity: 0;
    transform: scale(.8);
}

.ba-checkout-authentication-checkbox .ba-checkbox input:checked ~ span,
.ba-checkout-form-field-wrapper .ba-checkbox input:checked ~ span,
.ba-item-fields-filter .ba-field-filter .ba-checkbox input:checked ~ span {
    border-color: var(--primary);
    background: var(--primary);
}

.ba-item-fields-filter .ba-field-filter .ba-filter-image-value .ba-checkbox input:checked ~ span {
    background: var(--variation-image-value);
    background-position: center;
    background-size: contain;
}

.ba-item-fields-filter .ba-field-filter .ba-filter-image-value .ba-checkbox input:checked ~ span:after {
    display: none;
}

.ba-label-position-left .field-price-currency {
    margin-right: 5px;
}

.ba-field-wrapper:not(.ba-label-position-left) .field-price-currency {
    margin-left: 5px;
}

.ba-items-filter-show-button {
    animation: tooltip .3s ease-in-out both!important;
    cursor: pointer;
    font-size: 14px;
    font-weight: bold;
    line-height: 24px;
    padding: 15px;
    position: absolute;
    text-transform: none;
    white-space: nowrap;
}

.ba-items-filter-show-button.horizontal-filter-tooltip {
    cursor: default;
}

.ba-items-filter-show-button:before {
    border: 5px solid transparent;
    border-right: 5px solid #2c2c2c;
    bottom: calc(50% - 4px);
    content: "";
    height: 0;
    left: 0 !important;
    margin-left: -9px;
    position: absolute;
    top: auto;
}

.ba-items-filter-show-button.filter-top-button:before {
    border-right: 5px solid transparent;
    border-top: 5px solid #2c2c2c;
    bottom: -10px;
    content: "";
    left: calc(50% - 4px) !important;
    margin-left: 0;
}

.ba-cart-checkout-promo-code .ba-activated-promo-code,
.ba-item-fields-filter .ba-selected-filter-values {
    align-items: center;
    background: var(--primary);
    border-radius: 50px;
    color: #fff;
    display: inline-flex;
    font-size: 14px;
    line-height: 36px;
    margin: 0 10px 10px 0;
    padding: 0 8px 0 15px;
    vertical-align: middle;
    white-space: nowrap;
}

.ba-cart-checkout-promo-code .ba-activated-promo-code {
    align-items: center;
    display: flex;
    font-weight: 400;
}

.ba-item-fields-filter .ba-selected-filter-value {
    font-weight: bold;
    margin-left: 5px;
    pointer-events: none;
}

.ba-cart-checkout-promo-code .ba-activated-promo-code .zmdi-close,
.ba-item-fields-filter .zmdi-close {
    background: #ffffff;
    border-radius: 50%;
    color: var(--primary);
    cursor: pointer;
    font-size: 16px;
    line-height: 14px;
    letter-spacing: 0;
    margin-left: 10px;
    padding: 5px;
    text-align: center;
    transition: opacity .3s;
    vertical-align: middle;
    width: 14px;
}

 .ba-item-fields-filter .ba-fields-filter-wrapper.horizontal-filter-bar {
    align-items: center;
    flex-direction: row;
    justify-content: space-between;
    flex-wrap: wrap;
}

.horizontal-filter-bar .ba-selected-filter-values-wrapper .ba-selected-filter-values-title,
.ba-fields-filter-wrapper:not(.horizontal-filter-bar ) .ba-items-filter-search-button,
.horizontal-filter-bar .ba-field-filter-value-wrapper,
.horizontal-filter-bar .ba-show-all-filters,
.horizontal-filter-bar .ba-hide-filters {
    display: none;
}

.horizontal-filter-bar .ba-selected-values-wrapper {
    align-items: baseline;
    display: flex;
    order: 200;
    width: 100%;
}

.horizontal-filter-bar .ba-selected-filter-values-wrapper .ba-selected-filter-values-body {
    flex-grow: 1;
}

.horizontal-filter-bar .ba-selected-filter-values-wrapper .ba-selected-filter-values-remove-all {
    white-space: nowrap;
}

.visible-horizontal-filters-value .ba-field-filter-value-wrapper {
    animation: visible-horizontal-filters .3s both;
    background: #fff;
    border-radius: 6px;
    box-shadow: 0 15px 40px rgba(0,0,0,.15);
    box-sizing: border-box;
    display: block;
    max-height: 350px;
    opacity: 1;
    overflow-x: hidden;
    overflow-y: auto;
    padding: 30px;
    position: absolute;
    bottom: 0;
    transform: translateY(100%);
    visibility: visible;
    width: 300px;
    z-index: 25;
}

.visible-horizontal-filters .visible-horizontal-filters-row {
    z-index: 10;
}

.ba-items-filter-search-button {
    background: var(--primary);
    border-radius: 3px;
    color: #fff !important;
    cursor: pointer;
    font-weight: bold !important;
    letter-spacing: 0px !important;
    line-height: initial !important;
    order: 100;
    padding: 15px 40px;
    transition: all .3s;
}

.ba-item-fields-filter .ba-field-filter-input-wrapper {
    align-items: center;
    display: flex;
    padding-top: 25px;
}

.ba-item-fields-filter .ba-field-filter-input-wrapper input {
    font-size: inherit;
    font-weight: inherit;
    letter-spacing: inherit;
    line-height: inherit;
    margin: 0;
    min-width: 0;
    width: auto;
}

.ba-item-fields-filter .ba-field-filter-price-delimiter {
    margin: 0 10px
}

.ba-item-fields-filter .ba-field-filter-price-symbol {
    margin-right: 10px;
    white-space: nowrap;
}

.ba-item-fields-filter .ba-field-filter-range-wrapper {
    position: relative;
    width: 100%;
}

.ba-item-fields-filter .visible-horizontal-filters-value .ba-field-filter-range-wrapper {
    margin-top: 10px;
}

.ba-item-fields-filter .ba-field-filter-range-wrapper .price-range-track {
    background-color: #757575;
    cursor: pointer;
    height: 4px;
    outline: 0;
    position: absolute;
    width: 100%;
}

.ba-item-fields-filter .ba-field-filter-range-wrapper .price-range-selection {
    background: var(--primary) !important;
    position: absolute;
    height: 4px;
}

.ba-item-fields-filter .ba-field-filter-range-wrapper .price-range-handle {
    background-color: var(--primary) !important;
    border-radius: 24px;
    box-shadow: 0 2px 6px 0 rgba(0, 0, 0, 0.15);
    cursor: pointer;
    height: 24px;
    margin-left: 0;
    margin-top: -11px;
    position: absolute;
    width: 24px;
}

.ba-item-fields-filter .ba-field-filter-range-wrapper .price-range-handle + .price-range-handle {
    margin-left: -18px;
}

.ba-item-fields-filter .ba-field-filter-range-wrapper .price-range-handle:before {
    background: var(--primary);
    border-radius: 24px;
    content: "";
    cursor: pointer;
    height: 24px;
    left: 0;
    opacity: .3;
    position: absolute;
    transform: scale(1);
    transition: transform .2s linear;
    width: 24px;
}

.ba-item-fields-filter .ba-field-filter-range-wrapper .price-range-handle:hover:before {
    transform: scale(2);
}

.open-responsive-filters {
    display: none;
}

.ba-field-filter.ba-filter-collapsed {
    --filter-value-height: 0;
}

.ba-fields-filter-wrapper:not(.horizontal-filter-bar) .ba-field-filter[data-id="price"] .ba-field-filter-value-wrapper {
    padding: 0 10px;
}

.ba-fields-filter-wrapper.ba-collapsible-filter:not(.horizontal-filter-bar) .ba-field-filter[data-id="price"] .ba-field-filter-value-wrapper .ba-field-filter-value {
    padding-top: 15px;
}

.ba-field-filter:not(.horizontal-filter-bar) .ba-field-filter-value-wrapper {
    transition: .3s;
}

.ba-fields-filter-wrapper:not(.horizontal-filter-bar) .ba-field-filter.ba-filter-collapsed .ba-field-filter-value-wrapper {
    height: var(--filter-value-height);
    overflow: hidden;
}

/*
/* Plugin Event Calendar
*/
.ba-event-calendar-row,
.ba-event-calendar-header {
    display: flex;
}

.ba-event-calendar-header {
    margin: 25px 0;
}

.ba-event-calendar-row > div,
.ba-event-calendar-header  > div {
    cursor: default;
    flex-grow: 1;
    min-width: calc(100% / 7);
    text-align: center;
}

.ba-event-calendar-header > div,
.ba-event-calendar-row > div {
    margin: 1px;
}

.ba-event-calendar-title-wrapper {
    align-items: center;
    display: flex;
    justify-content: center;
}

.ba-event-calendar-title-wrapper i {
    cursor: pointer;
    font-size: 1em;
    padding: 0 1em;
    transition: color .3s linear;
}

.ba-event-calendar-title-wrapper i:hover {
    color: var(--primary);
}

.ba-date-cell.ba-event-date {
    cursor: pointer;
    position: relative;
}

.ba-date-cell.ba-curent-date {
    position: relative;
    z-index: 0;
}

.ba-date-cell.ba-event-date,
.ba-date-cell.ba-curent-date {
    font-weight: 700 !important;
}

.ba-date-cell.ba-event-date:after,
.ba-date-cell.ba-curent-date:before {
    background-color: var(--primary);
    bottom: 0;
    content: "";
    height: 4px;
    left: 0;
    position: absolute;
    width: 100%;
    z-index: -1;
    transition: background-color .3s linear;
}

.ba-date-cell.ba-event-date {
    color: var(--title-inverse) !important;
}

.ba-date-cell.ba-curent-date.ba-event-date:before {
    background-color: var(--title-inverse) !important;
    z-index: 1;
    left: 2px;
    right: 2px;
    width: auto;
    bottom: 2px;
}

.ba-date-cell.ba-event-date:after {
    height: auto;
    right: 0;
    top: 0;
}

@keyframes calendar {
    from { opacity: 0;}
    to { opacity: 1;}
}

.event-calendar-events-list.ba-list-layout,
.event-calendar-events-list {
    animation: calendar .3s both;
    background: #2c2c2c;
    border-radius: 6px;
    box-shadow: 0 30px 60px 0 rgba(0, 0, 0, 0.15);
    box-sizing: border-box;
    opacity: 0;
    position: absolute;
    width: 375px;
    z-index: 99999;
}

.event-calendar-events-list .event-calendar-row-wrapper {
    box-sizing: border-box;
    max-height: 400px;
    overflow-y: auto;
    padding: 25px;
}

.event-calendar-events-list:after {
    border: 10px solid transparent;
    border-top-color: #2c2c2c;
    bottom: -19px;
    content: "";
    display: block;
    height: 0;
    left: calc(50% - 10px);
    position: absolute;
    width: 0px;
}

.event-calendar-event-item > span {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    width: calc(375px - 150px);
}

.event-calendar-event-item {
    display: flex;
}

.event-calendar-event-item ~ .event-calendar-event-item {
    margin-top: 25px;
}

.event-calendar-event-item-title {
    color: #fff;
    display: inline-block;
    font-size: 16px;
    font-weight: 700;
    line-height: 24px;
    margin-bottom: 10px;
    width: 100%;
}

.event-calendar-events-list.ba-list-layout .event-calendar-event-item-image-wrapper + .event-calendar-event-item-content {
    display: flex;
    flex-direction: column;
    width: calc(100% - 100px);
}

.event-calendar-event-item-content > div p,
.event-calendar-event-item-content > div,
.event-calendar-event-item-content > div a,
.event-calendar-event-item-date,
.event-calendar-event-item-category {
    color: #fff;
    font-size: 12px;
    font-weight: 500;
    letter-spacing: 0;
    line-height: 24px;
    text-transform: none;
}

.event-calendar-event-item-fields-wrapper .ba-blog-post-field-value a {
    margin-right: 5px;
    margin-bottom: 5px;
    padding: 3px 7px;
    background: #c1c1c11c;
    border-radius: 20px;
    display: inline-block;
}

.event-calendar-event-item-reviews .ba-blog-post-rating-stars {
    font-size: 14px;
}

.event-calendar-event-item-comments {
    display: block;
}

.event-calendar-event-item-reviews,
.ba-blog-post-field-row {
    display: flex;
    justify-content: space-between;
}

.ba-blog-post-field-row .ba-blog-post-field-title {
    padding-right: 10px;
    min-width: 25%;
}

.ba-blog-post-field-row .ba-blog-post-field-checkbox-value {
    display: inline-block;
    padding-left: 5px;
}

.event-calendar-event-item-content > div a:hover,
.event-calendar-event-item-title:hover,
.event-calendar-event-item-category:hover {
    color: rgba(255, 255, 255, 0.5);
}

.event-calendar-event-item-content .event-calendar-event-item-button-wrapper a:hover {
    background: var(--hover);
    color: #fff;
}

.event-calendar-event-item-category,
.event-calendar-event-item-title {
    transition: color .3s ease-in-out;
}

.event-calendar-event-item-info-wrapper > *:not(:first-child):before {
    margin: 0 10px;
    content: "\2022";
    color: inherit;
}

.event-calendar-event-item-button-wrapper {
    text-align: left;
    margin-top: 15px;
}

.event-calendar-event-item-reviews,
.event-calendar-event-item-fields-wrapper {
    margin-top: 15px;
}

.event-calendar-event-item-author a {
    align-items: center;
    display: flex;
}

.event-calendar-event-item-button-wrapper a {
    background: var(--primary);
    color: #fff;
    border-radius: 3px;
    display: inline-flex;
    padding: 10px 20px;
}

.event-calendar-event-item-info-wrapper {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
}

.event-calendar-event-item-author .ba-author-avatar {
    background-size: contain;
    border-radius: 50%;
    display: inline-block;
    height: 30px;
    margin-bottom: 5px;
    margin-right: 15px;
    width: 30px;
}

.event-calendar-events-list > i {
    color: var(--title-inverse);
    font-size: 24px;
    cursor: pointer;
    padding: 10px;
    position: absolute;
    right: 0;
    text-align: center;
    top: 0;
    width: 1em;
}

.ba-item-field-group .ba-field-content a.fields-post-tags,
.ba-item-field .ba-field-content a.fields-post-tags {
    display: inline-block;
    margin-right: 5px;
    text-transform: capitalize;
}

.event-calendar-events-list.ba-card-layout .event-calendar-event-item {
    flex-direction: column;
}

.event-calendar-events-list.ba-card-layout .event-calendar-event-item-image-wrapper {
    margin-right: 0;
}

.event-calendar-events-list.ba-list-layout .event-calendar-event-item-image-wrapper > div,
.event-calendar-events-list.ba-list-layout .event-calendar-event-item-image-wrapper {
    max-width: 75px;
}

.event-calendar-event-item-image-wrapper {
    margin-right: 25px;
}

.event-calendar-event-item-image-wrapper > div {
    min-width: 75px;
    position: relative;
}

.event-calendar-event-item-image-wrapper > div img {
    opacity: 0;
}

.event-calendar-event-item-image-wrapper > div a {
    bottom: 0;
    left: 0;
    position: absolute;
    right: 0;
    top: 0;
    z-index: 1;
}

.event-calendar-event-item-image {
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    border-radius: 3px;
    display: block;
    height: auto;
    margin-right: 25px;
    max-width: 75px;
    width: 100%;
}

.event-calendar-events-list.ba-card-layout .event-calendar-event-item-image {
    background-position: center;
    background-size: cover;
    border-radius: 0;
    margin-bottom: 10px;
    margin-right: 0;
    min-width: 100%;
    padding-top: 56%;
    position: static;
    width: 100%;
}

.event-calendar-events-list.ba-card-layout img {
    display: none;
}

/*
/* Plugin Field
*/

.ba-item-field-group  .ba-field-wrapper,
.ba-item-field .ba-field-wrapper {
    align-items: center;
    flex-direction: column;
    display: flex;
}

.ba-item-field-group .ba-field-wrapper:not(.ba-label-position-left ):not(.ba-label-position-right ) > *,
.ba-item-field .ba-field-wrapper:not(.ba-label-position-left ):not(.ba-label-position-right ) > * {
    width: 100%
}

.ba-item-field-group .ba-field-wrapper.ba-label-position-left,
.ba-item-field .ba-field-wrapper.ba-label-position-left {
    align-items: flex-start;
    flex-direction: row;
}

.ba-item-field-group .ba-field-wrapper.ba-label-position-right .ba-field-label,
.ba-item-field .ba-field-wrapper.ba-label-position-right .ba-field-label,
.ba-item-field-group .ba-field-wrapper.ba-label-position-left .ba-field-label,
.ba-item-field .ba-field-wrapper.ba-label-position-left .ba-field-label {
    flex-wrap: nowrap;
    display: flex;
}

.ba-item-field-group .ba-field-wrapper.ba-label-position-left .ba-field-label,
.ba-item-field .ba-field-wrapper.ba-label-position-left .ba-field-label {
    text-align: left !important;
}

.ba-item-field-group .ba-field-wrapper.ba-label-position-right .ba-field-label,
.ba-item-field .ba-field-wrapper.ba-label-position-right .ba-field-label {
    text-align: right !important;
}

.ba-item-field-group .ba-field-wrapper.ba-label-position-right,
.ba-item-field .ba-field-wrapper.ba-label-position-right {
    flex-direction: row-reverse;
}

.ba-item-field-group .ba-field-wrapper .ba-field-content > span,
.ba-item-field .ba-field-wrapper .ba-field-content > span {
    display: block;
}

.ba-item-field-group .ba-field-wrapper .ba-field-content ,
.ba-item-field .ba-field-wrapper .ba-field-content {
    backface-visibility: visible !important;
    flex-grow: 1;
}

.ba-item-field-group .ba-field-wrapper .field-description-wrapper,
.ba-item-field .ba-field-wrapper .field-description-wrapper {
    margin-left: 5px;
    position: relative;
}

.ba-item-field-group .ba-field-wrapper .field-description-wrapper > i,
.ba-item-field .ba-field-wrapper .field-description-wrapper > i {
    color: inherit !important;
    font-size: inherit !important;
    transition: opacity .3s linear;
}

.ba-item-field-group .ba-field-wrapper .field-description-wrapper > i:hover,
.ba-item-field .ba-field-wrapper .field-description-wrapper > i:hover {
    opacity: .5
}

.ba-item-field-group .ba-field-content a,
.ba-item-field .ba-field-content a {
    transition: color .3s linear
}

.ba-blog-post-fields .ba-blog-post-field-title,
.ba-item-blog-posts .ba-blog-post-field-title,
.ba-item-field-group .ba-field-wrapper.ba-label-position-left .ba-field-label,
.ba-item-field .ba-field-wrapper.ba-label-position-left .ba-field-label {
    margin-right: 10px;
}

.ba-item-field-group .ba-field-wrapper.ba-label-position-right .ba-field-label,
.ba-item-field .ba-field-wrapper.ba-label-position-right .ba-field-label {
    margin-left: 10px;
}

.ba-item-field-group .ba-field-wrapper .ba-field-label > *,
.ba-item-field .ba-field-wrapper .ba-field-label > * {
    display: inline-block;
}

.ba-item-field-group .ba-field-wrapper .ba-field-label > i,
.ba-item-field .ba-field-wrapper .ba-field-label > i {
    line-height: initial;
    margin-right: 10px;
    vertical-align: middle;
}

.ba-item-field-group .ba-field-wrapper .ba-field-content > span.field-price-wrapper.right-currency-position,
.ba-item-field .ba-field-wrapper .ba-field-content > span.field-price-wrapper.right-currency-position {
    display: inline-flex;
    flex-direction: row-reverse;
}

.ba-blog-post-fields .ba-blog-post-field-row-wrapper {
    display: flex;
    flex-direction: column;
}

.ba-blog-post-fields .ba-blog-post-field-value {
    flex-grow: 1;
    text-align: right;
}

.ba-blog-post-fields .ba-blog-post-field-value .ba-blog-post-field-checkbox-value{
    display: flex;
    justify-content: flex-end;
}

.ba-blog-post-fields .ba-blog-post-field-title {
    word-break: normal;
}

.ba-blog-post-field-title:empty {
    display: none;
}

/*
/* Plugin Comments Box
*/

.comment-clipboard {
    position: fixed !important;
    left: -300vh;
}

.ba-comments-login-wrapper > * {
    display: inline-block;
}

.ba-comments-login-wrapper {
    justify-content: space-between;
    position: relative;
}

.ba-comments-login-wrapper + .ba-review-rate-wrapper,
.ba-comments-login-wrapper {
    align-items: center;
    display: flex;
    margin-bottom: 25px;
}

.ba-submit-cancel,
.delete-comment-attachment-file,
.ba-guest-login-btn,
.ba-user-login-btn,
.ba-comments-attachment-file-wrapper i,
.ba-comment-smiles-picker,
.ba-comments-login-wrapper > div > i {
    cursor: pointer;
}

.comment-reply-form-wrapper .ba-submit-comment-wrapper,
.ba-leave-review-box-wrapper .ba-submit-comment-wrapper,
.user-comment-wrapper.user-comment-edit-enable .ba-submit-comment-wrapper,
.ba-submit-comment,
.ba-guest-login-wrapper {
    float: right;
}

.user-comment-wrapper.user-comment-edit-enable .ba-submit-comment {
    float: none;
    white-space: nowrap;
}

.comment-reply-form-wrapper .ba-submit-comment-wrapper,
.ba-leave-review-box-wrapper .ba-submit-comment-wrapper,
.user-comment-wrapper.user-comment-edit-enable .ba-submit-comment-wrapper {
    align-items: center;
    display: flex;
}

.ba-leave-review-box-wrapper .ba-submit-cancel,
.comment-reply-form-wrapper .ba-submit-cancel,
.user-comment-wrapper.user-comment-edit-enable .ba-submit-cancel {
    margin-right: 15px;
    padding: 15px 0;
    transition: .3s;
    white-space: nowrap;
}

.ba-guest-login-wrapper i {
    font-size: 24px;
    margin-right: 10px;
    vertical-align: middle;
}

.ba-user-login-wrapper {
    margin-right: 15px;
}

.ba-guest-login-wrapper,
.ba-user-login-wrapper,
.ba-social-login-wrapper {
    align-items: center;
    display: inline-flex;
    font-size: initial;
    height: 50px;
    letter-spacing: initial;
    line-height: initial;
    margin-top: 10px;
}

.ba-submit-comment {
    background: var(--primary);
    border-radius: 3px;
    color: #fff !important;
    padding: 15px 40px;
    transition: color .3s
}

.ba-social-login-wrapper > span {
    padding-right: 20px;
}

.ba-user-login-btn {
    padding-left: 20px;
    transition: color .3s;
}

.ba-items-filter-search-button:hover,
.ba-submit-comment:hover {
    background: #3c3c3c !important;
}

.ba-item-reviews .ba-comment-message,
.ba-item-comments-box .ba-comment-message {
    margin-bottom: 15px;
    min-height: 150px;
    outline: none !important;
    padding: 15px !important;
    resize: vertical;
    width: 100% !important;
}

.ba-item-reviews .ba-comment-message::placeholder,
.ba-item-comments-box .ba-comment-message::placeholder {
    opacity: .5;
}

.ba-item-reviews .ba-comments-attachment-file-wrapper {
    align-items: center;
    cursor: pointer;
    display: flex;
    justify-content: center;
    transition: .3s;
}

.ba-comment-message-wrapper {
    line-height: initial;
    margin-bottom: 75px;
}

.ba-comments-total-count-wrapper {
    align-items: center;
    display: flex;
    justify-content: space-between;
    margin: 0 0 25px;
    overflow: hidden;
    position: relative;
}

.ba-comments-be-first-message {
    display: flex;
    flex-grow: 1;
    justify-content: center;
}

.blog-posts-sorting-wrapper select,
.ba-comments-total-count-wrapper select {
    background: transparent!important;
    border-radius: 0!important;
    border: none!important;
    font-weight: bold !important;
    height: auto;
    padding: 0;
    width: auto;
}

/* Smiles Picker */
.ba-comment-smiles-picker-dialog {
    backface-visibility: hidden;
    background: #2c2c2c;
    border-radius: 6px;
    box-shadow: 0 15px 40px rgba(0,0,0,.15);
    box-sizing: border-box;
    display: none;
    position: absolute;
    width: 350px;
    z-index: 1050;
}

.ba-comment-smiles-picker-dialog .ba-comment-smiles-picker-body {
    height: 155px;
    overflow-y: auto;
    padding: 15px 20px;
}

.ba-comment-smiles-picker-dialog:before {
    border: 5px solid transparent;
    border-bottom: 5px solid #2f3243;
    top: -15px;
    content: "";
    left: 170px !important;
    position: absolute;
    height: 5px;
}

.ba-comment-smiles-picker-dialog span {
    align-items: center;
    backface-visibility: hidden;
    box-sizing: border-box;
    color: #fff;
    cursor: pointer;
    display: inline-flex;
    font-size: 24px;
    height: 48px;
    justify-content: center;
    padding: 4px;
    text-align: center;
    width: 48px;
}

@keyframes smiles-picker-in {
    from {transform: scale(.8); opacity: 0;}
    to {transform: scale(1); opacity: 1;}
}

.ba-comment-smiles-picker-dialog {
    display: none;
}

.ba-comment-smiles-picker-dialog.visible-smiles-picker {
    animation: smiles-picker-in .3s cubic-bezier(0.4,0,0.2,1) both;
    backface-visibility: hidden;
    display: block;
    opacity: 0;
}

.ba-live-search-results .ba-live-search-body::-webkit-scrollbar,
.ba-wishlist-products-list::-webkit-scrollbar,
.ba-cart-products-list::-webkit-scrollbar,
.event-calendar-events-list .event-calendar-row-wrapper::-webkit-scrollbar,
.ba-comment-smiles-picker-dialog .ba-comment-smiles-picker-body::-webkit-scrollbar {
    width: 6px;
}

.ba-comment-smiles-picker-dialog .ba-comment-smiles-picker-body::-webkit-scrollbar-thumb {
    background: #484c65;
    border-radius: 6px;
}

.ba-live-search-results .ba-live-search-body::-webkit-scrollbar-thumb,
.ba-wishlist-products-list::-webkit-scrollbar-thumb,
.ba-cart-products-list::-webkit-scrollbar-thumb {
    background: #ddd;
    border-radius: 6px;
}

.event-calendar-events-list .event-calendar-row-wrapper::-webkit-scrollbar-thumb {
    background: #464646;
    border-radius: 6px;
}

.ba-cart-products-list,
.event-calendar-events-list .event-calendar-row-wrapper {
    scrollbar-width: thin;
    scrollbar-color: #464646 transparent;
}

.event-calendar-events-list .event-calendar-row-wrapper::-webkit-scrollbar-track,
.ba-comment-smiles-picker-dialog .ba-comment-smiles-picker-body::-webkit-scrollbar-track {
    background-color: transparent;
}

/* Comment Login */
.comment-user-name {
    flex-grow: 1;
}

.ba-social-login-wrapper i {
    background-color: var(--bg-secondary);
    border-radius: 50%;
    cursor: pointer;
    font-size: 16px;
    padding: 12px;
    text-align: center;
    transition: all .3s;
    width: 1em;
}

.ba-social-login-wrapper .ba-social-login-icons span {
    display: inline-block;
    margin-right: 10px;
    position: relative;
}

.ba-social-login-wrapper .ba-social-login-icons span:last-child {
    margin-right: 0;
}

.ba-comments-share-icons-wrapper i.zmdi-facebook:hover,
.ba-social-login-wrapper i.ba-comments-facebook-login {
    background-color: #3b5998 !important;
}

.ba-comments-share-icons-wrapper i.copy-comment-link:hover,
.ba-social-login-wrapper i.ba-comments-google-login {
    background-color: #ee4f1d !important;
}

.ba-comments-share-icons-wrapper i.zmdi-vk:hover,
.ba-social-login-wrapper i.ba-comments-vk-login {
    background-color: #5b7aa8 !important;
}

.ba-comments-share-icons-wrapper i.zmdi-twitter:hover {
    background-color: #41abe1!important;
}

.ba-comments-share-icons-wrapper i,
.ba-social-login-wrapper i.ba-comments-facebook-login,
.ba-social-login-wrapper i.ba-comments-google-login,
.ba-social-login-wrapper i.ba-comments-vk-login {
    color: #fff;
}

.ba-social-login-wrapper i:hover {
    background-color: #3c3c3c !important;
}

@keyframes modal-sm-in {
    from {transform: scale(.8); opacity: 0;}
    to {transform: scale(1); opacity: 1;}
}

.ba-live-search-results,
.ba-comments-modal .ba-comments-modal-body {
    border-radius: 6px;
    border: none;
    display: none;
    background-color: #fff;
    box-shadow: 0 15px 40px rgba(0,0,0,.15);
    box-sizing: border-box;
    left: 50%;
    margin-left: -162px;
    overflow: hidden;
    opacity: 0;
    padding: 25px;
    position: fixed;
    top: calc(50% - 180px);
    width: 325px;
    z-index: 1060;
}

.ba-comments-modal.ba-comment-guest-login-dialog.visible-comments-dialog,
.ba-live-search-results {
    z-index: 99999;
}

.ba-live-search-results.ba-live-search-out,
.ba-live-search-results.visible-live-search-results,
.ba-comments-modal.visible-comments-dialog .ba-comments-modal-body {
    animation: modal-sm-in .3s cubic-bezier(0.4,0,0.2,1) both;
    backface-visibility: hidden;
    display: block;
    line-height: initial;
}

@keyframes visible-live-search {
    from {transform: translateY(20px); opacity: 0;}
    to {transform: translateY(0);opacity: 1;}
}

.ba-live-search-results.visible-live-search-results {
    animation: visible-live-search .3s cubic-bezier(0.4,0,0.2,1) both;
}

@keyframes live-search-out {
    from {transform: translateY(0);opacity: 1;}
    to {transform: translateY(20px); opacity: 0;}
}

.ba-live-search-results.ba-live-search-out {
    animation: live-search-out .3s cubic-bezier(0.4,0,0.2,1) both;
}

.ba-comments-modal.visible-comments-dialog.ba-comment-unsubscribed-dialog .ba-comments-modal-body {
    animation: none;
    opacity: 1;
}

.ba-comments-modal-title {
    color: #1a1a1a;
    cursor: default;
    display: inline-block;
    font-size: 18px;
    font-weight: bold;
    line-height: 20px;
    margin: 0 0 50px 0;
}

.ba-user-login-action,
.ba-guest-login-action {
    background: var(--primary);
    border-radius: 3px;
    border: none;
    color: var(--title-inverse);
    cursor: pointer;
    display: inline-block;
    float: right;
    font-size: 16px;
    font-weight: bold;
    line-height: initial;
    overflow: hidden;
    padding: 15px;
    position: relative;
    text-decoration: none;
    text-transform: uppercase;
    z-index: 1;
}

.ba-modal-sm .ba-btn-primary.active-button:after,
.ba-comments-modal-footer .red-btn:after,
.ba-user-login-action:after,
.ba-guest-login-action:after {
    background: #fff;
    border-radius: 50%;
    backface-visibility: hidden;
    -webkit-backface-visibility: hidden;
    content: "";
    height: 3px;
    left: 50%;
    opacity: 0;
    position: absolute;
    top: 50%;
    transition: all .5s cubic-bezier(.25,.98,.26,.99);
    transform: scale(0);
    width: 3px;
    z-index: -1;
}

.ba-comments-modal .red-btn:hover:after,
.ba-user-login-action:hover:after,
.ba-guest-login-action:hover:after {
    backface-visibility: hidden;
    background: var(--primary);
    opacity: 1;
    transform: scale(27);
}

.ba-comments-modal .red-btn:hover:after {
    background: #f44236;
}

.ba-comments-modal .ba-btn-primary {
    position: relative;
    z-index: 1;
}

.ba-comments-modal input[type="password"],
.ba-comments-modal input[type="email"],
.ba-comments-modal input[type="text"] {
    backface-visibility: hidden;
    border: 1px solid #fff;
    border-bottom-color: #e3e3e3;
    box-shadow: none;
    box-sizing: border-box;
    color: #1a1a1a;
    font-size: 22px;
    font-weight: 400;
    height: 45px;
    line-height: 45px;
    margin: 25px 0 50px 0;
    padding: 4px 6px;
    width: 100%;
}

.ba-comments-modal .ba-comments-modal-title + div input[type="text"]{
    margin-bottom: 0;
}

.ba-comments-modal .ba-comments-modal-title ~ div {
    position: relative;
    line-height: initial;
}

.ba-comments-modal-text {
    color: #757575;
    font-size: 16px;
    font-weight: 400;
    line-height: 30px;
    margin: 0 0 10px;
}

.ba-comments-modal .ba-comments-modal-footer {
    background: transparent;
    border: none;
    box-shadow: none;
    margin-top: 25px;
    padding: 0;
    text-align: right;
}

.ba-comments-modal .ba-comments-modal-footer span {
    background: transparent;
    border-radius: 3px;
    border: none;
    color: #363637;
    cursor: pointer;
    display: inline-block;
    font-size: 16px;
    font-weight: bold;
    line-height: 18px;
    overflow: hidden;
    padding: 15px;
    text-transform: uppercase;
    transition: .3s;
}

.ba-comments-modal .ba-comments-modal-footer span:not(.ba-btn-primary):hover {
    background-color: rgba(0,0,0,0.1);
    color: #363637;
}

.ba-comments-modal span.ba-btn-primary:not(.active-button).red-btn {
    background: #f44236 !important;
    color: #fff !important;
    line-height: 18px;
}

.ba-comments-modal input:focus {
    border-color: #fff !important;
    border-bottom-color: #e3e3e3 !important;
}

.ba-comments-modal .ba-comments-modal-title ~ div input[type="password"] + .focus-underline,
.ba-comments-modal .ba-comments-modal-title ~ div input[type="email"] + .focus-underline {
    top: 68px;
}

.focus-underline {
    background: var(--primary);
    bottom: 0;
    height: 2px;
    left: 0px;
    position: absolute;
    transform: scaleX(0);
    transition: all .3s cubic-bezier(0.4,0,0.2,1);
    width: 100%;
}

.ba-comments-modal-body input.ba-alert + .focus-underline {
    background: #f64231;
}

.ba-comments-modal-body input.ba-alert + .focus-underline,
input:focus + .focus-underline {
    transform: scaleX(1);
}

@keyframes backdrop {
    from { opacity: 0;}
}

.visible-comments-dialog .ba-comments-modal-backdrop {
    animation: backdrop .5s ease-in-out both;
    background: var(--overlay);
    bottom: 0;
    left:0;
    position: fixed;
    right: 0;
    top: 0;
    z-index: 1050;
}

.ba-comment-unsubscribed-dialog.visible-comments-dialog .ba-comments-modal-backdrop {
    animation: none;
}

/* Share Dialog */
.ba-comment-share-dialog .ba-comments-modal-backdrop {
    opacity: 0;
}

.ba-comment-share-dialog .ba-comments-modal-body {
    background: #2c2c2c;
    border-radius: 4px;
    margin-left: 0;
    overflow: visible;
    padding: 15px;
    position: absolute;
    width: auto;
}

.ba-comments-share-icons-wrapper {
    align-items: center;
    display: flex;
    justify-content: center;
}

.ba-comments-share-icons-wrapper > * {
    cursor: pointer;
    position: relative;
}

.ba-comments-share-icons-wrapper i {
    backface-visibility: hidden;
    background: #3c3c3c;
    border-radius: 50%;
    font-size: 18px;
    margin-right: 15px;
    padding: 6px;
    text-align: center;
    transition: .3s;
    width: 1em;
}

.ba-comments-share-icons-wrapper i.copy-comment-link {
    margin-right: 0;
}

/* Comment Attachment */

.ba-comment-xhr-attachment {
    align-items: center;
    display: flex;
}

.ba-comment-xhr-attachment:last-child {
    margin-bottom: 25px !important;
}

.ba-comment-xhr-attachment i:first-child {
    pointer-events: none;
}

.ba-comment-xhr-attachment .zmdi-delete {
    cursor: pointer;
    float: right;
    margin-left: 10px;
}

.ba-comment-xhr-attachment .post-intro-image {
    border-radius: 3px !important;
    margin: 0 15px 0 0;
}

.attachment-title {
    display: inline-block;
    flex-grow: 1;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.user-comment-edit-enable .ba-comment-xhr-attachment:not(.attachment-file-uploaded) .attachment-title,
.user-comment-edit-enable .attachment-title {
    width: 100px;
}

.attachment-progress-bar-wrapper {
    background: #ddd;
    border-radius: 10px;
    display: inline-block;
    height: 5px;
    margin-left: 15px;
    min-width: 40%;
}

.ba-comment-xhr-attachment.attachment-file-uploaded .attachment-progress-bar-wrapper {
    margin-left: 0;
    min-width: 0;
    width: 0;
}

.ba-comment-xhr-attachment:not(.attachment-file-uploaded) .attachment-title {
    width: 40%;
}

.attachment-progress-bar {
    background: #1da6f4;
    border-radius: 5px;
    display: block;
    height: 5px;
    transition: .3s ease-in-out;
    width: 0;
}

.comment-user-info-wrapper {
    display: flex;
}

.ba-item-reviews .ba-author-avatar,
.ba-comment-xhr-attachment .post-intro-image,
.ba-item-comments-box .ba-author-avatar,
.comment-user-info-wrapper .ba-author-avatar {
    background-position: center;
    background-size: cover;
    border-radius: 50%;
    box-sizing: border-box;
    display: inline-block;
    height: 50px;
    min-width: 50px;
    vertical-align: middle;
    width: 50px;
}

.comment-data-wrapper,
.comment-user-info {
    font-size: initial !important;
    line-height: initial;
    width: 100%;
}

.comment-moderator-user-settings,
.comment-report-user-comment,
.comment-user-date:not(.was-review-helpful) {
    float: right;
}

.comment-moderator-user-settings,
.comment-report-user-comment {
    position: relative;
    margin-left: 20px;
    line-height: initial;
}

.comment-moderator-user-settings i,
.comment-report-user-comment i {
    cursor: pointer;
    font-size: 24px;
    text-decoration: none;
}

.comment-report-user-comment i {
    font-size: 18px;
    line-height: 24px;
    transition: .3s;
}

.comment-user-info > * {
    display: block;
}

.comment-user-info .comment-user-email,
.comment-user-info .comment-user-ip {
    display: inline-block;
}

.comment-likes-wrapper {
    display: flex;
    flex-wrap: wrap;
    justify-content: flex-end;
}

.comment-action-wrapper > span,
.comment-likes-wrapper > span.comment-likes-action-wrapper {
    margin-top: 25px;
}

.was-review-helpful.comment-user-date {
    pointer-events: none;
}

.comment-action-wrapper {
    flex-grow: 1;
}

.comment-likes-action-wrapper {
    display: inline-block;
}

.blog-posts-sorting-wrapper select,
.ba-comments-total-count-wrapper select,
.ba-item-reviews .ba-comments-attachment-file-wrapper > span,
.ba-review-rate-title,
.ba-submit-cancel,
.ba-social-login-wrapper > span,
.ba-user-login-btn,
.ba-submit-comment,
.ba-guest-login-btn,
.comment-logout-action,
.comment-user-date,
.comment-likes-wrapper span,
.ba-comments-total-count,
.comment-user-name,
.comment-edit-action span,
.comment-delete-action span,
.comment-likes-wrapper .comment-action-wrapper > .comment-likes-action span,
.comment-likes-wrapper  span.comment-share-action span,
.comment-likes-wrapper  span.comment-reply-action span {
    font-weight: bold !important;
    letter-spacing: 0px !important;
    line-height: initial !important;
}

.comment-delete-action,
.comment-edit-action,
.comment-likes-action-wrapper > span,
.comment-likes-wrapper .comment-action-wrapper > span.comment-reply-action,
.comment-likes-wrapper .comment-action-wrapper > span.comment-share-action {
    align-items: center;
    cursor: pointer;
    display: inline-flex;
    margin-left: 25px;
    transition: .3s;
}

.ba-item-reviews .ba-comments-attachment-file-wrapper:hover,
.ba-comment-xhr-attachment .zmdi-delete:hover,
.comment-report-user-comment i:hover,
.comment-moderator-user-settings i:hover,
.ba-user-login-btn:hover,
.ba-submit-cancel:hover,
.delete-comment-attachment-file:hover,
.comment-logout-action:hover,
.ba-comment-smiles-picker-dialog span:hover,
.ba-guest-login-btn:hover,
.ba-comments-icons-wrapper i:hover,
.comment-action-wrapper >span:hover,
.comment-likes-action-wrapper >span:hover {
    opacity: .65;
}

.comment-likes-wrapper span i {
    font-size: 24px;
    margin-right: 10px;
}

.comment-likes-wrapper  .comment-likes-action i {
    font-size: 18px;
    margin-right: 5px;
}

.comment-likes-wrapper .comment-likes-action.active span,
.comment-likes-wrapper .comment-likes-action.active i {
    color: var(--primary);
}

.blog-posts-sorting-wrapper select,
.ba-review-rate-title,
span.ba-comment-attachment-trigger,
.ba-social-login-wrapper > span,
.ba-user-login-btn,
.ba-guest-login-btn,
.ba-submit-comment,
.comment-logout-action,
.ba-comments-total-count-wrapper select,
.comment-user-name,
.ba-comments-total-count  {
    font-size: 16px !important;
}

.user-comment-wrapper .comment-user-date,
.comment-user-date,
.comment-likes-wrapper span {
    font-size: 12px !important;
}

.user-comment-wrapper .comment-user-date {
    line-height: 24px !important;
}

.ba-not-approved-comment .comment-user-info-wrapper,
.ba-not-approved-comment .comment-data-wrapper > div:not(.comment-user-info),
.ba-not-approved-comment .comment-user-info > span:not(.comment-moderator-label):not(.comment-not-approved-label):not(.comment-moderator-user-settings) {
    opacity: .3;
    pointer-events: none;
}

.user-comment-wrapper {
    box-sizing: border-box;
    display: flex;
    margin-bottom: 25px;
    width: 100%;
}

.user-comment-wrapper * {
    font-size: inherit;
    text-decoration: inherit;
    text-transform: inherit;
    letter-spacing: inherit;
}

.comment-user-message-wrapper {
    margin: 15px 0 0 25px;
}

span.comment-user-name {
    margin-left: 25px;
}

.comment-reply-name,
span.comment-user-name {
    letter-spacing: 0px !important;
    line-height: 24px !important;
}

.comment-not-approved-label,
.comment-moderator-label,
span.comment-user-name,
.comment-reply-name {
    align-items: center;
    display: inline-flex;
}

.comment-reply-name i {
    margin: 0 10px;
    transform: scaleX(-1);
}

.comment-not-approved-label,
.comment-moderator-label {
    background: var(--primary);
    border-radius: 25px;
    color: #fff;
    font-size: 12px;
    font-weight: bold;
    line-height: initial;
    margin-left: 5px;
    padding: 5px 10px;
    vertical-align: middle;
}

.comment-not-approved-label {
    background: #f64231;
}

.comment-attachment-image-type-wrapper {
    display: inline-block;
    position: relative;
}

.comment-attachments-image-wrapper > span > span {
    background-position: center;
    background-size: cover;
    border-radius: 3px;
    cursor: zoom-in;
    display: inline-block;
    height: 50px;
    margin-right: 5px;
    transition: .3s;
    width: 75px;
}

.comment-attachments-image-wrapper > span > span:hover {
    opacity: .7;
}

.comment-attachment-image-type-wrapper i.zmdi {
    background: #f64231;
    border-radius: 50%;
    color: #fff;
    cursor: pointer;
    font-size: 11px;
    font-weight: bold;
    opacity: 0;
    padding: 2px;
    position: absolute;
    pointer-events: none;
    right: 8px;
    text-align: center;
    top: 2px;
    transition: all .3s;
    width: 11px;
}

.comment-attachment-image-type-wrapper i.zmdi:hover {
    color: rgba(255, 255, 255, 0.75) !important;
}

.user-comment-edit-enable .comment-attachment-image-type-wrapper:hover i.zmdi {
    opacity: 1;
    pointer-events: auto;
}

.user-comment-wrapper.user-comment-edit-enable .ba-comment-message-wrapper {
    margin-bottom: 0;
}

.user-comment-wrapper.user-comment-edit-enable .ba-comment-message {
    background: rgba(0, 0, 0, 0.05) !important;
    border: none!important;
    padding: 15px !important;
}

.user-comment-wrapper.user-comment-edit-enable .comment-likes-wrapper,
.user-comment-wrapper.user-comment-edit-enable .comment-message,
.user-comment-wrapper:not(.user-comment-edit-enable) .comment-edit-form-wrapper,
.user-comment-wrapper:not(.user-comment-edit-enable) .comment-attachment-file .delete-comment-attachment-file {
    display: none;
}

.ba-comment-xhr-attachment i,
.comment-attachment-file i {
    font-size: 24px;
    margin-right: 10px;
    transition: all .3s;
}

.ba-comment-xhr-attachment.attachment-file-uploaded,
.comment-attachment-file {
    align-items: center;
    display: flex;
    margin-bottom: 10px;
}

.ba-comment-xhr-attachment {
    margin-bottom: 10px;
    font-size: 14px;
}

.comment-attachment-file a {
    flex-grow: 1;
    font-size: 14px;
    line-height: 24px;
}

.comment-reply-form-wrapper,
.ba-comment-reply-wrapper {
    margin-left: 50px;
}

.ba-comments-icons-wrapper {
    display: inline-block;
    font-size: initial;
    letter-spacing: initial;
    line-height: initial;
    vertical-align: top;
    width: 50%;
}

.ba-comments-icons-wrapper i {
    font-size: 24px;
    padding: 0 10px;
    transition: all .3s;
}

.ba-comment-message-wrapper .ba-comments-attachment-file-wrapper i.ba-comment-attachment-trigger:hover {
    opacity: 1;
}

.ba-comment-message[disabled] ~ .ba-comments-icons-wrapper i {
    pointer-events: none;
}

.ba-comment-message[disabled] ~ .ba-comments-icons-wrapper {
    position:relative;
}

.ba-comment-message[disabled] ~ .ba-comments-icons-wrapper .ba-comments-attachments-wrapper:before {
    content: "";
    cursor: not-allowed;
    display: block;
    height: 100%;
    position: absolute;
    width: 100%;
    z-index: 1;
}

.ba-comments-icons-wrapper span {
    display: inline-block;
    position: relative;
}

.ba-comments-captcha-wrapper {
    display: inline-block;
    line-height: 0;
}

.ba-comments-captcha-wrapper:not(.bottomright-style):not(.bottomleft-style),
.ba-comments-captcha-wrapper.inline-style{
    width: calc(50% - 5px);
    margin-bottom: 15px;
}

.ba-comments-captcha-wrapper > div {
    display: inline-block;
}

.ba-comments-captcha-wrapper > .comments-recaptcha {
    display: flex;
    flex-grow: 1;
    justify-content: flex-end;
}

.ba-comments-captcha-wrapper.recaptcha_invisible {
    position: absolute;
}

.ba-submit-comment,
.comment-logout-action {
    cursor: pointer;
}

.ba-user-login-btn,
.ba-submit-comment,
.comment-logout-action,
.ba-guest-login-btn {
    transition: all .3s;
}

/*
/* Plugin Reviews
*/

.ba-item-reviews .ba-comments-total-count-wrapper {
    justify-content: flex-start;
    flex-wrap: wrap;
}

.ba-item-reviews .ba-comments-total-count {
    flex-grow: 1;
    padding-left: 20px;
}

.ba-item-reviews .ba-review-stars-wrapper {
    display: inline-flex;
    margin-left: 20px;
    vertical-align: middle;
    white-space: nowrap;
}

.ba-item-reviews .ba-review-stars-wrapper.logout-reviews-user i {
    cursor: not-allowed !important;
}

.intro-post-reviews,
.ba-blog-post-reviews {
    align-items: center;
}

.ba-item-reviews .ba-reviews-total-rating + .ba-review-rate-wrapper .ba-review-stars-wrapper,
.ba-item-reviews .user-comment-container-wrapper .user-comment-wrapper:not(.user-comment-edit-enable) .ba-review-stars-wrapper i {
    pointer-events: none;
}

.ba-item-reviews .ba-comments-login-wrapper + .ba-review-rate-wrapper .ba-review-stars-wrapper i ,
.ba-comments-login-wrapper + .ba-review-rate-wrapper i,
.ba-item-reviews .ba-comments-total-count-wrapper .ba-review-stars-wrapper i {
    font-size: 32px;
}

.ba-item-reviews .ba-reviews-total-rating {
    font-size: 48px;
    font-weight: bold;
    white-space: nowrap;
}

.ba-reviews-total-rating-wrapper {
    align-items: center;
    display: flex;
    line-height: initial;
    white-space: nowrap;
}

.ba-blog-post-rating-stars,
.ba-review-stars-wrapper {
    align-items: center;
    color: #ddd;
    display: flex;
    letter-spacing: initial !important;
    margin-bottom: 1px;
}

.ba-item-fields-filter .ba-checkbox-wrapper i {
    color: #ddd;
    font-size: 24px;
    margin-right: 5px;
}

.ba-item-recent-reviews .ba-review-stars-wrapper i {
    position: relative;
}

.ba-selected-filter-value i.active:after {
    color: #fff;
}

.ba-selected-filter-value i:not(.active) {
    opacity: .5
}

.event-calendar-event-item-reviews .ba-blog-post-rating-stars i.active,
.intro-post-reviews .ba-blog-post-rating-stars i.active + i:after,
.ba-field-filter .ba-filter-rating i.active:after,
.ba-item-recent-reviews .ba-review-stars-wrapper i.active:after,
.ba-item-reviews .ba-comments-login-wrapper + .ba-review-rate-wrapper .ba-review-stars-wrapper i.active:after,
.intro-post-reviews .ba-blog-post-rating-stars i.active,
.intro-post-reviews .ba-blog-post-rating-stars i.active + i:after,
.ba-blog-post-reviews .ba-blog-post-rating-stars i.active,
.ba-blog-post-reviews .ba-blog-post-rating-stars i.active + i:after,
.ba-item-reviews .ba-review-rate-wrapper .ba-review-stars-wrapper:not(.logout-reviews-user):hover i:after,
.ba-item-reviews .ba-review-stars-wrapper:not(.logout-reviews-user) i.active,
.ba-item-reviews .ba-review-stars-wrapper:not(.logout-reviews-user) i.active + i:after {
    color: #f79431 !important;
}

.ba-item-reviews .ba-comments-login-wrapper + .ba-review-rate-wrapper .ba-review-stars-wrapper i.active:after,
.ba-item-reviews .ba-comments-login-wrapper + .ba-review-rate-wrapper .ba-review-stars-wrapper i.active ~ i:not(active):after {
    color: transparent !important;
}

.event-calendar-event-item-reviews .ba-blog-post-rating-stars i,
.ba-item-recent-reviews .ba-review-stars-wrapper i,
.intro-post-reviews .ba-blog-post-rating-stars i,
.ba-blog-post-reviews .ba-blog-post-rating-stars i,
.ba-item-reviews .ba-review-stars-wrapper i {
    margin-right: 5px;
}

.ba-item-reviews .ba-review-stars-wrapper i {
    font-size: 24px;
}

.ba-item-reviews .ba-comments-login-wrapper + .ba-review-rate-wrapper .ba-review-stars-wrapper i {
    margin-right: 0;
    padding-right: 5px;
}

.ba-load-more-reviews-btn,
.ba-item-reviews .ba-leave-review-btn {
    background: var(--primary);
    border-radius: 3px;
    color: #fff !important;
    cursor: pointer;
    display: inline-flex;
    font-size: 16px !important;
    font-weight: bold !important;
    letter-spacing: 0px !important;
    line-height: initial !important;
    margin: 0 0 25px;
    padding: 15px 40px;
    transition: all .3s;
}

.ba-view-more-replies {
    cursor: pointer;
    display: inline-block;
    font-size: 16px;
    font-weight: 400;
    margin-bottom: 25px;
    opacity: .5;
    transition: .3s;
}

.ba-view-more-replies:hover {
    opacity: 1;
}

.ba-load-more-reviews-btn {
    box-sizing: border-box;
    justify-content: center;
    width: 100%;
}

.ba-load-more-reviews-btn:hover,
.ba-item-reviews .ba-leave-review-btn:hover {
    background: #3c3c3c !important;
}

.ba-comments-box-wrapper:not(.leave-review-enabled) .ba-leave-review-box-wrapper,
.leave-review-enabled .ba-leave-review-btn {
    display: none;
}

/*
/* Context Moderators Menu
*/

@keyframes context-menu {
    0%{ width: 265px; opacity: 0; max-height: 350px; visibility: hidden;}
    1%{ width: 0px; opacity: 1; max-height: 0; visibility: visible; }
    100%{ width: 265px; max-height: 350px; }
}

.comments-moderators-context-menu.ba-context-menu {
    background: #f5f5f5;
    border: 1px solid #e3e3e3;
    display: none;
    margin-left: 265px;
    max-height: 0;
    overflow: hidden;
    position: absolute;
    transform: translateX(-100%);
    white-space: nowrap;
    width: 265px;
    z-index: 1070;
}

.comments-moderators-context-menu.ba-context-menu > span:hover i,
.comments-moderators-context-menu.ba-context-menu > span:hover {
    background: #1da6f4;
    border-bottom-color: transparent;
    color: #fff !important;
}

.comments-moderators-context-menu.ba-context-menu.visible-context-menu {
    animation: context-menu .3s both;
    display: block;
}

.comments-moderators-context-menu.ba-context-menu > span {
    animation: backdrop .3s .3s both !important;
    cursor: pointer;
    display: block;
    font-size: 14px;
    font-weight: 400;
    padding: 12px;
}

.comments-moderators-context-menu.ba-context-menu > span i {
    color: #757575;
    font-size: 24px;
    padding: 0 15px 0 5px;
    text-align: center;
    vertical-align: sub;
    width: 24px;
}

.comments-moderators-context-menu.ba-context-menu span.ba-group-element {
    border-top: 1px solid #e3e3e3;
}

.comments-moderators-context-menu.ba-context-menu span a,
.comments-moderators-context-menu.ba-context-menu span {
    color: #333;
}

/*
/* Notification
*/

@keyframes notification-in {
    from {bottom: 0; transform: translateY(100%); opacity: 0;}
}

#ba-notification.notification-in {
    animation: notification-in .4s cubic-bezier(.25,.98,.26,.99) both;
    display: block;
}

#ba-notification {
    background: #2c2c2c;
    border-radius: 6px;
    border: none;
    bottom: 50px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.3);
    color: #fff;
    opacity: 1;
    padding: 25px;
    position: fixed;
    right: 50px;
    text-shadow: none;
    visibility: visible;
    z-index: 10000;
}

.ba-store-cart-opened #ba-notification {
    right: calc(50px + var(--body-scroll-width));
}

#ba-notification.ba-product-notice {
    width: 300px;
}

#ba-notification.ba-alert {
    background: #f46336;
    padding: 40px 25px;
    width: 250px;
}

#ba-notification:not(.ba-alert) h4,
#ba-notification:not(.ba-alert) i {
    display: none;
}

#ba-notification i {
    color: #fff;
    cursor: pointer;
    opacity: 1;
    padding: 8px;
    position: absolute;
    right: 5px;
    text-shadow: none;
    top: 0;
}

#ba-notification p {
    color: #fff;
    font: 500 14px/24px 'Roboto';
    margin: 0;
}

#ba-notification p img {
    height: 40px;
    padding-left: 40px;
    vertical-align: middle;
    width: 40px;
}

#ba-notification .ba-product-notice-message .ba-product-notice-image-wrapper {
    height: 50px;
    margin-right: 25px;
    width: 50px;
    text-align: center;
}

#ba-notification .ba-product-notice-message img {
    border-radius: 3px;
    height: auto;
    max-width: 50px;
    padding-left: 0;
    width: auto;
    max-height: 50px;
}

#ba-notification .ba-product-notice-message {
    display: flex;
    align-items: center;
}

#ba-notification .ba-product-notice-image-wrapper {
    align-items: center;
    display: flex;
    float: left;
    justify-content: center;
}

#ba-notification.ba-alert p {
    opacity: .6;
}

.ba-alert h4 {
    color: #fff;
    display: block;
    font: bold 14px/16px 'Roboto', sans-serif;
    letter-spacing: 0;
    margin: 0 0 15px !important;
    text-align: left;
    text-decoration: none;
    text-transform: uppercase;
}

@keyframes notification-out {
    to { bottom: 0; transform: translateY(130%); opacity: 0;}
}

#ba-notification.animation-out {
    animation: notification-out .4s cubic-bezier(.25,.98,.26,.99) both;
    display: block;
    opacity: 1;
    visibility: visible;
}

/*
/* Plugin Feature Box
*/

.ba-feature-box-wrapper * {
    transition: color .25s linear, background .25s linear, box-shadow .25s linear;
}

.ba-feature-box-wrapper {
    display: inline-flex;
    flex-wrap: wrap;
    width: 100%;
}

.ba-feature-box-wrapper .ba-feature-box {
    box-sizing: border-box;
    display: inline-flex;
    overflow: hidden;
    position: relative;
}

.ba-feature-image-wrapper .ba-feature-image {
    max-width: 100%;
}

.ba-feature-image-wrapper i {
    align-items: center;
    display: inline-flex;
    height: 1em;
    justify-content: center;
    max-width: 100%;
    width: 1em;
}

.ba-feature-list-layout .ba-feature-image-wrapper {
    margin-right: 25px;
}

.ba-feature-image-wrapper div {
    background-attachment: scroll;
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
    display: inline-block;
}

.ba-feature-box-wrapper.ba-feature-grid-layout .ba-feature-box {
    flex-direction: column;
}

.ba-feature-box-wrapper.ba-feature-grid-layout .ba-feature-box:hover {
    z-index: 1;
}


.ba-feature-box-wrapper.ba-feature-list-layout .ba-feature-box .ba-feature-caption {
    flex-grow: 1;
}

.ba-feature-button a {
    display: inline-block;
}

.ba-feature-button.empty-content {
    display: block !important;
}

.comment-reply-action,
.comment-attachments-wrapper,
.comment-attachments-image-wrapper {
    margin-left: 25px;
}

.comment-attachments-wrapper.not-empty-container,
.comment-attachments-image-wrapper.not-empty-container {
    margin-top: 25px;
}

.instagram-modal.ba-comments-image-modal {
    background: var(--overlay);
}

/*
/* Plugin Icon-list
*/

.ba-item-icon-list ul {
    display: inline-flex;
    flex-wrap: wrap;
    margin: 0;
    text-decoration: none;
    width: 100%;
}

.ba-item-icon-list li {
    align-items: flex-start;
    display: inline-flex;
    margin-right: 30px;
}

.ba-item-icon-list li a:before,
.ba-item-icon-list li i:before,
.ba-item-icon-list li:before,
.ba-item-icon-list li i {
    cursor: default !important;
    display: block;
    font-style: initial;
    height: 1em;
    line-height: 1em;
    min-width: 1em;
    text-align: center;
    text-decoration: none;
    text-transform: none;
    width: 1em;
}

.ba-item-icon-list li:before,
.ba-item-icon-list li a:before,
.ba-item-icon-list li i {
    margin-top: calc(var(--icon-list-line-height)/2);
    transform: translateY(-50%);
}

.ba-item-icon-list li a i:before {
    cursor: pointer !important;
}

.ba-item-icon-list li a {
    align-items: flex-start;
    color: inherit;
    display: inherit;
}

.ba-item-icon-list li a span {
    align-items: center;
    display: flex;
    min-height: 100%;
}

.ba-item-icon-list li a,
.ba-item-icon-list li a i {
    cursor: pointer !important;
}

.ba-item-icon-list .vertical-layout {
    flex-direction: column;
}

.ba-item-icon-list li:last-child,
.ba-item-icon-list .vertical-layout li {
    margin-right: 0;
}

.ba-item-icon-list .vertical-layout li {
    margin-top: 20px;
}

.ba-item-icon-list .vertical-layout li:first-child {
    margin-top: 0;
}

.ba-item-icon-list ul.bullets-type i,
.ba-item-icon-list ul.numbers-type i {
    display: none;
}

.ba-item-icon-list ul.bullets-type li a:before,
.ba-item-icon-list ul.bullets-type li.list-item-without-link:before {
    content: '\f26d';
    font-family: Material-Design-Iconic-Font;
}

.ba-item-icon-list ul.numbers-type {
    counter-reset: list-numbers;
}
.ba-item-icon-list ul.numbers-type li a:before,
.ba-item-icon-list ul.numbers-type li.list-item-without-link:before {
    counter-increment: list-numbers;
    content: counter(list-numbers);
}

/*
/* Plugin Content Slider
*/

.ba-item-content-slider > .slideshow-wrapper > .ba-slideshow > .slideshow-content > .item > a,
.ba-item-content-slider > .slideshow-wrapper > .ba-slideshow > .slideshow-content > .item > .ba-slideshow-img {
    bottom: 0;
    left: 0;
    position: absolute;
    right: 0;
    top: 0;
}

.ba-item-content-slider > .slideshow-wrapper > .ba-slideshow > .slideshow-content > .item > .ba-slideshow-img {
    overflow: hidden;
}

.ba-item-content-slider > .slideshow-wrapper > .ba-slideshow > .slideshow-content > .item.active > a {
    z-index: 5;
}

.column-wrapper .ba-item-content-slider .ba-slideshow-img + .ba-grid-column {
    align-content: center;
    align-items: center;
}

.column-wrapper .ba-item-content-slider .ba-slideshow-img + .ba-grid-column > .empty-item {
    display: none;
}

/*
/* Plugin Testimonials
*/
.ba-item-testimonials .testimonials-wrapper {
    box-sizing: border-box;
}

.ba-item-testimonials .style-4 .testimonials-wrapper,
.ba-item-testimonials .style-1 .testimonials-wrapper {
    height: auto;
}

.ba-item-testimonials .ba-testimonials {
    list-style: none;
    margin: 0;
}

.testimonials-icon-wrapper {
    align-items: flex-start;
    display: flex;
    justify-content: center;
    margin-bottom: 20px;
}

.testimonials-icon-wrapper i {
    line-height: .5em;
    pointer-events: none;
    text-align: center;
    vertical-align: middle;
}

.testimonials-name-wrapper {
    overflow: hidden;
}

.ba-item-testimonials .slideshow-content > li {
    box-sizing: border-box;
}

.style-5 .testimonials-wrapper,
.style-3 .testimonials-wrapper,
.style-2 .testimonials-wrapper {
    display: flex;
    flex-direction: column;
}

.ba-item-testimonials .ba-slideset-dots{
    margin-top: 10px;
}

.ba-item-testimonials .slideshow-content {
    margin: 0 auto;
    position: relative;
}

.testimonials-slideshow-content-wrapper {
    margin: 0 auto;
}

/* style-1 */
.style-4 .testimonials-wrapper,
.style-1 .testimonials-wrapper {
    display: flex;
    flex-wrap: wrap;
    flex-direction: row;
    min-height: auto;
}

.style-4 .testimonials-info,
.style-3 .testimonials-info,
.style-2 .testimonials-info,
.style-1 .testimonials-info {
    box-sizing: border-box;
    display: flex;
    margin-bottom: 20px;
    order: 1;
    position: relative;
    width: 100%;
}

.ba-item-testimonials .testimonials-info {
    height: var(--testimonials-info-height);
    flex-grow: 1;
}

.style-6 .testimonials-info,
.style-5 .testimonials-info,
.style-4 .testimonials-info,
.style-2 .testimonials-info,
.style-3 .slideshow-content >li .testimonials-wrapper,
.style-1 .slideshow-content >li .testimonials-wrapper {
    box-shadow: none !important;
    background-color: transparent !important;
    border-radius: 0 !important;
    border: none!important;
    padding: 0 !important;
}

.style-4 .ba-testimonials-img,
.style-3 .ba-testimonials-img,
.style-2 .ba-testimonials-img,
.style-1 .ba-testimonials-img {
    order: 2;
}

.style-1 .testimonials-icon-wrapper {
    margin-right: 10px;
}

.style-4 .ba-testimonials-img,
.style-1 .ba-testimonials-img {
    margin-right: 20px;
}

.style-6 .ba-slideset-dots > div,
.style-5 .ba-testimonials-img div,
.style-4 .ba-testimonials-img div,
.style-3 .ba-testimonials-img div,
.style-2 .ba-testimonials-img div,
.style-1 .ba-testimonials-img div {
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

.style-6 .ba-slideset-dots > div {
    transition: opacity .3s linear;
    -webkit-tap-highlight-color: transparent;
}

.style-6 .ba-slideset-dots > div:not(.active):not(:hover){
    opacity: .5;
}

.style-4 .testimonials-title-wrapper,
.style-3 .testimonials-title-wrapper,
.style-2 .testimonials-title-wrapper,
.style-1 .testimonials-title-wrapper {
    display: flex;
    flex-direction: column;
    justify-content: center;
    order: 3;
}

.style-3 .testimonials-info:before,
.style-1 .testimonials-info:before {
    border: 10px solid;
    border-bottom-color: transparent !important;
    border-left-color: transparent !important;
    border-right-color: transparent !important;
    bottom: -20px;
    content: "";
    display: block;
    position: absolute;
    top: auto;
    transform: translateX(-50%);
}

.style-4 .testimonials-name-wrapper,
.style-4 .testimonials-caption-wrapper,
.style-4 .ba-testimonials-testimonial,
.style-1 .testimonials-name-wrapper,
.style-1 .testimonials-caption-wrapper,
.style-1 .ba-testimonials-testimonial {
    text-align: left;
}

/* style-2 */
.style-2 .testimonials-info,
.style-3 .testimonials-info {
    flex-direction: column;
}

.style-5 .ba-testimonials-img,
.style-3 .ba-testimonials-img,
.style-2 .ba-testimonials-img {
    display: flex;
    justify-content: center;
    width: 100%;
}

.style-6 .testimonials-name-wrapper,
.style-6 .testimonials-caption-wrapper,
.style-6 .ba-testimonials-testimonial,
.style-5 .testimonials-name-wrapper,
.style-5 .testimonials-caption-wrapper,
.style-5 .ba-testimonials-testimonial,
.style-3 .testimonials-name-wrapper,
.style-3 .testimonials-caption-wrapper,
.style-3 .ba-testimonials-testimonial,
.style-2 .testimonials-name-wrapper,
.style-2 .testimonials-caption-wrapper,
.style-2 .ba-testimonials-testimonial {
    text-align: center;
}

/* style-3 */
.style-3 .testimonials-info:before {
    left: 50% !important;
}

/* style-4 */
.style-4 .testimonials-info {
    order: 4;
}

.style-4 .testimonials-icon-wrapper {
    display: none;
}

.style-1 .slideshow-content >li,
.style-4 .slideshow-content >li,
.style-6 .slideshow-content >li {
    box-sizing: border-box;
}

/* style-6 */
.ba-testimonials.style-5 .testimonials-info >.testimonials-icon-wrapper,
.ba-testimonials:not(.style-5) .testimonials-wrapper>.testimonials-icon-wrapper,
.style-6 .ba-testimonials-img,
.style-6 .ba-slideset-dots > div:before{
    display: none;
}

.style-6 .testimonials-info {
    margin-bottom: 20px;
}

.style-5 .testimonials-testimonial-wrapper {
    margin: 20px 0;
}

.style-6 .ba-slideset-dots,
.style-3 .testimonials-title-wrapper,
.style-2 .testimonials-title-wrapper {
    margin-top: 20px;
}

.style-4 .testimonials-testimonial-wrapper {
    margin: 20px 0 0;
}

/* Testimonials Animation */
.ba-item-testimonials .slideshow-content li:not(.active):not(.testimonials-out-animation) {
    opacity: 0;
    position: absolute;
    visibility: hidden;
}

.ba-testimonials:not(.slideset-loaded) {
    opacity: 0;
}

.ba-item-testimonials .slideshow-content {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    flex-wrap: wrap;
}

@keyframes testimonials-in {
    0% { opacity: 0; transform: scale(0.2);}
    100% {opacity: 1; transform: scale(1);}
}

.ba-item-testimonials .slideshow-content li.active {
    animation: testimonials-in .3s linear both;
}

@keyframes testimonials-out {
    0% {opacity: 1; transform: scale(1);}
    100% {opacity: 0; transform: scale(0.2);}
}

.ba-item-testimonials .slideshow-content li.testimonials-out-animation {
   animation: testimonials-out .3s linear both;
}

/* Testimonials Animation Fade*/

@keyframes testimonials-fade-in {
    0% { opacity: 0;}
    100% {opacity: 1;}
}

.ba-item-testimonials .ba-testimonials[data-count="1"] .slideshow-content li.active {
    animation: testimonials-fade-in .3s linear both;
}

@keyframes testimonials-fade-out {
    0% {opacity: 1;}
    100% {opacity: 0;}
}

.ba-item-testimonials .ba-testimonials[data-count="1"] .slideshow-content li.testimonials-out-animation {
   animation: testimonials-fade-out .3s linear both;
}

/*
/* Plugin Headline
*/

.ba-item-headline .headline-wrapper > * > span {
    display: inline-block;
    white-space: nowrap;
}

/*
/* Plugin Flipbox
*/

.ba-item-flipbox > .ba-flipbox-wrapper > .column-wrapper > .ba-grid-column-wrapper {
    height: 100%
}

.ba-item-flipbox .ba-flipbox-wrapper {
    perspective: 1000px;
    transform: translateZ(0);
}

.ba-item-flipbox .ba-flipbox-frontside *,
.ba-item-flipbox .ba-flipbox-backside *{
    animation-fill-mode: initial !important;
    backface-visibility: visible !important;
    -webkit-backface-visibility: visible !important;
}

.ba-item-flipbox .ba-flipbox-frontside,
.ba-item-flipbox .ba-flipbox-backside {
    display: block;
    box-sizing: border-box;
    backface-visibility: hidden;
    -webkit-backface-visibility: hidden;
    height: inherit;
    transition: transform cubic-bezier(0.785, 0.135, 0.15, 0.86);
}

.ba-item-flipbox .ba-flipbox-backside {
    left: 0;
    position: absolute;
    top: 0;
    z-index: -1;
}

.ba-item-flipbox .ba-flipbox-frontside > .ba-grid-column-wrapper > .ba-grid-column,
.ba-item-flipbox .ba-flipbox-backside > .ba-grid-column-wrapper > .ba-grid-column {
    overflow: hidden;
}

/*
/* Plugin Simple Gallery
*/

.ba-image-item-caption,
.ba-image-item-caption .ba-caption-overlay,
.ba-simple-gallery-image,
.ba-simple-gallery-caption .ba-caption-overlay,
.ba-simple-gallery-caption {
    bottom: 0;
    display: flex;
    flex-direction: column;
    justify-content: center;
    left: 0;
    padding: 20px;
    position: absolute;
    right: 0;
    top: 0;
}

.ba-image-item-caption {
    pointer-events: none;
}

.ba-image-item-caption .ba-caption-overlay,
.ba-simple-gallery-image {
    padding: 0;
}

.ba-item-overlay-section .ba-image-wrapper,
.ba-item-image .ba-image-wrapper,
.ba-item-simple-gallery .ba-instagram-image {
    overflow: hidden;
    transform: translate3d(0, 0, 0);
}

.ba-item-flipbox .ba-item-overlay-section .ba-image-wrapper,
.ba-item-flipbox .ba-item-image .ba-image-wrapper,
.ba-item-flipbox .ba-item-simple-gallery .ba-instagram-image {
    position: relative;
    transform: none;
}

.ba-image-item-caption *:not(.ba-caption-overlay),
.ba-simple-gallery-caption *:not(.ba-caption-overlay){
    z-index: 1;
}

.ba-instagram-image .ba-simple-gallery-image {
    background: inherit;
    transition-duration: inherit;
}

.ba-item-simple-gallery  .ba-instagram-image > * {
    transition-delay: 0s !important;
}

.ba-item-field-simple-gallery .ba-instagram-image {
    transition: opacity 0.3s linear;
}

.ba-item-field-simple-gallery .ba-instagram-image:hover {
    opacity: .85;
}

/*
/* Plugin Sticky Header
*/

.ba-sticky-header {
    transform: translateY(-100vh);
    position: fixed;
    top: 0;
}

.ba-sticky-header.visible-sticky-header {
    display: block;
    left: 0;
    max-width: 100%;
    right: 0;
    transform: none;
    z-index: 45;
}

.ba-store-wishlist-opened .ba-sticky-header.visible-sticky-header {
    max-width: calc(100% - var(--body-scroll-width));
}

/*
/* Plugin One Page Menu
*/

/* Side Bar One Page Menu */
.side-navigation-menu {
    position: fixed;
    right: 30px;
    top: 50%;
    transform: translateY(-50%);
    z-index: 99999;
}

.lightbox-open .side-navigation-menu {
    right: 47px;
}

@media (-ms-high-contrast: active), (-ms-high-contrast: none){
    .side-navigation-menu {
        top: calc(50% - 5em);
        transform: none !important;
    }

    .side-navigation-menu li a:after,
    .side-navigation-menu li a:before {
        right: 15px !important;
    }

    body.com_gridbox.gridbox .side-navigation-menu li a:after,
    body.com_gridbox.gridbox .side-navigation-menu li a:before {
        right: 70px !important;
    }
}

.side-navigation-menu .main-menu .nav.menu > li {
    display: block;
    overflow: hidden;
}

.side-navigation-menu li a:before {
    content: '\f26c';
}

.side-navigation-menu li a:after {
    content: '\f26d';
    opacity: 0;
    transition: opacity .3s linear;
}

.side-navigation-menu li.active a:after,
.side-navigation-menu li a:hover:after {
    opacity: 1;
}

.side-navigation-menu li a:after,
.side-navigation-menu li a:before {
    color: inherit;
    font-family: 'Material-Design-Iconic-Font';
    font-size: inherit;
    font-weight: bold;
    line-height: inherit;
    position: fixed;
    right: -7px;
}

.side-navigation-menu li a {
    text-align: right !important;
    padding-right: 60px !important;
    position: relative;
}

.side-navigation-menu li:not(.active) a {
    left: calc(100% + 30px);
    transition: all .3s ;
}

.side-navigation-menu li.active a ,
.side-navigation-menu li:hover a {
    left: 35px;
}

.ba-row.row-with-sidebar-menu {
    z-index: 10 !important;
}

/*
/* Plugin Overlay Section
*/

.ba-item-overlay-section .ba-image-wrapper + .ba-button-wrapper {
    display: none;
}

.ba-item-overlay-section .ba-image-wrapper {
    cursor: pointer;
}

.ba-overlay-section-backdrop {
    padding: 0 !important;
}

.ba-overlay-section .animated {
    animation-fill-mode: both;
}

.ba-overlay-section-backdrop .ba-overlay-section:not(.ba-container) > .ba-section {
    width: calc(100vw - 17px) !important;
}

.ba-overlay-section-backdrop .ba-section {
    flex-direction: column;
}

/* Overlay Section Button */
.ba-overlay-section-backdrop.visible-section .ba-overlay-section {
    transform: none !important;
}

.ba-overlay-section-backdrop .ba-overlay-section {
    transition: transform .3s ease-in-out;
}

/* Overlay Section Lightbox */
.ba-overlay-section-backdrop.lightbox .ba-overlay-section {
    align-items: center;
    display: flex;
    justify-content: center;
}

.ba-overlay-section-backdrop:not(.horizontal-bottom):not(.horizontal-top) .ba-section {
    height: auto !important;
    margin-left: auto;
    margin-right: auto;
}

/* Overlay Section Vertical Right */
.ba-overlay-section-backdrop.vertical-left > .ba-overlay-section >.ba-section,
.ba-overlay-section-backdrop.vertical-right > .ba-overlay-section > .ba-section {
    min-height: 100vh !important;
}

.ba-overlay-section-backdrop.vertical-right {
    justify-content: flex-end;
}

.ba-overlay-section-backdrop.vertical-right > .ba-overlay-section {
    transform: translateX(100%);

}

/* Overlay Section Vertical Left */
.ba-overlay-section-backdrop.vertical-left {
    justify-content: flex-start;
}

.ba-overlay-section-backdrop.vertical-left > .ba-overlay-section {
    transform: translateX(-100%);
}

/* Overlay Section Horizontal Top */
.ba-overlay-section-backdrop.horizontal-bottom > .ba-overlay-section,
.ba-overlay-section-backdrop.horizontal-top > .ba-overlay-section {
    margin: 0;
}

.ba-overlay-section-backdrop.horizontal-top > .ba-overlay-section {
    transform: translateY(-100%);
}

.ba-overlay-section-backdrop.horizontal-top {
    align-items: flex-start;
}

.ba-overlay-section-backdrop.horizontal-top .ba-container,
.ba-overlay-section-backdrop.horizontal-bottom .ba-container {
    max-width: none;
}

.ba-overlay-section-backdrop.horizontal-top > .ba-overlay-section,
.ba-overlay-section-backdrop.horizontal-top > .ba-overlay-section > .ba-section,
.ba-overlay-section-backdrop.horizontal-bottom > .ba-overlay-section,
.ba-overlay-section-backdrop.horizontal-bottom > .ba-overlay-section > .ba-section {
    width: 100% !important;
}

/* Overlay Section Horizontal Bottom */
.ba-overlay-section-backdrop.horizontal-bottom {
    align-items: flex-end;
    justify-content: start;
}

.ba-overlay-section-backdrop.horizontal-bottom > .ba-overlay-section {
    transform: translateY(100%);
}

@media (-ms-high-contrast: active), (-ms-high-contrast: none){
    .ba-overlay-section-backdrop.horizontal-bottom > .ba-overlay-section {
        margin-right: calc(0px - (100vw - 100%));
        overflow-y: scroll;
        width: calc(100vw + (100vw - 100%))!important;
    }
}

@-moz-document url-prefix() {
    .ba-overlay-section-backdrop.horizontal-bottom > .ba-overlay-section {
        margin-right: calc(0px - (100vw - 100%));
        overflow-y: scroll;
        width: calc(100vw + (100vw - 100%))!important;
    }
}

/*
/* Plugin Progress Pie
*/

.ba-item-progress-pie canvas {
    left: 50%;
    max-width: 100%;
    position: absolute;
    top: 0;
    transform: translateX(-50%);
    z-index: 0;
}

.ba-item-progress-pie .ba-progress-pie {
    align-items: center;
    display: flex;
    justify-content: center;
    margin: 0 auto;
    max-width: 100%;
}

.ba-comment-message-wrapper:after,
.ba-comment-message-wrapper:before,
.ba-progress-pie:before,
.ba-progress-pie:after {
    content: "";
    display: table;
    line-height: 0;
}

.ba-comment-message-wrapper:after,
.ba-progress-pie:after {
    clear: both;
}

.ba-item-progress-pie .progress-pie-number {
    z-index: 1;
}

.ba-item-progress-pie .ba-progress-pie:before {
    content: "";
    padding-top: 100%;
    float: left;
}

/*
/* Plugin Cookies
*/

.ba-cookies.notification-bar-top,
.ba-cookies.notification-bar-bottom {
    position: fixed;
    width: 100%!important;
}

.ba-cookies.notification-bar-top {
    top: 0;
}

.ba-cookies.notification-bar-bottom {
    bottom: 0;
}

.ba-cookies.notification-bar-top .ba-section,
.ba-cookies.notification-bar-bottom .ba-section {
    width: 100% !important;
}

/*
/* Plugin Progress-bar
*/

.ba-animated-bar {
    overflow: hidden;
}

.ba-animated-bar {
    align-items: center;
    border-radius: inherit;
    box-sizing: border-box;
    display: flex;
    height: 100%;
    justify-content: space-between;
    line-height: 0;
    padding: 0 20px;
    vertical-align: middle;
}

.progress-bar-title {
    white-space: nowrap;
}

.progress-bar-number {
    flex-grow: 1;
    text-align: right;
}

/*
/* Plugin Lightbox
*/

.ba-lightbox-backdrop {
    opacity: 0;
    position: absolute;
    visibility: hidden;
    transition: all .3s ease-in-out;
    z-index: 1070;
}

.ba-store-wishlist-backdrop,
.ba-store-cart-backdrop,
.ba-overlay-section-backdrop,
.ba-lightbox-backdrop.lightbox-center {
    align-items: center;
    bottom: 0;
    box-sizing: border-box;
    display: flex;
    justify-content: center;
    left: 0;
    min-height: 100vh;
    opacity: 0;
    overflow: hidden;
    overflow-x: hidden;
    position: fixed;
    padding: 25px;
    right: 0;
    top: 0;
    transition: none;
    visibility: hidden;
    z-index: 9999;
}

.ba-store-wishlist-backdrop,
.ba-store-cart-backdrop {
    padding: 0;
}

.ba-store-wishlist-backdrop-out,
.ba-store-cart-backdrop-out,
.ba-overlay-section-backdrop.overlay-section-backdrop-out,
.ba-lightbox-backdrop.lightbox-center.overlay-section-backdrop-out {
    transition: opacity .3s ease-in-out, visibility .1s .3s, left .1s .3s;
}

.ba-store-wishlist-backdrop,
.ba-store-cart-backdrop,
.ba-overlay-section-backdrop {
     align-items: baseline;
}

.ba-store-wishlist-opened .ba-store-wishlist-backdrop,
.ba-store-cart-opened .ba-store-cart-backdrop,
.lightbox-open .ba-lightbox-backdrop,
.lightbox-open .ba-overlay-section-backdrop.visible-section {
    font-size: initial;
    letter-spacing: initial;
    line-height: initial;
    overflow: scroll;
    overflow-x: hidden;
}

.ba-not-default-header.ba-store-cart-opened .header,
.ba-not-default-header.ba-store-wishlist-opened .header,
.ba-store-wishlist-opened,
.ba-store-cart-opened {
    width: calc(100% - var(--body-scroll-width));
}

.ba-lightbox-backdrop.lightbox-center .ba-section {
    margin: 0 auto
}

.ba-wrapper.ba-lightbox.ba-container.sortabale-parent-node:before {
    bottom: 0;
    content: "";
    cursor: move;
    left: 0;
    overflow: auto;
    position: absolute;
    right: 0;
    top: 0;
    z-index: 30;
}

.ba-store-wishlist-backdrop.ba-visible-store-wishlist,
.ba-store-cart-backdrop.ba-visible-store-cart,
.ba-overlay-section-backdrop.visible-section,
.ba-lightbox-backdrop.visible-lightbox {
    font-size: initial;
    letter-spacing: initial;
    line-height: initial;
    opacity: 1;
    transition: opacity .3s ease-in-out;
    visibility: visible;
}

.ba-store-wishlist-backdrop.ba-visible-store-wishlist .ba-wishlist-checkout-row[data-exists="0"] {
    cursor: not-allowed;
}

.ba-store-wishlist-backdrop.ba-visible-store-wishlist .ba-wishlist-checkout-row[data-exists="0"] .ba-wishlist-add-all-btn {
    opacity: .25;
    pointer-events: none;
}

.ba-overlay-section-backdrop.lightbox:not(.visible-section) {
    left: 100% !important;
    pointer-events: none!important;
}

.ba-overlay-section,
.ba-lightbox {
    margin: auto 0;
}

.ba-lightbox {
    visibility: hidden;
}

.visible-lightbox.ba-lightbox  {
    visibility: visible;
}


.ba-lightbox {
    width: 100%;
}

.ba-lightbox.ba-container {
    width: auto !important;
}

.ba-lightbox .ba-section {
    max-width: 100%!important;
}

.visible-lightbox .ba-lightbox {
    display: block;
    visibility: visible;
}

.ba-store-wishlist-close-wrapper,
.ba-store-cart-close-wrapper,
.close-overlay-section,
.close-lightbox  {
    height: 0;
    left: 15px;
    position: absolute;
    right: 15px;
    top: 0;
    z-index: 100;
}

.ba-store-wishlist-close-wrapper i,
.ba-store-cart-close-wrapper i,
.close-overlay-section i,
.close-lightbox  i {
    color: inherit;
    cursor: pointer;
    font-size: 24px;
    margin-top: 15px;
}

.ba-store-wishlist-close-wrapper i,
.ba-store-cart-close-wrapper i {
    color: var(--title);
    transition: .3s;
}

.ba-store-wishlist-backdrop > .ba-store-wishlist-close,
.ba-modal-sm + .modal-backdrop,
.ba-store-cart-backdrop > .ba-store-cart-close,
.ba-overlay-section-backdrop > .ba-overlay-section-close,
.ba-lightbox-backdrop > .ba-lightbox-close {
    bottom: 0;
    left: 0;
    position: fixed;
    right: 0;
    top: 0;
}

.ba-modal-sm + .modal-backdrop {
    background-color: var(--overlay);
    opacity: .05 !important;
    z-index: 9999 !important;
}

.ba-lightbox-backdrop:not(.visible-lightbox) .ba-lightbox,
.ba-lightbox-backdrop:not(.visible-lightbox) .ba-cookies,
.ba-overlay-section-backdrop.lightbox {
    left: 100% ;
}

.ba-overlay-section-backdrop.lightbox.visible-section {
    left: 0;
}

/* Lightbox Position  */
.lightbox-bottom-left > .ba-lightbox-close,
.lightbox-bottom-right > .ba-lightbox-close,
.lightbox-top-left > .ba-lightbox-close,
.lightbox-top-right > .ba-lightbox-close {
    display: none !important;
}

.lightbox-top-left .ba-lightbox,
.lightbox-top-right .ba-lightbox,
.lightbox-bottom-left .ba-lightbox,
.lightbox-bottom-right .ba-lightbox {
    position: fixed;
    z-index: 1070;
}

.lightbox-top-left .ba-lightbox,
.lightbox-top-right .ba-lightbox {
    margin: 0;
    top: 50px;
}

.lightbox-bottom-left .ba-lightbox,
.lightbox-bottom-right .ba-lightbox {
    bottom: 50px;
    margin: auto 0 0 0;
}

.lightbox-top-left .ba-lightbox,
.lightbox-bottom-left .ba-lightbox {
    left: 50px;
}

.lightbox-bottom-right .ba-lightbox,
.lightbox-top-right .ba-lightbox {
    right: 50px;
}

.lightbox-bottom-right .ba-lightbox .ba-section,
.lightbox-top-right .ba-lightbox .ba-section {
    float: right;
}

/*
/* Plugin Social Icons
*/

.ba-item-social-icons .ba-icon-wrapper a {
    display: inline-block;
    vertical-align: middle;
    margin-bottom: 5px;
}

.ba-item-social-icons .ba-icon-wrapper a:not(:last-child){
    margin-right: 5px;
}

.ba-item-social-icons .ba-icon-wrapper i {
    text-align: center;
}

/*
/* Plugin Social Sharing
*/

.ba-item-social {
    text-align: center;
}

.ba-social-classic > div:hover {
    background: #fafafa;
}

.ba-social > div {
    align-items: center;
    border-radius: 3px;
    cursor: pointer;
    display: inline-flex;
    justify-content: flex-start;
    margin: 5px 10px 5px 10px;
    overflow: hidden;
    white-space: nowrap;
}

.ba-social .social-button {
    color: #fff;
    display: inline-block;
    font-style: initial;
    font-weight: bold;
    text-align: left;
    text-transform: initial;
}

.ba-social-sidebar .social-button {
    border: 1px solid transparent;
    padding-left: 0;
}

.ba-social.ba-social-sm div {
    line-height: 22px;
}

.ba-social.ba-social-sm .social-counter {
    width: 22px;
}

.ba-social.ba-social-sm {
    font-size: 12px;
}

.ba-social.ba-social-md div {
    line-height: 34px;
}

.ba-social.ba-social-md .social-counter {
    width: 34px;
}

.ba-social.ba-social-md {
    font-size: 15px;
}

.ba-social.ba-social-lg div {
    line-height: 44px;
}

.ba-social.ba-social-lg .social-counter {
    width: 44px;
}

.ba-social.ba-social-lg {
    font-size: 18px;
}

.ba-social.ba-social-sm .social-button {
    min-width: 150px;
}

.ba-social.ba-social-md .social-button {
    min-width: 200px;
}

.ba-social.ba-social-lg .social-button {
    min-width: 250px;
}

.ba-social.ba-social-md .social-button,
.ba-social.ba-social-lg .social-button {
    font-size: 14px;
}

.ba-social-sidebar .ba-social .social-button {
    border: none;
}

.ba-social .social-button i {
    color: #fff;
    text-align: center;
    vertical-align: middle;
    width: 1em;
}

.ba-social.ba-social-sm .social-button i {
    font-size: 16px;
    padding: 15px;
}

.ba-social.ba-social-md .social-button i {
    font-size: 18px;
    padding: 15px;
}

.ba-social.ba-social-lg .social-button i {
    font-size: 21px;
    padding: 20px;
}

.social-counter {
    border-radius: 50%;
    color: #fff;
    display: inline-block;
    font-family: 'Roboto', sans-serif;
    font-size: 12px;
    font-style: initial;
    font-weight: bold;
    margin-right: 15px;
    position: relative;
    text-transform: initial;
}

.ba-social.ba-social-sm .social-counter {
    font-size: 10px;
}

/* Minimal */

.ba-social-minimal.ba-social > div {
    margin: 0;
    position: relative;
    overflow: visible;
}

.ba-social-minimal .social-button i {
    color: var(--icon);
}

.ba-social-minimal.ba-social.ba-social-sm .social-button i,
.ba-social-minimal.ba-social.ba-social-md .social-button i,
.ba-social-minimal.ba-social.ba-social-lg .social-button i {
    border-radius: 3px;
    transition: .3s;
}

.ba-social-minimal.ba-social.ba-social-sm .social-button,
.ba-social-minimal.ba-social.ba-social-md .social-button,
.ba-social-minimal.ba-social.ba-social-lg .social-button {
    height: auto;
    min-width: auto;
}

.ba-social-minimal.ba-social.ba-social-sm .social-button {
    width: 44px;
}

.ba-social-minimal.ba-social.ba-social-md .social-button {
    width: 61px;
}

.ba-social-minimal.ba-social.ba-social-lg .social-button {
    width: 78px;
}

.ba-social-minimal .social-counter {
    height: 16px;
    line-height: 17px;
    position: absolute;
    right: -3px;
    margin: 0;
    top: 1px;
    width: 16px !important;
    font-size: 10px;
}

.ba-social-minimal.ba-social.ba-social-sm .social-counter {
    top: 1px;
    right: 1px;
}

.ba-social-minimal.ba-social.ba-social-md .social-counter {
    top: 5px;
    right: 5px;
}

.ba-social-minimal.ba-social.ba-social-lg .social-counter {
    top: 7px;
    right: 7px;
}

.ba-social-minimal.ba-social.ba-social-sm .social-button i {
    font-size: 14px;
    padding: 15px;
}

.ba-social-minimal.ba-social.ba-social-md .social-button i {
    font-size: 21px;
    padding: 20px;
}

.ba-social-minimal.ba-social.ba-social-lg .social-button i {
    font-size: 28px;
    padding: 25px;
}

/* Flat */
.ba-social-flat > div {
    border: none;
}

.ba-social-flat.ba-social .social-counter,
.ba-social-flat.ba-social .social-button i {
    background: rgba(0, 0, 0, 0.25);
}

.ba-social-classic .social-button i,
.ba-social-flat.ba-social .social-button i {
    margin-right: 20px;
}

.ba-social-minimal.ba-social .social-button i:hover {
    color: #fff;
}

.ba-social-minimal.ba-social .vk .social-button i:hover,
.ba-social-minimal .vk .social-counter,
.ba-social-classic .vk .social-button i,
.ba-social-circle .vk .social-button,
.ba-social-flat.ba-social .vk {
    background: #5b7aa8;
}

.ba-social-minimal.ba-social .facebook .social-button i:hover,
.ba-social-minimal .facebook .social-counter,
.ba-social-classic .facebook .social-button i,
.ba-social-circle .facebook .social-button,
.ba-social-flat.ba-social .facebook {
    background: #3b5998;
}

.ba-social-minimal.ba-social .twitter .social-button i:hover,
.ba-social-minimal .twitter .social-counter,
.ba-social-classic .twitter .social-button i,
.ba-social-circle .twitter .social-button,
.ba-social-flat.ba-social .twitter {
    background: #00aced;
}

.ba-social-minimal.ba-social .linkedin .social-button i:hover,
.ba-social-minimal .linkedin .social-counter,
.ba-social-classic .linkedin .social-button i,
.ba-social-circle .linkedin .social-button,
.ba-social-flat.ba-social .linkedin {
    background: #0077B5;
}

.ba-social-minimal.ba-social .pinterest .social-button i:hover,
.ba-social-minimal .pinterest .social-counter,
.ba-social-classic .pinterest .social-button i,
.ba-social-circle .pinterest .social-button,
.ba-social-flat.ba-social .pinterest {
    background: #cb2027;
}

.ba-item-social:not(.ba-social-sidebar) .ba-social-classic div:hover .social-button i:before,
.ba-item-social:not(.ba-social-sidebar) .ba-social-flat.ba-social div:hover .social-button i:before {
    animation: social-button-to-right 0.3s forwards;
    display: block;
}

@keyframes social-button-to-right {
    49% {transform: translate(100%);}
    50% {opacity: 0;transform: translate(-100%);}
    51% {opacity: 1;}
}

.ba-social-circle div:hover .social-button i:before {
    animation: social-button-to-bottom 0.3s forwards;
    display: block;
}

@keyframes social-button-to-bottom {
    49% {transform: translateY(100%);}
    50% {opacity: 0;transform: translateY(-100%);}
    51% {opacity: 1;}
}

/* Classic */
.ba-social-classic > div {
    background: var(--bg-secondary);
}

.ba-social-classic .social-button {
    color: #000;
}

.ba-social-classic .social-counter {
    background: rgba(0, 0, 0, 0.05);
    color: #000;
}

/* Social Circle */
.ba-social-circle.ba-social > div {
    display: inline-block;
    line-height: normal;
    position: relative;
    vertical-align: top;
}

.ba-social-minimal .social-button,
.ba-social-circle .social-button {
    color: transparent;
    display: block;
    overflow: hidden;
    padding: 0;
    width: 0;
}

.ba-social-circle .social-button i {
    border-radius: 50%;
    position: absolute;
    vertical-align: middle;
}

.ba-social-circle .social-counter {
    background-color: transparent;
    color: #333;
    margin: 0;
}

.ba-social-circle.ba-social .social-button {
    align-items: center;
    border-radius: 50%;
    box-sizing: border-box;
    display: flex;
    justify-content: center;
    margin: 0 auto;
}

.ba-social-sidebar .ba-social-circle.ba-social .social-button {
    border-width: 0;
    margin: 3px 0;
    padding: 5px 10px;
}

.ba-social-sidebar .ba-social-circle {
    margin-top: 1px;
}

.ba-social-circle.ba-social .social-button i {
    margin: 0;
    font-size: 16px !important;
}

.ba-social-circle.ba-social.ba-social-sm .social-button {
    min-width: 55px;
    height: 55px;
}

.ba-social-circle.ba-social.ba-social-md .social-button {
    min-width: 65px;
    height: 65px;
}

.ba-social-circle.ba-social.ba-social-lg .social-button {
    min-width: 75px;
    height: 75px;
}

.ba-social-circle.ba-social.ba-social-sm .social-counter,
.ba-social-circle.ba-social.ba-social-md .social-counter,
.ba-social-circle.ba-social.ba-social-lg .social-counter {
    line-height: 36px;
    font-size: 14px;
    font-weight: bold;
}

.ba-social-sidebar .ba-social-circle.ba-social .social-counter {
    padding: 0;
}

.ba-social-circle .social-counter:before,
.ba-social-circle .social-counter:after {
    display: none;
}

.ba-social-sidebar .ba-social.ba-social-circle > div {
    max-width: none;
    min-width: auto;
}

.ba-social-sidebar .ba-social.ba-social-circle .social-counter {
    bottom: 10px;
    color: #fff;
    font-size: 10px;
    left: 50%;
    line-height: normal !important;
    position: absolute;
    transform: translateX(-50%);
}

/* Social Sidebar */
.ba-social-sidebar {
    left: 100% !important;
    position: fixed !important;
    top: 50% !important;
    min-height: 50px;
    transition: opacity .3s linear;
    z-index: 30;
}

.ba-opened-menu .ba-social-sidebar {
    z-index: 5;
}

.ba-social-sidebar[data-size="ba-social-lg"][data-style="ba-social-minimal"] {
    transform: translateY(calc((-74px/2) * var(--social-count))) translateX(-100%);
}

.ba-social-sidebar[data-size="ba-social-md"][data-style="ba-social-minimal"] {
    transform: translateY(calc((-62px/2) * var(--social-count))) translateX(-100%);
}

.ba-social-sidebar[data-size="ba-social-sm"][data-style="ba-social-minimal"] {
    transform: translateY(calc((-59px/2) * var(--social-count))) translateX(-100%);
}

.ba-social-sidebar[data-size="ba-social-lg"][data-style="ba-social-flat"] {
    transform: translateY(calc((-74px/2) * var(--social-count))) translateX(-100%);
}

.ba-social-sidebar[data-size="ba-social-md"][data-style="ba-social-flat"] {
    transform: translateY(calc((-62px/2) * var(--social-count))) translateX(-100%);
}

.ba-social-sidebar[data-size="ba-social-sm"][data-style="ba-social-flat"] {
    transform: translateY(calc((-59px/2) * var(--social-count))) translateX(-100%);
}

.ba-social-sidebar[data-size="ba-social-lg"][data-style="ba-social-classic"] {
    transform: translateY(calc((-71px/2) * var(--social-count))) translateX(-100%);
}

.ba-social-sidebar[data-size="ba-social-md"][data-style="ba-social-classic"] {
    transform: translateY(calc((-58px/2) * var(--social-count))) translateX(-100%);
}

.ba-social-sidebar[data-size="ba-social-sm"][data-style="ba-social-classic"] {
    transform: translateY(calc((-56px/2) * var(--social-count))) translateX(-100%);
}

.ba-social-sidebar[data-size="ba-social-lg"][data-style="ba-social-circle"] {
    transform: translateY(calc((-92px/2) * var(--social-count))) translateX(-100%);
}

.ba-social-sidebar[data-size="ba-social-md"][data-style="ba-social-circle"] {
    transform: translateY(calc((-82px/2) * var(--social-count))) translateX(-100%);
}

.ba-social-sidebar[data-size="ba-social-sm"][data-style="ba-social-circle"] {
    transform: translateY(calc((-72px/2) * var(--social-count))) translateX(-100%);
}

.lightbox-open .ba-social-sidebar {
    left: calc(100% - 17px) !important;
    transition: opacity 0s linear;
    opacity: 0;
}

.ba-social-sidebar .ba-social-lg > div,
.ba-social-sidebar .ba-social-md > div,
.ba-social-sidebar .ba-social-sm > div {
    max-width: 100px;
}

.ba-social-sidebar .ba-social-classic {
    align-items: flex-end;
    display: flex;
    flex-direction: column;
}

.ba-social-sidebar .ba-social-classic > div {
    border-radius: 0;
}

.ba-social-sidebar .ba-social-classic .social-button {
    backface-visibility: hidden;
    border-width: 0;
}

.ba-social-sidebar .ba-social-lg:hover > div ,
.ba-social-sidebar .ba-social-md:hover > div ,
.ba-social-sidebar .ba-social-sm:hover > div  {
    backface-visibility: hidden;
    max-width: 350px;
}

.ba-social-sidebar .ba-social-minimal.ba-social-lg,
.ba-social-sidebar .ba-social-minimal.ba-social-md,
.ba-social-sidebar .ba-social-minimal.ba-social-sm {
    overflow: visible;
    text-align: center !important;
}

.ba-social-sidebar .ba-social-lg,
.ba-social-sidebar .ba-social-md,
.ba-social-sidebar .ba-social-sm {
    overflow: hidden;
    text-align: right !important;
}

.ba-social-sidebar .ba-social.ba-social-lg:not(.ba-social-circle):not(.ba-social-minimal) > div {
    transform: translateX(100%) translateX(-62px);
}

.ba-social-sidebar .ba-social.ba-social-md:not(.ba-social-circle):not(.ba-social-minimal) > div {
    transform: translateX(100%) translateX(-49px);
}

.ba-social-sidebar .ba-social.ba-social-sm:not(.ba-social-circle):not(.ba-social-minimal) > div {
    transform: translateX(100%) translateX(-47px);
}

.ba-social-sidebar .ba-social.ba-social-sm:not(.ba-social-circle):not(.ba-social-minimal) > div:hover,
.ba-social-sidebar .ba-social.ba-social-md:not(.ba-social-circle):not(.ba-social-minimal) > div:hover,
.ba-social-sidebar .ba-social.ba-social-lg:not(.ba-social-circle):not(.ba-social-minimal) > div:hover {
    transform: translateX(1px);
}

.ba-social-sidebar .ba-social > div {
    display: inline-block;
    margin: 0;
    text-align: center;
    transition: transform .3s linear;
}

.ba-social-sidebar .ba-social .social-counter {
    text-align: center;
}

/*
/* Plugin Accordion
*/

.ba-item-accordion .accordion {
    margin: 0;
}

.accordion-body .accordion-inner,
.accordion-body {
    overflow: hidden;
    border: none;
}

.accordion-body.in[style="height: auto;"] .accordion-inner,
.accordion-body.in[style="height: auto;"] {
    overflow: visible;
}

.accordion-body:not(.in) .accordion-inner >.tabs-content-wrapper,
.accordion-body:not(.in) .accordion-inner {
    height: inherit;
}

.ba-item-accordion .collapse {
    transition: height .5s ease;
}

.ba-item-accordion .accordion-group {
    border-radius: 0;
    border: 1px solid;
    border-bottom-width: 0;
    margin: 0;
}

.ba-item-accordion .accordion-group:last-child {
    border-bottom-width: 1px;
}

.accordion-heading > a.accordion-toggle {
    display: block;
    padding: 20px 35px 20px 20px;
    position: relative;
}

.accordion-toggle > span {
    align-items: center;
    display: inline-flex;
}

.accordion-heading > a > span + i {
    font-size: 18px !important;
    letter-spacing: normal;
    line-height: 18px !important;
    margin: 0;
    position: absolute;
    right: 15px;
    top: calc(50% - 9px);
}

.accordion-toggle > span + i:before {
    display: block;
    transition: all .3s ease-in-out;
}

.accordion-toggle.active > span + i:before {
    transform: rotate(90deg);
}

.accordion-body .accordion-inner .ba-section {
    opacity: 0;
    transition: .3s ease-in-out;
}

.accordion-body.in .accordion-inner .ba-section {
    opacity: 1;
    transition: .3s .2s ease-in-out;
}

/*
/* Plugin Tabs
*/

.ba-item-tabs {
    position: relative;
}

.ba-tabs-wrapper .nav-tabs {
    border: none;
    display: flex;
    flex-flow: row wrap;
    justify-content: flex-start;
    margin: 0;
    overflow: hidden;
    padding: 0;
}

@media (-ms-high-contrast: active), (-ms-high-contrast: none){
    .ba-tabs-wrapper.tabs-top .nav-tabs {
        display: block !important;
    }
}

.ba-tabs-wrapper .nav-tabs li {
    display: flex;
    margin: 0;
}

.ba-tabs-wrapper.tabs-top .nav-tabs li {
    display: inline-block;
    flex: 1;
}

.ba-tabs-wrapper .nav-tabs li a {
    box-sizing: border-box;
    border-radius: 0;
    display: flex;
    flex-direction: column;
    height: 100%;
    justify-content: center;
    margin: 0;
    padding: 20px;
    position: relative;
}

.ba-tabs-wrapper .nav-tabs li a,
.ba-tabs-wrapper .nav-tabs li a:focus,
.ba-tabs-wrapper .nav-tabs li a:hover {
    background-color: transparent;
}

.ba-tabs-wrapper.icon-position-top li a > span {
    display: inline-flex;
}

.accordion-heading > a i,
.ba-tabs-wrapper .nav-tabs li a i {
    color: inherit;
    line-height: 1em;
    margin: 0 10px;
    text-align: inherit;
    vertical-align: middle;
}

.ba-tabs-wrapper .nav-tabs li a:before {
    content: "";
    position: absolute;
}

.ba-tabs-wrapper.tabs-top li a:before {
    height: 0;
    left: 0;
    right: 0;
    bottom: -1px;
    transition: height .3s;
}

.ba-tabs-wrapper.tabs-top li.active a:before {
    height: 4px;
}

.ba-tabs-wrapper.tabs-top li {
    border-color: inherit;
}

.ba-tabs-wrapper.tabs-top li a:focus,
.ba-tabs-wrapper.tabs-top li a:hover,
.ba-tabs-wrapper.tabs-top li a {
    border-width: 0;
    border-bottom-width: 1px;
    border-color: inherit;
}

.ba-tabs-wrapper.tabs-top  li a > span {
    align-items: center;
}

.ba-tabs-wrapper li a > span > span {
    direction: ltr;
    word-break: break-word;
}

.ba-item-tabs .ba-tabs-wrapper .tab-content {
    box-sizing: border-box;
}

/* Tabs Left Position */
.ba-tabs-wrapper.tabs-left,
.ba-tabs-wrapper.tabs-right {
    display: flex;
    height: auto;
    width: auto;
}

.ba-tabs-wrapper.tabs-right .nav-tabs,
.ba-tabs-wrapper.tabs-left .nav-tabs {
    flex-direction: column;
    width: 25%;
    position: relative;
}

.ba-tabs-wrapper.tabs-right .nav-tabs:before ,
.ba-tabs-wrapper.tabs-left .nav-tabs:before {
    border-left: 1px solid;
    border-color: inherit;
    bottom: 0;
    height: 100%;
    position: absolute;
    display: block;
    right: 0;
    top: 0;
    width: 1px;
}

.ba-tabs-wrapper.tabs-right .nav-tabs:before {
    left: 0;
    right: auto;
}

.ba-tabs-wrapper.tabs-right .nav-tabs li,
.ba-tabs-wrapper.tabs-left .nav-tabs li {
    flex-direction: column;
}

.ba-tabs-wrapper.tabs-right .nav-tabs li a,
.ba-tabs-wrapper.tabs-left .nav-tabs li a {
    align-items: center;
    display: flex;
    flex-grow: 1;
}

.ba-tabs-wrapper .tab-pane .ba-row-wrapper {
    width: 100%;
}

.ba-tabs-wrapper.tabs-left li:last-child.active a,
.ba-tabs-wrapper.tabs-left li:last-child.active a:hover,
.ba-tabs-wrapper.tabs-left li:last-child.active a:focus,
.ba-tabs-wrapper.tabs-right li:last-child.active a,
.ba-tabs-wrapper.tabs-right li:last-child.active a:hover,
.ba-tabs-wrapper.tabs-right li:last-child.active a:focus,
.ba-tabs-wrapper.tabs-right li a,
.ba-tabs-wrapper.tabs-right li a:hover,
.ba-tabs-wrapper.tabs-right li a:focus,
.ba-tabs-wrapper.tabs-left li a:hover,
.ba-tabs-wrapper.tabs-left li a:focus,
.ba-tabs-wrapper.tabs-left li a {
    border-width: 0;
    border-right-width: 1px;
}

.ba-tabs-wrapper.tabs-right li a:before,
.ba-tabs-wrapper.tabs-left li a:before {
    bottom: 0;
    right: -1px;
    top: 0;
    transition: width .3s;
    width: 0;
}

.ba-tabs-wrapper.tabs-left li.active a:before,
.ba-tabs-wrapper.tabs-right li.active a:before {
    width: 4px;
}

.ba-tabs-wrapper.tabs-right.icon-position-left li a > span,
.ba-tabs-wrapper.tabs-left.icon-position-left li a > span {
    display: inline-block;
    direction: rtl;
}

/* Tabs Right Position */
.ba-tabs-wrapper.tabs-right {
    flex-direction: row-reverse;
}

.ba-tabs-wrapper.tabs-right li a:focus,
.ba-tabs-wrapper.tabs-right li a:hover,
.ba-tabs-wrapper.tabs-right li a {
    border-left-width: 1px;
    border-right-width: 0px !important;
}

.ba-tabs-wrapper.tabs-right li a:before {
    right: auto;
    left: -1px;
}

/*
/* Tabs Icon Position
*/

/* Tabs Icon Top Position */
.icon-position-top .nav-tabs i {
    display: block;
    order: 1;
    margin: 10px 0;
}

/* Tabs Icon left Position */
.ba-tabs-wrapper.icon-position-left li a span.tabs-title {
    display: inline-block;
    direction: ltr;
}

/* Tabs Fade Animation */
.ba-item-tabs .tab-content .tab-pane.active {
     animation: tabs-fade .7s ease-in-out;
}

@keyframes tabs-fade {
    0%{opacity: 0;}
    100%{opacity: 1;}
}

/* Tab Animation */
.tab-content > .tab-pane {
    display: none;
}

.tab-content > .active {
    display: block;
}

.active.left,
.active.right,
.out-left,
.out-right {
    display: inline-block !important;
    box-sizing: border-box;
    overflow: auto;
    position: absolute;
    width: 480px;
}

@keyframes active-tab-left {
    from { transform: translateX(-100%);}
}

.active.left {
    animation: active-tab-left .5s cubic-bezier(.55,.085,.68,.53);
}

@keyframes active-tab-right {
    from { transform: translateX(100%);}
}

.active.right {
    animation: active-tab-right .5s cubic-bezier(.55,.085,.68,.53);
}

@keyframes out-right {
    to { transform: translateX(100%);}
}

.out-right {
    animation: out-right .5s cubic-bezier(.55,.085,.68,.53);
}

@keyframes out-left {
    to { transform: translateX(-100%);}
}

.out-left {
    animation: out-left .5s cubic-bezier(.55,.085,.68,.53) both;
}

/*
/* Plugin Video
*/

.ba-video-wrapper {
    position: relative;
    padding-bottom: 56.25%;
    height: 0;
    overflow: hidden;
    max-width: 100%;
}

.ba-video-wrapper video {
    height: 100%;
    left: 0;
    object-fit: cover;
    position: absolute;
    top: 0;
    width: 100%;
}

.ba-video-wrapper iframe {
    border-radius: inherit;
    bottom: -1px;
    height: calc(100% + 3px);
    left: -1px;
    overflow: hidden;
    position: absolute;
    top: -1px;
    width: calc(100% + 3px);
}

.video-lazy-load-thumbnail {
    align-items: center;
    background-position: center;
    background-size: cover;
    bottom: 0;
    cursor: pointer;
    display: flex;
    justify-content: center;
    left: 0;
    position: absolute;
    right: 0;
    top: 0;
}

.video-lazy-load-thumbnail i {
    background: #fff;
    box-shadow: 0 5px 12px rgba(0,0,0,0.23);
    border-radius: 100%;
    color: var(--primary);
    font-size: 82px;
    line-height: 68px;
    opacity: 1;
    transition: opacity .3s;
}

.video-lazy-load-thumbnail:hover i {
    opacity: .8;
}

/*
/* Plugin Carousel
*/

ul.ba-slideset {
    margin: 0;
    overflow: hidden;
    padding: 0;
}

.ba-item:not(.ba-item-slideshow):not(.ba-item-feature-box) .empty-content:not(.slideshow-button):not(.ba-feature-button) {
    display: none;
}

.ba-item-recently-viewed-products .ba-slideset.carousel-type:not(.slideset-loaded) .slideshow-content > li:not(.active),
.ba-item-related-posts-slider .ba-slideset.carousel-type:not(.slideset-loaded) .slideshow-content > li:not(.active),
.ba-item-recent-posts-slider .ba-slideset.carousel-type:not(.slideset-loaded) .slideshow-content > li:not(.active),
.ba-item-carousel .ba-slideset:not(.slideset-loaded) .slideshow-content > li:not(.active),
.ba-item-slideset .ba-slideset:not(.slideset-loaded) .slideshow-content > li:not(.active) {
    display: none;
}

.ba-item-recently-viewed-products .ba-slideset.carousel-type .slideshow-content > li,
.ba-item-related-posts-slider .ba-slideset.carousel-type .slideshow-content > li,
.ba-item-recent-posts-slider .ba-slideset.carousel-type .slideshow-content > li,
.ba-item-carousel .slideshow-content > li,
.ba-item-slideset .slideshow-content > li {
    display: inline-block;
    line-height: 0;
    position: absolute;
    text-decoration: none;
}

.slideshow-content .slideset-out-animation {
    transition: left 0.5s linear;
}

.ba-slideset .slideshow-content {
    overflow: hidden;
    position: relative;
}

.ba-slideset .slideshow-content li {
    opacity: 1 !important;
    transition: left .5s linear;
    visibility: hidden;
}

.ba-item-recently-viewed-products .slideshow-type.ba-slideset .slideshow-content li,
.ba-item-related-posts-slider .slideshow-type.ba-slideset .slideshow-content li,
.ba-item-recent-posts-slider .slideshow-type.ba-slideset .slideshow-content li {
    visibility: visible;
}

.ba-item-recently-viewed-products .ba-slideset.carousel-type .slideshow-content > li.active,
.ba-item-related-posts-slider .ba-slideset.carousel-type .slideshow-content > li.active,
.ba-item-recent-posts-slider .ba-slideset.carousel-type .slideshow-content > li.active,
.ba-item-carousel .slideset-out-animation,
.ba-item-carousel .slideshow-content li.active,
.ba-slideset .slideset-out-animation,
.ba-slideset .slideshow-content li.active {
    visibility: visible;
}

.ba-slideset:not(.caption-over) li.active {
    z-index: 1;
}

.ba-item-recently-viewed-products ul.carousel-type .slideshow-content:not([style*="transition: none"]) li.item,
.ba-item-related-posts-slider ul.carousel-type .slideshow-content:not([style*="transition: none"]) li.item,
.ba-item-recent-posts-slider ul.carousel-type .slideshow-content:not([style*="transition: none"]) li.item {
    will-change: transform;
}

.ba-item-slideset .ba-slideset,
.ba-item-carousel .ba-slideset {
    cursor: grab !important;
}

/* Image */
.ba-slideshow-img {
    background-position: 50% 50%;
    background-repeat: no-repeat;
}

.lightbox-enabled .ba-slideshow-img {
    cursor: zoom-in;
}

.ba-item-slideshow .ba-overlay,
.ba-item-slideshow .lightbox-enabled .ba-slideshow-caption,
.caption-over .lightbox-enabled .ba-slideshow-caption {
    pointer-events: none;
}

/* Caption */
.slideset-inner {
    position: relative;
}

.ba-slideshow-caption {
    background-repeat: no-repeat;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
    justify-content: center;
}

.ba-item-recently-viewed-products .ba-slideset:not(.slideshow-type) .ba-slideshow-caption,
.ba-item-related-posts-slider .ba-slideset:not(.slideshow-type) .ba-slideshow-caption,
.ba-item-recent-posts-slider .ba-slideset:not(.slideshow-type) .ba-slideshow-caption {
    animation: none;
}

.ba-item-recently-viewed-products .ba-slideset:not(.caption-over):not(.slideshow-type) .ba-slideshow-caption,
.ba-item-related-posts-slider .ba-slideset:not(.caption-over):not(.slideshow-type) .ba-slideshow-caption,
.ba-item-carousel .ba-slideset:not(.caption-over) li .ba-slideshow-caption ,
.ba-item-recent-posts-slider .ba-slideset:not(.caption-over):not(.slideshow-type) .ba-slideshow-caption {
    height: var(--carousel-caption-height);
    justify-content: flex-start;
}

.ba-item-recently-viewed-products .carousel-type .ba-slideshow-caption > *,
.ba-item-related-posts-slider .carousel-type .ba-slideshow-caption > *,
.ba-item-recent-posts-slider .carousel-type .ba-slideshow-caption > *,
.ba-item-carousel .ba-slideshow-caption > *,
.ba-item-slideset .ba-slideshow-caption > * {
    padding: 0 30px;
}

.slideshow-button {
    line-height: 0;
    font-size: 0;
}

.com_gridbox .slideshow-button a {
    line-height: initial;
}

/* Caption Over */
.ba-item-recently-viewed-products .caption-over .ba-slideshow-caption,
.ba-item-related-posts-slider .caption-over .ba-slideshow-caption,
.ba-item-recent-posts-slider .caption-over .ba-slideshow-caption,
.ba-item-slideset .caption-over .ba-slideshow-caption,
.ba-item-carousel .caption-over .ba-slideshow-caption {
    bottom: 0;
    left: 0;
    overflow: hidden;
    position: absolute;
    right: 0;
    top: 0;
}

/* Caption hover */
.ba-item-recently-viewed-products .caption-hover .ba-slideshow-caption,
.ba-item-related-posts-slider .caption-hover .ba-slideshow-caption,
.ba-item-recent-posts-slider .caption-hover .ba-slideshow-caption,
.ba-item-slideset .caption-hover .ba-slideshow-caption,
.ba-item-carousel .caption-hover.caption-over .ba-slideshow-caption {
    opacity: 0;
    visibility: hidden;
    transition: all .3s 0s ease-in-out;
}

.ba-item-recently-viewed-products .ba-slideset:not(.caption-over) li.active .ba-slideshow-caption,
.ba-item-recently-viewed-products .caption-over.caption-hover li:hover .ba-slideshow-caption,
.ba-item-related-posts-slider .ba-slideset:not(.caption-over) li.active .ba-slideshow-caption,
.ba-item-related-posts-slider .caption-over.caption-hover li:hover .ba-slideshow-caption,
.ba-item-recent-posts-slider .ba-slideset:not(.caption-over) li.active .ba-slideshow-caption,
.ba-item-recent-posts-slider .caption-over.caption-hover li:hover .ba-slideshow-caption,
.ba-item-slideset .ba-slideset:not(.caption-over) li.active .ba-slideshow-caption,
.ba-item-slideset .caption-over.caption-hover li:hover .ba-slideshow-caption,
.ba-item-carousel .caption-over.caption-hover li:hover .ba-slideshow-caption  {
    opacity: 1;
    visibility: visible;
}

.ba-item-slideset .ba-slideset:not(.caption-over) li:not(.active) .ba-btn-transition {
    transition: none;
}

.ba-slideset .ba-slideset-dots {
    position: static;
    padding-top: 20px;
}

/*
/* Plugin Recent Posts Slider
*/

.ba-item-recently-viewed-products .ba-blog-post-title a,
.ba-item-related-posts-slider .ba-blog-post-title a,
.ba-item-recent-posts-slider .ba-blog-post-title a {
    color: inherit;
    text-decoration: inherit;
}

.ba-item-recently-viewed-products .ba-slideshow-img,
.ba-item-related-posts-slider .ba-slideshow-img,
.ba-item-recent-posts-slider .ba-slideshow-img {
    position: relative;
    width: 100%;
}

.ba-item-recently-viewed-products .ba-slideshow-img a,
.ba-item-related-posts-slider .ba-slideshow-img a,
.ba-item-recent-posts-slider .ba-slideshow-img a {
    bottom: 0;
    left: 0;
    position: absolute;
    right: 0;
    top: 0;
}

/*
/* Plugin Slideshow
*/
.ba-item-recently-viewed-products .slideshow-type,
.ba-item-related-posts-slider .slideshow-type,
.ba-item-recent-posts-slider .slideshow-type,
ul.ba-slideshow {
    box-sizing: border-box;
    height: 100%;
    list-style: none;
    margin: 0;
    overflow: hidden;
    padding: 0;
    position: relative;
    width: 100%;
}

.ba-item-slideshow ul.ba-slideshow {
    overflow: visible;
}

.ba-item-content-slider ul.ba-slideshow .slideshow-content,
.ba-item-slideshow ul.ba-slideshow,
.ba-item-content-slider ul.ba-slideshow {
    min-height: inherit;
}

.ba-item-product-slideshow ul.ba-slideshow .slideshow-content,
.ba-item-field-slideshow ul.ba-slideshow,
.ba-item-field-slideshow ul.ba-slideshow .slideshow-content,
.ba-item-slideshow ul.ba-slideshow .slideshow-content {
    min-height: inherit;
    overflow: hidden;
    position: relative;
}

.ba-item-product-slideshow .slideshow-wrapper.dots-position-outside:not(.ba-left-thumbnails-navigation) .ba-slideshow-dots,
.ba-item-field-slideshow .slideshow-wrapper.dots-position-outside:not(.ba-left-thumbnails-navigation) .ba-slideshow-dots,
.ba-item-slideshow .slideshow-wrapper.dots-position-outside:not(.ba-left-thumbnails-navigation) .ba-slideshow-dots {
    margin-top: 20px;
    overflow: hidden;
    position: static;
}

.ba-item-product-slideshow .slideshow-content .item,
.ba-item-product-slideshow .slideshow-content,
.ba-item-field-slideshow .slideshow-content .item,
.ba-item-field-slideshow .slideshow-content,
.ba-item-related-posts-slider .slideshow-type .slideshow-content .item,
.ba-item-related-posts-slider .slideshow-type .slideshow-content,
.ba-item-recently-viewed-products .slideshow-type .slideshow-content .item,
.ba-item-recently-viewed-products .slideshow-type .slideshow-content,
.ba-item-recent-posts-slider .slideshow-type .slideshow-content .item,
.ba-item-recent-posts-slider .slideshow-type .slideshow-content,
.ba-item-slideshow .slideshow-content .item,
.ba-item-slideshow .slideshow-content {
    height: 100%;
    width: 100%;
}

.ba-item-recently-viewed-products .slideshow-type .slideshow-content .item:not(.active):not(.ba-next):not(.ba-prev):not(.ba-left):not(.ba-right),
.ba-item-related-posts-slider .slideshow-type .slideshow-content .item:not(.active):not(.ba-next):not(.ba-prev):not(.ba-left):not(.ba-right),
.ba-item-content-slider > .slideshow-wrapper > .ba-slideshow > .slideshow-content > .item:not(.active):not(.ba-next):not(.ba-prev):not(.ba-left):not(.ba-right),
.ba-item-recent-posts-slider .slideshow-type .slideshow-content .item:not(.active):not(.ba-next):not(.ba-prev):not(.ba-left):not(.ba-right),
.ba-item-slideshow .slideshow-content .item:not(.active):not(.ba-next):not(.ba-prev):not(.ba-left):not(.ba-right) {
    display: none;
}

.ba-item-product-slideshow .ba-slideshow-img,
.ba-item-field-slideshow .ba-slideshow-img,
.ba-item-related-posts-slider .slideshow-type .ba-slideshow-img,
.ba-item-recently-viewed-products .slideshow-type .ba-slideshow-img,
.ba-item-recent-posts-slider .slideshow-type .ba-slideshow-img,
.ba-item-slideshow .ba-slideshow-img {
    align-items: center;
    background-position: 50% 50%;
    background-repeat: no-repeat;
    bottom: 0;
    display: flex;
    justify-content: center;
    left: 0;
    overflow: hidden;
    position: absolute;
    right: 0;
    top: 0;
    z-index: 1;
}

.ba-slideshow-img video,
.ba-video-background video,
.ba-video-background iframe,
.ba-slideshow-img iframe {
    height: calc(100vw * .5625);
    left: calc(0px - ((100vw - 100%)/2));
    position: absolute;
    top: calc(50% - ((100vw * .5625)/2));
    width: 100vw;
}

.ba-item-content-slider .ba-slideshow-img + .ba-grid-column,
.ba-item-related-posts-slider .slideshow-type .ba-slideshow-caption,
.ba-item-recently-viewed-products .slideshow-type .ba-slideshow-caption,
.ba-item-recent-posts-slider .slideshow-type .ba-slideshow-caption,
.ba-item-slideshow .ba-slideshow-caption {
    bottom: 0;
    box-sizing: border-box;
    display: none;
    flex-direction: column;
    justify-content: center;
    left: 0;
    width: 100%;
    max-width: 1170px;
    margin: 0 auto;
    overflow: visible;
    padding: 100px;
    position: absolute;
    right: 0;
    top: 0;
    z-index: 5;
}

.ba-item-content-slider .ba-slideshow-img + .ba-grid-column {
    bottom: auto;
    max-width: none;
    min-height: 100%;
    top: auto;
}

.ba-item-related-posts-slider .slideshow-type .active > .ba-slideshow-caption,
.ba-item-recently-viewed-products .slideshow-type .active > .ba-slideshow-caption,
.ba-item-recent-posts-slider .slideshow-type .active > .ba-slideshow-caption,
.ba-item-slideshow .active > .ba-slideshow-caption {
    display: flex;
}

.slideshow-description-wrapper .ba-slideshow-description,
.slideshow-title-wrapper *,
.slideshow-button a {
    display: inline-block;
}

.slideshow-description-wrapper .ba-slideshow-description,
.slideshow-title-wrapper * {
    text-align: inherit;
    width: 100%;
}

.ba-slideset-nav,
.ba-slideshow-nav {
    height: 0;
    position: absolute;
    top: 50%;
    width: 100%;
    z-index: 5;
}

.ba-slideset-nav a,
.ba-slideshow-nav a {
    position: absolute;
    text-align: center;
    transform: translateY(-50%);
}

.slideset-btn-next,
.slideshow-btn-next {
    margin: 0;
    right: 20px;
}

.slideset-btn-prev,
.slideshow-btn-prev {
    left: 20px;
}

.ba-slideset-dots,
.ba-slideshow-dots {
    bottom: 20px;
    box-sizing: border-box;
    color: #fff;
    display: flex;
    justify-content: center;
    padding: 5px;
    position: absolute;
    width: 100%;
    z-index: 9;
}


.com_gridbox .ba-slideshow-dots {
    z-index: 7;
}

.ba-testimonials .ba-slideset-dots {
    position: static;
}

.ba-slideshow-dots.disabled-dots {
    display: none;
}

.show-hidden-elements .ba-slideset-dots,
.show-hidden-elements .ba-slideshow-dots {
    display: flex;
}

.ba-slideset-dots > div:not(:first-child),
.ba-slideshow-dots > div:not(:first-child) {
    margin-left: 1em;
}

.ba-slideset-dots > div,
.ba-slideshow-dots > div {
    cursor: pointer;
    text-align: center;
    -webkit-tap-highlight-color: transparent;
}

.slideshow-type
.ba-item-slideshow .ba-overlay {
    z-index: 4;
}

.ba-item-recently-viewed-products ul:not(.slideshow-type) + .ba-overlay,
.ba-item-related-posts-slider ul:not(.slideshow-type) + .ba-overlay,
.ba-item-recent-posts-slider ul:not(.slideshow-type) + .ba-overlay {
    display: none;
}

.ba-item-recently-viewed-products .slideshow-type + .ba-overlay,
.ba-item-related-posts-slider .slideshow-type + .ba-overlay,
.ba-item-recent-posts-slider .slideshow-type + .ba-overlay {
    z-index: 4
}

.ba-overlay-slideshow-button {
    background: transparent !important;
    bottom: 0;
    color: transparent !important;
    left: 0;
    position: absolute;
    right: 0;
    top: 0;
}

body:not(.gridbox) .slideset-wrapper .empty-list,
body:not(.gridbox) .slideshow-wrapper .empty-list {
    display: none;
}

.ba-item-content-slider.ba-item .slideshow-wrapper .ba-slideshow:not(.ba-fade-in):not(.ba-ken-burns) li.ba-next > .ba-overlay,
.ba-item-content-slider.ba-item .slideshow-wrapper .ba-slideshow:not(.ba-fade-in):not(.ba-ken-burns) li.ba-prev > .ba-overlay,
.ba-item-content-slider.ba-item .slideshow-wrapper li.active > .ba-overlay,
.slideshow-wrapper > .ba-overlay {
    min-height: inherit;
    z-index: 3
}

.ba-item-content-slider.ba-item .slideshow-wrapper li.active > .ba-overlay,
.slideshow-wrapper > .ba-overlay {
    min-height: inherit;
    z-index: 3
}

.ba-item-content-slider.ba-item .slideshow-wrapper li > .ba-overlay {
    min-height: auto;
}

.ba-item-content-slider.ba-item .slideshow-wrapper li.active .ba-grid-column > .ba-overlay,
.ba-item-content-slider.ba-item .slideshow-wrapper .ba-ken-burns li:not(.active) > .ba-overlay {
    z-index: 0;
}

/* Slideshow Thumbnails */
.slideshow-wrapper:not(.ba-left-thumbnails-navigation) .ba-slideshow-dots.thumbnails-dots {
    grid-template-columns: repeat(var(--dots-count), calc((100% - (var(--thumbnails-count) - 1) * 20px) / var(--thumbnails-count)));
    height: var(--bottom-thumbnails-height);
}

.slideshow-wrapper:not(.ba-left-thumbnails-navigation):not(.dots-position-outside) .ba-slideshow-dots.thumbnails-dots {
    grid-template-columns: repeat(var(--dots-count), calc((100% - ((var(--thumbnails-count) - 1) * 20px + 40px)) / var(--thumbnails-count)));
}

.slideshow-wrapper.ba-left-thumbnails-navigation {
    --left-thumbnails-width:  var(--left-thumbnails-width);
}

.slideshow-wrapper.ba-left-thumbnails-navigation .ba-slideshow-dots.thumbnails-dots {
    grid-template-rows: repeat(var(--dots-count), calc((100% - (var(--thumbnails-count) - 1) * 20px) / var(--thumbnails-count)));
}

.ba-left-thumbnails-navigation:not(.dots-position-outside) .ba-slideshow-dots.thumbnails-dots {
    grid-template-rows: repeat(var(--dots-count), calc((100% - ((var(--thumbnails-count) - 1) * 20px + 20px)) / var(--thumbnails-count)));
}

.ba-slideshow-dots.thumbnails-dots {
    display: grid;
    cursor: grab;
    grid-auto-flow: column;
    grid-column-gap: 20px;
    overflow: hidden;
    justify-content: normal;
    padding: 0;
}

.ba-slideshow-dots.thumbnails-dots.disable-move {
    cursor: default;
}

.ba-slideshow-dots.thumbnails-dots.disable-move.center-align:not(.count-matched) {
    justify-content: center;
}

.ba-slideshow-dots.thumbnails-dots.disable-move.right-align:not(.count-matched) {
    justify-content: end;
}

.ba-left-thumbnails-navigation .ba-slideshow-dots.thumbnails-dots.disable-move.center-align:not(.count-matched),
.ba-left-thumbnails-navigation .ba-slideshow-dots.thumbnails-dots.disable-move.right-align:not(.count-matched) {
    justify-content: initial;
}

.ba-slideshow-dots.thumbnails-dots > div {
    background-position: center;
    background-repeat: no-repeat;
    line-height: 0;
    margin-left: 0!important;
    position: relative;
    will-change: transform;
}

.move-started > * {
    pointer-events: none;
}

.slideshow-wrapper:not(.dots-position-outside):not(.ba-left-thumbnails-navigation) .ba-slideshow-dots.thumbnails-dots > div {
    transform: translateX(20px);
}

.slideshow-wrapper:not(.dots-position-outside):not(.ba-left-thumbnails-navigation) .ba-slideshow-dots.thumbnails-dots.center-align.disable-move:not(.count-matched) > div {
    transform: translateX(0px);
}

.slideshow-wrapper:not(.dots-position-outside):not(.ba-left-thumbnails-navigation) .ba-slideshow-dots.thumbnails-dots.right-align.disable-move:not(.count-matched) > div {
    transform: translateX(-20px);
}

.slideshow-wrapper:not(.dots-position-outside).ba-left-thumbnails-navigation .ba-slideshow-dots.thumbnails-dots > div {
    transform: translateY(20px);
}

.ba-item-product-gallery .ba-instagram-image:not(:hover) .ba-simple-gallery-image:after,
.ba-slideshow-dots.thumbnails-dots > div.zmdi:before {
    opacity: 0;
}

.ba-item-product-gallery .ba-simple-gallery-image:after,
.ba-slideshow-dots.thumbnails-dots > div:after {
    background: #fff;
    bottom: 0;
    content: "";
    left: 0;
    opacity: 0.3;
    position: absolute;
    right: 0;
    top: 0;
    transition: .3s;
    z-index: 1;
}

.ba-item-product-gallery .ba-simple-gallery-image:after {
    z-index: 0;
}

.ba-slideshow-dots.thumbnails-dots > div.active:after,
.ba-slideshow-dots.thumbnails-dots > div:hover:after {
    opacity: 0;
}

.empty-content ~ .ba-slideshow-dots.thumbnails-dots {
    display: none;
}

/* Slideshow Thumbnails Left */

.ba-left-thumbnails-navigation .ba-slideshow-dots.thumbnails-dots {
    bottom: 0;
    grid-auto-flow: row !important;
    grid-row-gap: 20px !important;
    left: 0;
    margin: 0 !important;
    position: absolute;
    top: 0;
    width: var(--left-thumbnails-width) !important;
}

.ba-left-thumbnails-navigation:not(.dots-position-outside) .ba-slideshow-dots.thumbnails-dots {
    left: 20px;
    bottom: 20px;
}

.ba-left-thumbnails-navigation .ba-slideshow {
    display: flex !important;
    flex-direction: row-reverse !important;
}

.ba-item-product-slideshow .ba-slideshow {
    min-height: inherit;
}

.ba-left-thumbnails-navigation .ba-slideshow-dots.thumbnails-dots > div {
    transform: translateX(0);
}

.ba-left-thumbnails-navigation.dots-position-outside .ba-slideshow-dots.thumbnails-dots .slideshow-content {
    margin-left: 20px !important;
}

.ba-left-thumbnails-navigation.dots-position-outside .ba-slideshow-dots.thumbnails-dots {
    width: var(--left-thumbnails-width) !important;
}

.ba-left-thumbnails-navigation.dots-position-outside .ba-slideshow-nav,
.ba-left-thumbnails-navigation.dots-position-outside .ba-slideshow .ba-overlay {
    left: calc(var(--left-thumbnails-width) + 20px) !important;
}

.ba-left-thumbnails-navigation.dots-position-outside .ba-slideshow-nav {
    width: calc(100% - (calc(var(--left-thumbnails-width) + 20px))) !important;
}

.ba-left-thumbnails-navigation:not(.dots-position-outside) .ba-slideshow-nav {
    width: calc(100% - (calc(var(--left-thumbnails-width) + 40px))) !important;
}

.ba-left-thumbnails-navigation.dots-position-outside .ba-overlay {
    left: calc(var(--left-thumbnails-width) + 20px) !important;
}

.ba-left-thumbnails-navigation.dots-position-outside .slideshow-content {
    margin-left: calc(20px + var(--left-thumbnails-width)) !important;
}

/*
/* Plugin Weather
*/

.ba-weather .weather-info,
.ba-weather .weather {
    margin-bottom: 1em;
}

.ba-weather .weather .city,
.ba-weather .weather .date,
.ba-weather .weather .condition {
    display: block;
}

.ba-weather span.date {
    margin-bottom: 20px;
}

.ba-weather .weather-info .humidity,
.ba-weather .weather-info .pressure,
.ba-weather .weather-info .sunrise-wrapper > span {
    display: inline-block ;
    margin-right: 10px;
}

.ba-weather div.forecast span.night-temp,
.ba-weather div.forecast span.day-temp {
    display: inline-block !important;
}

.ba-weather div.forecast span.night-temp,
.ba-weather div.forecast span.day-temp {
    box-sizing: border-box;
    text-align: right !important;
}

.ba-weather div.forecast span.night-temp {
    text-align: left !important;
    opacity: .5;
}

/*
/* Plugin Map
*/

.gm-style-mtc + .gm-style-mtc div, .gm-style-mtc div {
    left: initial !important;
    right: initial !important;
    top: initial !important;
}

.ba-map-wrapper {
    min-height: 10px;
}

.gm-style-cc {
    display: none;
}

/*
/* Plugin Disqus
*/

.ba-item.ba-item-map,
.ba-item.ba-item-disqus {
    width: 100% ;
}

/*
/* Plugin Instagram
*/

.instagram-modal-open {
    box-sizing: border-box;
}

.instagram-wrapper {
    display: inline-flex;
    flex-wrap: wrap;
    justify-content: center;
    width: 100%;
}

.ba-instagram-image {
    background-position: center;
    background-size: cover;
    box-sizing: border-box;
    display: inline-block;
    overflow: hidden;
    position: relative;
}

.ba-instagram-image img {
    max-height: 100%;
    opacity: 0;
}

.simple-gallery-masonry-layout .ba-instagram-image img {
    max-height: initial;
}

.ba-instagram-image a {
    bottom: 0;
    left: 0;
    position: absolute;
    right: 0;
    top: 0;
    z-index: 1;
}

.ba-instagram-lightbox-gallery .ba-instagram-image {
    cursor: zoom-in;
}

.ba-instagram-lightbox-gallery .ba-instagram-image a,
.ba-instagram-image +.empty-list {
    display: none;
}

.instagram-modal > div {
    background-position: center;
    background-size: cover;
    height: 100%;
    opacity: 1;
    width: 100%;
}

@keyframes search-result {
    from {opacity: 0;}
    to {opacity: 1;}
}

.instagram-modal i {
    animation: search-result .3s linear;
    color: #fff;
    cursor: pointer;
    font-size: 24px;
    left: 0;
    padding: 40px;
    position: fixed;
    text-align: center;
    transition: all .3s linear;
    width: 24px;
}

.instagram-carousel-dots {
    bottom: 20px;
    display: flex;
    height: 10px;
    justify-content: center;
    position: absolute;
    width: 100%;
    z-index: 110;
}

.instagram-carousel-dots > div {
    background: #fff;
    border-radius: 50%;
    cursor: pointer;
    display: inline-block;
    height: 10px;
    margin-right: 10px;
    width: 10px;
}

.instagram-carousel-dots > div:last-child{
    margin-right: 0;
}

@media (hover: hover) {
    .instagram-carousel-dots > div:not(.active),
    .instagram-modal i:hover {
        opacity: .5;
    }
}

.ba-image-modal.ba-comments-image-modal i.zmdi-close,
.instagram-modal i + i {
    left: auto;
    right: 0;
}

.instagram-modal i:not(.zmdi-close) {
    align-items: center;
    display: flex;
    font-size: 36px;
    justify-content: center;
    top: calc(50% - 116px / 2);
    z-index: 100;
}

.instagram-modal i.zmdi-close {
    top: -10px;
    z-index: 1;
}

.instagram-move-started .instagram-video-wrapper {
    transition: none !important;
}

@keyframes instagram-out {
    to {opacity: 0;}
}

.instagram-image-out {
    animation: instagram-out .3s both ease-in-out !important;
    opacity: 1;
}

/*
/* Plugin Button
*/

.ba-button-wrapper a {
    text-decoration: none;
}

.ba-blog-post-add-to-cart,
.event-calendar-events-list a,
.ba-post-navigation-info a,
.intro-post-wrapper .intro-post-info > span a,
.ba-item-icon-list .ba-icon-list-wrapper ul li a *,
.ba-post-author-title a,
.ba-item-one-page-menu a,
.ba-item-main-menu a,
.ba-item-tabs .nav-tabs a,
.ba-blog-post-info-wrapper > span a,
.intro-post-wrapper > span a,
.ba-blog-post-title a,
.ba-item-overlay-section .ba-button-wrapper .ba-btn-transition,
.ba-btn-transition {
    cursor: pointer;
    transition: color .3s ease-in-out, background .3s ease-in-out;
}

.ba-button-wrapper a {
    display: inline-flex;
    align-items: center;
}

.ba-button-wrapper a.ba-btn-transition[onclick="return false;"] {
    cursor: default;
}

.ba-item-scroll-to .ba-btn-transition span + i,
.ba-item-overlay-section .ba-btn-transition span + i,
.ba-item-button .ba-btn-transition span + i {
    color: inherit;
    line-height: 1em;
    text-align: center;
    width: 1em;
}

.empty-textnode + i,
.ba-item-overlay-section .empty-textnode + i,
.ba-btn-transition .empty-textnode + i {
    margin: 0 !important;
}

/*
/* Plugin Icons
*/

.ba-item-icon a {
    display: inline-block !important;
}

.ba-item-icon .ba-icon-wrapper i {
    text-align: center;
    cursor: default !important;
    line-height: 1em;
}

.ba-item-icon .ba-icon-wrapper a i {
    cursor: pointer !important;
}

/*
/* Plugin Logo
*/

.ba-item-logo a {
    text-align: inherit;
}

/*
/* Plugin Counter
*/

.ba-item-counter .counter-number {
    display: inline-block;
    text-align: center;
}

/*
/* Plugin Smooth Scrolling
*/

.ba-scroll-to i{
    text-align: center;
}

.ba-scroll-to i {
    line-height: 1em;
}

/*
/* Plugin Scroll To Top
*/

.ba-item-scroll-to-top {
    bottom: 65px;
    position: fixed;
    visibility: hidden;
    z-index: 39;
}

.visible-scroll-to-top {
    visibility: visible;
}

.ba-scroll-to-top {
    opacity: 0;
    margin-bottom: -50px;
    transition: opacity .3s linear, visibility .3s linear, margin-bottom .3s linear;
}

.visible-scroll-to-top .ba-scroll-to-top {
    opacity: 1 !important;
    margin-bottom: 0;
}

.ba-item-scroll-to-top .ba-scroll-to-top > i {
    cursor: pointer;
    line-height: 1em;
    text-align: center;
}

/* Scroll To Top Position Right */
.scroll-btn-right {
    right: 25px;
}

.ba-store-wishlist-opened .scroll-btn-right {
    right: calc(25px + var(--body-scroll-width));
}

.lightbox-open .scroll-btn-right {
    right: 40px;
}

.scroll-btn-right .ba-edit-item.full-menu {
    transform: translate(-75%, -50%);
}

/* Scroll To Top Position Left */
.scroll-btn-left {
    left: 25px;
}

.scroll-btn-left .ba-edit-item.full-menu {
    transform: translate(-25%, -50%);
}

/*
/* Plugin Countdown
*/

.ba-item-countdown {
    text-align: center;
}

.ba-countdown > span {
    display: inline-block;
    margin: 10px;
    padding: 10px 20px;
    text-align: center;
}

.ba-countdown .countdown-time {
    display: block;
    min-width: 1.3em;
}

/*
/* Plugin Rating
*/

.ba-item-star-ratings .stars-wrapper {
    font-size: 0;
}

.ba-item-star-ratings .stars-wrapper {
    display: inline-block;
}

.ba-item-reviews .ba-review-stars-wrapper i.active ~ i:not(.active):after,
.ba-item-reviews .ba-review-stars-wrapper i.active ~ i:not(.active),
.ba-item-star-ratings .stars-wrapper i.active ~ i:not(.active):after,
.ba-item-star-ratings .stars-wrapper i.active ~ i:not(.active) {
    color: inherit ;
}

.ba-item-reviews .ba-review-stars-wrapper:not(.logout-reviews-user) i:hover ~ i:not(.active):after,
.ba-item-reviews .ba-review-stars-wrapper:not(.logout-reviews-user) i:hover ~ i:not(.active),
.ba-item-star-ratings .stars-wrapper i:hover ~ i:after,
.ba-item-star-ratings .stars-wrapper i:hover ~ i {
    color: inherit !important;
}

.event-calendar-event-item-reviews .ba-blog-post-rating-stars i,
.ba-selected-filter-value i,
.ba-item-fields-filter .ba-checkbox-wrapper i,
.ba-item-recent-reviews .ba-review-stars-wrapper i,
.intro-post-reviews .ba-blog-post-rating-stars i,
.ba-blog-post-reviews .ba-blog-post-rating-stars i,
.ba-item-reviews .ba-review-stars-wrapper i,
.ba-item-star-ratings .zmdi-star {
    cursor: pointer;
    max-width: calc(1em/1.21);
    min-width: calc(1em/1.21);
    position: relative;
}

.event-calendar-event-item-reviews .ba-blog-post-rating-stars i {
    cursor: default !important;
}

.ba-selected-filter-value i:not(:last-child) {
    margin-right: 5px;
}

.ba-item-recent-reviews .ba-review-stars-wrapper i,
.intro-post-reviews .ba-blog-post-rating-stars i,
.ba-blog-post-reviews .ba-blog-post-rating-stars i {
    cursor: default !important;
}

.intro-post-reviews .ba-blog-post-rating-stars i,
.ba-blog-post-reviews .ba-blog-post-rating-stars i {
    font-size: 18px;
}

.event-calendar-event-item-reviews .ba-blog-post-rating-stars i:after,
.ba-selected-filter-value i:after,
.ba-item-fields-filter .ba-checkbox-wrapper span i:after,
.intro-post-reviews .ba-blog-post-rating-stars i:after,
.ba-blog-post-reviews .ba-blog-post-rating-stars i:after,
.ba-review-stars-wrapper i:after,
.ba-item-star-ratings .zmdi-star:after {
    content: '\f27d';
    left: 0;
    overflow: hidden;
    position: absolute;
    top: 0;
    z-index: 1;
}

.event-calendar-event-item-reviews .ba-blog-post-rating-stars i.active + i:not(.active):after,
.intro-post-reviews .ba-blog-post-rating-stars i.active + i:not(.active):after,
.ba-blog-post-reviews .ba-blog-post-rating-stars i.active + i:not(.active):after,
.ba-item-reviews  .ba-review-stars-wrapper i.active + i:not(.active):after,
.ba-item-star-ratings .stars-wrapper i.active + i:not(.active):after {
    width: inherit;
}

.event-calendar-event-item-reviews .ba-blog-post-rating-stars i.active + i:not(.active) ~ i:after,
.intro-post-reviews .ba-blog-post-rating-stars i.active + i:not(.active) ~ i:after,
.ba-blog-post-reviews .ba-blog-post-rating-stars i.active + i:not(.active) ~ i:after,
.ba-item-reviews  .ba-review-stars-wrapper i.active + i:not(.active) ~ i:after,
.ba-item-star-ratings .stars-wrapper i.active + i:not(.active) ~ i:after {
    display: none;
}

/*
/* Plugin Image
*/

.ba-item-overlay-section,
.ba-item-image {
    line-height: 0 !important;
}

.ba-logo-wrapper,
.ba-logo-wrapper > a,
.ba-image-wrapper > a,
.ba-image-wrapper {
    line-height: 0;
    display: block;
}

.ba-image-wrapper {
    box-sizing: border-box;
    max-width: 100%;
}

.ba-image-wrapper img.ba-lightbox-item-image {
    cursor: zoom-in;
}

.ba-image-modal.instagram-modal > div,
body > .ba-image-modal {
    cursor: zoom-out;
    left: 0;
    position: fixed;
    top: 0;
    transition: all .5s ease-in-out;
    z-index: 10000;
}

@keyframes instagram-modal-in {
    from { background-color: transparent; }
}

.ba-image-modal.instagram-modal {
    animation: instagram-modal-in .5s linear both;
    bottom: 0;
    left: 0;
    position: fixed;
    right: 0;
    top: 0;
    transform: translate3d(0, 0, 0);
}

.ba-image-modal.instagram-modal i {
    z-index: 99999;
}

body > .ba-image-modal:not(.instagram-modal) {
    height: 0 !important;
}

@keyframes image-radius {
    to {border-radius:0;}
}

.ba-image-modal.instagram-modal > div,
.ba-image-modal img {
    animation: image-radius .5s ease-in-out both;
    width: 100%;
}

.ba-image-modal img {
    position: absolute;
    transition: all .5s;
}

@keyframes image-radius-out {
    from {border-radius:0;}
}

.ba-image-modal.image-lightbox-out img {
    animation: image-radius-out .5s ease-in-out both;
}

@keyframes image-modal {
    from { opacity: 0; }
    to {opacity: 1;}
}

.ba-image-modal:not(.instagram-modal):before {
    animation: image-modal .5s ease-in-out both;
    background-color: inherit;
    bottom: 0;
    content: "";
    left: 0;
    position: fixed;
    right: 0;
    top: 0;
    z-index: -1;
}

@keyframes image-modal-out {
    from {opacity: 1;}
    to { opacity: 0; }
}

.ba-image-modal.image-lightbox-out:before {
    animation: image-modal-out .5s linear both;
}

@keyframes instagram-modal-out {
    to { background-color: transparent; }
}

.ba-image-modal.instagram-modal.image-lightbox-out {
    animation: instagram-modal-out .5s ease-in-out both;
}

.ba-item-image-field .ba-image-wrapper,
.ba-item-overlay-section .ba-image-wrapper,
.ba-item-image .ba-image-wrapper {
    display: inline-block;
    position: relative;
}

.ba-item-image-field .ba-image-wrapper img,
.ba-item-overlay-section .ba-image-wrapper img,
.ba-item-image .ba-image-wrapper img {
    border-radius: inherit;
    width: 100%;
}

.ba-item-image .ba-image-wrapper > a {
    transition-duration: inherit;
}

/* Carousel */
.carousel-modal.image-lightbox-out .instagram-fade-animation {
    animation: instagram-out .3s both ease-in-out !important;
    opacity: 1;
}

/*
/* Edit Page Button
*/


.com_gridbox .edit-page {
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    background: #2c2c2c;
    border-radius: 6px;
    bottom: 70px;
    color: #fff;
    display: block;
    font-family: 'Roboto', sans-serif;
    font-size: 14px;
    font-weight: 500;
    letter-spacing: normal;
    line-height: 24px;
    opacity: 0;
    padding: 15px;
    pointer-events: none;
    position: fixed;
    text-align: center;
    visibility: hidden;
    width: 100px;
    z-index: 1100;
}

.edit-page-btn {
    align-items: center;
    background: #f64231;
    box-shadow: 0 5px 12px rgba(0,0,0,0.23);
    color: #fff;
    border-radius: 60px;
    bottom: 45px;
    letter-spacing: 0;
    display: flex;
    height: 60px;
    left: calc(100vw - 120px);
    position: fixed;
    justify-content: center;
    width: 60px;
    z-index: 1500;
}

.lightbox-open .edit-page-btn {
    right: 60px;
}

.edit-page-btn i {
    font-size: 24px;
}

.edit-page-btn:hover i {
    color: #fff;
    transform: rotate(360deg);
}

.edit-page-btn i {
    transition: all .3s linear;
}

.ba-submit-comment .ba-tooltip {
    font-size: 14px ;
    font-weight: 500;
    line-height: 24px;
}

.com_gridbox.lightbox-open .edit-page-btn .edit-page {
    right: 25px;
}

.com_gridbox .edit-page:before {
    border: 5px solid transparent;
    border-top: 5px solid rgba(34,34,34,0.95);
    bottom: -10px;
    content: "";
    height: 0;
    left: 50%  !important;
    margin-left: -5px;
    position: absolute;
}

.com_gridbox .edit-page-btn:hover .edit-page {
    bottom: 115px;
    opacity: 1;
    visibility: visible;
    transition: all .3s linear;
}

/* ========================================================================
    Tooltip
 ========================================================================== */
.ba-cart-product-quantity-cell .ba-variation-notice,
.ba-add-to-cart-quantity .ba-variation-notice,
* > .ba-tooltip {
    background: #2c2c2c;
    border-radius: 4px;
    bottom: calc(100% + 10px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.3);
    color: #fff;
    display: none!important;
    font-size: 14px ;
    font-weight: 500;
    left: 50%;
    letter-spacing: normal;
    line-height: 24px;
    margin-left: -250px;
    max-width: 250px;
    padding: 15px;
    pointer-events: none;
    position: absolute !important;
    text-align: center;
    transform: translateX(calc(250px - 50%));
    will-change: transform;
    z-index: 99999 !important;
}

@keyframes tooltip {
    from { opacity: 0; }
}

.ba-cart-product-quantity-cell .ba-variation-notice,
.ba-add-to-cart-quantity .ba-variation-notice,
*:hover > .ba-tooltip:not(.ba-help) {
    animation: tooltip .3s ease-in-out both!important;
    display: flex!important;
    text-transform: initial;
    width: auto;
}

.ba-cart-product-quantity-cell .ba-variation-notice:before,
.ba-add-to-cart-quantity .ba-variation-notice:before,
.ba-variation-notice:before,
.ba-comment-share-dialog .ba-comments-modal-body:before,
.ba-tooltip:before {
    border: 5px solid transparent;
    border-top: 5px solid #2c2c2c;
    bottom: -9px;
    content: "";
    height: 0;
    right: auto !important;
    left: 50% !important;
    margin-left: -5px;
    position: absolute;
    top: auto;
}

.carousel-type .ba-blog-post-wishlist-wrapper .ba-tooltip,
.visible-horizontal-filters-value .ba-tooltip,
.ba-tooltip.ba-left {
    bottom: 50%;
    left: auto;
    right: calc(100% + 5px);
    transform: translateY(50%);
}

.ba-comment-share-dialog .ba-comments-modal-body:before {
    left: 97px !important;
}

.ba-variation-notice {
    animation: tooltip .3s ease-in-out both!important;
    background: #2c2c2c;
    border-radius: 4px;
    bottom: 50%;
    box-shadow: 0 10px 30px rgba(0,0,0,0.3);
    color: #fff;
    display: flex!important;
    font-size: 14px;
    font-weight: 500;
    letter-spacing: normal;
    line-height: 24px;
    max-width: 250px;
    padding: 15px;
    pointer-events: none;
    position: absolute !important;
    right: calc(100% + 15px);
    text-align: center;
    text-transform: initial;
    transform: translateY(50%);
    white-space: nowrap;
    width: auto;
    z-index: 99999 !important;
}

.carousel-type .ba-blog-post-wishlist-wrapper .ba-tooltip:before,
.visible-horizontal-filters-value .ba-tooltip:before,
.ba-tooltip.ba-left:before,
.ba-variation-notice:before {
    border: 5px solid transparent;
    border-left: 5px solid #2c2c2c;
    bottom: calc(50% - 5px);
    content: "";
    height: 0;
    right: -9px !important;
    position: absolute;
    top: auto;
    left: auto !important;
}

.visible-horizontal-filters-value .ba-field-filter-value-wrapper > .ba-filter-color-value:nth-child(5n+5),
.visible-horizontal-filters-value .ba-field-filter-value-wrapper > .ba-filter-image-value:nth-child(5n+5) {
    margin: 0;
}

.visible-horizontal-filters-value .ba-field-filter-value-wrapper > .ba-filter-color-value:nth-child(5n+1) .ba-tooltip,
.visible-horizontal-filters-value .ba-field-filter-value-wrapper > .ba-filter-color-value:nth-child(5n+2) .ba-tooltip,
.visible-horizontal-filters-value .ba-field-filter-value-wrapper > .ba-filter-color-value:first-child .ba-tooltip,
.visible-horizontal-filters-value .ba-field-filter-value-wrapper > .ba-filter-color-value:nth-child(2) .ba-tooltip,
.visible-horizontal-filters-value .ba-field-filter-value-wrapper > .ba-filter-image-value:nth-child(5n+1) .ba-tooltip,
.visible-horizontal-filters-value .ba-field-filter-value-wrapper > .ba-filter-image-value:nth-child(5n+2) .ba-tooltip,
.visible-horizontal-filters-value .ba-field-filter-value-wrapper > .ba-filter-image-value:first-child .ba-tooltip,
.visible-horizontal-filters-value .ba-field-filter-value-wrapper > .ba-filter-image-value:nth-child(2) .ba-tooltip {
    left: calc(100% + 5px);
    margin-left: 0 !important;
    right: auto;
}

.visible-horizontal-filters-value .ba-field-filter-value-wrapper > .ba-filter-color-value:nth-child(5n+1) .ba-tooltip:before,
.visible-horizontal-filters-value .ba-field-filter-value-wrapper > .ba-filter-color-value:nth-child(5n+2) .ba-tooltip:before,
.visible-horizontal-filters-value .ba-field-filter-value-wrapper > .ba-filter-color-value:first-child .ba-tooltip:before,
.visible-horizontal-filters-value .ba-field-filter-value-wrapper > .ba-filter-color-value:nth-child(2) .ba-tooltip:before,
.visible-horizontal-filters-value .ba-field-filter-value-wrapper > .ba-filter-image-value:nth-child(5n+1) .ba-tooltip:before,
.visible-horizontal-filters-value .ba-field-filter-value-wrapper > .ba-filter-image-value:nth-child(5n+2) .ba-tooltip:before,
.visible-horizontal-filters-value .ba-field-filter-value-wrapper > .ba-filter-image-value:first-child .ba-tooltip:before,
.visible-horizontal-filters-value .ba-field-filter-value-wrapper > .ba-filter-image-value:nth-child(2) .ba-tooltip:before {
    border-right: 5px solid #2c2c2c;
    border-left: 5px solid transparent;
    right: 100% !important;
}

.ba-cart-product-quantity-cell .ba-variation-notice,
.ba-add-to-cart-quantity .ba-variation-notice {
    right: auto !important;
}

/* Fix for gallery tooltip */
body .ba-edit-gallery-btn {
    overflow: visible;
}

body > .ba-tooltip.ba-top:not(.ba-help) {
    display: none!important
}

.ba-item-field-group .ba-field-wrapper.ba-label-position-left .ba-field-label .ba-tooltip {
    white-space: normal;
}

/* ========================================================================
    Checkout
 ========================================================================== */
.ba-checkout-login-wrapper input,
.ba-item-checkout-form .ba-checkout-form-field-wrapper textarea,
.ba-item-checkout-form .ba-checkout-form-field-wrapper input,
.ba-item-checkout-form .ba-checkout-form-field-wrapper select {
    box-sizing: border-box;
    height: auto;
    width: 100%;
}

.ba-checkout-form-fields .ba-checkbox-wrapper > span {
    width: 100% !important;
}

.ba-item-checkout-form .ba-checkout-form-field-wrapper textarea {
    min-height: 200px;
    resize: vertical;
}

.ba-checkout-order-form-row.ba-checkout-order-form-shipping,
.ba-checkout-order-form-row.ba-checkout-order-form-payment {
    align-items: flex-start;
    display: flex;  
    margin-bottom: 15px;
}

.ba-checkout-order-form-shipping:not(.selected) .ba-checkout-order-description,
.ba-checkout-order-form-payment:not(.selected) .ba-checkout-order-description {
    height: 0;
}

.ba-checkout-order-form-shipping .ba-checkout-order-description,
.ba-checkout-order-form-payment .ba-checkout-order-description {
    overflow: hidden;
    transition: height .3s linear;
}

.ba-checkout-order-form-payment.selected .ba-checkout-order-description {
    height: var(--description-height);
}

.ba-checkout-order-form-shipping .ba-checkout-order-description {
    height: var(--description-height);
}

.ba-checkout-order-form-shipping .ost-delivery-time-wrapper,
.ba-checkout-order-form-shipping .ost-delivery-time-wrapper span {
    font-size: calc(var(--field-font-size) * .85);
    line-height: normal;
    margin-bottom: 10px;
}

.ba-checkout-order-form-payment .ba-checkout-order-description .ba-checkout-order-description-inner > *{
    padding-top: 10px;
}

.ba-checkout-order-form-payment .ba-checkout-order-description * {
    line-height: 22px;
}

.ba-checkout-order-form-row.ba-checkout-order-form-shipping .ba-checkout-order-row-title-wrapper,
.ba-live-search-product-title-cell,
.ba-checkout-order-product-title-cell,
.ba-checkout-order-form-row.ba-checkout-order-form-shipping .ba-checkout-order-shipping-title,
.ba-checkout-order-form-row.ba-checkout-order-form-payment .ba-checkout-order-row-title ,
.ba-checkout-order-form-row.ba-checkout-order-form-shipping .ba-checkout-order-row-title {
    flex-grow: 1;
}

.ba-live-search-product-title-cell {
    padding-left: 15px;
}

.ba-checkout-order-form-section.ba-checkout-order-form-total-wrapper,
.ba-checkout-order-form-title-wrapper {
    margin: 50px 0 25px 0;
}

.ba-checkout-order-form-wrapper {
    text-align: left;
}

.ba-checkout-order-form-orders-wrapper .ba-checkout-order-form-title-wrapper {
    margin-top: 0;
}

.ba-checkout-form-field-wrapper .ba-radio,
.ba-checkout-order-form-row.ba-checkout-order-form-payment .ba-radio,
.ba-checkout-order-form-row.ba-checkout-order-form-shipping .ba-radio {
    height: 50px;
    margin: 0 5px 0 0;
    position: relative;
    width: 50px;
}

.ba-checkout-order-form-row.ba-checkout-order-form-shipping .ba-radio {
    height: var(--field-line-height);
    min-width: 50px;   
}

.ba-checkout-order-form-row.ba-checkout-order-form-payment .ba-radio {
    height: var(--field-line-height);
    min-width: 50px;   
}

.ba-checkout-form-field-wrapper .ba-radio span:hover:before,
.ba-checkout-order-form-row.ba-checkout-order-form-shipping .ba-radio span:hover:before,
.ba-checkout-order-form-row.ba-checkout-order-form-payment .ba-radio span:hover:before {
    border: 2px solid var(--primary);
}

.ba-checkout-form-field-wrapper .ba-radio span:before,
.ba-checkout-order-form-row.ba-checkout-order-form-shipping .ba-radio span:before,
.ba-checkout-order-form-row.ba-checkout-order-form-payment .ba-radio span:before {
    transition: none !important;
}

.ba-checkout-form-field-wrapper .ba-radio span:before,
.ba-checkout-order-form-row.ba-checkout-order-form-shipping .ba-radio span:before,
.ba-checkout-order-form-row.ba-checkout-order-form-payment .ba-radio span:before {
    background: transparent;
    border-radius: 50%;
    box-sizing: border-box;
    border: 2px solid #333;
    content: "";
    display: block;
    height: 22px;
    left: calc(50% - 11px);
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    transition: all .3s;
    width: 22px;
}

.ba-checkout-form-field-wrapper .ba-radio span:before,
.ba-checkout-order-form-row.ba-checkout-order-form-payment .ba-radio span:before,
.ba-checkout-order-form-row.ba-checkout-order-form-shipping .ba-radio span:before {
    background: rgba(214, 214, 214, 0.4);
    border: 2px solid transparent;
}

.ba-checkout-form-field-wrapper .ba-radio input,
.ba-checkout-order-form-row.ba-checkout-order-form-payment .ba-radio input,
.ba-checkout-order-form-row.ba-checkout-order-form-shipping .ba-radio input {
    display: none;
}

.ba-checkout-form-field-wrapper .ba-radio input[type="radio"]:checked + span:before,
.ba-checkout-order-form-row.ba-checkout-order-form-payment .ba-radio input[type="radio"]:checked + span:before,
.ba-checkout-order-form-row.ba-checkout-order-form-shipping .ba-radio input[type="radio"]:checked + span:before {
    border-color: var(--primary);
}

.ba-checkout-form-field-wrapper .ba-radio input[type="radio"]:checked + span:before,
.ba-checkout-order-form-row.ba-checkout-order-form-payment .ba-radio input[type="radio"]:checked + span:before,
.ba-checkout-order-form-row.ba-checkout-order-form-shipping .ba-radio input[type="radio"]:checked + span:before {
    border-radius: 50%;
    background: var(--primary);
    display: block;
    color: var(--bg-primary);
    height: 22px;
    left: calc(50% - 11px);
    opacity: 1;
    content: '\f26b';
    position: absolute;
    width: 22px;
    font: normal normal normal 18px/18px 'Material-Design-Iconic-Font';
    padding-left: 2px;
}

.ba-checkout-order-form-section.ba-checkout-order-form-total-wrapper > div {
    align-items: center;
    display: flex !important;
    justify-content: space-between;
    margin-bottom: 10px;
}

.ba-checkout-order-form-section.ba-checkout-order-form-total-wrapper .ba-checkout-order-form-row-title {
    display: flex;
}

.ba-checkout-order-form-section.ba-checkout-order-form-total-wrapper .ba-checkout-order-form-row-title > span:not(:first-child) {
    margin-left: 5px;
}

.ba-authorize-pay-btn,
.ba-checkout-order-form-section.ba-checkout-order-form-total-wrapper .ba-checkout-place-order .ba-checkout-place-order-btn {
    align-items: center;
    background: var(--primary);
    color: var(--title-inverse);
    cursor: pointer;
    display: flex;
    justify-content: center;
    margin-top: 35px;
    padding: 20px 0;
    transition: .3s;
    width: 100%;
}

.ba-authorize-pay-btn:hover,
.ba-checkout-order-form-section.ba-checkout-order-form-total-wrapper .ba-checkout-place-order .ba-checkout-place-order-btn:hover {
    background-color: var(--hover);
    color: var(--title-inverse);
}

.ba-checkout-place-order-btn {
    position: relative;
}

@keyframes spinner {
    0% {transform: rotate(0deg);}100% {transform: rotate(360deg);}
}

.ba-checkout-place-order-btn:before{
    animation: spinner 1.1s infinite linear;
    border-radius: 50%;
    border: .2em solid transparent;
    border-left: .2em solid var(--title-inverse);
    box-sizing: border-box;
    content: "";
    height: 28px;
    left: calc(50% - 14px);
    opacity: 0;
    pointer-events: none;
    position: absolute;
    top: calc(50% - 14px);
    transition: .3s;
    width: 28px;
    z-index: 100 !important;
}

.ba-checkout-place-order-btn.ba-checkout-btn-animation-in:before {
    opacity: 1;
    transition: .3s .5s;
}

.ba-checkout-place-order-btn.ba-checkout-btn-animation-in * {
    opacity: 0;
    transition: .3s 0s;
}

.ba-checkout-place-order-btn span {
    transition: .3s;
}

.ba-checkout-form-klarna-modal,
.ba-checkout-form-authorize-modal,
.ba-checkout-form-modal-backdrop,
.ba-checkout-form-paypal-modal {
    bottom: 0;
    left: 0;
    opacity: 0;
    overflow: auto;
    pointer-events: none;
    position: fixed;
    right: 0;
    top: 0;
    z-index: 1090;
}

.ba-checkout-form-klarna-modal.ba-visible-checkout-modal,
.ba-checkout-form-klarna-modal.ba-visible-checkout-modal .ba-checkout-form-modal-backdrop,
.ba-checkout-form-authorize-modal.ba-visible-checkout-modal .ba-checkout-form-modal-backdrop,
.ba-checkout-form-authorize-modal.ba-visible-checkout-modal,
.ba-checkout-form-paypal-modal.ba-visible-checkout-modal .ba-checkout-form-modal-backdrop,
.ba-checkout-form-paypal-modal.ba-visible-checkout-modal {
    opacity: 1;
    pointer-events: all;
    width: calc(100% - var(--checkout-modal-scroll));
}

.ba-checkout-form-klarna-modal.ba-visible-checkout-modal .ba-checkout-form-modal-backdrop,
.ba-checkout-form-authorize-modal.ba-visible-checkout-modal .ba-checkout-form-modal-backdrop,
.ba-checkout-form-paypal-modal.ba-visible-checkout-modal .ba-checkout-form-modal-backdrop {
    background: rgba(0,0,0,.25);
    overflow-y: hidden;
    width: calc(100% - var(--checkout-modal-scroll));
    z-index: 1050;
}

.ba-checkout-form-klarna-modal.ba-visible-checkout-modal .ba-checkout-form-modal,
.ba-checkout-form-authorize-modal.ba-visible-checkout-modal .ba-checkout-form-modal,
.ba-checkout-form-paypal-modal.ba-visible-checkout-modal .ba-checkout-form-modal {
    pointer-events: all !important;
}

.ba-checkout-form-klarna-modal.ba-visible-checkout-modal .ba-checkout-form-modal {
    margin: 25px 0;
    top: 0;
}

.ba-checkout-form-klarna-modal.ba-visible-checkout-modal, {
    width: 100%;
}

.ba-authorize-fields-wrapper {
    display: flex;
    justify-content: space-between;
}

.ba-authorize-fields-wrapper .ba-authorize-field-wrapper {
    width: 70%;
}

.ba-authorize-fields-wrapper .ba-authorize-field-wrapper + .ba-authorize-field-wrapper {
    margin-left: 25px;
    width: calc(30% - 25px);
}

.ba-checkout-form-modal {
    background: #fff;
    border-radius: 6px;
    box-shadow: 0 15px 40px rgba(0,0,0,.15);
    box-sizing: border-box;
    display: block;
    left: calc(50% - 225px);
    margin: 0;
    min-height: auto;
    overflow: hidden;
    position: absolute;
    top: calc(50% - 188px);
    width: 450px;
    z-index: 1060;
    max-width: 90%;
}

.ba-checkout-form-klarna-modal .ba-checkout-form-modal {
    left: calc(50% - 325px);
    width: 650px;
}

body.com_gridbox.system.ba-checkout-modal-opened {
    overflow: hidden;
    width: calc(100vw - var(--checkout-modal-body-scroll));
}

@media (max-width: 530px) {
    .ba-checkout-form-authorize-modal .ba-checkout-form-modal-body, 
    .ba-checkout-form-paypal-modal .ba-checkout-form-modal-body {
        padding: 25px !important;
    }

    .ba-checkout-form-modal {
        left: 5%;   
    }
}

.ba-checkout-form-paypal-modal .ba-checkout-form-modal {
    top: calc(50% - 160px);
}

.ba-checkout-form-authorize-modal .ba-checkout-form-modal {
    top: calc(50% - 190px);
}

.ba-checkout-form-klarna-modal .ba-checkout-form-modal-header,
.ba-checkout-form-authorize-modal .ba-checkout-form-modal-header,
.ba-checkout-form-paypal-modal .ba-checkout-form-modal-header {
    align-items: center;
    background: transparent;
    color: #212121;
    display: flex;
    justify-content: space-between;
    padding: 25px;
}

.ba-checkout-form-klarna-modal .ba-checkout-form-modal-header .ba-checkout-form-modal-title,
.ba-checkout-form-authorize-modal .ba-checkout-form-modal-header .ba-checkout-form-modal-title,
.ba-checkout-form-paypal-modal .ba-checkout-form-modal-header .ba-checkout-form-modal-title {
    font-size: 18px;
    font-weight: 500;
    color: #212121;
}

.ba-checkout-form-klarna-modal .ba-checkout-form-modal-header i,
.ba-checkout-form-authorize-modal .ba-checkout-form-modal-header i,
.ba-checkout-form-paypal-modal .ba-checkout-form-modal-header i {
    color: #212121 !important;
    cursor: pointer;
    float: right;
    font-size: 24px;
    text-align: center;
    transition: .3s;
    width: 24px;
}

.ba-checkout-form-klarna-modal .ba-checkout-form-modal-body, 
.ba-checkout-form-authorize-modal .ba-checkout-form-modal-body,
.ba-checkout-form-paypal-modal .ba-checkout-form-modal-body {
    padding: 50px;
}

.ba-checkout-form-klarna-modal .ba-checkout-form-modal-body {
    padding-top: 0;
}

.ba-item-checkout-form.ba-item .ba-checkout-form-wrapper {
    display: flex;
    flex-wrap: wrap;
    margin: 0 -10px;
}

.ba-item-checkout-form.ba-item .ba-checkout-form-wrapper .ba-checkout-form-fields {
    --ba-checkout-field-width: 100%;
    padding: 0 10px;
    box-sizing: border-box;
    width: var(--ba-checkout-field-width);
}

.ba-checkout-form-fields[data-type="country"] .ba-checkout-form-field-wrapper {
    display: flex;
    justify-content: space-between;
}

.ba-checkout-form-fields[data-type="country"] .ba-checkout-form-field-wrapper > select {
    box-sizing: border-box;
    flex-grow: 1;
    width: 100%;
}

.ba-checkout-form-fields[data-type="country"] .ba-checkout-form-field-wrapper.visible-region-select select {
    max-width: calc(50% - 10px);  
}

.ba-checkout-form-fields[data-type="country"] .ba-checkout-form-field-wrapper:not(.visible-region-select) select + select {
    display: none;
}

.ba-item-checkout-form {
    margin-bottom: var(--margin-bottom);
    margin-top: var(--margin-top);
}

.ba-item-checkout-form .ba-checkout-form-title-wrapper {
    text-align: var(--title-text-align);
}

.ba-checkout-order-form-tax,
.ba-account-wrapper > .nav-tabs li > a *:not(i),
.ba-account-wrapper > .nav-tabs li > a,
.ba-account-profile-title-wrapper *,
.ba-checkout-form-title-wrapper *,
.ba-checkout-order-form-total-wrapper .ba-checkout-order-form-shipping *,
.ba-checkout-order-form-subtotal *,
.ba-checkout-order-form-discount *,
.ba-checkout-order-product-title,
.ba-show-registration-dialog,
.ba-checkout-authentication-backdrop .ba-checkout-authentication-label span,
.ba-item-checkout-form .ba-checkout-form-title-wrapper span {
    color: var(--title-color);
    font-family: var(--title-font-family);
    font-size: var(--title-font-size);
    font-style: var(--title-font-style);
    font-weight: var(--title-font-weight);
    letter-spacing: var(--title-letter-spacing);
    line-height: var(--title-line-height);
    text-decoration: var(--title-text-decoration);
    text-transform: var(--title-text-transform);
}

.ba-show-registration-dialog {
    cursor: pointer;
    margin-top: 35px;
    text-align: center;
    transition: opacity .3s;
}

.ba-authorize-field-wrapper input,
.ba-my-account-profile .ba-account-profile-field-wrapper input,
.ba-my-account-billing-details .ba-checkout-form-fields select, 
.ba-my-account-billing-details .ba-checkout-form-fields input, 
.ba-checkout-authentication-input input,
.ba-item-checkout-form .ba-checkout-form-field-wrapper textarea,
.ba-item-checkout-form .ba-checkout-form-field-wrapper .ba-checkbox-wrapper >span,
.ba-item-checkout-form .ba-checkout-form-field-wrapper select,
.ba-item-checkout-form .ba-checkout-form-field-wrapper input  {
    background-color: var(--background-color);
    border-bottom-width: var(--border-bottom-width);
    border-color: var(--border-color);
    border-left-width: var(--border-left-width);
    border-radius: var(--border-radius);
    border-right-width: var(--border-right-width);
    border-style: var(--border-style);
    border-top-width: var(--border-top-width);
}


.ba-authorize-field-wrapper input::-webkit-input-placeholder,  
.ba-authorize-field-wrapper input, 
.ba-my-account-profile .ba-account-profile-field-wrapper input, 
.ba-my-account-billing-details .ba-checkout-form-fields select, 
.ba-my-account-billing-details .ba-checkout-form-fields input,
.ba-my-account-profile .ba-account-profile-field-wrapper input::-webkit-input-placeholder, 
.ba-my-account-billing-details .ba-checkout-form-fields input::-webkit-input-placeholder,
.ba-checkout-order-form-shipping *,
.ba-checkout-order-row-title,
.ba-checkout-order-product-extra-options, 
.ba-wishlist-product-extra-options, 
.ba-cart-product-extra-options, 
.ba-checkout-order-description *:not(a), 
.ba-cart-checkout-row.ba-cart-checkout-includes-tax .ba-cart-checkout-title > span, 
.ba-checkout-order-form-section.ba-checkout-order-form-total-wrapper .ba-checkout-order-form-row-title > span, 
.ba-checkout-order-product-info, 
.ba-wishlist-product-info, 
.ba-cart-product-info,
.ba-checkout-authentication-input input,
.ba-item-checkout-form .ba-checkout-form-field-wrapper textarea,
.ba-item-checkout-form .ba-checkout-form-field-wrapper .ba-checkbox-wrapper >span,
.ba-item-checkout-form .ba-checkout-form-field-wrapper select,
.ba-item-checkout-form .ba-checkout-form-field-wrapper input,
.ba-item-checkout-form .ba-checkout-form-field-wrapper input::-webkit-input-placeholder,
.ba-item-checkout-form .ba-checkout-form-field-wrapper textarea::-webkit-input-placeholder {
    color: var(--field-color);
    font-family: var(--field-font-family);
    font-size: var(--field-font-size);
    font-style: var(--field-font-style);
    font-weight: var(--field-font-weight);
    letter-spacing: var(--field-letter-spacing);
    line-height: var(--field-line-height);
    text-align: var(--field-text-align);
    text-decoration: var(--field-text-decoration);
    text-transform: var(--field-text-transform);
}

.ba-account-title-wrapper,
.ba-checkout-order-form-section.ba-checkout-order-form-total-wrapper > .ba-checkout-order-form-total,
.ba-checkout-order-form-title-wrapper,
.ba-checkout-order-form-total .ba-checkout-order-price-wrapper,
.ba-checkout-authentication-title,
.ba-checkout-form-fields[data-type="headline"] .ba-checkout-form-title-wrapper .ba-checkout-form-title {
    color: var(--headline-color);
    display: block;
    font-family: var(--headline-font-family);
    font-size: var(--headline-font-size);
    font-style: var(--headline-font-style);
    font-weight: var(--headline-font-weight);
    letter-spacing: var(--headline-letter-spacing);
    line-height: var(--headline-line-height);
    text-align: var(--headline-text-align);
    text-decoration: var(--headline-text-decoration);
    text-transform: var(--headline-text-transform);
}

.ba-checkout-order-form-total .ba-checkout-order-price-wrapper{
    letter-spacing: normal;
}

.ba-item-checkout-form .ba-checkout-form-field-wrapper input::-webkit-input-placeholder,
.ba-item-checkout-form .ba-checkout-form-field-wrapper textarea::-webkit-input-placeholder {
    opacity: .5;
}

.ba-item-checkout-form .ba-checkout-form-field-wrapper select {
    height: calc(var(--field-line-height) + 12px - var(--border-top-width) - var(--border-bottom-width));
    margin-bottom: 10px;
    overflow: hidden;
    text-overflow: ellipsis;
}

.ba-item-checkout-form .ba-checkout-form-field-wrapper .ba-checkbox-wrapper .ba-checkbox {
    width: auto;
}

.ba-item-checkout-form .ba-checkout-form-field-wrapper .ba-radio {
    height: auto;
    left: 11px;
    margin: -1px 0 0;
    position: absolute;
    top: calc(var(--field-line-height)/2 );
    width: auto;
}

.ba-item-checkout-form .ba-checkout-form-field-wrapper .ba-checkbox-wrapper {
    position: relative;
}

.ba-checkbox-wrapper.acceptance-checkbox-wrapper {
    display: block !important;
    margin-bottom: 0!important;
}

.ba-authorize-pay-btn,
.ba-authorize-field-wrapper input {
    width: 100%;
}

.ba-authorize-pay {
    margin-right: 5px;
}

.ba-authorize-pay-btn .ba-checkout-order-price-wrapper{
    font-size: initial;
    font-weight: inherit;
    letter-spacing: initial;
    line-height: initial;
}

/* ========================================================================
    404 Page
 ========================================================================== */

.error {
    align-items: center;
    display: flex;
    flex-direction: column;
    height: 100vh;
    justify-content: center;
    margin:-100px 0 !important;
 }

.error h1 {
    color: #161616;
    font: normal bold 125px/90px 'Poppins';
    letter-spacing: -4px;
    margin: 0 0 25px 0;
    text-align: center;
    text-decoration: none;
    text-transform: none;
}

.error p {
    color: #95a2b5;
    font: normal 300 26px/36px 'Roboto Condensed';
    letter-spacing: -0.5px;
    text-align: center;
    text-decoration: none;
    text-transform: none;
    margin: 0;
}

.error a.btn {
    background-color: #51d151;
    border-radius: 50px;
    border: 0px solid #d7d7d7;
    box-shadow: 0 10px 20px 0 rgba(0, 0, 0, 0.15);
    color: #fff;
    font: normal 500 12px/25px 'Poppins';
    letter-spacing: 0px;
    margin-top: 25px;
    padding: 10px 30px;
    text-align: center;
    text-decoration: none;
    text-transform: none;
    transition: all .3s cubic-bezier(0.4,0,0.2,1);
}

.error a.btn:hover {
    background: #161616;
}

.error .search input {
    margin: 25px 0;
}

.error .search input:focus,
.error .search input {
    border-bottom-color: #e3e3e3 !important;
    border: 1px solid #fff !important;
    box-shadow: none;
    box-sizing: border-box;
    color: #1a1a1a;
    font-size: 18px ;
    font-weight: 400;
    height: 45px;
    line-height: 45px;
    margin: 25px 0;
    padding: 4px 6px;
}

.error .search + .focus-underline {
    background: #1da6f4;
    height: 2px;
    position: absolute;
    top: calc(50vh + 52px);
    transform: scaleX(0);
    transition: all .3s cubic-bezier(0.4,0,0.2,1);
    width: 250px;
}

.error .search:hover + .focus-underline {
    transform: scaleX(1);
}

/* ========================================================================
    Default Joomla icons
 ========================================================================== */

@font-face{
    font-family: 'IcoMoon';
    src: url(/media/jui/fonts/IcoMoon.woff) format('woff'),
    url(/media/jui/fonts/IcoMoon.ttf) format('truetype');
    font-weight: normal;
    font-style: normal;
}

body:not(.com_gridbox) [class^="icon-"]:not(.ba-settings-group),
body:not(.com_gridbox) [class*=" icon-"]:not(.ba-settings-group) {
    display: inline-block;
}

[class^="icon-"]:before,
[class*=" icon-"]:before {
    font-family: 'IcoMoon';
    font-style: normal;
    font-weight: normal;
}

.icon-joomla:before {
    content: "\e200";
}

.icon-chevron-up:before,
.icon-uparrow:before,
.icon-arrow-up:before {
    content: "\e005";
}

.icon-chevron-right:before,
.icon-rightarrow:before,
.icon-arrow-right:before {
    content: "\e006";
}

.icon-chevron-down:before,
.icon-downarrow:before,
.icon-arrow-down:before {
    content: "\e007";
}

.icon-chevron-left:before,
.icon-leftarrow:before,
.icon-arrow-left:before {
    content: "\e008";
}

.icon-arrow-first:before {
    content: "\e003";
}

.icon-arrow-last:before {
    content: "\e004";
}

.icon-arrow-up-2:before {
    content: "\e009";
}

.icon-arrow-right-2:before {
    content: "\e00a";
}

.icon-arrow-down-2:before {
    content: "\e00b";
}

.icon-arrow-left-2:before {
    content: "\e00c";
}

.icon-arrow-up-3:before {
    content: "\e00f";
}

.icon-arrow-right-3:before {
    content: "\e010";
}

.icon-arrow-down-3:before {
    content: "\e011";
}

.icon-arrow-left-3:before {
    content: "\e012";
}

.icon-menu-2:before {
    content: "\e00e";
}

.icon-arrow-up-4:before {
    content: "\e201";
}

.icon-arrow-right-4:before {
    content: "\e202";
}

.icon-arrow-down-4:before {
    content: "\e203";
}

.icon-arrow-left-4:before {
    content: "\e204";
}

.icon-share:before,
.icon-redo:before {
    content: "\27";
}

.icon-undo:before {
    content: "\28";
}

.icon-forward-2:before {
    content: "\e205";
}

.icon-backward-2:before,
.icon-reply:before {
    content: "\e206";
}

.icon-unblock:before,
.icon-refresh:before,
.icon-redo-2:before {
    content: "\6c";
}

.icon-undo-2:before {
    content: "\e207";
}

.icon-move:before {
    content: "\7a";
}

.icon-expand:before {
    content: "\66";
}

.icon-contract:before {
    content: "\67";
}

.icon-expand-2:before {
    content: "\68";
}

.icon-contract-2:before {
    content: "\69";
}

.icon-play:before {
    content: "\e208";
}

.icon-pause:before {
    content: "\e209";
}

.icon-stop:before {
    content: "\e210";
}

.icon-previous:before,
.icon-backward:before {
    content: "\7c";
}

.icon-next:before,
.icon-forward:before {
    content: "\7b";
}

.icon-first:before {
    content: "\7d";
}

.icon-last:before {
    content: "\e000";
}

.icon-play-circle:before {
    content: "\e00d";
}

.icon-pause-circle:before {
    content: "\e211";
}

.icon-stop-circle:before {
    content: "\e212";
}

.icon-backward-circle:before {
    content: "\e213";
}

.icon-forward-circle:before {
    content: "\e214";
}

.icon-loop:before {
    content: "\e001";
}

.icon-shuffle:before {
    content: "\e002";
}

.icon-search:before {
    content: "\53";
}

.icon-zoom-in:before {
    content: "\64";
}

.icon-zoom-out:before {
    content: "\65";
}

.icon-apply:before,
.icon-edit:before,
.icon-pencil:before {
    content: "\2b";
}

.icon-pencil-2:before {
    content: "\2c";
}

.icon-brush:before {
    content: "\3b";
}

.icon-save-new:before,
.icon-plus-2:before {
    content: "\5d";
}

.icon-minus-sign:before,
.icon-minus-2:before {
    content: "\5e";
}

.icon-delete:before,
.icon-remove:before,
.icon-cancel-2:before {
    content: "\49";
}

.icon-publish:before,
.icon-save:before,
.icon-ok:before,
.icon-checkmark:before {
    content: "\47";
}

.icon-new:before,
.icon-plus:before {
    content: "\2a";
}

.icon-plus-circle:before {
    content: "\e215";
}

.icon-minus:before,
.icon-not-ok:before {
    content: "\4b";
}

.icon-ban-circle:before,
.icon-minus-circle:before {
    content: "\e216";
}

.icon-unpublish:before,
.icon-cancel:before {
    content: "\4a";
}

.icon-cancel-circle:before {
    content: "\e217";
}

.icon-checkmark-2:before {
    content: "\e218";
}

.icon-checkmark-circle:before {
    content: "\e219";
}

.icon-info:before {
    content: "\e220";
}

.icon-info-2:before,
.icon-info-circle:before {
    content: "\e221";
}

.icon-question:before,
.icon-question-sign:before,
.icon-help:before {
    content: "\45";
}

.icon-question-2:before,
.icon-question-circle:before {
    content: "\e222";
}

.icon-notification:before {
    content: "\e223";
}

.icon-notification-2:before,
.icon-notification-circle:before {
    content: "\e224";
}

.icon-pending:before,
.icon-warning:before {
    content: "\48";
}

.icon-warning-2:before,
.icon-warning-circle:before {
    content: "\e225";
}

.icon-checkbox-unchecked:before {
    content: "\3d";
}

.icon-checkin:before,
.icon-checkbox:before,
.icon-checkbox-checked:before {
    content: "\3e";
}

.icon-checkbox-partial:before {
    content: "\3f";
}

.icon-square:before {
    content: "\e226";
}

.icon-radio-unchecked:before {
    content: "\e227";
}

.icon-radio-checked:before,
.icon-generic:before {
    content: "\e228";
}

.icon-circle:before {
    content: "\e229";
}

.icon-signup:before {
    content: "\e230";
}

.icon-grid:before,
.icon-grid-view:before {
    content: "\58";
}

.icon-grid-2:before,
.icon-grid-view-2:before {
    content: "\59";
}

.icon-menu:before {
    content: "\5a";
}

.icon-list:before,
.icon-list-view:before {
    content: "\31";
}

.icon-list-2:before {
    content: "\e231";
}

.icon-menu-3:before {
    content: "\e232";
}

.icon-folder-open:before,
.icon-folder:before {
    content: "\2d";
}

.icon-folder-close:before,
.icon-folder-2:before {
    content: "\2e";
}

.icon-folder-plus:before {
    content: "\e234";
}

.icon-folder-minus:before {
    content: "\e235";
}

.icon-folder-3:before {
    content: "\e236";
}

.icon-folder-plus-2:before {
    content: "\e237";
}

.icon-folder-remove:before {
    content: "\e238";
}

.icon-file:before {
    content: "\e016";
}

.icon-file-2:before {
    content: "\e239";
}

.icon-file-add:before,
.icon-file-plus:before {
    content: "\29";
}

.icon-file-minus:before {
    content: "\e017";
}

.icon-file-check:before {
    content: "\e240";
}

.icon-file-remove:before {
    content: "\e241";
}

.icon-save-copy:before,
.icon-copy:before {
    content: "\e018";
}

.icon-stack:before {
    content: "\e242";
}

.icon-tree:before {
    content: "\e243";
}

.icon-tree-2:before {
    content: "\e244";
}

.icon-paragraph-left:before {
    content: "\e246";
}

.icon-paragraph-center:before {
    content: "\e247";
}

.icon-paragraph-right:before {
    content: "\e248";
}

.icon-paragraph-justify:before {
    content: "\e249";
}

.icon-screen:before {
    content: "\e01c";
}

.icon-tablet:before {
    content: "\e01d";
}

.icon-mobile:before {
    content: "\e01e";
}

.icon-box-add:before {
    content: "\51";
}

.icon-box-remove:before {
    content: "\52";
}

.icon-download:before {
    content: "\e021";
}

.icon-upload:before {
    content: "\e022";
}

.icon-home:before {
    content: "\21";
}

.icon-home-2:before {
    content: "\e250";
}

.icon-out-2:before,
.icon-new-tab:before {
    content: "\e024";
}

.icon-out-3:before,
.icon-new-tab-2:before {
    content: "\e251";
}

.icon-link:before {
    content: "\e252";
}

.icon-picture:before,
.icon-image:before {
    content: "\2f";
}

.icon-pictures:before,
.icon-images:before {
    content: "\30";
}

.icon-palette:before,
.icon-color-palette:before {
    content: "\e014";
}

.icon-camera:before {
    content: "\55";
}

.icon-camera-2:before,
.icon-video:before {
    content: "\e015";
}

.icon-play-2:before,
.icon-video-2:before,
.icon-youtube:before {
    content: "\56";
}

.icon-music:before {
    content: "\57";
}

.icon-user:before {
    content: "\22";
}

.icon-users:before {
    content: "\e01f";
}

.icon-vcard:before {
    content: "\6d";
}

.icon-address:before {
    content: "\70";
}

.icon-share-alt:before,
.icon-out:before {
    content: "\26";
}

.icon-enter:before {
    content: "\e257";
}

.icon-exit:before {
    content: "\e258";
}

.icon-comment:before,
.icon-comments:before {
    content: "\24";
}

.icon-comments-2:before {
    content: "\25";
}

.icon-quote:before,
.icon-quotes-left:before {
    content: "\60";
}

.icon-quote-2:before,
.icon-quotes-right:before {
    content: "\61";
}

.icon-quote-3:before,
.icon-bubble-quote:before {
    content: "\e259";
}

.icon-phone:before {
    content: "\e260";
}

.icon-phone-2:before {
    content: "\e261";
}

.icon-envelope:before,
.icon-mail:before {
    content: "\4d";
}

.icon-envelope-opened:before,
.icon-mail-2:before {
    content: "\4e";
}

.icon-unarchive:before,
.icon-drawer:before {
    content: "\4f";
}

.icon-archive:before,
.icon-drawer-2:before {
    content: "\50";
}

.icon-briefcase:before {
    content: "\e020";
}

.icon-tag:before {
    content: "\e262";
}

.icon-tag-2:before {
    content: "\e263";
}

.icon-tags:before {
    content: "\e264";
}

.icon-tags-2:before {
    content: "\e265";
}

.icon-options:not(.ba-settings-group):before,
.icon-cog:before {
    content: "\38";
}

.icon-cogs:before {
    content: "\37";
}

.icon-screwdriver:before,
.icon-tools:before {
    content: "\36";
}

.icon-wrench:before {
    content: "\3a";
}

.icon-equalizer:before {
    content: "\39";
}

.icon-dashboard:before {
    content: "\78";
}

.icon-switch:before {
    content: "\e266";
}

.icon-filter:before {
    content: "\54";
}

.icon-purge:before,
.icon-trash:before {
    content: "\4c";
}

.icon-checkedout:before,
.icon-lock:before,
.icon-locked:before {
    content: "\23";
}

.icon-unlock:before {
    content: "\e267";
}

.icon-key:before {
    content: "\5f";
}

.icon-support:before {
    content: "\46";
}

.icon-database:before {
    content: "\62";
}

.icon-scissors:before {
    content: "\e268";
}

.icon-health:before {
    content: "\6a";
}

.icon-wand:before {
    content: "\6b";
}

.icon-eye-open:before,
.icon-eye:before {
    content: "\3c";
}

.icon-eye-close:before,
.icon-eye-blocked:before,
.icon-eye-2:before {
    content: "\e269";
}

.icon-clock:before {
    content: "\6e";
}

.icon-compass:before {
    content: "\6f";
}

.icon-broadcast:before,
.icon-connection:before,
.icon-wifi:before {
    content: "\e01b";
}

.icon-book:before {
    content: "\e271";
}

.icon-lightning:before,
.icon-flash:before {
    content: "\79";
}

.icon-print:before,
.icon-printer:before {
    content: "\e013";
}

.icon-feed:before {
    content: "\71";
}

.icon-calendar:before {
    content: "\43";
}

.icon-calendar-2:before {
    content: "\44";
}

.icon-calendar-3:before {
    content: "\e273";
}

.icon-pie:before {
    content: "\77";
}

.icon-bars:before {
    content: "\76";
}

.icon-chart:before {
    content: "\75";
}

.icon-power-cord:before {
    content: "\32";
}

.icon-cube:before {
    content: "\33";
}

.icon-puzzle:before {
    content: "\34";
}

.icon-attachment:before,
.icon-paperclip:before,
.icon-flag-2:before {
    content: "\72";
}

.icon-lamp:before {
    content: "\74";
}

.icon-pin:before,
.icon-pushpin:before {
    content: "\73";
}

.icon-location:before {
    content: "\63";
}

.icon-shield:before {
    content: "\e274";
}

.icon-flag:before {
    content: "\35";
}

.icon-flag-3:before {
    content: "\e275";
}

.icon-bookmark:before {
    content: "\e023";
}

.icon-bookmark-2:before {
    content: "\e276";
}

.icon-heart:before {
    content: "\e277";
}

.icon-heart-2:before {
    content: "\e278";
}

.icon-thumbs-up:before {
    content: "\5b";
}

.icon-thumbs-down:before {
    content: "\5c";
}

.icon-unfeatured:before,
.icon-asterisk:before,
.icon-star-empty:before {
    content: "\40";
}

.icon-star-2:before {
    content: "\41";
}

.icon-featured:before,
.icon-default:before,
.icon-star:before {
    content: "\42";
}

.icon-smiley:before,
.icon-smiley-happy:before {
    content: "\e279";
}

.icon-smiley-2:before,
.icon-smiley-happy-2:before {
    content: "\e280";
}

.icon-smiley-sad:before {
    content: "\e281";
}

.icon-smiley-sad-2:before {
    content: "\e282";
}

.icon-smiley-neutral:before {
    content: "\e283";
}

.icon-smiley-neutral-2:before {
    content: "\e284";
}

.icon-cart:before {
    content: "\e019";
}

.icon-basket:before {
    content: "\e01a";
}

.icon-credit:before {
    content: "\e286";
}

.icon-credit-2:before {
    content: "\e287";
}

.icon-expired:before {
    content: "\4b";
}

/* ========================================================================
    Plugins Gallery
 ========================================================================== */
.album-in-lightbox-open .ba-row,
.album-in-lightbox-open .ba-row:hover {
    z-index: auto !important;
}

/* ========================================================================
    Page Blocks
 ========================================================================== */

.ba-pull-left,
.ba-pull-right {
    z-index: 1;
    width: auto;
}

.ba-pull-left {
    float: left;
}

.ba-pull-right {
    float: right;
}

.ba-disabled-margin {
    margin: 0 !important;
}

.ba-live-search-add-to-cart-cell > span,
.ba-wishlist-add-to-cart-cell > span:not(.ba-wishlist-empty-stock),
.ba-store-wishlist-close i,
.ba-store-cart-close-wrapper i,
.ba-cart-product-remove-cell i,
.ba-wishlist-product-remove-cell i,
.ba-cart-product-quantity-cell i {
    cursor: pointer;
    transition: background .3s;
}

.ba-close-checkout-modal,
.ba-store-wishlist-close-wrapper i,
.ba-store-cart-close-wrapper i,
.ba-cart-product-quantity-cell i {
    transition: opacity .3s;   
} 

.ba-close-checkout-modal:hover,
.ba-store-wishlist-close-wrapper i:hover,
.ba-store-cart-close-wrapper i:hover,
.ba-cart-product-quantity-cell i:hover {
    opacity: .5;
}

/* ========================================================================
    Store
 ========================================================================== */

.ba-item-wishlist .ba-btn-transition i,
.ba-item-cart .ba-btn-transition i{
    position: relative;
}

.ba-item-wishlist .ba-btn-transition i:not([data-products-count="0"]):after,
.ba-item-cart .ba-btn-transition i:not([data-products-count="0"]):after {
    background: #f64231;
    border-radius: 50%;
    color: #fff;
    content: attr(data-products-count);
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size: 10px;
    font-weight: bold;
    line-height: 16px;
    position: absolute;
    right: -12px;
    text-align: center;
    top: -12px;
    width: 16px;
}

.ba-store-wishlist-backdrop > .ba-store-wishlist-close,
.ba-store-cart-backdrop > .ba-store-cart-close {
    background-color: var(--overlay);
    width: calc(100% - var(--body-scroll-width));
}

.ba-store-cart-backdrop[data-layout="sidebar"] > .ba-store-cart-close {
    width: 100%;
}

.ba-store-wishlist.ba-container:not(.ba-overlay-section),
.ba-store-cart.ba-container:not(.ba-overlay-section) {
    background-color: var(--bg-primary);
    border-radius: 6px;
    box-shadow: 0 30px 60px 0 var(--shadow);
    min-height: 550px;
    overflow-y: auto;
    padding: 0;
    margin: auto 0;
    position: relative;
    width: 800px;
    z-index: 10;
}

.ba-store-cart.ba-container:not(.ba-overlay-section) {
    display: flex;
}

.ba-store-cart-backdrop[data-layout="sidebar"] .ba-store-cart.ba-container:not(.ba-overlay-section) {
    padding: 0;
}

.ba-store-wishlist.ba-container > .row-fluid,
.ba-store-cart.ba-container > .row-fluid {
    display: flex;
    flex-direction: column;
}

.ba-store-cart.ba-container > .row-fluid {
    max-height: 90vh;
    min-height: 550px;
}

[data-layout="sidebar"] .ba-store-cart.ba-container > .row-fluid {
    max-height: 100vh;
}

.ba-store-wishlist-close-wrapper,
.ba-store-cart-close-wrapper {
    text-align: right;
}

.ba-wishlist-checkout,
.ba-cart-checkout {
    padding: 25px 0 0;
    display: flex !important;
    flex-direction: column;
    justify-content: start;
}

.ba-wishlist-checkout {
    border-top: 1px solid #f3f3f3;
}

.ba-wishlist-checkout,
.ba-store-wishlist .ba-wishlist-checkout,
.ba-store-cart .ba-cart-checkout {
    flex-grow: 1;
}

.ba-store-cart .ba-cart-checkout {
    justify-content: flex-end;
}

.ba-cart-checkout-row.ba-cart-checkout-discount {
    align-items: flex-end !important;
    flex-grow: 1;
}

/*Sidebar Store Cart*/
.ba-store-cart-backdrop[data-layout="sidebar"] {
    padding: 0;
    overflow-y: hidden !important;
}

.ba-store-cart-backdrop[data-layout="sidebar"] .ba-store-cart.ba-container:not(.ba-overlay-section) {
    border-radius: 0;
    display: flex;
    margin-bottom: 0;
    min-height: 100vh;
    position: absolute;
    right: 0;
}

.ba-store-cart-backdrop[data-layout="sidebar"] {
    opacity: 1 !important;
    transition: none !important;
}

.ba-store-cart-backdrop[data-layout="sidebar"] .ba-cart-products-list {
    flex-grow: 1;
    height: auto;
    max-height: initial;
    min-height: auto;
}

.ba-store-cart-backdrop[data-layout="sidebar"] .ba-store-cart .ba-cart-checkout {
    flex-grow: 0;
}

.ba-store-cart-backdrop[data-layout="sidebar"] .ba-cart-products-list[data-quantity="0"] {
    display: flex;
    justify-content: center;
    max-height: calc(100vh - 160px);
    min-height: calc(100vh - 160px);
}

.ba-store-cart-backdrop[data-layout="sidebar"] > .ba-store-cart-close,
.ba-store-cart-backdrop[data-layout="sidebar"] .ba-store-cart {
    transition: .3s;
}

@keyframes store-cart-backdrop-in {
    from {opacity: 0;}
    to {opacity: 1;}
}

.ba-store-cart-backdrop[data-layout="sidebar"].ba-visible-store-cart > .ba-store-cart-close {
    animation: store-cart-backdrop-in .3s linear both;
    opacity: 0;
}

@keyframes store-cart-backdrop-out {
    from {opacity: 1;}
    to {opacity: 0;}
}

.ba-store-cart-backdrop[data-layout="sidebar"].ba-store-cart-backdrop-out > .ba-store-cart-close {
    animation: store-cart-backdrop-out .3s linear both;
    opacity: 0;
}

.ba-store-cart-backdrop[data-layout="sidebar"]:not(.ba-visible-store-cart):not(.ba-store-cart-backdrop-out)> .ba-store-cart {
    display: none;
}

@keyframes store-cart-in {
    from { transform: translateX(100%);}
    to { transform: translateX(0%);}
}

.ba-store-cart-backdrop[data-layout="sidebar"].ba-visible-store-cart > .ba-store-cart {
    animation: store-cart-in .3s linear both;
    transform: translateX(100%);
}

@keyframes store-cart-out {
    from {transform: translateX(0%);}
    to {transform: translateX(100%);}
}

.ba-store-cart-backdrop[data-layout="sidebar"].ba-store-cart-backdrop-out > .ba-store-cart {
    animation: store-cart-out .3s linear both;
    transform: translateX(100%);
}

.ba-checkout-order-product-extra-option-price,
.ba-wishlist-product-extra-option-price,
.ba-cart-product-extra-option-price {
    white-space: nowrap;
}

.ba-checkout-order-product-content-inner-cell + .ba-checkout-order-product-extra-options,
.ba-live-search-product-content-inner-cell + .ba-live-search-product-content-inner-cell,
.ba-wishlist-product-content-inner-cell + .ba-wishlist-product-extra-options,
.ba-cart-product-content-inner-cell + .ba-cart-product-extra-options {
    margin-top: 20px;
}

.ba-checkout-order-product-extra-options:not(:last-child),
.ba-wishlist-product-extra-options:not(:last-child),
.ba-cart-product-extra-options:not(:last-child) {
    margin-bottom: 20px;
}

.ba-checkout-order-product-extra-options-title,
.ba-checkout-order-product-extra-option:not(:last-child),
.ba-checkout-order-product-title,
.ba-checkout-order-product-extra-options-title,
.ba-wishlist-product-title,
.ba-wishlist-product-extra-options-title,
.ba-wishlist-product-extra-option:not(:last-child),
.ba-cart-product-title,
.ba-cart-product-extra-options-title,
.ba-cart-product-extra-option:not(:last-child) {
    margin-bottom: 5px;
}

.ba-checkout-order-product-price-cell,
.ba-checkout-order-product-extra-option-price,
.ba-wishlist-product-extra-option-price,
.ba-wishlist-product-price-cell,
.ba-cart-product-extra-option-price,
.ba-cart-product-price-cell {
    min-width: 80px;
    text-align: right;
}

.ba-store-cart-backdrop .ba-cart-product-price-cell {
    display: flex;
    flex-direction: column;
}

.ba-checkout-order-product-price-cell {
    margin-left: 10px;
}

.ba-checkout-order-product-quantity-cell {
    white-space: nowrap;
}

.ba-checkout-order-product-row,
.ba-live-search-product-row,
.ba-wishlist-product-row,
.ba-cart-product-row  {
    padding: 15px 0 ;
}

.ba-checkout-order-product-row:not(:last-child),
.ba-live-search-product-row:not(:last-child),
.ba-wishlist-product-row:not(:last-child),
.ba-cart-product-row:not(:last-child) {
    border-bottom: 1px solid var(--border);
}

.ba-checkout-order-product-extra-option,
.ba-checkout-order-product-row.row-fluid,
.ba-checkout-order-product-content-inner-cell,
.ba-live-search-product-content-inner-cell,
.ba-live-search-product-row,
.ba-wishlist-product-extra-option,
.ba-wishlist-product-content-inner-cell,
.ba-wishlist-product-row,
.ba-cart-product-extra-option,
.ba-cart-product-content-inner-cell,
.ba-cart-product-row {
    align-items: flex-start;
    display: flex;    
}


.ba-checkout-order-product-extra-options,
.ba-wishlist-product-extra-options,
.ba-cart-product-extra-options {
    flex-wrap: wrap;
}

.ba-checkout-order-product-row[data-extra-count="0"],
.ba-checkout-order-product-content-inner-cell,
.ba-cart-product-row[data-extra-count="0"],
.ba-wishlist-product-row[data-extra-count="0"],
.ba-live-search-product-row,
.ba-live-search-product-content-inner-cell,
.ba-wishlist-product-content-inner-cell,
.ba-cart-product-content-inner-cell {
    align-items: center;
}

.ba-checkout-order-product-content-cell,
.ba-live-search-product-content-cell,
.ba-wishlist-product-content-cell,
.ba-cart-product-content-cell {
    align-items: center;
    display: flex;
    flex-wrap: wrap;
}

.ba-wishlist-product-content-cell {
    align-items: flex-start;   
}

.ba-checkout-order-product-extra-options-title,
.ba-checkout-order-product-extra-options,
.ba-checkout-order-product-extra-options-content,
.ba-checkout-order-product-extra-option,
.ba-checkout-order-product-extra-option-value,
.ba-checkout-order-product-extra-options-title,
.ba-checkout-order-product-content-inner-cell,
.ba-live-search-product-content-inner-cell,
.ba-wishlist-product-extra-options,
.ba-wishlist-product-content-inner-cell,
.ba-wishlist-product-extra-options-content,
.ba-wishlist-product-extra-option,
.ba-wishlist-product-extra-option-value,
.ba-wishlist-product-extra-options-title,
.ba-cart-product-extra-options,
.ba-cart-product-content-inner-cell,
.ba-cart-product-extra-options-content,
.ba-cart-product-extra-option,
.ba-cart-product-extra-option-value,
.ba-cart-product-extra-options-title {
    width: 100%;
}

.ba-checkout-order-product-content-cell,
.ba-live-search-product-content-cell,
.ba-wishlist-product-content-cell,
.ba-wishlist-product-extra-option-value,
.ba-cart-product-extra-option-value,
.ba-cart-product-content-cell {
    flex-grow: 1;
}

.ba-wishlist-add-to-cart-btn {
    white-space: nowrap;
}

/* Cart Products List */
.ba-empty-cart-products {
    align-items: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
    min-height: 325px;
}

.ba-wishlist-products-list .ba-empty-cart-products {
    min-height: 335px;
}

.ba-empty-cart-products i {
    color: var(--primary);
    font-size: 86px;
    margin-bottom: 30px;
}

.ba-cart-products-list[class*="span"] {
    min-height: 450px;
}

.ba-cart-checkout-headline-wrapper,
.ba-wishlist-headline-wrapper,
.ba-cart-headline-wrapper {
    margin-bottom: 25px;
    text-align: left;
}

.ba-wishlist-headline-wrapper,
.ba-cart-headline-wrapper  {
    padding: 25px 50px 0;
}

.ba-live-search-body,
.ba-wishlist-products-list,
.ba-cart-products-list {
    overflow: auto;
    padding: 0 50px;
    text-align: left;
}

.ba-wishlist-products-list {
    max-height: calc(100vh - 341px);
}

.ba-cart-products-list {
    height: 100%;
}

.ba-live-search-body{
    min-height: 255px;
}

.ba-wishlist-products-list {
    min-height: 342px;
}

.ba-wishlist-headline,
.ba-cart-headline {
    color: var(--title);
    font-size: 24px;
    font-weight: bold;
}

.ba-live-search-results .ba-live-search-product-image-cell img,
.ba-wishlist-product-image-cell img,
.ba-checkout-order-product-image-cell img,
.ba-cart-product-image-cell img {
    max-width: 75px;
    max-height: 75px;
}

.ba-live-search-results .ba-live-search-product-image-cell,
.ba-wishlist-product-image-cell,
.ba-cart-product-image-cell {
    position: relative;
}

.ba-live-search-results .ba-live-search-product-image-cell a,
.ba-wishlist-product-image-cell a,
.ba-cart-product-image-cell a {
    bottom: 0;
    left: 0;
    position: absolute;
    right: 0;
    top: 0;
}

.ba-cart-product-row input[type="text"] {
    border: none;
    background: transparent;
    font-weight: normal;
    margin: 0;
    padding: 0;
    text-align: center;
    width: 28px;
}

.ba-cart-product-quantity-cell {
    align-items: center;
    background: var(--bg-secondary);
    display: flex;
    justify-content: space-between;
    margin:  0 20px;
    padding: 0 10px;
    white-space: nowrap;
    width: 60px;
}

.ba-empty-live-search,
.ba-empty-cart-products-message,
.ba-cart-product-row input[type="text"],
.ba-cart-product-quantity-cell i,
.ba-wishlist-price-wrapper,
.ba-cart-price-wrapper {
    font-size: 18px;
}

.ba-empty-live-search {
    text-align: center;
    font-size: 14px;
}

.ba-checkout-order-form-total .ba-checkout-order-price-wrapper,
.right-currency-position {
    display: inline-flex ;
    flex-direction: row-reverse;
    justify-content: flex-start;
}

.ba-checkout-order-form-shipping .ba-checkout-order-price-wrapper *,
.ba-checkout-order-price-wrapper {
    font-weight: bold;
    white-space: nowrap;
}

.right-currency-position .ba-blog-post-add-to-cart-price-currency,
.right-currency-position .ba-live-search-price-currency,
.right-currency-position .ba-checkout-order-price-currency,
.right-currency-position .ba-add-to-cart-price-currency,
.ba-cart-subtotal.right-currency-position .store-currency-symbol,
.right-currency-position .ba-wishlist-price-currency,
.right-currency-position .ba-cart-price-currency {
    margin-right: 0px;
    margin-left: 5px;
}

.right-currency-position .ba-cart-price-minus {
    order: 1;
}

.headline-wrapper {
    font-size: 16px;
}

.ba-cart-product-remove-extra-option,
.ba-wishlist-sale-price-wrapper,
.ba-cart-checkout-promo-code .ba-cart-checkout-title,
.ba-wishlist-add-all-btn,
.ba-cart-checkout-btn,
.ba-cart-sale-price-wrapper,
.ba-wishlist-product-info,
.ba-cart-product-info {
    font-size: 14px;
    font-weight: normal;
}

.ba-wishlist-checkout-title,
.ba-cart-checkout-title {
    font-size: 16px;   
}

.ba-wishlist-product-remove-cell i,
.ba-cart-product-remove-cell i {
    color: var(--icon)
}

.ba-empty-live-search,
.ba-empty-cart-products-message,
.ba-cart-checkout-row.ba-cart-checkout-discount,
.ba-wishlist-headline,
.ba-cart-headline {
    line-height: 30px;
}

.ba-checkout-order-form-section.ba-checkout-order-form-total-wrapper .ba-checkout-order-form-row-title > span,
.ba-live-search-product-price-cell,
.ba-live-search-price-wrapper,
.ba-wishlist-sale-price-wrapper,
.ba-cart-price-wrapper,
.ba-cart-sale-price-wrapper,
.ba-cart-product-title,
.ba-wishlist-product-info,
.ba-cart-product-info {
    line-height: normal;
}

.ba-cart-sale-price-wrapper,
.ba-wishlist-sale-price-wrapper {
    text-decoration: line-through;
}

.ba-wishlist-product-extra-options,
.ba-cart-product-extra-options,
.ba-checkout-order-description *:not(a),
.ba-cart-checkout-row.ba-cart-checkout-includes-tax .ba-cart-checkout-title > span,
.ba-checkout-order-form-section.ba-checkout-order-form-total-wrapper .ba-checkout-order-form-row-title > span,
.ba-wishlist-product-info,
.ba-cart-product-info {
    color: var(--text);
    font-size: 12px;
    line-height: 24px;
}

.ba-checkout-order-description a {
    font-size: 12px;   
    color: var(--secondary);
}

.ba-checkout-order-product-extra-options,
.ba-wishlist-product-extra-options,
.ba-cart-product-extra-options,
.ba-live-search-product-title,
.ba-checkout-order-product-title,
.ba-wishlist-product-title,
.ba-cart-product-title {
    display: flex;
}

.ba-checkout-order-product-info > span,
.ba-live-search-price-currency,
.ba-checkout-order-price-currency,
.ba-cart-subtotal .store-currency-symbol,
.ba-wishlist-price-currency,
.ba-cart-price-currency,
.ba-wishlist-product-info > span,
.ba-cart-product-info > span {
    margin-right: 5px;
}

.ba-wishlist-product-info > span ~ span ,
.ba-checkout-order-product-info > span ~ span ,
.ba-cart-product-info > span ~ span {
    margin-left: 5px;    
}

.ba-add-to-cart-button-wrapper.disabled .ba-btn-transition {
    pointer-events: none;
}

.ba-add-to-cart-button-wrapper.disabled .ba-add-to-cart-buttons-wrapper {
    cursor: not-allowed;
}

.ba-checkout-order-product-extra-options-title,
.ba-checkout-order-product-extra-option-title,
.ba-wishlist-product-extra-options-title,
.ba-wishlist-product-extra-option-title,
.ba-cart-product-extra-options-title,
.ba-checkout-order-product-extra-option-title,
.ba-wishlist-product-extra-option-title,
.ba-cart-product-extra-option-title,
.ba-empty-live-search,
.ba-live-search-price-wrapper,
.ba-live-search-product-title a,
.ba-empty-cart-products-message,
.ba-wishlist-checkout-title,
.ba-cart-checkout-title,
.ba-cart-product-title,
.ba-wishlist-product-title a,
.ba-cart-product-title a,
.ba-wishlist-price-wrapper,
.ba-cart-price-wrapper {
    color: var(--title);
    font-weight: bold;
}

.ba-checkout-order-product-extra-option-title,
.ba-wishlist-product-extra-option-title,
.ba-cart-product-extra-option-title {
    min-width: 40%;
    max-width: 40%;
    margin-right: 10px;
}

.ba-checkout-order-product-title-cell:first-child .ba-checkout-order-product-extra-option-title, 
.ba-wishlist-product-title-cell:first-child .ba-wishlist-product-extra-option-title, 
.ba-cart-product-title-cell:first-child .ba-cart-product-extra-option-title {
    margin-right: 60px;
}

.ba-cart-checkout-row.ba-cart-checkout-includes-tax .ba-cart-checkout-title > span,
.ba-checkout-order-form-section.ba-checkout-order-form-total-wrapper .ba-checkout-order-form-row-title > span {
    font-weight: normal;
}

.ba-live-search-product-price-cell,
.ba-live-search-product-title a,
.ba-live-search-price-wrapper,
.ba-wishlist-product-title a,
.ba-store-cart .ba-cart-product-title a {
    font-size: 16px;
}

.ba-wishlist-price-wrapper,
.ba-store-cart .ba-cart-price-wrapper {
    font-size: 18px;   
}

.ba-live-search-product-title a,
.ba-wishlist-product-title a,
.ba-store-cart .ba-cart-product-title a {
    color: var(--title);
    transition: opacity .3s;
}

.ba-live-search-product-title a:hover,
.ba-wishlist-product-title a:hover,
.ba-store-cart .ba-cart-product-title a:hover {
    opacity: .5;
}

.ba-live-search-results .ba-live-search-product-image-cell,
.ba-wishlist-product-image-cell,
.ba-checkout-order-product-image-cell,
.ba-cart-product-image-cell {
    align-items: center;
    display: flex;
    justify-content: center;
    margin-right: 10px;
    max-width: 85px;
    min-height: 75px;
    min-width: 85px;
}

.ba-live-search-product-title-cell,
.ba-cart-product-title-cell {
    flex-grow: 1;
    width: 225px;
}

.ba-wishlist-product-title-cell {
    flex-grow: 1;
    text-align: left;
    width: 250px;
}

.ba-wishlist-product-remove-cell,
.ba-cart-product-remove-cell ,
.ba-wishlist-product-remove-extra-option,
.ba-cart-product-remove-extra-option {
    min-width: 50px;
    text-align: right;
}

.ba-cart-product-extra-option-price:last-child {
    margin-right: 50px
}

.ba-wishlist-product-remove-cell i,
.ba-cart-product-remove-cell i,
.ba-wishlist-product-remove-extra-option i,
.ba-cart-product-remove-extra-option i {
    cursor: pointer;
    padding: 2px;
    font-size: 16px;
    text-align: center;
    width: 14px;
}

.ba-wishlist-product-remove-cell i:not(:hover),
.ba-cart-product-remove-cell i:not(:hover),
.ba-wishlist-product-remove-extra-option i:not(:hover),
.ba-cart-product-remove-extra-option i:not(:hover) {
    color: #b0b0b0;
}

.ba-live-search-product-price-cell {
    width: 80px;
}

/* Cart Checkout */
.ba-wishlist-checkout-row:not(.ba-wishlist-btn-wrapper),
.ba-cart-checkout-row.ba-cart-checkout-total,
.ba-cart-checkout-row.ba-cart-checkout-discount {
    align-items: center;
    display: flex;
    justify-content: space-between;
}

.ba-cart-checkout-row.ba-cart-checkout-promo-code {
    line-height: 10px;
}

.ba-cart-checkout-promo-code-wrapper {
    display: flex;
    align-items: center;
}

.ba-cart-checkout-row.ba-cart-checkout-promo-code input {
    border: none;
    height: 40px;
    margin-top: 10px;
    padding: 0 10px;
}

.ba-cart-checkout-row.ba-cart-checkout-promo-code .ba-cart-apply-promo-code {
    background: var(--primary);
    color: #fff;
    flex-grow: 1;
    font-size: 14px;
    font-weight: normal;
    padding: 15px 0;
    text-align: center;
}

.ba-wishlist-checkout-title,
.ba-cart-checkout-title.show-promo-code,
.ba-cart-checkout-row.ba-cart-checkout-promo-code .ba-cart-apply-promo-code {
    transition:opacity .3s;
    cursor: pointer;
}

.ba-wishlist-checkout-title:hover,
.ba-cart-checkout-title.show-promo-code:hover {
    opacity: .5;
}

.ba-cart-checkout .ba-cart-price-wrapper {
    font-size: 14px;
    white-space: nowrap;
}

.ba-cart-checkout-row.ba-cart-checkout-includes-tax,
.ba-wishlist-checkout-row:not(.ba-wishlist-btn-wrapper),
.ba-cart-checkout-row.ba-cart-checkout-discount,
.ba-cart-checkout-row.ba-cart-checkout-promo-code,
.ba-cart-checkout-row.ba-cart-checkout-total {
    padding:0 50px;
}

.ba-cart-checkout-row.ba-cart-checkout-includes-tax .ba-cart-price-wrapper{
    display: inline-flex;
}

.ba-cart-checkout-row.ba-cart-checkout-promo-code,
.ba-cart-checkout-row.ba-cart-checkout-discount {
    margin-bottom: 5px;
}

.ba-store-cart .ba-cart-checkout-row.ba-cart-checkout-promo-code {
    align-items: center;
    border-bottom: 1px solid var(--border);
    display: flex;
    justify-content: space-between;
    margin-bottom: 15px;
}

.ba-store-cart-backdrop[data-layout="sidebar"] .ba-store-cart .ba-cart-checkout-row.ba-cart-checkout-promo-code {
    align-items: flex-end;
    flex-grow: 1;
}

.ba-cart-checkout-promo-code .ba-cart-checkout-title.show-promo-code,
.ba-cart-checkout-row.ba-cart-checkout-discount * {
    font-size: 14px !important;
    font-weight: bold;
    line-height: 30px;
}

.ba-store-cart .ba-cart-checkout-promo-code .ba-cart-checkout-title.show-promo-code {
    line-height: 36px;
    margin: 10px 0;
}

.ba-wishlist-add-all-btn,
.ba-cart-checkout-btn {
    background-color: var(--primary);
    color: var(--title-inverse);
    cursor: pointer;
    display: flex;
    font-weight: bold;
    font-size: 21px;
    justify-content: center;
    line-height: 26px;
    margin-top: 25px;
    padding: 20px;
    transition:background .3s;
}

.ba-live-search-add-to-cart-cell > span:hover,
.ba-wishlist-add-to-cart-cell > span:not(.ba-wishlist-empty-stock):hover,
.ba-cart-checkout-row.ba-cart-checkout-promo-code .ba-cart-apply-promo-code:hover,
.ba-wishlist-add-all-btn:hover,
.ba-cart-checkout-btn:hover {
    background-color: var(--hover);
    color: var(--title-inverse);
}

.ba-live-search-show-all-btn:hover,
.ba-live-search-add-to-cart-btn:hover,
.ba-wishlist-add-to-cart-cell > span:not(.ba-wishlist-empty-stock):hover {
    background-color: var(--hover) !important;
}

.ba-cart-checkout-total .ba-cart-price-wrapper {
    font-size: 20px;
}

.ba-cart-checkout-promo-code .ba-cart-checkout-promo-code-wrapper {
    opacity: 0;
    pointer-events: none;
}

.ba-activated-promo-code {
    margin-right: 0 !important;
}

/*
/* Store Category List Layout
*/

.ba-blog-post-add-to-cart-wrapper {
    align-items: center;
    display: flex;
    justify-content: space-between;
}

.ba-blog-post-add-to-cart-button {
    flex-grow: 1;
    justify-content: flex-end;
}

.ba-blog-post-add-to-cart-price {
    flex-direction: column;
    line-height: normal !important;
    white-space: nowrap;
}

.ba-blog-post-add-to-cart-sale-price-wrapper  {
    font-size: .8em;
    font-weight: 400;
    opacity: .5;
    text-decoration: line-through;
}

.ba-blog-post-wishlist-wrapper {
    position: absolute;
    right: 20px;
    top: 20px;
    z-index: 10;
}

.ba-blog-post-wishlist-wrapper,
.ba-blog-post-add-to-cart {
    cursor: pointer;
}

.ba-blog-post-add-to-cart.out-of-stock {
    pointer-events: none;
}

.ba-blog-post-wishlist-wrapper i {
    background: rgba(255, 255, 255, 0.5);
    border-radius: 50%;
    color: #c7c7c7;
    font-size: 18px;
    padding: 10px;
    text-align: center;
    width: 18px;
    transition: .3s;
}

.ba-blog-post-wishlist-wrapper i:hover {
    color: #f64231;
}

.ba-blog-post-badge-wrapper {
    align-items: flex-start;
    flex-direction: column;
    left: 20px;
    position: absolute;
    top: 20px;
    z-index: 1;
}

.ba-blog-post-badge.out-of-stock-badge,
.ba-blog-post-badge {
    background: var(--badge-color);
    border-radius: 3px;
    color: var(--title-inverse);
    cursor: default;
    font-size: 12px;
    font-weight: bold;
    line-height: initial;
    margin-bottom: 10px;
    padding: 10px 15px;
}

.ba-blog-post-badge.out-of-stock-badge {
    background: #ff5c00;    
}

.blog-posts-sorting-wrapper {
    align-items: center;
    display: flex;
    justify-content: flex-end;
    margin-bottom: 25px;
}

.blog-posts-sorting-wrapper select {
    color: var(--title);
    margin-left: 5px;
    padding-right: 10px;
    text-align-last: right;
}

.ba-blog-post-product-options-wrapper .ba-blog-post-product-options {
    display: flex;
}

.ba-blog-post-product-options-wrapper .ba-blog-post-product-options .ba-blog-post-product-option {
    position: relative;
}

.ba-blog-post-product-options-wrapper .ba-blog-post-product-options > span > span:not(.ba-tooltip) {
    background: var(--variation-value);
    background-position: center;
    background-size: cover;
    border-radius: 50%;
    cursor: pointer;
    position: relative;
    display: block;
    height: 20px;
    margin: 25px 10px 10px;
    width: 20px;
}

.ba-blog-post-product-options-wrapper .ba-blog-post-product-options .ba-blog-post-product-option:first-child > span:not(.ba-tooltip) {
    margin-left: 0;
}

.ba-blog-post-product-options-wrapper .ba-blog-post-product-options[data-type="color"] > span.active > span:not(.ba-tooltip):before,
.ba-blog-post-product-options-wrapper .ba-blog-post-product-options[data-type="color"] > span > span:not(.ba-tooltip):before {
    border: 3px solid var(--variation-value);
}

.ba-blog-post-product-options-wrapper .ba-blog-post-product-options[data-type="image"] > span > span:not(.ba-tooltip) {
    border-radius: 3px;
    height: 30px;
    width: 30px;
}

.ba-blog-post-product-options-wrapper .ba-blog-post-product-options[data-type="color"] > span > span.ba-tooltip,
.ba-blog-post-product-options-wrapper .ba-blog-post-product-options[data-type="image"] > span > span.ba-tooltip {
    bottom: calc(100% - 5px);
}

.product-option-hovered .ba-slideshow-img a:before,
.product-option-hovered .ba-blog-post-image a:before {
    background-image: var(--product-option-image) !important;
    background-position: center;
    background-size: cover;
    bottom: 0;
    opacity: 1;
    content: "";
    left: 0;
    position: absolute;
    right: 0;
    top: 0;
}

.carousel-type .ba-store-app-product .ba-slideshow-img {
    z-index: 1;
}

.ba-store-app-product a:not(.lazy-load-image):before,
.slideshow-content:not(.lazy-load-image) .ba-store-app-product .ba-slideshow-img:before {
    content: '';
    background-image: var(--product-image-1);
}

.ba-item-recently-viewed-products .ba-store-app-product .ba-slideshow-img a,
.ba-item-related-posts-slider .ba-store-app-product .ba-slideshow-img a,
.ba-item-recent-posts-slider .ba-store-app-product .ba-slideshow-img a,
.ba-blog-post.ba-store-app-product .ba-blog-post-image a {
    background-image: var(--product-image-0);
    transform: none !important;
}

.ba-blog-posts-wrapper.ba-cover-layout .ba-blog-post.ba-store-app-product:hover .ba-blog-post-image a, 
.ba-blog-post.ba-store-app-product .ba-blog-post-image:hover a {
    --product-image-1: var(--product-image-0);
    background-image: var(--product-image-1);
}

.ba-item-related-posts-slider .ba-store-app-product .ba-slideshow-img,
.ba-item-recently-viewed-products .ba-store-app-product .ba-slideshow-img,
.ba-item-recent-posts-slider .ba-store-app-product .ba-slideshow-img {
    --product-image-1: var(--product-image-0);
}

.ba-item-recently-viewed-products .ba-store-app-product .ba-slideshow-img:hover a,
.ba-item-related-posts-slider .ba-store-app-product .ba-slideshow-img:hover a,
.ba-item-recent-posts-slider .ba-store-app-product .ba-slideshow-img:hover a {
    background-image: var(--product-image-1);
}

.ba-item-recently-viewed-products .caption-over.caption-hover .ba-store-app-product:hover .ba-slideshow-img a,
.ba-item-recently-viewed-products .caption-over:not(.caption-hover) .ba-store-app-product:hover .ba-slideshow-img a,
.ba-item-related-posts-slider .caption-over.caption-hover .ba-store-app-product:hover .ba-slideshow-img a,
.ba-item-related-posts-slider .caption-over:not(.caption-hover) .ba-store-app-product:hover .ba-slideshow-img a,
.ba-item-recent-posts-slider .caption-over.caption-hover .ba-store-app-product:hover .ba-slideshow-img a,
.ba-item-recent-posts-slider .caption-over:not(.caption-hover) .ba-store-app-product:hover .ba-slideshow-img a {
    background-image: var(--product-image-1);
}

.ba-item-recently-viewed-products .caption-over.caption-hover .ba-store-app-product:hover .ba-slideshow-caption,
.ba-item-recently-viewed-products .caption-over:not(.caption-hover) .ba-store-app-product .ba-slideshow-caption,
.ba-item-related-posts-slider .caption-over.caption-hover .ba-store-app-product:hover .ba-slideshow-caption,
.ba-item-related-posts-slider .caption-over:not(.caption-hover) .ba-store-app-product .ba-slideshow-caption,
.ba-item-recent-posts-slider .caption-over.caption-hover .ba-store-app-product:hover .ba-slideshow-caption,
.ba-item-recent-posts-slider .caption-over:not(.caption-hover) .ba-store-app-product .ba-slideshow-caption {
    z-index: 1;
}

/* ========================================================================
    Blog
 ========================================================================== */

.intro-post-wrapper .intro-post-image {
    background-position: 50%;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;
}

.intro-post-wrapper .intro-post-title {
    display: inline-block;
    max-width: 100%;
    text-align: inherit;
}

.fullscreen-post.intro-post-wrapper {
    display: flex;
    box-sizing: border-box;
    flex-direction: column;
    justify-content: center;
    overflow: hidden;
    position: relative;
}

.fullscreen-post .intro-post-image-wrapper {
    left: 0;
    position: absolute;
    right: 0;
    top: 0;
    z-index: 0;
}

.intro-post-wrapper .intro-category-author-social-wrapper,
.intro-post-wrapper .intro-post-title-wrapper,
.intro-post-wrapper .intro-post-info {
    backface-visibility: hidden;
    -webkit-backface-visibility: hidden;
    box-sizing: border-box;
    margin-left: auto;
    margin-right: auto;
    max-width: 100%;
    padding: 0 25px;
}

.intro-post-wrapper:not(.fullscreen-post) .intro-category-author-social-wrapper,
.intro-post-wrapper:not(.fullscreen-post) .intro-post-title-wrapper,
.intro-post-wrapper:not(.fullscreen-post) .intro-post-info {
    padding: 0;
}

.intro-category-author-social-wrapper,
.fullscreen-post .intro-post-title-wrapper,
.fullscreen-post .intro-post-info {
    box-sizing: border-box;
    z-index: 2;
}

.intro-post-wrapper .intro-post-info > span {
    display: inline-block;
}

.intro-post-wrapper .intro-post-info > span:last-child {
    margin-right: 0;
}

.intro-post-reviews a.ba-blog-post-rating-count,
.ba-blog-post-reviews a.ba-blog-post-rating-count {
    margin-left: 10px;
    transition:  .3s;
}

.intro-post-wrapper .intro-post-info > span,
.ba-blog-post-info-wrapper > span {
    align-items: center;
    position: relative;
}

.ba-item-post-intro .intro-post-info .intro-post-author ~ .intro-post-author{
    margin-left: 10px;
}

.ba-blog-post-info-wrapper > span {
    flex-wrap: nowrap;
    white-space: nowrap;
}

.intro-post-reviews a.ba-blog-post-rating-count,
.ba-blog-post-reviews a.ba-blog-post-rating-count,
.ba-blog-post-info-wrapper > span a:hover,
.intro-post-wrapper .intro-post-info > span a:hover,
.ba-blog-post-info-wrapper > span a,
.intro-post-wrapper .intro-post-info > span a {
    color: inherit;
}

.intro-category-description {
    display: inline-block;
}

.ba-blog-post-info-wrapper .ba-author-avatar,
.intro-post-wrapper .ba-author-avatar {
    margin: 5px 10px 5px 0;
}

.ba-item-category-intro .intro-post-title-wrapper .ba-author-avatar {
    height: 75px;
    margin: 0 25px 0 0;
    width: 75px;
}

.intro-post-image-wrapper {
    position: relative;
}

.intro-post-image-wrapper .ba-overlay {
    z-index: 1;
}

.ba-blog-post-info-wrapper,
.ba-blog-post-info-wrapper  > span,
.ba-blog-post-info-wrapper .zmdi,
.intro-post-wrapper .intro-post-info  > span {
    cursor: default !important;
}

.ba-item-post-intro .intro-post-info,
.ba-blog-post-info-wrapper {
    align-items: center;
    display: flex;
    flex-wrap: wrap;
}

.lightbox-open .row-with-intro-items {
    position: static;
}

/*
/* Blog Layout
*/
.ba-blog-post-button-wrapper a {
    display: inline-block;
}

.ba-blog-post-image {
    backface-visibility: hidden;
    -webkit-backface-visibility: hidden;
    overflow: hidden;
    position: relative;
}

.ba-app-sub-category {
    display: flex;
    flex-wrap: wrap;
    justify-content: inherit;
    transition: color .3s ease-in-out;
}

.ba-item-categories .ba-blog-post-image img,
.ba-blog-posts-wrapper .ba-blog-post-image img {
    opacity: 0;
    width: 100%;
}

.ba-item-recently-viewed-products .ba-store-app-product .ba-slideshow-img a,
.ba-item-related-posts-slider .ba-store-app-product .ba-slideshow-img a,
.ba-item-recent-posts-slider .ba-store-app-product .ba-slideshow-img a,
.ba-item-categories .ba-blog-post-image a,
.ba-blog-posts-wrapper .ba-blog-post-image a {
    background-attachment: scroll;
    background-position: center center;
    background-repeat: no-repeat;
    bottom: 0;
    left: 0;
    position: absolute;
    right: 0;
    top: 0;
}

.ba-item-categories .ba-grid-layout .ba-blog-post-content,
.ba-item-author .ba-grid-layout .ba-post-author-content,
.ba-item-search-result .ba-grid-layout .ba-blog-post-content,
.ba-item-search-result .ba-one-column-grid-layout .ba-blog-post-content,
.ba-item-related-posts .ba-grid-layout .ba-blog-post-content,
.ba-item-recent-posts .ba-grid-layout .ba-blog-post-content,
.ba-item-categories .ba-cover-layout .ba-blog-post-content,
.ba-item-search-result .ba-cover-layout .ba-blog-post-content,
.ba-item-related-posts .ba-cover-layout .ba-blog-post-content,
.ba-item-recent-posts .ba-cover-layout .ba-blog-post-content,
.ba-cover-layout .ba-blog-post-content,
.ba-blog-post-content {
    padding: 0 20px;
    box-sizing: border-box;
}

.ba-slideshow-caption > a,
.ba-cover-layout .ba-blog-post-content > a {
    bottom: 0;
    left: 0;
    position: absolute;
    right: 0;
    top: 0;
}

.ba-slideshow-caption > div > *:not(.ba-overlay-slideshow-button),
.ba-cover-layout .ba-blog-post-content > div > *:not(.ba-overlay-slideshow-button) {
    position: relative;
}

.ba-cover-layout .ba-store-app-product .ba-blog-post-content > div > *:not(.ba-overlay-slideshow-button) {
    z-index: 10;
}

.ba-post-author-title a,
.ba-blog-post-title a {
    display: inline-block;
}

.ba-post-author-description p,
.ba-post-author-description,
.ba-post-author-title a,
.ba-blog-post-title a {
    font-family: inherit;
    font-size: inherit;
    font-style: inherit;
    font-weight: inherit;
    letter-spacing: inherit;
    line-height: inherit;
    text-align: inherit;
    text-decoration: inherit;
    text-transform: inherit;
}

.ba-post-author-description p,
.ba-post-author-description,
.ba-post-author-title a,
.ba-item:not(.ba-item-recent-comments):not(.ba-item-recent-reviews) .ba-blog-post-title a {
    color: inherit;
}

.ba-item-category-intro .intro-post-title-wrapper .ba-author-avatar,
.ba-blog-post-info-wrapper .ba-author-avatar,
.intro-post-info .ba-author-avatar {
    background-position: center;
    background-size: cover;
    border-radius: 50%;
    display: inline-block;
    vertical-align: middle;
}

.intro-post-info .ba-author-avatar,
.ba-blog-post-info-wrapper .ba-author-avatar {
    height: 30px;
    width: 30px;
}

/* Blog Classic Layout*/
.ba-item-author .ba-post-author,
.ba-blog-post {
    backface-visibility: hidden;
    -webkit-backface-visibility: hidden;
    box-sizing: border-box;
    overflow: hidden;
    position: relative;
    z-index: 1;
}

.ba-grid-layout .ba-blog-post.ba-store-app-product {
    overflow: visible !important;
}

.ba-item-author .ba-posts-author-wrapper:not(.ba-grid-layout) .ba-post-author:last-child {
    margin-bottom: 0;
}

.ba-blog-post {
    margin-bottom: 0;
    margin-top: 20px;
}

.ba-one-column-grid-layout .ba-blog-post:first-child,
.ba-classic-layout .ba-blog-post:first-child {
    margin-top: 0;
}

.ba-item-categories .ba-classic-layout .ba-blog-post,
.ba-posts-author-wrapper.ba-grid-layout .ba-post-author,
.ba-one-column-grid-layout .ba-blog-post,
.ba-grid-layout .ba-blog-post {
    margin-left: 10px;
    margin-right: 10px;
}

.ba-item-categories .ba-cover-layout .ba-blog-post-image,
.ba-item-blog-posts .ba-cover-layout .ba-blog-post-image,
.ba-item-search-result .ba-cover-layout .ba-blog-post-image,
.ba-item-related-posts .ba-cover-layout .ba-blog-post-image,
.ba-item-recent-posts .ba-cover-layout .ba-blog-post-image,
.ba-cover-layout .ba-blog-post-image,
.ba-classic-layout .ba-blog-post-image {
    bottom: 0;
    left: 0;
    position: absolute;
    top: 0;
    width:50%;
}

.ba-item-categories .ba-classic-layout {
    flex-direction: row;
    flex-wrap: wrap;
    margin-left: -10px;
    margin-right: -10px;
}

.ba-item-categories .ba-classic-layout .ba-blog-post,
.ba-item-categories .ba-classic-layout {
    align-items: flex-start;
    display: flex;
}

/* Blog Grid Layout */
.ba-cover-layout,
.ba-one-column-grid-layout,
.ba-grid-layout {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    margin-left: -10px;
    margin-right: -10px;
}

/* Blog Masonry Layout */

.simple-gallery-masonry-layout,
.ba-masonry-layout {
    display: grid !important;
    grid-row-gap: 20px;
    grid-column-gap: 20px;
    grid-auto-rows: 0px;
}

.ba-item-blog-posts .ba-blog-post-content,
.ba-item-search-result .ba-blog-post-content,
.ba-item-post-navigation .ba-blog-post-content,
.ba-item-related-posts .ba-blog-post-content,
.ba-item-recent-posts .ba-blog-post-content {
    overflow: hidden;
}

.ba-store-app-product .ba-blog-post-content,
.ba-item-categories .ba-masonry-layout .ba-blog-post-content,
.ba-item-blog-posts .ba-masonry-layout .ba-blog-post-content,
.ba-item-search-result .ba-masonry-layout .ba-blog-post-content,
.ba-item-post-navigation .ba-masonry-layout .ba-blog-post-content,
.ba-item-related-posts .ba-masonry-layout .ba-blog-post-content,
.ba-item-recent-posts .ba-masonry-layout .ba-blog-post-content {
    overflow: visible;
    flex-grow: 0;
}

.ba-masonry-layout .ba-blog-post {
    flex-direction: column;
    font-size: initial;
    letter-spacing: initial;
    line-height: initial;
    margin: 0  !important;
    width: 100% !important;
}

.ba-item-recent-reviews .ba-masonry-layout .ba-blog-post {
    flex-direction: row;
}

.simple-gallery-masonry-layout .ba-instagram-image,
.ba-masonry-layout .ba-blog-post{
    transition: transform .3s, opacity .3s;
}

.simple-gallery-masonry-layout .ba-instagram-image:not(.ba-masonry-image-loaded) {
    transition: none !important;
}

.simple-gallery-masonry-layout .ba-instagram-image:not(.ba-masonry-image-loaded),
.ba-masonry-layout .ba-blog-post:not(.ba-masonry-image-loaded) {
    transform: translateY(50px);
    opacity: 0;
}

/* Blog Cover Layout */
.ba-item-categories .ba-cover-layout .ba-blog-post-image,
.ba-item-search-result .ba-cover-layout .ba-blog-post-image,
.ba-item-related-posts .ba-cover-layout .ba-blog-post-image,
.ba-item-recent-posts .ba-cover-layout .ba-blog-post-image,
.ba-cover-layout .ba-blog-post-image {
    height: 100% !important;
    width: 100% !important;
    z-index: -1;
}

.ba-item-categories .ba-categories-wrapper:not(.ba-cover-layout) .ba-blog-post-image .ba-overlay,
.ba-item-author .ba-post-author-image .ba-overlay,
.ba-item-search-result .ba-blog-posts-wrapper:not(.ba-cover-layout) .ba-blog-post-image .ba-overlay,
.ba-item-related-posts .ba-blog-posts-wrapper:not(.ba-cover-layout) .ba-blog-post-image .ba-overlay,
.ba-item-recent-posts .ba-blog-posts-wrapper:not(.ba-cover-layout) .ba-blog-post-image .ba-overlay,
.ba-blog-posts-wrapper:not(.ba-cover-layout) .ba-blog-post-image .ba-overlay {
    display: none;
}

.ba-item-categories .ba-cover-layout .ba-blog-post-image .ba-overlay,
.ba-item-search-result .ba-cover-layout .ba-blog-post-image .ba-overlay,
.ba-item-related-posts .ba-cover-layout .ba-blog-post-image .ba-overlay,
.ba-item-recent-posts .ba-cover-layout .ba-blog-post-image .ba-overlay,
.ba-cover-layout .ba-blog-post-image .ba-overlay {
    pointer-events: none;
    z-index: 1;
}

/* Blog Pagination */
.ba-item-recent-comments .ba-blog-posts-pagination,
.ba-blog-posts-pagination-wrapper .ba-blog-posts-pagination {
    text-align: center;
    margin-top: 50px;
    width: 100%;
}

.ba-blog-posts-pagination span {
    display: inline;
}

.ba-blog-posts-pagination span a {
    background: transparent;
    border: none;
    display: inline-block;
    margin-left: 5px;
    padding: 4px 12px;
}

.ba-blog-posts-pagination span a i {
    font-size: 16px;
    color: inherit;
}

.ba-blog-posts-pagination span.disabled a *,
.ba-blog-posts-pagination span.disabled a {
    opacity: .5;
}

.ba-blog-posts-pagination span.disabled a *,
.ba-blog-posts-pagination span.disabled a {
    cursor: not-allowed !important;
}

/* Author Social Link */
.intro-category-author-social-wrapper a,
.ba-post-author-social-wrapper a {
    font-size: 16px;
    margin-right: 10px;
    padding: 10px;
}

.intro-category-author-social-wrapper a:hover,
.ba-post-author-social-wrapper a:hover {
    opacity: .5;
}

/* ========================================================================
    Blog Plugins
 ========================================================================== */

/*
/* Blog Plugin Tags
*/

.ba-item-tags .ba-button-wrapper a,
.ba-item-post-tags .ba-button-wrapper a {
    margin: 0 5px 10px;
}

.ba-item-tags .ba-button-wrapper,
.ba-item-post-tags .ba-button-wrapper {
    margin-left: -5px !important;
    margin-right: -5px !important;
    width: calc(100% + 10px) !important;
}

/*
/* Blog Plugin Recent Post
*/

.ba-item-categories .ba-blog-post-image,
.ba-item-recent-reviews .ba-blog-post-image,
.ba-item-recent-comments .ba-blog-post-image,
.ba-item-author .ba-post-author-image,
.ba-item-blog-posts .ba-blog-post-image,
.ba-item-store-search-result .ba-blog-post-image,
.ba-item-search-result .ba-blog-post-image,
.ba-item-post-navigation .ba-blog-post-image,
.ba-item-related-posts .ba-blog-post-image,
.ba-item-recent-posts .ba-blog-post-image {
    backface-visibility: hidden;
    -webkit-backface-visibility: hidden;
    box-sizing: border-box;
    flex-shrink: 0;
    max-width: 100%;
    overflow: hidden;
    position: relative;
    transform: translate3d(0, 0, 0);
}

.ba-item-categories .ba-cover-layout .ba-store-app-product .ba-blog-post-image,
.ba-item-search-result .ba-cover-layout .ba-store-app-product .ba-blog-post-image,
.ba-item-related-posts .ba-cover-layout .ba-store-app-product .ba-blog-post-image,
.ba-item-recent-posts .ba-cover-layout .ba-store-app-product .ba-blog-post-image {
    transform: none;
    z-index: auto;
}

.ba-item-categories .ba-blog-post-image a,
.ba-item-recent-reviews .ba-blog-post-image a,
.ba-item-recent-comments .ba-blog-post-image a,
.ba-item-author .ba-post-author-image a,
.ba-item-store-search-result .ba-blog-post-image a,
.ba-item-search-result .ba-blog-post-image a,
.ba-item-post-navigation .ba-blog-post-image a,
.ba-item-related-posts .ba-blog-post-image a,
.ba-item-recent-posts .ba-blog-post-image a{
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

.ba-item-store-search-result .ba-blog-post-image a,
.ba-item-related-posts-slider .ba-store-app-product .ba-slideshow-img a,
.ba-item-recently-viewed-products .ba-store-app-product .ba-slideshow-img a,
.ba-item-recent-posts-slider .ba-store-app-product .ba-slideshow-img a,
.ba-item-categories .ba-blog-post-image a,
.ba-blog-posts-wrapper .ba-blog-post-image a,
.ba-item-search-result .ba-blog-post-image a,
.ba-item-post-navigation .ba-blog-post-image a,
.ba-item-related-posts .ba-blog-post-image a,
.ba-item-recent-posts .ba-blog-post-image a {
    background-size: inherit !important;
}

.ba-item-categories .ba-blog-post-image a,
.ba-item-recent-reviews .ba-blog-post-image a,
.ba-item-recent-comments .ba-blog-post-image a,
.ba-item-author .ba-post-author-image a,
.ba-item-search-result .ba-blog-post-image a,
.ba-item-post-navigation .ba-blog-post-image a,
.ba-item-related-posts .ba-blog-post-image a,
.ba-item-recent-posts .ba-blog-post-image a,
.ba-item-blog-posts .ba-blog-post .ba-blog-post-image a {
    transition: transform .3s linear;
}

.ba-item-categories .ba-blog-post:hover .ba-blog-post-image a,
.ba-item-recent-reviews .ba-blog-post:hover .ba-blog-post-image a,
.ba-item-recent-comments .ba-blog-post:hover .ba-blog-post-image a,
.ba-item-author .ba-post-author:hover .ba-post-author-image a,
.ba-item-search-result .ba-blog-post:hover .ba-blog-post-image a,
.ba-item-blog-posts .ba-blog-post:hover .ba-blog-post-image a,
.ba-item-post-navigation .ba-blog-post:hover .ba-blog-post-image a,
.ba-item-related-posts  .ba-blog-post:hover .ba-blog-post-image a,
.ba-item-recent-posts .ba-blog-post:hover .ba-blog-post-image a {
    transform: scale(1.15);
}

.ba-item-categories .ba-blog-post-content,
.ba-item-recent-reviews .ba-blog-post-content,
.ba-item-recent-comments .ba-blog-post-content,
.ba-item-author .ba-post-author-content,
.ba-item-blog-posts .ba-blog-post-content,
.ba-item-search-result .ba-blog-post-content,
.ba-item-post-navigation .ba-blog-post-content,
.ba-item-related-posts .ba-blog-post-content,
.ba-item-recent-posts .ba-blog-post-content {
    flex-grow: 1;
    margin: 0;
    padding: 0 20px;
    width: auto;
}

.ba-item-categories .ba-classic-layout .ba-blog-post-image {
    margin-right: 40px;
}

.ba-item-categories .ba-classic-layout .ba-blog-post > .ba-blog-post-content {
    padding: 0;
}

.ba-item-categories .ba-blog-post,
.ba-item-recent-reviews .ba-blog-post,
.ba-item-recent-comments .ba-blog-post,
.ba-item-author .ba-post-author,
.ba-item-blog-posts .ba-blog-posts-wrapper:not(.ba-grid-layout):not(.ba-one-column-grid-layout) .ba-blog-post,
.ba-item-search-result .ba-blog-post,
.ba-item-post-navigation .ba-blog-post,
.ba-item-related-posts .ba-blog-post,
.ba-item-recent-posts .ba-blog-post {
    align-items: center;
    display: flex;
    overflow: hidden;
    word-break: break-word;
}

.ba-item-recent-reviews .ba-blog-post,
.ba-item-recent-comments .ba-blog-post {
    align-items: flex-start;
}

.ba-item-categories .ba-grid-layout .ba-blog-post,
.ba-item-author .ba-grid-layout .ba-post-author,
.ba-item-search-result .ba-grid-layout .ba-blog-post,
.ba-item-search-result .ba-one-column-grid-layout .ba-blog-post,
.ba-item-related-posts .ba-grid-layout .ba-blog-post,
.ba-item-recent-posts .ba-grid-layout .ba-blog-post {
    flex-direction: column;
}

.ba-item-categories .ba-masonry-layout .ba-blog-post-content,
.ba-item-blog-posts .ba-masonry-layout .ba-blog-post-content,
.ba-item-author .ba-masonry-layout .ba-post-author-content,
.ba-item-search-result .ba-masonry-layout .ba-blog-post-content,
.ba-item-related-posts .ba-masonry-layout .ba-blog-post-content,
.ba-item-recent-posts .ba-masonry-layout .ba-blog-post-content,
.ba-item-categories .ba-grid-layout .ba-blog-post-content,
.ba-item-author .ba-grid-layout .ba-post-author-content,
.ba-item-search-result .ba-grid-layout .ba-blog-post-content,
.ba-item-search-result .ba-one-column-grid-layout .ba-blog-post-content,
.ba-item-related-posts .ba-grid-layout .ba-blog-post-content,
.ba-item-recent-posts .ba-grid-layout .ba-blog-post-content {
    width: 100%;
}

.ba-item-categories .ba-grid-layout .ba-blog-post-image,
.ba-item-author .ba-grid-layout .ba-post-author-image,
.ba-item-search-result .ba-grid-layout .ba-blog-post-image,
.ba-item-search-result .ba-one-column-grid-layout .ba-blog-post-image,
.ba-item-related-posts .ba-grid-layout .ba-blog-post-image,
.ba-item-recent-posts .ba-grid-layout .ba-blog-post-image {
    margin-right: 0;
}

.ba-item-author .ba-post-author-image a {
    display: block;
    height: 100%;
}

.ba-item-categories .ba-blog-post .ba-app-category-counter {
    white-space: nowrap;
}

.ba-item-categories .ba-blog-post a span:not(.ba-app-category-counter) {
    margin-right: 10px;
}

.ba-item-categories .ba-blog-post .ba-app-sub-category span:not(.ba-app-category-counter) {
    margin-left: calc(10px * var(--sub-category-level));
}

.ba-item-categories .ba-blog-post .ba-app-sub-category:not([data-level="0"]):before {
    content: "\2022";
}

/*
/* Blog Plugin Post Navigation
*/

.ba-item-post-navigation .ba-blog-posts-wrapper > * {
    display: inline-flex;
}

.ba-item-post-navigation .ba-blog-posts-wrapper {
    align-items: center;
    display: flex;
    justify-content: flex-start;
}

.ba-item-post-navigation .ba-blog-posts-wrapper .ba-blog-post:first-child {
    flex-direction: row;
    margin: 0 10px 0 0;
}

.ba-item-post-navigation .ba-blog-post {
    flex-direction: row-reverse;
    margin: 0 0 0 10px;
    width: calc(50% - 10px);
}

.ba-item-post-navigation .ba-blog-post + .ba-blog-post .ba-blog-post-info-wrapper > span {
    margin-right: 0px;
    margin-left: 15px;
}

.ba-item-post-navigation .ba-blog-post + .ba-blog-post .ba-blog-post-info-wrapper > span.ba-blog-post-views {
    margin: 0;
}

/*
/* Blog Plugin Search
*/

.ba-item-store-search .ba-search-wrapper,
.ba-item-search .ba-search-wrapper {
    align-items: center;
    box-sizing: border-box;
    display: inline-flex;
    width: 100%;
}

.ba-item-store-search .ba-search-wrapper:not(.after),
.ba-item-search .ba-search-wrapper:not(.after) {
    flex-direction: row-reverse;
}

.ba-item-store-search .ba-search-wrapper input,
.ba-item-search .ba-search-wrapper input {
    background: transparent !important;
    border: none !important;
    height: auto;
    margin: 0;
    padding: 0;
    width: 100%;
}

.ba-item-store-search .ba-search-wrapper i,
.ba-item-search .ba-search-wrapper i {
    pointer-events: none;
    margin: 0 10px;
}

.ba-store-wishlist-opened,
.ba-store-cart-opened,
.instagram-modal-open,
.lightbox-open {
    box-sizing: border-box;
    overflow: hidden;
}

.ba-store-wishlist-opened .ba-sticky-header,
.ba-store-cart-opened .ba-sticky-header,
.instagram-modal-open .ba-sticky-header,
.lightbox-open .ba-sticky-header,
.ba-not-default-header .header {
    width: inherit;
}

.search-started .ba-item-search-result {
    opacity: 0;
}

/* Plugin Store Search */

.ba-live-search-results {
    box-shadow: 0 25px 40px rgba(0,0,0,.15);
    left: var(--input-left);
    margin-left: 0;
    min-width: 600px;
    padding: 0;
    position: absolute;
    top: var(--input-bottom);
    width: var(--input-width);
}

.ba-live-search-results .ba-live-search-body {
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    max-height: 550px;
    min-height: 80px;
    padding: 50px 25px 0;
    scrollbar-width: thin;
    scrollbar-color: #464646 transparent;
}

.ba-live-search-show-all-btn {
    align-items: center;
    background: var(--primary) !important;
    color: #fff !important;
    cursor: pointer;
    display: flex;
    font-size: 14px;
    font-weight: bold;
    justify-content: center;
    padding: 15px;
    transition: .3s;
}

@keyframes loading-spin  {
    from { transform: rotate(0); }
    to { transform: rotate(360deg); }
}

.live-search-loading-data i {
    animation: loading-spin 1s linear infinite;
}

.live-search-loading-data i:before {
    content: '\f1b9';
}

.live-search-data-loaded i {
    pointer-events: all !important;
    cursor: pointer;
}

.live-search-data-loaded i:before {
    content: '\f136';
}

/* ========================================================================
    Responsive
 ========================================================================== */

/*
/* Responsive Grid
*/

.row-fluid:before,
.row-fluid:after {
    content: "";
    display: table;
    line-height: 0;
}

.row-fluid:after {
    clear: both;
}

[class*="span"]{
    flex-grow: 1;
    box-sizing: border-box;
    display: block;
    float: left;
    margin-left: 2.127659574468085%;
}

.row-fluid {
    width: 100%;
}

[class*="span"]:first-child {
    margin-left: 0;
}

.header .span12,
.span12 {
    width: 100%;
}

.header .span11,
.span11 {
    width: 91.48936170212765%;
}

.header .span10,
.span10 {
    width: 82.97872340425532%;
}

.header .span9,
.span9 {
    width: 74.46808510638297%;
}

.header .span8,
.span8 {
    width: 65.95744680851064%;
}

.header .span7,
.span7 {
    width: 57.44680851063829%;
}

.header .span6,
.span6 {
    width: 48.93617021276595%;
}

.header .span5,
.span5 {
    width: 40.42553191489362%;
}

.header .span4,
.span4 {
    width: 31.914893617021278%;
}

.header .span3,
.span3 {
    width: 23.404255319148934%;
}

.header .span2,
.span2 {
    width: 14.893617021276595%;
}

.header .span1,
.span1 {
    width: 6.382978723404255%;
}

/*
/* No Space Between Columns
*/

.column-wrapper {
    position: relative;
    width: 100%;
}

/*
/* For IOS
*/

@media screen and (min-color-index:0) and(-webkit-min-device-pixel-ratio:0) {
    @media(max-width: 1024px) {

        .column-wrapper{
            max-width: 100%;
            /*overflow: hidden;*/
        }

        .column-wrapper > * {
            margin: 0 -1px;
        }
    }
}

@supports (-webkit-text-size-adjust:none) and (-webkit-marquee-repetition:infinite) and (object-fit:fill) {
    @media(max-width: 1024px) {

        .column-wrapper{
            max-width: 100%;
            /*overflow: hidden;*/
        }

        .column-wrapper > * {
            margin: 0 -1px;
        }
    }
}

@media not all and (min-resolution:.001dpcm) {
    @media(max-width: 1024px) {

        .column-wrapper{
            max-width: 100%;
            /*overflow: hidden;*/
        }

        .column-wrapper > * {
            margin: 0 -1px;
        }
    }
}

/* ========================================================================
    Default Joomla
 ========================================================================== */

.com_gridbox form {
    margin: 0;
}

.ba-item-flipbox .ba-flipbox-wrapper:before,
.ba-item-flipbox .ba-flipbox-wrapper:after,
.ba-search-result-body:before,
.ba-search-result-body:after,
.ba-item-blog-posts:before,
.ba-item-blog-posts:after,
.ba-classic-layout .ba-blog-post:before,
.ba-classic-layout .ba-blog-post:after,
.modal-footer:before,
.modal-footer:after,
.row:before,
.row:after,
.pager:before,
.pager:after,
.form-horizontal .control-group:before,
.form-horizontal .control-group:after,
.navbar-inner:before,
.navbar-inner:after,
.nav-tabs:before,
.nav-tabs:after,
.nav-pills:before,
.nav-pills:after,
.thumbnails:before,
.thumbnails:after,
.clearfix:before,
.clearfix:after {
    display: table;
    content: "";
    line-height: 0;
}

.ba-item-flipbox .ba-flipbox-wrapper:after,
.ba-search-result-body:after,
.ba-item-blog-posts:after,
.ba-classic-layout .ba-blog-post:after,
.modal-footer:after,
.row:after,
.pager:after,
.form-horizontal .control-group:after,
.navbar-inner:after,
.nav-tabs:after,
.nav-pills:after,
.thumbnails:after,
.clearfix:after {
    clear: both;
}

h1,
h2,
h3,
h4,
h5,
h6 {
    margin: 12px 0;
}

img {
    vertical-align: middle;
}

form {
    margin: 0 0 18px;
}

fieldset {
    border: 0;
    margin: 0;
    padding: 0;
}

legend {
    border: 0;
    border-bottom: 1px solid #f3f3f3;
    display: block;
    font-size: 1.5em;
    line-height: 1.5em;
    margin-bottom: 18px;
    padding: 0;
    width: 100%;
}

hr {
    border: 0;
    border-top: 1px solid #f3f3f3;
    margin: 18px 0;
}

ul,
ol {
    margin: 0 0 9px 25px;
    padding: 0;
}

ul ul,
ul ol,
ol ol,
ol ul {
    margin-bottom: 0;
}

ul.unstyled,
ol.unstyled,
ul.inline,
ol.inline {
    list-style: none;
    margin-left: 0;
}

ul.inline > li,
ol.inline > li {
    display: inline-block;
}

dl {
    margin-bottom: 18px;
}

dt,
dd {
    line-height: 18px;
}

dt {
    font-weight: bold;
}

dd {
    margin-left: 0;
}

[class*="span"] {
    min-height: 1px;
}

select[multiple] {
    height: auto;
}

input[class*="span"],
select[class*="span"],
textarea[class*="span"],
.uneditable-input[class*="span"],
.row-fluid input[class*="span"],
.row-fluid select[class*="span"],
.row-fluid textarea[class*="span"],
.row-fluid .uneditable-input[class*="span"] {
    float: none;
    margin-left: 0;
}

.page-header {
    margin: 18px 0 27px;
    padding-bottom: 8px;
}

.dl-horizontal dt {
    clear: left;
    float: left;
    overflow: hidden;
    padding: 5px 0;
    text-align: right;
    text-overflow: ellipsis;
    white-space: nowrap;
    width: 160px;
}

.dl-horizontal dd {
    margin-left: 180px;
    padding: 5px 0;
}

.breadcrumb {
    margin: 10px 0;
}

body:not(.com_gridbox) .hidden {
    display: none;
    visibility: hidden;
}

.pull-right {
    float: right;
}
.pull-left {
    float: left;
}

.visible-phone,
.visible-tablet,
.hidden-desktop {
    display: none !important;
}

.visible-desktop {
    display: inherit !important;
}

.center *,
.center,
.table td.center,
.table th.center {
    text-align: center;
}

[class^="icon-"]:not(.ba-settings-group):not(.ba-tabs-wrapper):not(.add-on):not(.accordion):not(.modal-backdrop):not(.minicolors-input),
[class*=" icon-"]:not(.ba-settings-group):not(.ba-tabs-wrapper):not(.add-on):not(.accordion):not(.modal-backdrop):not(.minicolors-input) {
    display: inline-block;
    font-size: 0.8em;
    height: 14px;
    line-height: 14px;
    margin-right: .2em;
    vertical-align: baseline;
    width: 14px;
}

.fade {
    opacity: 0;
    transition: opacity .15s linear;
}

.fade.in {
    opacity: 1;
}

.element-invisible {
    border: 0;
    height: 1px;
    margin: 0;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
}

/* Navigation */
.nav {
    list-style: none;
    margin-bottom: 18px;
    margin-left: 0;
}

.nav > li > a {
    display: block;
}

.nav > li > a:hover,
.nav > li > a:focus {
    text-decoration: none;
}

.nav > li > a > img {
    max-width: none;
}

.nav > .pull-right {
    float: right;
}

.nav-tabs > li,
.nav-pills > li,
.navbar .nav > li {
    float: left;
}

.navbar-inner {
    background-color: #f5f5f5;
    border-radius: 4px;
    border: 1px solid #f3f3f3;
    min-height: 40px;
    padding-left: 20px;
    padding-right: 20px;
}

.navbar .nav.pull-right {
    float: right;
    margin-right: 0;
}

.navbar .nav {
    display: block;
    float: left;
    left: 0;
    margin: 0 10px 0 0;
    position: relative;
}

.dropdown-menu.pull-right,
.pull-right > .dropdown-menu ,
.navbar .pull-right > li > .dropdown-menu,
.navbar .nav > li > .dropdown-menu.pull-right {
    left: auto;
    right: 0;
}

.navbar .nav > li > .dropdown-menu:after {
    border-bottom: 6px solid #fff;
    border-left: 6px solid transparent;
    border-right: 6px solid transparent;
    content: '';
    display: inline-block;
    left: 10px;
    position: absolute;
    top: -6px;
}

.navbar .pull-right > li > .dropdown-menu:after,
.navbar .nav > li > .dropdown-menu.pull-right:after {
    left: auto;
    right: 13px;
}

.navbar .nav > li > .dropdown-menu:before {
    border-left: 7px solid transparent;
    border-right: 7px solid transparent;
    border-bottom: 7px solid #f3f3f3;
    content: '';
    display: inline-block;
    left: 9px;
    position: absolute;
    top: -7px;
}

.navbar .pull-right > li > .dropdown-menu:before,
.navbar .nav > li > .dropdown-menu.pull-right:before {
    left: auto;
    right: 12px;
}

.nav-tabs > li > a,
.nav-pills > li > a {
    line-height: 14px;
    margin-right: 2px;
    padding-left: 10px;
    padding-right: 10px;
}

.nav-tabs {
    border-bottom: 1px solid #f3f3f3;
}

.nav-tabs > li {
    margin-bottom: -1px;
}

.nav-tabs > li > a {
    border-radius: 4px 4px 0 0;
    border: 1px solid transparent;
    line-height: 18px;
    padding: 10px;
}

.nav-tabs > .active > a,
.nav-tabs > .active > a:hover,
.nav-tabs > .active > a:focus {
    background-color: #fff;
    border: 1px solid #f3f3f3;
    border-bottom-color: transparent;
    color: #555;
    cursor: default;
}

.nav-tabs.nav-stacked > li > a {
    border-radius: 0;
}

.nav-pills.nav-stacked > li > a {
    margin-bottom: 3px;
}

.nav-pills.nav-stacked > li:last-child > a {
    margin-bottom: 1px;
}

.nav-stacked > li {
    float: none;
}

.nav-stacked > li > a {
    margin-right: 0;
}

.nav-tabs.nav-stacked {
    border-bottom: 0;
}

.thumbnails {
    list-style: none;
    margin-left: -20px;
}

.row-fluid .thumbnails {
    margin-left: 0;
}

.thumbnails > li {
    float: left;
    margin-bottom: 18px;
    margin-left: 20px;
}

.com_media .thumbnails > li a {
    color: #818fa1;
}

.com_media {
    font-size: 14px ;
    font-weight: 400;
    line-height: 18px;
}

.pull-right.item-image {
    margin: 0 0 20px 20px;
}

.pull-left.item-image {
    margin: 0 20px 20px 0;
}

.label,
.badge {
    background-color: #fafafa;
    border-radius: 3px;
    color: #363637;
    display: inline-block;
    font-size: 14px;
    letter-spacing: 0;
    line-height: 14px;
    padding: 10px 15px;
    vertical-align: middle;
    white-space: nowrap;
}

.badge {
    padding: 5px;
    background-color: #e6e6e6
}

.label:empty,
.badge:empty {
    display: none;
}

.small {
    font-size: 0.7em;
}

/* Modal */
div.modal {
    background-color: #fff;
    border-radius: 6px;
    box-shadow: 0 15px 40px rgba(0,0,0,.15);
    left: 50%;
    margin-left: -40%;
    outline: none;
    position: fixed;
    top: 5%;
    width: 80%;
    z-index: 1050;
}

body:not(.com_gridbox) .modal-body {
    width: 98%;
    position: relative;
    max-height: 400px;
    padding: 1%;
}

div.modal.fade {
    transition: opacity .3s linear, top .3s ease-out;
    top: -25%;
}

div.modal.fade.in {
    top: 5%;
}

.well {
    border: none;
    margin-bottom: 20px;
    min-height: 20px;
    padding: 19px;
}

.thumbnails-media .imgFolder span {
    line-height: 90px !important;
    font-size: 38px !important;
    margin: 0;
    width: auto!important;
}

.container-popup {
    padding: 28px 10px 10px 10px;
}

.modal-header {
    padding: 10px 20px;
}

.modal-header h3 {
    margin: 0;
    text-align: left;
}

button.close {
    -webkit-appearance: none;
    background: transparent;
    border: 0;
    cursor: pointer;
}

.modal-footer {
    border-top: 1px solid #f3f3f3;
    margin-bottom: 0;
    padding: 15px;
    text-align: right;
}

.modal-footer .btn + .btn {
    margin-left: 5px;
    margin-bottom: 0;
}

.modal-footer .btn-group .btn + .btn {
    margin-left: -1px;
}

.modal-footer .btn-block + .btn-block {
    margin-left: 0;
}

/* Modal Backdrop */
body:not(.com_gridbox) .modal-backdrop {
    background-color: #000;
    bottom: 0;
    left: 0;
    position: fixed;
    right: 0;
    top: 0;
    z-index: 1040;
}

.modal-backdrop.fade {
    opacity: 0;
}

body:not(.com_gridbox) .modal-backdrop.in,
body:not(.com_gridbox) .modal-backdrop.fade.in {
    opacity: 0.8;
}

/* Datepicker */
.datepicker-dropdown.datepicker-orient-top:before {
    border-top-color: #f3f3f3;
}

.datepicker-dropdown.dropdown-menu {
    min-width: 250px;
}

/* Radio / Checkbox */
.radio,
.checkbox {
    min-height: 18px;
    padding-left: 20px;
}

.radio input[type="radio"],
.checkbox input[type="checkbox"] {
    margin-left: -20px;
}

#modlgn-remember {
    margin: 0 5px;
    vertical-align: bottom;
}

.controls > .radio:first-child,
.controls > .checkbox:first-child {
    padding-top: 5px;
}

.radio.inline,
.checkbox.inline {
    display: inline-block;
    margin-bottom: 0;
    padding-top: 5px;
    vertical-align: middle;
    width: auto;
}

.radio.inline + .radio.inline,
.checkbox.inline + .checkbox.inline {
    margin-left: 10px;
}

.radio.btn-group input[type=radio] {
    display: none;
}

.radio.btn-group > label:first-of-type {
    border-bottom-left-radius: 4px;
    border-top-left-radius: 4px;
    margin-left: 0;
}

fieldset.radio.btn-group {
    padding-left: 0;
}

select,
.btn-group input,
.filters.btn-toolbar input,
.form-search input,
.form-search textarea,
.form-search select,
.form-search .help-inline,
.form-search .uneditable-input,
.form-search .input-prepend,
.form-search .input-append,
.form-inline input,
.form-inline textarea,
.form-inline select,
.form-inline .help-inline,
.form-inline .uneditable-input,
.form-inline .input-prepend,
.form-inline .input-append,
.form-horizontal input,
.form-horizontal textarea,
.form-horizontal select,
.form-horizontal .help-inline,
.form-horizontal .uneditable-input,
.form-horizontal .input-prepend,
.form-horizontal .input-append {
    display: inline-block;
    font-size: inherit;
    margin-bottom: 0;
    vertical-align: middle;
}

.form-inline label {
    display: inline-block;
}

.dropdown-menu .form-inline input {
    width: auto;
}

/* Control Group */
.control-group {
    margin-bottom: 9px;
}

legend + .control-group {
    margin-top: 18px;
    -webkit-margin-top-collapse: separate;
}

.form-horizontal .control-group {
    margin-bottom: 18px;
}

.form-horizontal .controls {
    margin-left: 180px;
}

.logout .form-horizontal .controls {
    margin-left: 0;
}

.controls > .nav {
    margin-bottom: 20px;
}

.control-group .control-label {
    float: left;
    line-height: 2em;
    padding-top: 5px;
    text-align: right;
    width: 160px;
}

.form-vertical .control-label {
    float: none;
    padding-right: 0;
    padding-top: 0;
    text-align: left;
    width: auto;
}

body:not(.com_gridbox) .btn-group input,
body:not(.com_gridbox) .form-inline input,
body:not(.com_gridbox) .form-vertical .controls input {
    font-size: 18px;
}

.form-horizontal .help-block {
    margin-bottom: 0;
}

.form-horizontal input + .help-block,
.form-horizontal select + .help-block,
.form-horizontal textarea + .help-block,
.form-horizontal .uneditable-input + .help-block,
.form-horizontal .input-prepend + .help-block,
.form-horizontal .input-append + .help-block {
    margin-top: 9px;
}

.form-horizontal .form-actions {
    padding-left: 180px;
}

.control-label .hasPopover,
.control-label .hasTooltip {
    display: inline-block;
    width: auto;
}

/* Collapse */
.collapse {
    height: 0;
    overflow: hidden;
    position: relative;
    transition: height .35s ease;
}

.collapse.in {
    height: auto;
}

/* Alert */
.alert {
    padding: 8px 35px 8px 14px;
}

.alert,
.alert h4 {
    color: #c09853;
}

.alert h4 {
    margin: 0 0 .5em;
}

.alert .close {
    cursor: pointer;
    line-height: 18px;
    position: relative;
    right: -21px;
    top: -2px;
}

.alert-danger,
.alert-error {
    background-color: #f2dede;
    border-color: #eed3d7;
    color: #b94a48;
}

.alert-danger h4,
.alert-error h4 {
    color: #b94a48;
}

.alert-success,
.alert-info {
    background-color: #d9edf7;
    border-color: #bce8f1;
    color: #3a87ad;
}

.alert-success h4,
.alert-info h4 {
    color: #3a87ad;
}

.alert-block {
    padding-top: 14px;
    padding-bottom: 14px;
}

.alert-block > p,
.alert-block > ul {
    margin-bottom: 0;
}

.alert-block p + p {
    margin-top: 5px;
}

.close {
    color: #000;
    float: right;
    font-size: 20px;
    font-weight: bold;
    line-height: 18px;
    opacity: 0.2;
}

.close:hover,
.close:focus {
    color: #000;
    cursor: pointer;
    opacity: 0.4;
    text-decoration: none;
}

/* Button */
.ba-checkout-authentication-btn-wrapper span,
.com_virtuemart .fg-button,
.com_virtuemart .button,
.pager li > a,
.pager li > span,
.btn {
    background-color: #fafafa;
    border-radius: 3px;
    border: none;
    box-sizing: border-box;
    color: #363637;
    cursor: pointer;
    display: inline-block;
    font-size: 14px ;
    font-weight: 500;
    letter-spacing: 0;
    line-height: 18px;
    margin-bottom: 0;
    overflow: hidden;
    padding: 15px;
    text-align: center;
    text-decoration: none;
    text-transform: uppercase;
    vertical-align: middle;
}

a.btn[href="#advancedSearch"] .icon-list {
    display: none;
}

.button:hover,
.btn:hover,
.btn:focus,
.btn:active,
.btn.active,
.btn.disabled,
.btn[disabled],
.btn-primary:hover,
.btn-primary:focus,
.btn-primary:active,
.btn-primary.active,
.btn-primary.disabled,
.btn-primary[disabled] {
    opacity: .85;

}

.btn:hover,
.btn:focus,
.btn:active {
    color: #363637;
    background-color: #e6e6e6;
    border: none;
}

.btn.active,
.btn:active {
    background-image: none;
    outline: 0;
}

.btn-link,
.btn-link:hover,
.btn-link:focus,
.btn-link:active,
.btn-link[disabled] {
    background-color: transparent;
}

.btn-link {
    border-color: transparent;
    cursor: pointer;
}

.btn-block {
    box-sizing: border-box;
    display: block;
    padding-left: 0;
    padding-right: 0;
    width: 100%;
}

.btn-block + .btn-block {
    margin-top: 5px;
}

input[type="submit"].btn-block,
input[type="reset"].btn-block,
input[type="button"].btn-block {
    width: 100%;
}

.ba-checkout-authentication-btn-wrapper span:hover,
.btn-success:hover,
.btn-success:focus,
.btn-success:active,
.btn-success.active,
.btn-success.disabled,
.btn-success[disabled],
.btn-primary:hover,
.btn-primary {
    background-color: var(--primary);
    color: var(--title-inverse);
}

.btn-danger:hover,
.btn-danger:focus,
.btn-danger:active,
.btn-danger.active,
.btn-danger.disabled,
.btn-danger[disabled] {
    background-color: var(--accent);
    color: var(--title-inverse);
}

.btn-group {
    display: inline-block;
    position: relative;
    vertical-align: middle;
    white-space: nowrap;
}

.btn-group + .btn-group {
    margin-left: 5px;
}

.btn-toolbar {
    margin-top: 9px;
    margin-bottom: 9px;
}

.btn-toolbar > .btn + .btn,
.btn-toolbar > .btn-group + .btn,
.btn-toolbar > .btn + .btn-group {
    margin-left: 5px;
}

.btn-group > .btn {
    border-radius: 3px;
    position: relative;
}

.btn-group > .btn + .btn {
    margin-left: -1px;
}

.btn-group > .btn:hover,
.btn-group > .btn:focus,
.btn-group > .btn:active,
.btn-group > .btn.active {
    z-index: 2;
}

.btn-group .dropdown-toggle:active,
.btn-group.open .dropdown-toggle {
    outline: 0;
}

.btn-group > .btn + .dropdown-toggle {
    padding-left: 8px;
    padding-right: 8px;
}

.btn-group.open .dropdown-toggle {
    background-image: none;
}

.btn-group.open .btn.dropdown-toggle {
    background-color: #e6e6e6;
}

.btn-group.open .btn-primary.dropdown-toggle {
    background-color: #51d151;
}

.btn .caret {
    margin-left: 0;
    margin-top: 8px;
}

.btn-primary .caret {
    border-bottom-color: #fff;
    border-top-color: #fff;
}

.btn-group-vertical {
    display: inline-block;
}

.btn-group-vertical > .btn {
    border-radius: 0;
    display: block;
    float: none;
    max-width: 100%;
}

.btn-group-vertical > .btn + .btn {
    margin-left: 0;
    margin-top: -1px;
}

.btn-group-vertical > .btn:first-child {
    border-radius: 4px 4px 0 0;
}

.btn-group-vertical > .btn:last-child {
    border-radius: 0 0 4px 4px;
}

.form-search label,
.form-inline label,
.form-search .btn-group,
.form-inline .btn-group {
    display: inline-block;
}

.input-prepend > .add-on,
.input-append > .add-on {
    vertical-align: top;
}

.input-append,
.input-prepend {
    display: inline-block;
    font-size: 0;
    margin-bottom: 9px;
    vertical-align: middle;
    white-space: nowrap;
}

.input-append .add-on,
.input-prepend .add-on {
    background-color: #fafafa;
    box-sizing: border-box;
    display: inline-block;
    font-size: 14px ;
    font-weight: 500;
    height: 48px;
    line-height: 24px;
    min-width: 16px;
    padding: 10px;
    text-align: center;
}

.input-append .add-on,
.input-append .btn,
.input-append .btn-group > .dropdown-toggle,
.input-prepend .add-on,
.input-prepend .btn,
.input-prepend .btn-group > .dropdown-toggle {
    border-radius: 0;
    vertical-align: top;
}

.input-append .add-on,
.input-append .btn,
.input-append .btn-group {
    margin-left: -1px;
}

.input-prepend .add-on,
.input-prepend .btn {
    margin-right: -1px;
}

.input-prepend .add-on:first-child,
.input-prepend .btn:first-child,
.input-append input,
.input-append select,
.input-append .uneditable-input {
    border-radius: 3px 0 0 3px;
}

.input-append .add-on:last-child,
.input-append .btn:last-child,
.input-append .btn-group:last-child,
.input-append input + .btn-group .btn:last-child,
.input-append select + .btn-group .btn:last-child,
.input-append .uneditable-input + .btn-group .btn:last-child {
    border-radius: 0 3px 3px 0;
}

.input-append select {
    font-size: 18px;
}

/* Dropdown */
.dropup,
.dropdown {
    position: relative;
}

.caret {
    border-left: 4px solid transparent;
    border-right: 4px solid transparent;
    border-top: 4px solid #000;
    content: "";
    display: inline-block;
    height: 0;
    vertical-align: top;
    width: 0;
}

.dropdown .caret {
    margin-left: 2px;
    margin-top: 8px;
}

.dropdown-menu {
    background-color: #fff;
    border: 1px solid #f3f3f3;
    display: none;
    float: left;
    left: 0;
    list-style: none;
    margin: 0;
    min-width: 160px;
    padding: 0;
    position: absolute;
    top: 100%;
    z-index: 1000;
}

.dropdown-menu .divider {
    background-color: #e5e5e5;
    border-bottom: 1px solid #fff;
    height: 1px;
    margin: 8px 1px;
    overflow: hidden;
}

.dropdown-menu .menuitem-group {
    background-color: #eee;
    border-bottom: 1px solid #eee;
    border-top: 1px solid #eee;
    color: #555;
    font-size: 95%;
    height: 1px;
    margin: 4px 1px;
    overflow: hidden;
    padding: 2px 0 24px;
    text-transform: capitalize;
}

.dropdown-menu > li > a {
    clear: both;
    color: #333;
    display: block;
    font-weight: normal;
    line-height: 18px;
    padding: 10px 15px;
    white-space: nowrap;
}

.dropdown-menu > .active > a,
.dropdown-menu > .active > a:hover,
.dropdown-menu > .active > a:focus,
.dropdown-menu > li > a:hover,
.dropdown-menu > li > a:focus,
.dropdown-submenu:hover > a,
.dropdown-submenu:focus > a {
    background-color: #e6e6e6;
    color: #363637;
    outline: 0;
    text-decoration: none;
}

.dropdown-menu > .disabled > a,
.dropdown-menu > .disabled > a:hover,
.dropdown-menu > .disabled > a:focus {
    color: #999;
}

.dropdown-menu > .disabled > a:hover,
.dropdown-menu > .disabled > a:focus {
    background-color: transparent;
    background-image: none;
    cursor: default;
    text-decoration: none;
}

.open > .dropdown-menu {
    display: block;
}

.dropdown-backdrop {
    bottom: 0;
    left: 0;
    position: fixed;
    right: 0;
    top: 0;
    z-index: 990;
}

.dropup .caret,
.navbar-fixed-bottom .dropdown .caret {
    border-bottom: 4px solid #000;
    border-top: 0;
    content: "";
}

.dropup .dropdown-menu,
.navbar-fixed-bottom .dropdown .dropdown-menu {
    bottom: 100%;
    margin-bottom: 1px;
    top: auto;
}

/* Breadcrumb */
.breadcrumb > li {
    display: inline-block;
    text-shadow: 0 1px 0 #fff;
}

.breadcrumb > li .divider.icon-location {
    display: none !important;
}

label {
    display: block;
    margin-bottom: 5px;
}

/* Breadcrumbs */
ul.breadcrumb ul li {
    display: inline-block;
}

ul.breadcrumb .divider:before {
    content: '\f2fb';
    font: normal normal normal 14px/1 'Material-Design-Iconic-Font';
    font-size: inherit;
    margin: 0 10px;
}

ul.breadcrumb .divider img {
    display: none;
}

/* Table */
table {
    background-color: transparent;
    border-collapse: collapse;
    border-spacing: 0;
    max-width: 100%;
}

.table {
    margin-bottom: 18px;
    width: 100%;
}

.table th,
.table td {
    border-top: 1px solid #f3f3f3;
    line-height: 1em;
    padding: 10px;
    text-align: left;
    vertical-align: middle;
}

.table-bordered {
    border-collapse: separate;
    border: 1px solid #f3f3f3;
    border-left: 0;
}

.table-bordered th,
.table-bordered td {
    border-left: 1px solid #f3f3f3;
}

.table-bordered caption + thead tr:first-child th,
.table-bordered caption + tbody tr:first-child th,
.table-bordered caption + tbody tr:first-child td,
.table-bordered colgroup + thead tr:first-child th,
.table-bordered colgroup + tbody tr:first-child th,
.table-bordered colgroup + tbody tr:first-child td,
.table-bordered thead:first-child tr:first-child th,
.table-bordered tbody:first-child tr:first-child th,
.table-bordered tbody:first-child tr:first-child td {
    border-top: 0;
}

.table caption + thead tr:first-child th,
.table caption + thead tr:first-child td,
.table colgroup + thead tr:first-child th,
.table colgroup + thead tr:first-child td,
.table thead:first-child tr:first-child th,
.table thead:first-child tr:first-child td {
    border-top: 0;
}

.table th {
    font-weight: bold;
    padding: 20px 10px;
}

.table thead th {
    vertical-align: bottom;
}

table td[class*="span"],
table th[class*="span"],
.row-fluid table td[class*="span"],
.row-fluid table th[class*="span"] {
    display: table-cell;
    float: none;
    margin-left: 0;
}

.table td.span1,
.table th.span1 {
    float: none;
    margin-left: 0;
    width: 44px;
}

.table td.span2,
.table th.span2 {
    float: none;
    margin-left: 0;
    width: 124px;
}

.table td.span3,
.table th.span3 {
    float: none;
    margin-left: 0;
    width: 204px;
}

.table td.span4,
.table th.span4 {
    float: none;
    margin-left: 0;
    width: 284px;
}

.table td.span5,
.table th.span5 {
    float: none;
    margin-left: 0;
    width: 364px;
}

.table td.span6,
.table th.span6 {
    float: none;
    margin-left: 0;
    width: 444px;
}

.table td.span7,
.table th.span7 {
    float: none;
    margin-left: 0;
    width: 524px;
}

.table td.span8,
.table th.span8 {
    float: none;
    margin-left: 0;
    width: 604px;
}

.table td.span9,
.table th.span9 {
    float: none;
    margin-left: 0;
    width: 684px;
}
.table td.span10,
.table th.span10 {
    float: none;
    width: 764px;
    margin-left: 0;
}

.table td.span11,
.table th.span11 {
    float: none;
    margin-left: 0;
    width: 844px;
}

.table td.span12,
.table th.span12 {
    float: none;
    margin-left: 0;
    width: 924px;
}

/* Pagination */
.pagination {
    margin: 18px 0;
}

.pagination ul {
    border-radius: 4px;
    display: inline-block;
    margin-bottom: 0;
    margin-left: 0;
}

.pagination ul > li {
    display: inline;
}

.com_virtuemart a.pagenav,
.com_virtuemart li.disabled a:hover,
div.k2Pagination ul li a,
#kunena.layout div.pagination a.disabled,
#kunena.layout div.pagination a.disabled:hover,
#kunena.layout .pagination ul > li > a,
#kunena.layout .pagination ul > li > span,
.pagination ul > li > a,
.pagination ul > li > span {
    background-color: #fafafa;
    border: none ;
    border-radius: 3px;
    color: #363637;
    float: left;
    line-height: 18px;
    padding: 10px 15px;
    text-decoration: none;
}

#kunena.layout .pagination ul > li:not(:first-child) > a,
#kunena.layout .pagination ul > li:not(:first-child) > span,
.pagination ul > li:not(:first-child) span,
.pagination ul > li:not(:first-child) a {
    margin-left: 5px;
}

div.k2Pagination ul li a:hover,
.pagination ul > li > a:hover,
.pagination ul > li > a:focus {
    color: #363637;
    background-color: #e6e6e6;
}

div.k2Pagination ul li.active a,
div.k2Pagination ul li.active a:hover,
#kunena.layout .pagination ul > li.active > a,
#kunena.layout .pagination ul > li.active > a:hover,
.pagination ul > .active > a:hover,
.pagination ul > .active > span:hover,
.pagination ul > .active > a,
.pagination ul > .active > span {
    background-color: #51d151;
    color: #fff;
    cursor: default;
}

div.k2Pagination ul li.disabled a,
div.k2Pagination ul li.disabled a:hover,
#kunena.layout div.pagination a.disabled,
#kunena.layout div.pagination a.disabled:hover,
.pagination ul > .disabled > span,
.pagination ul > .disabled > a,
.pagination ul > .disabled > a:hover,
.pagination ul > .disabled > a:focus {
    background: #fafafa;
    cursor: default;
}

.pagination-centered {
    text-align: center;
}

.pagination-right {
    text-align: right;
}

.pager {
    margin: 18px 0;
    list-style: none;
    text-align: center;
}

.pager li {
    display: inline;
}

.label:hover,
.pager li > a:hover,
.pager li > a:focus {
    background-color: #e6e6e6;
    color: #363637;
    text-decoration: none;
}

.pager .next > a,
.pager .next > span {
    float: right;
}

.pager .previous > a,
.pager .previous > span {
    float: left;
}

.pager .disabled > a,
.pager .disabled > a:hover,
.pager .disabled > a:focus,
.pager .disabled > span {
    color: #363637;
    cursor: default;
    opacity: .5;
}

/* Row Striped */
.list-striped,
.row-striped {
    border-top: 1px solid #f3f3f3;
    line-height: 18px;
    list-style: none;
    margin-left: 0;
    text-align: left;
    vertical-align: middle;
}

.list-striped li,
.list-striped dd,
.row-striped .row,
.row-striped .row-fluid {
    border-bottom: 1px solid #f3f3f3;
    padding: 8px;
}

.row-striped .row-fluid {
    box-sizing: border-box;
    width: 100%;
}

.row-striped .row-fluid [class*="span"] {
    min-height: 10px;
}

.row-striped .row-fluid [class*="span"] {
    margin-left: 8px;
}

.row-striped .row-fluid [class*="span"]:first-child {
    margin-left: 0;
}

/* Accordion */
.accordion {
    margin-bottom: 18px;
}

.accordion-group {
    border: 1px solid #f3f3f3;
    margin-bottom: 2px;
}

.accordion-heading {
    border-bottom: 0;
}

.accordion-heading .accordion-toggle {
    display: block;
    padding: 8px 15px;
}

.accordion-toggle {
    cursor: pointer;
}

.accordion-inner {
    border-top: 1px solid #e5e5e5;
    padding: 9px 15px;
}

/* Progress */
.progress {
    background-color: #f7f7f7;
    border-radius: 4px;
    height: 18px;
    margin-bottom: 18px;
    overflow: hidden;
}

.progress .bar {
    background-color: #818fa1;
    box-sizing: border-box;
    color: #fff;
    float: left;
    font-size: 12px;
    height: 100%;
    text-align: center;
    transition: width .6s ease;
    width: 0;
}

/* Login Page */
.login + div .nav-tabs li {
    display: inline-block;
    margin-top: 25px;
}

.login + div .nav-tabs {
    text-align: center;
}

.body .login + div,
.body .remind > form,
.body .reset > form,
.body .login > form {
    margin: 0 auto;
    width: 600px;
}

.body .remind > form,
.body .reset > form,
.body .login > form {
    border: 1px solid var(--border);
    box-sizing: border-box;
    padding: 25px 50px;
}

.chzn-container-multi .chzn-choices,
.chzn-container-single .chzn-single {
    background-image: none;
    background: transparent !important;
    border-radius: 0;
    border: 1px solid #f3f3f3 !important;
    box-shadow: none;
    margin: 0;
}

.chzn-container,
.chzn-container-single {
    font-size: inherit;
    height: 48px;
    line-height: 0;
}

.chzn-select-all {
    line-height: 18px;
}

.chzn-container-single .chzn-single span {
    font-size: 18px;
    line-height: 40px;
}

.chzn-container-single .chzn-single div {
    height: 18px;
    margin-top: 10px;
}

.chzn-container.chzn-container-multi ul,
.chzn-container.chzn-container-multi {
    height: auto;
}

.chzn-container .chzn-drop {
    border-color: #f3f3f3;
    border-radius: 0;
    box-shadow: none;
    display: block;
    max-width: none;
    width: 250px !important;
}

.chzn-container .chzn-results {
    margin: 0;
    padding: 0;
}

.chzn-select-all,
.chzn-container .chzn-results li {
    padding: 10px 15px;
}

.chzn-container .chzn-results li.highlighted {
    background-color: #e6e6e6;
    background-image: none;
    color: #363637;
}

.chzn-container-single .chzn-single {
    font-size: inherit;
    line-height: inherit;
}

.chzn-container-single .chzn-search input[type="text"]{
    line-height: inherit;
    height: initial;
    width: 100%;
}

/* ========================================================================
    Joomla Login
 ========================================================================== */

#login-form .input-prepend .add-on:first-child,
#login-form .input-prepend .btn:first-child,
#login-form .input-append input,
#login-form .input-append select,
#login-form .input-append .uneditable-input {
    display: none;
}

.ba-checkout-authentication-wrapper > div,
#login-form .userdata {
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
    margin: 0 auto;
    max-width: 100%;
    padding: 50px 0; 
    width: 350px;
}

.ba-checkout-authentication-checkbox > .ba-checkbox-wrapper,
#login-form #form-login-remember {
    align-items: center;
    display: flex;
    flex-direction: row-reverse;
    justify-content: flex-end;
    margin: 15px 0 20px;
    padding: 0;
}

#login-form #form-login-submit {
    margin: 0;
}

.ba-checkout-authentication-title {
    margin-bottom: 35px;
}

.ba-checkout-registration-wrapper input,
.ba-checkout-registration-wrapper *,
.ba-checkout-guest-wrapper .ba-checkout-authentication-btn-wrapper span,
.ba-checkout-login-wrapper *,
#login-form .control-group .controls *,
#login-form .control-group .controls {
    width: 100%;
}

.ba-checkout-authentication-links a,
#login-form .control-group .control-label,
#login-form .unstyled li a,
#login-form .control-group .controls * {
    font-size: 14px;
    font-style: normal;
    color: var(--title);
    font-weight: 400;
    letter-spacing: 0px;
    line-height: 14px;
    text-align: left;
    text-decoration: none;
    text-transform: none;
}

.ba-checkout-authentication-links a:hover,
.ba-checkout-authentication-links a,
#login-form .unstyled li a {
    color: var(--text); 
    transition: .3s;
    opacity: 1;
}

 #login-form .unstyled li a,
.ba-checkout-authentication-links a {
    flex-grow: 1;
    font-size: 14px;
    margin-top: 10px;
    text-align: center;
    width: auto;
}

.ba-checkout-authentication-links {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: center;
    margin: 10px 0 0;
}

.ba-checkout-authentication-links a:hover,
.ba-checkout-authentication-links a:hover,
#login-form .unstyled li a:hover {
    opacity: .5;
}

#login-form .unstyled {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    line-height: 14px;
    margin-bottom: 35px;
    margin-top: 20px;
}

#login-form .unstyled li:nth-last-child(3) {
    cursor: pointer;
    margin-top: 35px;
    order: 3;
    text-align: center;
    width: 100%;
}

#login-form .unstyled li:nth-last-child(3) a {
    font-size: initial;
    opacity: 1;
}

#login-form .unstyled li:nth-last-child(3) a > * {
    display: none;
}

#login-form .unstyled li:nth-last-child(3) a:hover,
.ba-show-registration-dialog:hover {
    opacity: .5;
}

.ba-checkout-authentication-btn-wrapper span,
#user-registration .btn-primary.validate,
#login-form .logout-button .btn-primary,
#login-form .controls .btn-primary.login-button {
    color: var(--title-inverse);
    padding: 15px 0;
    font-family: inherit;
    font-size: 14px;
    font-style: normal;
    font-weight: bold;
    letter-spacing: 0px;
    line-height: 26px;
    text-align: center;
    text-decoration: none;
    text-transform: none;
    transition: .3s;
}

#user-registration .btn-primary.validate:hover,
#login-form .logout-button .btn-primary:hover,
#login-form .btn-primary.login-button:hover {
    background-color: var(--hover);
}

#login-form .control-group .control-label {
    width: auto !important;
    font-size: 12px;
    opacity: .5;
}

#login-form #form-login-username {
    margin-bottom: 20px;
}

#login-form #form-login-password input,
#login-form #form-login-username input {
    height: 56px;
}

#login-form #modlgn-remember {
    height: 18px;
    margin: 0 10px 0 0;
    width: 18px;
}

#user-registration .btn-primary.validate,
#login-form .logout-button .btn-primary {
    padding: 15px 30px;
}

#login-form .logout-button .btn-primary {
    margin-top: 15px;
}

/* Checkout Authentication */
body:not(.ba-visible-checkout-authentication) .ba-checkout-authentication-backdrop {
    display: none;
}

.ba-checkout-authentication-backdrop .zmdi-close.ba-leave-checkout {
    cursor: pointer;
    font-size: 24px;
    position: absolute;
    right: 25px;
    top: 25px;
    transition: opacity .3s;
}

.ba-checkout-authentication-backdrop .zmdi-close.ba-leave-checkout:hover {
    opacity: .5;
}

.ba-checkout-registration-backdrop,
.ba-account-order-details-backdrop,
.ba-checkout-authentication-backdrop {
    align-items: center;
    background-color: var(--overlay);
    bottom: 0;
    display: flex;
    justify-content: center;
    left: 0;
    max-height: 100vh;
    overflow: auto;
    position: fixed;
    right: 0;
    top: 0;
    transition: .3s;
    z-index: 100;
}

.ba-checkout-authentication-backdrop {
    background-color: var(--bg-primary);
}

.ba-checkout-registration-backdrop,
.ba-checkout-authentication-backdrop {
    overflow-y: scroll;
    right: auto;
    width: 100vw;
}

.ba-checkout-registration-backdrop {
    align-items: normal;
    background-color: transparent;
    box-sizing: border-box;
    height: calc(50vh + var(--checkout-registration-height) + 50px);
    max-height: none;
    overflow: auto;
    padding: calc( (100vh - var(--checkout-registration-height))/2) 0;
    position: static;
}

.ba-checkout-authentication-wrapper {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    max-width: 95%;
    position: absolute;
}

.ba-checkout-registration-wrapper,
.ba-account-order-details-wrapper,
.ba-checkout-authentication-wrapper > div {
    background: var(--bg-primary);
    border-radius: 6px;
    box-shadow: 0 30px 60px 0 var(--shadow);
    font-size: initial;
    letter-spacing: 0;
    line-height: normal;
    margin: 10px;
    padding: 50px;
    text-align: left;
    width: 450px;
}

.ba-checkout-registration-wrapper,
.ba-checkout-authentication-wrapper > div {
    border-radius: 0; 
    border: 1px solid var(--border);
    box-shadow: none;
}

.ba-checkout-authentication-btn-wrapper span {
    background: var(--primary);
}

.ba-checkout-authentication-btn-wrapper span:hover {
    background-color: var(--hover);
}

.ba-checkout-authentication-checkbox .ba-checkbox {
    margin-right: 10px;
    min-width: 20px;
    position: relative;
    width: 20px;
}

.ba-checkout-registration-wrapper .ba-checkout-authentication-checkbox > .ba-checkbox-wrapper > *:not(.ba-checkbox),
.ba-checkout-authentication-checkbox > .ba-checkbox-wrapper > span {
    color: var(--field-color);
    font-size: 14px;
    line-height: 24px;
    width: auto;
}

.ba-checkout-registration-wrapper .ba-checkout-authentication-checkbox > .ba-checkbox-wrapper {
    align-items: flex-start;
}

.ba-checkout-registration-wrapper .ba-checkout-authentication-checkbox .ba-checkbox {
    margin-top: 8px;
}

.ba-checkout-authentication-checkbox .ba-checkbox span {
    top: -8px;
}

.ba-checkout-guest-wrapper {
    display: flex;
}

.ba-checkout-authentication-text {
    flex-grow: 1;
    font-size: 14px;
    letter-spacing: 0;
    line-height: 28px;
    margin-bottom: 25px;
}

.ba-visible-checkout-authentication {
    bottom: 0;
    left: 0;
    overflow-y: scroll;
    position: fixed;
    right: 0;
    top: 0;
}

.ba-out-checkout-authentication .ba-checkout-authentication-wrapper {
    transform: scale(.5);
    opacity: 0;
}

.ba-checkout-authentication-backdrop:not(.ba-visible-registration-dialog) .ba-checkout-registration-wrapper,
.ba-out-checkout-authentication .ba-checkout-authentication-backdrop {
    opacity: 0;
}

.ba-checkout-registration-wrapper {
    box-sizing: border-box;
    margin-bottom: 50px;
    margin-right: 480px;
    margin-top: 0;
    position: absolute;
    top: calc(50% - (var(--checkout-login-height)/2));
}

@media (max-width: 940px) {
    .ba-checkout-registration-wrapper {
        margin: 0px !important;
        max-width: 90%;
        top: 10px;
    }
}

.ba-checkout-authentication-backdrop:not(.ba-visible-registration-dialog) .ba-checkout-registration-backdrop {
    pointer-events: none;
    position: fixed;
}

.close-registration-modal {
    cursor: pointer;
    font-size: 24px !important;
    position: absolute;
    right: 20px;
    top: 20px;
    transition: .3s;
    width: auto;
    will-change: transform;
}

.close-registration-modal:hover {
    opacity: .5
}

@keyframes visible-registration {
    from {transform: translateY(40%); opacity: 0;}
    to {transform: translateY(0); opacity: 1;}
}

.ba-checkout-authentication-backdrop.ba-visible-registration-dialog .ba-checkout-registration-wrapper {
    animation: visible-registration .4s cubic-bezier(.25,.98,.26,.99) both;
    will-change: transform;
}

@keyframes hide-registration {
    from { opacity: 1;}
    to { opacity: 0;}
}

.ba-checkout-authentication-backdrop.ba-visible-registration-dialog .ba-registration-out .ba-checkout-registration-wrapper {
    animation: hide-registration .4s cubic-bezier(.25,.98,.26,.99) both;
}

/* ========================================================================
    Custom Joomla
 ========================================================================== */

/* Search Results */
.search-results .result-title {
    margin: 30px 0 0;
    text-transform: uppercase;
}

.search-results .result-text {
    margin-top: 20px;
    margin-bottom: 10px;
}

.search-results .result-created {
    font-size: .7em;
}

/* Article */
.article-info-term {
    margin-bottom: 10px;
    text-transform: uppercase;
}

.article-info-term {
    display: none;
}

.article-info dd {
    display: inline-block;
    margin-right: 10px;
    font-size: .8em;
}

.items-more li a {
    text-transform: uppercase;
}

.readmore > a > span {
    display: none !important;
}

.chzn-container-multi .chzn-choices li.search-choice {
    background-color: #fafafa;
    background-image: none;
    border-radius: 3px;
    border: none;
    box-shadow: none;
    display: inline-block;
    font-size: 14px;
    letter-spacing: 0;
    line-height: 14px;
    padding: 10px 15px;
    vertical-align: middle;
    white-space: nowrap;
}

/* ========================================================================
    Forms
 ========================================================================== */

.com-baforms .ba-tooltip {
    margin-left: 0px;
    position: fixed !important;
}

/* ========================================================================
    Kunena
 ========================================================================== */

.userItemTitle,
.userBlock > *,
.tagItemTitle,
.itemTitle,
.itemCommentsForm > *,
.itemRelated > *,
.itemAuthorLatest > *,
.itemAuthorName,
.catItemTitle ,
#kunena .table td h3,
#kunena.layout h1,
#kunena.layout h2,
#kunena.layout h3,
#kunena .btn-link {
    text-align: left;
}

.com_kunena input:not(.btn),
#kunena.layout .filter,
.filter-sel {
    font: inherit;
}

#kunena .dropdown-menu > .center > a + p {
    margin: 0;
}

#kunena .dropdown-menu > .center > a + p a:hover {
    opacity: 1;
}

#kunena #kpost-subscribe .controls,
#kunena #kpost-subscribe .controls input[type='checkbox']{
    margin-top: .5em;
}

#kunena .btn-group .btn:not(.dropdown-toggle) {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
}

#kunena .btn-group .btn.dropdown-toggle {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
    margin-left: -0.3em;
}

#kunena .btn-group.open .btn:not(.btn-primary),
#kunena .btn-group:hover .btn:not(.btn-primary) {
    background-color: #e6e6e6;
    color: #363637;
    opacity: .85;
}

#kunena .btn-group.open .btn.btn-primary,
#kunena .btn-group:hover .btn.btn-primary {
    opacity: .85;
}

#kunena.layout .img-circle {
    background-color: #fff;
}

#kunena.layout .profilebox li {
    margin: 10px 0;
}

#kunena.layout .mykmsg-header {
    background: #fafafa;
    border-top: none;
    border: 1px solid #f3f3f3;
    text-transform: uppercase;
}

#kunena.layout [class*="badger-left"] {
    border: 1px solid #f3f3f3;
    box-shadow: none;
}

/* ========================================================================
    Hikashop
 ========================================================================== */

div.icon-wrapper div.icon a span.hkIcon {
    height: 48px!important;
    width: auto!important;
    padding: 10px 0;
}

.icon-wrapper {
    font-size: initial!important;
    height: auto!important;
    line-height: initial!important;
    width: auto !important;
}

.icon-wrapper [class*=" icon-"]{
    height: auto!important;
    margin-right: initial!important;
    width: auto !important;
}

/* ========================================================================
    K2
 ========================================================================== */

.itemSocialSharing > div {
    margin-top: 0;
}

.itemSocialSharing {
    line-height: 0;
}

.largerFontSize p {
    font-size: 150%;
    line-height: 140%;
}

/* ========================================================================
    Virtuemart
 ========================================================================== */

.com_virtuemart table.user-details input {
    border-radius: 0;
    font-size: inherit;
}

.com_virtuemart #searchMedia,
.com_virtuemart .chzn-container-multi .chzn-choices {
    min-height: 48px;
}

.com_virtuemart input {
    font-size: initial;
}

/* Tab */
.com_virtuemart #ui-tabs ul#tabs {
    border-bottom: 1px solid #f3f3f3;
    line-height: 0;
    overflow:visible;
}

.com_virtuemart #ui-tabs ul#tabs li {
    background-color: transparent;
    border-radius: 4px 4px 0 0;
    border: 1px solid transparent;
    color: #555;
    line-height: 18px;
    padding: 10px;
    margin-bottom: -1px;
}

.com_virtuemart #ui-tabs ul#tabs li.current{
    border: 1px solid #f3f3f3;
    border-bottom-color: transparent;
    background: #fff;
    cursor: default;
}

.com_virtuemart .modal {
    background-color: transparent;
    position: static;
    z-index: 0;
}

.com_virtuemart .fg-button {
    height: auto !important;
}

.com_virtuemart .product-container h1,
.com_virtuemart .ask-a-question-view h1,
.com_virtuemart .manufacturer-details-view h1,
.com_virtuemart .manufacturer-view-default h2,
.com_virtuemart .category-view h1,
.com_virtuemart .vendor-details-view h3,
.com_virtuemart .vendor-details-view h1 {
    text-align: left;
}

/* Button */
.com_virtuemart .orderlistcontainer div.activeOrder,
.com_virtuemart .general-bg,
.com_virtuemart input.custom-attribute,
.com_virtuemart input.quantity-input,
.com_virtuemart .manufacturer-product-link a,
.com_virtuemart a.ask-a-question,
.com_virtuemart input.vm-default,
.com_virtuemart a.product-details,
.com_virtuemart a.details,
.com_virtuemart div.details,
.com_virtuemart button.default,
.com_virtuemart input.highlight-button,
.com_virtuemart div.vm-details-button a,
.com_virtuemart span.addtocart-button span.addtocart-button,
.com_virtuemart span.addtocart-button input.addtocart-button,
.com_virtuemart span.addtocart-button input.notify-button {
    background-color: #fafafa;
    border-radius: 3px;
    border: none;
    box-sizing: border-box;
    color: #363637;
    cursor: pointer;
    display: inline-block;
    font: 500 14px/18px 'Roboto', sans-serif;
    letter-spacing: 0;
    margin-bottom: 0;
    overflow: hidden;
    padding: 15px;
    text-align: center;
    text-decoration: none;
    text-transform: uppercase;
    vertical-align: middle;
}

.com_virtuemart .general-bg:hover,
.com_virtuemart input.custom-attribute:hover,
.com_virtuemart input.quantity-input:hover,
.com_virtuemart .manufacturer-product-link a:hover,
.com_virtuemart a.ask-a-question:hover,
.com_virtuemart input.vm-default:hover,
.com_virtuemart a.product-details:hover,
.com_virtuemart a.details:hover,
.com_virtuemart div.details:hover,
.com_virtuemart button.default:hover,
.com_virtuemart a.details:hover,
.com_virtuemart div.details:hover,
.com_virtuemart a.product-details:hover {
    background-color: #e6e6e6;
    background-image: none;
    background-position: 0;
    border: none;
    color: #363637;
    opacity: .85;
}

.com_virtuemart input.highlight-button,
.com_virtuemart input.highlight-button:hover,
.com_virtuemart span.addtocart-button span.addtocart-button:hover,
.com_virtuemart span.addtocart-button input.addtocart-button:hover,
.com_virtuemart span.addtocart-button input.notify-button:hover,
.com_virtuemart span.addtocart-button span.addtocart-button,
.com_virtuemart span.addtocart-button input.addtocart-button,
.com_virtuemart span.addtocart-button input.notify-button {
    background: #51cf51;
    color: #fff;
}

.com_virtuemart input.highlight-button:hover,
.com_virtuemart span.addtocart-button span.addtocart-button:hover,
.com_virtuemart span.addtocart-button input.addtocart-button:hover,
.com_virtuemart span.addtocart-button input.notify-button:hover {
    opacity: .85;
}

.com_virtuemart .orderlistcontainer {
    position: relative;
}

.com_virtuemart .orderlistcontainer div.orderlist {
    width: 100%;
}

.com_virtuemart .orderlistcontainer a {
    color: #363637;
}

.com_virtuemart .orderlistcontainer div.activeOrder{
    background-position: 98% 12px;
    padding-right: 30px !important;
}

.com_virtuemart .orderlistcontainer div.orderlist {
    border-color: #f3f3f3;
}

/* Message */
.com_virtuemart #system-message {
    background: #02adea;
}";s:6:"output";s:0:"";}