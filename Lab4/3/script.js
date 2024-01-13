
function register() {
  let table = document.getElementById("participants");
  let tablebody = document.getElementById("table_body");
  let newrow = document.createElement("tr");
  let order, studentID, firstname, lastname;

  order = document.createElement("td");
  order.scope = "row";
  order.textContent = tablebody.children.length +1;
  newrow.appendChild(order);

  studentID = document.createElement("td");
  studentID.textContent = document.getElementById("student_id").value;
  newrow.appendChild(studentID);

  firstname = document.createElement("td");
  firstname.textContent = document.getElementById("firstname").value;
  newrow.appendChild(firstname);

  lastname = document.createElement("td");
  lastname.textContent = document.getElementById("lastname").value;
  newrow.appendChild(lastname);

  newrow.classList.add("text-left");
  newrow.classList.add("table-bordered");

  tablebody.appendChild(newrow);
}
