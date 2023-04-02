const pageSize = 8;

const TrangChu = {
  data() {
    return {
      products: [],
      currentPage: 1,
      total: 0,
      sortBy: SORT_BY.NEWEST,
      selectedType: "",
      checkedBrands: Object.values(PRODUCT_BRANDS), 
      searchKey: "",
      minPrice: "0",
      maxPrice: "100000000",
    };
  },
  mounted() {
    this.fetchData();
  },
  computed: {
    productType() {
      return PRODUCT_TYPE;
    },
    productBrand() {
      return PRODUCT_BRANDS;
    },
    productSort() {
      return SORT_BY;
    },
    pageCount() {
      return Math.ceil(this.total / pageSize);
    },
    pages() {
      const pages = [];
      for (let i = 1; i <= this.pageCount; i++) {
        pages.push(i);
      }

      return pages;
    },
    canNextPage() {
      return this.currentPage < this.pageCount;
    },
    canPreviousPage() {
      return this.currentPage > 1;
    },
  },
  watch: {
    minPrice() {
      this.onPriceChange();
    },
    maxPrice() {
      this.onPriceChange();
    },
    searchKey() {
      this.onSearchKeyChange();
    },
    checkedBrands() {
      this.onBrandSelectionChange();
    }
  },
  methods: {
    fetchData() {
      const { total, data } = getPaginatedProducts({
        pageIndex: this.currentPage - 1,
        pageSize: pageSize,
        filterBy: {
          type: this.selectedType,
          checkedBrands: this.checkedBrands,
        },
        sortBy: this.sortBy,
        searchKey: this.searchKey,
        minPrice: this.minPrice,
        maxPrice: this.maxPrice,
      });
      console.log(this.checkedBrands);
      this.total = total;
      this.products = data;
    },
    onSearchKeyChange() {
      this.currentPage = 1;
      this.fetchData();
    },
    onPriceChange() {
      this.currentPage = 1;
      this.fetchData();
    },
    onSortChange(e) {
      const value = e.target.value;
      this.sortBy = value;
      this.currentPage = 1;
      this.fetchData();
    },
    onBrandSelectionChange() {
      this.currentPage = 1;
      this.fetchData();
    },
    onTypeChange(type) {
      if (this.selectedType === type) {
        this.selectedType = "";
      } else {
        this.selectedType = type;
      }

      this.currentPage = 1;
      this.fetchData();
    },
    onProductClick(product) {
      window.location.href = `chitietsanpham.html?productId=${product.id}`;
    },
    onNextPage() {
      if (this.canNextPage) {
        this.currentPage += 1;
        this.fetchData();
      }
    },
    onPreviousPage() {
      if (this.canPreviousPage) {
        this.currentPage -= 1;
        this.fetchData();
      }
    },
    onPageChange(page) {
      this.currentPage = page;
      this.fetchData();
    },
    formatPrice(value) {
      let val = (value / 1).toFixed(0).replace(".", ",");
      return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    },
  },
};

const app = Vue.createApp(TrangChu);
app.component("app-header", AppHeader);
app.component("app-footer", AppFooter);
app.mount("#app");
