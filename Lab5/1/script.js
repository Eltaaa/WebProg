let requestURL = "employees.json";
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
  for (i in data) {
    x= data[i];
    text += `<strong> ${x.ID} ${x.Firstname} ${x.Lastname} </strong> (${x.Gender}) is a ${x.Position}, ${x.Address} </br>`;

    // text += "<hr>";
  }
  document.getElementById("out").innerHTML = text;
}
