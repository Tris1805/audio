const ChiTietSanPham = {
  data() {
    return {
      product: null,
    };
  },
  mounted() {
    const productId = getQueryParams("productId");
    const product = getProductById(productId);

    this.product = product;
  },
  methods: {
    formatPrice(value) {
      let val = (value / 1).toFixed(0).replace(".", ",");
      return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    },
    onAddToCart() {
      if (this.product) {
        cartService.addCartItem(this.product);
        alert("Đã thêm sản phẩm vào giỏ hàng thành công");
      }
    },
  },
};

const app = Vue.createApp(ChiTietSanPham);
app.component("app-header", AppHeader);
app.component("app-footer", AppFooter);
app.mount("#app");
