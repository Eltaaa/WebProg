let requestURL = "question.json";
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
  // alert(data[0]);
  for (i in data) {
    text += `<h5> ${parseInt(i)+1} ) ${data[i].question} </h5>`;
    text += `<input type="radio" name="q${parseInt(i)+1}"> ${data[i].answers.a} </br>`
    text += `<input type="radio" name="q${parseInt(i)+1}"> ${data[i].answers.b} </br>`
    text += `<input type="radio" name="q${parseInt(i)+1}"> ${data[i].answers.c} </br>`
  }
  document.getElementById("out").innerHTML = text;
}
