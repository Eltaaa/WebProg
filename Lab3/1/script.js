/** File : validator.js **/
function validateForm() {
    // let fname = document.getElementById("FirstName").value;

    // if (fname.length < 3 ) {
    //     alert("Firstname must be filled out");
    //     return false;
    // }
    // let country = document.forms["myForm"]["Country"].value;
    // if (country =="00" ) {
    //     alert("Country must be selected");
    //     return false;
    // }
    


    let idnum = document.getElementById("idnum").value;

    if (idnum.length != 13) {
        alert("รหัสบัตรประชาชนต้องมีความยาว 13 หลัก");
        return false;
    }

    let firstname = document.getElementById("fname").value;

    if (firstname.length <= 2 || firstname.length >= 27 || hasNumber(firstname)) {
        alert("ชื่อเป็นตัวอักษร ความยาวระหว่าง 2-20 ตัวอักษร")
        return false;
    }

    let lastname = document.getElementById("lname").value;

    if (lastname.length <= 2 || lastname.length >= 27 || hasNumber(lastname)) {
        alert("นามสกุลเป็นตัวอักษร ความยาวระหว่าง 2-30 ตัวอักษร")
        return false;
    }


    let address = document.getElementById("address").value;

    if (address.length < 15) {
        alert("ที่อยู่ต้องมีความยาวไม่ต่ำกว่า 15 ตัวอักษร");
        return false;
    }


    let subdistrict = document.getElementById("subdistrict").value;

    if (subdistrict.length < 2 || hasNumber(subdistrict)) {
        alert("ตำบล/แขวง เป็นตัวอักษร ความยาวไม่ต่ำกว่า 2 ตัวอักษร")
        return false;
    }

    let district = document.getElementById("district").value;

    if (district.length < 2 || hasNumber(district)) {
        alert("อำเภอ/เขต เป็นตัวอักษร ความยาวไม่ต่ำกว่า 2 ตัวอักษร")
        return false;
    }

    let province = document.getElementById("province").value;

    if (province == "null") {
        alert("กรุณาเลือกจังหวัด");
        return false;
    }

    let postnumber = document.getElementById("postnumber").value;

    if (postnumber.length != 5){
        alert("รหัสไปรษณีย์ต้องเป็นตัวเลขจำนวน 5 หลัก");
        return false;
    }

    alert("You're good to go!")
}

function hasNumber(myString) {
    return /\d/.test(myString);
}

/**
     - การตรวจสอบความยาวของตัวอักษร
     let str = new String( "This is string" );
     document.write("str.length is:" + str.length);
     // str.length is: 14
     - การหาตำแหน่งข้อความในชุดตัวอักษร
     let str = "Hello world, welcome to the universe.";
     let n = str.indexOf("welcome"); 
     // n = 13
*/