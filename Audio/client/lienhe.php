<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Liên hệ</title>
    <script src="lib/vue.global.prod.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="../assets/css/style.css" />
</head>

<body>
    <div id="app">
        <?php include '../components/header.php' ?>

        <div class="main-container" style="margin-bottom: 5%">
            <div class="contact-container">
                <div class="contact-map">
                    <iframe id="map1"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.6696584237106!2d106.68006961535187!3d10.759922362439042!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f1b7c3ed289%3A0xa06651894598e488!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBTw6BpIEfDsm4!5e0!3m2!1svi!2s!4v1640685385467!5m2!1svi!2s"
                        width="99%" height="700" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

                    <iframe id="map2" style = "display: none;"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.4145443535717!2d106.68277501535195!3d10.779528062082704!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f2f38563351%3A0xe2afc7d527483b0e!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBTw6BpIEfDsm4gLSBDxqEgU-G7nyAx!5e0!3m2!1svi!2s!4v1640701877453!5m2!1svi!2s"
                        width="99%" height="700" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

                    <iframe id="map3" style = "display: none;"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.3687526039266!2d106.70403251535184!3d10.783043462018812!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f49581e1041%3A0x1905114e17b30605!2zxJDhuqFpIEjhu41jIFPDoGkgR8OybiBDxqEgc-G7nyAy!5e0!3m2!1svi!2s!4v1640704164425!5m2!1svi!2s"
                        width="99%" height="700" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <div class="contact-info">
                    <div class="contact-info-address" style="cursor: pointer;" id="address1" onclick="changeMap(1)">
                        <h4> > TP. Hồ Chí Minh - Cơ sở chính </h4> <br>
                        <p>273 An D. Vương, Phường 3, Quận 5</p>
                        <p>(84-8) 38.354409 - (84-8) 38.352309</p>
                    </div>
                    <div class="contact-info-address" style="cursor: pointer;" id="address2" onclick="changeMap(2)">
                        <h4> > TP. Hồ Chí Minh - Cơ sở 1</h4> <br>
                        <p>105 Bà Huyện Thanh Quan, Quận 3</p>
                        <p>(84-8) 38.354409 - (84-8) 38.352309</p>
                    </div>
                    <div class="contact-info-address" style="cursor: pointer;" id="address3" onclick="changeMap(3)">
                        <h4> > TP. Hồ Chí Minh - Cơ sở 2</h4> <br>
                        <p> 04 Tôn Đức Thắng, Quận 1</p>
                        <p>(84-8) 38.354409 - (84-8) 38.352309</p>
                    </div>
                </div>
            </div>
        </div>

        <?php include '../components/footer.php' ?>
    </div>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script> -->
    </div>
</body>
<script>
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

</script>

</html>