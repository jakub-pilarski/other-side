(function () {
  function qs(sel, ctx) {
    return (ctx || document).querySelector(sel);
  }

  function openCart() {
    var wrap = qs('.mini-cart-wrapper');
    if (wrap) {
      wrap.classList.add('is-open');
    }
  }

  function closeCart() {
    var wrap = qs('.mini-cart-wrapper');
    if (wrap) {
      wrap.classList.remove('is-open');
    }
  }

  document.addEventListener('click', function (e) {
    var openBtn = e.target.closest('.shopping-cart-btn');
    if (openBtn) {
      e.preventDefault();
      openCart();
      return;
    }

    var closeBtn = e.target.closest('.mini-cart-close');
    if (closeBtn) {
      e.preventDefault();
      closeCart();
      return;
    }

    var overlay = e.target.closest('.mini-cart-overlay');
    if (overlay) {
      e.preventDefault();
      closeCart();
    }
  });

  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') {
      closeCart();
    }
  });
})();
