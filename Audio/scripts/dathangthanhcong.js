const DonHang = {
    data() {
      return {
        payment: {
            items: []
        },
      };
    },
    mounted() {
        const payment = cartService.getPaymentInfo();
        if (payment) {
            this.payment = payment;
        }
    },  
    computed: {
        totalPrice() {
            return this.formatPrice(
              this.payment.items.reduce(
                (previous, currentItem) => (previous += currentItem.price),
                0
              )
            );
          },
    },
    methods: {
        formatPrice(value) {
            let val = (value / 1).toFixed(0).replace(".", ",");
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        },
    }
}


const app = Vue.createApp(DonHang);
app.component("app-header", AppHeader);
app.component("app-footer", AppFooter);
app.mount("#app");