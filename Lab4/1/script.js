function calculate() {
  let value1 = document.getElementById("value1").value;
  let value2 = document.getElementById("value2").value;

  value1 = parseFloat(value1);
  value2 = parseFloat(value2);
  let result = value1 + value2;


  showline();
  showresult(result);
  addrecord(value1, value2, result);
  showrecord();
}

function showline() {
  document.getElementById("result").style.display = "block";
}

function showrecord() {
  document.getElementById("record").style.display = "block";
}

function showresult(result) {
  document.getElementById("num_result").innerHTML = "Result: " + result;
}

function addrecord(value1, value2, result) {
  let new_record = document.createElement("p");

  let recordtext = document.createTextNode(
    value1 + " + " + value2 + " = " + result
  );

  new_record.appendChild(recordtext);

  document.getElementById("record").appendChild(new_record);
}
