/** File : validator.js **/
function spin() {
    let nw = document.getElementById("nw").src;
    let ne = document.getElementById("ne").src;
    let se = document.getElementById("se").src;
    let sw = document.getElementById("sw").src;
    // alert(ne);


    document.getElementById("nw").src = sw;
    document.getElementById("ne").src = nw;
    document.getElementById("se").src = ne;
    document.getElementById("sw").src = se;
}

