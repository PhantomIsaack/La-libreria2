const btnCart = document.querySelector('.container-icon')
const containerCartProducts = document.querySelector('container-cart-products')
btnCart.addEventListener('click', () => {
  containerCartProducts.classlist.toggle('hidden-cart')
}
