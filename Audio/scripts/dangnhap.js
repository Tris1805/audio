const DangNhap = {
  data() {
    return {
      username: "",
      password: "",
      user: {},
    };
  },
  mounted() {
    this.user = authService.getSession();
    console.log(this.user);
  },
  computed: {
    isLoggedIn() {
      return !!authService.getSession();
    },
  },
  methods: {
    onLogin() {
      if (!this.username || !this.password) {
        alert("Tên đăng nhập hoặc mật khẩu không được bỏ trống");
        return;
      }

      const result = authService.login({
        username: this.username,
        password: this.password,
      });

      if (result.ok) {
        alert("Đăng nhập thành công, bấm OK để chuyển đến trang trước");
        window.location.href = "trangchu.html";
      } else {
        alert(
          "Đăng nhập thất bại, vui lòng kiểm tra lại tài khoản hoặc mật khẩu"
        );
      }
    },
    onLogout() {
      authService.logout();
      commonStorage.setItem(STORAGE_KEY.PAYMENT, null);
      window.location.href = "trangchu.html";
    },
    onRebill() {
      window.location.href = "dathangthanhcong.html";
    },
    onRegister() {
      if (!this.username || !this.password) {
        alert("Tên đăng nhập hoặc mật khẩu không được bỏ trống");
        return;
      }

      const result = authService.register({
        username: this.username,
        password: this.password,
      });

      if (result.ok) {
        alert(
          "Đã đăng ký thành công tài khoản: " +
            result.user.username +
            " vui lòng đăng nhập để mua hàng"
        );
      } else {
        alert("Đã có lỗi xảy ra, đăng ký thất bại");
      }
    },
  },
};

const app = Vue.createApp(DangNhap);
app.component("app-header", AppHeader);
app.component("app-footer", AppFooter);
app.mount("#app");
