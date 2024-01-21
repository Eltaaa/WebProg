function SaveDatInForm() {
  let idcard = document.forms.theform.idnum.value;
  let prefix = document.forms.theform.prefix.value;
  let firstname = document.forms.theform.fname.value;
  let lastname = document.forms.theform.lname.value;
  let address = document.forms.theform.address.value;
  let subdistrict = document.forms.theform.subdistrict.value;
  let district = document.forms.theform.district.value;
  let postal = document.forms.theform.postnumber.value;
  let province = document.forms.theform.province.value;
  // save data to local storage
  localStorage.setItem("idcard", idcard);
  localStorage.setItem("prefix", prefix);
  localStorage.setItem("firstname", firstname);
  localStorage.setItem("lastname", lastname);
  localStorage.setItem("address", address);
  localStorage.setItem("subdistrict", subdistrict);
  localStorage.setItem("district", district);
  localStorage.setItem("province", province);
  localStorage.setItem("postal", postal);
  alert("Data saved");
  // alert(firstname);
}
function showLocalData() {
  // load data from local storage
  let idcard = localStorage.getItem("idcard");
  let prefix = localStorage.getItem("prefix");
  let firstname = localStorage.getItem("firstname");
  let lastname = localStorage.getItem("lastname");
  let address = localStorage.getItem("address");
  let subdistrict = localStorage.getItem("subdistrict");
  let district = localStorage.getItem("district");
  let province = localStorage.getItem("province");
  let postal = localStorage.getItem("postal");

  // let out = document.getElementById("p1");

  document.getElementById("idnum").value = idcard;
  document.getElementById("prefix").value = prefix;
  document.getElementById("fname").value = firstname;
  document.getElementById("lname").value = lastname;
  document.getElementById("address").value = address;
  document.getElementById("subdistrict").value = subdistrict;
  document.getElementById("district").value = district;
  document.getElementById("province").value = province;
  document.getElementById("postnumber").value = postal;
  // out.innerHTML = "Write something..";
}
