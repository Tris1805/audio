const GioHang = {
  data() {
    return {
      cartItems: [],
      tenKH: "",
      diachiKH: "",
      sdtKH: "",
      ghichuKH: "",
      user: null,
    };
  },
  mounted() {
    this.user = authService.getSession();
    this.cartItems = cartService.getCartItems();
  },
  computed: {
    totalPrice() {
      return this.formatPrice(
        this.cartItems.reduce(
          (previous, currentItem) => (previous += currentItem.price),
          0
        )
      );
    },
  },
  methods: {
    onPayment() {

      if (!this.user) {
        alert("Vui lòng đăng nhập trước khi mua hàng!");
        window.location.href = "dangnhap.html";
        return;
      }

      if (this.tenKH == "" || this.diachiKH == "" || this.sdtKH == "") {
        alert("Vui lòng nhập đầy đủ thông tin");
        return;
      }

      const payment = {
        tenKH: this.tenKH,
        diachiKH: this.diachiKH,
        sdtKH: this.sdtKH,
        ghichuKH: this.ghichuKH,
        items: this.cartItems,
      };

      cartService.addPaymentInfo(payment)
        alert("Đặt hàng thành công, ấn OK để về trang chủ");
        window.location.href = "index.html";
        cartService.clearCart();
    
    },
    onRemoveItem(item) {
      cartService.removeCartItem(item);
      this.cartItems = cartService.getCartItems();
    },
    formatPrice(value) {
      let val = (value / 1).toFixed(0).replace(".", ",");
      return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    },
  },
};

const app = Vue.createApp(GioHang);
app.component("app-header", AppHeader);
app.component("app-footer", AppFooter);
app.mount("#app");
