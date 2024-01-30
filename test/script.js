function xxx() {
  localStorage.clear();
  localStorage.setItem("a", "A");

  localStorage.setItem("b", "B");

  localStorage.setItem("c", "C");

  console.log(localStorage.key(0));
  console.log(localStorage.key(1));
  console.log(localStorage.key(2));
}
