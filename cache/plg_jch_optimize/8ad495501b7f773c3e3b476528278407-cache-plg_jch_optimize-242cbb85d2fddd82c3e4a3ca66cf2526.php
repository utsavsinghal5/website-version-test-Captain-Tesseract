<?php die("Access Denied"); ?>#x#a:2:{s:6:"result";s:38887:"try {
/**
* @package   Gridbox template
* @author    Balbooa http://www.balbooa.com/
* @copyright Copyright @ Balbooa
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/
console.log = function(){
    return false;
};

var recaptchaCommentsOnload = function() {
    $g('.ba-item-comments-box > .ba-comments-box-wrapper > .ba-comment-message-wrapper .ba-comments-captcha-wrapper').each(function(){
        app.initCommentsRecaptcha(this);
    });
};

var $g = jQuery,
    delay = '',
    itemsInit = new Array(),
    app = {
        hash: window.location.hash,
        view : 'desktop',
        modules : {},
        loading : {},
        edit : {},
        items : {},
        getErrorText: function(text){
            let div = document.createElement('div');
            div.innerHTML = text;
            if (div.querySelector('title')) {
                text = div.querySelector('title').textContent;
            }

            return text;
        },
        fetch: async function(url, data){
            let request = await fetch(url, {
                    method: 'POST',
                    cache: 'no-cache',
                    body: app.getFormData(data)
                }),
                response = null;
            if (request.ok) {
                response = await request.text();
            } else {
                let utf8Decoder = new TextDecoder("utf-8"),
                    reader = request.body.getReader(),
                    textData = await reader.read(),
                    text = utf8Decoder.decode(textData.value);
                console.info(app.getErrorText(text));
            }

            return response;
        },
        getFormData: function(data){
            let formData = new FormData();
            if (data) {
                for (let ind in data) {
                    formData.append(ind, data[ind]);
                }
            }

            return formData;
        },
        decimalAdjust: function(type, value, exp){
            if (typeof exp === 'undefined' || +exp === 0) {
                return Math[type](value);
            }
            value = +value;
            exp = +exp;
            if (isNaN(value) || !(typeof exp === 'number' && exp % 1 === 0)) {
                return NaN;
            }
            value = value.toString().split('e');
            value = Math[type](+(value[0] + 'e' + (value[1] ? (+value[1] - exp) : -exp)));
            value = value.toString().split('e');

            return +(value[0]+'e'+(value[1] ? (+value[1] + exp) : exp));
        },
        strrev: function(string){
            let ret = '', i = 0;
            for (i = string.length - 1; i >= 0; i--) {
                ret += string[i];
            }

            return ret;
        },
        renderPrice: function(value, thousand, separator, decimals){
            value = app.decimalAdjust('round', value, decimals * -1);
            value = String(value);
            let delta = value < 0 ? '-' : '',
                priceArray = value.replace('-', '').trim().split('.'),
                priceThousand = priceArray[0],
                priceDecimal = priceArray[1] ? priceArray[1] : '',
                price = '';
            if (priceThousand.length > 3 && thousand != '') {
                for (let i = 0; i < priceThousand.length; i++) {
                    if (i % 3 == 0 && i != 0) {
                        price += thousand;
                    }
                    price += priceThousand[priceThousand.length - 1 - i];
                }
                price = app.strrev(price);
            } else {
                price += priceThousand;
            }
            if (decimals != 0) {
                price += separator;
                for (let i = 0; i < decimals; i++) {
                    price += priceDecimal[i] ? priceDecimal[i] : '0';
                }
            }

            return delta+price;
        },
        getObject: function(key){
            var object = $g.extend(true, {}, app.items[key].desktop);
            if (app.view != 'desktop') {
                for (var ind in breakpoints) {
                    if (!app.items[key][ind]) {
                        app.items[key][ind] = {};
                    }
                    object = $g.extend(true, {}, object, app.items[key][ind]);
                    if (ind == app.view) {
                        break;
                    }
                }
            }

            return object;
        },
        sendCommentsEmails: function(){
            $g.ajax({
                type : "POST",
                dataType : 'text',
                url : JUri+"index.php?option=com_gridbox&task=comments.sendCommentsEmails"
            });
            $g.ajax({
                type : "POST",
                dataType : 'text',
                url : JUri+"index.php?option=com_gridbox&task=reviews.sendCommentsEmails"
            });
        },
        initCommentsRecaptcha: function(parent){
            if (!recaptchaObject) {

                return false;
            }
            let elem = document.createElement('div'),
                options = {
                    sitekey : recaptchaObject.public_key
                };
            elem.id = 'comments-recaptcha-'+(+new Date());
            elem.className = 'comments-recaptcha';
            parent.innerHTML = '';
            parent.appendChild(elem);
            if (recaptchaObject.type == 'recaptcha') {
                options.theme = recaptchaObject.theme;
                options.size = recaptchaObject.size;
            } else {
                options.badge = recaptchaObject.badge;
                options.size = 'invisible';
                elem.closest('.ba-comments-captcha-wrapper').classList.add(options.badge+'-style');
            }
            recaptchaObject.data[elem.id] = grecaptcha.render(elem, options);
            if (recaptchaObject.type != 'recaptcha') {
                grecaptcha.execute(recaptchaObject.data[elem.id]);
            }
        },
        hideNotice:function(){
            app.notification.classList.remove('notification-in');
            app.notification.classList.add('animation-out');
        },
        checkOverlay: function(obj, key){
            $g('.ba-item-overlay-section').each(function(){
                var overlay = $g(this).find('.ba-overlay-section-backdrop');
                if (overlay.length > 0) {
                    document.body.appendChild(overlay[0]);
                }
            });
        },
        _: function(key){
            if (window.gridboxLanguage && gridboxLanguage[key]) {
                return gridboxLanguage[key];
            } else {
                return key;
            }
        },
        checkGridboxPaymentError: function(){
            let gridbox_payment_error = localStorage.getItem('gridbox_payment_error');
            if (gridbox_payment_error) {
                app.showNotice(gridbox_payment_error, 'ba-alert');
                localStorage.removeItem('gridbox_payment_error');
            }
        },
        showNotice:function(message, className){
            if (!app.notification) {
                app.notification = document.createElement('div');
                app.notification.id = 'ba-notification';
                app.notification.innerHTML = '<i class="zmdi zmdi-close"></i><h4>'+this._('ERROR')+'</h4><p></p>';
                app.notification.querySelector('.zmdi-close').addEventListener('click', function(){
                    app.hideNotice();
                });
                document.body.appendChild(app.notification);
            }
            app.notification.showCallback = function(){};
            if (!className) {
                className = '';
            }
            if (app.notification.classList.contains('notification-in')) {
                app.notification.showCallback = function(){
                    app.notification.showCallback = function(){};
                    app.addNoticeText(message, className);
                };
            } else {
                app.addNoticeText(message, className);
            }
        },
        addNoticeText: function(message, className){
            var time = 3000;
            if (className == 'ba-alert') {
                time = 6000;
            }
            app.notification.querySelector('p').innerHTML = message;
            if (className) {
                app.notification.classList.add(className);
            } else {
                app.notification.classList.remove('ba-alert');
            }
            app.notification.classList.remove('animation-out')
            app.notification.classList.add('notification-in');
            clearTimeout(app.notification.hideDelay);
            app.notification.hideDelay = setTimeout(function(){
                app.hideNotice();
                setTimeout(function(){
                    if (className) {
                        app.notification.classList.remove(className);
                    }
                    app.notification.showCallback();
                }, 400);
            }, time);
        },
        checkAnimation: function(){
            app.viewportItems = new Array();
            $g('.ba-section, .ba-row, .ba-grid-column').each(function(){
                if (app.items[this.id] && $g(this).closest('.ba-item-content-slider').length == 0) {
                    var object = $g.extend(true, {}, app.items[this.id].desktop.animation);
                    if (app.view != 'desktop') {
                        for (var ind in breakpoints) {
                            if (!app.items[this.id][ind]) {
                                app.items[this.id][ind] = {
                                    animation : {}
                                };
                            }
                            object = $g.extend(true, {}, object, app.items[this.id][ind].animation);
                            if (ind == app.view) {
                                break;
                            }
                        }
                    }
                    if (object.effect && app.items[this.id].type != 'sticky-header') {
                        var obj = {
                            effect : object.effect,
                            item : $g(this)
                        }
                        app.viewportItems.push(obj);
                    } else if (object.effect) {
                        $g(this).addClass('visible');
                    }
                }
            });
            if (app.viewportItems.length > 0 || $g('.ba-item-slideshow').length > 0 || $g('.ba-item-main-menu'.length > 0)) {
                app.checkModule('loadAnimations');
            }
        },
        checkModule : function(module, obj){
            if (typeof(obj) != 'undefined') {
                app.modules[module] = obj;
            }
            if (typeof(app[module]) == 'undefined' && !app.loading[module]) {
                app.loading[module] = true;
                app.loadModule(module);
            } else if (typeof(app[module]) != 'undefined') {
                if (typeof(obj) != 'undefined') {
                    app[module](obj.data, obj.selector);
                } else {
                    app[module]();
                }
            }
        },
        checkVideoBackground : function(){
            var flag = false;
            $g('.ba-section, .ba-row, .ba-grid-column').each(function(){
                if (app.items[this.id] && app.items[this.id].desktop.background.type == 'video') {
                    flag = true;
                    return false;
                }
            });
            $g('.ba-item-flipbox').each(function(){
                if (app.items[this.id] && app.items[this.id].sides.frontside.desktop.background.type == 'video') {
                    flag = true;
                    return false;
                }
                if (app.items[this.id] && app.items[this.id].sides.backside.desktop.background.type == 'video') {
                    flag = true;
                    return false;
                }
            });
            if (app.theme.desktop.background.type == 'video') {
                flag = true;
            }
            if (flag) {
                app.checkModule('createVideo', {});
            }
        },
        loadModule : function(module){
            if (module != 'setCalendar' && module != 'defaultElementsStyle' && module != 'gridboxLanguage' &&
                module != 'shapeDividers' && module != 'presetsPatern') {
                var script = document.createElement('script');
                script.type = 'text/javascript';
                script.src = JUri+'components/com_gridbox/libraries/modules/'+module+'.js?'+gridboxVersion;
                document.getElementsByTagName('head')[0].appendChild(script);
                return false;
            }
            $g.ajax({
                type:"POST",
                dataType:'text',
                url:"index.php?option=com_gridbox&task=editor.loadModule&module="+module+"&"+gridboxVersion,
                data:{
                    module : module
                },
                complete: function(msg){
                    var script = document.createElement('script');
                    script.type = 'text/javascript';
                    document.getElementsByTagName('head')[0].appendChild(script);
                    script.innerHTML = msg.responseText;
                }
            });
        },
        checkView: function(){
            var width = $g(window).width();
            app.view = 'desktop';
            for (var ind in breakpoints) {
                if (width <= breakpoints[ind]) {
                    app.view = ind;
                }
            }
        },
        hideCommentsModal: function(){
            $g('.ba-comments-modal .ba-comments-modal-backdrop, .ba-comments-modal .ba-btn').off('click.hide').on('click.hide', function(){
                this.closest('.ba-comments-modal').classList.remove('visible-comments-dialog');
            });
        },
        resize: function(){
            clearTimeout(delay);
            app.checkView();
            delay = setTimeout(function(){
                if ('setPostMasonryHeight' in window) {
                    $g('.ba-blog-posts-wrapper.ba-masonry-layout').each(function(){
                        var key = $g(this).closest('.ba-item').attr('id');
                        setPostMasonryHeight(key);
                    });
                }
                if ('setGalleryMasonryHeight' in window) {
                    $g('.instagram-wrapper.simple-gallery-masonry-layout').each(function(){
                        setGalleryMasonryHeight(this.closest('.ba-item').id);
                    });
                }
            }, 300);
        },
        checkCommentInTabs: function(hash){
            $g('a[name="'+hash.replace('#', '')+'"]').first().each(function(){
                let tab = this.closest('.tab-pane, .accordion-body');
                if (tab && !tab.classList.contains('active') && !tab.classList.contains('in')) {
                    $g('a[href="#'+tab.id+'"]').trigger('click');
                    this.scrollIntoView(true);
                }
            });
        },
        gridboxLoaded: function(){
            app.checkView();
            app.checkAnimation();
            checkOnePage();
            window.addEventListener('resize', app.resize);
            $g(window).on('scroll', function(){
                var top = window.pageYOffset;
                if (!('lastPageYOffset' in window)) {
                    window.lastPageYOffset = top;
                }
                if (top > 40) {
                    $g('header').addClass('fixed-header');
                } else {
                    $g('header').removeClass('fixed-header');
                }
                $g('.ba-sticky-header').each(function(){
                    if (this.querySelector('.ba-sticky-header > .ba-section')) {
                        var section = this.querySelector('.ba-sticky-header > .ba-section'),
                            obj = app.items[section.id],
                            offset = obj.desktop.offset;
                        if (app.view != 'desktop') {
                            for (var ind in breakpoints) {
                                if (!obj[ind]) {
                                    obj[ind] = {};
                                }
                                offset = obj[ind].offset ? obj[ind].offset : offset;
                                if (ind == app.view) {
                                    break;
                                }
                            }
                        }
                        if (!this.classList.contains('visible-sticky-header')) {
                            if (top >= offset * 1 && (!obj.scrollup || (obj.scrollup && top - window.lastPageYOffset < 0))) {
                                this.classList.add('visible-sticky-header');
                                document.body.classList.add('sticky-header-opened');
                                if (obj.desktop.animation.effect) {
                                    section.classList.add(obj.desktop.animation.effect);
                                    setTimeout(function(){
                                        section.classList.remove(obj.desktop.animation.effect);
                                    }, obj.desktop.animation.delay * 1 + obj.desktop.animation.duration * 1000);
                                }
                                $g(window).trigger('scroll');
                            }
                        }
                        if ((top < offset * 1 && !obj.scrollup) || (obj.scrollup && (top - window.lastPageYOffset > 0
                            || top <= offset * 1))) {
                            this.classList.remove('visible-sticky-header');
                            document.body.classList.remove('sticky-header-opened');
                        }
                    }
                });
                window.lastPageYOffset = top;
            });
            $g(window).trigger('scroll');
            $g('.ba-item [contenteditable]').removeAttr('contenteditable');
            if ($g('.ba-item-overlay-section').length > 0) {
                app.checkModule('checkOverlay');
            }
            $g('.ba-item-main-menu, .ba-item-one-page-menu, .ba-item-overlay-section').each(function(){
                if (app.items[this.id]) {
                    var obj = {
                        data : app.items[this.id],
                        selector : this.id
                    };
                    itemsInit.push(obj);
                }
            });
            $g('.ba-item').not('.ba-item-main-menu, .ba-item-one-page-menu, .ba-item-overlay-section').each(function(){
                if (app.items[this.id]) {
                    var obj = {
                        data : app.items[this.id],
                        selector : this.id
                    };
                    itemsInit.push(obj);
                }
            });
            if (itemsInit.length > 0) {
                itemsInit.reverse();
                app.checkModule('initItems', itemsInit.pop());
            }
            app.checkVideoBackground();
            $g('.ba-lightbox-backdrop').find('.ba-lightbox-close').on('click', function(){
                lightboxVideoClose($g(this).closest('.ba-lightbox-backdrop')[0]);
                $g(this).closest('.ba-lightbox-backdrop').removeClass('visible-lightbox');
                $g('body').removeClass('lightbox-open');
            });
            $g('.ba-lightbox-backdrop').each(function(){
                var obj = app.items[this.dataset.id];
                if (obj.type == 'cookies') {
                    initLightbox(this, obj);
                } else if (!obj.session.enable) {
                    initLightbox(this, obj);
                } else {
                    var flag = true;
                    if (localStorage[this.dataset.id]) {
                        var date =  new Date().getTime(),
                            expires = new Date(localStorage[this.dataset.id]);
                        expires.getTime();
                        if (date >= expires) {
                            flag = true;
                            localStorage.removeItem(this.dataset.id);
                        } else {
                            flag = false;
                        }
                    }
                    if (flag) {
                        var expiration = new Date();
                        expiration.setDate(expiration.getDate() + obj.session.duration);
                        localStorage.setItem(this.dataset.id, expiration);
                        initLightbox(this, obj);
                    }
                }
            });
            $g('.ba-section, .ba-row, .ba-grid-column').each(function(){
                if (app.items[this.id] && app.items[this.id].parallax && app.items[this.id].parallax.enable) {
                    app.checkModule('loadParallax');
                    return false;
                }
            });
        }
    };

document.addEventListener("DOMContentLoaded", function(){
    document.body.style.left = '';
    document.body.style.position = '';
    document.body.style.overflow = '';
    document.body.style.margin = '';
    var preloader = document.querySelector('.ba-item-preloader');
    if (preloader) {
        setTimeout(function(){
            preloader.classList.add('preloader-animation-out');
            app.checkGridboxPaymentError();
        }, preloader.dataset.delay * 1000);
    } else {
        app.checkGridboxPaymentError();
    }
    $g.ajax({
        type : "POST",
        dataType : 'text',
        url : JUri+"index.php?option=com_gridbox&task=editor.checkSitemap"
    });
    app.sendCommentsEmails();
    app.hideCommentsModal();
    if ('setPostMasonryHeight' in window) {
        $g('.ba-blog-posts-wrapper.ba-masonry-layout').each(function(){
            var key = $g(this).closest('.ba-item').attr('id');
            setPostMasonryHeight(key);
        });
    }
    if ('setGalleryMasonryHeight' in window) {
        $g('.instagram-wrapper.simple-gallery-masonry-layout').each(function(){
            setGalleryMasonryHeight(this.closest('.ba-item').id);
        });
    }
    if (app.hash == '#total-count-wrapper' || app.hash == '#total-reviews-count-wrapper') {
        app.checkCommentInTabs(app.hash);
    }
    $g('body').on('click', function(){
        $g('.visible-select').removeClass('visible-select');
        if (app.storeSearch && app.storeSearch.visible) {
            app.storeSearch.clearSearch();
        }
    }).on('hide', '.modal', function(){
        this.classList.add('ba-modal-close');
        setTimeout(function(){
            $g('.ba-modal-close').removeClass('ba-modal-close');
        }, 500);
 });
    $g('.ba-custom-select').on('click', 'i, input', function(){
        let parent = $g(this).closest('.ba-custom-select');
        if (!parent.find('ul').hasClass('visible-select')) {
            setTimeout(function(){
                parent.find('ul').addClass('visible-select');
            }, 100);
        }
    }).on('click', 'li', function(){
        let parent = $g(this).closest('.ba-custom-select');
        parent.find('li.selected').removeClass('selected');
        this.classList.add('selected');
        parent.find('input[type="text"]').val(this.textContent.trim());
        parent.find('input[type="hidden"]').val(this.dataset.value).trigger('change');
        parent.trigger('customAction');
    });
    $g('.intro-post-reviews a, .intro-post-comments a').on('click', function(){
        app.checkCommentInTabs(this.hash);
    });
    $g('li.megamenu-item').on('mouseenter', function(){
        var rectangle = this.getBoundingClientRect(),
            left = rectangle.left * -1,
            wrapper = $g(this).find(' > div.tabs-content-wrapper'),
            width = document.documentElement.clientWidth,
            maxwidth = width - rectangle.right;
        if (wrapper.hasClass('megamenu-center') && wrapper.hasClass('ba-container')) {
            left = $g(this).width() / 2;
        }
        if (rectangle.left < maxwidth) {
            maxwidth = rectangle.left;
        }
        if (!wrapper.hasClass('megamenu-center')) {
            maxwidth = width - rectangle.left;
        } else if (wrapper.hasClass('ba-container')) {
            left -= wrapper.outerWidth() / 2;
        }
        if (wrapper.hasClass('megamenu-center')) {
            maxwidth = (maxwidth + (rectangle.right - rectangle.left) / 2) * 2;
        }
        if ($g(this).closest('.ba-menu-wrapper').hasClass('vertical-menu')) {
            maxwidth = width - rectangle.right;
        }
        wrapper.css({
            'margin-left' : left+'px',
            'width' : width+'px',
            'max-width' : maxwidth+'px'
        });
    });
    $g('.ba-item-main-menu').closest('.ba-row').addClass('row-with-menu');
    for (var key in gridboxItems) {
        if (key != 'theme') {
            app.items = $g.extend(true, app.items, gridboxItems[key]);
        }
    }
    app.theme = gridboxItems.theme;
    app.gridboxLoaded();
    /*$g.ajax({
        type: "POST",
        dataType: 'text',
        url: JUri+"index.php?option=com_gridbox&task=editor.getItems",
        data: themeData,
        complete: function(msg){
            var data = JSON.parse(msg.responseText)
            for (var key in data) {
                if (key != 'theme') {
                    app.items = $g.extend(true, app.items, data[key]);
                }
            }
            app.theme = data.theme;
            app.gridboxLoaded();
        }
    });*/
});

var lightboxVideo = {};

function lightboxVideoClose(item)
{
    var iframes = item.querySelectorAll('.ba-item-custom-html iframe, .ba-item-video iframe');
    for (var i = 0; i < iframes.length; i++) {
        var src = iframes[i].src,
            videoId = iframes[i].id;
        if (src && src.indexOf('youtube.com') !== -1 && 'pauseVideo' in lightboxVideo[videoId]) {
            lightboxVideo[videoId].pauseVideo();
        } else if (src && src.indexOf('vimeo.com') !== -1 && 'pause' in lightboxVideo[videoId]) {
            lightboxVideo[videoId].pause();
        }
    }
    iframes = item.querySelectorAll('.ba-item-video video, .ba-item-custom-html video');
    for (var i = 0; i < iframes.length; i++) {
        var videoId = iframes[i].id;
        lightboxVideo[videoId].pause();
    }
}

function lightboxVideoOpen(item)
{
    var iframes = item.querySelectorAll('.ba-item-custom-html iframe, .ba-item-video iframe'),
        youtube = false,
        vimeo = false,
        id = +new Date();
    for (var i = 0; i < iframes.length; i++) {
        var src = iframes[i].src,
            videoId;
        if (src && src.indexOf('youtube.com') !== -1) {
            if (!app.youtube) {
                youtube = true;
            } else {
                if (src.indexOf('enablejsapi=1') === -1) {
                    if (src.indexOf('?') === -1) {
                        src += '?';
                    } else {
                        src += '&'
                    }
                    src += 'enablejsapi=1';
                    iframes[i].src = src;
                }
                if (!iframes[i].id) {
                    iframes[i].id = id++;
                }
                videoId = iframes[i].id;
                if (!lightboxVideo[videoId] || !('playVideo' in lightboxVideo[videoId])) {
                    lightboxVideo[videoId] = new YT.Player(videoId, {
                        events: {
                            onReady: function(event){
                                lightboxVideo[videoId].playVideo();
                            }
                        }
                    });
                } else {
                    lightboxVideo[videoId].playVideo();
                }
            }
        } else if (src && src.indexOf('vimeo.com') !== -1) {
            if (!app.vimeo) {
                vimeo = true;
            } else {
                if (!iframes[i].id) {
                    iframes[i].id = id++;
                }
                videoId = iframes[i].id;
                if (!lightboxVideo[videoId] || !('play' in lightboxVideo[videoId])) {
                    src = src.split('/');
                    src = src.slice(-1);
                    src = src[0].split('?');
                    src = src[0];
                    var options = {
                        id: src * 1,
                        loop: true,
                    };
                    lightboxVideo[videoId] = new Vimeo.Player(videoId, options);
                }
                lightboxVideo[videoId].play();
            }
        }
    }
    iframes = item.querySelectorAll('.ba-item-video video, .ba-item-custom-html video');
    for (var i = 0; i < iframes.length; i++) {
        if (!iframes[i].id) {
            iframes[i].id = id++;
        }
        videoId = iframes[i].id;
        if (!lightboxVideo[videoId]) {
            lightboxVideo[videoId] = iframes[i];
        }
        lightboxVideo[videoId].play();
    }
    if (youtube || vimeo) {
        var object = {
            data : {}
        };
        if (youtube && !vimeo) {
            object.data.type = 'youtube';
        } else if (vimeo && !youtube) {
            object.data.type = 'vimeo';
        } else {
            object.data.type = 'youtube+vimeo';
        }
        app.checkModule('loadVideoApi', object);
    }
    if (youtube) {
        lightboxVideo.overlay = item;
    } else if (vimeo) {
        lightboxVideo.overlay = item;
    }

    return !youtube && !vimeo;
}

function initLightbox($this, obj)
{
    var obj = app.items[$this.dataset.id];
    if (obj.type == 'cookies') {
        if (localStorage['ba-item-cookie']) {
            return false;
        }
        $g($this).find('.ba-item-button[data-cookie="accept"]').on('click', function(event){
            event.preventDefault();
            localStorage.setItem('ba-item-cookie', 'accept');
            $g(this).closest('.ba-lightbox-backdrop').removeClass('visible-lightbox');
            $g('body').removeClass('lightbox-open');
        });
        showLightbox($this);
    } else if (obj.trigger.type == 'time-delay') {
        setTimeout(function(){
            showLightbox($this);
        }, obj.trigger.time);
    } else if (obj.trigger.type == 'scrolling') {
        lightboxScroll($this, obj.trigger.scroll * 1);
    } else if (obj.trigger.type == 'exit-intent') {
        $g(document).one('mouseleave.ba-lightbox'+$this.dataset.id, function(){
            showLightbox($this);
        });
    } else {
        lightboxScroll($this, 100);
    }
}

function lightboxScroll($this, scroll)
{
    var top,
        docHeight,
        htmlHeight;
    $g(window).on('scroll.ba-lightbox'+$this.dataset.id+' load.ba-lightbox'+$this.dataset.id, function(){
        top = $g(window).scrollTop();
        docHeight = document.documentElement.clientHeight
        htmlHeight = Math.max(
            document.body.scrollHeight, document.documentElement.scrollHeight,
            document.body.offsetHeight, document.documentElement.offsetHeight,
            document.body.clientHeight, document.documentElement.clientHeight
        );
        var x = (docHeight + top) * 100 / htmlHeight;
        if (x >= scroll || (scroll > 97 && x >= 97)) {
            $g(window).off('scroll.ba-lightbox'+$this.dataset.id+' load.ba-lightbox'+$this.dataset.id);
            showLightbox($this);
        }
    });
}

function showLightbox($this)
{
    var obj = app.getObject($this.dataset.id);
    if (!lightboxVideoOpen($this) || obj.disable == 1) {
        return false;
    }
    $this.classList.add('visible-lightbox');
    if (obj.position == 'lightbox-center') {
        document.body.classList.add('lightbox-open');
    }
}

function compileOnePageValue(item)
{
    var value = item.offset().top,
        header = $g('header.header'),
        comp = header[0] ? getComputedStyle(header[0]) : {},
        top = window.pageYOffset,
        stickies = $g('.ba-sticky-header'),
        sticky = 0;
    if (item.closest('.ba-wrapper').parent().hasClass('header')) {
        value = 0;
    } else {
        stickies.each(function(){
            if (this.offsetHeight > 0) {
                let section = this.querySelector('.ba-sticky-header > .ba-section'),
                    obj = app.items[section.id],
                    offset = obj ? obj.desktop.offset : 0;
                if (app.view != 'desktop') {
                    for (var ind in breakpoints) {
                        if (!obj[ind]) {
                            obj[ind] = {};
                        }
                        offset = obj[ind].offset ? obj[ind].offset : offset;
                        if (ind == app.view) {
                            break;
                        }
                    }
                }
                if (obj && ((!obj.scrollup && offset < value) || (obj.scrollup && offset < value && value < top))) {
                    sticky = this.offsetHeight > sticky ? this.offsetHeight : sticky;
                }
            }
        });
        if ((!header.hasClass('sidebar-menu') || (app.view != 'desktop' && app.view != 'laptop')) && comp.position == 'fixed') {
            sticky = header[0].offsetHeight > sticky ? header[0].offsetHeight : sticky;
            if (header.find('.resizing-header').length > 0) {
                var resizingSection = getComputedStyle(header.find('.resizing-header')[0]);
                value += resizingSection.paddingTop.replace('px', '') * 1;
                value += resizingSection.paddingBottom.replace('px', '') * 1;
            }
        }
        value -= sticky;
    }

    return value;
}

function checkOnePage()
{
    var alias = location.hash.replace('#', '');
    alias = decodeURIComponent(alias);
    if (alias && document.querySelector('.ba-item-one-page-menu a[data-alias="'+alias+'"]')) {
        $g('.ba-item-one-page-menu a[data-alias="'+alias+'"]').each(function(){
            var item = $g(this.hash);
            if ($g(this.parentNode).height() > 0 && this.hash && item.length > 0) {
                $g(this).closest('ul').find('.active').removeClass('active');
                $g('.ba-item-one-page-menu ul.nav.menu a[href*="'+this.hash+'"]').parent().addClass('active');
                var value = compileOnePageValue(item);
                if (window.pageYOffset != value) {
                    $g('html, body').stop().animate({
                        'scrollTop' : value
                    }, 1000);
                }
                return false;
            }
        });
    } else {
        checkOnePageActive();
    }
}

function checkOnePageActive()
{
    var items = new Array(),
        alias = '',
        replace = null,
        flag = false;
    $g('.ba-item-one-page-menu ul li a').each(function(){
        if ($g(this).height() > 0 && this.hash && $g(this.hash).height() > 0) {
            var computed = getComputedStyle(document.querySelector(this.hash));
            if (computed.display != 'none') {
                items.push(this);
            }
        }
    });
    items.sort(function(item1, item2){
        var target1 = $g(item1.hash),
            target2 = $g(item2.hash),
            top1 = target1.closest('header.header').length == 0 ? target1.offset().top : 0,
            top2 = target2.closest('header.header').length == 0 ? target2.offset().top : 0;
        if (top1 > top2) {
            return 1;
        } else if (top1 < top2) {
            return -1;
        } else {
            return 0;
        }
    });
    for (var i = items.length - 1; i >= 0; i--) {
        alias = items[i].dataset.alias;
        if (decodeURI(window.location.hash) == '#'+alias) {
            replace = location.href.replace(window.location.hash, '');
        }
        var value = compileOnePageValue($g(items[i].hash)),
            url = location.href.replace(window.location.hash, '')+'#'+alias;
        if (Math.floor(value) <= Math.floor(window.pageYOffset) + 1) {
            flag = true;
            $g('.ba-item-one-page-menu ul.nav.menu a[href*="'+items[i].hash+'"]').closest('ul').find('.active').removeClass('active');
            $g('.ba-item-one-page-menu ul.nav.menu a[href*="'+items[i].hash+'"]').parent().addClass('active');
            break;
        }
    }
    if (!flag) {
        $g('.ba-item-one-page-menu .main-menu ul.nav.menu .active').removeClass('active');
        replace ? window.history.replaceState(null, null, replace) : '';
    } else if (decodeURI(window.location.hash) != '#'+alias) {
        window.history.replaceState(null, null, url);
    }
}

window.addEventListener('resize', function(){
    document.documentElement.style.setProperty('--vh', window.innerHeight * 0.01+'px');
});

jQuery(window).on('popstate.onepage', function(){
    onePageScroll = false;
    setTimeout(function(){
        onePageScroll = true;
    }, 300);
});

/*
    Default joomla
*/

document.addEventListener('DOMContentLoaded', function(){
    document.documentElement.style.setProperty('--vh', window.innerHeight * 0.01+'px');
    $g('*[rel=tooltip]').tooltip();
    $g('.radio.btn-group label').addClass('btn');
    $g('fieldset.btn-group').each(function() {
        if (this.disabled) {
            $g(this).css('pointer-events', 'none').off('click');
            $g(this).find('.btn').addClass('disabled');
        }
    });
    $g(".btn-group label:not(.active)").click(function(){
        var label = $g(this),
            input = $g('#'+label.attr('for'));
        if (!this.checked) {
            label.closest('.btn-group').find("label").removeClass('active btn-success btn-danger btn-primary');
            if (input.val() == '') {
                label.addClass('active btn-primary');
            } else if (input.val() == 0) {
                label.addClass('active btn-danger');
            } else {
                label.addClass('active btn-success');
            }
            input.prop('checked', true).trigger('change');
        }
    });
    $g(".btn-group input[checked=checked]").each(function(){
        if (this.value == '') {
            $g("label[for="+this.id+"]").addClass('active btn-primary');
        } else if ($g(this).val() == 0) {
            $g("label[for="+this.id+"]").addClass('active btn-danger');
        } else {
            $g("label[for="+this.id+"]").addClass('active btn-success');
        }
    });
    $g('#back-top').on('click', function(e) {
        e.preventDefault();
        $g("html, body").animate({
            scrollTop: 0
        }, 1000);
    });
});
} catch (e) {
console.error('Error in file:/templates/gridbox/js/gridbox.js?2.10.5; Error:' + e.message);
};";s:6:"output";s:0:"";}