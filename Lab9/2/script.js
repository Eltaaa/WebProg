function insertData(id, title, dept_name, credits){
    id_input = document.getElementById('courseID');
    title_input = document.getElementById('new_title');
    dept_input = document.getElementById('new_dept');
    credits_input = document.getElementById('new_credits');


    id_input.value = id;
    title_input.value = title;
    dept_input.value = dept_name;
    credits_input.value = credits;
}
