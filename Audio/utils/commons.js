const STORAGE_KEY = {
  CART_ITEMS: "cart_items",
  BILL_ITEMS: "bill_items",
  SESSIONS: "sessions",
  USERS: "users",
  PAYMENT: "payment",
};

const SORT_BY = {
  NEWEST: "newest",
  OLDEST: "oldest",
  PRICE_HIGH: "price_high",
  PRICE_LOW: "price_low",
};

function getQueryParams(key) {
  let uri = window.location.search.substring(1);
  let params = new URLSearchParams(uri);

  return params.get(key);
}

function getProductById(productId) {
  return PRODUCTS.find((product) => product.id === +productId);
}

function getPaginatedProducts({
  pageIndex,
  pageSize,
  sortBy,
  filterBy = {
    brand: "",
    type: "",
    checkedBrands: [],
  },
  searchKey = "",
  minPrice = "",
  maxPrice = "",
}) {
  const startIndex = pageIndex * pageSize;
  const endIndex = startIndex + pageSize;

  let data = PRODUCTS;

  // Filter data by criteria
  if (filterBy.checkedBrands) {
    data = data.filter(item => filterBy.checkedBrands.includes(item.brand));
  }

  if (filterBy.type) {
    data = data.filter((product) => product.type === filterBy.type);
  }

  // Filter data by search key
  data = data.filter((product) =>
    product.name.toLowerCase().includes(searchKey.toLowerCase())
  );

  //Filter data by price
  data = data.filter((product) => product.price > minPrice);

  data = data.filter((product) => product.price < maxPrice);

  // Sort data
  switch (sortBy) {
    case SORT_BY.NEWEST:
      data = [...data].sort((a, b) => a.id - b.id);
      break;
    case SORT_BY.OLDEST:
      data = [...data].sort((a, b) => b.id - a.id);
      break;
    case SORT_BY.PRICE_HIGH:
      data = [...data].sort((a, b) => a.price - b.price);
      break;
    case SORT_BY.PRICE_LOW:
      data = [...data].sort((a, b) => b.price - a.price);
      break;
  }

  // Paginating
  const paginatedData = data.slice(startIndex, endIndex);

  return {
    pageIndex,
    total: data.length,
    data: paginatedData,
  };
}

const commonStorage = {
  getItem(key) {
    const data = localStorage.getItem(key);

    try {
      return JSON.parse(data);
    } catch (err) {
      return null;
    }
  },
  setItem(key, value) {
    const stringifiedData = JSON.stringify(value);
    localStorage.setItem(key, stringifiedData);
  },
  removeItem(key) {
    localStorage.removeItem(key);
  },
};

const cartService = {
  getPaymentInfo() {
    const payment = commonStorage.getItem(STORAGE_KEY.PAYMENT);
    return payment;
  },
  addPaymentInfo(item) {
    commonStorage.setItem(STORAGE_KEY.PAYMENT, item);
  },
  getCartItems() {
    const cartItems = commonStorage.getItem(STORAGE_KEY.CART_ITEMS);

    if (!cartItems) {
      return [];
    }

    return cartItems;
  },
  addCartItem(item) {
    const cartItems = commonStorage.getItem(STORAGE_KEY.CART_ITEMS);

    if (cartItems) {
      cartItems.push({ ...item, cartItemId: new Date().getTime() });
      commonStorage.setItem(STORAGE_KEY.CART_ITEMS, cartItems);
    } else {
      const newCart = [item];
      commonStorage.setItem(STORAGE_KEY.CART_ITEMS, newCart);
    }
  },
  removeCartItem(item) {
    const cartItems = commonStorage.getItem(STORAGE_KEY.CART_ITEMS);

    if (cartItems) {
      const newCart = cartItems.filter(
        (itemInCart) => itemInCart.cartItemId !== item.cartItemId
      );
      commonStorage.setItem(STORAGE_KEY.CART_ITEMS, newCart);
    }
  },
  clearCart() {
    commonStorage.removeItem(STORAGE_KEY.CART_ITEMS);
  },
};

const authService = {
  getSession() {
    const session = commonStorage.getItem(STORAGE_KEY.SESSIONS);

    return session;
  },
  getUser(username) {
    const users = commonStorage.getItem(STORAGE_KEY.USERS);

    if (!users) {
      return null;
    }

    const user = users.find((user) => user.username === username);

    return user;
  },
  register({ username, password }) {
    if (!username || !password) {
      return { ok: false };
    }

    let users = commonStorage.getItem(STORAGE_KEY.USERS);

    const newUser = { username, password, createdAt: new Date().getTime() };

    if (users) {
      users.push(newUser);
    } else {
      users = [newUser];
    }

    commonStorage.setItem(STORAGE_KEY.USERS, users);

    return {
      ok: true,
      user: {
        username: newUser.username,
        createdAt: newUser.createdAt,
      },
    };
  },
  login({ username, password }) {
    if (!username || !password) {
      return { ok: false };
    }

    const user = this.getUser(username);

    if (!user) {
      return { ok: false };
    }

    if (user.password !== password) {
      return { ok: false };
    }

    commonStorage.setItem(STORAGE_KEY.SESSIONS, {
      username: username,
      loggedAt: new Date().getTime(),
    });

    return {
      ok: true,
      user: {
        username: username,
      },
    };
  },
  logout() {
    commonStorage.setItem(STORAGE_KEY.SESSIONS, null);
  },
};
