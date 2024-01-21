let requestURL = "x.json";
let request = new XMLHttpRequest();
request.onreadystatechange = function () {
  if (request.readyState == 4 && request.status == 200) {
    dataDisplay(JSON.parse(request.responseText));
  }
};
request.open("GET", requestURL, true);
request.send();

function dataDisplay(data) {
  let text = "";
  x = data[0];
  text += `${x.firstName} ${x.lastName}, ${x.gender.type} ${x.age} years old. </br>`;
  text += `${x.address.streetAddress} ${x.address.city} ${x.address.state} </br>`;
  text += `${x.address.postalCode} </br>`;
  text += `${x.phoneNumber[0].type} : ${x.phoneNumber[0].number} </br>`;
  text += `${x.phoneNumber[1].type} : ${x.phoneNumber[1].number} </br>`;
  document.getElementById("out").innerHTML = text;
}
