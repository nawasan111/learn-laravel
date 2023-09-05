var state = true;
const create_student = document.getElementById('create-student');
const table = document.getElementById("table");
const switch_btn = document.getElementById("switch-btn");
const edit_student = document.getElementById('edit-student');

create_student.style.display = "none"
edit_student.style.display = "none"

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
    edit_student.style.display = value === 'edit-student' ? "block" : "none";
    // table.style.display = value === 'show' ? "block" : "none";
}

function editStudent(id, fullname, program, income, gpa) {
    ChCom('edit-student');

    const label = document.getElementById("edit-label");
    const student_id = document.getElementById("edit-student-id");
    const fullname_value = document.getElementById("edit-fullname-value");
    const program_value = document.getElementById("edit-program-value");
    const income_value = document.getElementById("edit-income-value");
    const gpa_value = document.getElementById("edit-gpa-value");

    label.innerText = `แก้ไขข้อมูลของ ${fullname}`
    student_id.value = id;
    fullname_value.value = fullname;
    program_value.value = program;
    income_value.value = income;
    gpa_value.value = gpa;
}