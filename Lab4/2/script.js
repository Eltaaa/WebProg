function changeLanguage() {
  // document.documentElement.lang = "th";

  if (document.documentElement.lang == "th") {
    changeToEng();
  } else {
    changeToTH();
  }
}

function changeToEng() {
  document.documentElement.lang = "en";

  document.getElementById("namelabel").textContent = "First Name: ";
  document.getElementById("lastnamelabel").textContent = "Last Name: ";
  document.getElementById("countrylabel").textContent = "Country: ";

  let selectElement = document.getElementById("selectcountry");

  var choiceArray = [
    "Select a country",
    "Thailand",
    "Vietnam",
    "Laos",
    "Malaysia",
    "Singapore",
    "Philippine",
    "Myanmar",
    "Cambodia",
    "Brunei",
  ];

  for (let i = 0; i < selectElement.options.length; i++) {
    var option = selectElement.options[i];
    option.textContent = choiceArray[i];
  }

  document.getElementById("changelang").textContent = "Change to Thai";
}

function changeToTH() {
  document.documentElement.lang = "th";

  document.getElementById("namelabel").textContent = "ชื่อ: ";
  document.getElementById("lastnamelabel").textContent = "นามสกุล: ";
  document.getElementById("countrylabel").textContent = "ประเทศ: ";

  let selectElement = document.getElementById("selectcountry");

  var choiceArray = [
    "เลือกประเทศ",
    "ไทย",
    "เวียดนาม",
    "ลาว",
    "มาเลย์เซีย",
    "สิงคโปร์",
    "ฟิลิปปินส์",
    "เมียนมาร์",
    "แคมโบเดีย",
    "บรูไน",
  ];

  for (let i = 0; i < selectElement.options.length; i++) {
    var option = selectElement.options[i];
    option.textContent = choiceArray[i];
  }

  document.getElementById("changelang").textContent = "เปลี่ยนเป็นภาษาอังกฤษ";
}
