function viewchart() {
  let letter_e = document.getElementById("letter_e");
  let letter_t = document.getElementById("letter_t");
  let letter_a = document.getElementById("letter_a");
  let letter_o = document.getElementById("letter_o");
  let letter_i = document.getElementById("letter_i");

  letter_e.style.width = "635px";
  letter_t.style.width = "455px";
  letter_a.style.width = "410px";
  letter_o.style.width = "375px";
  letter_i.style.width = "350px";

  let rate = document.getElementsByClassName("rate");

  for (var i = 0; i < rate.length; i++) {
    rate[i].style.display = "block";
  }
}
