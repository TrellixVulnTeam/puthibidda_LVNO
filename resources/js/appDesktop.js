import "@babel/polyfill";
require('./bootstrap');
window.Vue = require('vue');
window.jQuery = window.$ = jQuery;
require('select2');
import App from './App.vue'
import router from './router'
require('es6-promise/auto');
import TodaysSpecial from './templates/TodaysSpecial.vue'
import BookFinder from './templates/BookFinder.vue'
import WelcomeMenu from './templates/WelcomeMenu.vue'
import NewRegistration from './templates/NewRegistration.vue'
import HomecontacthelpNav from './templates/HomecontacthelpNav.vue'

import SuperContainer from './containers/SuperContainer.vue'
import MobileContainer from './containers/MobileContainer.vue'


$(document).ready(function(){
  Vue.config.devtools = true;
  Vue.component('todays-special', TodaysSpecial)
  Vue.component('book-finder', BookFinder)

  Vue.component('welcome-menu', WelcomeMenu)
  Vue.component('new-registration', NewRegistration)

  Vue.component('homecontacthelp-nav', HomecontacthelpNav)
  Vue.component('super-container', SuperContainer)
  Vue.component('mobile-container', MobileContainer)

  var vm = new Vue({
    el: '#root',
    components: { App },
    router,
    props:[
      'books',
      'categories',
      'appjs',
    ],
    data: {
      uxmeta:[],
      uxmenu:[],
      handle: 'homepage',
      categorypage:-1
    },
    methods:{
      loadDTLfnct: function(){
        $('.product').each(function(i, el){
          // Lift card and show stats on Mouseover
          $(el).find('.make3D').hover(function(){
            $(this).parent().css('z-index', "20");
            $(this).addClass('animate');
            $(this).find('div.carouselNext, div.carouselPrev').addClass('visible');
          }, function(){
            $(this).removeClass('animate');
            $(this).parent().css('z-index', "1");
            $(this).find('div.carouselNext, div.carouselPrev').removeClass('visible');
          });

          // Flip card to the back side
          $(el).find('.view_gallery').click(function(){

            $(el).find('div.carouselNext, div.carouselPrev').removeClass('visible');
            $(el).find('.make3D').addClass('flip-10');
            setTimeout(function(){
              $(el).find('.make3D').removeClass('flip-10').addClass('flip90').find('div.shadow').show().fadeTo( 80 , 1, function(){
                $(el).find('.product-front, .product-front div.shadow').hide();
              });
            }, 50);

            setTimeout(function(){
              $(el).find('.make3D').removeClass('flip90').addClass('flip190');
              $(el).find('.product-back').show().find('div.shadow').show().fadeTo( 90 , 0);
              setTimeout(function(){
                $(el).find('.make3D').removeClass('flip190').addClass('flip180').find('div.shadow').hide();
                setTimeout(function(){
                  $(el).find('.make3D').css('transition', '100ms ease-out');
                  $(el).find('.cx, .cy').addClass('s1');
                  setTimeout(function(){$(el).find('.cx, .cy').addClass('s2');}, 100);
                  setTimeout(function(){$(el).find('.cx, .cy').addClass('s3');}, 200);
                  $(el).find('div.carouselNext, div.carouselPrev').addClass('visible');
                }, 100);
              }, 100);
            }, 150);
          });

          // Flip card back to the front side
          $(el).find('.flip-back').click(function(){

            $(el).find('.make3D').removeClass('flip180').addClass('flip190');
            setTimeout(function(){
              $(el).find('.make3D').removeClass('flip190').addClass('flip90');

              $(el).find('.product-back div.shadow').css('opacity', 0).fadeTo( 100 , 1, function(){
                $(el).find('.product-back, .product-back div.shadow').hide();
                $(el).find('.product-front, .product-front div.shadow').show();
              });
            }, 50);

            setTimeout(function(){
              $(el).find('.make3D').removeClass('flip90').addClass('flip-10');
              $(el).find('.product-front div.shadow').show().fadeTo( 100 , 0);
              setTimeout(function(){
                $(el).find('.product-front div.shadow').hide();
                $(el).find('.make3D').removeClass('flip-10').css('transition', '100ms ease-out');
                $(el).find('.cx, .cy').removeClass('s1 s2 s3');
              }, 100);
            }, 150);

          });

          makeCarousel(el);
        });


        /* ----  Image Gallery Carousel   ---- */
        function makeCarousel(el){
          var carousel = $(el).find('.carousel ul');
          var carouselSlideWidth = 315;
          var carouselWidth = 0;
          var isAnimating = false;
          var currSlide = 0;
          $(carousel).attr('rel', currSlide);

          // building the width of the casousel
          $(carousel).find('li').each(function(){
            carouselWidth += carouselSlideWidth;
          });
          $(carousel).css('width', carouselWidth);

          // Load Next Image
          $(el).find('div.carouselNext').on('click', function(){
            var currentLeft = Math.abs(parseInt($(carousel).css("left")));
            var newLeft = currentLeft + carouselSlideWidth;
            if(newLeft == carouselWidth || isAnimating === true){return;}
            $(carousel).css({'left': "-" + newLeft + "px",
            "transition": "300ms ease-out"
          });
          isAnimating = true;
          currSlide++;
          $(carousel).attr('rel', currSlide);
          setTimeout(function(){isAnimating = false;}, 300);
        });
        $(el).find('div.carouselPrev').on('click', function(){
          var currentLeft = Math.abs(parseInt($(carousel).css("left")));
          var newLeft = currentLeft - carouselSlideWidth;
          if(newLeft < 0  || isAnimating === true){return;}
          $(carousel).css({'left': "-" + newLeft + "px",
          "transition": "300ms ease-out"
        });
        isAnimating = true;
        currSlide--;
        $(carousel).attr('rel', currSlide);
        setTimeout(function(){isAnimating = false;}, 300);
      });
    }
  },
  loadUXmeta: function(handle){
    axios.get('/getuxmeta/'+ handle).then(response=>(this.uxmeta=response.data));
  },
  loadUXmenu: function(lang){
    axios.get('/getuxmenu/'+ lang).then(response=>(this.uxmenu=response.data));
  },
  addToCart: function(event){
    addToCart(event);
  }
},
mounted(){
  this.loadUXmeta(this.handle);
  this.loadUXmenu('en_title');
  window.onpopstate = function(event) {
    console.log("location: " + document.location + ", state: " + JSON.stringify(event.state));
  };
},
});
$('.nav-link').on('click',function(e){
  console.log(e);
});
$('#filtersubmit').on('click',function(e){
  alert('Hello');
});
function searchBooks(){
  console.log('clicked on search');
}

// Utility function
function Util () {};
/*
class manipulation functions
*/
Util.hasClass = function(el, className) {
  if (el.classList) return el.classList.contains(className);
  else return !!el.className.match(new RegExp('(\\s|^)' + className + '(\\s|$)'));
};
Util.addClass = function(el, className) {
  var classList = className.split(' ');
  if (el.classList) el.classList.add(classList[0]);
  else if (!Util.hasClass(el, classList[0])) el.className += " " + classList[0];
  if (classList.length > 1) Util.addClass(el, classList.slice(1).join(' '));
};
Util.removeClass = function(el, className) {
  var classList = className.split(' ');
  if (el.classList) el.classList.remove(classList[0]);
  else if(Util.hasClass(el, classList[0])) {
    var reg = new RegExp('(\\s|^)' + classList[0] + '(\\s|BDT )');
    el.className=el.className.replace(reg, ' ');
  }
  if (classList.length > 1) Util.removeClass(el, classList.slice(1).join(' '));
};
Util.toggleClass = function(el, className, bool) {
  if(bool) Util.addClass(el, className);
  else Util.removeClass(el, className);
};
Util.setAttributes = function(el, attrs) {
  for(var key in attrs) {
    el.setAttribute(key, attrs[key]);
  }
};
/*
DOM manipulation
*/
Util.getChildrenByClassName = function(el, className) {
  var children = el.children,
  childrenByClass = [];
  for (var i = 0; i < el.children.length; i++) {
    if (Util.hasClass(el.children[i], className)) childrenByClass.push(el.children[i]);
  }
  return childrenByClass;
};
/*
Animate height of an element
*/
Util.setHeight = function(start, to, element, duration, cb) {
  var change = to - start,
  currentTime = null;

  var animateHeight = function(timestamp){
    if (!currentTime) currentTime = timestamp;
    var progress = timestamp - currentTime;
    var val = parseInt((progress/duration)*change + start);
    // console.log(val);
    element.setAttribute("style", "height:"+val+"px;");
    if(progress < duration) {
      window.requestAnimationFrame(animateHeight);
    } else {
      cb();
    }
  };

  //set the height of the element before starting animation -> fix bug on Safari
  element.setAttribute("style", "height:"+start+"px;");
  window.requestAnimationFrame(animateHeight);
};
/*
Smooth Scroll
*/
Util.scrollTo = function(final, duration, cb) {
  var start = window.scrollY || document.documentElement.scrollTop,
  currentTime = null;

  var animateScroll = function(timestamp){
    if (!currentTime) currentTime = timestamp;
    var progress = timestamp - currentTime;
    if(progress > duration) progress = duration;
    var val = Math.easeInOutQuad(progress, start, final-start, duration);
    window.scrollTo(0, val);
    if(progress < duration) {
      window.requestAnimationFrame(animateScroll);
    } else {
      cb && cb();
    }
  };

  window.requestAnimationFrame(animateScroll);
};
/*
Focus utility classes
*/
//Move focus to an element
Util.moveFocus = function (element) {
  if( !element ) element = document.getElementsByTagName("body")[0];
  element.focus();
  if (document.activeElement !== element) {
    element.setAttribute('tabindex','-1');
    element.focus();
  }
};
/*
Misc
*/
Util.getIndexInArray = function(array, el) {
  return Array.prototype.indexOf.call(array, el);
};
Util.cssSupports = function(property, value) {
  if('CSS' in window) {
    return CSS.supports(property, value);
  } else {
    var jsProperty = property.replace(/-([a-z])/g, function (g) { return g[1].toUpperCase();});
    return jsProperty in document.body.style;
  }
};
/*
Polyfills
*/
//Closest() method
if (!Element.prototype.matches) {
  Element.prototype.matches = Element.prototype.msMatchesSelector || Element.prototype.webkitMatchesSelector;
}

if (!Element.prototype.closest) {
  Element.prototype.closest = function(s) {
    var el = this;
    if (!document.documentElement.contains(el)) return null;
    do {
      if (el.matches(s)) return el;
      el = el.parentElement || el.parentNode;
    } while (el !== null && el.nodeType === 1);
    return null;
  };
}

//Custom Event() constructor
if ( typeof window.CustomEvent !== "function" ) {

  function CustomEvent ( event, params ) {
    params = params || { bubbles: false, cancelable: false, detail: undefined };
    var evt = document.createEvent( 'CustomEvent' );
    evt.initCustomEvent( event, params.bubbles, params.cancelable, params.detail );
    return evt;
  }

  CustomEvent.prototype = window.Event.prototype;

  window.CustomEvent = CustomEvent;
}
/*
Animation curves
*/
Math.easeInOutQuad = function (t, b, c, d) {
  t /= d/2;
  if (t < 1) return c/2*t*t + b;
  t--;
  return -c/2 * (t*(t-2) - 1) + b;
};
var cart = document.getElementsByClassName('js-cd-cart');
if(cart.length > 0) {
  var cartAddBtns = document.getElementsByClassName('js-cd-add-to-cart'),
  cartBody = cart[0].getElementsByClassName('cd-cart__body')[0],
  cartList = cartBody.getElementsByTagName('ul')[0],
  cartListItems = cartList.getElementsByClassName('cd-cart__product'),
  cartTotal = cart[0].getElementsByClassName('cd-cart__checkout')[0].getElementsByTagName('span')[0],
  cartCount = cart[0].getElementsByClassName('cd-cart__count')[0],
  cartCountItems = cartCount.getElementsByTagName('li'),
  cartUndo = cart[0].getElementsByClassName('cd-cart__undo')[0],
  productId = 0, //this is a placeholder -> use your real product ids instead
  cartTimeoutId = false,
  animatingQuantity = false;
  initCartEvents();
  function initCartEvents() {
    // add products to cart
    console.log('Output'+cartAddBtns.length);
    for(var i = 0; i < cartAddBtns.length; i++) {(function(i){
      cartAddBtns[i].addEventListener('click', addToCart);
    })(i);}

    // open/close cart
    cart[0].getElementsByClassName('cd-cart__trigger')[0].addEventListener('click', function(event){
      event.preventDefault();
      toggleCart();
    });

    cart[0].addEventListener('click', function(event) {
      if(event.target == cart[0]) { // close cart when clicking on bg layer
        toggleCart(true);
      } else if (event.target.closest('.cd-cart__delete-item')) { // remove product from cart
        event.preventDefault();
        removeProduct(event.target.closest('.cd-cart__product'));
      }
    });

    // update product quantity inside cart
    cart[0].addEventListener('change', function(event) {
      if(event.target.tagName.toLowerCase() == 'select') quickUpdateCart();
    });

    //reinsert product deleted from the cart
    cartUndo.addEventListener('click', function(event) {
      if(event.target.tagName.toLowerCase() == 'a') {
        event.preventDefault();
        if(cartTimeoutId) clearInterval(cartTimeoutId);
        // reinsert deleted product
        var deletedProduct = cartList.getElementsByClassName('cd-cart__product--deleted')[0];
        Util.addClass(deletedProduct, 'cd-cart__product--undo');
        deletedProduct.addEventListener('animationend', function cb(){
          deletedProduct.removeEventListener('animationend', cb);
          Util.removeClass(deletedProduct, 'cd-cart__product--deleted cd-cart__product--undo');
          deletedProduct.removeAttribute('style');
          quickUpdateCart();
        });
        Util.removeClass(cartUndo, 'cd-cart__undo--visible');
      }
    });
  };
  var addToCart  = (event) => {
    event.preventDefault();
    if(animatingQuantity) return;
    var cartIsEmpty = Util.hasClass(cart[0], 'cd-cart--empty');
    //update cart product list
    let title= event.target.getAttribute('data-title');
    let cover= event.target.getAttribute('data-cover');
    let price= event.target.getAttribute('data-price');

    addProduct(this,title, cover, price);
    //update number of items
    updateCartCount(cartIsEmpty);
    //update total price
    updateCartTotal(event.target.getAttribute('data-price'), true);
    //show cart
    Util.removeClass(cart[0], 'cd-cart--empty');
  };

  function toggleCart(bool) { // toggle cart visibility
    var cartIsOpen = ( typeof bool === 'undefined' ) ? Util.hasClass(cart[0], 'cd-cart--open') : bool;

    if( cartIsOpen ) {
      Util.removeClass(cart[0], 'cd-cart--open');
      //reset undo
      if(cartTimeoutId) clearInterval(cartTimeoutId);
      Util.removeClass(cartUndo, 'cd-cart__undo--visible');
      removePreviousProduct(); // if a product was deleted, remove it definitively from the cart

      setTimeout(function(){
        cartBody.scrollTop = 0;
        //check if cart empty to hide it
        if( Number(cartCountItems[0].innerText) == 0) Util.addClass(cart[0], 'cd-cart--empty');
      }, 500);
    } else {
      Util.addClass(cart[0], 'cd-cart--open');
    }
  };
  function addProduct(target, title, cover, price) {
    // this is just a product placeholder
    // you should insert an item with the selected product info
    // replace productId, productName, price and url with your real product info
    // you should also check if the product was already in the cart -> if it is, just update the quantity
    productId = productId + 1;
    var productAdded = '<li class="cd-cart__product"><div class="cd-cart__image" ><a href="#0"><img src="'+cover+'" alt="placeholder"></a></div><div class="cd-cart__details"><h3 class="truncate"><a href="#0">'+title+'</a></h3><div class="cd-cart__actions"><a href="#0" class="cd-cart__delete-item">Delete</a><div class="cd-cart__quantity"><label for="cd-product-'+ productId +'">Qty</label><span class="cd-cart__select"><select class="reset" id="cd-product-'+ productId +'" name="quantity"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option></select></span></div></div><span class="cd-cart__price">BDT '+price+'</span></div></li>';
    cartList.insertAdjacentHTML('beforeend', productAdded);
  };
  function removeProduct(product) {
    if(cartTimeoutId) clearInterval(cartTimeoutId);
    removePreviousProduct(); // prduct previously deleted -> definitively remove it from the cart

    var topPosition = product.offsetTop,
    productQuantity = Number(product.getElementsByTagName('select')[0].value),
    productTotPrice = Number((product.getElementsByClassName('cd-cart__price')[0].innerText).replace('BDT ', '')) * productQuantity;

    product.style.top = topPosition+'px';
    Util.addClass(product, 'cd-cart__product--deleted');

    //update items count + total price
    updateCartTotal(productTotPrice, false);
    updateCartCount(true, -productQuantity);
    Util.addClass(cartUndo, 'cd-cart__undo--visible');

    //wait 8sec before completely remove the item
    cartTimeoutId = setTimeout(function(){
      Util.removeClass(cartUndo, 'cd-cart__undo--visible');
      removePreviousProduct();
    }, 8000);
  };
  function removePreviousProduct() { // definitively removed a product from the cart (undo not possible anymore)
    var deletedProduct = cartList.getElementsByClassName('cd-cart__product--deleted');
    if(deletedProduct.length > 0 ) deletedProduct[0].remove();
  };
  function updateCartCount(emptyCart, quantity) {
    if( typeof quantity === 'undefined' ) {
      var actual = Number(cartCountItems[0].innerText) + 1;
      var next = actual + 1;

      if( emptyCart ) {
        cartCountItems[0].innerText = actual;
        cartCountItems[1].innerText = next;
        animatingQuantity = false;
      } else {
        Util.addClass(cartCount, 'cd-cart__count--update');

        setTimeout(function() {
          cartCountItems[0].innerText = actual;
        }, 150);

        setTimeout(function() {
          Util.removeClass(cartCount, 'cd-cart__count--update');
        }, 200);

        setTimeout(function() {
          cartCountItems[1].innerText = next;
          animatingQuantity = false;
        }, 230);
      }
    } else {
      var actual = Number(cartCountItems[0].innerText) + quantity;
      var next = actual + 1;

      cartCountItems[0].innerText = actual;
      cartCountItems[1].innerText = next;
      animatingQuantity = false;
    }
  };
  function updateCartTotal(price, bool) {
    cartTotal.innerText = bool ? (Number(cartTotal.innerText) + Number(price)).toFixed(2) : (Number(cartTotal.innerText) - Number(price)).toFixed(2);
  };
  function quickUpdateCart() {
    var quantity = 0;
    var price = 0;

    for(var i = 0; i < cartListItems.length; i++) {
      if( !Util.hasClass(cartListItems[i], 'cd-cart__product--deleted') ) {
        var singleQuantity = Number(cartListItems[i].getElementsByTagName('select')[0].value);
        quantity = quantity + singleQuantity;
        price = price + singleQuantity*Number((cartListItems[i].getElementsByClassName('cd-cart__price')[0].innerText).replace('BDT ', ''));
      }
    }

    cartTotal.innerText = price.toFixed(2);
    cartCountItems[0].innerText = quantity;
    cartCountItems[1].innerText = quantity+1;
  };
}

});
