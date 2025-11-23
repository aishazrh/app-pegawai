const body       = document.querySelector("body");
const sidebar    = body.querySelector(".sidebar");
const toggle     = body.querySelector(".toggle");
const searchBtn  = body.querySelector(".search-box");
const modeSwitch = body.querySelector(".toggle-switch");
const modeText   = body.querySelector(".mode-text");

toggle.addEventListener("click", ()=> {
    sidebar.classList.toggle("close");
});

modeSwitch.addEventListener("click", ()=> {
    body.classList.toggle("dark");

    if(body.classList.contains("dark")) {
        modeText.innerText = "Light Mode"
    } else {
        modeText.innerText = "Dark Mode"
    }
});

// function updateSalary() {
//     var positionSelect = document.getElementById("jabatan_id");
//     var selectedOption = positionSelect.options[positionSelect.selectedIndex];

//     var salary = selectedOption.getAttribute("data-salary");

//     document.getElementById("salary").value = salary;
// }

function updateSalary(positionId) {
    var position = window.positions.find(pos => pos.id == positionId);

    if (position) {
        document.getElementById("salary").value = position.gaji_pokok;
    }
}

console.log(window.employees);
document.querySelector('form').addEventListener('submit', function(e) {
    console.log('Form is being submitted');
});


function updateEmployeeInfo() {
    var employeeSelect = document.getElementById("karyawan_id");
    var selectedEmployeeId = employeeSelect.value;

    var selectedEmployee = window.employees.find(employee => employee.id == selectedEmployeeId);

    if (selectedEmployee) {
        document.getElementById("employee_name").value = selectedEmployee.nama_lengkap;
        document.getElementById("department").value = selectedEmployee.department ? selectedEmployee.department.nama_departemen : 'N/A';
        document.getElementById("position").value = selectedEmployee.position ? selectedEmployee.position.nama_jabatan : 'N/A';
        document.getElementById("salary").value = selectedEmployee.position ? selectedEmployee.position.gaji_pokok : '0';
    }
}
