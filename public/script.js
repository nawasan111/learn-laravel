var state = true;
const create_student = document.getElementById('create-student');
const table = document.getElementById("table");
const switch_btn = document.getElementById("switch-btn");

create_student.style.display = "none"

function Switching() {
    if(state) {
        input_box.style.display = "block"
        table.style.display = "none"
        switch_btn.innerHTML = "show"
        state = !state;
    } else {
        input_box.style.display = "none"
        table.style.display = "block"
        switch_btn.innerHTML = "input"
        state = !state;
 
    }
}

function ChCom(value) {
    table.style.display = value === 'show' ? "block" : "none";
    create_student.style.display = value === 'create-student' ? "block" : "none";
    // table.style.display = value === 'show' ? "block" : "none";
}