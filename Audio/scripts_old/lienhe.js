const LienHe = {
  data() {
    return {};
  },
};

function changeMap(locate) {
  const targetMap1 = document.getElementById("map1");
  const targetMap2 = document.getElementById("map2");
  const targetMap3 = document.getElementById("map3");

  switch (locate) {
    case 1:
      if (
        targetMap2.style.display !== "none" ||
        targetMap3.style.display !== "none"
      ) {
        targetMap2.style.display = "none";
        targetMap3.style.display = "none";
      } else {
        targetMap1.style.display = "block";
      }
      targetMap1.style.display = "block";
      break;
    case 2:
      if (
        targetMap1.style.display !== "none" ||
        targetMap3.style.display !== "none"
      ) {
        targetMap1.style.display = "none";
        targetMap3.style.display = "none";
      } else {
        targetMap2.style.display = "block";
      }
      targetMap2.style.display = "block";
      break;
    case 3:
      if (
        targetMap1.style.display !== "none" ||
        targetMap2.style.display !== "none"
      ) {
        targetMap1.style.display = "none";
        targetMap2.style.display = "none";
      } else {
        targetMap3.style.display = "block";
      }
      targetMap3.style.display = "block";
      break;
  }
}

function changeMap2() {
  const targetMap1 = document.getElementById("map1");
  const targetMap2 = document.getElementById("map2");
  const targetMap3 = document.getElementById("map3");

  if (
    targetMap1.style.display !== "none" ||
    targetMap3.style.display !== "none"
  ) {
    targetMap1.style.display = "none";
    targetMap3.style.display = "none";
  } else {
    targetMap2.style.display = "block";
  }
  targetMap2.style.display = "block";
}

function changeMap3() {
  const targetMap1 = document.getElementById("map1");
  const targetMap2 = document.getElementById("map2");
  const targetMap3 = document.getElementById("map3");

  if (
    targetMap1.style.display !== "none" ||
    targetMap2.style.display !== "none"
  ) {
    targetMap1.style.display = "none";
    targetMap2.style.display = "none";
  } else {
    targetMap3.style.display = "block";
  }
  targetMap3.style.display = "block";
}

const app = Vue.createApp(LienHe);
app.component("app-header", AppHeader);
app.component("app-footer", AppFooter);
app.mount("#app");
