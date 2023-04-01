const PRODUCT_TYPE = {
  FULL_SIZED: "full-sized",
  IN_EAR: "in-ear",
  TRUE_WIRELESS: "true-wireless",
  EAR_BUD: "ear-bud",
};

const PRODUCT_BRANDS = {
  FOCAL: "Focal",
  HIFIMAN: "HiFiMan",
  MOONDROP: "MOONDROP",
  SONY: "SONY",
  APPLE: "Apple",
};
const PRODUCTS = [{
    id: 1,
    name: "HiFiMan HE400SE",
    price: 3990000,
    type: PRODUCT_TYPE.FULL_SIZED,
    brand: PRODUCT_BRANDS.HIFIMAN,
    date: 211224,
    image: "assets/images/products/hifiman_he400se.jpg",
    descriptions: [
      "Loại tai nghe: Full-size | Open-back",
      "Tầng số đáp ứng: 20Hz - 20kHz",
      "Trở kháng: 25Ω",
      "Độ nhạy: 91dB",
      "Trọng lượng: 390g",
    ],
  },
  {
    id: 2,
    name: "Focal Celestee",
    price: 23000000,
    type: PRODUCT_TYPE.FULL_SIZED,
    brand: PRODUCT_BRANDS.FOCAL,
    image: "assets/images/products/focal_celestee.jpg",
    descriptions: [
      "Focal Celestee kết hợp giữa thiết kế hiện đại, sang trọng và hiệu suất âm thanh ấn tượng. Các trình điều khiển loa độc quyền của Focal đảm bảo độ động tuyệt vời cùng với âm thanh có độ chính xác cao. Chụp tai đã trải qua quá trình xử lý âm học, hạn chế cộng hưởng và đạt được chất lượng âm thanh vượt trội: âm thanh rõ ràng, chính xác và có độ mở rộng âm trầm tốt."
    ],
  },
  {
    id: 3,
    name: "Focal Radiance",
    price: 29990000,
    type: PRODUCT_TYPE.FULL_SIZED,
    brand: PRODUCT_BRANDS.FOCAL,
    image: "assets/images/products/focal_radiance.jpeg",
  },
  {
    id: 4,
    name: "Apple AirPods Max",
    price: 11900000,
    type: PRODUCT_TYPE.FULL_SIZED,
    brand: PRODUCT_BRANDS.APPLE,
    image: "assets/images/products/airpod_max.png",
    descriptions: [
      "Màu sắc: Space Gray, Silver"
    ],
  },
  {
    id: 5,
    name: "Sony WH-1000XM4",
    price: 6390000,
    type: PRODUCT_TYPE.FULL_SIZED,
    brand: PRODUCT_BRANDS.SONY,
    image: "assets/images/products/wh1000xm4.png",
    descriptions: [
      "Màu sắc đang có sẵn (cập nhật ngày 01/12/2021): Black, Silver, Midnight Blue.",
      "Sony WH-1000XM4 tiếp tục giữ vững ngôi vị tai nghe chống ồn tốt nhất trên thị trường hiện nay",
      "Bluetooth 5.0 cùng khả năng kết nối 2 thiết bị",
      "Thời lượng pin 30h, sạc nhanh 5 phút",
      "Chế độ speak to chat thông minh duy nhất chỉ có trên WH-1000XM4",
      "Sony WH-1000XM4 là tai nghe đầu tiên của Sony được trang bị DSEE EXTREME",
    ],
  },
  {
    id: 6,
    name: "HiFiMan Sundara",
    price: 8500000,
    type: PRODUCT_TYPE.FULL_SIZED,
    brand: PRODUCT_BRANDS.HIFIMAN,
    image: "assets/images/products/hifiman_sundara.jpg",
    descriptions: [
      "Loại tai nghe: Full-size | Open-back",
      "Dạng driver: Từ phẳng (Planar Magnetic)",
      "Tầng số đáp ứng: 6Hz - 75kHz",
      "Trở kháng: 37Ω",
      "Độ nhạy: 94dB",
      "Trọng lượng: 372g",
    ],
  },
  {
    id: 7,
    name: "Focal Clear",
    price: 29290000,
    type: PRODUCT_TYPE.FULL_SIZED,
    brand: PRODUCT_BRANDS.FOCAL,
    image: "assets/images/products/focal_clear.jpg",
    descriptions: [
    "Clear là mẫu headphone trùm tai cao cấp được thiết kế kiểu open back cho chất lượng âm thanh như của những bộ loa tốt nhất. Thiết kế và sản xuất tại nhà máy Focal – Pháp, Clear được lấy cảm hứng từ chính bộ headphone đầu bảng Utopia. Có thể hiểu rằng Clear có khả năng diễn xuất vượt trội nhờ bộ driver toàn dải độc quyền của Focal cho những chi tiết âm nhỏ nhất trong tổng thể bản nhạc. Thiết kế vượt trên cả mẫu Elear xét về độ mở, Clear sẽ làm mất đi cảm giác bạn đang đeo headphone khi nghe nhạc, đồng thời loại bỏ cảm giác không gian bị thu hẹp cố hữu khi nghe bằng headphone. Với thiết kế bên ngoài đầy sáng tạo cùng với công nghệ chế tạo driver màng hợp kim Aluminium / Magnesium với dome hình chữ “M” cho khả năng trình diễn với độ động và độ trung thực cao cùng với chất âm cá tính đặc trưng và không trùng lắp.",
    ],
  },
  {
    id: 8,
    name: "Apple Airpod Proz VN/A",
    price: 4990000,
    type: PRODUCT_TYPE.TRUE_WIRELESS,
    brand: PRODUCT_BRANDS.APPLE,
    image: "assets/images/products/airpod_pro.jpg",
  },
  {
    id: 9,
    name: "Apple Airpod 3",
    price: 4750000,
    type: PRODUCT_TYPE.TRUE_WIRELESS,
    brand: PRODUCT_BRANDS.APPLE,
    image: "assets/images/products/airpod_3.jpg",
  },
  {
    id: 10,
    name: "Sony WF-1000XM4",
    price: 5490000,
    type: PRODUCT_TYPE.TRUE_WIRELESS,
    brand: PRODUCT_BRANDS.SONY,
    image: "assets/images/products/wf1000xm4.jpeg",
    descriptions: [
      "Tai nghe Truly Wireless Sony WF-1000XM4 nâng tầm chất lượng âm thanh và công nghệ chống ồn tiên phong lên một tầm cao mới. Với thiết kế mới mẻ vừa vặn với mọi đôi tai, cặp tai nghe này khiến trải nghiệm nghe trở nên thật tự nhiên nhờ vào nhiều tính năng thông minh giúp cá nhân hóa trải nghiệm của bạn trong mọi tình huống."
    ],
  },
  {
    id: 11,
    name: "Sony WF-C500",
    price: 1990000,
    type: PRODUCT_TYPE.TRUE_WIRELESS,
    brand: PRODUCT_BRANDS.SONY,
    image: "assets/images/products/wfc500.jpg",
    descriptions: [
      "ản phẩm hiện đang có 3 màu: Black (đen), Coral Orange (cam) và Ice Green (Xanh lá). Quý khách vui lòng ghi chú màu đã chọn khi đặt hàng!"
    ]
  },
  {
    id: 12,
    name: "Sony WF-1000XM3",
    price: 3150000,
    type: PRODUCT_TYPE.TRUE_WIRELESS,
    brand: PRODUCT_BRANDS.SONY,
    image: "assets/images/products/wf1000xm3.jpg",
    descriptions: [
      "Digital Noise Cancelling with HD Noise Cancelling Processor QN1e and Dual Noise Sensor Technology",
      "Truly wireless design with BLUETOOTH® wireless technology",
      "Up to 24 hours of battery life for all-day listening",
      "Quick Attention function lets you chat easily without removing your headphones",
      "Modern classic design sits securely in your ears",
    ]
  },
  {
    id: 13,
    name: "Apple Airpod 2",
    price: 3185000,
    type: PRODUCT_TYPE.TRUE_WIRELESS,
    brand: PRODUCT_BRANDS.APPLE,
    image: "assets/images/products/airpod_2.jpg",
    descriptions: [
      "Designed by Apple",
      "Automatically on, automatically connected",
      "Easy setup for all your Apple devices6",
      "Quick access to Siri by saying “Hey Siri” or setting up double-tap",
      "Double-tap to play or skip forward",
      "Charges quickly in the case",
      "Case can be charged with a Lightning connector",
      "Rich, high-quality audio and voice",
      "Seamless switching between devices"
    ],
  },
  {
    id: 14,
    name: "Focal Sphear S",
    price: 3390000,
    type: PRODUCT_TYPE.IN_EAR,
    brand: PRODUCT_BRANDS.FOCAL,
    image: "assets/images/products/focal_sphear_s.jpg",
  },
  {
    id: 15,
    name: "HiFiMan TWS600",
    price: 4900000,
    type: PRODUCT_TYPE.TRUE_WIRELESS,
    brand: PRODUCT_BRANDS.HIFIMAN,
    image: "assets/images/products/hifiman_tws600.jpg",
  },
  {
    id: 16,
    name: "HiFiMan RE-600S V2",
    price: 4900000,
    type: PRODUCT_TYPE.IN_EAR,
    brand: PRODUCT_BRANDS.HIFIMAN,
    image: "assets/images/products/hifiman_re600s.jpg",
  },
  {
    id: 17,
    name: "HiFiMan Deva Pro",
    price: 7950000,
    type: PRODUCT_TYPE.FULL_SIZED,
    brand: PRODUCT_BRANDS.HIFIMAN,
    image: "assets/images/products/hifiman_deva_pro.jpg",
  },
  {
    id: 18,
    name: "Moondrop KATO",
    price: 4350000,
    type: PRODUCT_TYPE.IN_EAR,
    brand: PRODUCT_BRANDS.MOONDROP,
    image: "assets/images/products/moondrop_kato.jpg",
    descriptions: [
      "Newly-Developed ULT Super Linear Dynamic Driver.",

      "3rd Generation DLC(Diamond-Like Carbon) Composite Diaphragm.",
      
      "Interchangeable Nozzle Design.",
      
      "3rd Generation Patented Anti-Blocking Acoustic Filter.",
      
      "Newly Designed Spring Silicone Ear Tips.",
      
      "Professional Tuning Following VDSF Target Response.",
      
      "High-Quality Copper Thick Silver-Plated Cable.",
      
      "Gold-Plated 2-pin 0.78mm Connectors."
    ]
  },
  {
    id: 19,
    name: "Moondrop KXXS",
    price: 3990000,
    type: PRODUCT_TYPE.IN_EAR,
    brand: PRODUCT_BRANDS.MOONDROP,
    image: "assets/images/products/moondrop_kxxs.jpg",
    descriptions: [
      "Diaphragm material:  Diamond-Like-Carbon & PEEK",

      "Coil: φ0.035mm-CCAW（Daikoku)",
      
      "Cavity:  Zn-Al alloy, die-casting, fine carving, polishing, electroplating",
      
      "Transducer: φ10mmelectrodynamic type transducer",
      
      "Frequency response: 10-80000Hz（free-field, 1/4inch MIC)",
      
      "Effective frequency: 20-20000Hz (IEC60318-4)",
      
      "Impedance:  32Ω (@1kHz)",
      
      "Sensitivity: 100dB (@1kHz)",
      
      "Quality control scope: ±1dB",
      
      "Cable: Lifz silver-plated 4N-OFC with 0.78-2pin and 3.5mm plug"
    ]
  },
  {
    id: 20,
    name: "Moondrop Starfield",
    price: 2890000,
    type: PRODUCT_TYPE.IN_EAR,
    brand: PRODUCT_BRANDS.MOONDROP,
    image: "assets/images/products/moondrop_starfield.png",
    descriptions:[
      "Driver: Carbon Nanotube diaphragm- 10mm Dual cavity dynamic driver Detachable",

      "cable standard: 24AWG Litz 4N OFC  1.2M",
      
      "Interface: 0.78 2pin",
      
      "Sensitivity: 122dB/Vrms(@1khz)",
      
      "Impedance: 32Ω±15% (@1khz)",
      
      "Frequency response: 10Hz-36000 Hz (free field. 1/4 inch MIC)",
      
      "Effective frequency response: 20Hz-20000 Hz (IEC60318-4)"
    ]
  },
  {
    id: 21,
    name: "Moondrop Aria",
    price: 1900000,
    type: PRODUCT_TYPE.IN_EAR,
    brand: PRODUCT_BRANDS.MOONDROP,
    image: "assets/images/products/moondrop_aria.jpg",
    descriptions:[
      "Product name: Aria High Performance LCP Diaphragm Dynamic IEMs",
      "Driver Unit: LCP liquid crystal diaphragm-10mm diameter double cavity magnetic Diaphragm Dynamic unit",
      "Headphone Socket : 0.78pin",
      "Sensitivity: 122dB/Vrms (@1kHz)",
      "Frequency response : 5Hz-36000Hz Effective frequency response: 20Hz~20000Hz"
    ]
  },
  {
    id: 22,
    name: "Moondrop SSP",
    price: 799000,
    type: PRODUCT_TYPE.IN_EAR,
    brand: PRODUCT_BRANDS.MOONDROP,
    image: "assets/images/products/moondrop_ssp.jpg",
    descriptions:[
      "Transducer type:	Beryllium-Coated Dome with PU Suspension Ring and N52 High Density Magnetic circuit",
      "Operating principle:	Vented",
      "Frequency response:	20Hz-20kHz",
      "Impedance:	16 Ω @ 1kHz",
      "Sensitivity:	115dB / Vrms (@1khz)"
    ]
  },
  {
    id: 23,
    name: "Moondrop Blessing 2",
    price: 7250000,
    type: PRODUCT_TYPE.IN_EAR,
    brand: PRODUCT_BRANDS.MOONDROP,
    image: "assets/images/products/moondrop_blessing2.jpg",
    descriptions: [
      "Driver : 1 driver dynamic và 4BA mỗi bên",
      "Trở kháng: 22 ohms",
      "Độ nhạy: 117dB",
      "Dải đáp ứng tần số: 9Hz-37kHz",
      "Phạm vi đáp ứng tần số hiệu quả: 20Hz-20kHz",
      "THD + N: <1%",
      "Vỏ nhựa in 3D",
      "Chuẩn 2pin 0.78mm"
    ],
  },
  {
    id: 24,
    name: "Moondrop Solis",
    price: 22500000,
    type: PRODUCT_TYPE.IN_EAR,
    brand: PRODUCT_BRANDS.MOONDROP,
    image: "assets/images/products/moondrop_solis.jpg",
    descriptions:[
      "Impedance: 7.5Ω±15% (@1khz)",
      "Sensitivity: 120dB/Vrms(@1khz)",                                                                                                                    
      "Frequency response: 20Hz-45000 Hz (free field. 1/4 inch MIC)",
      "Effective frequency response: 20Hz-20000 Hz (IEC60318-4)",
      "Detachable cable interface: 0.78-2pin ",
      "High frequency: Sonion EST (electrostatic)",
      "Mid-frequency: Softears D-MID-A",
      "Low frequency: Sonion 37Series "
    ]
  },
  {
    id: 25,
    name: "Moondrop S8",
    price: 14500000,
    type: PRODUCT_TYPE.IN_EAR,
    brand: PRODUCT_BRANDS.MOONDROP,
    image: "assets/images/products/moondrop_s8.jpg",
    descriptions:[
      "Eight Balanced Armature Driver Units each side",
      "Impedance:- 16ohms @ 1kHz",
      "Frequency Response:- 20Hz-40kHz",
      "Effective Frequency Response:-20Hz-20kHz",
      "Sensitivity:- 122dB",
      "2-Pin 0.78mm Connector Cable",
      "Medical UV acrylic housing shells",
      "6N OFC 3.5mm cable"
    ]
  },
  {
    id: 26,
    name: "Sony Z1R",
    price: 41990000,
    type: PRODUCT_TYPE.IN_EAR,
    brand: PRODUCT_BRANDS.SONY,
    image: "assets/images/products/z1r.jpg",
    descriptions: [
      "Originally designed",
      "Frequency reposnse to 100kHz",
      "Balanced Armature driver",
      "12nm dynamic driver's diaphragm, with magnesium done and aluminium-coated LCP",
      "Audio grade capacitor without distortion",
      "Perfectly straight sound path with ulta-wide frequency reponse up to 100kHz",
      "Naturally controlled acoustics",
      "Refined-phase structure for accurate acoustics blending",
      "Quality cable for preserving signal purity",
      "Sound space control for wide sound space",
    ]
  },
  {
    id: 27,
    name: "Moondrop Liebesleid",
    price: 6300000,
    type: PRODUCT_TYPE.EAR_BUD,
    brand: PRODUCT_BRANDS.MOONDROP,
    image: "assets/images/products/moondrop_liebesleid_2.jpg",
    descriptions: [
      "Unit type:Dynamic",

      "Unit diameter:13.5mm",
      
      "Cavity diameter:15.8mm",
      
      "Frequency response:10-45kHz",
      
      "Effective frequency response:20-20kHz",
      
      "Impedance:24Ω（±15%）",
      
      "THD:≤0.5%@1kHz",
      
      "Resolution discrepancies between right and left channel:≤1dB",
      
      "Cable material:8um silver plated 4N OFC",
    ]
  },
  {
    id: 28,
    name: "Moondrop VX Classic",
    price: 1290000,
    type: PRODUCT_TYPE.EAR_BUD,
    brand: PRODUCT_BRANDS.MOONDROP,
    image: "assets/images/products/moondrop_vx.jpg",
  },
  {
    id: 29,
    name: "Moondrop Liebesleid",
    price: 6300000,
    type: PRODUCT_TYPE.EAR_BUD,
    brand: PRODUCT_BRANDS.MOONDROP,
    image: "assets/images/products/moondrop_liebesleid_2.jpg",
    descriptions: [
      "Unit type:Dynamic",

      "Unit diameter:13.5mm",
      
      "Cavity diameter:15.8mm",
      
      "Frequency response:10-45kHz",
      
      "Effective frequency response:20-20kHz",
      
      "Impedance:24Ω（±15%）",
      
      "THD:≤0.5%@1kHz",
      
      "Resolution discrepancies between right and left channel:≤1dB",
      
      "Cable material:8um silver plated 4N OFC",
    ]
  },
  {
    id: 30,
    name: "Sony MDR_E9LP",
    price: 150000,
    type: PRODUCT_TYPE.EAR_BUD,
    brand: PRODUCT_BRANDS.SONY,
    image: "assets/images/products/mdr_e9lp.jpg",
    descriptions: [
      "Kiểu: Dynamic, Open Air",
      "Kích thước tai nghe: 13.5mm",
      "Độ nhạy: 104dB/mW",
      "Công suất hoạt động: 100mW",
      "Trở kháng: 16 ohms/ kHz",
      "Tần số đáp ứng: 18-22,000Hz",
      "Chiều dài dây đeo: 1.2m",
      "Đầu cắm: Chữ L ( 3.5 mm )",
      "Khối lượng: 6g",
    ]
  },
];