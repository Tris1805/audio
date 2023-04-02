const Index = {
    data() {
        return {
            products: [],
        }
    },
    method: {
        onProductClick(product) {
            window.location.href = `chitietsanpham.html?productId=${product.id}`;
        },
        formatPrice(value) {
            let val = (value / 1).toFixed(0).replace(".", ",");
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        },
    },
};

const app = Vue.createApp(Index);
app.component("app-header", AppHeader);
app.component("app-footer", AppFooter);
app.mount("#app");